<?php

use App\Models\Categorie;
use App\Models\Option;
use App\Models\Produit;
use Illuminate\Support\Facades\Route;

if(!function_exists('page_title')) {
    function page_title($title) {
        $base_title = config('app.name') ;
        return empty($title) ? $base_title : $title .' | '. $base_title;
    }
}

if(!function_exists('page_active')) {
    function page_active($route) {
        return Route::is($route) ? 'active' : '';
    }
}

if(!function_exists('get_unite')) {
    function get_unite($produit) {
        $product_unite = Produit::select('unite')
                        ->where('produit', $produit)
                        ->first();

        $unite = Option::select('name')
            ->where([
                ['unite', true],
                ['id', $product_unite ? $product_unite->unite : null]
            ])->first();

        return $unite ? $unite->name : null;
    }
}

if (!function_exists('get_categorie_produit')) {
    
    function get_categorie_produit($id)
    {
        $product_categorie = Produit::select('categorie_id')
                        ->where('id', $id)
                        ->first();

        $categorie = Categorie::select('categorieName')
            ->where([
                ['id', $product_categorie ? $product_categorie->categorie_id : null]
            ])->first();
        
        dd($categorie);
        return $categorie ? $categorie->Categoriename : null;


        
    }
}

