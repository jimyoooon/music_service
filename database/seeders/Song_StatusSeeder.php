<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Status;

class Song_StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('song_status')->insert([
            'song_id'=> 1,
            'status_id'=> 1,
        ]);

    }
}
