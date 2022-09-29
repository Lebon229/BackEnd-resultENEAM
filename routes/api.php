<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\UEController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\ReclamationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);
});

Route::group(['middleware' => 'api'], function($router) {
    Route::get('/ues', [UEController::class, 'index']);
    Route::post('/ue', [UEController::class, 'store']);
    Route::get('/ue/{id}', [UEController::class, 'show']);
    Route::put('/ue/{id}', [UEController::class, 'update']);
    Route::delete('/ue/{id}', [UEController::class, 'destroy']);
}); 

Route::group(['middleware' => 'api'], function($router) {
    Route::get('/etudiants', [EtudiantController::class, 'index']);
    Route::post('/etudiant', [EtudiantController::class, 'store']);
    Route::get('/etudiant/{id}', [EtudiantController::class, 'show']);
    Route::put('/etudiant/{id}', [EtudiantController::class, 'update']);
    Route::delete('/etudiant/{id}', [EtudiantController::class, 'destroy']);
    Route::delete('/etudiant/{id}', [EtudiantController::class, 'destroy']);
    Route::get('/affichage/{id}', [EtudiantController::class, 'display']);

}); 

Route::group(['middleware' => 'api'], function($router) {
    Route::get('/note', [NoteController::class, 'index']);
    Route::post('/note', [NoteController::class, 'store']);
    Route::get('/note/{id}', [NoteController::class, 'show']);
    Route::put('/note/{id}', [NoteController::class, 'update']);
    Route::delete('/note/{id}', [NoteController::class, 'destroy']);
}); 

Route::group(['middleware' => 'api'], function($router) {
    Route::get('/filieres', [FiliereController::class, 'index']);
    Route::post('/filiere', [FiliereController::class, 'store']);
    Route::get('/filiere/{id}', [FiliereController::class, 'show']);
    Route::put('/filiere/{id}', [FiliereController::class, 'update']);
    Route::delete('/filiere/{id}', [FiliereController::class, 'destroy']);
});

Route::group(['middleware' => 'api'], function($router) {
    Route::get('/reclamations', [ReclamationController::class, 'index']);
    Route::post('/reclamation', [ReclamationController::class, 'store']);
    Route::get('/reclamation/{id}', [ReclamationController::class, 'show']);
    Route::put('/reclamation/{id}', [ReclamationController::class, 'update']);
    Route::delete('/reclamation/{id}', [ReclamationController::class, 'destroy']);
    Route::get('/attente/{id}', [ReclamationController::class, 'reclamAttente']); 
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
