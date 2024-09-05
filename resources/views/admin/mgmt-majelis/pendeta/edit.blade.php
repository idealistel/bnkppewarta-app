<x-admin>
    <x-slot:title>Edit pendeta</x-slot:title>

    <x-slot:button>
        <a href="{{ route('majelis.pendeta.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-undo my-auto"
                aria-hidden="true"></i> Kembali</a>
    </x-slot:button>

    @if ($errors->any())
        <div class="alert-error" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card my-3">
        <div class="form-container">
            <form method="POST" action="{{ route('majelis.pendeta.update', $data->id) }}">
                @csrf
                @method('PUT')
                <div class="grid gap-4 md:grid-cols-2 capitalize">
                    <div class="mb-4">
                        <label for="nama">nama pendeta</label>
                        <input type="text" id="nama" name="nama" value="{{ $data->nama }}" placeholder=""
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
                            <option value="pendeta jemaat" {{ $data->jabatan == 'pendeta jemaat' ? 'selected' : '' }}>
                                Pendeta Jemaat</option>
                            <option value="pendeta fungsional"
                                {{ $data->jabatan == 'pendeta fungsional' ? 'selected' : '' }}>Pendeta Fungsional
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
                            <input id="prdawal" name="prdawal" value="@formatTanggal($data->prdawal)" datepicker datepicker-buttons
                                datepicker-autohide datepicker-orientation="bottom right" datepicker-format="dd-mm-yyyy"
                                type="text" class="datepicker" placeholder="" autocomplete="off" />
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
                            <input id="prdakhir" name="prdakhir" value="@formatTanggal($data->prdakhir)" datepicker
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
                    <button type="button" data-modal-target="updateModal" data-modal-toggle="updateModal"
                        id="updateButton" class="btn btn-primary ms-auto"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>Update</button>
                </div>

                <!-- Modal Konfirmasi Update -->
                <div id="updateModal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <i class="fa fa-pencil-square-o fa-3x text-gray-500 dark:text-gray-300 mb-3"
                                aria-hidden="true"></i>
                            <p class="mb-4 text-gray-500 dark:text-gray-300">Anda yakin ingin update data pendeta
                                <span class="font-medium">{{ $data->nama }}</span> ini?
                            </p>
                            <div class="flex justify-center items-center space-x-4">
                                <a href="{{ route('majelis.pendeta.index') }}" class="btn btn-slate">
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
