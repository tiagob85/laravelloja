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

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Criação de rotas*/
Route::group(['prefix' => 'loja'], function(){
    Route::get('/', 'DepartamentoController@index');
/* Departamento*/    
    Route::post("/storedepartamento", "DepartamentoController@storedepartamento");
    Route::get("/{id}/editdepartamento", "DepartamentoController@editarDepartamentoView");
    Route::post("/updatedepartamento", "DepartamentoController@updatedepartamento");
    Route::get("/{id}/deletedepartamento", "DepartamentoController@excluirDepartamento");
/* Unidade */    
    Route::post("/storeunidade", "UnidadeController@storeunidade");
    Route::get("/{id}/editunidade", "UnidadeController@editarUnidadeView");
    Route::post("/updateunidade", "UnidadeController@updateunidade");
    Route::get("/{id}/deleteunidade", "UnidadeController@excluirUnidade");
/* Produto */    
    Route::post("/storeproduto", "ProdutoController@storeproduto");
/* Fornecedor */    
    Route::post("/storefornecedor", "FornecedorController@storefornecedor");
    Route::get("/{id}/editfornecedor", "FornecedorController@editarFornecedorView");
    Route::post("/updatefornecedor", "FornecedorController@updatefornecedor");
    Route::get("/{id}/deletefornecedor", "FornecedorController@excluirfornecedor");
});