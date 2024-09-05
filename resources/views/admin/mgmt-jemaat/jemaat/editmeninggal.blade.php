<x-admin>
    <x-slot:title>edit jemaat meninggal</x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.jemaatmeninggal.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-undo my-auto"
                aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    <div class="card my-3">
        <div class="form-container">
            <form method="POST" action="{{ route('mgmt.jemaatmeninggal.update', $data[0]->stambuk) }}">
                @csrf
                @method('put')
                <div class="grid gap-4 md:grid-cols-2 capitalize" id="step-1">
                    <div class="md:col-span-2 border-b pb-3">
                        <h5>pilih kepala keluarga</h5>
                    </div>
                    <div>
                        <label for="sector_id">sektor</label>
                        <select id="sector_id" name="sector_id">
                            <option>pilih sektor ...</option>
                            @foreach ($sectors as $sector)
                                <option value="{{ $sector->id }}"
                                    {{ $data[0]->keluarga->sector_id == $sector->id ? 'selected' : '' }}>
                                    {{ $sector->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="keluarga_id">keluarga</label>
                        <select id="keluarga_id" name="keluarga_id"></select>
                        @error('keluarga_id')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="id_keluarga">id keluarga</label>
                        <input type="text" id="id_keluarga" name="id_keluarga" placeholder="" readonly
                            value="{{ $data[0]->keluarga_id }}" />
                    </div>
                    <div class="mb-4">
                        <label for="alamat">alamat</label>
                        <textarea type="text" id="alamat" name="alamat" placeholder="" readonly>{{ $data[0]->keluarga->alamat }}, kel. {{ $data[0]->keluarga->kelurahan->nama }}, kec. {{ $data[0]->keluarga->kelurahan->kecamatan->nama }}, {{ $data[0]->keluarga->kelurahan->kecamatan->kabupaten->nama }}, prop. {{ $data[0]->keluarga->kelurahan->kecamatan->kabupaten->provinsi->nama }}</textarea>
                    </div>
                    <div class="inline-flex md:col-span-2 ms-auto">
                        <button type="button" id="next-step" class="btn btn-primary">lanjut</button>
                    </div>
                </div>

                <div class="hidden grid gap-4 md:grid-cols-2 capitalize" id="step-2">
                    <div class="md:col-span-2 border-b pb-3">
                        <h5>edit data jemaat</h5>
                    </div>
                    <div class="mb-4">
                        <label for="stambuk">nomor
                            stambuk</label>
                        <input type="text" id="stambuk" name="stambuk" placeholder="" readonly
                            value="{{ $data[0]->stambuk }}" />
                    </div>
                    <div class="md:flex hidden">
                        <span class="sr-only">tidak ditampilkan</span>
                    </div>
                    <div>
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="" value="{{ $data[0]->nama }}"
                            autocomplete="off" />
                        @error('nama')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="alias">alias</label>
                        <input type="text" id="alias" name="alias" placeholder=""
                            value="{{ $data[0]->alias }}" autocomplete="off" />
                    </div>
                    <div>
                        <label for="jeniskelamin">Jenis
                            Kelamin</label>
                        <select id="jeniskelamin" name="jeniskelamin">
                            <option value="">pilih jenis kelamin...</option>
                            <option value="laki-laki" {{ $data[0]->jeniskelamin == 'laki-laki' ? 'selected' : '' }}>
                                laki-laki</option>
                            <option value="perempuan" {{ $data[0]->jeniskelamin == 'perempuan' ? 'selected' : '' }}>
                                perempuan</option>
                        </select>
                        @error('jeniskelamin')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="tempatlahir">tempat
                            lahir</label>
                        <input type="text" id="tempatlahir" name="tempatlahir" placeholder=""
                            value="{{ $data[0]->tempatlahir }}" autocomplete="off" />
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
                                type="text" class="datepicker" placeholder="" value="@formatTanggal($data[0]->tanggallahir)"
                                autocomplete="off" />
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
                            <option value="kepala keluarga"
                                {{ $data[0]->hubungankeluarga == 'kepala keluarga' ? 'selected' : '' }}>kepala keluarga
                            </option>
                            <option value="istri" {{ $data[0]->hubungankeluarga == 'istri' ? 'selected' : '' }}>istri
                            </option>
                            <option value="anak" {{ $data[0]->hubungankeluarga == 'anak' ? 'selected' : '' }}>anak
                            </option>
                            <option value="ayah" {{ $data[0]->hubungankeluarga == 'ayah' ? 'selected' : '' }}>ayah
                            </option>
                            <option value="ibu" {{ $data[0]->hubungankeluarga == 'ibu' ? 'selected' : '' }}>ibu
                            </option>
                            <option value="ayah mertua"
                                {{ $data[0]->hubungankeluarga == 'ayah mertua' ? 'selected' : '' }}>ayah mertua
                            </option>
                            <option value="ibu mertua"
                                {{ $data[0]->hubungankeluarga == 'ibu mertua' ? 'selected' : '' }}>
                                ibu mertua</option>
                            <option value="saudara kandung"
                                {{ $data[0]->hubungankeluarga == 'saudara kandung' ? 'selected' : '' }}>saudara kandung
                            </option>
                            <option value="saudara ipar"
                                {{ $data[0]->hubungankeluarga == 'saudara ipar' ? 'selected' : '' }}>saudara ipar
                            </option>
                            <option value="famili lain"
                                {{ $data[0]->hubungankeluarga == 'famili lain' ? 'selected' : '' }}>famili lain
                            </option>
                            <option value="ponakan" {{ $data[0]->hubungankeluarga == 'ponakan' ? 'selected' : '' }}>
                                ponakan</option>
                        </select>
                        @error('hubungankeluarga')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="namaayah">nama
                            ayah</label>
                        <input type="text" id="namaayah" name="namaayah" placeholder=""
                            value="{{ $data[0]->namaayah }}" autocomplete="off" />
                    </div>
                    <div>
                        <label for="namaibu">nama
                            ibu</label>
                        <input type="text" id="namaibu" name="namaibu" placeholder=""
                            value="{{ $data[0]->namaibu }}" autocomplete="off" />
                    </div>
                    <div>
                        <label for="pendidikan">pendidikan</label>
                        <select id="pendidikan" name="pendidikan">
                            <option value="tidak/belum sekolah"
                                {{ $data[0]->pendidikan == 'tidak/belum sekolah' ? 'selected' : '' }}>tidak/belum
                                sekolah
                            </option>
                            <option value="TK/PAUD" {{ $data[0]->pendidikan == 'TK/PAUD' ? 'selected' : '' }}>SD
                            </option>
                            <option value="SD" {{ $data[0]->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                            <option value="SMP" {{ $data[0]->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                            <option value="SMA" {{ $data[0]->pendidikan == 'SMA' ? 'selected' : '' }}>SMA</option>
                            <option value="SARJANA" {{ $data[0]->pendidikan == 'SARJANA' ? 'selected' : '' }}>SARJANA
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="pekerjaan">pekerjaan</label>
                        <select id="pekerjaan" name="pekerjaan">
                            <option value="tidak/belum bekerja"
                                {{ $data[0]->pekerjaan == 'tidak/belum bekerja' ? 'selected' : '' }}>tidak/belum
                                bekerja
                            </option>
                            <option value="PELAJAR/MAHASISWA"
                                {{ $data[0]->pekerjaan == 'PELAJAR/MAHASISWA' ? 'selected' : '' }}>PELAJAR/MAHASISWA
                            </option>
                            <option value="IBU RUMAH TANGGA"
                                {{ $data[0]->pekerjaan == 'IBU RUMAH TANGGA' ? 'selected' : '' }}>IBU RUMAH TANGGA
                            </option>
                            <option value="KARYAWAN SWASTA"
                                {{ $data[0]->pekerjaan == 'KARYAWAN SWASTA' ? 'selected' : '' }}>KARYAWAN SWASTA
                            </option>
                            <option value="PEGAWAI NEGERI"
                                {{ $data[0]->pekerjaan == 'PEGAWAI NEGERI' ? 'selected' : '' }}>PEGAWAI NEGERI</option>
                            <option value="WIRASWASTA" {{ $data[0]->pekerjaan == 'WIRASWASTA' ? 'selected' : '' }}>
                                WIRASWASTA</option>
                            <option value="PEJABAT" {{ $data[0]->pekerjaan == 'PEJABAT' ? 'selected' : '' }}>PEJABAT
                            </option>
                            <option value="TNI" {{ $data[0]->pekerjaan == 'TNI' ? 'selected' : '' }}>TNI</option>
                            <option value="POLRI" {{ $data[0]->pekerjaan == 'POLRI' ? 'selected' : '' }}>POLRI
                            </option>
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
                                type="text" class="datepicker" placeholder=""
                                value="{{ $data[0]->tanggaldaftar !== null ? \Carbon\Carbon::parse($data[0]->tanggaldaftar)->format('d-m-Y') : '' }}"
                                autocomplete="off" />
                        </div>
                    </div>
                    <div>
                        <label for="hp">nomor
                            hp</label>
                        <input type="tel" id="hp" name="hp" placeholder="123-45-678"
                            pattern="[0-9]{10,13}" value="{{ $data[0]->hp }}" />
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
                                <option value="belum baptis"
                                    {{ $data[0]->statusbaptis == 'belum baptis' ? 'selected' : '' }}>
                                    belum baptis</option>
                                <option value="sudah baptis"
                                    {{ $data[0]->statusbaptis == 'sudah baptis' ? 'selected' : '' }}>
                                    sudah baptis</option>
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
                                    autocomplete="off" value="@formatTanggal($data[0]->tanggalbaptis)" />
                            </div>
                            @error('tanggalbaptis')
                                <div class="alert-error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="group-gerejabaptis">
                            <label for="gerejabaptis">gereja di baptis</label>
                            <input type="text" name="gerejabaptis" id="gerejabaptis" autocomplete="off"
                                value="{{ $data[0]->gerejabaptis ?? '' }}">
                        </div>
                        <div id="group-resortbaptis">
                            <label for="resortbaptis">resort di baptis</label>
                            <input type="text" name="resortbaptis" id="resortbaptis" autocomplete="off"
                                value="{{ $data[0]->resortbaptis ?? '' }}">
                        </div>
                        <div id="group-aktabaptis" class="md:col-span-2">
                            <label for="aktabaptis">akta baptis</label>
                            <input type="text" name="aktabaptis" id="aktabaptis" autocomplete="off"
                                value="{{ $data[0]->aktabaptis ?? '' }}">
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-2">
                        <div id="group-statussidi">
                            <label for="statussidi">status sidi</label>
                            <select id="statussidi" name="statussidi" class="font-medium">
                                <option value="belum sidi"
                                    {{ $data[0]->statussidi == 'belum sidi' ? 'selected' : '' }}>
                                    belum
                                    sidi</option>
                                <option value="sudah sidi"
                                    {{ $data[0]->statussidi == 'sudah sidi' ? 'selected' : '' }}>
                                    sudah
                                    sidi</option>
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
                                    autocomplete="off" value="@formatTanggal($data[0]->tanggalsidi)" />
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
                                <option value="belum menikah"
                                    {{ $data[0]->statusnikah == 'belum menikah' ? 'selected' : '' }}>belum menikah
                                </option>
                                <option value="sudah menikah"
                                    {{ $data[0]->statusnikah == 'sudah menikah' ? 'selected' : '' }}>sudah menikah
                                </option>
                                <option value="cerai hidup"
                                    {{ $data[0]->statusnikah == 'cerai hidup' ? 'selected' : '' }}>
                                    cerai hidup</option>
                                <option value="cerai mati"
                                    {{ $data[0]->statusnikah == 'cerai mati' ? 'selected' : '' }}>
                                    cerai
                                    mati</option>
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
                        <button type="button" id="next-step-3" class="btn btn-primary">lanjut</button>
                    </div>
                </div>

                <div class="hidden grid gap-4 mb-4 md:grid-cols-2 capitalize" id="step-4">
                    <div class="md:col-span-2 border-b pb-3">
                        <h5>status jemaat</h5>
                    </div>
                    <div class="">
                        <label for="status">status</label>
                        <select id="status" name="status">
                            <option value="aktif" {{ $data[0]->status == 'aktif' ? 'selected' : '' }}>aktif</option>
                            <option value="pindah" {{ $data[0]->status == 'pindah' ? 'selected' : '' }}>pindah
                            </option>
                            <option value="meninggal" {{ $data[0]->status == 'meninggal' ? 'selected' : '' }}>
                                meninggal
                            </option>
                        </select>
                    </div>
                    <div id="data-status">
                        <div>
                            <label for="tanggalstatus" id="tanggalstatus">tanggal status</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                </div>
                                <input id="tanggalstatus" name="tanggalstatus" datepicker datepicker-buttons
                                    datepicker-autohide datepicker-orientation="top right"
                                    datepicker-format="dd-mm-yyyy" type="text" class="datepicker" placeholder=""
                                    value="{{ $data[0]->statusjemaat->tanggalstatus ?? '' }}" autocomplete="off" />
                            </div>
                        </div>
                        <div>
                            <label for="status1" id="status1">status1</label>
                            <input type="text" id="status1" name="status1" placeholder=""
                                value="{{ $data[0]->statusjemaat->status1 ?? '' }}" autocomplete="off" />
                        </div>
                        <div>
                            <label for="status2" id="status2">status2</label>
                            <input type="text" id="status2" name="status2" placeholder=""
                                value="{{ $data[0]->statusjemaat->status2 ?? '' }}" autocomplete="off" />
                        </div>
                    </div>
                    <div class="inline-flex md:col-span-2 ms-auto space-x-2">
                        <button type="button" id="prev-step-3" class="btn btn-slate">kembali</button>
                        <button type="button" class="btn btn-primary" data-modal-target="updateModal"
                            data-modal-toggle="updateModal" id="updateButton"><i class="fa fa-pencil-square-o"
                                aria-hidden="true"></i>update</button>
                    </div>
                </div>

                <!-- Modal Konfirmasi Update -->
                <div id="updateModal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <i class="fa fa-pencil-square-o fa-3x text-gray-500 dark:text-gray-300 mb-3"
                                aria-hidden="true"></i>
                            <p class="mb-4 text-gray-500 dark:text-gray-300">Anda yakin ingin update data
                                jemaat
                                ini?
                            </p>
                            <div class="flex justify-center items-center space-x-4">
                                <a href="{{ route('mgmt.jemaat.index') }}" class="btn btn-slate">
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
</x-admin>
