<?php

namespace App\Http\Controllers;

use App\Produto;
use App\TipoProduto;
use Illuminate\Http\Request;
use Auth;
use Cart;

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
        $tipos = $request->tipos;
        $status = $request->status;
        $preco = $request->preco;

        $tipo = TipoProduto::where('idTipo',session('idcategoria'))->firstOrFail();
        $produtos = null;
        
        if($request->has('tipos') && $request->has('status')){
            if($preco==1){
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->whereIn('categoria', $tipos)->whereIn('status', $status)->orderBy('preco','desc')->get();
            }else if($preco==0){
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->whereIn('categoria', $tipos)->whereIn('status', $status)->orderBy('preco','asc')->get();
            }else{
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->whereIn('categoria', $tipos)->whereIn('status', $status)->get();
            }
        }else if($request->has('status')){
            if($preco==1){
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->whereIn('status', $status)->orderBy('preco','desc')->get();
            }else if($preco==0){
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->whereIn('status', $status)->orderBy('preco','asc')->get();
            }else{
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->whereIn('status', $status)->get();
            }
        }else if($request->has('tipos')){
            if($preco==1){
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->whereIn('categoria', $tipos)->orderBy('preco','desc')->get();
            }else if($preco==0){
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->whereIn('categoria', $tipos)->orderBy('preco','asc')->get();
            }else{
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->whereIn('categoria', $tipos)->get();
            }
        }else{
            if($preco==1){
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->orderBy('preco','desc')->get();
            }else if($preco==0){
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->orderBy('preco','asc')->get();
            }else{
                $produtos = Produto::where('idTipoProduto',$tipo->idTipo)->get();
            }
        }
    
        return view('resultado')->with(['produtos' => $produtos]);

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
        return back()->with('message', 'Atualização produto efetuado!');
    }
    
    public function addcarrinho($id){
        $produto = Produto::where('idProduto',$id)->firstOrFail();
        Cart::session(Auth::user()->cliente->idCliente)->add($produto->idProduto,$produto->nome,$produto->preco,1,array());
        return back()->with('message', 'Produto adicionado');
    }
    
    public function addcarrinhoFinal($id){
        $produto = Produto::where('idProduto',$id)->firstOrFail();
        Cart::session(Auth::user()->cliente->idCliente)->add($produto->idProduto,$produto->nome,$produto->preco,1,array());
        $produtos = $this->carrinhoFinal();
        return view('comprar_produto')->with(['produtos' => $produtos]);
    }
    
    public function carrinho(){
        $carrinho = Cart::session(Auth::user()->cliente->idCliente)->getContent();
        $idprods = array();
        foreach($carrinho as $prod){
            array_push($idprods,$prod->id);
        }
        $produtos = Produto::whereIn('idProduto',$idprods)->get();
        return view('comprar_produto')->with(['produtos' => $produtos]);
    }
    
    public function carrinhoFinal(){
        $carrinho = Cart::session(Auth::user()->cliente->idCliente)->getContent();
        $idprods = array();
        foreach($carrinho as $prod){
            array_push($idprods,$prod->id);
        }
        $produtos = Produto::whereIn('idProduto',$idprods)->get();
        return $produtos;
    }
    
    public function alterarqtd($id,$qtd){
       Cart::session(Auth::user()->cliente->idCliente)->update($id, array(
        'quantity' => array('relative' => false,'value' => $qtd),
       ));
        $produtos = $this->carrinhoFinal();
        return view('comprar_produto')->with(['produtos' => $produtos]);
    }
    
    public function removerprod($id){
        Cart::session(Auth::user()->cliente->idCliente)->remove($id);
        $produtos = $this->carrinhoFinal();
        return view('comprar_produto')->with(['produtos' => $produtos]);
    }
    
    public function limparCar(){
        Cart::session(Auth::user()->cliente->idCliente)->clear();
        $produtos = $this->carrinhoFinal();
        return view('comprar_produto')->with(['produtos' => $produtos]);
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
        return back()->with('message', 'Produto deletado efetuado!');
    }
    
    
}
