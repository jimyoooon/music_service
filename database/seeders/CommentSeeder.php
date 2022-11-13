<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Comment;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'body'=> 'とてもいい曲ですね',
            'file'=> "'C:\Users\81805\Desktop\Steelix - Lay It Down (Instrumental) _ tell your friends you ain't coming out tonight_1.wav'",
            'created_at' => date('Y-m-d H:i:s'),
            'deleted_at'=> date('Y-m-d H:i:s'),
            'user_id'=> 1,
            'song_id'=> 1,

        ]);

    }
}
