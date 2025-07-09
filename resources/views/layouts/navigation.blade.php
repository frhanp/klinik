<aside class="h-full flex flex-col md:h-screen md:sticky md:top-0">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-200">
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-800">
            Klinik Gigi
        </a>
    </div>

    <!-- Nav Links -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        @if (Auth::user()->peran == 'admin')
            {{-- Menu untuk Admin --}}
            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.dokter.index')" :active="request()->routeIs('admin.dokter.*')">
                {{ __('Kelola Dokter') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.jadwal.index')" :active="request()->routeIs('admin.jadwal.*')">
                {{ __('Kelola Jadwal') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.pemesanan.index')" :active="request()->routeIs('admin.pemesanan.*')">
                {{ __('Kelola Pemesanan') }}
            </x-nav-link>

        @elseif (Auth::user()->peran == 'dokter')
            {{-- Menu untuk Dokter --}}
            <x-nav-link :href="route('dokter.dashboard')" :active="request()->routeIs('dokter.dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('dokter.jadwal.index')" :active="request()->routeIs('dokter.jadwal.*')">
                {{ __('Jadwal Saya') }}
            </x-nav-link>

        @elseif (Auth::user()->peran == 'pasien')
            {{-- Menu untuk Pasien --}}
            <x-nav-link :href="route('pasien.dashboard')" :active="request()->routeIs('pasien.dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('pasien.pemesanan.create')" :active="request()->routeIs('pasien.pemesanan.create')">
                {{ __('Buat Pemesanan Baru') }}
            </x-nav-link>
            <x-nav-link :href="route('pasien.pemesanan.index')" :active="request()->routeIs('pasien.pemesanan.index')">
                {{ __('Riwayat Pemesanan') }}
            </x-nav-link>
        @endif
    </nav>
    
    <!-- User Dropdown -->
    <div class="px-4 py-4 border-t border-gray-200">
        <div x-data="{ open: false }" class="relative">
            <!-- Tombol Dropdown -->
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-left bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span>{{ Auth::user()->name }}</span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Menu Dropdown (muncul ke atas) -->
            <div x-show="open" 
                 @click.away="open = false" 
                 x-cloak 
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute bottom-full w-full mb-2 bg-white rounded-md shadow-lg border text-sm text-gray-700">
                
                <a href="{{ route('profile.edit') }}"
                    class="block w-full text-left px-4 py-2 hover:bg-gray-100 rounded-t-md">
                    {{ __('Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 hover:text-red-700 rounded-b-md">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>