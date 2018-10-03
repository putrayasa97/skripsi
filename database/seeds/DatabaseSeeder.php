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
        DB::table('tb_service')
        ->insert([
            ['nm_service' =>'Free', 'data_limit'=>'50', 'harga'=>'0', 'type_service'=>'0'],
            ['nm_service' =>'Basic', 'data_limit'=>'250', 'harga'=>'25000', 'type_service'=>'0'],
            ['nm_service' =>'Premium', 'data_limit'=>'500', 'harga'=>'50000', 'type_service'=>'0']

        ]);

            /*
        DB::table('tb_user')
        ->insert([
            ['username' => 'pemilik','email'=> 'pemilik@cloud.com','password'=>bcrypt('pemilik') ,'id_level' => '1'],
            ['username' => 'pegawai','email'=> 'pegawai@cloud.com','password'=>bcrypt('pegawai') ,'id_level' => '2'],
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
