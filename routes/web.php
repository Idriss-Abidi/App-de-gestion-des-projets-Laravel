<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test',function(){return view("test");})->name('test')->middleware(['auth2', 'nocache']);
Route::get('/', [LoginController::class, 'show'])->name('LoginForm');
Route::post('/Login', [LoginController::class, 'login'])->name('login');
Route::post('/Signup', [LoginController::class, 'signup'])->name('signup');
Route::get('/Logout', [LoginController::class, 'logout'])->name('Logout')->middleware(['auth2', 'nocache']);
Route::get('/Accueil', [AccueilController::class, 'index'])->name('Accueil')->middleware(['auth2', 'nocache']);
Route::get('/SectionA', [ProjetController::class, 'index'])->name('SectionA')->middleware(['auth2', 'nocache']);
Route::post('/SectionA/AjouterProjet', [ProjetController::class, 'add'])->name('Projet.add')->middleware(['auth2', 'nocache']);
Route::get('/Projet/{projet}', [ActionController::class, 'index'])->name('Projet.Actions')->middleware(['auth2', 'nocache']);
Route::post('/Projet/Modifier', [ProjetController::class, 'edit'])->name('Projet.edit')->middleware(['auth2', 'nocache']);
Route::post('/Projet/Suppression', [ProjetController::class, 'delete'])->name('Projet.delete')->middleware(['auth2', 'nocache']);
Route::post('/Action/creation', [ActionController::class, 'add'])->name('Action.add')->middleware(['auth2', 'nocache']);
Route::post('/Action/Modification', [ActionController::class, 'edit'])->name('Action.edit')->middleware(['auth2', 'nocache']);
Route::post('/Membre/ajout', [ActionController::class, 'addMembre'])->name('Membre.add')->middleware(['auth2', 'nocache']);
Route::post('/Membre/Suppression', [ActionController::class, 'deleteMembre'])->name('Membre.delete')->middleware(['auth2', 'nocache']);
Route::post('/Action/Suppression', [ActionController::class, 'delete'])->name('Action.delete')->middleware(['auth2', 'nocache']);
Route::post('/Commentaire/add', [ActionController::class, 'addComment'])->name('Comment.add')->middleware(['auth2', 'nocache']);
// Route::post('/OpenAI/add', [OpenAIController::class, 'AddActions'])->name('OpenAI.add')->middleware(['auth2', 'nocache']);
Route::get('/Taches', [TacheController::class, 'index'])->name('SectionB')->middleware(['auth2', 'nocache']);
Route::post('/Tache/creation', [TacheController::class, 'add'])->name('Tache.add')->middleware(['auth2', 'nocache']);
Route::post('/Tache/Modification', [TacheController::class, 'edit'])->name('Tache.edit')->middleware(['auth2', 'nocache']);
Route::post('/Tache/Suppression', [TacheController::class, 'delete'])->name('Tache.delete')->middleware(['auth2', 'nocache']);
Route::get('/Profile', [UtilisateurController::class, 'index'])->name('Profile')->middleware(['auth2', 'nocache']);
Route::post('/Profile/modification', [UtilisateurController::class, 'edit'])->name('Profile.edit')->middleware(['auth2', 'nocache']);

