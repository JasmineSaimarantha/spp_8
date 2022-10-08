<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class LoginController extends Controller
{
    // public function __construct()
    //     {
    //         // $this->middleware('guest')->except('logout');
    //         $this->middleware('guest:admin', ['except' => ['logout']]);
    //         $this->middleware('guest:siswa', ['except' => ['logout']]);
    //     }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        // if(Auth::guard('admin')->attempt($credentials)){
        //     return view('home.beranda');
        // } else if(Auth::guard('siswa')->attempt($credentials)) {
        //     return redirect('/beranda');
        // } else {
        //     Session::flash('message', 'email atau password salah!');
        //     Session::flash('alert-class', 'alert-danger');
        //     return redirect('/');
        // }
        // dd($request->all());
        // $credentials = [
        //     'email'=>$request->get('email'),
        //     'password'=>$request->get('password')
        // ];
        // $credentials = $request->validate([
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        if(Auth::attempt($credentials)){
            return redirect('/beranda');
        } else {
            Session::flash('message', 'email atau password salah!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/');
        }
    }

    public function loginSiswa(Request $request){
        $credentials = $request->only('nisn');
        if(Auth::guard('siswa')->attempt($credentials)){
            return redirect('/beranda');
        } else {
            Session::flash('message', 'NISN tidak terdaftar!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/login/siswa');
        }
    }

    public function logout(){

        // if(Auth::guard('siswa')->check()){
        //     Auth::guard('siswa')->logout();
        //     return redirect('/');
        // } else if(Auth::guard('admin')->check()){
        //     Auth::guard('admin')->logout();
        //     return redirect('/');
        // }
        Auth::logout();
        return redirect('/');
    }

    public function tampil(){
        return view('home.login');
    }

    public function tampilLoginS(){
        return view('home.loginSiswa');
    }

    public function registerAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
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
            'role'      => 'admin'
        ]);

        $token = JWTAuth::fromUser($save);
        return response()->json(compact('save', 'token'), 201);

        // $register = DB::table('users')->get();
        // return redirect('/')->with(compact('register'));
    }

    public function registerPetugas(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
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
            'role'      => 'petugas'
        ]);

        $token = JWTAuth::fromUser($save);
        return response()->json(compact('save', 'token'), 201);

        // $register = DB::table('users')->get();
        // return redirect('/petugas');
    }

    public function registerSiswa(Request $request){
        $validator = Validator::make($request->all(), [
            'nisn'      => 'required',
            'nis'       => 'required',
            'name'      => 'required|string|max:255',
            'id_kelas'  => 'required',
            'id_spp'    => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6',
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
            'role'      => 'siswa'
        ]);

        $token = JWTAuth::fromUser($save);
        return response()->json(compact('save', 'token'), 201);

        // $register = DB::table('users')->get();
        // return redirect('/')->with(compact('register'));
    }

    public function showsiswa()
    {
        $siswa = User::all()->where('role', 'siswa');
        return response()->json(['data'=>$siswa]);
        // return view('siswa_crud.siswa', compact('siswa'));
    }
    public function showeditsiswa($id)
    {
        $siswa = User::find($id)->where('role', 'siswa');
        return response()->json(['data'=>$siswa]);
        // return view('siswa_crud.siswa-update', compact('siswa'));
        // return view('/admin');
    }

    public function editsiswa(Request $req, $id)
    {
        $req->validate([
            'name'      => 'required|string|max:255',
            'id_kelas'  => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required',
            'email'     => 'required|string|email|max:255|unique:users',
        ]);

        $update=User::find($id);
        $update->name           = $req->name;
        $update->id_kelas       = $req->id_kelas;
        $update->alamat         = $req->alamat;
        $update->no_telp        = $req->no_telp;
        $update->email          = $req->email;
        $update->update();

        // return redirect('/');
        return response()->json(['data'=>$update]);
        // $petugas = User::all()->where('role', 'petugas');

        // return view('siswa_crud.', compact('petugas'));
    }

    public function hapussiswa($id)
    {
        $destroy=User::find($id)->delete();
        $petugas = User::all()->where('role', 'petugas');
        return redirect('/petugas');
    }
}
