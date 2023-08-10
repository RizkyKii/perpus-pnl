@extends('layouts/app')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Daftar Rekomendasi Buku</h4>
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblLaporan">
                    <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Direkomendasikan Oleh</center></th>
                            <th><center>Waktu Dibuat</center></th>
                            <th><center>Jumlah Buku Direkomendasi</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dataPengujian as $pengujian)
                    <tr>
                        <td><center>{{ $loop -> iteration }}</center></td>
                        <td><center>{{ $pengujian -> nama_penguji }}</center></td>
                        <td><center>{{ $pengujian -> created_at->diffForHumans() }}</center></td>
                        <td><center>{{ $pengujian -> totalPolaProduk($pengujian -> kd_pengujian, $pengujian -> min_confidence) }}</center></td>
                        <td>
                            <center><a href="javascript:void(0)" onclick="keDetail('{{ $pengujian -> kd_pengujian }}')" class="btn btn-sm btn-success ">Lihat</a>
                            </center>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    $("#tblLaporan").dataTable();

    function keDetail(kdPengujian)
    {
        renderPage('hasilR/'+kdPengujian, 'hasilRekom');
    }

</script>

@endsection