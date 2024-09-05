<x-admin>
    <x-slot:title>{{ $data[0]->nama }}</x-slot:title>

    <x-slot:button>
        <a href="{{ route('mgmt.jemaat.index') }}" class="btn btn-primary ms-auto"><i class="fa fa-plus-circle"
                aria-hidden="true"></i>
            kembali</a>
    </x-slot:button>

    @if (session('success'))
        <div class="alert-success" role="alert">
            <span class="font-medium">Wow!</span> {{ session('success') }}
        </div>
    @endif

    <div class="card my-3">
        <div class="bg-gray-50 py-2 text-center font-semibold rounded-md">
            <h3>detail jemaat</h3>
        </div>
        <div class="grid md:grid-cols-2 gap-4 my-5">
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">nomor stambuk</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->stambuk }}</span></div>
            </div>
            <div class="md:flex hidden">
                <span class="sr-only">tidak ditampilkan</span>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">nama</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->nama }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">alias</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->alias ?? '-' }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">jenis kelamin</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->jeniskelamin }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">tempat lahir</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->tempatlahir }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">tanggal lahir</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">@formatTanggal($data[0]->tanggallahir)</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">hubungan keluarga</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->hubungankeluarga }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">nama ayah</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->namaayah ?? '-' }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">nama ibu</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->namaibu ?? '-' }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">pendidikan</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->pendidikan }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">pekerjaan</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->pekerjaan }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">tanggal daftar</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">@formatTanggal($data[0]->tanggaldaftar)</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">no hp</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->hp ?? '-' }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">status</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->status }}</span></div>
            </div>
        </div>

        <div class="bg-gray-50 py-2 text-center font-semibold rounded-md">
            <h3>data sakramen</h3>
        </div>
        <div class="grid md:grid-rows-10 md:grid-flow-col gap-4 my-5">
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">status baptis</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->statusbaptis }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">tanggal dibaptis</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">@formatTanggal($data[0]->tanggalbaptis)</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">gereja dibaptis</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->gerejabaptis ?? '-' }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">resort dibaptis</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->resortbaptis ?? '-' }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">akta baptis</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->aktabaptis ?? '-' }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">status sidi</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->statussidi }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">tanggal disidikan</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">@formatTanggal($data[0]->tanggalsidi)</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">gereja disidikan</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->gerejasidi ?? '-' }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">resort disidikan</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->resortsidi ?? '-' }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">akta sidi</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->aktasidi ?? '-' }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">status nikah</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->statusnikah }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">tanggal menikah</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">@formatTanggal($data[0]->tanggalnikah)</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">gereja menikah</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->gerejanikah ?? '-' }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">resort menikah</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->resortnikah ?? '-' }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="w-1/4 whitespace-nowrap">akta nikah</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->aktanikah ?? '-' }}</span>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 py-2 text-center font-semibold rounded-md">
            <h3>kepala keluarga</h3>
        </div>
        <div class="grid md:grid-rows-4 md:grid-flow-col gap-4 my-5">
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="whitespace-nowrap">ID keluarga</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->keluarga_id }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="whitespace-nowrap">nama</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->keluarga->nama }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="whitespace-nowrap">alamat</div>
                <div class="md:col-span-2">:<span class="font-medium ml-2">{{ $data[0]->keluarga->alamat }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="whitespace-nowrap">kelurahan</div>
                <div class="md:col-span-2">:<span
                        class="font-medium ml-2">{{ $data[0]->keluarga->kelurahan->nama }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="whitespace-nowrap">kecamatan</div>
                <div class="md:col-span-2">:<span
                        class="font-medium ml-2">{{ $data[0]->keluarga->kelurahan->kecamatan->nama }}</span></div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="whitespace-nowrap">kabupaten/kota</div>
                <div class="md:col-span-2">:<span
                        class="font-medium ml-2">{{ $data[0]->keluarga->kelurahan->kecamatan->kabupaten->nama }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="whitespace-nowrap">provinsi</div>
                <div class="md:col-span-2">:<span
                        class="font-medium ml-2">{{ $data[0]->keluarga->kelurahan->kecamatan->kabupaten->provinsi->nama }}</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-2 px-4">
                <div class="whitespace-nowrap">sektor</div>
                <div class="md:col-span-2">:<span
                        class="font-medium ml-2">{{ $data[0]->keluarga->sector->nama }}</span>
                </div>
            </div>
        </div>

        <footer class="border-t pt-3">
            <div class="ms-auto space-x-2">
                <a href="{{ route('mgmt.jemaat.edit', $data[0]->stambuk) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('mgmt.jemaat.index') }}" class="btn btn-slate">Kembali</a>
            </div>
        </footer>
    </div>

</x-admin>
