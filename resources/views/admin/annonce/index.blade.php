@extends("template.master")
@section("titre", "Liste des annonces")
@section("contenu")

    @isset($annonces)
        <h2 class="mt-3 mb-2">Liste des annonces</h2>
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{session("success")}}
            </div>
        @endif
        @can('create', App\Models\Annonce::class)
        <a href="{{ route('annonce.create') }}" class="btn btn-primary mb-3">Nouvelle annonce</a>
        @endcan
<form action="{{route('admin.changer_etat')}}" method="post">
    @csrf
    @method('DELETE')
        <table class="table">
            <tr>
                <th>Choisir</th>
                <th>Photo</th>
                <th>Titre</th>
                <th>Annonceur</th>
                <th>Type</th>
                <th>Ville</th>
                <th>Superficie(m<sup>2</sup>)</th>
                <th>Etat</th>
                <th>Prix(dhs)</th>
                <th>Validation</th>
                  @can('create', App\Models\Annonce::class)  
                    <th>Actions</th>
                  @endcan
            </tr>
            @foreach($annonces as $annonce)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" name="ids[]" value="{{$annonce->id}}" class="form-input-check"/>
                    </td>
                    <td>
                        @isset($annonce->photo)
                          <img src="{{ asset($annonce->photo) }}" alt="" width="80px">
                        @else
                         <img src="{{ asset('photos/vide.jpg') }}" alt="" width="80px">
                        @endisset
                    </td>
                    <td> <a href="{{ route('annonce.show',$annonce->id) }}" style="color:gray"> {{ $annonce->titre }}</a>
                {{$annonce->id}}      
                </td>
                    <td>{{ $annonce->user->name }}
                        <p class="small">({{$annonce->user->email}})</p></td>
                    <td>{{ $annonce->type }}</td>
                    <td>{{ $annonce->ville }}</td>
                    <td>{{ $annonce->superficie }}</td>
                    <td>{{ $annonce->neuf? "Neuf":"Ancien" }}</td>
                    <td>{{ $annonce->prix }}</td>
                    <td>{{ $annonce->etat }}</td>
                @can(['update', 'delete'], $annonce) 
                  <td>
                         <a href="{{ route('annonce.edit',$annonce->id) }}" style="color:blue"><i class="bi bi-pencil"></i></a>
                         button type="submit" style="color:red" class="btn border-none" formaction="{{ route('annonce.destroy',$annonce->id) }}"
                         onclick="return confirm('Voulez vous vraiment supprimer l\'annonce : {{$annonce->titre }}?')"
                         ><i class="bi bi-trash2"></i></button>
                    </td> 
                    @endcan
                
                </tr>
            @endforeach

        </table>
<button type="submit" name="valider" class="btn btn-primary">Valider</button>
<button type="submit" name="signaler" class="btn btn-danger">Signaler</button>
        </form>
    @endisset
@endsection