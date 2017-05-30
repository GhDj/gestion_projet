<?php 

namespace App\Http\Controllers;

use App\Documents;
use App\Equipe;
use App\Modules;
use App\Projet;
use App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class projetController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      if(Auth::check()){
        if (Auth::user()->role==1){
          $projet = Projet::paginate('10');
          return view('projet.index')->with('projet',$projet);

        }
        }else{
          return redirect('home');
      }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      if (Auth::check()){
          if (Auth::user()->role==1)
              $service= Service::all();
                $equipe=Equipe::all();
                return view('projet.create')->with(['service'=>$service,
                                                    'equipe'=>$equipe


                ]);
    
  }else
      return back();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store( Request $request)
  {

       // request()->file('fichier')->storeAs('fichiersProjet',request()->file('fichier')->getClientOriginalName());


    /*  $projet=Projet::create([
          'nomProjet' => $request->input('nomProjet'),
          'description' => $request->input('description'),
          'budget' => $request->input('budget'),
          'date_debut' => $request->input('date_debut'),
          'date_fin' => $request->input('date_fin'),
          'lieu' => $request->input('lieu'),
          'id_user' => $request->input('id_user'),
          'id_service' => $request->input('id_service'),
          'id_equipe' => $request->input('id_equipe'),
          'etat' => 1

      ]);*/
    $projet=new Projet();
    $projet->nomProjet= $request->input('nomProjet');
    $projet->description=$request->input('description');
    $projet->budget=$request->input('budget');
    $projet->date_debut=$request->input('date_debut');
    $projet->date_fin=$request->input('date_fin');
    $projet->lieu=$request->input('lieu');
    $projet->id_user=$request->input('id_user');
    $projet->id_service=$request->input('id_service');
    if ($projet->budget>=200000)
        $projet->type="Appel d'offre";
    else
        $projet->type="Consultation";

    $projet->id_equipe=$request->input('id_equipe');
    $projet->etat=1;

    $projet->save();

      $files=$request->file('fichier');
      foreach ($files as $f)
      {
          $f->storeAs('fichiersProjet',$f->getClientOriginalName(),'public');
          Documents::create([
              'nom_doc'=>$f->getClientOriginalName(),
              'type_doc'=>$f->getClientOriginalExtension(),
              'url_doc'=>$f->getClientOriginalName(),
              'id_projet'=>$projet->id



          ]);
      }


      return redirect('home');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $projet=Projet::findOrFail($id);
      $documents=Documents::where('id_projet','=',$projet->id)->get();
      $module=Modules::where('id_projet','=',$projet->id)->get();
      return view("projet.show")->with(["projet"=>$projet,
                                        "document"=>$documents,
                                        "module"=>$module
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
      $projet = Projet::findOrFail($id);
      return view('projet.projet')->with(['projet' => $projet
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
      $p=Projet::findOrFail($id);
      $p->nomProjet=$request->input("nomProjet");
      $p->description=$request->input("description");
      $p->budget=$request->input("budget");
      $p->date_debut=bcrypt($request->input('date_debut'));
      $p->date_fin=$request->input("date_fin");
      $p->lieu=$request->input("lieu");
      $p->id_service=$request->input("id_service");
        $p->etat = $request->input("etat");


      $p->save();

     return redirect('projet');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $u = Projet::where('id','=',"$id")->first();
      $u->delete();
      return back();
  }

  public function rechercheP(Request $request){
      $mot=$request->input('recherche');
      //dd($mot);
     /* $p=Projet::where('nomProjet','like','%.$mot.%')
          ->orderBy('nomProjet')
          ->paginate(20);*/
     $p = Projet::search($mot)->get();
    return $p;
  }
}


?>