@extends('admin-lte/app')

@section('content')
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <h4 class="header-title">Hasil Analisa Apriori</h4>
    
                <p class="card-title-desc">
                <h5>Data Support Produk</h5>
                </p>
            
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataSupport">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kd Produk</th>
                            <th>Nama Produk</th>
                            <th>Total Transaksi</th>
                            <th>Perhitungan Support</th>
                            <th>Support</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataSupport as $supp)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ substr($supp -> kd_produk, 0, 5) }}</td>
                            <td>{{ $supp-> buku($supp -> kd_produk) -> judul }}</td>
                            <td>{{ $supp-> totalTransaksi($supp -> kd_produk) }}</td>
                            <td>
                                ({{ $supp -> totalTransaksi($supp -> kd_produk) }} / {{ $totalBuku }} ) * 100
                            </td>
                            <td>{{ $supp -> support }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            
            <hr />
            <p class="card-title-desc">
            <h5>Item yang memenuhi syarat minimun support {{ $dataPengujian -> min_supp }} %</h5>
            </p>
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataSupportMin">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kd Produk</th>
                            <th>Nama Produk</th>
                            <th>Support</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dataMinSupport as $minSupp)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ substr($minSupp -> kd_produk, 0, 5) }}</td>
                        <td>{{ $minSupp -> buku($minSupp -> kd_produk) -> judul }}</td>
                        <td>{{ $minSupp -> support }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <hr />
                <p class="card-title-desc">
                <h5>Kombinasi 2 itemset</h5>
                </p>
                <div class="table-responsive">
                    <table class="table mb-0 table-hover" id="tblKombinasiItemset">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kd Kombinasi</th>
                                <th>Produk A</th>
                                <th>Produk B</th>
                                <th>Jumlah Transaksi</th>
                                <th>Perhitungan Support</th>
                                <th>Support</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dataKombinasiItemset as $is)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ substr($is -> kd_kombinasi, 0, 5) }}</td>
                            <td>{{ $is -> buku($is -> kd_barang_a)-> judul }}</td>
                            <td>{{ $is -> buku($is -> kd_barang_b)-> judul }}</td>
                            <td>{{ $is -> jumlah_transaksi }}</td>
                            <td>({{ $is -> jumlah_transaksi }} / {{ $totalBuku }}) * 100</td>
                            <td>{{ $is -> support }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <hr />
                <p class="card-title-desc">
                <h5>Kombinasi yang memenuhi minimum confidence > {{ $dataPengujian -> min_confidence }}%</h5>
                </p>
                <div class="table-responsive">
                    <table class="table mb-0 table-hover" id="tblMinConfidence">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kd Kombinasi</th>
                                <th>Produk A</th>
                                <th>Produk B</th>
                                <th>Jumlah Transaksi</th>
                                <th>Perhitungan Support</th>
                                <th>Support</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dataMinConfidence as $is)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ substr($is -> kd_kombinasi, 0, 5) }}</td>
                            <td>{{ $is -> buku($is -> kd_barang_a) -> judul }}</td>
                            <td>{{ $is -> buku($is -> kd_barang_b) -> judul }}</td>
                            <td>{{ $is -> jumlah_transaksi }}</td>
                            <td>( {{ $is -> jumlah_transaksi }} / {{ $totalBuku }}) * 100</td>
                            <td>{{ $is -> support }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <hr />
                <p class="card-title-desc">
                <h5>Pola hasil analisa</h5>
                </p>
                <div class="table-responsive">
                    <table class="table mb-0 table-hover" id="tblPolaHasil">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pola</th>
                                <th>Confidence</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dataMinConfidence as $is)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>
                                Apabila pelanggan membeli <b>{{ $is -> buku($is -> kd_barang_a) -> judul }}</b>, 
                                maka pelanggan juga akan membeli <b>{{ $is -> buku($is -> kd_barang_b) -> judul }}</b>
                            </td>
                            <td>{{ $is -> support }} %</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                </div>
            </div>
          </div>
          <!-- /.card -->
@endsection

