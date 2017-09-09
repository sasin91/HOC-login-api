<?php

namespace Tests\Feature;

use App\SuperUser;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ManagingRolesTest extends TestCase
{
	use DatabaseMigrations;

	/**
	 * @var \PermissionsTableSeeder
	 */
	protected $permissions;

	public function setUp()
	{
		parent::setUp();

		$this->permissions = new \PermissionsTableSeeder;
	}

	/** @test */
	public function admin_can_create_role()
	{
		$this->signInAsAdmin();

		$this->postJson('/api/roles', ['name' => 'Oh yeah!'])
			->assertSuccessful();

		$this->assertDatabaseHas('roles', ['name' => 'Oh yeah!']);
	}

	/** @test */
	public function admin_can_create_a_role_with_permissions()
	{
		$this->signInAsAdmin();

		$this->postJson('/api/roles', ['name' => 'Oh yeah!'])
			->assertSuccessful();

		$this->assertDatabaseHas('roles', ['name' => 'Oh yeah!']);
	}

	/** @test */
	public function admin_can_update_role()
	{
		$this->signInAsAdmin();

		$role = Role::create(['name' => 'Something.']);

		$this->patchJson("/api/roles/{$role->id}", ['name' => 'meep meep!'])
			->assertSuccessful();

		$this->assertDatabaseHas('roles', ['name' => 'meep meep!', 'id' => $role->id]);
	}

	/** @test */
	public function admin_can_delete_role()
	{
		$this->signInAsAdmin();

		$role = Role::create(['name' => 'Something.']);

		$this->deleteJson("/api/roles/{$role->id}")
			->assertSuccessful();

		$this->assertDatabaseMissing('roles', ['name' => 'Something.', 'id' => $role->id]);
	}

	/** @test */
	public function user_cannot_touch_roles()
	{
		$this->enableExceptionHandling();
		$this->signIn();

		$this->postJson('/api/roles', ['name' => 'Oh shit!'])
			->assertStatus(Response::HTTP_FORBIDDEN);
		$this->assertDatabaseMissing('roles', ['name' => 'Oh shit!']);

		$role = Role::create(['name' => 'Something.']);

		$this->patchJson("/api/roles/{$role->id}", ['name' => 'Hue hue hue'])
			->assertStatus(Response::HTTP_FORBIDDEN);
		$this->assertDatabaseMissing('roles', ['name' => 'Hue hue hue']);

		$this->deleteJson("/api/roles/{$role->id}")->assertStatus(Response::HTTP_FORBIDDEN);
		$this->assertDatabaseHas('roles', ['id' => $role->id]);
	}

	/** @test */
	public function admin_can_create_new_roles_with_permissions()
	{
		$this->signInAsSuperAdmin();

		resolve(Permission::class)->create(['name' => 'Dance a funky chicken.']);

		$this->json('POST', '/api/roles', ['name' => 'New Role', 'permissions' => ['Dance a funky chicken.']])
			->assertSuccessful();

		/** @var \Spatie\Permission\Models\Role $role */
		$this->assertNotNull($role = resolve(Role::class)->findByName('New Role'), "Role was null.");
		$this->assertTrue($role->hasPermissionTo('Dance a funky chicken.'),
			"Role did not receive permission to [Dancy a funky chicken.].");
	}

	/** @test */
	public function admin_can_update_roles()
	{
		$this->signInAsSuperAdmin();

		$this->json('PATCH', '/api/roles/1', ['name' => 'Silly stuff'])
			->assertSuccessful();

		$this->assertDatabaseHas(resolve(Role::class)->getTable(), [
			'id' => 1,
			'name' => 'Silly stuff'
		]);
	}

	/** @test */
	public function admin_can_delete_roles()
	{
		$this->signInAsSuperAdmin();

		$this->json('DELETE', '/api/roles/1')
			->assertSuccessful();

		$this->assertDatabaseMissing(resolve(Role::class)->getTable(), [
			'id' => 1,
		]);
	}

	/** @test */
	public function admin_can_grant_permissions_to_a_role()
	{
		$this->signInAsAdmin();

		resolve(Permission::class)->create(['name' => 'fluffy new permission']);

		/** @var \Spatie\Permission\Models\Role $role */
		$role = resolve(Role::class)->find(1);
		$this->assertFalse($role->hasPermissionTo('fluffy new permission'), 'Role had unexpected permission.');

		$this->json('POST', '/api/roles/1/permissions', ['names' => ['fluffy new permission']])
			->assertSuccessful();

		$this->assertTrue($role->refresh()->hasPermissionTo('fluffy new permission'));
	}

	/** @test */
	public function admin_can_revoke_permissions_from_a_role()
	{
		$this->signInAsAdmin();

		/** @var \Spatie\Permission\Models\Role $role */
		$role = resolve(Role::class)->find(1);
		$permission = $role->permissions()->save(resolve(Permission::class)->create(['name' => 'fluffy new permission']));

		$this->json('DELETE', "/api/roles/{$role->id}/permissions/{$permission->id}", ['ids' => $permission->id])
			->assertSuccessful();

		$this->assertFalse($role->hasPermissionTo($permission));
	}

	/** @test */
	public function admin_cannot_assign_another_admin()
	{
		$this->enableExceptionHandling();
		$this->signInAsAdmin();

		/** @var User $user */
		$user = create(User::class);

		$this->json('POST', "/api/user/{$user->id}/roles", ['names' => 'Admin'])
			->assertStatus(Response::HTTP_FORBIDDEN);

		$this->assertFalse($user->hasRole('Admin'));
	}

	/** @test */
	public function super_users_can_assign_any_role()
	{
		$this->signInAsSuperAdmin();

		$john = create(User::class, ['email' => 'john@example.com']);

		$this->json('POST', "/api/user/{$john->id}/roles", ['names' => 'Admin'])
			->assertSuccessful();

		$this->assertTrue($john->hasRole('Admin'));
	}

	/** @test */
	public function superUser_can_revoke_any_role()
	{
		SuperUser::add('admin@example.com');

		$this->signIn(create(User::class, ['email' => 'admin@example.com']));

		$john = create(User::class, ['email' => 'john@example.com']);
		$john->assignRole('Admin');

		$this->json('DELETE', "/api/user/{$john->id}/roles", ['names' => 'Admin'])
			->assertSuccessful();

		$this->assertFalse($john->hasRole('Admin'));
	}

	public function admin_cannot_revoke_another_admin()
	{
		$this->signInAsSuperAdmin();

		$john = create(User::class, ['email' => 'john@example.com']);
		$john->assignRole('Admin');

		$this->json('DELETE', "/api/user/{$john->id}/roles", ['names' => 'Admin'])
			->assertStatus(Response::HTTP_UNAUTHORIZED);

		$this->assertTrue($john->hasRole('Admin'));
	}

	/** @test */
	public function admin_can_grant_special_permissions()
	{
		$this->signInAsSuperAdmin();

		$john = create(User::class, ['email' => 'john@example.com']);
		resolve(Permission::class)->create(['name' => 'dance a happy jitter-bug']);

		$this->json('POST', "/api/user/{$john->id}/permissions", ['names' => 'dance a happy jitter-bug'])
			->assertSuccessful();

		$this->assertTrue($john->hasPermissionTo('dance a happy jitter-bug'));
	}

	/** @test */
	public function admin_can_revoke_special_permissions()
	{
		$this->signInAsSuperAdmin();

		$john = create(User::class, ['email' => 'john@example.com']);
		resolve(Permission::class)->create(['name' => 'dance a happy jitter-bug']);

		$this->json('POST', "/api/user/{$john->id}/permissions", ['names' => 'dance a happy jitter-bug'])
			->assertSuccessful();

		$this->assertTrue($john->hasPermissionTo('dance a happy jitter-bug'));
	}
}
