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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'type' => \App\User::TYPE_ROOT,
        ]);
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@root.com',
            'password' => bcrypt('123456'),
            'type' => 0,
            'type' => \App\User::TYPE_ROOT,
        ]);
    }
}
