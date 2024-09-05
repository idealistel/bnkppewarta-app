<x-admin>
    <x-slot:title>Pengguna</x-slot:title>

    <div class="inline-flex w-full border-b border-gray-200">
        <h4 class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Pengguna</h4>
        <button type="button" data-modal-target="create-modal" data-modal-toggle="create-modal"
            class="ms-auto my-auto inline-flex items-end text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-400 focus:outline-none dark:focus:ring-gray-800"><svg
                class="w-4 h-4 my-auto mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14m-7 7V5" />
            </svg> Tambah</button>
    </div>

    @if (session('success'))
        @include('admin.pengguna.success')
    @endif

    {{-- @if ($errors->any())
        @include('admin.pengguna.error')
    @elseif (session('success'))
        @include('admin.pengguna.success')
    @endif --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pengguna
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Level
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. HP
                    </th>
                    <th scope="col" class="text-center px-6 py-3">
                        Opsi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td scope="row" class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('pengguna.index') }}">
                                {{ $user->username }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->role }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->phone }}
                        </td>
                        <td class="inline-flex items-center px-6 py-4">
                            @if ($user->role === 'admin')
                                <span class="font-medium">Tidak diizinkan!</span>
                            @else
                                <button type="button" data-modal-target="edit-modal-{{ $user->username }}"
                                    data-modal-toggle="edit-modal-{{ $user->username }}"
                                    class="bg-blue-200 hover:bg-blue-400 text-blue-600 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-500 dark:text-white border border-blue-500 inline-flex items-center justify-center">
                                    <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                    </svg>
                                </button>
                                <form action="{{ route('pengguna.destroy', $user->id) }}" method="post"
                                    onsubmit="return confirm('Yakin mau hapus {{ $user->username }} ?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="bg-red-200 hover:bg-red-300 text-red-500 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-full dark:border-gray-700 dark:bg-gray-700 dark:hover:bg-gray-500 dark:text-white border border-red-400 inline-flex items-center justify-center">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>

                    @include('admin.pengguna.edit')
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    @include('admin.pengguna.create')

</x-admin>
