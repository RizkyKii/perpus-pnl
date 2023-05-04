<div class="row">
    <div class="col-12">

       @include('admin-lte/flash')

        @include('petugas/buku/create')
        
        @include('petugas/buku/edit')
          
        @include('petugas/buku/delete')

        @include('petugas/buku/show')

      <div class="card">
        <div class="card-header">
          <span wire:click="create" class="btn btn-sm btn-primary">Tambah</span>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input wire:model="search" type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        @if ($buku->isNotEmpty())
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Sampul</th>
                <th>Judul</th>
                <th>ISBN-ISSN</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th class="text-wrap">Tempat Publish</th>
                <th>Kategori</th>
                <th>Bahasa</th>
                <th class="text-wrap">Tahun Terbit</th>
                <th>Stok</th>
                <th><center>Aksi</center></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($buku as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="/storage/{{$item->sampul}}" alt="{{$item->judul}}" width="60" height="80"></td>
                <td class="text-wrap" style="width: 15rem">{{$item->judul}}</td>
                <td>{{$item->isbn_issn}}</td>
                <td class="text-wrap" style="width: 15rem">{{$item->penulis}}</td>
                <td class="text-wrap" style="width: 15rem">{{$item->penerbit}}</td>
                <td class="text-wrap" style="width: 15rem">{{$item->publish}}</td>
                <td>{{$item->kategori->nama}}</td>
                <td>{{$item->bahasa}}</td>
                <td class="text-center">{{$item->tahun}}</td>
                <td class="text-center">{{$item->stok}}</td>
                <td>
                    <div class="btn-group">
                        <span wire:click="show({{$item->id}})" class="btn btn-sm btn-warning mr-2">Lihat</span>
                        <span wire:click="edit({{$item->id}})" class="btn btn-sm btn-primary mr-2">Edit</span>
                        <span wire:click="delete({{$item ->id}})" class="btn btn-sm btn-danger">Hapus</span>
                    </div>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        @endif
      </div>
      <!-- /.card -->

      <div class="row justify-content-center">
        {{$buku->links()}}
    </div>

      @if ($buku->isEmpty())
      <div class="card">
        <div class="card-body">
          <div class="alert alert-warning">
            Anda tidak memiliki data
          </div>
        </div>
      </div>
      @endif

    </div>
  </div>