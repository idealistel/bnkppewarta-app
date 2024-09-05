<x-admin>
    <x-slot:title>Tambah Pengurus Sektor {{ $sector->nama }}</x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.sektor.show', $sector->nama) }}"
            class="ms-auto my-auto inline-flex items-end text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800"><i
                class="fa fa-undo my-auto mr-2" aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 card">
        <form class="max-w-md p-4" method="POST" action="{{ route('mgmt.sektor.bph.store') }}">
            @csrf
            <input type="hidden" name="sector_id" value="{{ $sector->id }}">
            <input type="hidden" name="sector_name" value="{{ $sector->nama }}">
            <div class="flex items-center mb-5 w-full">
                <div class="relative z-0 group">
                    <input id="prdawal" name="prdawal" type="text" class="float-input peer" placeholder=" "
                        autocomplete="off" datepicker datepicker-buttons datepicker-format="dd-mm-yyyy"
                        datepicker-autohide value="{{ old('prdawal') }}">
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
                        datepicker-autohide value="{{ old('prdakhir') }}">
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
                    placeholder=" " autocomplete="off" value="{{ old('koordinator') }}" />
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
                    placeholder=" " autocomplete="off" value="{{ old('sekretaris') }}" />
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
                    placeholder=" " autocomplete="off" value="{{ old('bendahara') }}" />
                <label for="bendahara" class="float-input-label">Bendahara
                    Sektor</label>
                @error('bendahara')
                    <div class="p-2 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                    class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Simpan</button>
        </form>
    </div>


</x-admin>
