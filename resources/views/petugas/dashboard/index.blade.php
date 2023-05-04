@extends('admin-lte/app')
@section('title', 'Dashboard')
@section('active-dashboard', 'active')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$count_buku}}</h3>

          <p>Buku</p>
        </div>
        <div class="icon">
          <i class="fas fa-book"></i>
        </div>
        <a href="/buku" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$count_user}}</h3>

          <p>User</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="/user" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$count_belum_dipinjam}}</h3>

          <p>Permintaan Peminjaman Buku</p>
        </div>
        <div class="icon">
          <i class="fas fa-hands"></i>
        </div>
        <a href="/transaksi" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$count_sedang_dipinjam}}</h3>

          <p>Buku Sedang Dipinjam</p>
        </div>
        <div class="icon">
          <i class="fas fa-clock"></i>
        </div>
        <a href="/transaksi" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-olive">
        <div class="inner">
          <h3>{{$count_selesai_dipinjam}}</h3>

          <p>Buku Selesai Dipinjam</p>
        </div>
        <div class="icon">
          <i class="fas fa-check-circle"></i>
        </div>
        <a href="/transaksi" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <br>
  <center><p class="font-weight-normal"><mark>─────────────── Informasi Terbaru ─────────────── </mark></p></center>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row my-4">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5>Buku Terbaru</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Judul</th>
                <th>Waktu Dimasukkan</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($buku as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->judul}}</td>
              <td>{{$item->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5>User Terbaru</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Nama</th>
                <th>Waktu Terdaftar</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($user as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5>Permintaan Peminjaman Terbaru</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Kode Pinjam</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Dipinjam</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($belum_dipinjam as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->kode_pinjam}}</td>
              <td>{{$item->nama_peminjam}}</td>
              <td>{{$item->tanggal_pinjam}}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5>Buku Sedang Dipinjam</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Kode Pinjam</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Dipinjam</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($sedang_dipinjam as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->kode_pinjam}}</td>
              <td>{{$item->nama_peminjam}}</td>
              <td>{{$item->tanggal_pinjam}}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5>Buku Selesai Dipinjam</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Kode Pinjam</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Dikembalikan</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($selesai_dipinjam as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->kode_pinjam}}</td>
              <td>{{$item->nama_peminjam}}</td>
              <td><center>{{$item->tanggal_pengembalian}}</center></td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row my-2">
    <div class="col-md 12">
      <div class="card">
        <div class="card-body">
          <h5>Grafik selesai peminjaman terbaru</h5>
          <canvas id="myChart" height="125"></canvas>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
    @include('admin-lte/script/chart')
@endsection

@section('chart-script')
    <livewire:petugas.chart-script></livewire:petugas.chart-script>
@endsection