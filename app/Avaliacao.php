<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $primaryKey = 'idAvaliacao';
    protected $fillable = ['pontos','comentario','idCliente','idAvaliador'];
    protected $guarded = ['idAvaliacao'];
    protected $table = 'avaliacao';
    
    public function avaliado()
    {
        return $this->belongsTo('App\Cliente','idCliente','idCliente');
    }
    
    public function avaliador()
    {
        return $this->belongsTo('App\Cliente','idAvaliador','idCliente');
    }
}
