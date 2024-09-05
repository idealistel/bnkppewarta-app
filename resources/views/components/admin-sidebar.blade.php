<aside
    class="fixed top-0 left-0 md:z-30 z-50 w-64 md:w-[72px] h-screen pt-0 md:transition-all md:duration-300 -translate-x-full border-gray-200 md:translate-x-0 bg-gray-200 dark:bg-gray-500 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">

    <div class="relative inline-flex">
        <a href="{{ route('dashboard') }}"
            class="flex items-center w-full px-5 py-[15px] text-base font-medium transition duration-75 dark:text-white hover:text-white dark:hover:text-gray-300">
            <svg class="w-8 h-8 mr-[19px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.44 62.25">
                <ellipse cx="16.22" cy="49.08" rx="15.47" ry="12.42" fill="none"
                    class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                <line x1="0.67" y1="49.08" x2="31.61" y2="49.08" fill="none" class="stroke-current"
                    stroke-miterlimit="10" stroke-width="1.5" />
                <path d="M18,44.13a30.29,30.29,0,0,0,26.81,0" transform="translate(-15.22 -1.25)" fill="none"
                    class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                <path d="M22.93,40c5.63,3.42,11.31,3.37,17,0" transform="translate(-15.22 -1.25)" fill="none"
                    class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                <path d="M44.84,56.53a30.29,30.29,0,0,0-26.81,0" transform="translate(-15.22 -1.25)" fill="none"
                    class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                <path d="M39.86,60.7c-5.63-3.42-11.31-3.37-17,0" transform="translate(-15.22 -1.25)" fill="none"
                    class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                <ellipse cx="16.14" cy="49.08" rx="10.48" ry="12.42" fill="none"
                    class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                <ellipse cx="16.22" cy="49.08" rx="4.15" ry="12.42" fill="none"
                    class="stroke-current" stroke-miterlimit="10" stroke-width="1.5" />
                <rect x="14.5" y="8.64" width="3.45" height="28.04" class="fill-current" />
                <rect x="29.25" y="9.14" width="4.21" height="19.1" transform="translate(-2.55 48.8) rotate(-90)"
                    class="fill-current" />
                <rect x="30.94" y="-0.85" width="1" height="19.1" transform="translate(24.92 -23.99) rotate(90)"
                    class="fill-current" />
                <polygon points="6.67 6.37 25.77 6.37 25.77 0 21.3 4.75 16.14 0 11.04 4.86 6.59 0 6.67 6.37"
                    class="fill-current" />
                <text transform="translate(6.67 14.8) scale(0.86 1)" font-size="8.4"
                    font-family="News706BT-BoldC, News706 BT" font-weight="700" class="fill-current">B</text>
                <text transform="translate(20.02 14.8) scale(0.86 1)" font-size="8.4"
                    font-family="News706BT-BoldC, News706 BT" font-weight="700" class="fill-current">N</text>
                <text transform="translate(6.64 26.06) scale(0.86 1)" font-size="8.4"
                    font-family="News706BT-BoldC, News706 BT" font-weight="700" class="fill-current">K</text>
                <text transform="translate(19.98 26.06) scale(0.86 1)" font-size="8.4"
                    font-family="News706BT-BoldC, News706 BT" font-weight="700" class="fill-current">P</text>
            </svg>
            <span id="app-name" class="text-2xl font-semibold whitespace-nowrap">BNKP
                Pewarta</span>
        </a>
    </div>

    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <!-- Sidebar Search -->
        <div class="md:hidden mb-4">
            <label for="sidebar-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                        </path>
                    </svg>
                </div>
                <input type="text" name="sidebar-search" id="sidebar-search"
                    class="cari bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Cari sesuatu" />
                <button type="button" id="clear-search-side"
                    class="absolute inset-y-0 end-0 text-gray-700 hover:bg-gray-200 items-center rounded-full p-2 m-2 hidden">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <!-- Menu dan Sub Menu -->
        @if (Auth::check())
            @if (Auth::user()->role === 'admin')
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'active' : '' }}">
                            <i class="fa fa-tachometer mr-[29px]" aria-hidden="true"></i>
                            <span class="">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul class="pt-2 mt-2 space-y-1 border-t">
                    <li x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false">
                        <a class="{{ Route::is('mgmt.*') ? 'active' : '' }}" x-on:click="open = !open">
                            <i class="fa fa-users mr-[27px]" aria-hidden="true"></i>
                            <span class="flex-1 text-left whitespace-nowrap">Jemaat</span>
                            <i :class="{ 'rotate-90': open }"
                                class="fa fa-chevron-circle-right transition-transform duration-300"
                                aria-hidden="true"></i>
                        </a>
                        <ul x-show="open" x-collapse class="py-2 space-y-1">
                            <li>
                                <a href="{{ route('mgmt.sektor.index') }}"
                                    class="{{ Route::is('mgmt.sektor.*') ? 'active-link' : '' }}">Sektor</a>
                            </li>
                            <li>
                                <a href="{{ route('mgmt.keluarga.index') }}"
                                    class="{{ Route::is('mgmt.keluarga.*') ? 'active-link' : '' }}">Kepala
                                    Keluarga</a>
                            </li>
                            <li>
                                <a href="{{ route('mgmt.jemaat.index') }}"
                                    class="{{ Route::is('mgmt.jemaat.*') ? 'active-link' : '' }}">Jemaat</a>
                            </li>
                            <li>
                                <a href="{{ route('mgmt.jemaatpindah.index') }}"
                                    class="{{ Route::is('mgmt.jemaatpindah.*') ? 'active-link' : '' }}">Jemaat
                                    Pindah</a>
                            </li>
                            <li>
                                <a href="{{ route('mgmt.jemaatmeninggal.index') }}"
                                    class="{{ Route::is('mgmt.jemaatmeninggal.*') ? 'active-link' : '' }}">Jemaat
                                    Meninggal</a>
                            </li>
                        </ul>
                    </li>
                    <li x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false">
                        <a x-on:click="open = !open" class="{{ Route::is('majelis.*') ? 'active' : '' }}">
                            <i class="fa fa-university mr-[25px]" aria-hidden="true"></i>
                            <span class="flex-1 text-left whitespace-nowrap">Kemajelisan</span>
                            <i :class="{ 'rotate-90': open }"
                                class="fa fa-chevron-circle-right transition-transform duration-300"
                                aria-hidden="true"></i>
                        </a>
                        <ul class="py-2 space-y-1" x-show="open" x-collapse>
                            <li>
                                <a href="{{ route('majelis.pendeta.index') }}"
                                    class="{{ Route::is('majelis.pendeta.*') ? 'active-link' : '' }}">Pendeta</a>
                            </li>
                            <li>
                                <a href="#">BPMJ</a>
                            </li>
                            <li>
                                <a href="#">SNK</a>
                            </li>
                            <li>
                                <a href="#">BPPJ</a>
                            </li>
                            <li>
                                <a href="#">Komisi</a>
                            </li>
                            <li>
                                <a href="#">Panitia</a>
                            </li>
                        </ul>
                    </li>
                    <li x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false">
                        <a x-on:click="open = !open">
                            <i class="fa fa-archive mr-7" aria-hidden="true"></i>
                            <span class="flex-1 text-left whitespace-nowrap">Arsip</span>
                            <i :class="{ 'rotate-90': open }"
                                class="fa fa-chevron-circle-right transition-transform duration-300"
                                aria-hidden="true"></i>
                        </a>
                        <ul class="py-2 space-y-1" x-show="open" x-collapse>
                            <li>
                                <a href="#">Surat
                                    Masuk</a>
                            </li>
                            <li>
                                <a href="#">Surat
                                    Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-tasks mr-[27px]" aria-hidden="true"></i>
                            <span class="whitespace-nowrap">Profil Gereja</span>
                        </a>
                    </li>
                </ul>
                <ul class="pt-2 mt-2 space-y-1 border-t border-gray-200 dark:border-gray-700">
                    <li>
                        <a href="#">
                            <i class="fa fa-file-text mr-[30px]" aria-hidden="true"></i>
                            <span class="whitespace-nowrap">Warta Jemaat</span>
                        </a>
                    </li>
                    <li x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false">
                        <a x-on:click="open = !open">
                            <i class="fa fa-lightbulb-o fa-lg mr-[31px]" aria-hidden="true"></i>
                            <span class="flex-1 text-left whitespace-nowrap">KIE</span>
                            <i :class="{ 'rotate-90': open }"
                                class="fa fa-chevron-circle-right transition-transform duration-300"
                                aria-hidden="true"></i>
                        </a>
                        <ul class="py-2 space-y-1" x-show="open" x-collapse>
                            <li>
                                <a href="#">Jadwal
                                    Pelayan</a>
                            </li>
                            <li>
                                <a href="#">Tata
                                    Ibadah</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('postingan.index') }}"
                            class="{{ Route::is('postingan.*') ? 'active' : '' }}">
                            <i class="fa fa-newspaper-o mr-[25px]" aria-hidden="true"></i>
                            <span class="">Kabar</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengguna.index') }}"
                            class="{{ Route::is('pengguna.*') ? 'active' : '' }}">
                            <i class="fa fa-user fa-lg mr-[29px]" aria-hidden="true"></i>
                            <span class="">Pengguna</span>
                        </a>
                    </li>
                </ul>
            @elseif (Auth::user()->role === 'user')
                <ul class="pt-2 mt-2 space-y-1 border-t border-gray-200 dark:border-gray-700">
                    <li>
                        <a href="{{ route('postingan.index') }}"
                            class="{{ Route::is('postingan.*') ? 'active' : '' }}">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <span class="ml-3">Kabar</span>
                        </a>
                    </li>
                </ul>
            @endif
        @endif
        <ul class="md:hidden pt-2 mt-2 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf

                    <button type="submit"
                        class="flex w-full items-center p-2 text-base font-medium text-gray-900  transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white bg-slate-200 dark:bg-slate-600 group">
                        <div class="mx-auto flex">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                            </svg>
                            <span class="pl-3">Keluar</span>
                        </div>

                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
