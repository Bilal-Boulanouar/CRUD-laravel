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
    <h1>Détails de l'Étudiant {{ $etudiant->id }}</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $etudiant->nom }} {{ $etudiant->prenom }}</h3>
        </div>
        <div class="card-body">
            @if($etudiant->image && file_exists(storage_path('app/public/' . $etudiant->image)))
                <div>
                    <strong>Photo:</strong>
                    <img src="{{ asset('storage/' . $etudiant->image) }}" alt="Image de l'étudiant" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @else
                <div>
                    <strong>Photo:</strong>
                    <img src="{{ asset('storage/images/default.jpg') }}" alt="Image par défaut" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
            <p><strong>Email:</strong> {{ $etudiant->email }}</p>
            <p><strong>Date de Naissance:</strong> {{ $etudiant->date_naissance }}</p>
            <p><strong>Genre:</strong> {{ $etudiant->genre }}</p>
            <p><strong>Niveau d'Étude:</strong> {{ $etudiant->niveau_etude }}</p>


        </div>
    </div>

    <br>
    <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
</body>
</html>