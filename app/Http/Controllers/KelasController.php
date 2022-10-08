<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;
use Config;
use Illuminate\Support\Facades\DB;
use Alert;

class KelasController extends Controller
{
    // function __construct()
	// 	{
	// 	    Config::set('jwt.user', \App\Models\Petugas::class);
	// 	    Config::set('auth.providers', ['users' => [
	// 	            'driver' => 'eloquent',
	// 	            'model' => \App\Models\Petugas::class,
	// 	        ]]);
	// 	}

    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'nama_kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $save = Kelas::create([
                'nama_kelas' => $req->get('nama_kelas'),
                'jurusan' => $req->get('jurusan'),
                'angkatan' => $req->get('angkatan')
        ]);
    //     if($save){
    //         return response()->json(['status' => 'kelas berhasil ditambhakan']);
    //     } else {
    //         return response()->json(['status' => 'kelas gagal ditambahkan']);
    //     }
        $kelas = DB::table('kelas')->get();
        return redirect('/kelas')->with(compact('kelas'));
    }

    public function tampilStore(){
        return view('kelas_crud.create-kelas');
    }

    public function update(Request $req, $id){
        $validator = Validator::make($req->all(), [
            'nama_kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $update = Kelas::where('id_kelas', $id)->update([
            'nama_kelas' => $req->get('nama_kelas'),
            'jurusan' => $req->get('jurusan'),
            'angkatan' => $req->get('angkatan')
        ]);
        // if($update){
        //     return response()->json(['status' => 'kelas berhasil diubah']);
        // } else {
        //     return response()->json(['status' => 'kelas gagal diubah']);
        // }
        $kelas = DB::table('kelas')->get();
        return redirect('/kelas')->with(compact('kelas'));
    }

    public function tampilUpdates($id){
        $updates = Kelas::find($id);
        return view('kelas_crud.update-kelas')->with(compact('updates'));
    }

    public function delete($id){
        $hapus = Kelas::where('id_kelas', $id)->delete();
        // if($hapus){
        //     return response()->json(['status' => 'kelas berhasil dihapus']);
        // } else {
        //     return response()->json(['status' => 'kelas gagal dihapus']);
        // }
        $kelas = DB::table('kelas')->get();
        return redirect('/kelas')->with(compact('kelas'));
    }

    public function tampil(){
        $kelas = DB::table('kelas')->get();
        return view('kelas_crud.kelas', compact('kelas'))   ;
    }
}

