<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Cliente;
use App\Endereco;


Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach($clientes as $c){
        echo "<p>ID: " . $c->id . "</p>";
        echo "<p>Nome: " . $c->nome . "</p>";
        echo "<p>Telefone: " . $c->telefone . "</p>";
        //$e = Endereco::where('cliente_id', $c->id)->first();
        echo "<p>Rua: " . $c->endereco->rua . "</p>";
        echo "<p>Numero: " . $c->endereco->numero . "</p>";
        echo "<p>Bairro: " . $c->endereco->bairro . "</p>";
        echo "<p>Cidade: " . $c->endereco->cidade . "</p>";
        echo "<p>Uf: " . $c->endereco->uf . "</p>";
        echo "<p>Cep: " . $c->endereco->cep . "</p>";

        echo "<hr>";
    }
});


Route::get('/enderecos', function () {
    $enderecos = Endereco::all();
    foreach($enderecos as $e){
        echo "<p>Cliente id: " . $e->cliente_id . "</p>";
        echo "<p>Nome: " . $e->cliente->nome . "</p>";
        echo "<p>Telefone: " . $e->cliente->telefone . "</p>";
        echo "<p>Rua: " . $e->rua . "</p>";
        echo "<p>Numero: " . $e->numero . "</p>";
        echo "<p>Bairro: " . $e->bairro . "</p>";
        echo "<p>Cidade: " . $e->cidade . "</p>";
        echo "<p>Uf: " . $e->uf . "</p>";
        echo "<p>Cep: " . $e->cep . "</p>";
        echo "<hr>";
    }
});

Route::get('/inserir', function () {

    $c = new Cliente();
    $c->nome = "Jose Almeida";
    $c->telefone = "11 98765412";
    $c->save();

    $e = new Endereco();
    $e->rua = "Av. do Estado";
    $e->numero = 400;
    $e->bairro = "Centro";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "13018-4526";

    $c->endereco()->save($e);



    $c = new Cliente();
    $c->nome = "Marcos da Silva";
    $c->telefone = "12 98765412";
    $c->save();

    $e = new Endereco();
    $e->rua = "Av. Brasil";
    $e->numero = 154;
    $e->bairro = "Vila Olimpia";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "134578-888886";

    $c->endereco()->save($e);
});

/*LAZY LOADING : significa que o carregamento dos dados das tabelas relacionadas so acompanham quando solicitados.

Route::get('/clientes/json', function () {
    $clientes = Cliente::all();
    return $clientes->toJson();
});
*/

/*Eager Loading : força o carregamento dos dados das tabelas relacionadas
mais de uma tabela: $clientes = Cliente::with(['endereco', 'outra_tabela'])->get(); */

Route::get('/clientes/json', function () {
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();

});

Route::get('/enderecos/json', function () {
    $enderecos = Endereco::with(['cliente'])->get();
    return $enderecos->toJson();

});