<?php

namespace App\Http\Controllers;

// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Config;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PetugasController extends Controller
{
    // function __construct(){
	// 	Config::set('jwt.user', \App\Models\Petugas::class);
	// 	Config::set('auth.providers', ['users' => [
	// 	    'driver' => 'eloquent',
	// 	    'model' => \App\Models\Petugas::class,
	// 	]]);
	// }
    public function loginPetugas(Request $request){
        $credentials = $request->only('email', 'password');
        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'invalid_credentials', 400]);
            }
        } catch(JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function storePetugas(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:petugas',
            'password' =>'required|string|min:6|confirmed',
            // 'role' => 'required|string'
        ]);
        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }

        $save = User::create([
        	'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => 'petugas'
        ]);
        // $petugas = DB::table('users')->select('role', 'petugas')->get();
        return redirect('/petugas');
        //$token = JWTAuth::fromUser($petugas);
        //return response()->json(compact('petugas', 'token'), 201);
    }

    public function tampilStoreP(){
        return view('petugas_crud.create-petugas');
    }

    public function tampilPetugas(){
        $petugas = DB::table('users')->where('role', 'petugas')->get();
        return view('petugas_crud.petugas', compact('petugas'));
    }

    public function updatePetugas(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:petugas',
            'password' =>'required|string|min:6|confirmed',
            // 'role' => 'required|string'
        ]);
        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }
        $save = User::where('id', $id)->update([
        	'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => 'petugas'
        ]);
        // $petugas = DB::table('users')->select('role', 'petugas')->get();
        return redirect('/petugas');
    }

    public function tampilUpdateP($id){
        $edit = User::find($id);
        return view('petugas_crud.update-petugas', compact('edit'));
    }

    public function deletePetugas($id){
        $delete = User::find($id)->delete();
        // $petugas = DB::table('users')->select('role', 'petugas')->get();
        return redirect('/petugas');
    }

    // public function profilPetugas()
    // {
    // 	return response()->json(['data'=>JWTAuth::user()]);
    // }
    // public function profilAdmin()
    // {
    //     return response()->json(['data'=>JWTAuth::user()]);
    // }
    public function tampilAdmin(){
        $admin = DB::table('users')->where('role', 'admin')->get();
        return view('petugas_crud.admin', compact('admin'));
    }

    public function storeAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:petugas',
            'password' =>'required|string|min:6',
            // 'role' => 'required|string'
        ]);
        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }
        $save = User::create([
        	'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => 'admin'
        ]);
        // $admin = DB::table('users')->select('role', 'admin')->get();
        return redirect('/admin');
        //$token = JWTAuth::fromUser($petugas);
        //return response()->json(compact('petugas', 'token'), 201);
    }

    public function tampilStoreA(){
        return view('petugas_crud.create-admin');
    }

    public function updateAdmin(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            // 'password' =>'required|string|min:6|confirmed',
            // 'role' => 'required|string'
        ]);
        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }
        $save = User::where('id', $id)->update([
        	'name' => $request->get('name'),
            'email' => $request->get('email'),
            // 'password' => Hash::make($request->get('password')),
            // 'role' => 'admin'
        ]);
        // $admin = DB::table('users')->select('role', 'admin')->get();
        return redirect('/admin');
    }

    public function tampilUpdateA($id){
        $editA = User::find($id);
        return view('petugas_crud.update-admin', compact('editA'));
    }

    public function deleteAdmin($id){
        $delete = User::find($id)->delete();
        // $admin = DB::table('users')->select('role', 'admin')->get();
        return redirect('/admin');
    }
}
