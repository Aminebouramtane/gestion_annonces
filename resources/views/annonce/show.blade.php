@extends("template.master")
@section("titre", "Liste des annonces")
@section("contenu")
    @isset($annonce)
        <h2>Détails de l'annonce numéro {{ $annonce->id }}</h2>
        Titre : <b> {{ $annonce->titre }}</b><br>
        Description : <b> {{ $annonce->description }}</b> <br>
        Prix : <b> {{ $annonce->prix }}</b> dhs<br>
        Etat : <b> {{ $annonce->neuf? "Neuf": "Ancien" }}</b>
    @endisset
@endsection