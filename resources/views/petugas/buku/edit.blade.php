@if ($edit)
<div class="modal fade show" id="modal-default" style="display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Edit Buku</h4>
        <span wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </span>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input wire:model="judul" type="text" class="form-control" id="judul">
                @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input wire:model="penulis" type="text" class="form-control" id="penulis">
                        @error('penulis') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input wire:model="penerbit" type="text" class="form-control" id="penerbit">
                        @error('penerbit') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tahun">Tahun Terbit</label>
                        <input wire:model="tahun" type="text" class="form-control" id="tahun">
                        @error('tahun') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
                <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="isbn_issn">ISBN/ISSN</label>
                        <input wire:model="isbn_issn" type="text" class="form-control" id="isbn_issn">
                        @error('isbn_issn') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bahasa">Bahasa</label>
                        <input wire:model="bahasa" type="text" class="form-control" id="bahasa">
                        @error('bahasa') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input wire:model="stok" type="number" class="form-control" id="stok" min="1">
                        @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="sampul">Sampul</label>
                <input wire:model="sampul" type="file" class="form-control" id="sampul" min="1">
                @error('sampul') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="publish">Tempat Publish</label>
                        <input wire:model="publish" type="text" class="form-control" id="publish">
                        @error('publish') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select wire:model="kategori_id" class="form-control" id="kategori">
                            <option selected value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                            @if ($item->id != 1)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endif             
                            @endforeach
                        </select>
                        @error('kategori_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rak">Rak</label>
                        <select wire:model="rak_id" class="form-control" id="rak">
                            <option selected value="">Pilih Rak</option>
                            @foreach ($rak as $item)
                                <option value="{{$item->id}}">{{$item->rak}}</option>
                            @endforeach
                        </select>
                        @error('rak_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
        <span wire:click="format" type="button" class="btn btn-danger" data-dismiss="modal">Batal</span>
        <span type="button" wire:click="update({{$buku_id}})" class="btn btn-success">Update</span>
        </div>
    </div>
    </div>
</div>
@endif