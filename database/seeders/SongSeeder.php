<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Song;


class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'name'=> '踊り子',
            'background'=> 'OOしている時に思いつきました。',
            'overview'=> '今風なコード進行で曲を作りました。',
            'image'=> '"C:\Users\81805\Pictures\Screenshots\スクリーンショット (57).png"',
            'movie'=> '"C:\Users\81805\Pictures\Camera Roll\WIN_20221108_13_35_48_Pro.mp4"',
            'audio'=> "'C:\Users\81805\Desktop\Steelix - Lay It Down (Instrumental) _ tell your friends you ain't coming out tonight_1.wav'",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at'=> date('Y-m-d H:i:s'),
            'melody_id'=> 1,
            'status_id'=> 1,
            'genre_id'=> 1,
        ]);

    }
}
