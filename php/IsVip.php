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
            echo "hola";
            $curl = curl_init();
            //vipusers.php?id=$1
            $url = "http://localhost/vipusers/";
            curl_setopt($curl, CURLOPT_URL, $url); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_exec($curl);
            curl_close($curl);
            echo "Solucion: ";
            echo $vip;
            /*
            $url="http://localhost/test.php";
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_POST, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
            curl_exec($handle);

            echo '<br>esto';
            echo $vip;
            */
            ?>

        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>
<?php

?>
