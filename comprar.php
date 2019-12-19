<?php
// Chama a api que faz a compra
require_once __DIR__ . "/vendor/autoload.php";
/*$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();*/

$servidor_info = "http://10.204.23.250:3321";

$_id = $_GET["_id"];
$produto = $_GET['produto'];

// Pega informações do produto para comprar
$produto_informacoes = Unirest\Request::get("{$servidor_info}s/busca?nome={$produto}");

// Comprar
$produto_comprar = array('_id' => $_id, 'preco' => 5);


$body = Unirest\Request\Body::json($produto_comprar);
$headers = array('Accept' => 'application/json');
$response = Unirest\Request::put($servidor_info, $headers, $body);
