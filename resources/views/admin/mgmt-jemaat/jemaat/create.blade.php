<x-admin>
    <x-slot:title>Tambah jemaat</x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.jemaat.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-undo"
                aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    <div class="card my-3">
        <div class="form-container">
            <form method="POST" action="{{ route('mgmt.jemaat.store') }}">
                @csrf
                <div class="grid gap-4 md:grid-cols-2 capitalize" id="step-1">
                    <div class="md:col-span-2 border-b pb-3">
                        <h5>pilih kepala keluarga</h5>
                    </div>
                    <div>
                        <label for="sector_id">sektor</label>
                        <select id="sector_id" name="sector_id">
                            <option selected>pilih sektor...</option>
                            @foreach ($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="keluarga_id">kepala keluarga</label>
                        <select id="keluarga_id" name="keluarga_id"></select>
                        @error('keluarga_id')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="id_keluarga">id keluarga</label>
                        <input type="text" id="id_keluarga" name="id_keluarga" placeholder="" readonly />
                    </div>
                    <div class="mb-4">
                        <label for="alamat">alamat</label>
                        <textarea type="text" id="alamat" name="alamat" placeholder="" readonly></textarea>
                    </div>
                    <div class="inline-flex md:col-span-2 ms-auto">
                        <button type="button" id="next-step" class="btn btn-primary">lanjut</button>
                    </div>
                </div>

                <div class="hidden grid gap-4 md:grid-cols-2 capitalize" id="step-2">
                    <div class="md:col-span-2 border-b pb-3">
                        <h5>isi data jemaat</h5>
                    </div>
                    <div>
                        <label for="stambuk">nomor
                            stambuk</label>
                        <input type="text" id="stambuk" name="stambuk" placeholder="" readonly />
                    </div>
                    <div class="hidden md:flex">
                        <span class="sr-only">tidak ditampilkan</span>
                    </div>
                    <div>
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="" autocomplete="off" />
                        @error('nama')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="alias">alias</label>
                        <input type="text" id="alias" name="alias" placeholder="" autocomplete="off" />
                    </div>
                    <div>
                        <label for="jeniskelamin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <select id="jeniskelamin" name="jeniskelamin">
                            <option value="">pilih jenis kelamin...</option>
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                        @error('jeniskelamin')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="tempatlahir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tempat
                            lahir</label>
                        <input type="text" id="tempatlahir" name="tempatlahir" placeholder="" autocomplete="off" />
                        @error('tempatlahir')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggallahir">tanggal lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            </div>
                            <input id="tanggallahir" name="tanggallahir" datepicker datepicker-buttons
                                datepicker-autohide datepicker-orientation="top right" datepicker-format="dd-mm-yyyy"
                                type="text" class="datepicker" placeholder="" autocomplete="off" />
                        </div>
                        @error('tanggallahir')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="hubungankeluarga">hubungan keluarga</label>
                        <select id="hubungankeluarga" name="hubungankeluarga">
                            <option value="">pilih hubungan keluarga...</option>
                            <option value="kepala keluarga">kepala keluarga</option>
                            <option value="istri">istri</option>
                            <option value="anak">anak</option>
                            <option value="ayah">ayah</option>
                            <option value="ibu">ibu</option>
                            <option value="ayah-mertua">ayah-mertua</option>
                            <option value="ibu-mertua">ibu-mertua</option>
                            <option value="saudara kandung">saudara kandung</option>
                            <option value="saudara ipar">saudara ipar</option>
                            <option value="famili lain">famili lain</option>
                            <option value="ponakan">ponakan</option>
                        </select>
                        @error('hubungankeluarga')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="namaayah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama
                            ayah</label>
                        <input type="text" id="namaayah" name="namaayah" placeholder="" autocomplete="off" />
                    </div>
                    <div>
                        <label for="namaibu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama
                            ibu</label>
                        <input type="text" id="namaibu" name="namaibu" placeholder="" autocomplete="off" />
                    </div>
                    <div>
                        <label for="pendidikan">pendidikan</label>
                        <select id="pendidikan" name="pendidikan">
                            <option value="tidak/belum sekolah">tidak/belum sekolah</option>
                            <option value="TK/PAUD">TK/PAUD</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="SARJANA">SARJANA</option>
                        </select>
                    </div>
                    <div>
                        <label for="pekerjaan">pekerjaan</label>
                        <select id="pekerjaan" name="pekerjaan">
                            <option value="tidak/belum bekerja">tidak/belum bekerja</option>
                            <option value="PELAJAR/MAHASISWA">PELAJAR/MAHASISWA</option>
                            <option value="IBU RUMAH TANGGA">IBU RUMAH TANGGA</option>
                            <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
                            <option value="PEGAWAI NEGERI">PEGAWAI NEGERI</option>
                            <option value="WIRASWASTA">WIRASWASTA</option>
                            <option value="PEJABAT">PEJABAT</option>
                            <option value="TNI">TNI</option>
                            <option value="POLRI">POLRI</option>
                        </select>
                    </div>
                    <div>
                        <label for="tanggaldaftar">tanggal daftar</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            </div>
                            <input id="tanggaldaftar" name="tanggaldaftar" datepicker datepicker-buttons
                                datepicker-autohide datepicker-orientation="top right" datepicker-format="dd-mm-yyyy"
                                type="text" class="datepicker" placeholder="" autocomplete="off" />
                        </div>
                    </div>
                    <div>
                        <label for="hp">nomor hp</label>
                        <input type="tel" id="hp" name="hp" placeholder="08123456789xx"
                            pattern="[0-9]{10,13}" autocomplete="off" />
                    </div>
                    <div class="hidden">
                        <label for="status">status</label>
                        <select id="status" name="status">
                            <option value="aktif" selected>aktif</option>
                            <option value="pindah">pindah</option>
                            <option value="meninggal">meninggal</option>
                        </select>
                    </div>
                    <div class="inline-flex md:col-span-2 ms-auto space-x-2">
                        <button type="button" id="prev-step" class="btn btn-slate">kembali</button>
                        <button type="button" id="next-step-2" class="btn btn-primary">lanjut</button>
                    </div>
                </div>

                <div class="hidden grid gap-4 md:grid-cols-2 capitalize space-y-1" id="step-3">
                    <div class="md:col-span-2 border-b pb-3">
                        <h5>isi data akta jemaat</h5>
                    </div>
                    <div class="grid md:grid-cols-2 gap-2">
                        <div id="group-statusbaptis">
                            <label for="statusbaptis">status baptis</label>
                            <select id="statusbaptis" name="statusbaptis" class="font-medium">
                                <option value="belum baptis">belum baptis</option>
                                <option value="sudah baptis">sudah baptis</option>
                            </select>
                        </div>
                        <div id="group-tanggalbaptis">
                            <label for="tanggalbaptis">tanggal baptis</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                </div>
                                <input id="tanggalbaptis" name="tanggalbaptis" datepicker datepicker-buttons
                                    datepicker-autohide datepicker-orientation="top right"
                                    datepicker-format="dd-mm-yyyy" type="text" class="datepicker" placeholder=""
                                    autocomplete="off" />
                            </div>
                            @error('tanggalbaptis')
                                <div class="alert-error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="group-gerejabaptis">
                            <label for="gerejabaptis">gereja di baptis</label>
                            <input type="text" name="gerejabaptis" id="gerejabaptis" autocomplete="off">
                        </div>
                        <div id="group-resortbaptis">
                            <label for="resortbaptis">resort di baptis</label>
                            <input type="text" name="resortbaptis" id="resortbaptis" autocomplete="off">
                        </div>
                        <div id="group-aktabaptis" class="md:col-span-2">
                            <label for="aktabaptis">akta baptis</label>
                            <input type="text" name="aktabaptis" id="aktabaptis" autocomplete="off">
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-2">
                        <div id="group-statussidi">
                            <label for="statussidi">status sidi</label>
                            <select id="statussidi" name="statussidi" class="font-medium">
                                <option value="belum sidi">belum sidi</option>
                                <option value="sudah sidi">sudah sidi</option>
                            </select>
                        </div>
                        <div id="group-tanggalsidi">
                            <label for="tanggalsidi">tanggal sidi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                </div>
                                <input id="tanggalsidi" name="tanggalsidi" datepicker datepicker-buttons
                                    datepicker-autohide datepicker-orientation="top right"
                                    datepicker-format="dd-mm-yyyy" type="text" class="datepicker" placeholder=""
                                    autocomplete="off" />
                            </div>
                            @error('tanggalsidi')
                                <div class="alert-error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="group-gerejasidi">
                            <label for="gerejasidi">gereja di sidi</label>
                            <input type="text" name="gerejasidi" id="gerejasidi" autocomplete="off">
                        </div>
                        <div id="group-resortsidi">
                            <label for="resortsidi">resort di sidi</label>
                            <input type="text" name="resortsidi" id="resortsidi" autocomplete="off">
                        </div>
                        <div id="group-aktasidi" class="md:col-span-2">
                            <label for="aktasidi">akta sidi</label>
                            <input type="text" name="aktasidi" id="aktasidi" autocomplete="off">
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-2">
                        <div id="group-statusnikah">
                            <label for="statusnikah">status nikah</label>
                            <select id="statusnikah" name="statusnikah" class="font-medium">
                                <option value="belum menikah">belum menikah</option>
                                <option value="sudah menikah">sudah menikah</option>
                                <option value="cerai hidup">cerai hidup</option>
                                <option value="cerai mati">cerai mati</option>
                            </select>
                        </div>
                        <div id="group-tanggalnikah">
                            <label for="tanggalnikah">tanggal nikah</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                </div>
                                <input id="tanggalnikah" name="tanggalnikah" datepicker datepicker-buttons
                                    datepicker-autohide datepicker-orientation="top right"
                                    datepicker-format="dd-mm-yyyy" type="text" class="datepicker" placeholder=""
                                    autocomplete="off" />
                            </div>
                            @error('tanggalnikah')
                                <div class="alert-error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="group-gerejanikah">
                            <label for="gerejanikah">gereja menikah</label>
                            <input type="text" name="gerejanikah" id="gerejanikah" autocomplete="off">
                        </div>
                        <div id="group-resortnikah">
                            <label for="resortnikah">resort menikah</label>
                            <input type="text" name="resortnikah" id="resortnikah" autocomplete="off">
                        </div>
                        <div id="group-aktanikah" class="md:col-span-2">
                            <label for="aktanikah">akta pernikahan</label>
                            <input type="text" name="aktanikah" id="aktanikah" autocomplete="off">
                        </div>
                    </div>
                    <div class="inline-flex md:col-span-2 ms-auto space-x-2">
                        <button type="button" id="prev-step-2" class="btn btn-slate">kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o mr-2"
                                aria-hidden="true"></i>Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>
