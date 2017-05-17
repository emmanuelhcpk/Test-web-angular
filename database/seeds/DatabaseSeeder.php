<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(array(
            'name' =>'Admin',
            'email'     => 'admin@admin.com',
            'password' => Hash::make('123456789') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
        // $this->call(UsersTableSeeder::class);
    }
}
