<?php
    require 'Slim/Slim.php';
    require "funciones.php";

    // El framework Slim tiene definido un namespace llamado Slim
    // Por eso aparece \Slim\ antes del nombre de la clase.
    \Slim\Slim::registerAutoloader();

    // Creamos la aplicación
    $app = new \Slim\Slim();

    // Indicamos el tipo de contenido y condificación que devolveremos desde el framework Slim
    $app->contentType('application/json; charset=utf-8');

    $app->post('/registroUsuario',function(){
        echo json_encode(registrarUsuario($_POST["planPago"],$_POST["nombre"],$_POST["apellidos"],md5($_POST["clave"]),$_POST["telefono"],$_POST["edad"],$_POST["correo"],$_POST["direccion"],$_POST["ciudad"],$_POST["observaciones"],md5($_POST["tarjeta"])),JSON_FORCE_OBJECT);
    });

    $app->get('/obtenerPlanesPago', function (){
        echo json_encode(obtenerPlanesPago(),JSON_FORCE_OBJECT);
    });

    // Definimos las respuesta de la ruta base con un tipo de consulta GET
    /*$app->get('/productos', function ()
        {
            echo json_encode(obtener_productos(),JSON_FORCE_OBJECT);
        }
    );

    $app->get('/productos/:busqueda', function($busqueda)
        {
            echo json_encode(obtener_productos_busqueda($busqueda),JSON_FORCE_OBJECT);
        }
    );

    $app->post('/producto/insertar', function ()
        {
            echo json_encode(insertar_producto($_POST["cod"],$_POST["nombre"],$_POST["nombre_corto"],$_POST["descripcion"],$_POST["PVP"],$_POST["familia"]),JSON_FORCE_OBJECT);
        }
    );

    $app->put('/producto/actualizar/:codigo', function ($codigo) use ($app)
        {
            $datos=$app->request->put();
            echo json_encode(actualizar_producto($codigo,$datos["nombre"],$datos["nombre_corto"],$datos["descripcion"],$datos["PVP"],$datos["familia"]),JSON_FORCE_OBJECT);
        }
    );

    $app->delete('/producto/borrar/:codigo', function ($codigo) use ($app)
        {
            echo json_encode(eliminar_producto($codigo),JSON_FORCE_OBJECT);
        }
    );*/
   
    // Ejecutamos la aplicación creada
    $app->run();
?>