@extends('home.beranda')
@section('content')

<div class="row">
    <div class="row">
        <a href="{{route('report-siswa', auth()->user()->id)}}" class="btn float-left"><i class="fa-solid fa-receipt"></i>Print this page</a>
        <div class="col-md-12">
            @foreach($pembayaran as $p)
           <div class="card">
              <div class="card-body">
                 <div class="card-title"><center><h3>Histori Pembayaran</h3></center></div>
                       <div class="border-top">
                          <div class="float-right">
                          </div>
                            <div class="mt-4 text-uppercase">
                                {{ $p->name .' - '. $p->nama_kelas .' - '. $p->angkatan }}
                            </div>
                                <div>SPP Bulan = <b class="text-capitalize">{{ $p->bulan_spp }}</b></div>
                                <div>Nominal SPP = Rp.<b class="text-capitalize">{{ $spp = $p->nominal }}</b></div>
                                <div>Bayar = Rp.<b class="text-capitalize">{{ $bayar = $p->bayar }}</b></div>
                                {{-- @if ($dika >= $bayar)
                                    <div>Tunggakan = Rp.<b class="text-capitalize">{{ $dika }}</b></div>
                                @endif --}}
                                <div>Tunggakan = Rp.<b class="text-capitalize">{{ $spp - $bayar }}</b></div>
                                <div><b class="text-capitalize">{{ $p->status }}</b></div>
                          </div>

                           <!-- Pagination -->
                      {{-- @if($pembayaran->lastPage() != 1)
                          <div class="btn-group float-right">
                             <a href="{{ $pembayaran->previousPageUrl() }}" class="btn btn-success">
                                  <i class="mdi mdi-chevron-left"></i>
                              </a>
                              @for($i = 1; $i <= $pembayaran->lastPage(); $i++)
                                  <a class="btn btn-success {{ $i == $pembayaran->currentPage() ? 'active' : '' }}" href="{{ $pembayaran->url($i) }}">{{ $i }}</a>
                              @endfor
                              <a href="{{ $pembayaran->nextPageUrl() }}" class="btn btn-success">
                                  <i class="mdi mdi-chevron-right"></i>
                              </a>
                         </div>
                      @endif --}}
                      <!-- End Pagination -->

                    @if(count($pembayaran) == 0)
                        <div class="text-center">Tidak ada histori pembayaran</div>
                    @endif

              </div>
           </div>
           @endforeach

        </div>
     </div>
</div>
@endsection
