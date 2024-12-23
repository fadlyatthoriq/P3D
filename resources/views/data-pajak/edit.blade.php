@extends('template.main')

@section('title')
    Edit Data | ID {{ $data->id }}
@endsection

@section('main')
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Update Data Pajak</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form-edit" action="{{ route('data-pajak.update', $data->id) }}" method="POST" class="mt-3">
                                @csrf
                                @method('PUT')

                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="npwpd" class="form-label">NPWPD</label>
                                                <input type="text" class="form-control @error('npwpd') is-invalid @enderror" 
                                                    name="npwpd" id="npwpd" value="{{ old('npwpd', $data->npwpd) }}" 
                                                    required autofocus>
                                                @error('npwpd')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="namausaha" class="form-label">Nama Usaha</label>
                                                <input type="text" class="form-control @error('namausaha') is-invalid @enderror" 
                                                    name="namausaha" id="namausaha" value="{{ old('namausaha', $data->namausaha) }}" 
                                                    required>
                                                @error('namausaha')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="jenisusaha" class="form-label">Jenis Usaha</label>
                                                <input type="text" class="form-control @error('jenisusaha') is-invalid @enderror" 
                                                    name="jenisusaha" id="jenisusaha" value="{{ old('jenisusaha', $data->jenisusaha) }}" 
                                                    required>
                                                @error('jenisusaha')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="jenispendapatan" class="form-label">Jenis Pendapatan</label>
                                                <select name="jenispendapatan" id="jenispendapatan" 
                                                    class="form-control @error('jenispendapatan') is-invalid @enderror" required>
                                                    <option value="" disabled>Pilih Jenis Pendapatan</option>
                                                    @php
                                                        $options = [
                                                            'Penggantian atau Imbalan',
                                                            'Hadiah',
                                                            'Laba Usaha',
                                                            'Keuntungan Penjualan',
                                                            'Penerimaan Kembali',
                                                            'Bunga',
                                                            'Dividen',
                                                            'Royalti',
                                                            'Sewa',
                                                            'Lainnya'
                                                        ];
                                                    @endphp
                                                    @foreach($options as $option)
                                                        <option value="{{ $option }}" 
                                                            {{ old('jenispendapatan', $data->jenispendapatan) == $option ? 'selected' : '' }}>
                                                            {{ $option }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('jenispendapatan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="latitude" class="form-label">Latitude</label>
                                                <input type="text" class="form-control" name="latitude" 
                                                    id="latitude{{ $data->id }}" value="{{ $data->latitude }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="longitude" class="form-label">Longitude</label>
                                                <input type="text" class="form-control" name="longitude" 
                                                    id="longitude{{ $data->id }}" value="{{ $data->longitude }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div id="map-edit-{{$data->id}}" style="height: 400px;"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="teleponusaha" class="form-label">Telepon Usaha</label>
                                                <input type="tel" class="form-control @error('teleponusaha') is-invalid @enderror" 
                                                    name="teleponusaha" id="teleponusaha" 
                                                    value="{{ old('teleponusaha', $data->teleponusaha) }}" required>
                                                @error('teleponusaha')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="tanggalpendaftaran" class="form-label">Tanggal Pendaftaran</label>
                                                <input type="date" class="form-control @error('tanggalpendaftaran') is-invalid @enderror" 
                                                    name="tanggalpendaftaran" id="tanggalpendaftaran" 
                                                    value="{{ old('tanggalpendaftaran', $data->tanggalpendaftaran) }}" required>
                                                @error('tanggalpendaftaran')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="namapemilik" class="form-label">Nama Pemilik</label>
                                                <input type="text" class="form-control @error('namapemilik') is-invalid @enderror" 
                                                    name="namapemilik" id="namapemilik" 
                                                    value="{{ old('namapemilik', $data->namapemilik) }}" required>
                                                @error('namapemilik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="nikpemilik" class="form-label">NIK Pemilik</label>
                                                <input type="text" class="form-control @error('nikpemilik') is-invalid @enderror" 
                                                    name="nikpemilik" id="nikpemilik" 
                                                    value="{{ old('nikpemilik', $data->nikpemilik) }}" required>
                                                @error('nikpemilik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="jabatanpemilik" class="form-label">Jabatan Pemilik</label>
                                                <input type="text" class="form-control @error('jabatanpemilik') is-invalid @enderror" 
                                                    name="jabatanpemilik" id="jabatanpemilik" 
                                                    value="{{ old('jabatanpemilik', $data->jabatanpemilik) }}" required>
                                                @error('jabatanpemilik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="alamatpemilik" class="form-label">Alamat Pemilik</label>
                                                <textarea class="form-control @error('alamatpemilik') is-invalid @enderror" 
                                                    name="alamatpemilik" id="alamatpemilik" required>{{ old('alamatpemilik', $data->alamatpemilik) }}</textarea>
                                                @error('alamatpemilik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="teleponpemilik" class="form-label">Telepon Pemilik</label>
                                                <input type="tel" class="form-control @error('teleponpemilik') is-invalid @enderror" 
                                                    name="teleponpemilik" id="teleponpemilik" 
                                                    value="{{ old('teleponpemilik', $data->teleponpemilik) }}" required>
                                                @error('teleponpemilik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-start mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('data-pajak.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript-formedit')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const id = {{ $data->id }};
        const lat = {{ $data->latitude ?? 0 }};
        const lng = {{ $data->longitude ?? 0 }};
        
        // Initialize map
        const map = L.map('map-edit-' + id).setView([lat, lng], 13);
        
        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);
        
        // Add marker
        const marker = L.marker([lat, lng], {
            draggable: true
        }).addTo(map);
        
        // Update coordinates on marker drag
        marker.on('dragend', function(e) {
            const position = e.target.getLatLng();
            document.getElementById('latitude' + id).value = position.lat.toFixed(6);
            document.getElementById('longitude' + id).value = position.lng.toFixed(6);
        });
        
        // Handle form submission
        document.getElementById('form-edit').addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi');
            }
        });
    });
</script>
@endsection