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

        DB::table('tb_leveluser')
        ->insert([
            ['nm_level' => 'Administator'],
            ['nm_level' =>'Pemilik Fitness'],
            ['nm_level' =>'Pegawai Fitness']

        ]);

        DB::table('tb_user')
        ->insert([
            ['username' => 'admin','email'=> 'admin@cloud.com','password'=>bcrypt('admin') ,'id_level' => '1'],
            ['username' => 'pemilik','email'=> 'pemilik@cloud.com','password'=>bcrypt('pemilik') ,'id_level' => '2'],
            ['username' => 'pegawai','email'=> 'pegawai@cloud.com','password'=>bcrypt('pegawai') ,'id_level' => '3'],
        ]);
    }
}
