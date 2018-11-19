<?php

namespace App\Http\Controllers;

use App\Avaliacao;
use Illuminate\Http\Request;
use Auth;

class AvaliacaoController extends Controller
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
        $avaliacao = new Avaliacao;
        $avaliacao->pontos = $request->nota;
        $avaliacao->comentario = $request->comentario;
        $avaliacao->idCliente = $request->idVend;
        $avaliacao->idAvaliador = Auth::user()->cliente->idCliente;
        $avaliacao->save();
        //$this->guardarInfo($cliente->idGamer);
        return redirect()->route('paginaV',$request->idVend)->with('message', 'Vendedor avaliado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    public function media($id){
        $media = Avaliacao::where('idCliente',$id)->avg('pontos');
        return $media;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Avaliacao  $avaliacao
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
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
