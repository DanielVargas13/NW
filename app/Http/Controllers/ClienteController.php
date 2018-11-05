<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Auth;

class ClienteController extends Controller
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
    public function create($id)
    {
        $cliente = Cliente::where('idGamer',$id)->first();
        if($cliente!=null){
            return redirect()->route('home')->with('message', 'Cadastro completo já efetuado');
        }
        return view('cadastro_completo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente;
        $cliente->nick = $request->nick;
        $cliente->telefone = $request->telefone;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;
        
        //Upload de imagem
        $fotoName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('Imagens'), $fotoName);

        $cliente->foto = $fotoName;
        $cliente->idGamer = Auth::user()->idGamer;
        $cliente->save();
        //$this->guardarInfo($cliente->idGamer);
        return redirect()->route('home')->with('message', 'Cadastro completo efetuado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::where('idCliente',$id)->first();   
        return $cliente;
    }

    public function acessoCP($id){
        $cliente = Cliente::where('idGamer',$id)->first();
        if($cliente!=null){
            return redirect()->route('produto.create');
        }
        return redirect()->route('home')->with('message', 'Cadastro completo não efetuado');
    }
    
     public function acessoMP($id){
        $cliente = Cliente::where('idGamer',$id)->first();
        if($cliente!=null){
            return redirect()->route('produto.index');
        }
            return redirect()->route('home')->with('message', 'Cadastro completo não efetuado');
    }
    
  /*  public function guardarInfo($idG){
        $cliente = Cliente::where('idGamer',$idG)->firstOrFail();
        session(['idC' => $cliente->idCliente]);
}*/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::where('idGamer',$id)->first();
        if($cliente!=null){
            return view('alter_cliente')->with(['cliente' => $cliente]);
        }
            return redirect()->route('home')->with('message', 'Cadastro completo não efetuado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::where('idCliente',$id)->firstOrFail();
        $cliente->nick = $request->nick;
        $cliente->telefone = $request->telefone;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;
        
        if($request->foto != null){
             //Upload de imagem
            $fotoName = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('Imagens'), $fotoName);
            $cliente->foto = $fotoName;
        }
        $cliente->save();
        app('App\Http\Controllers\GamerController')->update($request,$cliente->idGamer);
        return redirect()->route('home')->with('message', 'Atualização de perfil efetuada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}