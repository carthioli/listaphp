<?php

session_start();

if ( array_key_exists( 'salvar', $_POST ) ) {      
  
  $cadastro = array(
    'nome' => $_POST[ 'nome' ],
    'sobrenome' => $_POST[ 'sobrenome'],
    'apelido' => $_POST[ 'apelido'],
    'telefone' => $_POST[ 'telefone'],
    'cidade' => $_POST[ 'cidade'],
    'estado' => $_POST[ 'estado'],
  );      
  
  $_SESSION['lista'][] = $cadastro;
  
}    

if ( array_key_exists( 'limpar', $_POST ) ) {
  session_destroy();
} 
   
// redirecionar
header("location:index.php");

?>