<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    //
    public function index()
    {
        return view('add-barang');
    }

    public function getData()
    {
        // $data=Contact::paginate(5);
        $data=Barang::all();
        return view('list-barang',['datas'=>$data]);
    }
    public function editData($id)
    {
        $data=Barang::where('id', '=', $id)->firstOrFail();
        return view('edit-barang',['item'=>$data]);
    }
    public function store(Request $request)
    {
        $check = Barang::where('kode_barang', $request->kode_barang)->count();
        var_dump($check);
        if ($check != 0) {
            return redirect('add-barang')->with('status', 'Data gagal ditambahkan, Kode Barang sudah ada');
        } else {
            $post = new Barang;
            $post->kode_barang = $request->kode_barang;
            $post->nama_barang = $request->nama_barang;
            $post->save();
            return redirect('list-barang')->with('status', 'Data Barang berhasil ditambahkan');
        }
        
        
    }

    public function updateData(Request $request)
    {
        $request->validate([
            'nama_barang'=>'required'
        ]);
        $barang = Barang::findOrFail($request->id);
        $barang->update([
            'kode_barang'     => $request->kode_barang,
            'nama_barang'   => $request->nama_barang
        ]);
        if($barang) {
            return redirect('/list-barang')->with('success','Data Barang Berhasil diupdate');
        }
        
        

    }
    public function deleteData($id)
    {
        $data=Barang::find($id);
        $data->delete();
        return back()->with('success','Data Barang Berhasil dihapus');
    }
}
