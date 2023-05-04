@if ($delete)
<div class="modal fade show" id="modal-default" style="display:block; padding-right: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tolak Permintaan Peminjaman</h4>
        <span wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </span>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin menolak permintaan peminjaman ?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <span wire:click="format" type="button" class="btn btn-default" data-dismiss="modal">Batal</span>
        <span type="button" wire:click="destroy({{$hapus_permintaan}})" class="btn btn-danger">Tolak</span>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endif