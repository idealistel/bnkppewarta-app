<x-admin>
    <x-slot:title>Edit Sektor</x-slot:title>

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

    <div class="card my-3">
        <div class="form-container">
            <form class="space-y-2 md:w-72 w-full px-2" method="POST" action="{{ route('mgmt.sektor.update', $nama) }}"
                x-data="{ nama: '{{ $nama }}' }">
                @csrf
                @method('PUT')
                <div>
                    <label for="nama">Nama Sektor</label>
                    <input type="text" name="nama" id="nama" placeholder=" " autocomplete="off" autofocus
                        value="{{ $nama }}" x-model="nama" />
                    @error('nama')
                        <div class="p-2 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="button" data-modal-target="updateModal" data-modal-toggle="updateModal" id="updateButton"
                    class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Update</button>

                <!-- Modal Konfirmasi Update -->
                <div id="updateModal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <i class="fa fa-pencil-square-o fa-3x text-gray-500 dark:text-gray-300 mb-3"
                                aria-hidden="true"></i>
                            <p class="mb-4 text-gray-500 dark:text-gray-300">Anda yakin ingin update nama sektor
                                <span
                                    class="font-medium text-black dark:text-white capitalize">{{ $nama }}</span>
                                menjadi
                                <span class="font-medium text-black dark:text-white capitalize" x-text="nama"></span>?
                            </p>
                            <div class="flex justify-center items-center space-x-4">
                                <a href="{{ route('mgmt.sektor.index') }}" class="btn btn-slate">
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
