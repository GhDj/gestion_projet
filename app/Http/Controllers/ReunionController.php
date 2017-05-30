<?php 

namespace App\Http\Controllers;

use App\Projet;
use App\Reunion;
use App\Reunion_user;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReunionController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $reunion=Reunion::all();
      return view('reunion.index')->with('reunion',$reunion);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {if (Auth::check()) {
      if (Auth::user()->role == 1)
            $projet=Projet::all();
          return view('reunion.create')->with('projet',$projet);
  }
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $r=Reunion::create($request->all());
      return redirect()->route('reunion.index',['id'=>$r->id]);


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

      $r=Reunion::findOrFail($id);
      $user=User::all();
      $ru=Reunion_user::where('id_reunion','=',$id)->get();
        $test=false;
      foreach ($ru as $item){
        if (Auth::user()->id==$item->id_user){
            $test=true;
        }
    }
    if ($test){


      return view("reunion.show")->with(["r"=>$r,
                                        "user"=>$user,
                                        "id"=>$id,
                                        "ru"=>$ru

      ]);
  }else{
        return "Vous n'etes pas dans cet reunion" ;
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
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