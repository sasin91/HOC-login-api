<?php

use App\Reply;
use App\Thread;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $threads = factory(Thread::class)->times(10)->create();
        $threads->each(function ($thread) {
            $thread->replies()->saveMany(factory(Reply::class)->times(range(3, 5))->make());
        });
    }
}
