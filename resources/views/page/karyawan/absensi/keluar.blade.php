@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card text-center my-5">
                    <div id="map"></div>
                    <div class="card-header">Absensi Keluar</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('absensi.storeKeluar') }}">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="lat" id="lat" hidden>
                            <input type="text" name="long" id="long" hidden>
                            <input type="text" name="rad" id="rad" hidden>
                            <div id="wrapper-camera">
                                <video autoplay playsinlin id="my_camera" style="width: 100%;object-fit: cover"></video>
                                <input type="hidden" name="image" class="image-tag">
                                <div class="d-flex justify-content-center">
                                    <button type="button" id="btn-capture" class="btn btn-success" onClick="take_snapshot()">Ambil Foto</button>
                                </div>
                            </div>
                            <div class="d-none" id="wrapper-hasil">
                                <div class="mb-3">
                                    <img class="" src="" id="image" alt="" style="width:100%; height: 400px">
                                </div>
                                <div class="mb-3">
                                    <label for="catatan">Catatan</label>
                                    <textarea name="catatan" id="catatan" class="form-control"></textarea>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button type="button" id="btn-retake" class="btn btn-warning" onClick="foto_ulang()">Foto Ulang</button>
                                    <button id="btn-submit" class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script language="JavaScript">
        navigator.geolocation.getCurrentPosition(getPosition)

        'use strict';

        var constraints = {
        video: true
        };

        var video = document.querySelector('video');

        function handleSuccess(stream) {
        window.stream = stream; // only to make stream available to console
        video.srcObject = stream;
        }

        function handleError(error) {
        console.log('getUserMedia error: ', error);
        }

        navigator.mediaDevices.getUserMedia(constraints).
        then(handleSuccess).catch(handleError);

        Webcam.attach( '#my_camera' );

        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                $("#image").attr('src', data_uri);
                // document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
                $("#wrapper-camera").addClass("d-none");
                $("#wrapper-hasil").removeClass("d-none");
        }

        function foto_ulang() {
            $("#wrapper-camera").removeClass("d-none");
            $("#wrapper-hasil").addClass("d-none");
        }

        var lati = document.getElementById("lat");
        var longi = document.getElementById("long");
        var rad = document.getElementById("rad");
        //
        var map_init = L.map('map', {
            center: [9.0820, 8.6753],
            zoom: 8
        });
        if (!navigator.geolocation) {
            console.log("Your browser doesn't support geolocation feature!")
        };
        var marker, circle, lat, long, accuracy;

        function getPosition(position) {
            // console.log(position)
            lat = position.coords.latitude
            long = position.coords.longitude
            accuracy = position.coords.accuracy

            if (marker) {
                map_init.removeLayer(marker)
            }

            if (circle) {
                map_init.removeLayer(circle)
            }

            marker = L.marker([lat, long])
            circle = L.circle([lat, long], { radius: accuracy })

            var featureGroup = L.featureGroup([marker, circle]).addTo(map_init)

            map_init.fitBounds(featureGroup.getBounds())

            lati.value = lat
            longi.value = long
            rad.value = accuracy
            // console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy)
        }
    </script>
@endsection
