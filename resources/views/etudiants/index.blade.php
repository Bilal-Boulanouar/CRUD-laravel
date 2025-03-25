<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h2 class="mb-4">Liste des Étudiants</h2>
    
    <a href="{{ route('etudiants.create') }}" class="btn btn-primary">Ajouter</a>

    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Date de Naissance</th>
                <th>Genre</th>
                <th>Niveau d'Étude</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant)
            <tr>
                <td>
                    <img src="{{ $etudiant->image_url }}" width="100" alt="Photo de {{ $etudiant->nom }}">
                </td>
                
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->email }}</td>
                <td>{{ $etudiant->date_naissance }}</td>
                <td>{{ $etudiant->genre }}</td>
                <td>{{ $etudiant->niveau_etude }}</td>
                
                <td>

                <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-primary">Modifier</a>
                <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-success">Afficher</a>

                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant {{ $etudiant->id }}?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>