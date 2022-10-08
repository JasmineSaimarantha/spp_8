<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Models\Pembayaran;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Tunggakan;

class LaporanController extends Controller
{
    public function showId()
    {
        $report = Pembayaran::select('users.name', 'kelas.nama_kelas', 'kelas.angkatan', 'spp.nominal', 'pembayaran.bayar', 'pembayaran.bulan_spp', 'pembayaran.status')
        ->join('users', 'users.nisn', 'pembayaran.nisn')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id_kelas')
        ->join('spp', 'users.id_spp', '=', 'spp.id_spp')
        ->get();
        return view('pembayaran_crud.report', compact('report'));
    }

    public function historyId($id)
    {
        $report = Pembayaran::select('users.name', 'kelas.nama_kelas', 'kelas.angkatan', 'spp.nominal', 'pembayaran.bayar', 'pembayaran.bulan_spp', 'pembayaran.status')
        ->join('users', 'users.nisn', 'pembayaran.nisn')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id_kelas')
        ->join('spp', 'users.id_spp', '=', 'spp.id_spp')
        ->where('users.id', $id)
        ->get();
        return view('pembayaran_crud.report', compact('report'));
    }

    public function downloadreport()
    {
        $report=Pembayaran::all();
        $pdf=PDF::loadView('pembayaran_crud.report', compact('report'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('history.pdf');
    }
}
