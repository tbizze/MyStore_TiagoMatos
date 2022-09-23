<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products', compact('products'));
        /*return view('admin.products',[
            'products' => $products
        ]);*/
    }
    // Mostrar a página de editar
    public function edit(Product $product){
        return view('admin.product_edit',[
            'product' => $product
        ]);
    }

    // Recebe requisição para dar Update => PUT
    public function update(Product $product, ProductStoreRequest $request){
        $input = $request->validated();

        $input['slug'] = Str::slug($input['name']);

        if (!empty($input['cover']) && $input['cover']->isvalid()){
            Storage::delete($product->cover ?? '');
            $file = $input['cover'];
            $path = $file->store('public/products');
            $input['cover'] = $path;
        }

        $product->fill($input);
        $product->save();

        //dd($input);
        return Redirect::route('admin.products');
    }

    // Mostrar página de criar
    public function create(){
        return view('admin.product_create');
    }

    // Recebe requisição de criar => POST
    public function store(ProductStoreRequest $request){
        $input = $request->validated();

        $input['slug'] = Str::slug($input['name']);

        if (!empty($input['cover']) && $input['cover']->isvalid()){
            $file = $input['cover'];
            $path = $file->store('public/products');
            $input['cover'] = $path;
            //dd($path);
        }

        //dd($input);
        Product::create($input);

        return Redirect::route('admin.products');
    }

    public function destroy(Product $product){
        
        $product->delete();
        Storage::delete($product->cover ?? '');
        return Redirect::route('admin.products');
    }

    public function destroyImage(Product $product){
        Storage::delete($product->cover ?? '');
        $product->cover = null;
        $product->save();
        
        return Redirect::back();
    }
}
