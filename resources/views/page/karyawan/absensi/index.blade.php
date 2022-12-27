@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-5">
                    <div class="card-header">{{ __('Absensi') }}</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="card my-4">
                                    <p class="card-header text-center py-1 text-dark fw-bold">SEKARANG PUKUL</p>
                                    <div class="card-body bg-gradient-primary">
                                        <h1 class="text-center text-white">
                                            {{ date("H:i") }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (date("H:i") < '07:00')
                            <div class="text-danger text-center">Anda Belum Bisa absen Masuk</div>
                        @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h3 class="text-center fw-bold">Absensi masuk</h3>
                                        @if ($absensi)
                                            <div class="card bg-gradient-success">
                                                <div class="card-body">
                                                    <h3 class="text-center text-white">
                                                        {{ date('H:i', strtotime($absensi->waktu_masuk)) }}
                                                    </h3>
                                                </div>
                                            </div>
                                            <p class="text-danger text-center">{{ $absensi->keterangan_masuk }}</p>
                                            @else
                                                <a class="card bg-gradient-success" href="{{ route('absensi.masuk') }}">
                                                    <div class="card-body">
                                                        <h3 class="text-center text-white">
                                                            Masuk
                                                        </h1>
                                                    </div>
                                                </a>
                                            @endif
                                    </div>
                                </div>
                                @if ($absensi)
                                <div class="col-md-6">
                                    <div class="mb-3">
                                            <h3 class="text-center fw-bold">Absensi Keluar</h3>
                                            @if ($absensi->waktu_keluar)
                                            <div class="card bg-gradient-info">
                                                <div class="card-body">
                                                    <h3 class="text-center text-white">
                                                        {{ date('H:i', strtotime($absensi->waktu_keluar)) }}
                                                    </h3>
                                                </div>
                                            </div>
                                            <p class="text-danger text-center">{{ $absensi->keterangan_keluar }}</p>
                                            @else
                                            <a class="card bg-gradient-info" href="{{ route('absensi.keluar') }}">
                                                <div class="card-body">
                                                    <h3 class="text-center text-white">
                                                        Keluar
                                                    </h3>
                                                </div>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
