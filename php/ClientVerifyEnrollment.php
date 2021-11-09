<?php
if(isset($correo)){
    $soapClient = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl');
    echo $correo;
    $response=$soapClient -> comprobar($correo);
    $valido=False;
    echo $response;
    if($response=='SI'){
        $valido=True;
    }else{
        $valido=False;
    }
}
