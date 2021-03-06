@extends('layout.master')

@section('title', 'Edition d\'un jeu')

@section('navbar')
    @parent
@endsection
@section('content')

{{--
   messages d'erreurs dans la saisie du formulaire.
--}}


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--
     formulaire de saisie d'un jeu
     la fonction 'route' utilise un nom de route.
     '@csrf' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
     '@method('PUT') précise à Laravel que la requête doit être traitée
      avec une commande PUT du protocole HTTP.
  --}}

<form action="{{route('jeux.update',$jeu->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Modification d'un jeu</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- le nom --}}
        <label for="nom"><strong>Nom :</strong></label>
        <input type="text" class="form-control" id="nom" name="nom"
               value="{{ $jeu->nom }}">
    </div>
    <div>
        {{-- l'age min --}}
        <label for="age_min"><strong>Age_min :</strong></label>
        <input type="number" id="age_min" name="age_min"
               value="{{ $jeu->age_min }}">
    </div>
    <div>
        {{-- le joueur min --}}
        <label for="min_max_joueurs"><strong>Min_max_joueur :</strong></label>
        <input type="number" id="min_max_joueurs" name="min_max_joueurs"
               value="{{ $jeu->min_max_joueurs }}">
    </div>
    <div>
        {{-- la durée min --}}
        <label for="min_max_duree"><strong>Min_max_duree :</strong></label>
        <input type="text" class="form-control" id="min_max_duree" name="min_max_duree"
               value="{{ $jeu->min_max_duree }}">
    </div>
    <div>
        {{-- la description --}}
        <label for="textarea-input"><strong>Description :</strong></label>
        <textarea name="description" id="description" rows="6" class="form-control"
                  placeholder="Description..">{{ $jeu->description }}</textarea>
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>
<form action="{{route('jeux.upload2',$jeu->id)}}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    @csrf
    <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" name="document" id="image">
    </div>
    <input type="submit" value="Télécharger" name="submit">
</form>

@endsection
