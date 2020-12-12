<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model{
    protected $table = "tipo_clientes"; 
    protected $fillable = ['nome', 'descricao']; 

    public function clientes(){
        return $this->hasMany("App\Cliente");
    }
}