@extends('layouts.default')
@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-10 mx-auto">
            <div class="lg:w-3/4 w-full mx-auto overflow-auto bg-white rounded px-2">
                <div class="flex items-center justify-between mb-2 p-2 border-b border-gray-200">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Editar produto</h1>
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.product.update', $product->id) }}">
                    @csrf &#013;
                    @method('PUT') &#013;
                    <div class="flex flex-wrap">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Nome do Produto</label>
                                <input type="text" id="name" name="name" 
                                    value="{{ old('name', $product->name) }}"
                                    class="w-full px-2 py-1 bg-gray-50 border border-gray-300 rounded focus:border-indigo-500 focus:bg-white focus:outline-none text-sm text-gray-800 placeholder-gray-300">
                            </div>
                            @error('name')
                                <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Preço</label>
                                <input type="text" id="price" name="price"
                                    value="{{ old('price', $product->price) }}"
                                    class="w-full px-2 py-1 bg-gray-50 border border-gray-300 rounded focus:border-indigo-500 focus:bg-white focus:outline-none text-sm text-gray-800 placeholder-gray-300" />
                            </div>
                            @error('price')
                                <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Estoque</label>
                                <input type="text" id="stock" name="stock"
                                    value="{{ old('stock', $product->stock) }}"
                                    
                                    class="w-full px-2 py-1 bg-gray-50 border border-gray-300 rounded focus:border-indigo-500 focus:bg-white focus:outline-none text-sm text-gray-800 placeholder-gray-300"
                                    >
                                    
                            </div>
                            @error('stock')
                                <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                                <input type="file" id="cover" name="cover"
                                    class="w-full px-2 py-1 bg-gray-50 border border-gray-300 rounded focus:border-indigo-500 focus:bg-white focus:outline-none text-sm text-gray-800 placeholder-gray-300" />
                            </div>
                            @error('cover')
                                <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        @if ($product->cover)                        
                        <div class="p-2 w-64">
                            <img src="{{ Illuminate\Support\Facades\Storage::url($product->cover) }}">
                            <a href="{{ route('admin.product.destroyImage',$product->id) }}" 
                                class="mt-3 w-full text-sm text-red-900 bg-red-200 py-1 px-2 focus:outline-none hover:bg-red-300 rounded inline-flex ">Remover imagem</a>
                        </div>
                        @endif

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                                <textarea
                                    id="description" name="description"
                                    class="w-full px-2 py-1 bg-gray-50 border border-gray-300 rounded focus:border-indigo-500 focus:bg-white focus:outline-none text-sm text-gray-800 placeholder-gray-300">{{ old('description', $product->description) }}</textarea>
                            </div>
                            @error('description')
                                <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Rodapé do Formulário -->
                        <div class="px-2 pt-2 pb-4 w-full">
                            <a href="{{ route('admin.products') }}" 
                                class="text-gray-600 bg-gray-200 py-2 px-3 mr-2 focus:outline-none hover:bg-gray-300 rounded inline-flex ">Cancelar</a>
                            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Salvar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection