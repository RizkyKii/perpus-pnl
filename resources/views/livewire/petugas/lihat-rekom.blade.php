@include('petugas/lihat/delete')

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
                            <th><center>Min. Support</center></th>
                            <th><center>Min. Confidence</center></th>
                            <th><center>Jumlah Buku Direkomendasi</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($kdPengujian as $item)
                    <tr>
                        <td><center>{{ $loop -> iteration }}</center></td>
                        <td><center>{{ $item -> nama_penguji }}</center></td>
                        <td><center>{{ $item -> created_at->diffForHumans()}}</center></td>
                        <td><center>{{ $item -> min_supp }}</center></td>
                        <td><center>{{ $item -> min_confidence }}</center></td>
                        <td><center>{{ $item -> totalPolaProduk($item -> kd_pengujian, $item -> min_confidence) }}</center></td>
                        <td><center>
                            <a href="javascript:void(0)" onclick="keDetail('{{ $item -> kd_pengujian }}')" class="btn btn-sm btn-success">Lihat</a>
                            
                            <span wire:click="delete({{$item->id}})" class="btn btn-sm btn-danger">Hapus</span>
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
        renderPage('hasil/'+kdPengujian, 'hasilAnalisa');
    }

</script>