<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('user', 'userController');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/projet/modules/{id}', 'ModulesController@listeModule');
Route::get('/projet/modules/create/{id}', 'ModulesController@create');
Route::get('/projet/modules/tache/create/{id}', 'TacheController@create');
Route::get('/projet/modules/tache/materiel/create/{id}', 'materielController@create');
Route::get('/projet/modules/tache/logistique/create/{id}', 'logistiqueController@create');
Route::get('/projet/modules/tache/consommable/create/{id}', 'consommableController@create');






Route::resource('projet', 'projetController');
Route::resource('service', 'serviceController');
Route::resource('modules', 'modulesController');
Route::resource('tache', 'tacheController');
Route::resource('equipe', 'equipeController');
Route::resource('equipeUser', 'equipeUserController');
Route::resource('materiel', 'materielController');
Route::resource('logistique', 'logistiqueController');
Route::resource('consommable', 'consommableController');
Route::resource('tacheUser', 'tacheUserController');
Route::resource('tacheEquipe', 'tacheEquipeController');
Route::resource('reunion', 'reunionController');
Route::resource('reunionUser', 'reunionUserController');
Route::resource('commentaire', 'commentaireController');
Route::resource('chat', 'chatController');
Route::resource('notification', 'notificationController');


//Route::post('rechercheProjet', 'projetController@rechercheP');
Route::post('rechercheProjet','projetController@rechercheP');
Route::post('rechercheUser','userController@rechercheUser');
Route::post('rechercheTache','tacheController@rechercheTache');

Route::post('rechercheMsg','chatController@rechercheMsg');
Route::post('rechercheChat','chatController@rechercheUser');
Route::get('liste','chatController@liste');
Route::get('discussion/{id}','chatController@discussion');




/*Route::get('/search', function (Request $request) {
    return App\Projet::search(\Illuminate\Support\Facades\Input::get('search'))->get();
});*/




Route::get('/test',function (){
   return view('index');
});















