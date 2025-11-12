<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Notifikasi') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Semua Notifikasi</h3>
                    <div class="space-y-4">
                        @forelse ($notifikasi as $item)
                            <div classa="p-4 rounded-lg {{ $item->read_at ? 'bg-gray-50' : 'bg-blue-50 border border-blue-200' }}">
                                <p class="text-gray-800">{{ $item->data['pesan'] }}</p>
                                <span class="text-xs text-gray-500">{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">Anda belum memiliki notifikasi.</p>
                        @endforelse
                    </div>
                    <div class="mt-6">{{ $notifikasi->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>