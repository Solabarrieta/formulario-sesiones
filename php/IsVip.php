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
            <input name="email" type="text">
            <input type="submit" value="Es VIP?">
        </form>
        <div id="esVipResponse">
            <?php
            $id = $_POST['email'];
            $curl = curl_init();
            $url = "localhost/~oier/formulario-api/php/VipUsers.php?id=" . $id;
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $id);

            ?>

        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>
<?php

?>