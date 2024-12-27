@extends('template.main')

@section('title')
    Maps
@endsection

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <style>
        #map {
            width: 100%;
            height: 400px;
        }
    </style>
@endsection

@section('main')
    <main class="main-content">
        <div class="container-fluid content-inner mt-n5 py-0">
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Maps</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Lihat titik daerah wajib pajak</p>
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('javascript')
    <script>
        const map = L.map('map').setView([-6.258862927234698, 106.95082428096438], 13);

        const tiles = L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

    // Tambahkan polygon untuk Kecamatan Pondok Gede
    fetch('/assets/layerPolygon')
    .then(response => response.json())
    .then(data => {
        L.geoJson(data, {
            onEachFeature: function(feature, layer) {
                layer.bindPopup("Kelurahan " + feature.properties.NAMOBJ + ", Kecamatan " + feature.properties.WADMKC + ", " + feature.properties.WADMKK + ", Provinsi " + feature.properties.WADMPR + ".");
            }
        }).addTo(map);
    });
    </script>
@endpush
