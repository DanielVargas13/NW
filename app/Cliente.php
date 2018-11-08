<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'idCliente';
    protected $fillable = ['nick','telefone','rua','numero','bairro','cidade','estado','cep','idGamer'];
    protected $guarded = ['idCliente'];
    protected $table = 'cliente';
    
    public function gamer()
    {
        return $this->belongsTo('App\Gamer','idGamer','idGamer');
    }
    
     public function produto()
    {
        return $this->belongsToMany('App\Produto','anuncio','idCliente','idProduto')->withPivot('dataInicio','dataFim','situacao');
    }
    
     public function avaliado()
    {
        return $this->hasMany('App\Avaliacao','idCliente','idCliente');
    }
    
     public function avaliador()
    {
        return $this->hasMany('App\Avaliacao','idAvaliador','idCliente');
    }
}