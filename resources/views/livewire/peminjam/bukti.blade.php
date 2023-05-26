<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<center><h1>Bukti Pinjaman Buku</h1></center>

<div class="row">
    <div class="col-md-12 mb-3">
            <h4>Nama : {{$keranjang->nama_peminjam}}</h4>
            <h4>Tanggal Pinjam : {{$keranjang->tanggal_pinjam}}</h4>
            <h4>Tanggal Kembali : {{$keranjang->tanggal_kembali}}</h4>
            <h4>Kode Pinjam : {{$keranjang->kode_pinjam}}</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="customers">
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>ISBN-ISSN</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Bahasa</th>
              </tr>
              @foreach ($keranjang->detail_peminjaman as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->buku->judul}}</td>
                <td>{{$item->buku->isbn_issn}}</td>
                <td>{{$item->buku->penulis}}</td>
                <td>{{$item->buku->penerbit}}</td>
                <td>{{$item->buku->kategori->nama}}</td>
                <td>{{$item->buku->bahasa}}</td>   
                </td>
              </tr>
              @endforeach
          </table>
    </div>
</div>
</body>
</html>
