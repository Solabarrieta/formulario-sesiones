<?php
    include 'database.php';
    $curl=curl_init();
    $url='https:localhost/Formulario-API';
    
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <h2>Cliente REST para saber si el usuario dado es VIP</h2>
        <form action="" method="post">
            <h1>Es VIP?</h1>
            <input type="text">
            <input type="submit" value="Es VIP?">
        </form>
        <div id="esVipResponse">
            <?php
            $curl = curl_init();
            $url = "https://localhost/formulario-api/vipusers";
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $vip = curl_exec($curl);
            echo $vip;

            ?>

        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>
<?php

?>
