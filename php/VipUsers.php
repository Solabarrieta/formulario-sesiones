<?php
// Constantes para el acceso a datos...
//phpinfo();
DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "3306");
DEFINE("_USERNAME_", "root");
DEFINE("_DATABASE_", "db_G22");
DEFINE("_PASSWORD_", "2000");

require_once 'database.php';
$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];

$cnx = Database::Conectar();
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $datos = "";
            $id = $_GET['id'];
            $sql = "SELECT * FROM vips WHERE email='$id'";
            $data = Database::EjecutarConsulta($cnx, $sql);
            if ($id==1) {
                echo "<br><br><b>ENHORABUENA " . $id . " ES VIP</b><br><img src=../images/ok.gif>";
                break;
            } else {
                echo "<br><br><b>LO SIENTO " . $id . " NO ES VIP</b><br><img src=../images/mal.gif>";
                break;
            }
        } else {
            $sql = "SELECT * FROM vips";
            $data = Database::EjecutarConsulta($cnx, $sql);

            $json = json_encode($data);

            echo $json;
        }
        break;
    case 'POST':
        // Para añadir VIPS
    case 'PUT':
        // Este no hay que implementar
    case 'DELETE':
        // Borrado de usuario VIP
}
Database::Desconectar($cnx);
