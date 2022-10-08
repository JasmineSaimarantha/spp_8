@extends('home.beranda')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <!--<h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        or more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>
    </p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #534340">Data Siswa</h6>
        </div>
        <div class="card-body">
            <button class="btn btn-success float-right submit-button" onclick="{{route('siswa-store')}}" id="tombol">Tambah Data Siswa</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Spp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ( $siswa as $siswas )
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$siswas->nisn}}</td>
                            <td>{{$siswas->nis}}</td>
                            <td>{{$siswas->name}}</td>
                            <td>{{$siswas->nama_kelas}}</td>
                            <td>{{$siswas->alamat}}</td>
                            <td>{{$siswas->no_telp}}</td>
                            <td>{{$siswas->nominal}}</td>
                            <td>{{$siswas->email}}</td>

                            <td>
                                <a href="{{route('siswa-tampil-update', $siswas->id)}}" class="btn btn-primary">edit</a>
                                <form action = "{{route('siswa-delete', $siswas->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">delete</button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<script type="text/javascript">
    document.getElementById("tombol").onclick = function (){
        location.href = "{{route('siswa-store')}}";
    };
</script>
@endsection
