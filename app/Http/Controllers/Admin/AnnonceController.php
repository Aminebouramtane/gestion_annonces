<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnonceRequest;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    
    public function __construct()
    {
        $this->authorizeResource(Annonce::class);
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $annonces=Annonce::all();
        return view("admin.annonce.index", compact("annonces"));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("annonce.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnonceRequest $request)
    { 
        $file=$request->photo;
        $path= $file?->store("photos");

        $data=$request->all();

        $data["photo"]=$path;
      
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
       return view("annonce.edit", compact("annonce"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnonceRequest $request, Annonce $annonce)
    {
       $file=$request->photo;
        $path= $file?->store("photos");

        $data=$request->all();

        $data["photo"]=$path;
         
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
         if(isset($annonce->photo))
            Storage::delete($annonce->photo);

        $annonce->delete();
        return redirect()->route('annonce.index')->with("success", "La suppression de l'annonce a bien réussi!");

    }

    public function changer_etat(Request $request){
       $this->authorize('changer_etat', App\Models\Annonce::class);

        $etat="en cours";
        if($request->has("valider")){
            $etat="validé";
        }elseif($request->has("signaler")){
            $etat="signalé";
        }

        $ids=$request->ids;
        foreach($ids as $id){
                $annonce=Annonce::find($id);
                // $annonce->etat="validé";
                // $annonce->save();
                $annonce->update(["etat"=>$etat]);
            }

        return redirect()->route("admin.annonce.index")->with("success", "Changement d'état réussi!");
    }
}
