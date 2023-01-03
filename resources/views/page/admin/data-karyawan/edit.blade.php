@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    @if ($user->role_id == 1)
        <h1 class="h3 mb-2 text-gray-800">Edit Data Admin</h1>
    @else
        <h1 class="h3 mb-2 text-gray-800">Edit Data User</h1>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        @if ($user->role_id == 1)
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Admin</h6>
        @else
            <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
        @endif
        </div>
        <div class="card-body">
            <form action="{{ route('dataKaryawan.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label text-black">Nama</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label text-black">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $user->alamat) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="role_id" class="form-label text-black">Jabatan</label>
                            <select name="role_id" id="role_id" class="form-select">
                                @foreach ($role as $item)
                                    <option {{ (old('role_id', $user->role_id) == $item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label text-black">No Hp</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $user->no_hp) }}">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            @if ($user->role_id == 1)
                                <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
                            @elseif ($user->role_id == 2)
                                <a href="{{ route('dataKaryawan.index') }}" class="btn btn-secondary">Batal</a>
                            @endif
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
