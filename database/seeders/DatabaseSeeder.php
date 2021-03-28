<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO users (username,password,updated_at,created_at)
                         VALUES (?,?,?,?)',['user',Hash::make('user'),Carbon::now(),Carbon::now()]);
        DB::insert('INSERT INTO settings (label,value)
                         VALUES (?,?)',['cache_countries','off']);
    }
}
