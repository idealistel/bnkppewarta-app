<x-admin>
    <x-slot:title>Tambah Keluarga</x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.keluarga.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-undo"
                aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    <div class="card my-3">
        <div class="form-container">
            <form class="w-full p-4" method="POST" action="{{ route('mgmt.keluarga.store') }}">
                @csrf
                <div class="grid md:grid-cols-2 md:grid-flow-row gap-2 mb-3">
                    <div>
                        <label for="keluarga_id">No
                            Kepala Keluarga</label>
                        <input type="text" name="keluarga_id" id="keluarga_id" placeholder=" " autocomplete="off"
                            readonly value="{{ $newId }}" />
                    </div>
                    <div>
                        <label for="sector_id">Nama
                            Sektor</label>
                        <select id="sector_id" name="sector_id">
                            <option value="">pilih sektor</option>
                            @foreach ($sector as $skt)
                                <option value="{{ $skt->id }}"
                                    {{ old('sector_id') == $skt->id ? 'selected' : '' }}>
                                    {{ $skt->nama }}
                                </option>
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
                            value="{{ old('nama') }}" />
                        @error('nama')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="alias">alias</label>
                        <input type="text" name="alias" id="alias" placeholder=" " autocomplete="off"
                            value="{{ old('alias') }}" />
                        @error('alias')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="alamat">alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder=" " autocomplete="off"
                            value="{{ old('alamat') }}" />
                        @error('alamat')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="provinsi_id">provinsi</label>
                        <select id="provinsi_id" name="provinsi_id">
                            <option value="">pilih provinsi</option>
                            @foreach ($provinsi as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
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

                        </select>
                        @error('kelurahan_id')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="hidden">
                        <label for="status">status</label>
                        <select id="status" name="status">
                            <option value="aktif" selected>aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>
                        @error('status')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i>Simpan</button>
            </form>
        </div>
    </div>

    <x-slot:script>
        <script>
            $("#provinsi_id").on("change", function() {
                var provinsiId = $(this).val();

                if (provinsiId) {
                    $.ajax({
                        url: "/kabupaten/" + provinsiId,
                        type: "GET",
                        success: function(data) {
                            $("#kabupaten_id").empty();
                            $("#kabupaten_id").append(
                                '<option value="">Pilih Kabupaten</option>'
                            );
                            $.each(data, function(key, value) {
                                $("#kabupaten_id").append(
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.nama +
                                    "</option>"
                                );
                            });
                        },
                    });
                } else {
                    $("#kabupaten_id").empty();
                    $("#kabupaten_id").append('<option value="">Pilih Kabupaten</option>');
                }
            });

            $("#kabupaten_id").on("change", function() {
                var kabupatenId = $(this).val();

                if (kabupatenId) {
                    $.ajax({
                        url: "/kecamatan/" + kabupatenId,
                        type: "GET",
                        success: function(data) {
                            $("#kecamatan_id").empty();
                            $("#kecamatan_id").append(
                                '<option value="">Pilih kecamatan</option>'
                            );
                            $.each(data, function(key, value) {
                                $("#kecamatan_id").append(
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.nama +
                                    "</option>"
                                );
                            });
                        },
                    });
                } else {
                    $("#kecamatan_id").empty();
                    $("#kecamatan_id").append('<option value="">Pilih kecamatan</option>');
                }
            });

            $("#kecamatan_id").on("change", function() {
                var kecamatanId = $(this).val();

                if (kecamatanId) {
                    $.ajax({
                        url: "/kelurahan/" + kecamatanId,
                        type: "GET",
                        success: function(data) {
                            $("#kelurahan_id").empty();
                            $("#kelurahan_id").append(
                                '<option value="">Pilih kelurahan</option>'
                            );
                            $.each(data, function(key, value) {
                                $("#kelurahan_id").append(
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.nama +
                                    "</option>"
                                );
                            });
                        },
                    });
                } else {
                    $("#kelurahan_id").empty();
                    $("#kelurahan_id").append('<option value="">Pilih kelurahan</option>');
                }
            });
        </script>
    </x-slot:script>

</x-admin>
