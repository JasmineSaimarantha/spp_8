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
            <h6 class="m-0 font-weight-bold" style="color: #534340">Data Pembayaran</h6>
        </div>
        <div class="card-body">
            <button class="btn btn-success float-right submit-button" onclick="{{route('pembayaran-store')}}" id="tombol">Tambah Data Pembayaran</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Petugas</th>
                            <th>NISN</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan SPP</th>
                            <th>Tahun SPP</th>
                            <th>Bayar</th>
                            <th>Status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ( $pembayaran as $p )
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$p->users->name}}</td>
                            <td>{{$p->nisn  }}</td>
                            <td>{{$p->tgl_bayar}}</td>
                            <td>{{$p->bulan_spp}}</td>
                            <td>{{$p->tahun_spp}}</td>
                            <td>{{$p->bayar}}</td>
                            <td>{{$p->status}}</td>
                            <td>
                                <a href="{{route('pembayaran-tampil-update', $p->id_pembayaran)}}" class="btn btn-primary">edit</a>
                                <form action = "{{route('pembayaran-delete', $p->id_pembayaran)}}" method="post">
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
        location.href = "{{route('pembayaran-store')}}";
    };
</script>
@endsection
