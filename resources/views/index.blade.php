<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Light Theme Dashboard</title>
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
</head>

<body class="dashboard grid grid-cols-1 gap-4">
    <div class="card md:w-2/4 w-full m-3">
        <div class="flex justify-center">
            <ol
                class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="text-sm">Kepala Keluarga</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="text-sm">Detail jemaat</span>
                    </span>
                </li>
                <li class="flex items-center">
                    sakramen
                </li>
            </ol>

        </div>
        <div class="form-container">
            <form>
                <!-- Form untuk Step 1 -->
                <div id="step-1" class="block mt-6">
                    <div class="mb-4">
                        <label for="name">Name</label>
                        <input type="text" id="name" />
                    </div>
                    <div class="mb-4">
                        <label for="email">Email</label>
                        <input type="email" id="email" />
                    </div>
                    <button type="button" id="next-step" class="btn btn-primary">Next</button>
                </div>

                <!-- Form untuk Step 2 (hidden by default) -->
                <div id="step-2" class="hidden mt-6">
                    <div class="mb-4">
                        <label for="address">Address</label>
                        <input type="text" id="address" />
                    </div>
                    <div class="mb-4">
                        <label for="city">City</label>
                        <input type="text" id="city" />
                    </div>
                    <button type="button" id="prev-step"
                        class="bg-gray-600 text-white px-4 py-2 rounded">Previous</button>
                    <button type="button" id="next-step-2" class="btn btn-primary">Next</button>
                </div>

                <!-- Form untuk Step 3 (hidden by default) -->
                <div id="step-3" class="hidden mt-6">
                    <div class="mb-4">
                        <label for="card">Card Number</label>
                        <input type="text" id="card" />
                    </div>
                    <button type="button" id="prev-step-2"
                        class="bg-gray-600 text-white px-4 py-2 rounded">Previous</button>
                    <button type="submit" class="btn btn-success">Submit</button>

                </div>
            </form>
        </div>
    </div>

    <script>
        // Inisialisasi Step Elements
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const step3 = document.getElementById('step-3');

        // Tombol navigasi antar step
        const nextStep = document.getElementById('next-step');
        const nextStep2 = document.getElementById('next-step-2');
        const prevStep = document.getElementById('prev-step');
        const prevStep2 = document.getElementById('prev-step-2');

        // Navigasi dari Step 1 ke Step 2
        nextStep.addEventListener('click', () => {
            step1.classList.add('hidden');
            step2.classList.remove('hidden');
        });

        // Navigasi dari Step 2 ke Step 3
        nextStep2.addEventListener('click', () => {
            step2.classList.add('hidden');
            step3.classList.remove('hidden');
        });

        // Navigasi dari Step 2 ke Step 1
        prevStep.addEventListener('click', () => {
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
        });

        // Navigasi dari Step 3 ke Step 2
        prevStep2.addEventListener('click', () => {
            step3.classList.add('hidden');
            step2.classList.remove('hidden');
        });
    </script>

</body>

</html>
