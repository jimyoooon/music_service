<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name'=> 'ゆ',
                'email'=> '84smt1',
                'password'=> 'jiminyo0705.',
                'age'=> '22',
                'image'=> '"C:\Users\81805\Pictures\Screenshots\スクリーンショット (21).png"',
                'feeling'=> 'いまはとてもいい気分です。',
                'additional_question'=> '今風のドライブで聞くいい感じの曲が聞きたいです。',
                'sns'=> 'https://twitter.com/home',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at'=> date('Y-m-d H:i:s'),
                'genre_id'=> 1,
                'melody_id'=> 1,
        ]);
    }
}
