<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        $this->call(PermissionsTableSeeder::class);
        if (app()->environment(['testing', 'local', 'development'])) {
            $this->call(ForumSeeder::class);
            $this->call(RepliesTableSeeder::class);
            $this->call(CharacterTemplateTableSeeder::class);
            $this->call(ProductsTableSeeder::class);
        }
    }
}
