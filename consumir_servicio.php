<?php
function consumir_servicio_REST($url, $metodo, $datos = null)
{
    //url contra la que atacamos
    $llamada = curl_init($url);

    //a true, obtendremos una respuesta de la url, en otro caso, 
    //true si es correcto, false si no lo es
    curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);

    //establecemos el verbo http que queremos utilizar para la petición
    curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, $metodo);

    if (isset($datos)) {
        curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($datos));
    }
    //obtenemos la respuesta
    $response = curl_exec($llamada);

    // Se cierra el recurso CURL y se liberan los recursos del sistema
    curl_close($llamada);
    if (!$response) {
        die("Error al consumir el servicio Web: " . $url);
    } else {
        //$decodedText=substr($response,3,strlen($response)-1);
        return json_decode($response);
    }
}

$enlace="http://localhost/proyectoFinal/servicio_rest";
?>