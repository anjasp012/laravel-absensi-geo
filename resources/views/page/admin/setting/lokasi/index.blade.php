@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Setting Lokasi</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Setting Lokasi</h6>
                <form action="{{ route('store-lokasi') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="d-flex gap-2">
                        <input id="lat" class="form-control" name="lat" type="text" value="{{ old('lat', $lokasi->lat) }}"/>
                        <input id="lng" class="form-control" name="lng" type="text" value="{{ old('lat', $lokasi->lng) }}"/>
                        <input type="submit" class="btn btn-primary" value="Update Lokasi">
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div id="map" class="w-100" style="height:500px"></div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var tileLayer = new L.TileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png',{
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
        });

        var lat = document.getElementById('lat');
        var lng = document.getElementById('lng');

        var map = new L.Map('map', {
        'center': [lat.value, lng.value],
        'zoom': 12,
        'layers': [tileLayer]
        });

        var marker = L.marker([lat.value, lng.value],{
        draggable: true
        }).addTo(map);

        marker.on('dragend', function (e) {
        lat.value = marker.getLatLng().lat;
        lng.value = marker.getLatLng().lng;
        });
    </script>
@endsection
