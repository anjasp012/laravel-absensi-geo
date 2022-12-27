@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Absensi</h6>
                <div>
                    <a href="{{ route('lokasi') }}" class="btn bg-gradient-danger text-white">Setting Lokasi</a>
                    <a href="{{ route('jam-masuk') }}" class="btn bg-gradient-primary text-white">Setting Jam Masuk</a>
                    <a href="{{ route('jam-keluar') }}" class="btn bg-gradient-info text-white">Setting Jam Keluar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>foto masuk</th>
                            <th>waktu masuk</th>
                            <th>catatan masuk</th>
                            <th>keterangan masuk</th>
                            <th>foto keluar</th>
                            <th>waktu keluar</th>
                            <th>catatan keluar</th>
                            <th>keterangan keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanAbsensi as $item)
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td><button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-src='{{ asset('storage/' .$item->foto_masuk) }}' data-bs-target="#modalabsenmasuk" id="openModal">cek</button></td>
                                <td>{{ date('H:i', strtotime($item->waktu_masuk)) }}</td>
                                <td>{{ $item->catatan_masuk }}</td>
                                <td>{{ $item->keterangan_masuk }}</td>
                                @if ($item->foto_keluar)
                                <td><button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-src='{{ asset('storage/' .$item->foto_keluar) }}' data-bs-target="#modalabsenkeluar" id="openModal">cek</button></td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{ date('H:i', strtotime($item->waktu_keluar)) }}</td>
                                <td>{{ $item->catatan_keluar }}</td>
                                <td>{{ $item->keterangan_keluar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalabsenmasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Absen Masuk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="myImage" class="img-responsive w-100" src="" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalabsenkeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Absen Keluar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="myImage" class="img-responsive w-100" src="" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on("click", "#openModal", function () {
            var myImageId = $(this).data('src');
            $(".modal-body #myImage").attr("src", myImageId);
                });
    </script>
@endsection
