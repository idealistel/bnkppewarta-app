<x-admin>
    <x-slot:title>Edit Pengurus Sektor {{ $data[0]->sector->nama }}</x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.sektor.show', $data[0]->sector->nama) }}"
            class="ms-auto my-auto inline-flex items-end text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800"><i
                class="fa fa-undo my-auto mr-2" aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 card">
        <form class="max-w-md p-4" method="POST" action="{{ route('mgmt.sektor.bph.update', $data[0]->id) }}">
            @csrf
            @method('put')
            <input type="hidden" name="sector_id" value="{{ $data[0]->sector->id }}">
            <input type="hidden" name="sector_name" value="{{ $data[0]->sector->nama }}">
            <div class="flex items-center mb-5 w-full">
                <div class="relative z-0 group">
                    <input id="prdawal" name="prdawal" type="text" class="float-input peer" placeholder=" "
                        autocomplete="off" datepicker datepicker-buttons datepicker-format="dd-mm-yyyy"
                        datepicker-autohide value="@formatTanggal($data[0]->prdawal)">
                    <label for="prdawal" class="float-input-label">Periode Awal</label>
                    @error('prdawal')
                        <div class="p-2 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <span class="mx-4 text-gray-500">ke</span>
                <div class="relative z-0 group">
                    <input id="prdakhir" name="prdakhir" type="text" class="float-input peer " placeholder=" "
                        autocomplete="off" datepicker datepicker-buttons datepicker-format="dd-mm-yyyy"
                        datepicker-autohide value="@formatTanggal($data[0]->prdakhir)">
                    <label for="prdakhir" class="float-input-label">Periode Akhir</label>
                    @error('prdakhir')
                        <div class="p-2 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="koordinator" id="koordinator" class="float-input peer capitalize"
                    placeholder=" " autocomplete="off" value="{{ $data[0]->koordinator }}" />
                <label for="koordinator" class="float-input-label">Koordinator
                    Sektor</label>
                @error('koordinator')
                    <div class="p-2 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="sekretaris" id="sekretaris" class="float-input peer capitalize"
                    placeholder=" " autocomplete="off" value="{{ $data[0]->sekretaris }}" />
                <label for="sekretaris" class="float-input-label">Sekretaris
                    Sektor</label>
                @error('sekretaris')
                    <div class="p-2 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="bendahara" id="bendahara" class="float-input peer capitalize"
                    placeholder=" " autocomplete="off" value="{{ $data[0]->bendahara }}" />
                <label for="bendahara" class="float-input-label">Bendahara
                    Sektor</label>
                @error('bendahara')
                    <div class="p-2 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="button" data-modal-target="updateModal" data-modal-toggle="updateModal" id="updateButton"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                    class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Update</button>

            <!-- Modal Konfirmasi Update -->
            <div id="updateModal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <i class="fa fa-pencil-square-o fa-3x text-gray-500 dark:text-gray-300 mb-3"
                            aria-hidden="true"></i>
                        <p class="mb-4 text-gray-500 dark:text-gray-300">Anda yakin ingin update pengurus sektor ini?
                        </p>
                        <div class="flex justify-center items-center space-x-4">
                            <a href="{{ route('mgmt.sektor.show', $data[0]->sector->nama) }}"
                                class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Tidak Jadi
                            </a>
                            <button type="submit"
                                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yakin</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin>
