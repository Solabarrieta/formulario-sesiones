<?php
session_start();
if ($_SESSION['rol'] != 'admin') {
    echo '<script type="text/javascript"> alert("Debe debes ser ADMINISTRADOR para estar en esta pagina!! ");
                 window.location.href="LogIn.php";
    </script>';
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <?php
    function modificarEstado($correoinput, $estado)
    {
        echo "ha entrado a la funcion";
        echo "<br>";
        echo $correoinput;
        echo "<br>";
        echo $estado;
        echo "<br>";
        require_once 'database.php';
        DEFINE("_HOST_", "localhost");
        DEFINE("_PORT_", "3306");
        DEFINE("_USERNAME_", "root");
        DEFINE("_DATABASE_", "db_G22");
        DEFINE("_PASSWORD_", "2000");
        $cnx = Database::Conectar()or die('no ha sido posible conectarse');
        
        
        if ($estado == 'activo') {
            $sql = "UPDATE users  SET estado = 'bloqueado' WHERE correo = '$correoinput'";
        } else if ($estado == 'bloqueado') {
            $sql = "UPDATE users  SET estado = 'activo' WHERE correo = '$correoinput'";
        }
        //$sql= "UPDATE TABLE users  SET estado = 'activo' WHERE correo = '$correoinput'";
        Database::EjecutarNoConsulta($cnx, $sql) or die('no ha sido posible ejecutar la consulta');
        Database::Desconectar($cnx);
    }
    if (isset($_POST['id']) && isset($_POST['estadofun'])) {
        echo "hola";
        $funcionid=$_POST['id'];
        $functionestate=$_POST['estadofun'];
        modificarEstado($funcionid,$functionestate);
    }

    ?>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <div>
            <style>
                td,
                th {
                    margin: 25px 0;
                    font-size: 0.9em;
                    font-family: sans-serif;
                    padding: 6px;
                    border: solid 2px #c1e9f6;
                }

                table {
                    border-collapse: collapse;
                }

                .imgPrev {
                    display: block;
                    width: 100%;
                    height: auto;
                }

                .imgPrev2 {
                    display: block;
                    width: 100px;
                    height: 100px;
                }
            </style>


            <?php
            //Conectamos con la base de datos mysql
            include 'DbConfig.php';
            $conn = mysqli_connect($server, $user, $pass, $basededatos);
            $conn->set_charset("utf8");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            //Cogemos los datos de la tabla
            $result = mysqli_query($conn, "SELECT * from users");

            echo '<table id="tablaPersonas">';
            echo "<thead><tr>
        <th id='email'>EMAIL</th>
        <th>PASS</th>
        <th>IMAGEN</th>
        <th>ESTADO</th>
        <th>BLOQUEO</th>
        <th>BORRAR</th>
        </tr></thead><tbody>";


            while ($row = mysqli_fetch_array($result)) {
                if ($row['correo'] != 'admin@ehu.es') {


                    echo
                    "<tr>
                     <td>" . $row['correo'] . "</td>" .
                        "<td>" . $row['pass'] . "</td>" .
                        "<td><img src=" . $row['imagen'] . " class='imgPrev2'></img></td>" .
                        "<td>" . $row['estado'] . "</td>
                        <td></td>
                        <td></td>
                        </tr>";
                }
            }

            echo "</tbody></table>";
            ?>

        </div>
    </section>
    <?php include '../html/Footer.html' ?>
    <!--<script src="../js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">-->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script src="../js/gestionarAccount.js"></script>
</body>

</html>