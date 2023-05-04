<div class="row">
    <div class="col-12">

       @include('admin-lte/flash')

        {{-- @include('petugas/rak/create') --}}
        
        {{-- @include('petugas/rak/edit') --}}
          
        @include('petugas/transaksi/delete')

        <div class="btn-group mb-3">
          <button wire:click="format" class="btn btn-sm bg-navy mr-2">Lihat Semua</button>
          <button wire:click="belumDipinjam" class="btn btn-sm bg-indigo mr-2">Belum Dipinjam</button>
          <button wire:click="sedangDipinjam" class="btn btn-sm bg-warning mr-2">Sedang Dipinjam</button>
          <button wire:click="selesaiDipinjam" class="btn btn-sm bg-olive mr-2">Selesai Dipinjam</button>
        </div>

      <div class="card">
        <div class="card-header">
          <span wire:click="create" class="btn btn-sm btn-primary">Tambah</span>

        
         <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input wire:model="search" type="search" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      @if ($transaksi->isNotEmpty())
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th width="10%">No</th>
              <th class="text-wrap" style="width: 6rem"><center>Kode Pinjam</center></th>
              <th class="text-wrap" style="width: 6rem"><center>Nama Peminjam</center></th>
              <th><center>Buku</center></th>
              <th><center>Lokasi</center></th>
              <th class="text-wrap" style="width: 6rem"><center>Tanggal Pinjam</center></th>
              <th class="text-wrap" style="width: 6rem"><center>Tanggal Kembali</center></th>
              <th><center>Denda</center></th>
              <th><center>Status</center></th>
              @if (!$selesai_dipinjam)
                <th width="15%"><center>Aksi</center></th>
              @endif
            </tr>
          </thead>
          <tbody>
          @foreach ($transaksi as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->kode_pinjam}}</td>
              <td class="text-wrap" style="width: 6rem"><center>{{$item->nama_peminjam}}</center></td>
              <td>
                <ul>
                    @foreach ($item->detail_peminjaman as $detail_peminjaman)
                    <li class="text-wrap" style="width: 10rem">{{$detail_peminjaman->buku->judul}}</li>
                    @endforeach
                </ul>
              </td>
              <td>
                <ul>
                    @foreach ($item->detail_peminjaman as $detail_peminjaman)
                    <li>{{$detail_peminjaman->buku->rak->lokasi}}</li>
                    @endforeach
                </ul>
              </td>
              <td>{{$item->tanggal_pinjam}}</td>
              <td>{{$item->tanggal_kembali}}</td>
              <td>{{$item->denda}}</td>
              <td>
                @if ($item->status == 1)
                    <span class="badge bg-indigo">Belum Dipinjam</span>
                @elseif ($item->status == 2)
                    <span class="badge bg-warning">Sedang Dipinjam</span>
                @else
                    <span class="badge bg-olive">Selesai Dipinjam</span>
                @endif
              </td>
             @if (!$selesai_dipinjam)
             <td>
              @if ($item->status == 1)
                  <span wire:click="pinjam({{$item->id}})" class="btn btn-sm btn-success mr-2">Terima Pinjaman</span>
                  <br>
                  <br>
                  <span wire:click="delete({{$item->id}})" class="btn btn-sm btn-danger mr-2">Tolak Permintaan</span>
              @elseif ($item->status == 2)
                  <span wire:click="kembali({{$item->id}})" class="btn btn-sm btn-primary mr-2">Kembalikan Buku</span>
              @endif
            </td>
             @endif
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
        {{$transaksi->links()}}
    </div>

      @if ($transaksi->isEmpty())
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