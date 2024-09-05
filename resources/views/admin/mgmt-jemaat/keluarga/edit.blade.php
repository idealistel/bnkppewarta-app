<x-admin>
    <x-slot:title>Edit Keluarga {{ $data[0]->nama }}</x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.keluarga.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-undo"
                aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    <div class="card my-3">
        <div class="form-container">
            <form class="w-full p-4" method="POST" action="{{ route('mgmt.keluarga.update', $data[0]->keluarga_id) }}">
                @csrf
                @method('PUT')
                <div class="grid md:grid-cols-2 md:grid-flow-row gap-2 mb-3">
                    <div>
                        <label for="keluarga_id">No
                            Kepala Keluarga</label>
                        <input type="text" name="keluarga_id" id="keluarga_id" placeholder=" " autocomplete="off"
                            readonly value="{{ $data[0]->keluarga_id }}" />
                    </div>
                    <div>
                        <label for="sector_id">Nama
                            Sektor</label>
                        <select id="sector_id" name="sector_id">
                            <option value="">pilih sektor</option>
                            @foreach ($sector as $skt)
                                <option value="{{ $skt->id }}"
                                    {{ $data[0]->sector_id == $skt->id ? 'selected' : '' }}>
                                    {{ $skt->nama }}</option>
                            @endforeach
                        </select>
                        @error('sector_id')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="nama">Nama
                            Kepala Keluarga</label>
                        <input type="text" name="nama" id="nama" placeholder=" " autocomplete="off"
                            value="{{ $data[0]->nama }}" />
                        @error('nama')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="alias">Alias</label>
                        <input type="text" name="alias" id="alias" placeholder=" " autocomplete="off"
                            value="{{ $data[0]->alias }}" />
                        @error('alias')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="alamat">alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder=" " autocomplete="off"
                            value="{{ $data[0]->alamat }}" />
                        @error('alamat')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="provinsi_id">provinsi</label>
                        <select id="provinsi_id" name="provinsi_id">
                            <option>provinsi</option>
                            @foreach ($provinsi as $p)
                                <option value="{{ $p->id }}"
                                    {{ $data[0]->kelurahan->kecamatan->kabupaten->provinsi->id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}</option>
                            @endforeach
                        </select>
                        @error('provinsi_id')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="kabupaten_id">kabupaten</label>
                        <select id="kabupaten_id" name="kabupaten_id">
                            <option value="{{ $data[0]->kelurahan->kecamatan->kabupaten->id }}" selected>
                                {{ $data[0]->kelurahan->kecamatan->kabupaten->nama }}</option>

                        </select>
                        @error('kabupaten_id')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="kecamatan_id">kecamatan</label>
                        <select id="kecamatan_id" name="kecamatan_id">
                            <option value="{{ $data[0]->kelurahan->kecamatan->id }}" selected>
                                {{ $data[0]->kelurahan->kecamatan->nama }}</option>

                        </select>
                        @error('kecamatan_id')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="kelurahan_id">kelurahan</label>
                        <select id="kelurahan_id" name="kelurahan_id">
                            <option value="{{ $data[0]->kelurahan->id }}" selected>
                                {{ $data[0]->kelurahan->nama }}</option>

                        </select>
                        @error('kelurahan_id')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="status">status</label>
                        <select id="status" name="status">
                            <option value="aktif" {{ $data[0]->status == 'aktif' ? 'selected' : '' }}>aktif
                            </option>
                            <option value="tidak aktif" {{ $data[0]->status == 'tidak aktif' ? 'selected' : '' }}>
                                tidak aktif</option>
                        </select>
                        @error('status')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <button type="button" data-modal-target="updateModal" data-modal-toggle="updateModal" id="updateButton"
                    class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Update</button>

                <!-- Modal Konfirmasi Update -->
                <div id="updateModal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <i class="fa fa-pencil-square-o fa-3x text-gray-500 dark:text-gray-300 mb-3"
                                aria-hidden="true"></i>
                            <p class="mb-4 text-gray-500 dark:text-gray-300">Anda yakin ingin update data kepala
                                keluarga
                                ini?
                            </p>
                            <div class="flex justify-center items-center space-x-4">
                                <a href="{{ route('mgmt.keluarga.index') }}" class="btn btn-slate">
                                    Tidak Jadi
                                </a>
                                <button type="submit" class="btn btn-danger">Yakin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot:script>
        <script>
            $('#provinsi_id').on('change', function() {
                var provinsiId = $(this).val();

                if (provinsiId) {
                    $.ajax({
                        url: '/kabupaten/' + provinsiId,
                        type: 'GET',
                        success: function(data) {
                            $('#kabupaten_id').empty();
                            $('#kabupaten_id').append('<option value="">Pilih Kabupaten</option>');
                            $.each(data, function(key, value) {
                                $('#kabupaten_id').append('<option value="' + value.id + '">' +
                                    value
                                    .nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kabupaten_id').empty();
                    $('#kabupaten_id').append('<option value="">Pilih Kabupaten</option>');
                }
            });

            $('#kabupaten_id').on('change', function() {
                var kabupatenId = $(this).val();

                if (kabupatenId) {
                    $.ajax({
                        url: '/kecamatan/' + kabupatenId,
                        type: 'GET',
                        success: function(data) {
                            $('#kecamatan_id').empty();
                            $('#kecamatan_id').append('<option value="">Pilih kecamatan</option>');
                            $.each(data, function(key, value) {
                                $('#kecamatan_id').append('<option value="' + value.id + '">' +
                                    value
                                    .nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kecamatan_id').empty();
                    $('#kecamatan_id').append('<option value="">Pilih kecamatan</option>');
                }
            });

            $('#kecamatan_id').on('change', function() {
                var kecamatanId = $(this).val();

                if (kecamatanId) {
                    $.ajax({
                        url: '/kelurahan/' + kecamatanId,
                        type: 'GET',
                        success: function(data) {
                            $('#kelurahan_id').empty();
                            $('#kelurahan_id').append('<option value="">Pilih kelurahan</option>');
                            $.each(data, function(key, value) {
                                $('#kelurahan_id').append('<option value="' + value.id + '">' +
                                    value
                                    .nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kelurahan_id').empty();
                    $('#kelurahan_id').append('<option value="">Pilih kelurahan</option>');
                }
            });
        </script>
    </x-slot:script>

</x-admin>
