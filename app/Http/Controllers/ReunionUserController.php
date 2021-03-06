<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Reunion;
use App\Reunion_user;
use Illuminate\Http\Request;

class ReunionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $e=Reunion_user::create($request->all());
       /* $e = Reunion_user::create([
            'id_user' => $request->input('id_user'),
            'id_reunion' => $request->input('id_reunion')
        ]);*/
       $n=Notification::create([
            'idType'=>$e->id_reunion,
            'type'=>'reunion',
            'lu'=>0,
            'id_user'=>$request->input('id_user')

        ]);
      //  return redirect()->route('reunion.show',['id'=>$request->input('id_reunion')]);
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Reunion_user::where('id','=',"$id")->first();
        $e->delete();
        return back();
    }
}
