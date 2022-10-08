@extends('home.beranda')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #534340">Insert Data Kelas</h6>
        </div>
        <div class="card-body">
            <form action="{{route('kelas-update', $updates->id_kelas)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nama Kelas</span>
                        <input type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="{{$updates->nama_kelas}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Jurusan</span>
                        {{-- <input type="text" name="jurusan" placeholder="Masukkan Jurusan" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"> --}}
                        <select name="jurusan" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                            <option value="" selected disabled hidden>Pilih Jurusan</option>
                            @foreach ([ "RPL" => "Rekayasa Perangkat Lunak",
                                        "TKJ" => "Teknik Komputer dan Jaringan"] as $jurusan => $jurusans )
                            <option value="{{ $jurusan }}" {{ $updates->jurusan == $jurusan ? "selected" : "" }}>{{ $jurusans }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Angkatan</span>
                        <input type="text" name="angkatan" placeholder="Masukkan Angkatan" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="{{$updates->angkatan}}">
                    </div>
                    <button class="btn btn-success float-right" type="submit">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
