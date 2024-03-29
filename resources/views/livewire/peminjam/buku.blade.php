<div class="container">
  @include('admin-lte/flash')
    <div class="row">
        <div class="col-md-8 mb-3">
            <h1>{{$title}}</h1>
        </div>
        @if (!$detail_buku)
        <div class="col-md-4">
          <label class="sr-only" for="inlineFormInputGroup">Username</label>
          <div class="input-group mb-2">
            <input wire:model="search" type="text" class="form-control bg-white text-dark" id="inlineFormInputGroup" placeholder="Cari Buku">
            <div class="input-group-prepend">
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          {{$buku->links()}}
      </div>
        @endif
    </div>

    @if ($detail_buku)
        
    <div class="row">
        <div class="col-md-4">
            <img src="/storage/{{$buku->sampul}}" alt="{{$buku->judul}}" width="300" height="400">
        </div>
        <div class="col-md-8">
            <table class="table table-hover text-nowrap">
                <tbody>
                  <tr>
                    <th>Judul</th>
                    <td>:</td>
                    <td>{{$buku->judul}}</td>
                  </tr>
                  <tr>
                    <th>ISBN-ISSN</th>
                    <td>:</td>
                    <td>{{$buku->isbn_issn}}</td>
                  </tr>
                  <tr>
                    <th>Penulis</th>
                    <td>:</td>
                    <td>{{$buku->penulis}}</td>
                  </tr>
                  <tr>
                    <th>Penerbit</th>
                    <td>:</td>
                    <td>{{$buku->penerbit}}</td>
                  </tr>
                  <tr>
                    <th>Tempat Publish</th>
                    <td>:</td>
                    <td>{{$buku->publish}}</td>
                  </tr>
                  <tr>
                    <th>Kategori</th>
                    <td>:</td>
                    <td>{{$buku->kategori->nama}}</td>
                  </tr>
                  <tr>
                    <th>Bahasa</th>
                    <td>:</td>
                    <td>{{$buku->bahasa}}</td>
                  </tr>
                  <tr>
                    <th>Tahun Terbit</th>
                    <td>:</td>
                    <td>{{$buku->tahun}}</td>
                  </tr>
                  <tr>
                    <th>Rak</th>
                    <td>:</td>
                    <td>{{$buku->rak->rak}}</td>
                  </tr>
                  <tr>
                    <th>Stok</th>
                    <td>:</td>
                    <td>{{$buku->stok}}</td>
                  </tr>
                </tbody>
              </table>
              <br>
              <button wire:click="keranjang({{$buku->id}})" class="btn btn-success">Keranjang</button>
              <a class="btn btn-warning" href="{{ url('/listbuku') }}">Kembali</a> 
        </div>
    </div>

    @else
        
    @if ($buku->isNotEmpty())
    <div class="row">
        @foreach ($buku as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                <div wire:click="detailBuku({{$item->id}})" class="card mb-4 shadow h-100" style="cursor: pointer">
                    <img src="/storage/{{$item->sampul}}" class="card-img-top" alt="{{$item->judul}}" width="200" height="350">
                    <div class="card-body">
                      <center><h5 class="card-title mb-lg-4"><strong>{{$item->judul}}</strong></h5></center>
                      <p class="card-text text-wrap mb-lg-1"><strong>Penulis : </strong>{{$item->penulis}}</p>
                      <p class="card-text mb-lg-1"><strong>Penerbit : </strong>{{$item->penerbit}}</p>
                      <p class="card-text mb-lg-0"><strong>Tahun Terbit : </strong>{{$item->tahun}}</p>
                    </div>
                  </div> 
            </div>
        @endforeach
    </div>
    
    @else
        <div class="alert alert-danger">
            Data tidak ada
        </div>
    @endif

    @endif
    
</div>