<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProjectController extends Controller
{
    /**
     * Afficher la liste des projets disponibles.
     */
    public function index()
    {
        $allProject = Projet::all();

        return view('welcome', [
            'projets' => $allProject
        ]);
    }

    /**
     * Montrer le formulaire d'ajout ou d'enregistrement d'un projet.
     */
    public function create()
    {
        return view();
    }

    /**
     * Enregistrer les informations du nouveau projet dans la base de donnees.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'description' => 'required|string',
            'fond' => 'required|numeric',
            'delai' => 'required|date'
        ]);

        $projet = Projet::create([
            'libelle' => $request['libelle'],
            'description' => $request['description'],
            'fond' => $request['fond'],
            'due_date' => $request['delai'],
        ]);
        
        return redirect()
            ->route('projet.show', ['id' => $projet['id']])
            ->with('success', "Votre projet a été ajouté avec succès");
    }

    /**
     * Afficher un projet specifique.
     */
    public function show(string $id)
    {
        $projet = Projet::findOrFail($id);
        
        return view('', [
            'projet' => $projet
        ]);
    }

    /**
     * Montrer le formulaire d'édition pour un projet specifique
     */
    public function edit(string $id)
    {
        $projet = Projet::findOrFail($id);

        return view('', [
            'projet' => $projet
        ]);
    }

    /**
     * Mettre a jour un projet specifique dans la base de donnees.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'libelle' => 'required|string',
            'description' => 'required|string',
            'fond' => 'required|numeric',
            'delai' => 'required|date'
        ]);

        $projet = Projet::findOrFail($id);

        $projet->update([
            'libelle' => $request['libelle'],
            'description' => $request['description'],
            'fond' => $request['fond'],
            'due_date' => $request['delai']
        ]);

        return back()->with('success', "La mise à jour des informations du projet a été éffectué");
    }

    /**
     * Supprimer un projet de la base de donnees.
     */
    public function destroy(string $id)
    {
        Projet::deleted($id);

        return back()->with('success', "Projet supprimé avec succès !");
    }
}
