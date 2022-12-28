<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function insert(){

        //RAW
        $sql = DB::insert("INSERT INTO mahasiswas (npm,nama,jenis_kelamin,alamat,tempat_lahir,tanggal_lahir,photo,created_at,updated_at) VALUES ('20106370086', 'Mirza Muhamad Alghivary','Laki-Laki','Jl.Taman Buah','Jakarta Barat','2002-10-28','mirza.png',now(),now())");
        dump($sql);

        //Query Builder
        $sql1 = DB::table('mahasiswas')->insert(
            [
                'npm' => '20106370087',
                'nama' => 'Zayn Zen',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat' => 'Jl.Honor',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2002-07-17',
                'photo' => 'zayn.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dump($sql1);

        //ELOQUENT
        $sql2 = Mahasiswa::create(
            [
                'npm' => '20106370088',
                'nama' => 'Naomi Crystal',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl.Pearl Harbour',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2002-08-18',
                'photo' => 'naomi.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
            dump($sql2);
        return "Data berhasil diproses";
    }

    public function select(){

        //RAW
        $sql = DB::select("SELECT * FROM mahasiswas");
        dd($sql);

        //Query Builder
        $sql1 = DB::table('mahasiswas')->get();
        dd($sql1);

        //ELOQUENT
        $sql2 = Mahasiswa::all();
        dd($sql2);
    }

    public function update(){

        //RAW
        $sql = DB::update("UPDATE mahasiswas SET alamat='JL.Rossaine',updated_at=now() WHERE id=?",[1]);
        dump($sql);

        //Query Builder
        $sql1 = DB::table('mahasiswas')
        ->where('id','2')
        ->update(
            [
                'alamat' => 'JL.Ghastly',
                'updated_at' => now()
            ]
            );
        dump($sql1);

        #ELOQUENT
        $sql2 = Mahasiswa::where('id','3')->first()->update([
            'alamat' => 'JL.Visage',
            'updated_at' => now()
        ]);
        dump($sql2);

    }

    public function delete(){

        //RAW
        $sql = DB::delete("DELETE FROM mahasiswas WHERE npm=?",['20106370086']);
        dump($sql);

        //Query Builder
        $sql1 = DB::table('mahasiswas')
        ->where('npm','20106370087')
        ->delete();
        dump($sql1);

        //ELOQUENT
        $sql2 = Mahasiswa::where('npm','20106370088')->delete();
        dump($sql2);
    }
}
