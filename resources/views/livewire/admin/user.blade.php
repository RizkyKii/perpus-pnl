<div class="row">
    <div class="col-12">

       @include('admin-lte/flash')

        @include('admin/user/create')
        
        {{-- @include('petugas/kategori/edit') --}}
          
        @include('admin/user/delete')

        <div class="btn-group mb-3">
          <button wire:click="format" class="btn btn-sm bg-navy mr-2">Lihat Semua</button>
          <button wire:click="admin" class="btn btn-sm bg-maroon mr-2">Admin</button>
          <button wire:click="petugas" class="btn btn-sm bg-teal mr-2">Petugas</button>
          <button wire:click="peminjam" class="btn btn-sm bg-primary mr-2">Peminjam</button>
        </div>

      <div class="card">
        <div class="card-header">
          @if ($admin || $petugas || $peminjam)
          <span wire:click="create" class="btn btn-sm btn-primary">Tambah</span>
          @endif
          

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
        @if ($user->isNotEmpty())
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th width="10%">No</th>
                <th>Nama</th>
                <th>Role</th>
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($user as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>
                    @if ($item->roles[0]->name == 'admin')
                        <span class="badge bg-maroon">Admin</span>
                    @elseif ($item->roles[0]->name == 'petugas')
                        <span class="badge bg-teal">Petugas</span>
                    @else
                        <span class="badge bg-primary">Peminjam</span>
                    @endif
                </td>
                <td>
                  <div class="btn-group">
                       <span wire:click="delete({{$item->id}})" class="btn btn-sm btn-danger">Hapus</span>
                   </div> 
               </td>
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
        {{$user->links()}}
      </div>

      @if ($user->isEmpty())
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