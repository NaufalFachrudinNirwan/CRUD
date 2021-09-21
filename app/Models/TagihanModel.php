<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TagihanModel extends Model
{
    public function allData()
    {
        return DB::table('t_tagihan_m')->get();
    }

    public function detailData($no_tagihan)
    {
        return DB::table('t_tagihan_m')->where('no_tagihan', $no_tagihan)->first();
    }

    public function addData($data)
    {
        DB::table('t_tagihan_m')->insert($data);
    }
}
