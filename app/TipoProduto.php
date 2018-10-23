<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    protected $primaryKey = 'idTipo';
    protected $fillable = ['nome','descricao'];
    protected $guarded = ['idTipo'];
    protected $table = 'tipoproduto';
    
    public function produto()
    {
        return $this->hasMany('App\Produto','idTipoProduto','idTipo');
    }
}
