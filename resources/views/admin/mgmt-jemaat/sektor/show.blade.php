<x-admin>
    <x-slot:title>
        sektor {{ $sector[0]->nama }}
    </x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.sektor.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-undo my-auto"
                aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="p-4 my-2 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Wow!</span> {{ session('success') }}
        </div>
    @endif

    <input type="hidden" value="{{ $sector[0]->id }}">

    <div class="card my-3">
        <header class="pb-2 capitalize">
            <div>pengurus saat ini</div>
        </header>
        <section class="capitalize">
            @if ($sector[0]->saat_ini->count())
                <div class="space-y-1">
                    <div class="inline-flex md:w-1/2 w-full space-x-2">
                        <span class="w-1/4">periode</span>
                        <span>:</span>
                        <span class="font-medium">
                            @foreach ($sector[0]->saat_ini as $saat_ini)
                                @formatTanggal($saat_ini->prdawal) sd @formatTanggal($saat_ini->prdakhir)
                            @endforeach
                        </span>
                    </div>
                    <div class="inline-flex md:w-1/2 w-full space-x-2">
                        <span class="w-1/4">koordinator</span>
                        <span>:</span>
                        <span class="font-medium">
                            @foreach ($sector[0]->saat_ini as $saat_ini)
                                {{ $saat_ini->koordinator }}
                            @endforeach
                        </span>
                    </div>
                    <div class="inline-flex md:w-1/2 w-full space-x-2">
                        <span class="w-1/4">sekretaris</span>
                        <span>:</span>
                        <span class="font-medium">
                            @foreach ($sector[0]->saat_ini as $saat_ini)
                                {{ $saat_ini->sekretaris }}
                            @endforeach
                        </span>
                    </div>
                    <div class="inline-flex md:w-1/2 w-full space-x-2">
                        <span class="w-1/4">bendahara</span>
                        <span>:</span>
                        <span class="font-medium">
                            @foreach ($sector[0]->saat_ini as $saat_ini)
                                {{ $saat_ini->bendahara }}
                            @endforeach
                        </span>
                    </div>
                </div>
            @else
                Belum ditambahkan atau masa jabatan sudah berakhir..
            @endif
        </section>
    </div>
    <div class="card my-3">
        <header class="pb-2">
            <div>Daftar Pengurus</div>
            <a href="{{ route('mgmt.sektor.bph.create', $sector[0]->nama) }}" class="btn btn-primary ms-auto">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                Tambah
            </a>
        </header>
        <section>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">
                                No.
                            </th>
                            <th scope="col">
                                Periode
                            </th>
                            <th scope="col">
                                Koordinator
                            </th>
                            <th scope="col">
                                Sekretaris
                            </th>
                            <th scope="col">
                                Bendahara
                            </th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @foreach ($sector[0]->pengurussektor as $bph)
                            <tr>
                                <td class="text-center font-medium">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="font-medium whitespace-nowrap dark:text-white">
                                    @formatTanggal($bph->prdawal) s/d @formatTanggal($bph->prdakhir)
                                </td>
                                <td>
                                    {{ $bph->koordinator }}
                                </td>
                                <td>
                                    {{ $bph->sekretaris }}
                                </td>
                                <td>
                                    {{ $bph->bendahara }}
                                </td>
                                <td class="inline-flex items-center text-center space-x-2">
                                    <a href="{{ route('mgmt.sektor.bph.edit', ['sector' => $sector[0]->nama, 'id' => $bph->id]) }}"
                                        class="badge badge-edit">
                                        <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                    </a>

                                    <form action="{{ route('mgmt.sektor.bph.destroy', $bph->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <!-- Tombol Delete -->
                                        <button type="button" data-modal-target="deleteModal"
                                            data-modal-toggle="deleteModal" id="deleteButton"
                                            class="badge badge-delete">
                                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                        </button>

                                        <!-- Modal Konfirmasi Delete -->
                                        <div id="deleteModal" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                <!-- Modal content -->
                                                <div
                                                    class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 text-wrap">
                                                    <i class="fa fa-trash-o fa-3x text-gray-500 dark:text-gray-300 mb-3"
                                                        aria-hidden="true"></i>
                                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Anda yakin
                                                        ingin
                                                        menghapus Pengurus sektor <span
                                                            class="font-medium text-black">{{ $sector[0]->nama }}</span>
                                                        periode
                                                        <span class="font-medium text-black dark:text-white capitalize">
                                                            @formatTanggal($bph->prdawal) s/d @formatTanggal($bph->prdakhir)
                                                        </span> ini?
                                                    </p>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteModal" type="button"
                                                            class="btn btn-slate">
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

        </section>
    </div>
</x-admin>
