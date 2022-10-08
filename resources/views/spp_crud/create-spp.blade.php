@extends('home.beranda')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #534340">Insert Data Spp</h6>
        </div>
        <div class="card-body">
            <form action="{{route('spp-create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Angkatan</span>
                        <input type="text" name="angkatan" placeholder="Masukkan Angkatan" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Tahun</span>
                        <input type="text" name="tahun" placeholder="Masukkan Tahun" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nominal</span>
                        <input type="text" name="nominal" placeholder="Masukkan Nominal" class="form-control form-control-user" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <button class="btn btn-success float-right" type="submit">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
