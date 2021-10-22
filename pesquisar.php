<?php
  session_start();
  
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
<a class="button" href="index.php">VOLTAR</a>  