<x-admin>
    <x-slot:title>Tambah pendeta</x-slot:title>

    <x-slot:button>
        <a href="{{ route('majelis.pendeta.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-undo"
                aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    <div class="card my-3">
        <div class="form-container">
            <form action="{{ route('majelis.pendeta.store') }}" method="post">
                @csrf
                <div class="grid gap-4 md:grid-cols-2 capitalize">
                    <div class="mb-4">
                        <label for="nama">nama pendeta</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder=""
                            autocomplete="off" />
                        @error('nama')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <select id="jabatan" name="jabatan">
                            <option value="pendeta jemaat" {{ old('jabatan') == 'pendeta jemaat' ? 'selected' : '' }}>
                                Pendeta Jemaat</option>
                            <option value="pendeta fungsional"
                                {{ old('jabatan') == 'pendeta fungsional' ? 'selected' : '' }}>Pendeta Fungsional
                            </option>
                        </select>
                        @error('jabatan')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="prdawal">periode awal</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            </div>
                            <input id="prdawal" name="prdawal" value="{{ old('prdawal') }}" datepicker
                                datepicker-buttons datepicker-autohide datepicker-orientation="bottom right"
                                datepicker-format="dd-mm-yyyy" type="text" class="datepicker" placeholder=""
                                autocomplete="off" />
                        </div>
                        @error('prdawal')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="prdakhir">periode akhir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            </div>
                            <input id="prdakhir" name="prdakhir" value="{{ old('prdakhir') }}" datepicker
                                datepicker-buttons datepicker-autohide datepicker-orientation="bottom right"
                                datepicker-format="dd-mm-yyyy" type="text" class="datepicker" placeholder=""
                                autocomplete="off" />
                        </div>
                        @error('prdakhir')
                            <div class="alert-error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <button type="submit" class="btn btn-primary ms-auto"><i class="fa fa-floppy-o mr-2"
                            aria-hidden="true"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-admin>
