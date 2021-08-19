<?php

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
        $product_unite = Produit::select('unite_id')
                        ->where('name', $produit)
                        ->first();

        $unite = Option::select('name')
            ->where([
                ['unite', true],
                ['id', $product_unite ? $product_unite->unite_id : null]
            ])->first();

        return $unite ? $unite->name : null;
    }
}

