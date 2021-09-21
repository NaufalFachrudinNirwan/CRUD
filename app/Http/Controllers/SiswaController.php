<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;
use App\Models\TagihanModel;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->SiswaModel = new SiswaModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'siswa' => $this->SiswaModel->allData(),
        ];
        return view('v_siswa', $data);
    }

    public function detail($nis)
    {
        if (!$this->SiswaModel->detailData($nis)) {
            abort(404);
        };

        $data = [
            'siswa'=> $this->SiswaModel->detailData($nis),
        ];
        return view('v_detailsiswa', $data);
    }

}
