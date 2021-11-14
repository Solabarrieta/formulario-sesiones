<div id='page-wrap'>
  <header class='main' id='h1'>
    <?php if (!isset($_GET['correo'])) { ?>



      <span class="right"><a href="SignUp.php">Registro</a></span>
      <span class="right"><a href="LogIn.php">Login</a></span>
    <?php } else { ?>
      <span class="right"><a href="LogOut.php">Logout</a><?php echo ' ' . $_GET['correo'] ?></span>
    <?php } ?>

  </header>
  <nav class='main' id='n1' role='navigation'>
    <?php if (isset($_GET['correo'])) { ?>

      <span><a href="Layout.php?correo=<?php echo $_GET["correo"]; ?>"> Inicio</a></span>
      <span><a href="Credits.php?correo=<?php echo $_GET["correo"]; ?>">Creditos</a></span>
      <span><a href="HandlingQuizesAjax.php?correo=<?php echo $_GET["correo"]; ?>"> Insertar Pregunta </a></span>
      <span><a href="ShowQuestionsWithImage.php?correo=<?php echo $_GET["correo"]; ?>"> Ver Preguntas </a></span>
      <span><a href="ShowXMLQuestionsWithImage.php?correo=<?php echo $_GET["correo"]; ?>"> Ver Preguntas XML</a></span>
      <span><a href="ShowJsonQuestionsWithImage.php?correo=<?php echo $_GET["correo"]; ?>"> Ver Preguntas JSON</a></span>

      <?php
      DEFINE("_HOST_", "localhost");
      DEFINE("_PORT_", "3306");
      DEFINE("_USERNAME_", "G22");
      DEFINE("_DATABASE_", "db_G22");
      DEFINE("_PASSWORD_", "TWTnlYm33HtAL");
      $id = $_GET["correo"];

      require_once 'database.php';
      $cnx = Database::Conectar();
      $sql = "SELECT * FROM users WHERE tipouser='prof' and correo='$id'";
      $data = Database::EjecutarConsulta($cnx, $sql);
      if (!empty($data)) { ?>
        <span><a href="IsVip.php?correo=<?php echo $_GET["correo"]; ?>"> EsVip?</a></span>
        <span><a href="AddVipUser.php?correo=<?php echo $_GET["correo"]; ?>">Añadir usuario VIP</a></span>
        <span><a href="DeleteVipUser.php?correo=<?php echo $_GET["correo"]; ?>">Eliminar Usuario VIP</a></span>
        <span><a href="ShowVips.php?correo=<?php echo $_GET["correo"]; ?>">Mostrar VIPS</a></span>
      <?php
      }


      $er2 = "/^[a-zA-Z]+\.[a-zA-Z]+@ehu\.(eus|es)$/";
      $er3 = "/^[a-zA-Z]+@ehu\.(eus|es)$/";

      if (preg_match($er2, $id) || preg_match($er3, $id)) { ?>
      <?php } ?>


    <?php } else { ?>
      <span><a href="Layout.php"> Inicio</a></span>
      <span><a href="Credits.php">Creditos</a></span>
    <?php } ?>

  </nav>

  <!--<script type="text/javascript" src="../js/todos.js"></script>-->