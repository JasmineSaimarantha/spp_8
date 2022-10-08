<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Config;
use Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    // function __construct(){
	// 	Config::set('jwt.user', \App\Models\Petugas::class);
	// 	Config::set('auth.providers', ['users' => [
	// 	    'driver' => 'eloquent',
	// 	    'model' => \App\Models\Petugas::class,
	// 	]]);
	// }
    public function loginSiswa(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        	'nisn'=>'required|string|max:255',
            'name' => 'required|string|max:255',
            'alamat'=>'required|string',
            'no_telp'=>'required|string|max:255',
            'id_kelas'=>'required',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|max:255|unique:siswa'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $siswa = Siswa::create([
        	'nisn'=>$request->get('nisn'),
        	'name'=>$request->get('nama'),
        	'alamat'=>$request->get('alamat'),
        	'no_telp'=>$request->get('no_telp'),
        	'password'=>Hash::make($request->get('password')),
            'email' => $request->get('email'),
        	'id_kelas'=>$request->get('id_kelas'),
        ]);
        $siswa = DB::table('users')->get();
        return redirect('/')->with(compact('siswa'));
    }

    public function tampilRegister(){
        // $siswa = DB::table('siswa')->get();
        // return redirect('/')->with(compact('siswa'));
        $kelas = DB::table('kelas')->select('id_kelas', 'nama_kelas')->get();
        return view('home.register', compact('kelas'));
    }

    /*public function getprofile()
    {
        return response()->json(['data'=>JWTAuth::user()]);
    }*/

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nisn'      => 'required',
            'nis'       => 'required',
            'name'      => 'required|string|max:255',
            'id_kelas'  => 'required',
            'id_spp'  => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required',
            'email'   => 'required',
            'password'   => 'required|string|min:6',
            // 'jk'        => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $save = User::create([
            'nisn'      => $request->get('nisn'),
            'nis'       => $request->get('nis'),
        	'name'      => $request->get('name'),
        	'id_kelas'  => $request->get('id_kelas'),
            'id_spp'    => $request->get('id_spp'),
        	'alamat'    => $request->get('alamat'),
        	'no_telp'   => $request->get('no_telp'),
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password')),
            // 'jk'        => $request->get('jk'),
            'role'      => 'siswa'
        ]);
        // if($siswa){
        //     return response()->json(['status' => 'siswa berhasil ditambahkan']);
        // } else {
        //     return response()->json(['status' => 'siswa gagal ditambahkan']);
        // }
        // dd($validator);
        // $kelas = DB::table('kelas')->select('id_kelas', 'nama_kelas')->get();
        $siswa = DB::table('users')->where('role', 'siswa')->get();
        return redirect('/siswa')->with(compact('siswa'));
    }

    public function tampilStore(){
        $kelas = DB::table('kelas')->select('id_kelas', 'nama_kelas')->get();
        $spp = DB::table('spp')->select('id_spp', 'nominal')->get();
        $siswa = DB::table('users')->where('role', 'siswa')->get();
        // return response()->json(['data'=>$siswa]);
        return view('siswa_crud.siswa-create', compact('kelas', 'siswa', 'spp'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nisn'      => 'required',
            'nis'       => 'required',
            'name'      => 'required|string|max:255',
            'id_kelas'  => 'required',
            'id_spp'  => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required',
            // 'jk'        => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $save = User::where('id', $id)->update([
            'nisn'      => $request->get('nisn'),
            'nis'       => $request->get('nis'),
        	'name'      => $request->get('name'),
        	'id_kelas'  => $request->get('id_kelas'),
            'id_spp'    => $request->get('id_spp'),
        	'alamat'    => $request->get('alamat'),
        	'no_telp'   => $request->get('no_telp'),
            // 'jk'        => $request->get('jk'),
            'role'      => 'siswa'
        ]);
        // if($update){
        //     return response()->json(['status' => 'siswa berhasil diupdate']);
        // } else {
        //     return response()->json(['status' => 'siswa gagal diupdate']);
        // }
        $siswa = DB::table('users')->where('role', 'siswa')->get();
        return redirect('/siswa')->with(compact('siswa'));
    }

    public function tampilUpdate($id){
        $kelas = DB::table('kelas')->select('id_kelas', 'nama_kelas')->get();
        $spp = DB::table('spp')->select('id_spp', 'nominal')->get();
        $updates = User::find($id);
        return view('siswa_crud.siswa-update', compact('updates', 'kelas', 'spp'));
    }

    public function delete($id){
        $hapus = User::where('id', $id)->delete();
        // if($hapus){
        //     return response()->json(['status' => 'siswa berhasil dihapus']);
        // } else {
        //     return response()->json(['status' => 'siswa gagal dihapus']);
        // }
        $siswa = DB::table('users')->where('role', 'siswa')->get();
        return redirect('/siswa')->with(compact('siswa'));
    }

    // public function getSiswa(){
    //     $getsiswa = User::all()->where('role', 'siswa');
    //     return redirect('/siswa', compact('getsiswa'));
    // }

    public function tampilSiswa(){
        $siswa = DB::table('users')->where('role', 'siswa')->join('kelas', 'users.id_kelas', 'kelas.id_kelas')
                                                           ->join('spp', 'users.id_spp', 'spp.id_spp')
                                                           ->get();
        return view('siswa_crud.siswa', compact('siswa'));
    }

    /*public function getSiswa(Request $request, $id){
        $profil = Siswa::where('nis', $id)->get([
            'nisn'=>$request->get('nisn'),
        	'nama'=>$request->get('nama'),
        	'alamat'=>$request->get('alamat'),
        	'no_telp'=>$request->get('no_telp'),
        	'password'=>Hash::make($request->get('password')),
            'email' => $request->get('email'),
        	'id_kelas'=>$request->get('id_kelas'),
        ]);
        return response($profil);
    }*/

    public function register2(Request $request){
        $validator = Validator::make($request->all(), [
            'nis'       => 'required',
            'name'      => 'required|string|max:255',
            'id_kelas'  => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $save = User::create([
            'nis'       => $request->get('nis'),
        	'name'      => $request->get('name'),
        	'id_kelas'  => $request->get('id_kelas'),
        	'alamat'    => $request->get('alamat'),
        	'no_telp'   => $request->get('no_telp'),
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password')),
            'role'      => 'siswa'
        ]);

        $token = JWTAuth::fromUser($save);
        return response()->json(compact('save', 'token'), 201);

        // $register = DB::table('users')->get();
        // return redirect('/')->with(compact('register'));
    }
}
