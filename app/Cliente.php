<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    /*RELACIONAMENTO DE 1 PARA 1
    é importante que as nomenclaturas estejam de acordo com o que o laravel espera.
    cliente_id = nome da tabela seguido do id.*/


    public function endereco(){
        return $this->hasOne('App\Endereco');

        /*exemplo de quando ficaria o hasOne caso suas colunas e tabelas nao respeitem a nomenclatura do laravel

        return $this->hasOne('App\Endereco', 'cliente_id', 'id');
        */
    }
}
