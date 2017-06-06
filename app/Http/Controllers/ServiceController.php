<?php 

namespace App\Http\Controllers;

use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $service = Service::all();
      $user=User::all();
      return view('service.index')->with('service',$service);
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
              $user=User::where('role','=',1)->get();
              return view('service.create')->with("user",$user);

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
      Service::create($request->all());
      return redirect('service');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $service = Service::findOrFail($id);
      $user=User::where('role','=',1)->get();
      return view('service.service')->with(['service' => $service,
                                            'user'=>$user
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
      $s=Service::findOrFail($id);
      $s->nom_service=$request->input("nom_service");
      $s->chef_service=$request->input("chef_service");



      $s->save();

      return redirect('service');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $s = Service::where('id','=',"$id")->first();
      $s->delete();
      return back();
  }
  
}

?>