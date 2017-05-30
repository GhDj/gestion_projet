<?php 

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {
      $user = User::all();
      return view('user.index')->with('user',$user);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $user=User::findOrFail($id);
    return view('user.show')->with('user',$user);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

      $user = user::findOrFail($id);
          return view('user.profile')->with(['user' => $user
          ]);

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function update($id, Request $request)
  {
      $u=User::findOrFail($id);
      $u->name=$request->input("name");
      $u->email=$request->input("email");
      $u->tel=$request->input("tel");
      $u->password=bcrypt($request->input('password'));
      $u->matricule=$request->input("matricule");
      $u->role=$request->input("role");

      $files=$request->file('photo');
      $files->storeAs('./photo',$files->getClientOriginalName(),'public');

      $u->photo=$files->getClientOriginalName();



      $u->save();

    /*  $user =user::findOrFail($id);
      return view('user.index')->with(['user' => $user

      ]);
*/return redirect('user');
  }
    


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $u = User::where('id','=',"$id")->first();
      $u->delete();
      return back();


  }
    public function rechercheUser(Request $request){
        $mot=$request->input('recherche');
        //dd($mot);
        /* $p=Projet::where('nomProjet','like','%.$mot.%')
             ->orderBy('nomProjet')
             ->paginate(20);*/
        $u = User::search($mot)->get();
        return view("user.recherche")->with('u',$u);
    }
}
  


?>