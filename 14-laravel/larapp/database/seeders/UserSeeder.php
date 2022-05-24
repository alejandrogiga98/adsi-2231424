<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        //
        DB::table('users')->insert([
            'fullname' => 'Kazuma Kano',
            'email' => 'kazumakano@correo.com',
            'phone' => 31743888,
            'birthdate' => '1991-09-03',
            'gender' => 'Male',
            'address' => 'Calle 26 # 25',
            'role' => 'Admin',
            'password' => Hash::make('admin')
        ]);
        //Metodo ORM
        $user = new User;
        $user->fullname = 'Kanami';
        $user->email = 'kanami@correo.com';
        $user->phone = 30058965;
        $user->birthdate = '2001-05-26';
        $user->gender = 'Female';
        $user->address = 'Avenida 25 # 45';
        $user->created_at = '2022-04-17 01:33:10';
        $user->password = bcrypt('Customer');
        $user->save();

        //Metodo ORM
        $user = new User;
        $user->fullname = 'Ryuhou';
        $user->email = 'ryuhou@correo.com';
        $user->phone = 35098426;
        $user->birthdate = '2003-01-12';
        $user->gender = 'Female';
        $user->address = 'Carrera 35 # 35 - 18';
        $user->created_at = '2022-02-07 01:33:10';
        $user->password = bcrypt('admin');
        $user->save();
    }
}
