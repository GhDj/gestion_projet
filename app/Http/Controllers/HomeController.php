<?php

namespace App\Http\Controllers;

use App\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        $projet=Projet::where('id_user','=',Auth::user()->id);

        if (Auth::user()->role == 1) {
            return view('chef.index')->with('user',$user);
        } else {
            if (Auth::user()->role == 2) {
                return view('user.index')->with('projet',$projet);
            }else
                return view('admin.index')->with('user',$user);

        }
    }
}
