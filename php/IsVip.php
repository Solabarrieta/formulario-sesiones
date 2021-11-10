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
            <input name="id" type="text">
            <input id="form-button" name="form-button" type="submit" value="Es VIP?">
        </form>
        <div id="esVipResponse">
            <?php
            if (isset($_POST['form-button'])) {
                $id = $_POST['id'];
                echo $id . PHP_EOL;
                $curl = curl_init();
                $url = "http://localhost/~oier/formulario-api/php/VipUsers.php?id=" . $id;
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                $vip = curl_exec($curl);

                if (empty($vip)) {
                    echo 'No hay nada!' . PHP_EOL;
                } else {
                    echo $vip;
                }
            }
            ?>

        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>
<?php

?>