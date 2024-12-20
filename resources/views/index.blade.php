@extends('template.main')

@section('title')
    Home
@endsection

@section('main')
    <main class="main-content">
        <div class="container-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="row row-cols-1">
                        <div class="overflow-hidden d-slider1">
                            <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                                    <div class="card-body">
                                        <div class="progress-widget">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                    viewBox="0 0 24 24" fill="none" stroke="#0d6efd" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="18" y1="20" x2="18" y2="10">
                                                    </line>
                                                    <line x1="12" y1="20" x2="12" y2="4">
                                                    </line>
                                                    <line x1="6" y1="20" x2="6" y2="14">
                                                    </line>
                                                </svg>
                                            </div>
                                            <div class="progress-detail">
                                                <p class="mb-2">Total Data Wajib Pajak </p>
                                                <h4 class="counter">{{ $totalwajibpajak }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                                    <div class="card-body">
                                        <div class="progress-widget">
                                            <div id="circle-progress-02"
                                                class="text-center circle-progress-01 circle-progress circle-progress-info"
                                                data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                                </svg>
                                            </div>
                                            <div class="progress-detail">
                                                <p class="mb-2">Total Profit</p>
                                                <h4 class="counter">$185K</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                                    <div class="card-body">
                                        <div class="progress-widget">
                                            <div id="circle-progress-03"
                                                class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                                data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                                </svg>
                                            </div>
                                            <div class="progress-detail">
                                                <p class="mb-2">Total Cost</p>
                                                <h4 class="counter">$375K</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="swiper-button swiper-button-next"></div>
                            <div class="swiper-button swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Data Wajib Pajak</h4>
                                    </div>
                                    @can('manage wajib pajak')
                                        <div class="">
                                            <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop-1">
                                                <i class="btn-inner">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                </i>
                                                <span>Tambah Data</span>
                                            </a>
                                            @include('components.modal-tambah')
                                        </div>
                                    @endcan
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NPWPD</th>
                                                    <th>Nama Usaha</th>
                                                    <th>Jenis Pendapatan</th>
                                                    @can('manage wajib pajak')
                                                        <th>Aksi</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data as $d)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $d->npwpd }}</td>
                                                        <td>{{ $d->namausaha }}</td>
                                                        <td>{{ $d->jenispendapatan }}</td>
                                                        @can('manage wajib pajak')
                                                            <td>
                                                                <div style="float: left;">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-icon text-primary flex-end"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalUpdate{{ $d->id }}">
                                                                        <span class="btn-inner" data-bs-toggle="tooltip"
                                                                            title="Edit Data">
                                                                            <svg class="icon-20" width="20"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                                                    stroke="currentColor" stroke-width="1.5"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                    d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                                                    stroke="currentColor" stroke-width="1.5"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path d="M15.1655 4.60254L19.7315 9.16854"
                                                                                    stroke="currentColor" stroke-width="1.5"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    @include('components.modal-edit')
                                                                    <form action="{{ route('data-pajak.destroy', $d->id) }}"
                                                                        method="POST" class="deletedata">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-icon text-danger"
                                                                            data-bs-toggle="tooltip" title="Delete Data">
                                                                            <span class="btn-inner">
                                                                                <svg class="icon-20" width="20"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    stroke="currentColor">
                                                                                    <path
                                                                                        d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                    <path d="M20.708 6.23975H3.75"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                    <path
                                                                                        d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        @endcan
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NPWPD</th>
                                                    <th>Nama Usaha</th>
                                                    <th>Jenis Pendapatan</th>
                                                    @can('manage wajib pajak')
                                                        <th>Aksi</th>
                                                    @endcan

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('javascript')
        <script>
            let map; // Peta global untuk modal tambah
            let marker; // Marker global untuk modal tambah

            // Fungsi untuk inisialisasi peta di modal tambah
            function initMapTambah(lat, lng) {
                if (!map) { // Pastikan peta hanya diinisialisasi sekali
                    map = L.map('map').setView([-6.200000, 106.816666], 13); // Koordinat awal (Jakarta)
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    }).addTo(map);

                    marker = L.marker([-6.200000, 106.816666], {
                        draggable: true
                    }).addTo(map);

                    // Isi input awal dengan posisi marker setelah peta dan marker siap
                    setTimeout(function() {
                        if (marker) {
                            let latlng = marker.getLatLng();
                            updateLatLngInputsTambah(latlng);
                        }
                    }, 300);

                    marker.on('dragend', function(e) {
                        const latlng = e.target.getLatLng();
                        updateLatLngInputsTambah(latlng); // Update input latitude/longitude untuk modal tambah
                    });

                    setTimeout(() => {
                        map.invalidateSize(); // Refresh ukuran peta setelah modal dibuka
                    }, 200);
                }
            }

            function updateLatLngInputsTambah(latlng) {
                document.getElementById('latitude').value = latlng.lat;
                document.getElementById('longitude').value = latlng.lng;
            }

            // Menyimpan lokasi saat tombol save diklik
            document.querySelector('.btn-save-tambah').addEventListener('click', function() {
                if (marker) {
                    let latlng = marker.getLatLng();
                    if (latlng) {
                        console.log(`Lokasi disimpan: Latitude: ${latlng.lat}, Longitude: ${latlng.lng}`);
                    } else {
                        console.error("Marker latlng is undefined.");
                    }
                }
            });

            // Menyimpan peta dan marker berdasarkan ID modal
            let maps = {};
            let markers = {};

            // Fungsi untuk inisialisasi peta di modal edit
            function initMapEdit(id, lat, lng) {
                if (!maps[id]) {
                    maps[id] = L.map('map-edit' + id).setView([lat, lng], 13); // Peta untuk modal dengan ID unik

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    }).addTo(maps[id]);

                    markers[id] = L.marker([lat, lng], {
                        draggable: true
                    }).addTo(maps[id]);

                    setTimeout(function() {
                        if (markers) {
                            let latlng = markers.getLatLng();
                            updateLatLngInputs(latlng);
                        }
                    }, 300);

                    markers[id].on('dragend', function(e) {
                        const latlng = e.target.getLatLng();
                        updateLatLngInputs(id, latlng); // Update input latitude/longitude
                    });
                } else {
                    maps[id].setView([lat, lng], 13); // Update peta jika sudah ada
                    markers[id].setLatLng([lat, lng]); // Update marker jika sudah ada
                }

                setTimeout(() => {
                    maps[id].invalidateSize(); // Refresh ukuran peta setelah modal dibuka
                }, 200);
            }

            // Fungsi untuk mengupdate input latitude dan longitude berdasarkan posisi marker
            function updateLatLngInputs(id, latlng) {
                document.getElementById('latitude' + id).value = latlng.lat;
                document.getElementById('longitude' + id).value = latlng.lng;
            }

            // Ketika modal edit dibuka
            $(document).on('click', '.edit-btn', function() {
                const id = $(this).data('id'); // ID untuk modal yang akan dibuka
                const lat = $(this).data('latitude'); // Latitude yang ada di database
                const lng = $(this).data('longitude'); // Longitude yang ada di database

                $('#modalUpdate' + id).modal('show'); // Menampilkan modal

                // Tunggu hingga modal selesai tampil, lalu inisialisasi peta
                $('#modalUpdate' + id).on('shown.bs.modal', function() {
                    initMapEdit(id, lat, lng); // Inisialisasi peta untuk modal edit
                });
            });

            // Ketika modal tambah dibuka
            $('#staticBackdrop-1').on('shown.bs.modal', function() {
                const lat = 0; // Koordinat default
                const lng = 0; // Koordinat default

                initMapTambah(lat, lng); // Inisialisasi peta untuk modal tambah
            });

            // Menyimpan lokasi saat tombol save diklik
            document.querySelector('.btn-save-tambah').addEventListener('click', function() {
                if (marker) {
                    let latlng = marker.getLatLng();
                    if (latlng) {
                        console.log(`Lokasi disimpan: Latitude: ${latlng.lat}, Longitude: ${latlng.lng}`);
                    } else {
                        console.error("Marker latlng is undefined.");
                    }
                }
            });

            // Menambahkan event listener untuk setiap form dengan class .delete-form
            document.querySelectorAll('.deletedata').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Yakin ingin menghapus data ini?')) {
                        e.preventDefault(); // Membatalkan pengiriman form jika konfirmasi ditolak
                    }
                });
            });
        </script>
    @endpush
@endsection
