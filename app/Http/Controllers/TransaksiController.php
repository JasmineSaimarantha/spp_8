<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Tunggakan;
use Carbon\Carbon;
use DB;
use JWTAuth;
use Validator;
use Config;

class TransaksiController extends Controller
{
    // function __construct()
    //     {
    //         Config::set('jwt.user', \App\Models\Petugas::class);
    //         Config::set('auth.providers', ['users' => [
    //                 'driver' => 'eloquent',
    //                 'model' => \App\Models\Petugas::class,
    //             ]]);
    //     }
    public function tunggakan(Request $request){
        $validator = Validator::make($request->all(), [
            'id_siswa' => 'required',
            'bulan_spp'=>'required',
            'tahun_spp'=>'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $save = Tunggakan::create([
        	'id_siswa' => $request->get('nis'),
            'bulan_spp'=> $request->get('bulan_spp'),
            'tahun_spp'=> $request->get('tahun_spp'),
        ]);
        if($save){
            return response()->json(['status' => 'tunggakan berhasil ditambhakan', 'data'=>$save]);
        } else {
            return response()->json(['status' => 'tunggakan gagal ditambahkan']);
        }
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'nisn' => 'required',
            'bulan_spp'=>'required',
            'tahun_spp'=>'required',
			// 'tgl_bayar'=>'required',
            'bayar'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        // $siswa=Siswa::where('nisn',$request->nisn)->get();
        // foreach($siswa as $val){
        //     $id_siswa = $val->id_siswa;
        // }
        if(User::where('nisn',$request->nisn)->get()){
            // $cek=DB::table('')
            $spp = DB::table('users')->join('spp', 'users.id_spp', '=' , 'spp.id_spp')
                        ->where('users.nisn', '=', $request->nisn)
                        ->select('spp.nominal')
                        ->first();
            if($request->bayar < $spp->nominal){
                $sv = Pembayaran::create([
                    'id_petugas' => auth()->user()->id,
                    // 'id_siswa' => $request->id_siswa,
                    'nisn' => $request->nisn,
		        	'tgl_bayar'=>Carbon::now(),
		        	'bulan_spp'=>$request->get('bulan_spp'),
		        	'tahun_spp'=>$request->get('tahun_spp'),
                    'bayar'=>$request->bayar,
                    'status'=>'Belum Lunas',
                ]);
                // $nunggak = Tunggakan::create([
                //     'id_siswa'=>$request->id_siswa,
                //     'bulan_spp'=>$request->get('bulan_spp'),
		        // 	'tahun_spp'=>$request->get('tahun_spp')
                // ]);
                return redirect('pembayaran');
            }else if($request->bayar >= $spp->nominal){
                $sv = Pembayaran::create([
                    'id_petugas' => auth()->user()->id,
                    // 'id_siswa' => $request->id_siswa,
                    'nisn' => $request->nisn,
		        	'tgl_bayar'=>Carbon::now(),
		        	'bulan_spp'=>$request->get('bulan_spp'),
		        	'tahun_spp'=>$request->get('tahun_spp'),
                    'bayar'=>$request->bayar,
                    'status'=>'Lunas',
                ]);

                return redirect('pembayaran');
            }
        }
    }

