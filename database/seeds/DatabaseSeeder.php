<?php

use App\User;
use App\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(config('database.default')!=='pgsql')
        {
          DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        User::truncate();
        $this->call(UsersTableSeeder::class);

        Article::truncate();
        $this->call(ArticlesTableSeeder::class);

        if(config('database.default')!=='pgsql')
        {
          DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
