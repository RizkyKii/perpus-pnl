<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Keranjang</h1>
        </div>
    </div>

    @include('admin-lte/flash')

    <div class="row">
        <div class="col-md-12 mb-4">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input wire:model="tanggal_pinjam" type="date" class="form-control" id="tanggal_pinjam">
            @error('tanggal_pinjam') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            @if ($keranjang->tanggal_pinjam)
                <center><strong>Silahkan mengambil buku di UPT. Perpustakaan Politeknik Negeri Lhokseumawe</strong></center>
                <center><strong>dan mohon untuk memperlihatkan bukti pinjaman pada saat pengambilan buku</strong></center>
                <br>
                <strong>Tanggal Pinjam : {{$keranjang->tanggal_pinjam}}</strong>
                <br>
                <strong>Tanggal Kembali : {{$keranjang->tanggal_kembali}}</strong>
                <td>
                    @if ($keranjang->status == 1)
                        <center><span class="badge bg-danger">Permintaan Belum Diterima</span></center>
                    @elseif ($keranjang->status == 2)
                        <center><span class="badge bg-success">Buku Sedang Dipinjam</span></center>
                    @endif
                  </td>
                <a href="{{ route('bukti') }}" class="btn btn-sm btn-success">Download PDF Bukti Pinjaman</a>
            @else
                <button wire:click="pinjam({{$keranjang->id}})" class="btn btn-sm btn-success">Pinjam</button>
            @endif
            <strong class="float-end">Kode Pinjam : {{$keranjang->kode_pinjam}}</strong>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>ISBN-ISSN</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Kategori</th>
                    <th>Bahasa</th>
                    <th>Rak</th>
                    @if (!$keranjang->tanggal_pinjam)
                    <th></th>
                    @endif 
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($keranjang->detail_peminjaman as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="text-wrap">{{$item->buku->judul}}</td>
                    <td>{{$item->buku->isbn_issn}}</td>
                    <td class="text-wrap">{{$item->buku->penulis}}</td>
                    <td>{{$item->buku->penerbit}}</td>
                    <td>{{$item->buku->kategori->nama}}</td>
                    <td>{{$item->buku->bahasa}}</td>
                    <td>{{$item->buku->rak->rak}}</td>
                    <td>
                    @if (!$keranjang->tanggal_pinjam)
                        <button wire:click="hapus({{$keranjang->id}}, {{$item->id}})" class="btn btn-sm btn-danger">Hapus</button>
                    @endif    
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @if (!$keranjang->tanggal_pinjam)
                <button wire:click="hapusMasal" class="btn btn-sm btn-danger">Hapus semua keranjang</button>
              @endif
        </div>
    </div>
</div>