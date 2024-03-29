<!DOCTYPE html>
<html>

<head>
  <title>E-MARKET Gleison</title>
  <meta charset="utf-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <link rel="icon" href="img/icon.png" sizes="192x192">
  <link href="css/estilo.css" rel="stylesheet">

</head><br>
<br><br>
<h4 class="text-center">E-MARKET</h4>
<div class="login">
  <h1 class="text-center">GLEISON</h1>
  <div class="moldura-dois">
    <form method="post" action="index.php">
      <h3 class="text-center">Qual o produto desejado?</h3>
      <input type="text" name="produto" placeholder="">
      <input type="submit" name="submit" value="Buscar">

      <div class="conteudo text-center">
        <table align="center">
          <thead>
            <th> | Loja |</th>
            <th> Produto  |</th>
            <th> Valor  | </th>
            <th> Quant  | </th>
            
          </thead>

          <tbody>
            <?php
            require_once "./vendor/autoload.php";

            /*$dotenv = new Dotenv\Dotenv(__DIR__);
            $dotenv->load();*/

            $servidor_info = "http://10.204.23.250:3321";
            if (isset($_POST['produto'])) {

              $produto = $_POST['produto'];

              $headers = array('Accept' => 'application/json');

              $response = Unirest\Request::get("{$servidor_info}s/busca?nome={$produto}");

              $informacoes_produto = $response->body;

              print_r($informacoes_produto);

              echo "<tr>

                    <td>{$informacoes_produto[0]->loja}</td>
                    <td>{$informacoes_produto[0]->nome}</td>
                    <td>{$informacoes_produto[0]->quantidade}</td>
                    <td>R$ {$informacoes_produto[0]->preco}</td>
                    <td><a href='comprar.php?nome={$informacoes_produto[0]->nome}'>Comprar</a></td>

                    </tr>";
            }
            ?>
          </tbody>

        </table>


    </form>
  </div>
  <!--<div align="center" style="padding-top: 7px;">
    <input type="submit" name="submit" value="Comprar">
  </div>-->
</div>
</div>



<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function(event) {
    var dataText = [" JSON", " GLEISON", " JSON", "GLEISON"];

    function typeWriter(text, i, fnCallback) {
      if (i < (text.length)) {
        document.querySelector("h1").innerHTML = text.substring(0, i + 1) + '<span aria-hidden="true"></span>';
        setTimeout(function() {
          typeWriter(text, i + 1, fnCallback)
        }, 100);
      } else if (typeof fnCallback == 'function') {
        setTimeout(fnCallback, 700);
      }
    }

    function StartTextAnimation(i) {
      if (typeof dataText[i] == 'undefined') {
        setTimeout(function() {
          StartTextAnimation(0);
        }, 20000);
      }
      if (i < dataText[i].length) {
        typeWriter(dataText[i], 0, function() {
          StartTextAnimation(i + 1);
        });
      }
    }
    StartTextAnimation(0);
  });
</script>

</html>