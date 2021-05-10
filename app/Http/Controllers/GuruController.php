<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;

class GuruController extends Controller
{

    public function __construct()
    {
        $this->GuruModel = new GuruModel();
    }

    public function index()
    {
        $data = [
            'guru'=> $this->GuruModel->allData(),
        ];
        return view('v_guru', $data);
    }

    public function detail($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
        }


        $data = [
            'guru'=> $this->GuruModel->detailData($id_guru),
        ];
        return view('v_detailguru', $data);
    }

    public function add()
    {
        return view('v_addguru');
    }

    public function insert()
    {
        Request()->validate([
            'nip_guru' => 'required|unique:t_guru,nip_guru|min:4|max:5',
            'nama_guru' => 'required',
            'matpel' => 'required',
            'foto_guru' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'nip_guru.required'=>'Tidak Boleh Kosong',
            'nama_guru.required'=>'Tidak Boleh Kosong',
            'matpel.required'=>'Tidak Boleh Kosong',
            'foto_guru.required'=>'Tidak Boleh Kosong',

            'nip_guru.unique'=>'NIP Sudah Tersedia',
            'nip_guru.min'=>'Minimal 4 Karakter',
            'nip_guru.max'=>'Maksimal 5 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload foto
        $file = Request()->foto_guru;
        $fileName = Request()->nip_guru.'.' . $file->extension();
        $file->move(public_path('foto_guru'), $fileName);

        $data = [
            'nip_guru' => Request()->nip_guru,
            'nama_guru' => Request()->nama_guru,
            'matpel' => Request()->matpel,
            'foto_guru' => $fileName,
        ];

        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan','Data Berhasil Ditambahkan');
    }

    public function edit($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
        }
        $data = [
            'guru'=> $this->GuruModel->detailData($id_guru),
        ];
        return view('v_editguru', $data);
    }

    public function update($id_guru)
    {
        Request()->validate([
            'nip_guru' => 'required|min:4|max:5',
            'nama_guru' => 'required',
            'matpel' => 'required',
            'foto_guru' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'nip_guru.required'=>'Tidak Boleh Kosong',
            'nama_guru.required'=>'Tidak Boleh Kosong',
            'matpel.required'=>'Tidak Boleh Kosong',

            'nip_guru.min'=>'Minimal 4 Karakter',
            'nip_guru.max'=>'Maksimal 5 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if(Request()->foto_guru <> "")  {
            //jika ingin ganti foto
            //upload foto
            $file = Request()->foto_guru;
            $fileName = Request()->nip_guru.'.' . $file->extension();
            $file->move(public_path('foto_guru'), $fileName);

            $data = [
                'nip_guru' => Request()->nip_guru,
                'nama_guru' => Request()->nama_guru,
                'matpel' => Request()->matpel,
                'foto_guru' => $fileName,
            ];

        $this->GuruModel->editData($id_guru, $data);
        }else {
            //jika tidak ingin ganti foto
            $data = [
                'nip_guru' => Request()->nip_guru,
                'nama_guru' => Request()->nama_guru,
                'matpel' => Request()->matpel,
            ];

        $this->GuruModel->editData($id_guru, $data);
        }

        return redirect()->route('guru')->with('pesan','Data Berhasil Diupdate');
    }

    public function delete($id_guru)
    {
        //hapus foto dari file
        $guru = $this->GuruModel->detailData($id_guru);
        if ($guru->foto_guru <> "") {
            unlink(public_path('foto_guru') . '/' . $guru->foto_guru);
        }

        $this->GuruModel->deleteData($id_guru);
        return redirect()->route('guru')->with('pesan','Data Berhasil Dihapus');
    }
}
