<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ManagingPermissionsTest extends TestCase
{
    use RefreshDatabase;

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
    public function admin_can_create_permission()
    {
        $this->signInAsAdmin();

        $this->postJson('/api/permissions', ['name' => 'Oh yeah!'])
            ->assertSuccessful();

        $this->assertDatabaseHas('permissions', ['name' => 'Oh yeah!']);
    }

    /** @test */
    public function admin_can_update_permission()
    {
        $this->signInAsAdmin();

        $permission = Permission::create(['name' => 'Something.']);

        $this->patchJson("/api/permissions/{$permission->id}", ['name' => 'meep meep!'])
            ->assertSuccessful();

        $this->assertDatabaseHas('permissions', ['name' => 'meep meep!', 'id' => $permission->id]);
    }

    /** @test */
    public function admin_can_delete_permission()
    {
        $this->signInAsAdmin();

        $permission = Permission::create(['name' => 'Something.']);

        $this->deleteJson("/api/permissions/{$permission->id}")
            ->assertSuccessful();

        $this->assertDatabaseMissing('permissions', ['name' => 'Something.', 'id' => $permission->id]);
    }

    /** @test */
    public function user_cannot_touch_permissions()
    {
        $this->enableExceptionHandling();
        $this->signIn();

        $this->postJson('/api/permissions', ['name' => 'Oh shit!'])
            ->assertStatus(Response::HTTP_FORBIDDEN);
        $this->assertDatabaseMissing('permissions', ['name' => 'Oh shit!']);

        $permission = Permission::create(['name' => 'Something.']);

        $this->patchJson("/api/permissions/{$permission->id}", ['name' => 'Hue hue hue'])
            ->assertStatus(Response::HTTP_FORBIDDEN);
        $this->assertDatabaseMissing('permissions', ['name' => 'Hue hue hue']);

        $this->deleteJson("/api/permissions/{$permission->id}")->assertStatus(Response::HTTP_FORBIDDEN);
        $this->assertDatabaseHas('permissions', ['name' => 'Something.', 'id' => $permission->id]);
    }

    /** @test */
    public function only_super_users_can_grant_admin_permissions()
    {
        $this->signInAsSuperAdmin();

        $user = factory(User::class)->create();

        $this->postJson("/api/user/{$user->id}/permissions", ['names' => $this->permissions->admin])
            ->assertSuccessful();

        collect($this->permissions->admin)->each(function ($permission) use ($user) {
            self::assertTrue($user->hasPermissionTo($permission));
        });
    }

    /** @test */
    public function admin_cannot_grant_admin_permissions()
    {
        $this->enableExceptionHandling();
        $this->signInAsAdmin();

        $user = factory(User::class)->create();

        $this->postJson("/api/user/{$user->id}/permissions", ['names' => $this->permissions->admin])
            ->assertStatus(Response::HTTP_FORBIDDEN);

        collect($this->permissions->admin)->each(function ($permission) use ($user) {
            self::assertFalse($user->hasPermissionTo($permission));
        });
    }

    /** @test */
    public function admin_can_grant_moderator_permissions_to_user()
    {
        $this->signInAsAdmin();

        $user = factory(User::class)->create();

        $this->postJson("/api/user/{$user->id}/permissions", ['names' => $this->permissions->moderator])
            ->assertSuccessful();

        collect($this->permissions->moderator)->each(function ($permission) use ($user) {
            self::assertTrue($user->hasPermissionTo($permission));
        });
    }

    /** @test */
    public function moderator_cannot_grant_permissions()
    {
        $this->enableExceptionHandling();
        $this->signInAsModerator();

        $user = factory(User::class)->create();

        $this->postJson("/api/user/{$user->id}/permissions", ['names' => $this->permissions->user])
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function user_cannot_grant_permissions()
    {
        $this->enableExceptionHandling();
        $this->signIn();

        $user = factory(User::class)->create();

        $this->postJson("/api/user/{$user->id}/permissions", ['names' => $this->permissions->user])
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
