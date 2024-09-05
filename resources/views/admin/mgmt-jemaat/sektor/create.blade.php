<x-admin>
    <x-slot:title>Tambah Sektor</x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.sektor.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-undo" aria-hidden="true"></i>
            Kembali</a>
    </x-slot:button>

    <div class="card my-3">
        <div class="form-container">
            <form method="POST" class="space-y-2 md:w-72 w-full px-2" action="{{ route('mgmt.sektor.store') }}">
                @csrf
                <div>
                    <label for="nama">Nama Sektor</label>
                    <input type="text" name="nama" id="nama" placeholder=" " autocomplete="off" autofocus />
                    @error('nama')
                        <div class="alert-error" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i>Simpan</button>
            </form>
        </div>
    </div>

</x-admin>
