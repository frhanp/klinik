@if (session('success'))
    <div class="mb-4 rounded-md bg-green-100 p-4 text-sm font-medium text-green-800" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 rounded-md bg-red-100 p-4 text-sm font-medium text-red-800" role="alert">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 rounded-md bg-red-100 p-4 text-sm font-medium text-red-800">
        <p class="font-bold">Terjadi kesalahan:</p>
        <ul class="list-inside list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif