<?php

  $lista = null;

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
        if( ! is_null( $lista ) ){
          foreach ( $lista as $id => $pessoa ){
            ?>
            <tr>
              <td><?php echo $id+1; ?></td>
              <td><?php echo $pessoa['nome'];?></td>
              <td><?php echo $pessoa['sobrenome'];?></td>
              <td><?php echo $pessoa['apelido'];?></td>
              <td><?php echo $pessoa['telefone'] ;?></td>
              <td><?php echo $pessoa['cidade'];?></td>
              <td><?php echo $pessoa['estado'];?></td>
              <td>
                <form method="POST" action="editar">
                  <input type="hidden" name="id" value="<?php echo $id;?>"/>
                  <input type="submit" name="editar" value="EDITAR"/>
                </form>  
                <form method="POST" action="excluir.php">
                  <input type="hidden" name="id" value="<?php echo $id;?>"/>
                  <input name="excluir" type="submit" value="Excluir">
                </form>
              </td>
              
            </tr>  
            <?php
                
              // http://localhost:8081/listaphp/excluir.php?id=0
         
          }
        }

      
        // a lista esta vazia
        else{
        ?>
          <tr>
            <td colspan="7">Nenhum cadastro... ;( </td>
          </tr>        
        <?php
        }

      ?>
    </tbody>
  </table>
</div>