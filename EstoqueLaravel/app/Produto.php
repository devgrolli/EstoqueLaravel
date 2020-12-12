<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model{
    protected $table = "produtos"; 
    protected $fillable = ['nome', 'preco_un', 'quantidade', 'marca']; 

    public function entradas(){
        return $this->hasMany("App\Entrada");
    }
}