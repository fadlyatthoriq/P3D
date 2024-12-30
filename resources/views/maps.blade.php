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

    <div class="modal fade" id="markerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="markerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="markerModalLabel">Detail Marker</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <i class="bi bi-person-vcard"></i>
                        <strong>NPWPD: </strong>
                        <span id="modalNPWPD"></span>
                    </p>
                    <p>
                        <i class="bi bi-building"></i>
                        <strong>Nama Usaha: </strong>
                        <span id="modalNamaUsaha"></span>
                    </p>

                    <p>
                        <i class="bi bi-building-gear"></i>
                        <strong>Jenis Usaha: </strong>
                        <span id="modalJenisUsaha"></span>
                    </p>

                    <p>
                        <i class="bi bi-telephone"></i>
                        <strong>Telepon Usaha: </strong>
                        <a id="modalTeleponUsaha" href="#"></a>
                    </p>
                    <p>
                        <i class="bi bi-cash-stack"></i>
                        <strong>Jenis Pendapatan: </strong>
                        <span id="modalJenisPendapatan"></span>
                    </p>
                    <p>
                        <i class="bi bi-calendar"></i>
                        <strong>Tanggal Pendaftaran: </strong>
                        <span id="modalTanggalPendaftaran"></span>
                    </p>
                    <p>
                        <i class="bi bi-person"></i>
                        <strong>Nama Pemilik: </strong>
                        <span id="modalNamaPemilik"></span>
                    </p>
                    <p>
                        <i class="bi bi-person-gear"></i>
                        <strong>NIK Pemilik: </strong>
                        <span id="modalNIKPemilik"></span>
                    </p>
                    <p>
                        <i class="bi bi-briefcase"></i>
                        <strong>Jabatan Pemilik: </strong>
                        <span id="modalJabatanPemilik"></span>
                    </p>
                    <p>
                        <i class="bi bi-geo-alt"></i>
                        <strong>Alamat Pemilik: </strong>
                        <span id="modalAlamatPemilik"></span>
                    </p>
                    <p>
                        <i class="bi bi-phone"></i>
                        <strong>Telepon Pemilik: </strong>
                        <a id="modalTeleponPemilik" href="#"></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        const map = L.map('map').setView([-6.264475702166709, 106.97834585138914], 11);

        const tiles = L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap | Peta Wilayah Kota Bekasi (per Kecamatan)'
        }).addTo(map);

        // Tambahkan polygon untuk Kecamatan Pondok Gede
        fetch('/assets/layerPolygon')
            .then(response => response.json())
            .then(data => {
                L.geoJson(data, {
                    onEachFeature: function(feature, layer) {
                        layer.bindPopup("Kelurahan " + feature.properties.NAMOBJ + ", Kecamatan " + feature
                            .properties.WADMKC + ", " + feature.properties.WADMKK + ", Provinsi " +
                            feature.properties.WADMPR + ".");
                    }
                }).addTo(map);
            });

        // Ambil data marker dari API
        fetch('/api/markers')
            .then(response => response.json())
            .then(data => {
                data.forEach(markerData => {
                    // Tambahkan marker ke peta
                    var marker = L.marker([markerData.latitude, markerData.longitude]).addTo(map);

                    // Event klik untuk menampilkan detail lengkap
                    marker.on('click', function() {
                        document.getElementById('modalNPWPD').textContent = markerData.npwpd ||
                            'NPWPD Tidak Tersedia';
                        document.getElementById('modalNamaUsaha').textContent = markerData.namausaha ||
                            'Nama Usaha Tidak Tersedia';
                        document.getElementById('modalJenisUsaha').textContent = markerData
                            .jenisusaha || 'Jenis Usaha Tidak Tersedia';
                        document.getElementById('modalTeleponUsaha').href =
                            `tel:${markerData.teleponusaha || ''}`;
                        document.getElementById('modalTeleponUsaha').textContent = markerData
                            .teleponusaha || 'Tidak tersedia';
                        document.getElementById('modalJenisPendapatan').textContent = markerData
                            .jenispendapatan || 'Tidak tersedia';
                        document.getElementById('modalTanggalPendaftaran').textContent = markerData
                            .tanggalpendaftaran || 'Tidak tersedia';
                        document.getElementById('modalNamaPemilik').textContent = markerData
                            .namapemilik || 'Tidak tersedia';
                        document.getElementById('modalNIKPemilik').textContent = markerData
                            .nikpemilik || 'Tidak tersedia';
                        document.getElementById('modalJabatanPemilik').textContent = markerData
                            .jabatanpemilik || 'Tidak tersedia';
                        document.getElementById('modalAlamatPemilik').textContent = markerData
                            .alamatpemilik || 'Tidak tersedia';
                        document.getElementById('modalTeleponPemilik').href =
                            `tel:${markerData.teleponpemilik || ''}`;
                        document.getElementById('modalTeleponPemilik').textContent = markerData
                            .teleponpemilik || 'Tidak tersedia';

                        // Tampilkan modal
                        var markerModal = new bootstrap.Modal(document.getElementById('markerModal'));
                        markerModal.show();
                    });
                });
            })
            .catch(error => console.error('Error fetching marker data:', error));
    </script>
@endpush
