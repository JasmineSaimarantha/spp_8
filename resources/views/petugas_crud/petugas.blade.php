@extends('home.beranda')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #534340">Data Petugas</h6>
        </div>
        <div class="card-body">
            <button class="btn btn-success float-right submit-button" id="tombol">Tambah Petugas</button>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Petugas</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach ($petugas as $petu)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$petu->name}}</td>
                        <td>{{$petu->email}}</td>
                        <td>{{$petu->role}}</td>
                        <td>
                            <a href="{{route('petugas-tampil-update', $petu->id)}}" class="btn btn-primary">edit</a>
                            <form action="{{route('petugas-delete', $petu->id)}}" method="post">
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
        location.href = "{{route('petugas-store')}}";
    };
</script>
@endsection
