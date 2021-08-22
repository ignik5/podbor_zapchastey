<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Администратор',
            'email' => 'it@teplospeccentr.ru',
            'password' => bcrypt('m1suioTsc'),
        ]);//создаем сид для первого пользователя админ
    }
}
