<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Usuario';
        $user->email = 'usuario@gmail.com';
        $user->password = bcrypt('usuario');

        $user->save();
    }
}
