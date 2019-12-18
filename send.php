<?php
	$produto = $_POST['produto'];

	require_once __DIR__ . "/vendor/autoload.php";
	$headers = array('Accept' => 'application/json');


	$response = Unirest\Request::get("http://10.204.23.250:3321/busca?nome={$produto}");

	$response->code;
	$response->headers;
	$response->raw_body;
	
	/*echo "<pre>";

	print_r($response->body);
		echo "<pre>";*/

	$informacoes_produto = $response->body;
	//Printando as variaveis dos objetos
	echo $informacoes_produto[0]->loja."\n";
	echo $informacoes_produto[0]->nome."\n";
	echo $informacoes_produto[0]->quantidade."\n";
	//echo $informacoes_produto[0]->preco."R$";

	//Printando o preço com as minhas taxas
	$taxa = $informacoes_produto[0]->preco*0.1;
	$PrecoNovo = $taxa + $informacoes_produto[0]->preco;
	echo $PrecoNovo."R$";
?>