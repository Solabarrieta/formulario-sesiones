<!DOCTYPE html>
<html>
<?php
    function viewVips(){
        echo $id;  
        $curl = curl_init();
        $url = "http://localhost/SW-API/php/VipUsers.php";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        $vip = curl_exec($curl);
        echo $vip;
    }
    if(isset($_GET['run'])){
        viewVips();
    }?>

            
<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <h2>Cliente REST para saber si el usuario dado es VIP</h2>
        <form action="" method="post">
            <h1>Es VIP?</h1>
        </form>
        <input type="submit" value="Es VIP?">
        <a href="ShowVips.php?run=true">view changes</a>
        <div id="esVipResponse">
            <p><?php
            echo $vip;
            ?></p>
        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>
