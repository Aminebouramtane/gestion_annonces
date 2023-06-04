<?php

namespace App\Policies;

use App\Models\Annonce;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnnoncePolicy
{
   
   public function before(){
        if(auth()->user()->role=="admin"){
            return true;
        }
        return null;
   }
   
   
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
         return $user->role=="moderateur";
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Annonce $annonce)
    {
         return $user->role=="moderateur";
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
     return   $user->role=="annonceur";
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Annonce $annonce)
    {
        return $user->id==$annonce->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Annonce $annonce)
    {
        return $user->id==$annonce->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Annonce $annonce)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Annonce $annonce)
    {
        //
    }

    public function changer_etat(User $user){
        return $user->role=="moderateur";
    }
}
