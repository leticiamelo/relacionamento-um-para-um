<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    function cliente(){
        return $this->belongsTo('App\Cliente');

         /*exemplo de quando ficaria o hasOne caso suas colunas e tabelas nao respeitem a nomenclatura do laravel
         return $this->belongsTo('App\Cliente', 'cliente_id', 'id'); 
         */
    }
}
