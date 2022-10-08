@extends('home.beranda')
@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #534340">Insert Data Pembayaran</h6>
        </div>
        <div class="card-body">
            <form action="{{route('pembayaran-update', $updates->id_pembayaran)}}" method="POST">
                @csrf
                <div class="table-responsive">
                    {{-- <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Id Petugas</span>
                        <input type="text" name="id_petugas" placeholder="Masukkan Id Petugas" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                        </div> --}}
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">NISN</span>
                            <input type="text" name="id_siswa" placeholder="Masukkan ID SIswa" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                            <select name="nisn"  class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                                <option value="" selected disabled hidden>Pilih NISN</option>
                            @foreach ($siswa as $sis)
                                <option value="{{$sis->id}}" selected>{{$sis->nisn}}</option>
                            @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Bayar</span>
                            <input type="date" name="tgl_bayar" placeholder="Masukkan Tanggal Bayar" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div> --}}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Bulan SPP</span>
                            {{-- <input type="text" name="bulan_spp" placeholder="Masukkan Bulan SPP" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"> --}}
                            {{-- <select name="bulan_spp" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                                <option value="" selected disabled hidden>Pilih Bulan</option>
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select> --}}
                            <select class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="bulan_spp">
                                @foreach(["januari" => "Januari",
                                        "februari" => "Februari",
                                        "maret" => "Maret",
                                        "april" => "April",
                                        "mei" => "Mei",
                                        "juni" => "Juni",
                                        "juli" => "Juli",
                                        "agustus" => "Agustus",
                                        "september" => "September",
                                        "oktober" => "Oktober",
                                        "november" => "November",
                                        "desember" => "Desember"] as $bulan_spp => $bulans)
                                <option value="{{ $bulan_spp }}" {{ $updates->bulan_spp == $bulan_spp ? "selected" : "" }}>{{ $bulans }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tahun SPP</span>
                            <input type="text" name="tahun_spp" placeholder="Masukkan Bulan SPP" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="{{$updates->tahun_spp}}">
                        </div>
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Bayar</span>
                            <input type="date" name="tgl_bayar" placeholder="Masukkan Tanggal Bayar" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div> --}}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Jumlah Bayar</span>
                            <input type="number" name="bayar" placeholder="Masukkan Tahun SPP" class="form-control form-control-user" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="{{$updates->bayar}}">
                        </div>
                        <button class="btn btn-success float-right" type="submit">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
