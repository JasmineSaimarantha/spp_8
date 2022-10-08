@extends('home.beranda')
@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #534340">Insert Data Pembayaran</h6>
        </div>
        <div class="card-body">
            <form action="{{route('tunggakan-create')}}" method="POST">
                @csrf
                <div class="table-responsive">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Id Petugas</span>
                        <input type="text" name="id_petugas" placeholder="Masukkan Id Petugas" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Id Siswa</span>
                            <input type="text" name="nisn" placeholder="Masukkan NISN" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Bayar</span>
                            <input type="date" name="tgl_bayar" placeholder="Masukkan Tanggal Bayar" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div> --}}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Bulan SPP</span>
                            <input type="text" name="bulan_spp" placeholder="Masukkan Bulan SPP" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tahun SPP</span>
                            <input type="text" name="tahun_spp" placeholder="Masukkan Bulan SPP" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Jumlah Bayar</span>
                            <input type="number" name="bayar" placeholder="Masukkan Tahun SPP" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div> --}}
                        <button class="btn btn-success float-right" type="submit">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
