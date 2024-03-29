@if ($show)
<div class="modal fade show" id="modal-default" style="display:block; padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Lihat Buku</h4>
        <span wire:click="format" type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Close</span>
        </span>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-5">
                <div class="row justify-content-center">
                    <img src="/storage/{{$sampul}}" alt="{{$judul}}" width="250" height="440">
                </div>
            </div>
            <div class="col-md-7">
                <table class="table text-nowrap">
                    <tbody>
                        <tr>
                            <th>Judul</th>
                            <td>:</td>
                            <td class="text-wrap" style="width: 15rem">{{$judul}}</td>
                        </tr>
                        <tr>
                            <th>ISBN-ISSN</th>
                            <td>:</td>
                            <td>{{$isbn_issn}}</td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>:</td>
                            <td class="text-wrap" style="width: 15rem">{{$penulis}}</td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>:</td>
                            <td class="text-wrap" style="width: 15rem">{{$penerbit}}</td>
                        </tr>
                        <tr>
                            <th>Tempat Publish</th>
                            <td>:</td>
                            <td>{{$publish}}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>:</td>
                            <td>{{$kategori}}</td>
                        </tr>
                        <tr>
                          <th>Bahasa</th>
                          <td>:</td>
                          <td>{{$bahasa}}</td>
                      </tr>
                        <tr>
                          <th>Tahun Terbit</th>
                          <td>:</td>
                          <td>{{$tahun}}</td>
                      </tr>
                        <tr>
                            <th>Rak</th>
                            <td>:</td>
                            <td>{{$rak}}</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>:</td>
                            <td>{{$stok}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      {{-- <div class="modal-footer justify-content-between">
        <span wire:click="format" type="button" class="btn btn-default" data-dismiss="modal">Kembali</span>
      </div> --}}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endif