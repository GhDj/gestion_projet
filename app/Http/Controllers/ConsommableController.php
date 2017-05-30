<?php

namespace App\Http\Controllers;

use App\consommable;
use App\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class consommableController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::check()){
            if (Auth::user()->role==1){
                $consommable = Consommable::paginate('10');
                return view('consommable.index')->with('consommable',$consommable);

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
            return view('consommable.create')->with('tache',$tache);

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
        $l=Consommable::create($request->all());
        return redirect()->route('consommable.show',['id'=>$l->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $consommable=Consommable::findOrFail($id);
        $tache=Tache::where('id','=',$consommable->id_tache)->get();
        return view("consommable.show")->with(["tache"=>$tache,
            "consommable"=>$consommable
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
        $consommable=Consommable::findOrfail($id);
        return view('consommable.consommable')->with('consommable',$consommable);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $consommable=Consommable::findOrFail($id);
        $consommable->nom=$request->input('nom');
        $consommable->quantite_estime=$request->input('quantite_estime');


        $consommable->save();
        return redirect()->route('consommable.show',['id'=>$consommable->id]);

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