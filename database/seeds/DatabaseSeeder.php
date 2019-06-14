<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Project;
use App\Comment;
use App\Idea;
use App\Testing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 2)->create();

        $users = User::all();
        $users->each(function($user) use($users) {
            factory(Project::class, 2)->create(['user_id'=> $user->id])->each(function($project) use ($users) {
                $project->comments()->saveMany(factory(Comment::class, 3)->make());
            });
            factory(Idea::class, 2)->create(['user_id'=> $user->id])->each(function($idea) use ($users) {
                $idea->comments()->saveMany(factory(Comment::class, 3)->make());
            });

            factory(Testing::class, 2)->create(['user_id'=> $user->id])->each(function($testing) use ($users) {
                $testing->comments()->saveMany(factory(Comment::class, 3)->make());
            });
        });
    }
}
