<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Gamer extends Authenticatable
{
    use Notifiable;
    
    protected $primaryKey = 'idGamer';
    protected $fillable = ['nome','email','senha','foto'];
    protected $guarded = ['idGamer','remember_token'];
    protected $table = 'gamer';
    
    public function getAuthPassword()
{
return $this->senha;
}
    
     public function cliente()
    {
        return $this->hasOne('App\Cliente','idGamer','idGamer');
    }
}