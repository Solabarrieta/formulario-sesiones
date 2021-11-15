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
        <h2>Cliente REST para añadir un usuario VIP</h2>
        <form action="" method="post">
            <h1>Añade un usuario</h1>
            <input name="email" type="text">
            <input name="form-button" type="submit" value="Es VIP?">
        </form>
        <div id="esVipResponse">
            <?php
            if (isset($_POST['form-button'])) {
                $id = $_POST['email'];
                $url = "https://sw.ikasten.io/~G22/formulario-api/php/VipUsers.php";
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $id);
                $vip = curl_exec($curl);
                echo $vip;
            }
            ?>

        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>