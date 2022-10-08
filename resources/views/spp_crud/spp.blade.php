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
            <h6 class="m-0 font-weight-bold" style="color: #534340">Data Spp</h6>
        </div>
        <div class="card-body">
            <button class="btn btn-success float-right submit-button" id="tombol">Tambah Spp</button>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Angkatan</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach ($spp as $spps)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$spps->angkatan}}</td>
                        <td>{{$spps->tahun}}</td>
                        <td>{{$spps->nominal}}</td>
                        <td>
                            <a href="{{route('spp-tampil-update', $spps->id_spp)}}" class="btn btn-primary">edit</a>
                            <form action="{{route('spp-delete', $spps->id_spp)}}" method="post">
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
        location.href = "{{route('spp-store')}}";
    };
</script>
@endsection
