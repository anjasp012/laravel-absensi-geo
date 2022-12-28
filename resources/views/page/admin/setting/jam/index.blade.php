@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    @if (Request::routeIs('jam-masuk'))
        <h1 class="h3 mb-2 text-gray-800">Setting Jam Masuk</h1>
    @else
        <h1 class="h3 mb-2 text-gray-800">Setting Jam Keluar</h1>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (Request::routeIs('jam-masuk'))
                <h6 class="m-0 font-weight-bold text-primary">Setting Jam Masuk</h6>
            @else
                <h6 class="m-0 font-weight-bold text-primary">Setting Jam Keluar</h6>
            @endif
        </div>
        <div class="card-body">
            @if (Request::routeIs('jam-masuk'))
                <form action="{{ route('store-jam-masuk') }}" method="POST">
            @else
                <form action="{{ route('store-jam-keluar') }}" method="POST">
            @endif
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-3">
                        @if (Request::routeIs('jam-masuk'))
                            <div class="mb-3">
                                <label for="jam" class="form-label text-black">Jam Masuk</label>
                                <input type="time" name="jam" class="form-control" value="{{ old('jam', date('H:i', strtotime($jam->jam_masuk))) }}">
                            </div>
                            <div class="mb-3">
                                <label for="jam" class="form-label text-black">Batas Jam Masuk</label>
                                <input type="time" name="batas_jam_masuk" class="form-control" value="{{ old('batas_jam_masuk', date('H:i', strtotime($jam->batas_jam_masuk))) }}">
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="jam" class="form-label text-black">Jam Keluar</label>
                                <input type="time" name="jam" class="form-control" value="{{ old('jam', date('H:i', strtotime($jam))) }}">
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
