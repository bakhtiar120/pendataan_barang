<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailMutasi;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MutasiBarangController extends Controller
{
    //
    public function index()
    {
        $data=Barang::all();
        return view('add-mutasi-barang',['barangs'=>$data]);
    }
    public function getData()
    {
        // $data=Contact::paginate(5);
        $data = Mutasi::all();
        return view('list-mutasi-barang', ['datas' => $data]);
    }
    public function editData($id)
    {
        $barangs= Barang::all();
        $mutasis = DB::select("SELECT id as id_mutasi,tanggal,nomor_bukti from mutasi");
        $detail_mutasis = DetailMutasi::where('id_mutasi', '=', $id)->get();
        return view('edit-mutasi-barang', compact('mutasis', 'detail_mutasis', 'barangs'));
    }
    public function store(Request $request)
    {
        $post = new Barang;
        $post->kode_barang = $request->kode_barang;
        $post->nama_barang = $request->nama_barang;
        $post->save();
        return redirect('add-mutasi-barang')->with('status', 'Data Barang berhasil ditambahkan');
    }
    public function post_mutasi_barang(Request $request)
    {
        $data = Mutasi::create(
            [
                'tanggal' => $request->tgl_mutasi,
                'nomor_bukti' => $request->nomor_bukti
            ]
        );
        for ($a = 0; $a < count($request->data_detail_mutasi); $a++) {
            $data_detail_mutasi = $request->data_detail_mutasi[$a];
            $kode_barang = $data_detail_mutasi['kode_barang'];
            $indikator = $data_detail_mutasi['indikator_barang'];
            $quantity = $data_detail_mutasi['quantity'];
            DetailMutasi::create(
                [
                    'id_mutasi' => $data->id,
                    'kode_barang' => $kode_barang,
                    'indikator' => $indikator,
                    'quantity' => $quantity
                ]
            );
        }
        //         ]);
        return response()->json(["status" => "success", "message" => "pembuatan data mutasi sukses"]);
    }

    public function updateData(Request $request)
    {
        
        if($this->delete_data($request->id_mutasi)==true) {
            $data = Mutasi::create(
                [
                    'tanggal' => $request->tgl_mutasi,
                    'nomor_bukti' => $request->nomor_bukti
                ]
            );
            for ($a = 0; $a < count($request->data_detail_mutasi); $a++) {
                $data_detail_mutasi = $request->data_detail_mutasi[$a];
                $kode_barang = $data_detail_mutasi['kode_barang'];
                $indikator_barang = $data_detail_mutasi['indikator_barang'];
                $quantity = $data_detail_mutasi['quantity'];
                DetailMutasi::create(
                    [
                        'id_mutasi' => $data->id,
                        'kode_barang' => $kode_barang,
                        'indikator' => $indikator_barang,
                        'quantity' => $quantity,
                    ]
                );
            }
            //         ]);
            return response()->json(["status" => "success", "message" => "Update data mutasi sukses"]);
        }
    }

    function delete_data($id) {
        $mutasi = Mutasi::find($id);
        $mutasi->forceDelete();
        $delete_detail = DetailMutasi::where('detail_mutasi.id_mutasi', $id)->forceDelete();
        return true;
    }

    function delete_mutasi_barang($id)
    {

            if($this->delete_data($id)==true) {
                return redirect('/list-mutasi-barang')
            ->with([
                'success' => 'Data Berhasil Dihapus'
            ]);
            }
            
    }

}
