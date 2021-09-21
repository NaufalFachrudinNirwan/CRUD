<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagihanModel;

class TagihanController extends Controller
{
    public function __construct()
    {
        $this->TagihanModel = new TagihanModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'user' => $this->TagihanModel->allData(),
        ];
        return view('v_tagihan', $data);
    }

    public function detail($no_tagihan)
    {
        if (!$this->TagihanModel->detailData($no_tagihan)) {
            abort(404);
        }

        $data = [
            'user'=> $this->TagihanModel->detailData($no_tagihan),
        ];
        return view('v_detailtagihan', $data);
    }

    public function add()
    {
        return view('v_addtagihan');
    }

    public function insert()
    {
        Request()->validate([
            'no_tagihan' => 'required|unique:t_guru,nip_guru|min:7|max:10',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'periode' => 'required',
            'nis' => 'required',
        ],[
            'no_tagihan.required'=>'Tidak Boleh Kosong',
            'tanggal.required'=>'Tidak Boleh Kosong',
            'keterangan.required'=>'Tidak Boleh Kosong',
            'periode.required'=>'Tidak Boleh Kosong',
            'nis.required'=>'Tidak Boleh Kosong',

            'no_tagihan.unique'=>'NIP Sudah Tersedia',
            'no_tagihan.min'=>'Minimal 7 Karakter',
            'no_tagihan.max'=>'Maksimal 10 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        $data = [
            'no_tagihan' => Request()->no_tagihan,
            'tanggal' => Request()->tanggal,
            'keterangan' => Request()->keterangan,
            'periode' => Request()->periode,
            'nis' => Request()->nis,
        ];

        $this->TagihanModel->addData($data);
        return redirect()->route('tagihan')->with('pesan','Data Berhasil Ditambahkan');
    }
}
