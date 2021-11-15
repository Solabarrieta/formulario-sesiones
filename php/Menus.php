<div id='page-wrap'>
  <header class='main' id='h1'>
    <?php if (!isset($_SESSION['correo'])) { ?>



      <span class="right"><a href="SignUp.php">Registro</a></span>
      <span class="right"><a href="LogIn.php">Login</a></span>
    <?php } else { ?>
      <span class="right"><a href="LogOut.php">Logout</a><?php echo ' ' . $_SESSION['correo'] ?></span>
    <?php } ?>

  </header>
  <nav class='main' id='n1' role='navigation'>
    <?php if (isset($_SESSION['correo'])) { ?>

      <span><a href="Layout.php"> Inicio</a></span>
      <span><a href="Credits.php">Creditos</a></span>
      <span><a href="HandlingQuizesAjax.php"> Insertar Pregunta </a></span>
      <span><a href="ShowQuestionsWithImage.php"> Ver Preguntas </a></span>
      <span><a href="ShowXMLQuestionsWithImage.php"> Ver Preguntas XML</a></span>
      <span><a href="ShowJsonQuestionsWithImage.php"> Ver Preguntas JSON</a></span>

      <?php
      $id = $_SESSION["correo"];

      if ($_SESSION['rol'] == 'prof') { ?>
        <span><a href="IsVip.php"> EsVip?</a></span>
        <span><a href="AddVipUser.php">Añadir usuario VIP</a></span>
        <span><a href="DeleteVipUser.php">Eliminar Usuario VIP</a></span>
        <span><a href="ShowVips.php">Mostrar VIPS</a></span>
      <?php
      }
    } else { ?>
      <span><a href="Layout.php"> Inicio</a></span>
      <span><a href="Credits.php">Creditos</a></span>
    <?php } ?>

  </nav>

  <!--<script type="text/javascript" src="../js/todos.js"></script>-->