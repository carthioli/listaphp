<form method="POST" action="cadastro.php">
  <?php
    if( array_key_exists('id' , $pessoa) ){
    ?>
      <input type="hidden" name="id" value="<?php echo $pessoa['id'];?>">
    <?php
    }
  ?>

  <div class="lineinput">
    <label>NOME:</label>
    <input type="text" name="nome" value="<?php echo $pessoa['nome'];?>">
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
    <input class="button" type="submit" name="salvar" value="SALVAR">
    <input class="button" type="submit" name="cancelar" value="CANCELAR">
    <input class="button" type="submit" name="limpar" value="LIMPAR CADASTROS">  
    <a class="button" href="index.php">VOLTAR</a>    
  </div>
</form>