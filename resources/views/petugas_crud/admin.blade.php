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
            <h6 class="m-0 font-weight-bold" style="color: #534340">Data Admin</h6>
        </div>
        <div class="card-body">
            <button class="btn btn-success float-right submit-button" id="tombol">Tambah Admin</button>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>nomor</th>
                            <th>nama admin</th>
                            <th>email</th>
                            <th>role</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach ($admin as $adm)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$adm->name}}</td>
                        <td>{{$adm->email}}</td>
                        <td>{{$adm->role}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-user-pen"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('admin-tampil-update', $adm->id)}}">update</a>
                                    <form action="{{route('admin-delete', $adm->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit">delete</button>
                                </form>
                                </div>
                              </div>
                            {{-- <a href="{{route('admin-tampil-update', $adm->id)}}" class="btn btn-primary">edit</a>
                            <form action="{{route('admin-delete', $adm->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form> --}}
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
        location.href = "{{route('admin-store')}}";
    };
</script>
@endsection
