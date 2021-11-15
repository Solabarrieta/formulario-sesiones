<?php
session_start();
if($_SESSION['rol']!='prof'){
    echo "Debe ser profesor para poder acceder a esta pagina";
    die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <h2>Cliente REST para mostrar un listado de usuarios VIP</h2>
        <form action="" method="post">
            <h1>Usuarios VIP: </h1>
            <input name="form-button" type="submit" value="Mostrar VIPS" style="margin: 25px;">
        </form>
        <div id="esVipResponse" style="margin: 20px;">
            <?php
            if (isset($_POST['form-button'])) {
                $curl = curl_init();
                $url = "https://sw.ikasten.io/~G22/formulario-api/php/VipUsers.php";
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                $vip = curl_exec($curl);

                echo $vip;
            }


            ?>

        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>