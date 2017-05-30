<?php 

namespace App\Http\Controllers;

use App\Materiel;
use App\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
class MaterielController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      if(Auth::check()){
          if (Auth::user()->role==1){
              $materiel = Materiel::paginate('10');
              return view('materiel.index')->with('materiel',$materiel);

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
  public function create($id)
  {
      if (Auth::check()){
          if (Auth::user()->role==1)
              $tache= Tache::findOrFail($id);
          return view('materiel.create')->with('tache',$tache);

      }else
          return back();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $m=Materiel::create($request->all());
      $n=Notification::create([
          'idType'=>$m->id,
          'type'=>'materiel',
          'lu'=>0,
          'id_user'=>$request->input('id_tache')

      ]);
      return redirect()->route('materiel.show',['id'=>$m->id]);
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $materiel=Materiel::findOrFail($id);
      $tache=Tache::where('id','=',$materiel->id_tache)->get();
      return view("materiel.show")->with(["tache"=>$tache,
          "materiel"=>$materiel
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
      $materiel=Materiel::findOrfail($id);
      return view('materiel.materiel')->with('materiel',$materiel);

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,Request $request)
  {
      $materiel=Materiel::findOrFail($id);
      $materiel->nom_materiel=$request->input('nom_materiel');

      $materiel->save();
      return redirect()->route('materiel.show',['id'=>$materiel->id]);
    
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
  
}

?>