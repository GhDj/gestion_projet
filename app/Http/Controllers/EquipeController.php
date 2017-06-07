<?php

namespace App\Http\Controllers;

use App\Equipe;
use App\Equipe_user;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipe=Equipe::all();
        return view('equipe.index')->with('equipe',$equipe);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1)
                $user=User::all();
                return view('equipe.create')->with('user',$user);
        }else
        {
            echo "deconnecter";
        }
    
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $e=Equipe::create($request->all());

        return redirect()->route('equipe.index',['id'=>$e->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::all();
        $equipeuser=Equipe_user::all();
        $users=Equipe_user::where("id_equipe","<>",$id)->get() ;
        $nonequipe = [];

     //   dd($users);
        return view("equipeUser.show")->with(['user'=>$user,
                                                'id'=>$id,
                                        'users'=>$users,
                                                'equipeuser'=>$equipeuser
        ]);
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
        //
    }
}
