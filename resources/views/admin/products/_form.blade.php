@props(['product' => null, 'categories'])

<div class="space-y-6">
    <div>
        <x-input-label for="category_id" :value="__('Kategori')" />
        <select id="category_id"
                name="category_id"
                required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                        @selected(old('category_id', $product?->category_id) == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="name" :value="__('Nama Produk')" />
        <x-text-input id="name"
                      type="text"
                      name="name"
                      :value="old('name', $product?->name)"
                      required
                      class="mt-1 block w-full"
                      placeholder="Contoh: Indomie Goreng" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
            <x-input-label for="price" :value="__('Harga (Rp)')" />
            <x-text-input id="price"
                          type="number"
                          name="price"
                          :value="old('price', $product?->price)"
                          min="0"
                          step="100"
                          required
                          class="mt-1 block w-full"
                          placeholder="3500" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="stock" :value="__('Stok')" />
            <x-text-input id="stock"
                          type="number"
                          name="stock"
                          :value="old('stock', $product?->stock ?? 0)"
                          min="0"
                          required
                          class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>
    </div>
</div>
