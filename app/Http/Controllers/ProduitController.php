<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Categorie;
use App\Models\Famille;
use App\Models\Option;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::orderBy('CategorieName')->get();

        $familles = Famille::orderBy('FamilleName')->get();

        $produits = Produit::with(['categorie', 'famille', 'option'])->latest()->get();
        
        $unites = Option::where([
            ['unite', true]
        ])->orderBy('name')->get();
        
        return view('components.produit', compact('produits', 'categories', 'familles', 'unites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        // $request->validate([
        //     'produit' => 'required|string|min:2|max:255',
        //     'description' => 'nullable|string|min:2|max:255',
        //     'unite' =>  'nullable|integer',
        //     'categorie' => 'nullable|integer',
        //     'famille' => 'nullable|integer',
        //     'date_production' => 'required|date|before:date_peremption',
        //     'date_peremption' => 'required|date|after:date_production' 
        // ]);
        
        // if(!$data) {
        //     return response()->json('errors', $data);
        // }
        
        // $produit = Produit::create([
        //     'produit' => $request->produit,
        //     'description' => $request->description,
        //     'unite' => $request->unite,
        //     'date_production' => $request->date_production,
        //     'date_peremption' => $request->date_peremption
        // ]);

        $produit = Produit::create($request->only(
            'produit', 'description', 'date_production', 'date_peremption')
        );
        return response()->json($produit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return response()->json($produit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
    }

    public function getAllProducts() 
    {
        $produits = Produit::with(['categorie', 'famille', 'option'])->latest()->get();

        return response()->json($produits);
    }
}
