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
        echo json_encode(registrarUsuario($_POST["planPago"],$_POST["nombre"],$_POST["apellidos"],$_POST["clave"],$_POST["telefono"],$_POST["edad"],$_POST["correo"],$_POST["direccion"],$_POST["ciudad"],$_POST["observaciones"],$_POST["tarjeta"]),JSON_FORCE_OBJECT);
    });

    $app->get('/obtenerPlanesPago', function (){
        echo json_encode(obtenerPlanesPago(),JSON_FORCE_OBJECT);
    });

    $app->post('/login', function(){
        echo json_encode(login($_POST["idCliente"],$_POST["clave"]),JSON_FORCE_OBJECT);
    });

    $app->get('/obtenerTabla/:tabla',function($tabla){
        echo json_encode(obtenerTabla($tabla),JSON_FORCE_OBJECT);
    });

    $app->get('/obtenerTablas',function(){
        echo json_encode(obtenerTablas(),JSON_FORCE_OBJECT);
    });

    $app->get('/obtenerActividad/:id',function($id){
        echo json_encode(obtenerActividad($id),JSON_FORCE_OBJECT);
    });

    $app->post('/aniadirActividad',function(){
        echo json_encode(aniadirActividad($_POST["nombre"],$_POST["descripcion"],$_POST["maximo"],$_POST["aforo"],$_POST["formacion"],$_POST["foto"]),JSON_FORCE_OBJECT);
    });

    $app->delete('/borrarActividad/:id', function ($id){
        echo json_encode(borrarActividad($id),JSON_FORCE_OBJECT);
    });

    $app->put('/actualizarActividad/:id', function ($id) use ($app){
        $datos=$app->request->put();
        echo json_encode(actualizarActividad($id,$datos["nombre"],$datos["descripcion"],$datos["maximo"],$datos["aforo"],$datos["formacion"],$datos["foto"]),JSON_FORCE_OBJECT);
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