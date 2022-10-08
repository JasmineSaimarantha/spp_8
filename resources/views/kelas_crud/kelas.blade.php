@extends('home.beranda')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        or more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #534340">Data Kelas</h6>
        </div>
        <div class="card-body">
            <button class="btn btn-success float-right submit-button" onclick="{{route('kelas-store')}}" id="tombol">Tambah Kelas</button>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Kelas</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                    ?>
                    @foreach ($kelas as $kelasa)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$kelasa->nama_kelas}}</td>
                        <td>{{$kelasa->jurusan}}</td>
                        <td>{{$kelasa->angkatan}}</td>
                        <td>
                            <a href="{{route('kelas-tampil-update', $kelasa->id_kelas)}}" class="btn btn-primary">edit</a>
                            <form action="{{route('kelas-delete', $kelasa->id_kelas)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
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
        location.href = "{{route('kelas-store')}}";
    };
</script>
@endsection
