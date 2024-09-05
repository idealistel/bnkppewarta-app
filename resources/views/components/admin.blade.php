<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    <title>{{ ucwords($title) ?? '' }} - BNKP Pewarta</title>

    <link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('bnkp-32.png') }}" type="image/png">
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

    <!-- Tom Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.default.min.css" rel="stylesheet">

</head>

<body>
    <div class="antialiased">

        @if (Route::is('login'))
            {{ $slot }}
        @else
            <nav id="topbar"
                class="bg-white border-gray-200 px-2 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 md:left-64 right-0 top-0 z-40">
                <div class="flex flex-wrap justify-between items-center">
                    <div class="flex justify-start items-center">
                        <!-- Logo dan Nama Aplikasi Saat di Tampilan Mobile -->
                        <div class="md:hidden">
                            <a href="{{ route('dashboard') }}" class="flex md:hidden items-center justify-between mr-4">
                                <svg class="w-8 h-8 mr-[18px]" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 32.44 62.25">
                                    <ellipse cx="16.22" cy="49.08" rx="15.47" ry="12.42" fill="none"
                                        class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                                    <line x1="0.67" y1="49.08" x2="31.61" y2="49.08" fill="none"
                                        class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                                    <path d="M18,44.13a30.29,30.29,0,0,0,26.81,0" transform="translate(-15.22 -1.25)"
                                        fill="none" class="stroke-current" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <path d="M22.93,40c5.63,3.42,11.31,3.37,17,0" transform="translate(-15.22 -1.25)"
                                        fill="none" class="stroke-current" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <path d="M44.84,56.53a30.29,30.29,0,0,0-26.81,0" transform="translate(-15.22 -1.25)"
                                        fill="none" class="stroke-current" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <path d="M39.86,60.7c-5.63-3.42-11.31-3.37-17,0" transform="translate(-15.22 -1.25)"
                                        fill="none" class="stroke-current" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <ellipse cx="16.14" cy="49.08" rx="10.48" ry="12.42" fill="none"
                                        class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                                    <ellipse cx="16.22" cy="49.08" rx="4.15" ry="12.42" fill="none"
                                        class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                                    <rect x="14.5" y="8.64" width="3.45" height="28.04" class="fill-current" />
                                    <rect x="29.25" y="9.14" width="4.21" height="19.1"
                                        transform="translate(-2.55 48.8) rotate(-90)" class="fill-current" />
                                    <rect x="30.94" y="-0.85" width="1" height="19.1"
                                        transform="translate(24.92 -23.99) rotate(90)" class="fill-current" />
                                    <polygon
                                        points="6.67 6.37 25.77 6.37 25.77 0 21.3 4.75 16.14 0 11.04 4.86 6.59 0 6.67 6.37"
                                        class="fill-current" />
                                    <text transform="translate(6.67 14.8) scale(0.86 1)" font-size="8.4"
                                        font-family="News706BT-BoldC, News706 BT" font-weight="700"
                                        class="fill-current">B</text>
                                    <text transform="translate(20.02 14.8) scale(0.86 1)" font-size="8.4"
                                        font-family="News706BT-BoldC, News706 BT" font-weight="700"
                                        class="fill-current">N</text>
                                    <text transform="translate(6.64 26.06) scale(0.86 1)" font-size="8.4"
                                        font-family="News706BT-BoldC, News706 BT" font-weight="700"
                                        class="fill-current">K</text>
                                    <text transform="translate(19.98 26.06) scale(0.86 1)" font-size="8.4"
                                        font-family="News706BT-BoldC, News706 BT" font-weight="700"
                                        class="fill-current">P</text>
                                </svg>
                                <span class="text-2xl font-semibold whitespace-nowrap">BNKP
                                    Pewarta</span>
                            </a>
                        </div>

                        <div class="">
                            <button id="sidebar-toggle"
                                class="p-2 text-gray-600 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white hidden md:flex">
                                <i class="fa fa-bars mx-1" aria-hidden="true"></i>
                                <span class="sr-only">Toggle sidebar</span>
                            </button>
                        </div>

                        <!-- Judul halaman saat di tampilan desktop -->
                        <div class="page-title ml-4 hidden">
                            {{ $title }}
                        </div>
                    </div>
                    <div class="flex items-center lg:order-2">
                        <!-- Toggle tema -->
                        <div class="bottom-0 md:mr-3 left-0 justify-center space-x-4 w-full lg:flex z-20">
                            <a id="theme-toggle" data-tooltip-target="tooltip-settings"
                                class="inline-flex justify-center p-2 rounded cursor-pointer dark:hover:text-white hover:text-white hover:bg-sky-300">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        fill-rule="evenodd" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <div id="tooltip-settings" role="tooltip"
                                class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip capitalize">
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <!-- Navbar Search -->
                        <div class="hidden md:block md:pl-2">
                            <label for="topbar-search" class="sr-only">Search</label>
                            <div class="relative md:w-96" x-data="{ cari: '' }">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text" name="topbar-search" id="topbar-search"
                                    class="cari bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Cari sesuatu..." />
                                <button type="button" id="clear-search-top"
                                    class="absolute inset-y-0 end-0 text-gray-700 hover:bg-gray-200 items-center rounded-full p-2 m-2 hidden">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Toggle user -->
                        <div class="toggle-user">
                            <button type="button" id="user-menu-button" aria-expanded="false"
                                data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                                <span class="sr-only">Open user menu</span>
                                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                            </button>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="user-dropdown">
                                <div class="px-4 py-3">
                                    <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                                    <span
                                        class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li>
                                        <a href="#">setelan</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit">logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Toggle Sidebar Saat di Tampilan Mobile -->
                        <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                            aria-controls="drawer-navigation"
                            class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <i class="fa fa-bars mx-1" aria-hidden="true"></i>
                            <span class="sr-only">Toggle sidebar</span>
                        </button>
                    </div>
                </div>
            </nav>

            <x-admin-sidebar></x-admin-sidebar>

            <main id="main-content">
                <!-- BreadCrumb saat di tampilan desktop -->
                <div class="md:inline-flex w-full mt-2 border-b hidden">
                    @if (isset($breadcrumb))
                        <nav class="flex capitalize" aria-label="breadcrumb">
                            <ol class="inline-flex items-center">
                                @foreach ($breadcrumb as $crumb)
                                    @if (!$loop->last)
                                        @if ($loop->first)
                                            <li class="inline-flex items-center">
                                                <i class="fa fa-home mr-2"></i>
                                                <a href="{{ $crumb['url'] }}"
                                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">{{ $crumb['name'] }}</a>
                                            </li>
                                        @else
                                            <li class="inline-flex items-center">
                                                <i class="fa fa-angle-right fa-lg text-gray-400 mx-2"
                                                    aria-hidden="true"></i>
                                                <a href="{{ $crumb['url'] }}"
                                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">{{ $crumb['name'] }}</a>
                                            </li>
                                        @endif
                                    @else
                                        @if ($loop->count > 1)
                                            <li class="" aria-current="page">
                                                <div class="flex items-center py-3">
                                                    <i class="fa fa-angle-right fa-lg text-gray-400 mx-2"
                                                        aria-hidden="true"></i>
                                                    <span
                                                        class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $crumb['name'] }}</span>
                                                </div>
                                            </li>
                                        @else
                                            <li class="" aria-current="page">
                                                <div class="flex items-center py-3">
                                                    <i class="fa fa-home mr-2"></i>
                                                    <span
                                                        class="ms-1 text-sm font-medium text-gray-500 md:ms-1 dark:text-gray-400">{{ $crumb['name'] }}</span>
                                                </div>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ol>
                        </nav>
                    @endif

                    {{ $button ?? '' }}
                </div>

                <!-- Judul halaman saat di tampilan mobile -->
                <div class="flex w-full border-b border-gray-200 md:hidden pb-2">
                    <h4 class="page-title">
                        {{ $title }}</h4>

                    {{ $button ?? '' }}
                </div>

                <div class="">
                    {{ $slot }}
                </div>
            </main>
        @endif

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Tom Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    {{ $script ?? '' }}
</body>

</html>
