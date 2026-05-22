@extends('layouts.public')

@section('title', 'Katalog Produk')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Katalog Produk</h1>
        <p class="mt-2 text-gray-600">Belanja kebutuhan sehari-hari dengan mudah.</p>
    </div>

    @if ($products->isEmpty())
        <div class="rounded-lg bg-white p-12 text-center shadow-sm">
            <p class="text-gray-500">Belum ada produk tersedia.</p>
        </div>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product) }}"
                   class="group block overflow-hidden rounded-lg bg-white shadow-sm transition hover:shadow-md">
                    <div class="aspect-square bg-gray-100">
                        @if ($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-gray-300">
                                <svg class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="p-4">
                        <p class="text-xs font-medium uppercase tracking-wide text-indigo-600">
                            {{ $product->category->name }}
                        </p>
                        <h3 class="mt-1 line-clamp-2 text-sm font-semibold text-gray-900 group-hover:text-indigo-600">
                            {{ $product->name }}
                        </h3>
                        <p class="mt-2 text-lg font-bold text-gray-900">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <p class="mt-1 text-xs text-gray-500">
                            Stok: {{ $product->stock }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

        @if ($products->hasPages())
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @endif
    @endif
@endsection
