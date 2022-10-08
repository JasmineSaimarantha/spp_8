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
            <button class="btn btn-success float-right submit-button" onclick="{{route('tunggakan-store')}}" id="tombol">Tambah Data Tunggakan</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Tunggakan</th>
                            <th>Id Siswa</th>
                            <th>Bulan SPP</th>
                            <th>Tahun SPP</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ( $pembayaran as $p )
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$p->id_petugas}}</td>
                            <td>{{$p->siswa->nisn}}</td>
                            <td>{{$p->bulan_spp}}</td>
                            <td>{{$p->tahun_spp}}</td>
                            <td>{{$p->status}}</td>
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
