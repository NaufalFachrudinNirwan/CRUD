<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiswaModel extends Model
{
    public function allData()
    {
        return DB::table('t_siswa')
            ->leftJoin('t_kelas', 't_kelas.id_kelas', '=', 't_siswa.id_kelas')
            ->leftJoin('t_mapel', 't_mapel.id_mapel', '=', 't_siswa.id_mapel')
            ->get();
    }

    public function detailData($nis)
    {
        return DB::table('t_siswa')->where('nis', $nis)
        ->leftJoin('t_kelas', 't_kelas.id_kelas', '=', 't_siswa.id_kelas')
        ->leftJoin('t_mapel', 't_mapel.id_mapel', '=', 't_siswa.id_mapel')
        ->first();
    }

}
