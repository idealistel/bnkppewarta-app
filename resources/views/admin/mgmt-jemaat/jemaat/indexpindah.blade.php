<x-admin>
    <x-slot:title>Jemaat Pindah</x-slot:title>

    @if (session('success'))
        <div class="alert-success" role="alert">
            <span class="font-medium">Wow!</span> {{ session('success') }}
        </div>
    @endif

    <div class="card my-3">
        <div class="mb-4 flex justify-between items-center">
            <div>
                <form method="GET" action="{{ url()->current() }}" class="inline-flex items-center space-x-2">
                    <label for="per_page" class="text-sm font-medium text-gray-700 dark:text-gray-300">tampilkan</label>
                    <select name="per_page" id="per_page" onchange="this.form.submit()"
                        class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-auto shadow-sm sm:text-sm rounded-md">
                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 hidden md:flex">per
                        halaman</span>
                </form>
            </div>
            <div class="ms-auto space-x-2">
                <a href="" class="btn btn-danger"><i class="fa fa-file-pdf-o ml-2" aria-hidden="true"></i></a>
                <a href="" class="btn btn-success"><i class="fa fa-file-excel-o ml-2" aria-hidden="true"></i></a>
            </div>
        </div>
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
                            tanggal pindah
                        </th>
                        <th scope="col">
                            tujuan pindah
                        </th>
                        <th scope="col">
                            alasan pindah
                        </th>
                        <th scope="col">
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($jemaat as $jem)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $jem->stambuk }}
                            </td>
                            <td>
                                <a href="{{ route('mgmt.keluarga.show', $jem->keluarga_id) }}">
                                    {{ $jem->keluarga_id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('mgmt.sektor.show', $jem->keluarga->sector->nama) }}">
                                    {{ $jem->keluarga->sector->nama }}
                                </a>
                            </td>
                            <td scope="row">
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
                            <td>
                                @formatTanggal($jem->statusjemaat->tanggalstatus)
                            </td>
                            <td>
                                {{ $jem->statusjemaat->status1 }}
                            </td>
                            <td>
                                {{ $jem->statusjemaat->status2 }}
                            </td>
                            <td class="inline-flex items-center text-center space-x-2">
                                <a href="{{ route('mgmt.jemaatpindah.edit', $jem->stambuk) }}"
                                    class="badge badge-edit">
                                    <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                </a>

                                <form action="{{ route('mgmt.jemaat.destroy', $jem->stambuk) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button type="button" data-modal-target="deleteModal-{{ $jem->stambuk }}"
                                        data-modal-toggle="deleteModal-{{ $jem->stambuk }}" id="deleteButton"
                                        class="badge badge-delete">
                                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                    </button>

                                    <div id="deleteModal-{{ $jem->stambuk }}" tabindex="-1" aria-hidden="true"
                                        class="confirm-modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
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
        {{ $jemaat->appends(['per_page' => $perPage])->links() }}
    </div>

</x-admin>
