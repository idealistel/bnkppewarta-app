<x-admin>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="grid gap-3 md:grid-cols-4 mt-4">
        <div class="card items-center inline-flex text-green-400">
            <div class="flex-col my-auto">
                <h6 class="text-md font-semibold dark:text-white">Total Keluarga</h6>
                <h3 class="text-3xl font-bold dark:text-white">{{ $keluarga_aktif }}</h3>
            </div>
            <span class="ms-auto">
                <svg class="w-16 h-16 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="m7.4 3.736 3.43 3.429A5.046 5.046 0 0 1 12.133 7c.356.01.71.06 1.056.147l3.41-3.412a2.32 2.32 0 0 1 .451-.344A9.89 9.89 0 0 0 12.268 2a10.022 10.022 0 0 0-5.322 1.392c.165.095.318.211.454.344Zm11.451 1.54-.127-.127a.5.5 0 0 0-.706 0l-2.932 2.932c.03.023.05.054.078.077.237.194.454.41.651.645.033.038.077.067.11.107l2.926-2.927a.5.5 0 0 0 0-.707Zm-2.931 9.81c-.025.03-.058.052-.082.082a4.97 4.97 0 0 1-.633.639c-.04.036-.072.083-.115.117l2.927 2.927a.5.5 0 0 0 .707 0l.127-.127a.5.5 0 0 0 0-.707l-2.932-2.931Zm-1.443-4.763a3.037 3.037 0 0 0-1.383-1.1l-.012-.007a2.956 2.956 0 0 0-1-.213H12a2.964 2.964 0 0 0-2.122.893c-.285.29-.509.634-.657 1.013l-.009.016a2.96 2.96 0 0 0-.21 1 2.99 2.99 0 0 0 .488 1.716l.032.04a3.04 3.04 0 0 0 1.384 1.1l.012.007c.319.129.657.2 1 .213.393.015.784-.05 1.15-.192.012-.005.021-.013.033-.018a3.01 3.01 0 0 0 1.676-1.7v-.007a2.89 2.89 0 0 0 0-2.207 2.868 2.868 0 0 0-.27-.515c-.007-.012-.02-.025-.03-.039Zm6.137-3.373a2.53 2.53 0 0 1-.349.447l-3.426 3.426c.112.428.166.869.161 1.311a4.954 4.954 0 0 1-.148 1.054l3.413 3.412c.133.134.249.283.347.444A9.88 9.88 0 0 0 22 12.269a9.913 9.913 0 0 0-1.386-5.319ZM16.6 20.264l-3.42-3.421c-.386.1-.782.152-1.18.157h-.135c-.356-.01-.71-.06-1.056-.147L7.4 20.265a2.503 2.503 0 0 1-.444.347A9.884 9.884 0 0 0 11.732 22H12a9.9 9.9 0 0 0 5.044-1.388 2.515 2.515 0 0 1-.444-.348ZM3.735 16.6l3.426-3.426a4.608 4.608 0 0 1-.013-2.367L3.735 7.4a2.508 2.508 0 0 1-.349-.447 9.889 9.889 0 0 0 0 10.1 2.48 2.48 0 0 1 .35-.453Zm5.101-.758a4.959 4.959 0 0 1-.65-.645c-.034-.038-.078-.067-.11-.107L5.15 18.017a.5.5 0 0 0 0 .707l.127.127a.5.5 0 0 0 .706 0l2.932-2.933c-.029-.018-.049-.053-.078-.076Zm-.755-6.928c.03-.037.07-.063.1-.1.183-.22.383-.423.6-.609.046-.04.081-.092.128-.13L5.983 5.149a.5.5 0 0 0-.707 0l-.127.127a.5.5 0 0 0 0 .707l2.932 2.931Z" />
                </svg>

            </span>
        </div>
        <div class="card items-center inline-flex text-sky-600">
            <div class="flex-col my-auto">
                <h6 class="text-md font-semibold dark:text-white">Total Jemaat</h6>
                <h3 class="text-3xl font-bold dark:text-white">{{ $jemaat_aktif }}</h3>
            </div>
            <span class="ms-auto">
                <svg class="w-16 h-16 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 15v4m6-6v6m6-4v4m6-6v6M3 11l6-5 6 5 5.5-5.5" />
                </svg>
            </span>
        </div>
        <div class="card items-center inline-flex text-red-600">
            <div class="flex-col my-auto">
                <h6 class="text-md font-semibold dark:text-white">Laki-laki</h6>
                <h3 class="text-3xl font-bold dark:text-white">{{ $laki_laki_aktif }}</h3>
            </div>
            <span class="ms-auto">
                <svg class="w-16 h-16 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

            </span>
        </div>
        <div class="card items-center inline-flex text-yellow-400">
            <div class="flex-col my-auto">
                <h6 class="text-md font-semibold dark:text-white">Perempuan</h6>
                <h3 class="text-3xl font-bold dark:text-white">{{ $perempuan_aktif }}</h3>
            </div>
            <span class="ms-auto">
                <svg class="w-16 h-16 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                        clip-rule="evenodd" />
                </svg>

            </span>
        </div>
    </div>
    <div class="grid gap-3 grid-flow-row-dense md:grid-cols-3 mt-4">
        <div class="col-span-2 card">
            <div>
                <h2 class="font-medium">Grafik Jemaat</h2>
            </div>
            <div class="card-body">
                <div class="chart-container md:h-64">
                    <canvas id="grafik-jemaat"></canvas>
                </div>
            </div>
        </div>
        <div class="col-span-2 lg:col-auto card">
            {{-- <div class="container mx-auto mt-5" x-data="{ showAlert: false }">
                <button x-on:click="showAlert = true" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Tampilkan Alert
                </button>

                <div x-show="showAlert" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">

                    <div class="bg-white p-5 rounded shadow-lg max-w-sm">
                        <h2 class="text-xl font-bold mb-2  text-black">Sweet Alert</h2>
                        <p class="mb-4 text-black">Ini adalah contoh Sweet Alert menggunakan Tailwind CSS dan Alpine.js!
                        </p>
                        <button x-on:click="showAlert = false" class="px-4 py-2 bg-red-600 text-white rounded">
                            Tutup
                        </button>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>


    <x-slot:script>
        <script>
            const ctx = document.getElementById('grafik-jemaat');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Balita (0-5)', 'Anak-anak (6-12)', 'Remaja (13-20)', 'Dewasa (21-59)', 'Lansia (60+)'],
                    datasets: [{
                        label: 'Laki-laki',
                        data: [{{ $balita_laki_laki }}, {{ $anak_laki_laki }}, {{ $remaja_laki_laki }},
                            {{ $dewasa_laki_laki }}, {{ $lansia_laki_laki }}
                        ],
                        borderWidth: 1,
                        backgroundColor: "rgb(16, 162, 224)"
                    }, {
                        label: 'Perempuan',
                        data: [{{ $balita_perempuan }}, {{ $anak_perempuan }}, {{ $remaja_perempuan }},
                            {{ $dewasa_perempuan }}, {{ $lansia_perempuan }}
                        ],
                        borderWidth: 1,
                        backgroundColor: "rgb(252, 3, 152)"
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </x-slot:script>
</x-admin>
