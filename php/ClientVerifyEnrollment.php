<?php

$soapclient = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl') or die('No se ha podido conectar al server');
$yo = 'osolabarrieta001@ikasle.ehu.eus';
$result = $soapclient->comprobar($yo);
echo $result;
