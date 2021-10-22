<?php

session_start();
if ( array_key_exists( 'id_excluir', $_POST) ) {
  $id = $_POST['id_excluir'];

  unset( $_SESSION['lista'][ $id ] );
}

if ( array_key_exists( 'salvar', $_POST ) ) {      
  
  $id = null;
  if( array_key_exists( 'id' , $_POST ) ){
    $id = (int)$_POST['id'];
  }

  $cadastro = array(
    'nome' => $_POST[ 'nome' ],
    'sobrenome' => $_POST[ 'sobrenome'],
    'apelido' => $_POST[ 'apelido'],
    'telefone' => $_POST[ 'telefone'],
    'cidade' => $_POST[ 'cidade'],
    'estado' => $_POST[ 'estado'],
  );      

  // verifica se tem um ID para editar
  if( !is_null( $id ) ){
    $_SESSION['lista'][ $id ] = $cadastro;
  }
  // senao criar um novo cadastro
  else{
    $_SESSION['lista'][] = $cadastro;
  }
} 

if ( array_key_exists( 'limpar', $_POST ) ) {
  session_destroy();
} 
   
// redirecionar
header("location:index.php");

?>