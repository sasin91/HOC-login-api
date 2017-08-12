<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

class PermissionsTableSeeder extends Seeder
{
	protected $permissions = [
		'Admin'			=>	['create servers', 'edit servers', 'delete servers'],
		'Moderator'		=>	['list inactive players', 'list offline players', 'list online players', 'list newbie players'],
		'User'			=>	['list servers', 'join server', 'leave server']
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Role $role_model, Permission $permission_model)
    {
        Cache::forget('spatie.permission.cache');

        collect($this->permissions)
        	->map(function ($permissions) use($permission_model) {
       			return collect(array_fill_keys($permissions, 'name'))
	       			->chunk(1)
	       			->map(function ($chunk) use($permission_model) {
	       				return $permission_model->create(
	       					$chunk
		       					->flip()
		       					->toArray()
	       				);
	       			});
        	})
        	->each(function ($permissions, $role) use($role_model) {
        		$role = tap($role_model->create(['name' => $role]), function ($role) use($permissions) {
        			$role->givePermissionTo($permissions);
        		});
        	});
    }
}
