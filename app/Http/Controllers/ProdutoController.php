<?php

namespace App\Http\Controllers;

use App\Produto;
use App\TipoProduto;
use Illuminate\Http\Request;
use Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::whereHas('cliente',function($query){
            $query->where('anuncio.idCliente',Auth::user()->cliente->idCliente);
        })->get();
        return view('delete_produto')->with(['produtos' => $produtos]);   
    }
    
    public function ecommerce()
    {
        $produtos = Produto::whereHas('cliente',function($query){
            $query->where('anuncio.situacao',"Ativo");
        })->inRandomOrder()->limit(12)->get();
        return view('home')->with(['produtos' => $produtos]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoproduto = TipoProduto::all();
        return view('cadastro_produto')->with(['tipoproduto' => $tipoproduto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->tiponegocio = $request->tiponegocio;
        $produto->preco = $request->preco;
        $produto->taxa = $request->preco*0.05;
        $produto->status = $request->status;
        
        //Upload de imagem
        $fotoName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('Imagens'), $fotoName);

        $produto->foto = $fotoName;
        $produto->categoria = $request->categoria;
        $produto->idTipoProduto = $request->idTipoProduto;
        $produto->save();
        $produto->cliente()->attach($request->idCliente,['dataInicio' => $request->dataInicio, 'dataFim' => $request->dataFim, 'situacao' => $request->situacao]);
        return redirect()->route('home')->with('message', 'Cadastro produto efetuado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::where('idProduto',$id)->firstOrFail();
        $anuncios = Produto::whereHas('cliente',function($query){
            $query->where('anuncio.situacao',"Ativo");
        })->inRandomOrder()->limit(4)->get();
        return view('produto')->with(['produto' => $produto,'anuncios' => $anuncios]);
    }
    
    public function search(Request $request)
    {
        $input = $request->pesquisa;
        $produtos = Produto::whereHas('tipo',function($query) use($input){
            $query->where('produto.nome','LIKE','%'.$input.'%')->orWhere('produto.categoria','LIKE','%'.$input.'%')->orWhere('tipoproduto.nome','LIKE','%'.$input.'%');
        })->get();
        return view('home')->with(['produtos' => $produtos]);
    }

    public function searchCat($cat)
    {
        $tipo = TipoProduto::where('idTipo',$cat)->firstOrFail();
        $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->get();
        session(['idcategoria' => $cat]);
        return view('resultado')->with(['produtos' => $produtos]);
    }
    
    public function filtragem(Request $request)
 
    {

        if($request->ajax()){

            $output="";

            $produtos=Produto::where('title','LIKE','%'.$request->search."%")->get();

        if($produtos){

        foreach ($produtos as $key => $prod) {

            $output.='<div class="col s4 m4 l4">
                <div class="card">
                    <div class="card-image">
                        <img src="'.URL::asset('Imagens/'.$prod->foto).'">
                    </div>
                    <div class="card-content">';
                         if ($prod->tiponegocio == "Venda"){
                            $output.='<span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> '.$prod->tipo->nome.' - '.$prod->nome.' - '.$prod->tiponegocio.' - R$ '.$prod->preco.' </span>'; 
                         } else{
                             $output.='<span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> '.$prod->tipo->nome.' - '.$prod->nome.' - '.$prod->tiponegocio.' </span>'; 
                         }
                        foreach($prod->cliente as $cliente){
                            $output.='<span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;">'.$cliente->gamer->nome.'</span>';
                        }
                         $output.='<span class="card-title activator center">
                        <a href="'.route('produto.show',$prod->idProduto).'"><button class="btn blue waves-effect waves-blue darken-3 center" type="button" onclick=""> Comprar <i class="material-icons right"> add_shopping_cart </i></button></a>
                        </span>
                    </div>
                </div>
            </div>';

        }

        return Response($output);

           }

           }

 
 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::where('idProduto',$id)->firstOrFail();
        $tipoproduto = TipoProduto::all();
        return view('alter_produto')->with(['produto' => $produto,'tipoproduto' => $tipoproduto]);
    }

    public function anunciar($id)
    {
        $prod = Produto::where('idProduto',$id)->firstOrFail();
        $prod->cliente()->updateExistingPivot(Auth::user()->cliente->idCliente,['situacao' => "Ativo"],false);
        return back()->with('message', 'Produto anunciado com sucesso!');
    }
    public function suspender($id)
    {
        $prod = Produto::where('idProduto',$id)->firstOrFail();
        $prod->cliente()->updateExistingPivot(Auth::user()->cliente->idCliente,['situacao' => "Suspenso"],false);
        return back()->with('message', 'Anuncio suspenso com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::where('idProduto',$id)->firstOrFail();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->tiponegocio = $request->tiponegocio;
        $produto->preco = $request->preco;
        $produto->taxa = $request->preco*0.05;
        $produto->status = $request->status;
        
        if($request->foto != null){
            //Upload de imagem
            $fotoName = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('Imagens'), $fotoName);
            $produto->foto = $fotoName;
        }
        $produto->categoria = $request->categoria;
        $produto->idTipoProduto = $request->idTipoProduto;
        $produto->save();
        return redirect()->route('home')->with('message', 'Atualização produto efetuado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::where('idProduto',$id)->first();
        $produto->cliente()->detach();
        $produto->delete();
        return redirect()->route('home')->with('message', 'Produto deletado efetuado!');
    }
    
    
}
