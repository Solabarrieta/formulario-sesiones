<?php
session_start();

if (!isset($_SESSION['correo'])) {
    echo '<script type="text/javascript"> alert("Debe debes ser ADMINISTRADOR para estar en esta pagina!! ");
    window.location.href="LogIn.php";
    </script>';
}



DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "3306");
DEFINE("_USERNAME_", "oier");
DEFINE("_DATABASE_", "Quiz");
DEFINE("_PASSWORD_", "4258");


require_once 'database.php';

$message = '¿ Seguro que quiere borrar a este usuario ?';



$cnx = Database::Conectar();


if (isset($_POST['email'])) {

    $correo = $_POST['email'];

    $sql = "DELETE FROM users WHERE correo = '$correo'";
    Database::EjecutarNoConsulta($cnx, $sql);
}

Database::Desconectar($cnx);
