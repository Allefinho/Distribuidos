<?php
// Chama a api que faz a compra
require_once "./vendor/autoload.php";
/*$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();*/

$servidor_info = "http://10.204.23.250:3321";

$nome = $_GET["nome"];

// Pega informações do produto para comprar
$response = Unirest\Request::get("{$servidor_info}s/busca?nome={$nome}");
$produto_informacoes = $response->body;

// Comprar => n sei como compra itens, é com o krisao
$produto_comprar = array('nome' => $nome, 'preco' => $produto_informacoes[0]->preco);


$body = Unirest\Request\Body::json($produto_comprar);
$headers = array('Accept' => 'application/json');
$response = Unirest\Request::put("{$servidor_info}s/comprar", $headers, $body);
