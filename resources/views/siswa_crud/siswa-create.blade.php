@extends('home.beranda')
@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #534340">Insert Data Siswa</h6>
        </div>
        <div class="card-body">
            <form action="{{route('siswa-create')}}" method="POST">
                @csrf
                <div class="table-responsive">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">NISN</span>
                            <input type="text" name="nisn" placeholder="Masukkan NIS" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">NIS</span>
                            <input type="text" name="nis" placeholder="Masukkan NIS" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                            </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
                            <input type="text" name="name" placeholder="Masukkan Nama" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Jenis Kelamin</span>
                            <select name="jk" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                                <option value="" selected disabled hidden>Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div> --}}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Id Spp</span>
                            <select name="id_spp" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                                <option value="" selected disabled hidden>Pilih Nominal Spp</option>
                                @foreach ($spp as $spps)
                                    <option value="{{$spps->id_spp}}">{{$spps->nominal}}</option>
                                @endforeach>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Id Kelas </span>
                            <select name="id_kelas"  class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                                <option value="" selected disabled hidden>Pilih Kelas</option>
                                @foreach ($kelas as $kel)
                                    <option value="{{$kel->id_kelas}}">{{$kel->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Alamat</span>
                            <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">No telpon</span>
                            <input type="text" name="no_telp" placeholder="Masukkan No telpon" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                            <input type="email" name="email" placeholder="Masukkan Email" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                            <input type="password" name="password" placeholder="Masukkan Password" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <button class="btn btn-success float-right" type="submit">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
