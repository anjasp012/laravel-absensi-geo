@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    @if ($user->role_id == 1)
        <h1 class="h3 mb-2 text-gray-800">Detail Profile Admin</h1>
    @else
        <h1 class="h3 mb-2 text-gray-800">Detail User</h1>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        @if ($user->role_id == 1)
            <h6 class="m-0 font-weight-bold text-primary">Detail Profile Admin</h6>
        @else
            <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
        @endif
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam" class="form-label text-black">Nama</label>
                        <input readonly type="text" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="jam" class="form-label text-black">Alamat</label>
                        <textarea readonly class="form-control">{{ $user->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jam" class="form-label text-black">Jabatan</label>
                        <input readonly type="text" class="form-control" value="{{ $user->role->nama_role }}">
                    </div>
                    <div class="mb-3">
                        <label for="jam" class="form-label text-black">No Hp</label>
                        <input readonly type="text" class="form-control" value="{{ $user->no_hp }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
