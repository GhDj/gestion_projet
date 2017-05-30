<?php 

namespace App\Http\Controllers;

use App\Equipe;
use App\Modules;
use App\Projet;
use App\Tache;
use App\TacheEquipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModulesController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $modules=Modules::all();
      return view('modules.index')->with('modules',$modules);
    
  }
  public function listeModule($id){
      $modules = Modules::where('id_projet','=',$id)->get();
      return view('modules.index')->with('modules',$modules);
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
                $projet=Projet::findOrFail($id);
              return view('modules.create')->with("projet", $projet);

      }

      }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      Modules::create($request->all());
      return redirect()->route('projet.show',['id'=>$request->input('id_projet')]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $module=Modules::findOrFail($id);
      $tache=Tache::where('id_module','=',$module->id)->get();

      return view('modules.show')->with(['module'=>$module,
                                          'tache'=>$tache
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
    $module=Modules::findOrfail($id);
    return view('modules.module')->with('module',$module);

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, Request $request)
  {
      $module=Modules::findOrFail($id);
      $module->designation=$request->input('designation');
      $module->nbr_points=$request->input('nbr_points');
      $module->avancement=$request->input('avancement');
      $module->statut_module=$request->input('statut_module');
      $module->save();
      return redirect()->route('projet.show',['id'=>$module->id_projet]);
    
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