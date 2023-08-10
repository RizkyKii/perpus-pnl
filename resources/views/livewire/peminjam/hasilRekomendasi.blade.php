@extends('layouts/app')

@section('content')
          <h4 class="header-title" style="text-align: left;margin:10px;">Rekomendasi Buku</h4>

          <div class="container">
          <div class="row">
            @foreach ($dataMinConfidence as $is)
                <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                    <div class="card mb-4 shadow h-100">
                        <img src="/storage/{{$is->buku($is->kd_barang_a)->sampul}}" class="card-img-top" alt="{{$is->buku($is->kd_barang_a)->judul}}" width="200" height="350">
                        <div class="card-body">
                            <center><h5 class="card-title mb-lg-4"><strong>{{$is->buku($is->kd_barang_a)->judul}}</strong></h5></center>
                            <p class="card-text text-wrap mb-lg-1"><strong>Penulis : </strong>{{$is->buku($is->kd_barang_a)->penulis}}</p>
                            <p class="card-text mb-lg-1"><strong>Penerbit : </strong>{{$is->buku($is->kd_barang_a)->penerbit}}</p>
                            <p class="card-text mb-lg-0"><strong>Tahun Terbit : </strong>{{$is->buku($is->kd_barang_a)->tahun}}</p>
                          </div>
                        <br>
                      </div> 
                </div>
                @endforeach
        </div>
          </div>
    
@endsection