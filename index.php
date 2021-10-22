<?php
session_start();

$pessoa = [
  'nome' => null,
  'sobrenome' => null,
  'apelido' => null,
  'telefone' => null,
  'cidade' => null,
  'estado' => null,
];

if( $_POST ){
  if( isset( $_POST['id'] ) ){
    // copia do que estiver na posicao informada
    $pessoa = $_SESSION['lista'][ $_POST['id'] ];
    
    // posicao id nao existia e agora foi adicionada / criada
    $pessoa['id'] = $_POST['id'];
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script1.js"></script>

  <title>Cadastros</title>
</head>
<body>

<header>
  <div class="center">
    <h1>CADASTRO</h1>
  </div>
  <div class="pesquisar">
    <form method="POST" action="index.php">
      <input class="inppesquisar" name="pesquisar" type="text">
      <input class="btnpesquisar" type="image" src="img/pesquisa.png" width="15px">
    </form>
  </div>
</header>
<main>
  <div class="card">
    <form method="POST" action="cadastro.php">
      <script src="js/script1.js"></script>
      <?php
      if( array_key_exists('id' , $pessoa) ){
        ?>
        <input type="hidden" name="id" value="<?php echo $pessoa['id'];?>">
        <?php
      }
      ?>

      <div class="lineinput">
        <label>NOME:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $pessoa['nome'];?>">
      </div>
      <div class="lineinput">
        <label>SOBRENOME:</label>
        <input type="text" name="sobrenome" value="<?php echo $pessoa['sobrenome'];?>">
      </div>
      <div class="lineinput">
        <label>APELIDO:</label>
        <input type="text" name="apelido" value="<?php echo $pessoa['apelido'];?>">
      </div>
      <div class="lineinput">
        <label>TELEFONE:</label>
        <input type="number" name="telefone" placeholder="(XX) XXXX-XXXX" value="<?php echo $pessoa['telefone'];?>">
      </div>
      <div class="lineinput">
        <label>CIDADE:</label>
        <input type="text" name="cidade" value="<?php echo $pessoa['cidade'];?>">
      </div>
      <div class="lineinput">
        <label>ESTADO:</label>
        <input type="text" name="estado" value="<?php echo $pessoa['estado'];?>">
      </div>
      <div class="botaoform">
        <input class="button" onclick="cadastro.salvar()" type="submit" name="salvar" value="SALVAR">
        <input class="button" type="submit" name="cancelar" value="CANCELAR">
        <input class="button" type="submit" name="limpar" value="LIMPAR CADASTROS">  
        <a class="button" href="index.php">VOLTAR</a>    
      </div>
    </form> 
  </div>  

  <?php
  if ( array_key_exists( 'pesquisar' ,  $_POST ) ) {
        
    $lista = null;
    
    if( isset( $_SESSION['lista'] ) ){
      $lista = $_SESSION['lista'];
    }
    
    $pesquisar = $_POST['pesquisar'];
    
    if ( ! empty( $pesquisar ) ) {
      
      $id_encontrado = null;
      echo "<pre>";
      foreach( $lista as $posicao => $p ){
        
        if( $pesquisar === $p['nome'] ){
          $id_encontrado = $posicao;
          break;
        }
        
      }
      
      $pessoa = $_SESSION['lista'][$id_encontrado];
      $pessoa['id'] = $id_encontrado;
      
    } 
    
    ?>
    <link rel="stylesheet" href="css/style.css">
    <div class="tabela">
      <table border="1">
        <thead>
          <th class="center">ID</th>
          <th>NOME</th>
          <th>SOBRENOME</th>
          <th>APELIDO</th>
          <th>TELEFONE</th>
          <th>CIDADE</th>
          <th>ESTADO</th>
          <th class="center">AÇÕES</th>
        </thead>
        <tbody id="tbody">
          <tr>
            <td><?php echo $pessoa['id']+1;?></td>
            <td><?php echo $pessoa['nome'];?></td>
            <td><?php echo $pessoa['sobrenome'];?></td>
            <td><?php echo $pessoa['apelido'];?></td>
            <td><?php echo $pessoa['telefone'] ;?></td>
            <td><?php echo $pessoa['cidade'];?></td>
            <td><?php echo $pessoa['estado'];?></td>
            <td>
              <form method="POST" action="index.php">
                <input type="hidden" name="id" value="<?php echo $pessoa['id'];?>"/>
                <input class="botao" name="editar" type="image" src="img/editar.png" width="20px">
              </form>  
            </td>
          </tr>  
        </tbody>
      </table>
    </div>
    
    <?php
  }
  else{

    if( isset( $_SESSION['lista'] ) ){
      $lista = $_SESSION['lista'];
  }

  ?>

  <div class="tabela">
  <table border="1">
    <thead>
      <th class="center">ID</th>
      <th>NOME</th>
      <th>SOBRENOME</th>
      <th>APELIDO</th>
      <th>TELEFONE</th>
      <th>CIDADE</th>
      <th>ESTADO</th>
      <th class="center">AÇÕES</th>
    </thead>
    <tbody id="tbody">
    <?php

    // verifica se a lista NAO esta VAZIA

    if( array_key_exists( 'lista', $_SESSION ) ){
      foreach ( $lista as $id => $pessoa ){
        
        ?>
        <tr>
          <td><?php echo $id+1;?></td>
          <td><?php echo $pessoa['nome'];?></td>
          <td><?php echo $pessoa['sobrenome'];?></td>
          <td><?php echo $pessoa['apelido'];?></td>
          <td><?php echo $pessoa['telefone'] ;?></td>
          <td><?php echo $pessoa['cidade'];?></td>
          <td><?php echo $pessoa['estado'];?></td>
          <td>
            <form method="POST" action="index.php">
              <input type="hidden" name="id" value="<?php echo $id;?>"/>
              <input class="botao1" name="editar" type="image" src="img/editar.png" width="20px">
            </form>  
            <form method="POST" action="cadastro.php">
              <input type="hidden" name="id_excluir" value="<?php echo $id;?>"/>
              <input class="botao1" name="excluir" onclick="salvar()" type="image" src="img/excluir.png" width="20px">
            </form>
          </td>
        </tr>  
    <?php
      }
    }
    else{
    ?>
      <tr>
        <td colspan="7">Nenhum cadastro... ;( </td>
      </tr>        
    <?php
        }
  }
    ?>
    </tbody>
  </table>
  </div>

</main>      
</body>
</html>