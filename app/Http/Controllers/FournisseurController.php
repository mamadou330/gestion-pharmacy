<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::all(); 

        
        return view('components.fournisseur', compact('fournisseurs'));
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
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'address' => 'nullable|string|min:3|max:255',
            'phone' => ['required', 'string', 'min:9', 'max:255', Rule::unique('fournisseurs')],
            'email' => 'nullable|email|string|min:3|max:255'
        ]);
        
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|min:3|max:255',
        //     // 'address' => 'nullable|string|min:3|max:255',
        //     'phone' => ['required', 'string', 'min:9', 'max:255', Rule::unique('fournisseurs')],
        //     // 'email' => 'nullable|email|string|min:3|max:255'
        // ]);

        // if (!$validator->passes()) {
        //     return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
            
        // } else {
        //     $fournisseur = Fournisseur::firstOrcreate(
        //         ['name' => $request->name, 'phone' => $request->phone],
        //         ['address' => $request->address, 'email' => $request->email]
        //     );

        //     if ($fournisseur) {
        //         return response()->json($fournisseur, ['code' => 1, 'msg' => "Succcès, Votre founisseur a bien été enregistré"]);
        //     } else {           
        //         return response()->json(['code' => 0, 'msg' => "Erreur lors de l'enregistrement du fournisseur"]);
        //     }
            
        // }
        
        $fournisseur = Fournisseur::create($request->only('name', 'phone', 'address', 'email'));
        return response()->json($fournisseur);
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);

        return response()->json($fournisseur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'address' => 'nullable|string|min:3|max:255',
            'phone' => ['required', 'string', 'min:9', 'max:255'],
            'email' => 'nullable|email|string|min:3|max:255'
        ]);
        
        $fournisseur = Fournisseur::findOrFail($request->id);

        $fournisseur->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return response()->json($fournisseur);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);

        $fournisseur->delete();
        return response()->json(['success' => 'Record has been deleted']);
        
    }


    public function getAllFournisseur() 
    {
        $fournisseurs = Fournisseur::latest()->get(); 
        
        return response()->json($fournisseurs);
    }
}
