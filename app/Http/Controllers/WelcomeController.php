<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

// TODO-6-0 Ajouter des validations dans "BookController.store"
//      - title : obligatoire, nb de charactère [5; 25]
//      - pages : obligatoire, entier, nombre ]0; 1000[
//      - quantity : obligatoire, entier, nombre [0; 100[
// TODO-6-3 Modifier "BookController.index" pour renvoyer 5 éléments uniquements et un numéro de page (pagination)

// TODO-7-2 Créer une méthode "order" dans le contrôleur "BookController" basé sur la méthode "index" qui
//      renvoie uniquement les livres ayant une quantité <= à 0

// TODO-8-10 Envoyer les auteurs sur la page "create" depuis la méthode "create" de "BookController"
// TODO-8-13 Ajouter la validation du champ auteur dans la méthode "store" de "BookController"

class WelcomeController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('welcome', ['users' => $users]);
    }
}
