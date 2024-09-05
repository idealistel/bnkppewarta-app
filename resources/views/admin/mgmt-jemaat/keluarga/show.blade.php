<x-admin>
    <x-slot:title>Keluarga {{ $data[0]->nama }}</x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.keluarga.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-undo"
                aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    @if (session('success'))
        <div class="alert-success" role="alert">
            <span class="font-medium">Wow!</span> {{ session('success') }}
        </div>
    @endif

    <div class="card mt-3 p-3 w-fit capitalize">
        <div class="grid md:grid-rows-4 md:grid-flow-col gap-2">
            <div class="inline-flex w-full space-x-2">
                <span class="w-1/4">Kepala Keluarga</span>
                <span>:</span>
                <span class="font-medium">{{ $data[0]->nama }}</span>
            </div>
            <div class="inline-flex w-full space-x-2">
                <span class="w-1/4">alias</span>
                <span>:</span>
                <span class="font-medium">{{ $data[0]->alias ? $data[0]->alias : '-' }}</span>
            </div>
            <div class="inline-flex w-full space-x-2">
                <span class="w-1/4">sektor</span>
                <span>:</span>
                <span class="font-medium"><a
                        href="{{ route('mgmt.sektor.show', $data[0]->sector->nama) }}">{{ $data[0]->sector->nama }}</a></span>
            </div>
            <div class="inline-flex w-full space-x-2">
                <span class="w-1/4">alamat</span>
                <span>:</span>
                <span class="font-medium">{{ $data[0]->alamat }}</span>
            </div>
            <div class="inline-flex w-full space-x-2">
                <span class="w-1/4">kelurahan</span>
                <span>:</span>
                <span class="font-medium">kel. {{ $data[0]->kelurahan->nama }}</span>
            </div>
            <div class="inline-flex w-full space-x-2">
                <span class="w-1/4">kecamatan</span>
                <span>:</span>
                <span class="font-medium">kec.
                    {{ $data[0]->kelurahan->kecamatan->nama }}</span>
            </div>
            <div class="inline-flex w-full space-x-2">
                <span class="w-1/4">kabupaten</span>
                <span>:</span>
                <span class="font-medium">{{ $data[0]->kelurahan->kecamatan->kabupaten->nama }}</span>
            </div>
            <div class="inline-flex w-full space-x-2">
                <span class="w-1/4">provinsi</span>
                <span>:</span>
                <span class="font-medium">prop.
                    {{ $data[0]->kelurahan->kecamatan->kabupaten->provinsi->nama }}</span>
            </div>
        </div>
    </div>

    <div class="card my-3">
        <header class="pb-2">
            <div>
                daftar anggota keluarga
            </div>
        </header>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            stambuk
                        </th>
                        <th scope="col">
                            id keluarga
                        </th>
                        <th scope="col">
                            sektor
                        </th>
                        <th scope="col">
                            Nama
                        </th>
                        <th scope="col">
                            Alias
                        </th>
                        <th scope="col">
                            Jns. Kelamin
                        </th>
                        <th scope="col">
                            Tmp. Lahir
                        </th>
                        <th scope="col">
                            Tgl. Lahir
                        </th>
                        <th scope="col">
                            Usia
                        </th>
                        <th scope="col">
                            Gol. Usia
                        </th>
                        <th scope="col">
                            Hub. Keluarga
                        </th>
                        <th scope="col">
                            status baptis
                        </th>
                        <th scope="col">
                            tgl. baptis
                        </th>
                        <th scope="col">
                            status sidi
                        </th>
                        <th scope="col">
                            tgl. sidi
                        </th>
                        <th scope="col">
                            status nikah
                        </th>
                        <th scope="col">
                            tgl. nikah
                        </th>
                        <th scope="col">
                            nama ayah
                        </th>
                        <th scope="col">
                            nama ibu
                        </th>
                        <th scope="col">
                            pendidikan
                        </th>
                        <th scope="col">
                            pekerjaan
                        </th>
                        <th scope="col">
                            tgl. daftar
                        </th>
                        <th scope="col">
                            no. hp
                        </th>
                        <th scope="col">
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($data[0]->jemaat as $jem)
                        <tr>
                            <td class="font-bold text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center">
                                {{ $jem->stambuk }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('mgmt.keluarga.show', $jem->keluarga_id) }}">
                                    {{ $jem->keluarga_id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('mgmt.sektor.show', $jem->keluarga->sector->nama) }}">
                                    {{ $jem->keluarga->sector->nama }}
                                </a>
                            </td>
                            <td class="font-medium whitespace-nowrap dark:text-white capitalize">
                                <a href="">
                                    {{ $jem->nama }}
                                </a>
                            </td>
                            <td>
                                {{ $jem->alias }}
                            </td>
                            <td>
                                {{ $jem->jeniskelamin }}
                            </td>
                            <td>
                                {{ $jem->tempatlahir }}
                            </td>
                            <td>
                                @formatTanggal($jem->tanggallahir)
                            </td>
                            <td>
                                {{ $jem->usia }} tahun
                            </td>
                            <td>
                                {{ $jem->golonganusia }}
                            </td>
                            <td>
                                {{ $jem->hubungankeluarga }}
                            </td>
                            <td>
                                {{ $jem->statusbaptis }}
                            </td>
                            <td>
                                @formatTanggal($jem->tanggalbaptis)
                            </td>
                            <td>
                                {{ $jem->statussidi }}
                            </td>
                            <td>
                                @formatTanggal($jem->tanggalsidi)
                            </td>
                            <td>
                                {{ $jem->statusnikah }}
                            </td>
                            <td>
                                @formatTanggal($jem->tanggalnikah)
                            </td>
                            <td>
                                {{ $jem->namaayah }}
                            </td>
                            <td>
                                {{ $jem->namaibu }}
                            </td>
                            <td>
                                {{ $jem->pendidikan }}
                            </td>
                            <td>
                                {{ $jem->pekerjaan }}
                            </td>
                            <td>
                                @formatTanggal($jem->tanggaldaftar)
                            </td>
                            <td>
                                {{ $jem->hp }}
                            </td>
                            <td class="inline-flex text-center items-center space-x-2">
                                <a href="" class="badge badge-edit">
                                    <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                </a>

                                <form action="" method="post">
                                    @csrf
                                    @method('delete')

                                    <button type="button" data-modal-target="deleteModal-{{ $jem->stambuk }}"
                                        data-modal-toggle="deleteModal-{{ $jem->stambuk }}" id="deleteButton"
                                        class="badge badge-delete">
                                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                    </button>

                                    <div id="deleteModal-{{ $jem->stambuk }}" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <!-- Modal content -->
                                            <div
                                                class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                <i class="fa fa-trash-o fa-3x text-gray-500 dark:text-gray-300 mb-3"
                                                    aria-hidden="true"></i>
                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Anda yakin ingin
                                                    menghapus
                                                    sektor
                                                    <span
                                                        class="font-medium text-black dark:text-white capitalize">{{ $jem->nama }}</span>?
                                                </p>
                                                <div class="flex justify-center items-center space-x-4">
                                                    <button data-modal-toggle="deleteModal-{{ $jem->stambuk }}"
                                                        type="button" class="btn btn-slate">
                                                        Tidak Jadi
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">Yakin</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-admin>
