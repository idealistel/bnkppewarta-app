<x-admin>
    <x-slot:title>pendeta</x-slot:title>

    <x-slot:button>
        <a href="{{ route('majelis.pendeta.create') }}" class="btn btn-primary ms-auto"><i class="fa fa-plus-circle"
                aria-hidden="true"></i>Tambah</a>
    </x-slot:button>

    @if (session('success'))
        <div class="alert-success" role="alert">
            {!! session('success') !!}
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
                        <th scope="col" class="max-w-7">
                            #
                        </th>
                        <th scope="col" class="text-start">
                            Nama Pendeta
                        </th>
                        <th scope="col" class="text-start">
                            Jabatan
                        </th>
                        <th scope="col" class="text-start">
                            periode
                        </th>
                        <th scope="col">
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @forelse ($pendeta as $pdt)
                        <tr>
                            <td class="text-center font-semibold">
                                {{ $loop->iteration }}
                            </td>
                            <td scope="row" class="font-medium text-gray-900 dark:text-white">
                                <a href="">
                                    Pdt. {{ $pdt->nama }}
                                </a>
                            </td>
                            <td>
                                {{ $pdt->jabatan }}
                            </td>
                            <td>
                                <span class="font-medium">@formatTanggal($pdt->prdawal)</span> sd <span
                                    class="font-medium">@formatTanggal($pdt->prdakhir)</span>
                            </td>
                            <td class="inline-flex items-center space-x-2">
                                <a href="{{ route('majelis.pendeta.edit', $pdt->id) }}" class="badge badge-edit">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>

                                <form action="{{ route('majelis.pendeta.destroy', $pdt->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    {{-- Tombol Delete --}}
                                    <button type="button" data-modal-target="deleteModal-{{ $pdt->id }}"
                                        data-modal-toggle="deleteModal-{{ $pdt->id }}" id="deleteButton"
                                        class="badge badge-delete">
                                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                    </button>

                                    {{-- Modal Konfirmasi Delete --}}
                                    <div id="deleteModal-{{ $pdt->id }}" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <!-- Modal content -->
                                            <div
                                                class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                <i class="fa fa-trash-o fa-3x text-gray-500 dark:text-gray-300 mb-3"
                                                    aria-hidden="true"></i>
                                                <p class="mb-4 text-gray-500 dark:text-gray-300 text-wrap">Anda yakin
                                                    ingin
                                                    menghapus
                                                    data pendeta
                                                    <span
                                                        class="font-medium text-black dark:text-white capitalize">{{ $pdt->nama }}</span>
                                                    ini?
                                                </p>
                                                <div class="flex justify-center items-center space-x-4">
                                                    <button data-modal-toggle="deleteModal-{{ $pdt->id }}"
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
                    @empty
                        <tr>
                            <td colspan="5">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pendeta->appends(['per_page' => $perPage])->links() }}
    </div>

</x-admin>
