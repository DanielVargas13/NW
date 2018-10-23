<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $primaryKey = 'idProduto';
    protected $fillable = ['nome','descricao','tiponegocio','preco','taxa','status','foto','idTipoProduto'];
    protected $guarded = ['idProduto'];
    protected $table = 'produto';
    
    public function tipo()
    {
        return $this->belongsTo('App\TipoProduto','idTipoProduto','idTipo');
    }
    
    public function cliente()
    {
        return $this->belongsToMany('App\Cliente','anuncio','idProduto','idCliente')->withPivot('dataInicio','dataFim','situacao');
    }
}
