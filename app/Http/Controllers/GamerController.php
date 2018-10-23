<?php

namespace App\Http\Controllers;

use App\Gamer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

class GamerController extends Controller
{
    
    use RegistersUsers;
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
        $gamerVer = Gamer::where('email',$request->email)->first();
        if($gamerVer!=null){
            return redirect()->route('index')->with('message','E-mail já cadastrado');
        }
        $gamer = Gamer::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => $request->senha,
        ]);
        $gamer->save();
        //$this->guardarInfo($gamer->email);
        return redirect()->route('index')->with('message','Cadastro efetuado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gamer  $gamer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   public function guardarInfo($email){
        $gamer = Gamer::where('email',$email)->firstOrFail();
        session(['id' => $gamer->idGamer]);
        session(['email' => $gamer->email]);
        session(['nome' => $gamer->nome]);
    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gamer  $gamer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gamer = Gamer::findOrFail($id);
        return view('alter-gamer', compact('gamer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gamer  $gamer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gamer = Gamer::where('idGamer',$id)->firstOrFail();
        $gamer->nome = $request->nome;
        $gamer->email = $request->email;
        $gamer->senha = $request->senha;
        $gamer->save();
        $this->guardarInfo($gamer->email);
    }

     public function login(Request $request)
    {
        $gamer = Gamer::where('email',$request->email)->first();
         if($gamer != null){

        if($gamer->senha == $request->senha)
     {
            Auth::login($gamer);
       return redirect()->route('home')->with('message','Bem Vindo '.Auth::user()->nome);
     }
     else
     {
      return redirect()->route('index')->with('message', 'Informações incorretas');
     }
         }
         else{
             return redirect()->route('index')->with('message', 'Informações incorretas');
         }
    }
    
     public function logout()
    {
        Auth::logout();
      return redirect()->route('index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gamer  $gamer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gamer = Gamer::findOrFail($id);
        $gamer->save();
        return redirect()->route('/')->with('message', 'Cadastro deletado!');
    }
}
