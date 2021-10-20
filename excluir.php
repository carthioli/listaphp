<?php
  
  session_start();

  $id = $_POST['id'];

  unset( $_SESSION['lista'][ $id ] );

  header('location:index.php');