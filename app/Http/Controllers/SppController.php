<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\Models\Spp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SppController extends Controller
{
    /*function __construct()
		{
		    Config::set('jwt.user', \App\Models\Petugas::class);
		    Config::set('auth.providers', ['users' => [
		            'driver' => 'eloquent',
		            'model' => \App\Models\Petugas::class,
		        ]]);
		}*/

    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'angkatan' => 'required',
            'tahun' => 'required',
            'nominal' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $save = Spp::create([
            'angkatan' => $req->get('angkatan'),
            'tahun' => $req->get('tahun'),
            'nominal' => $req->get('nominal')
        ]);
        /*if($save){
            return response()->json(['status' => 'spp berhasil ditambhakan']);
        } else {
            return response()->json(['status' => 'spp gagal ditambahkan']);
        }*/
        $spp = DB::table('spp')->get();
        return redirect('/spp')->with(compact('spp'));
    }

    public function tampilStore(){
        return view('spp_crud.create-spp');
    }

    public function update(Request $req, $id){
        // dd($id);
        $validator = Validator::make($req->all(), [
            'angkatan' => 'required',
            'tahun' => 'required',
            'nominal' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $update = Spp::where('id_spp', $id)->update([
            'angkatan' => $req->get('angkatan'),
            'tahun' => $req->get('tahun'),
            'nominal' => $req->get('nominal')
        ]);
        /*if($update){
            return response()->json(['status' => 'spp berhasil diubah']);
        } else {
            return response()->json(['status' => 'spp gagal diubah']);
         }*/
        $spp = DB::table('spp')->get();
        return redirect('/spp')->with(compact('spp'));
        // dd($update);
    }

    public function tampilUpdate($id){
        $updates = Spp::find($id);
        return view('spp_crud.update-spp', compact('updates'));
    }

    public function delete($id){
        $hapus = Spp::where('id_spp', $id)->delete();
        // if($hapus){
        //     return response()->json(['status' => 'spp berhasil dihapus']);
        // } else {
        //     return response()->json(['status' => 'spp gagal dihapus']);
        // }
        $spp = DB::table('spp')->get();
        return redirect('/spp')->with(compact('spp'));
    }

    public function tampilSpp(){
        $spp = DB::table('spp')->get();
        return view('spp_crud.spp', compact('spp'));
    }

}
