<?php 

namespace App\Http\Controllers;

use App\Logistique;
use App\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogistiqueController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      if(Auth::check()){
          if (Auth::user()->role==1){
              $logistique = Logistique::paginate('10');
              return view('logistique.index')->with('logistique',$logistique);

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
          return view('logistique.create')->with('tache',$tache);

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
      $l=Logistique::create($request->all());
      $n=Notification::create([
          'idType'=>$l->id,
          'type'=>'logistique',
          'lu'=>0,
          'id_user'=>$request->input('id_tache')

      ]);
      return redirect()->route('logistique.show',['id'=>$l->id]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $logistique=Logistique::findOrFail($id);
      $tache=Tache::where('id','=',$logistique->id_tache)->get();
      return view("logistique.show")->with(["tache"=>$tache,
          "logistique"=>$logistique
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
      $logistique=Logistique::findOrfail($id);
      return view('logistique.logistique')->with('logistique',$logistique);

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, Request $request)
  {
      $logistique=logistique::findOrFail($id);
      $logistique->description_logistique=$request->input('description_logistique');

      $logistique->save();
      return redirect()->route('logistique.show',['id'=>$logistique->id]);

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