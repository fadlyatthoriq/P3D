<div class="modal fade" id="modalUpdate{{ $d->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Data Wajib paja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('data-pajak.update', $d->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="npwpd" class="form-label">NPWPD</label>
                        <input type="text" class="form-control" name="npwpd" id="npwpd"
                            aria-describedby="NPWPD" placeholder="NPWPD" value="{{ $d->npwpd }}" required>
                    </div>
                    <div class="form-group">
                        <label for="namausaha" class="form-label">Nama Usaha</label>
                        <input type="text" class="form-control" name="namausaha" id="namausaha"
                            aria-describedby="namausaha" placeholder="Nama Usaha" value="{{$d->namausaha}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenisusaha" class="form-label">Jenis Usaha</label>
                        <input type="text" class="form-control" name="jenisusaha" id="jenisusaha"
                            aria-describedby="jenisusaha" placeholder="Jenis Usaha" value="{{$d->jenisusaha}}" required>
                    </div>
                    <div class="form-group">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" name="latitude" id="latitude" aria-describedby="latitude"
                            placeholder="Latitude"  value="{{$d->latitude}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" name="longitude" id="longitude" aria-describedby="longitude"
                            placeholder="Longitude" value="{{$d->longitude}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenispendapatan" class="form-label">Jenis Pendapatan</label>
                        <select name="jenispendapatan" id="jenispendapatan" class="form-control" required>
                            <option value="" disabled selected>Pilih Jenis Pendapatan</option>
                            <option value="Penggantian atau Imbalan" {{ old('jenispendapatan', $d->jenispendapatan) == 'Penggantian atau Imbalan' ? 'selected' : '' }}>Penggantian atau Imbalan</option>
                            <option value="Hadiah" {{ old('jenispendapatan', $d->jenispendapatan) == 'Hadiah' ? 'selected' : '' }}>Hadiah</option>
                            <option value="Laba Usaha" {{ old('jenispendapatan', $d->jenispendapatan) == 'Laba Usaha' ? 'selected' : '' }}>Laba Usaha</option>
                            <option value="Keuntungan Penjualan" {{ old('jenispendapatan', $d->jenispendapatan) == 'Keuntungan Penjualan' ? 'selected' : '' }}>Keuntungan Penjualan</option>
                            <option value="Penerimaan Kembali" {{ old('jenispendapatan', $d->jenispendapatan) == 'Penerimaan Kembali' ? 'selected' : '' }}>Penerimaan Kembali</option>
                            <option value="Bunga" {{ old('jenispendapatan', $d->jenispendapatan) == 'Bunga' ? 'selected' : '' }}>Bunga</option>
                            <option value="Dividen" {{ old('jenispendapatan', $d->jenispendapatan) == 'Dividen' ? 'selected' : '' }}>Dividen</option>
                            <option value="Royalti" {{ old('jenispendapatan', $d->jenispendapatan) == 'Royalti' ? 'selected' : '' }}>Royalti</option>
                            <option value="Sewa" {{ old('jenispendapatan', $d->jenispendapatan) == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    {{-- <div class="form-group">
                                                                <label for="" class="mb-3">Alamat Usaha</label>
                                                                <input type="text" class="form-control mb-1" name="latitude" id="latitude" 
                                                                    aria-describedby="latitude" placeholder="Latitude (Filled Automatically)" readonly required>
                                                                <input type="text" class="form-control mt-1" name="longtitude" id="longtitude" 
                                                                    aria-describedby="longtitude" placeholder="Longtitude (Filled Automatically)" readonly required>
                                                            </div> --}}
                    <div class="form-group">
                        <label for="teleponusaha" class="form-label">Telepon Usaha</label>
                        <input type="number" class="form-control" name="teleponusaha" id="teleponusaha"
                            aria-describedby="teleponusaha" placeholder="No Telp Usaha" value="{{$d->teleponusaha}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggalpendaftaran" class="form-label">Tanggal Pendaftaran</label>
                        <input type="date" class="form-control" name="tanggalpendaftaran" id="tanggalpendaftaran"
                            aria-describedby="tanggalpendaftaran" value="{{$d->tanggalpendaftaran}}" required>
                    </div>
                    <div class="form-group">
                        <label for="namapemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" name="namapemilik" id="namapemilik"
                            aria-describedby="namapemilik" placeholder="Nama Pemilik" value="{{$d->namapemilik}}" required>
                    </div>
                    <div class="form-group">
                        <label for="nikpemilik" class="form-label">NIK Pemilik</label>
                        <input type="number" class="form-control" name="nikpemilik" id="nikpemilik"
                            aria-describedby="nikpemilik" placeholder="NIK Pemilik" value="{{$d->nikpemilik}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatanpemilik" class="form-label">Jabatan Pemilik</label>
                        <input type="text" class="form-control" name="jabatanpemilik" id="jabatanpemilik"
                            aria-describedby="jabatanpemilik" placeholder="Jabatan Pemilik" value="{{$d->jabatanpemilik}}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamatpemilik" class="form-label">Alamat Pemilik</label>
                        <textarea class="form-control" name="alamatpemilik" id="alamatpemilik" aria-describedby="alamatpemilik"
                            placeholder="Alamat Pemilik" required>{{old('alamatpemilik', $d->alamatpemilik)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="teleponpemilik" class="form-label">Telepon Pemilik</label>
                        <input type="text" class="form-control" name="teleponpemilik" id="teleponpemilik"
                            aria-describedby="teleponpemilik" placeholder="No Telp Pemilik" value="{{$d->teleponpemilik}}" required>
                    </div>
                    <div class="text-start mt-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
