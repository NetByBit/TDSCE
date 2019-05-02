<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Project;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();

        $users = User::all();
        $users->each(function($user) use($users) {
            factory(Project::class, 5)->create(['user_id'=> $user->id])->each(function($project) use ($users) {
                $project->comments()->saveMany(factory(Comment::class, 5)->make());
            });
        });
    }
}
