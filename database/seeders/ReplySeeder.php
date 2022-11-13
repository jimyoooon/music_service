<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Reply;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replies')->insert([
            'body'=> 'ありがとうございます',
            'file'=> "'C:\Users\81805\Desktop\Steelix - Lay It Down (Instrumental) _ tell your friends you ain't coming out tonight_1.wav'",
            'created_at' => date('Y-m-d H:i:s'),
            'deleted_at'=> date('Y-m-d H:i:s'),
            'user_id'=> 1,
            'comment_id'=> 1,

        ]);

    }
}
