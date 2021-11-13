<?php
// Constantes para el acceso a datos...
//phpinfo();
DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "3306");
DEFINE("_USERNAME_", "root");
DEFINE("_DATABASE_", "db_G22");
DEFINE("_PASSWORD_", "2000");

require_once 'database.php';
$method = strtoupper($_SERVER['REQUEST_METHOD']);
//$resource = $_SERVER['REQUEST_URI'];

$cnx = Database::Conectar();
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $datos = "";
            $id = $_GET['id'];
            $sql = "SELECT * FROM vips WHERE email='$id'";
            $data = Database::EjecutarConsulta($cnx, $sql);
            if (!empty($data)) {
                echo "<br><br><b>ENHORABUENA " . $id . " ES VIP</b><br>";
                break;
            } else {
                echo "<br><br><b>LO SIENTO " . $id . " NO ES VIP</b><br>";
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
        $id = file_get_contents('php://input');
        $sql = "INSERT INTO vips (email) VALUES ('$id')";
        $respuesta = Database::EjecutarNoConsulta($cnx, $sql);
        echo $id;
        echo $respuesta;
        if ($respuesta == 0) {
            echo "Este usuario ya es VIP";
            break;
        } else {
            echo json_encode(array('insertedVIP' => $id));
            break;
        }


    case 'PUT':
        // Este no hay que implementar
    
    case 'DELETE':
        // Borrado de usuario VIP
        $id = file_get_contents('php://input');
        $sql = "DELETE FROM vips WHERE email = '$id'";
        $respuesta = Database::EjecutarNoConsulta($cnx, $sql);

        if ($respuesta == 0) {
            echo "El usuario " . $vip . " esta en la lista de los VIPS";
        } else {
            echo json_encode(array('Deleted VIP ' => $id));
        }
        
}
Database::Desconectar($cnx);
