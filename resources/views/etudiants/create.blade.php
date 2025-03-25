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
<form action="{{ route('etudiants.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="form-group">
        <label for="image">Photo</label>
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}">
        @error('prenom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="date_naissance">Date de Naissance</label>
        <input type="date" name="date_naissance" id="date_naissance" class="form-control @error('date_naissance') is-invalid @enderror" value="{{ old('date_naissance') }}">
        @error('date_naissance')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="genre">Genre</label>
        <select name="genre" id="genre" class="form-control @error('genre') is-invalid @enderror">
            <option value="Homme" {{ old('genre') == 'Homme' ? 'selected' : '' }}>Homme</option>
            <option value="Femme" {{ old('genre') == 'Femme' ? 'selected' : '' }}>Femme</option>
        </select>
        @error('genre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="niveau_etude">Niveau d'Étude</label>
        <input type="text" name="niveau_etude" id="niveau_etude" class="form-control @error('niveau_etude') is-invalid @enderror" value="{{ old('niveau_etude') }}">
        @error('niveau_etude')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
</div>
</body>
</html>