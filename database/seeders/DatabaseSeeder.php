<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([    
            GenreSeeder::class,
            MelodySeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
            SongSeeder::class,
            MessageSeeder::class,
            CommentSeeder::class,
            ReplySeeder::class,
            FollowSeeder::class,
            Comment_UserSeeder::class,
            Reply_UserSeeder::class,
            Song_UserSeeder::class,
            Melody_UserSeeder::class,
            Melody_SongSeeder::class,
            Song_StatusSeeder::class,
        ]);
    }
}
