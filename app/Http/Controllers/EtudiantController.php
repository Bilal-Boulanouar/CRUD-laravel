<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['nom', 'prenom', 'email', 'date_naissance', 'genre', 'niveau_etude']);

        // Vérification et stockage de l'image
        if ($request->hasFile('image')) {
            // Si une image est envoyée, on la stocke dans 'storage/app/public/etudiants'
            $imagePath = $request->file('image')->store('etudiants', 'public');
        } else {
            // Si aucune image n'est envoyée, on assigne une image par défaut
            $imagePath = 'etudiants/default.jpg'; // Image par défaut
        }

        // Ajouter le chemin de l'image aux données
        $data['image'] = $imagePath;

        // Création de l'étudiant avec les données et l'image
        Etudiant::create($data);

        // Redirection vers la liste des étudiants avec un message de succès
        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        $etudiant = Etudiant::findOrFail($etudiant->id);
        return view('etudiants.show',compact('etudiant'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $etudiant = Etudiant::findOrFail($etudiant->id);
        return view('etudiants.edit',compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant = Etudiant::findOrFail($etudiant->id);

        // Récupérer les données du formulaire sans l'image
        $data = $request->only(['nom', 'prenom', 'email', 'date_naissance', 'genre', 'niveau_etude']);

        // Vérification et gestion de l'image
        if ($request->hasFile('image')) {
            // Si une nouvelle image est téléchargée, on la stocke
            $imagePath = $request->file('image')->store('etudiants', 'public');
        } else {
            // Si aucune image n'est téléchargée, on conserve l'ancienne image
            $imagePath = $etudiant->image;
        }

        // Ajouter le chemin de l'image aux données
        $data['image'] = $imagePath;

        // Mettre à jour l'étudiant avec les nouvelles données
        $etudiant->update($data);

        // Redirection avec message de succès
        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant = Etudiant::findOrFail($etudiant->id);

        // Supprimer l'étudiant de la base de données
        $etudiant->delete();

        // Rediriger avec un message de succès
        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }
}
