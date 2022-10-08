@extends('home.beranda')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #534340">Insert Data Petugas</h6>
        </div>
        <div class="card-body">
            <form action="{{route('petugas-create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nama Petugas</span>
                        <input type="text" name="name" placeholder="Masukkan Nama Petugas" class="form-control form-control-user" aria-label="Sizing example input"
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
