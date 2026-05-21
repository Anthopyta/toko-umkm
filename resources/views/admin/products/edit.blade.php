<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Produk') }}: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg sm:p-8">
                <form action="{{ route('admin.products.update', $product) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    @include('admin.products._form', [
                        'product' => $product,
                        'categories' => $categories,
                    ])

                    <div class="mt-6 flex items-center justify-end gap-3">
                        <a href="{{ route('admin.products.index') }}"
                           class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition hover:bg-gray-50">
                            Batal
                        </a>
                        <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
