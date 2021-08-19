<?php

namespace App\Http\Controllers;

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

        $products = Produit::with(['categorie', 'famille', 'option'])->get();
        
        $unites = Option::where([
            ['unite', true]
        ])->orderBy('name')->get();
        
        return view('components.produit', compact('products', 'categories', 'familles', 'unites'));
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
    public function store(Request $request)
    {
        // dd($request);
        
        $request->validate([
            'produit' => 'required|string|min:2|max:255',
            'description' => 'nullable|string|min:2|max:255',
            'unite' =>  'nullable|integer',
            'categorie' => 'nullable|integer',
            'famille' => 'nullable|integer',
            'date_production' => 'required|date|before:date_peremption',
            'date_peremption' => 'required|date|after:date_production'
        ]);

        $produit = Produit::create([
            'name' => $request->produit,
            'description' => $request->description,
            'unite_id' => $request->unite,
            'categorie_id' => $request->categorie,
            'famille_id' => $request->famille,
            'date_production' => $request->date_production,
            'date_peremption' => $request->date_peremption
        ]);

        // $produit->replicate();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
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
}
