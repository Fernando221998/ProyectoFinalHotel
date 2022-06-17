<?php
  //Detruye la sesión y nos dirigimos al index
  session_start();
  session_destroy();
  header("location:../index.php");
?>
