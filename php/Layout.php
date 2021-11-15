<?php
session_start();
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/


//print_r($_SESSION);
?>
<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php'; ?>
  <section class="main" id="s1">
    <?php
    //echo $_SESSION['email'];
    ?>
    <div>

      <h2>Quiz: el juego de las preguntas</h2>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>