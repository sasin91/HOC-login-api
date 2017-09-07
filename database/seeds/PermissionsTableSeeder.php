<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

class PermissionsTableSeeder extends Seeder
{
	protected $admin = [
		'create servers',
		'edit servers',
		'delete servers',
		'create products',
		'update products',
		'delete products'
	];

    protected $moderator = [
        'list inactive players', 'list offline players', 'list online players', 'list newbie players',
        'create boards', 'edit boards', 'delete boards',
	    'edit channels',
	    'delete channels',
	    'edit threads',
	    'delete threads'
    ];

    protected $user = [
        'list servers', 'join server', 'leave server',
	    'create channel',
	    'create threads',
	    'list online players'
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Role $role_model, Permission $permission_model)
    {
        Cache::forget('spatie.permission.cache');

        $this->permissions()
        	 ->map(function ($permissions) use($permission_model) {
       			return collect(array_fill_keys($permissions, 'name'))
	       			->chunk(1)
	       			->map(function ($chunk) use($permission_model) {
	       				return $permission_model->firstOrCreate(
	       					$chunk
		       					->flip()
		       					->toArray()
	       				);
	       			});
        	})
        	->each(function ($permissions, $role) use($role_model) {
        		tap($role_model->firstOrCreate(['name' => $role]), function ($role) use($permissions) {
        			$role->syncPermissions($permissions);
        		});
        	});
    }

    protected function permissions()
    {
        return collect([
            'Admin' => $this->admin,
            'Moderator' => $this->moderator,
            'User' => $this->user
        ]);
    }
}