    public function tampilStore(){
        $siswa = DB::table('users')->select('id', 'nisn')->get();
        $pembayaran = Pembayaran::get();
        return view('pembayaran_crud.create-pembayaran', compact('pembayaran', 'siswa'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            // 'nisn' => 'required',
            'bulan_spp'=>'required',
            'tahun_spp'=>'required',
			// 'tgl_bayar'=>'required',
            'bayar'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        // $siswa=Siswa::where('nisn',$request->nisn)->get();
        // foreach($siswa as $val){
        //     $id_siswa = $val->id_siswa;
        // }
        if(User::where('nisn',$request->nisn)->get()){
            // $cek=DB::table('')
            $spp = DB::table('users')->join('spp', 'users.id_spp', '=' , 'spp.id_spp')
                        ->where('users.nisn', '=', $request->nisn)
                        ->select('spp.nominal')
                        ->first();
            if($request->bayar < $spp){
                $sv = Pembayaran::where('id_pembayaran', $id)->update([
                    'id_petugas' => auth()->user()->id,
                    // 'id_siswa' => $request->id_siswa,
                    // 'nisn' => $request->nisn,
		        	'tgl_bayar'=>Carbon::now(),
		        	'bulan_spp'=>$request->get('bulan_spp'),
		        	'tahun_spp'=>$request->get('tahun_spp'),
                    'bayar'=>$request->bayar,
                    'status'=>'Belum Lunas',
                ]);
                // $nunggak = Tunggakan::create([
                //     'id_siswa'=>$request->id_siswa,
                //     'bulan_spp'=>$request->get('bulan_spp'),
		        // 	'tahun_spp'=>$request->get('tahun_spp')
                // ]);
                return redirect('pembayaran');
            }else{
                $sv = Pembayaran::where('id_pembayaran', $id)->update([
                    'id_petugas' => auth()->user()->id,
                    // 'id_siswa' => $request->id_siswa,
                    // 'nisn' => $request->nisn,
		        	'tgl_bayar'=>Carbon::now(),
		        	'bulan_spp'=>$request->get('bulan_spp'),
		        	'tahun_spp'=>$request->get('tahun_spp'),
                    'bayar'=>$request->bayar,
                    'status'=>'Lunas',
                ]);

                return redirect('pembayaran');
            }
        }
    }

    public function tampilUpdate($id){
        $siswa = DB::table('users')->select('id', 'nisn')->first();
        $updates =  DB::table('pembayaran')->join('users', 'users.nisn', '=', 'pembayaran.nisn')
                    ->where('pembayaran.id_pembayaran', '=', $id)
                    ->select('*')
                    ->first();
        return view('pembayaran_crud.update-pembayaran', compact('updates', 'siswa'));
    }

    public function delete($id){
        $hapus = Pembayaran::find($id)->delete();
       return redirect('/pembayaran');
    }
        // $ceklunas=Tunggakan::where('id_siswa',$request->get('id_siswa'))
        // 	->where('bulan_spp',$request->get('bulan_spp'))
        // 	->where('tahun_spp',$request->get('tahun_spp'));
        // if($ceklunas->count()>0){
        // 	$status=$ceklunas->first();
        // 	if($status->status=="belum lunas"){
	    //     	$pembayaran = Pembayaran::create([
		//         	'id_petugas'=>JWTAuth::user()->id_petugas,
		//         	'nis'=>$request->get('nis'),
		//         	'tgl_bayar'=>date('Y-m-d'),
		//         	'bulan_spp'=>$request->get('bulan_spp'),
		//         	'tahun_spp'=>$request->get('tahun_spp'),
		//         ]);
		//         if($pembayaran){
		//         	$update=Tunggakan::where('nis',$request->get('nis'))
		//         	->where('bulan_spp',$request->get('bulan_spp'))
		//         	->where('tahun_spp',$request->get('tahun_spp'))
		//         	->update([
		//         		'status'=>'lunas'
		//         	]);
		//         	return response()->json(['message'=>'sukses pembayaran','status'=>true]);
		//         } else {
		//         	return response()->json(['message'=>'gagal pembayaran','status'=>false]);
		//         }
	    //     } else if($status->status=="lunas"){
	    //     	return response()->json(['message'=>'sudah lunas','status'=>false]);
	    //     }
        // } else {
	    //     return response()->json(['message'=>'tidak ada tunggakan','status'=>false]);
        // }


    public function kurang($id)
    {
    	$history=Tunggakan::select('siswa.nis','siswa.nama','kelas.nama_kelas','kelas.jurusan','spp.nominal')
        ->join('siswa','siswa.nis','=','tunggakans.nis')
    	->join('kelas','kelas.id_kelas','=','siswa.id_kelas')
    	->join('spp','spp.angkatan','=','kelas.angkatan')
    	->where('tunggakans.nis',$id)
    	->where('status','belum lunas')
    	->get();
    	if($history){
            return response()->json($history);
        } else {
            return response()->json(['message' => 'tidak ada tunggakan', 'status'=>false]);
        }
    }

    public function tampilTunggakan(){
        $kelas = DB::table('siswa')->select('id_siswa')->get();
        $tunggakan = DB::table('tunggakan')->get();
        return view('pembayaran_crud.tunggakan', compact('tunggakan', 'kelas'));
    }

    public function history(){
        // $pembayaran = DB::table('pembayaran')->join('users', 'users.nisn', 'pembayaran.nisn')
        //                                      ->join('kelas', 'kelas.id_kelas', 'kelas.angkatan')
        //                                      ->join('spp', 'users.id_spp', 'spp.id_spp')
        //                                      ->select('*')
        //                                      ->get();
        $pembayaran = Pembayaran::select('users.name', 'kelas.nama_kelas', 'kelas.angkatan', 'spp.nominal', 'pembayaran.bayar', 'pembayaran.bulan_spp', 'pembayaran.status')
            ->join('users', 'users.nisn', 'pembayaran.nisn')
            ->join('kelas', 'users.id_kelas', '=', 'kelas.id_kelas')
            ->join('spp', 'users.id_spp', '=', 'spp.id_spp')
            ->get();
        return view('pembayaran_crud.history', compact('pembayaran'));
    }

    public function historySiswa($id){

        $pembayaran = Pembayaran::select('users.name', 'kelas.nama_kelas', 'kelas.angkatan', 'spp.nominal', 'pembayaran.bayar', 'pembayaran.bulan_spp', 'pembayaran.status')
            ->join('users', 'users.nisn', 'pembayaran.nisn')
            ->join('kelas', 'users.id_kelas', '=', 'kelas.id_kelas')
            ->join('spp', 'users.id_spp', '=', 'spp.id_spp')
            ->where('users.id', $id)
            ->get();
        return view('pembayaran_crud.historyId', compact('pembayaran'));
    }

    public function tampil(){
        // $kelas = DB::table('siswa')->select('*')->get();
        $pembayaran = Pembayaran::all();
        return view('pembayaran_crud.pembayaran', compact('pembayaran'));
    }
}
