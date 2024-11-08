@extends('template.main')

@section('title')
    Maps
@endsection

@section('main')
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="/" class="navbar-brand">
                        <h4 class="logo-title">SIPANDU</h4>
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="mt-2 navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/avatars/01.png') }}" alt="User-Profile"
                                        class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded" />
                                    <img src="{{ asset('assets/images/avatars/avtar_1.png') }}" alt="User-Profile"
                                        class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded" />
                                    <img src="{{ asset('assets/images/avatars/avtar_2.png') }}" alt="User-Profile"
                                        class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded" />
                                    <img src="{{ asset('assets/images/avatars/avtar_4.png') }}" alt="User-Profile"
                                        class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded" />
                                    <img src="{{ asset('assets/images/avatars/avtar_5.png') }}" alt="User-Profile"
                                        class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded" />
                                    <img src="{{ asset('assets/images/avatars/avtar_3.png') }}" alt="User-Profile"
                                        class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded" />
                                    <div class="caption ms-3 d-none d-md-block">
                                        <h6 class="mb-0 caption-title">Fadly Atthoriq</h6>
                                        <p class="mb-0 caption-sub-title">Kepala Perpajakan</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="#">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 70px">
            </div>
            <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
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
                                <div class="map" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <ul class="left-panel list-inline mb-0 p-0"></ul>
                <div class="right-panel">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    SIPANDU by <a href="#">Fadly Atthoriq</a>.
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>

    <script type="module">
        import '/node_modules/ol/ol.css';
        import { Map, View } from '/node_modules/ol';
        import TileLayer from '/node_modules/ol/layer/Tile';
        import OSM from '/node_modules/ol/source/OSM';

         // Inisialisasi peta menggunakan OpenLayers
         const map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([106.816666, -6.200000]), // Lokasi Jakarta
                zoom: 12
            })
        });

        // Menambahkan marker pada peta
        var marker = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([106.816666, -6.200000]))
        });

        var vectorSource = new ol.source.Vector({
            features: [marker]
        });

        var markerLayer = new ol.layer.Vector({
            source: vectorSource
        });

        map.addLayer(markerLayer);
    </script>
@endsection
