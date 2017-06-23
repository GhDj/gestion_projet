<?php 

namespace App\Http\Controllers;

use App\Commentaire;
use App\Equipe;
use App\Modules;
use App\Projet;
use App\Tache;
use App\TacheEquipe;
use App\TacheUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TacheController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  { $taches=Tache::all();
      return view('taches.index')->with('taches',$taches);

  }

  public function listeTaches($id){
        $taches = taches::where('id_module','=',$id)->get();
        return view('taches.index')->with('taches',$taches);
    }
    


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($id)
  {
      if (Auth::check()) {
          if (Auth::user()->role == 1)
              $module=Modules::findOrFail($id);

          $projet = Projet::where('id','=',$module->id_projet)->first();
          $equipe=Equipe::where('id','=',$projet->id_equipe)->first();
          //dd($equipe);
          return view('taches.create')->with(["module"=> $module,
                                            "equipe"=>$equipe


          ]);

      }
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

      $t=Tache::create($request->all());
      $e=new TacheUser();
      $e->id_user=$request->input("id_user");
      $e->id_tache=$t->id;

      $e->save();
      //return redirect()->route('tache.show',['id'=>$t->id]);
      return back();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $tache=Tache::findOrFail($id);
      $module=Modules::where('id_projet','=',$tache->id)->get();
      $user=User::where('role','=',2 )->get();
      $equipe=Equipe::all();
      $tacheequipe=TacheUser::where('id_tache','=',$id)->first();
      $commentaire=Commentaire::all();
      //dd($commentaire);
     // dd($tacheequipe);
      return view("taches.show")->with(["tache"=>$tache,
          "module"=>$module,
          "user"=>$user,
          "equipe"=>$equipe,
          "tacheequipe"=>$tacheequipe,
          "commentaire"=>$commentaire,
          "id"=>$id
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $tache=Tache::findOrfail($id);
      $equipe=Equipe::all();
      $tacheequipe=TacheEquipe::where('id_tache','=',$tache->id)->first();

      return view('taches.tache')->with(['tache'=>$tache,
                                         'equipe'=>$equipe,
                                        'tacheequipe'=>$tacheequipe
      ]);


  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, Request $request)
  {
      $tache=Tache::findOrFail($id);
      $tache->nomTache=$request->input('nomTache');
      $tache->description_tache=$request->input('description_tache');
      $tache->duree=$request->input('duree');
      $tache->statut_tache=$request->input('statut_tache');
      $tache->date_debut_tache=$request->input('date_debut_tache');
      $tache->date_fin_tache=$request->input('date_fin_tache');
      $tache->cout=$request->input('cout');
      $tache->priorite=$request->input('priorite');

      $tacheequipe=TacheEquipe::where('id_tache','=',$id)->first();
      //dd($tacheequipe);
      $tacheequipe->id_equipe=$request->input('id_equipe');
      $tacheequipe->save();




      $tache->save();
      return redirect()->route('tache.show',['id'=>$tache->id]);

  }

    public function update_stat($id)
    {
        $tache=Tache::findOrFail($id);
        if ($tache->statut_tache == 0)
        {
            $tache->statut_tache= 1;
        } else {
            $tache->statut_tache= 0;
        }

        $tache->save();
        return back();

    }
        /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

    public function rechercheTache(Request $request){
        $mot=$request->input('recherche');
        //dd($mot);
        /* $p=Projet::where('nomProjet','like','%.$mot.%')
             ->orderBy('nomProjet')
             ->paginate(20);*/
        $tache = Tache::search($mot)->get();
        return view("tache.recherche")->with('tache',$tache);
    }
  
}

?>