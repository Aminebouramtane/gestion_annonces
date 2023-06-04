<?php

namespace App\Http\Controllers\Annonceur;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnonceRequest;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
             $annonces=Annonce::where('etat', 'validé')
                        ->orWhere('user_id', Auth::id())
                        ->get();
        }else{
              $annonces=Annonce::where('etat', 'validé')->get();
        }
      
        return view("annonce.index", compact("annonces"));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', App\Models\Annonce::class);
        return view("annonce.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnonceRequest $request)
    { 
         $this->authorize('create', App\Models\Annonce::class);
        $file=$request->photo;
        $path= $file?->store("photos");

        $data=$request->all();

        $data["photo"]=$path;
        $data["user_id"]=Auth::id();
        $data["etat"]="en cours";

        Annonce::create($data);
        return redirect()->route('annonce.index')->with("success", "L'ajout de la nouvelle annonce a bien réussi!");

    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        if(isset($annonce))
            return view("annonce.show", compact("annonce"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        
        $this->authorize('update', $annonce );
        if(isset($annonce))
            return view("annonce.edit", compact("annonce"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnonceRequest $request, Annonce $annonce)
    {

        $this->authorize('update', $annonce );
       $file=$request->photo;
        $path= $file?->store("photos");

        $data=$request->all();

        $data["photo"]=$path;
        $data["user_id"]=Auth::id();
        $data["etat"]="en cours"; 

        if(isset($annonce->photo))
            Storage::delete($annonce->photo);

        $annonce->update($data);
          return redirect()->route('annonce.index')->with("success", "La modification de l'annonce a bien réussi!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
         $this->authorize('delete', $annonce );
         if(isset($annonce->photo))
            Storage::delete($annonce->photo);

        $annonce->delete();
        return redirect()->route('annonce.index')->with("success", "La suppression de l'annonce a bien réussi!");

    }
}
