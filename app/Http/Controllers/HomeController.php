<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        // Neste exemplo não vai dar erro, caso o campo search esteva vazio, pois devido ter concatenado
        // uma expressão '% + campo + %'
        //$products = Product::where('name', 'like', '%' . $request->search . '%')->get();
        
        /*$products = Product::query();
        if($request->search){
            $products = Product::where('name', 'like', '%' . $request->search . '%')->get();
        }else{
            $products = $products->get();
        }*/


        
        /* WHEN -> Quando
        |  O método When irá realizar a consulta que está no segundo parâmetro dentro da function,
        |  somente se existir o primeiro parâmetro, aqui no caso, só se existir uma request,
        |  ou seja, se foi preenchido o campo search.
        |  Se não, passa direto sem realizar a consulta, e realiza $products->get()
        */
        $products = Product::query();
        $products->when($request->search, function ($query, $vl){
            $query->where('name', 'like', '%' . $vl . '%');
        });
        $products = $products->get();


        return view('home',[
            'products' => $products
        ]);
    }
}
