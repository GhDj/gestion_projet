<?php 

namespace App\Http\Controllers;

use App\Chat;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      if(Auth::check()){

               $id=Auth::user()->id;
              $chat = Chat::where('emetteur','=',$id)
                 ->orwhere('recepteur','=',$id)->get();
                $msgNomlu=Chat::where([
                    ['vu','=',0],
                    ['recepteur','=',$id]
                ])->first();
if ($msgNomlu) {
    $msgNomlu->vu = 1;
    $msgNomlu->save();
}
                return view('chat.index')->with('chat',$chat);

          }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      if (Auth::check()){
              $chat= Chat::all();
              $user=User::all();
          return view('chat.create')->with(['chat' => $chat,
                                            'user'=>$user


          ]);

      }else
          return back();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request )
  {
      $chat=Chat::create($request->all());
      $n=Notification::create([
          'idType'=>$chat->id,
          'type'=>'chat',
          'lu'=>0,
          'id_user'=>$request->input('recepteur')

      ]);
      return redirect()->back();
            
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $chat=Chat::findOrFail($id);
    return view('Chat.show')->with('chat',$chat);
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
    public function rechercheMsg(Request $request)
    {
        $mot = $request->input('recherche');
        //dd($mot);
        /* $p=Projet::where('nomProjet','like','%.$mot.%')
             ->orderBy('nomProjet')
             ->paginate(20);*/
        $c = Chat::search($mot)->get();
        return $c;

    }
    public function rechercheUser(Request $request){
        $mot=$request->input('recherche');
        //dd($mot);
        /* $p=Projet::where('nomProjet','like','%.$mot.%')
             ->orderBy('nomProjet')
             ->paginate(20);*/
        $u = User::search($mot)->get();
        return view("Chat.recherche")->with('u',$u);
}
    public function Liste(){

        $liste= Chat::where('emetteur','=',Auth::user()->id)
            ->orWhere('recepteur', Auth::user()->id)
            ->get();
        $table=[];
        foreach ($liste as $l){
              array_push($table,$l->emetteur);
          }
          $table1=array_unique($table);
            $liste=$table1;
            return view("Chat.index")->with('liste',$liste);
    }

    public function discussion($id){
        $chat=Chat::where([
            ['recepteur','=',Auth::user()->id],
            ['emetteur','=',$id]
        ])
            ->orWhere([
                ['recepteur','=',$id],
                ['emetteur','=',Auth::user()->id]
            ])->get();

         return view("Chat.discussion")->with('chat',$chat);

    }
}

?>