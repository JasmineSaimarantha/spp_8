<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.beranda');
    }

    public function user(){
        $count1=DB::table('users')->where('role', 'admin')->count();
        $count2=DB::table('users')->where('role', 'petugas')->count();
        $count3=DB::table('users')->where('role', 'siswa')->count();
        $lelang=DB::table('users')->count();
        $lelang1=User::all();

        return view('home.card', compact('count1', 'count2', 'count3', 'lelang', 'lelang1'));
    }
}
