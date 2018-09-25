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
            ['nm_level' =>'Pemilik Fitness'],
            ['nm_level' =>'Pegawai Fitness']

        ]);
            /*
        DB::table('tb_user')
        ->insert([
            ['username' => 'admin','email'=> 'admin@cloud.com','password'=>bcrypt('admin') ,'id_level' => '1'],
            ['username' => 'pemilik','email'=> 'pemilik@cloud.com','password'=>bcrypt('pemilik') ,'id_level' => '2'],
            ['username' => 'pegawai','email'=> 'pegawai@cloud.com','password'=>bcrypt('pegawai') ,'id_level' => '3'],
        ]);

        DB::table('tb_paket')
        ->insert([
            ['nm_paket' => 'Zumba'],
            ['nm_paket' => 'Fitnes']
        ]);

        DB::table('tb_paketdetail')
        ->insert([
            ['harga' => 0,'bulan'=>0, 'id_paket'=>1, 'type_paket'=>0],
            ['harga' => 50000,'bulan'=>1, 'id_paket'=>2, 'type_paket'=>1],
        ]);*/
    }
}
