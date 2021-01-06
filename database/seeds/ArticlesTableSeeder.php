<?php

use App\User;
use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = User::all();

      $users->each(function ($user)
      {
        $user->articles()->save(factory(Article::class)->make());
      });
    }
}
