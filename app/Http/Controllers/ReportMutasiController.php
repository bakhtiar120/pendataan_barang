<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailMutasi;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportMutasiController extends Controller
{
    //
    public function index()
    {
        return view('form-report-mutasi');
    }
    public function search_mutasi(Request $request)
    {
        $query_data = Mutasi::join('detail_mutasi', 'mutasi.id', '=', 'detail_mutasi.id_mutasi')
        ->join('barang', 'detail_mutasi.kode_barang', '=', 'barang.kode_barang')
            ->where('barang.nama_barang', 'LIKE', "%{$request->nama_barang}%") 
        ->whereBetween('mutasi.tanggal',[$request->tanggal_awal,$request->tanggal_akhir])
            ->select('mutasi.tanggal', 'mutasi.nomor_bukti', 'barang.nama_barang','detail_mutasi.indikator')
            ->get();
        return view('report-mutasi',compact('query_data'));
    }
    
}
