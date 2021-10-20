<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">

    <title>Cadastros</title>
  </head>
  <body>

    <header>
      <h1>CADASTRO</h1>
    </header>
    <main>
      <div class="title">
        <h2>CONTATOS</h2>
      </div>
      <div class="card">
        <?php include "formulario.php"; ?>      
      </div>
      <?php include "tabela.php";?>
    </main>  
  </body>
</html>