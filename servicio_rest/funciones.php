<?php
    require "conexion_bd.php";

    function registrarUsuario($planPago,$nombre,$apellidos,$clave,$telefono,$edad,$correo,$direccion,$ciudad,$observaciones,$tarjeta){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="INSERT into jmra_clientes(idPlanPago,nombre,apellidos,clave,telefono,edad,correo,direccion,ciudad,observaciones,tarjeta) values('".$planPago."','".$nombre."','".$apellidos."','".$clave."','".$telefono."','".$edad."','".$correo."','".$direccion."','".$ciudad."','".$observaciones."','".$tarjeta."')";

            if($resultado=mysqli_query($con,$consulta)){
                $id=mysqli_insert_id($con);
                $mensaje=$id;
                return array("mensaje"=>$mensaje);
            }else{ 
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    function obtenerPlanesPago(){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="SELECT * FROM jmra_planpago";
            
            if($resultado=mysqli_query($con,$consulta)){

                $planesPago=Array();
                while($fila=mysqli_fetch_assoc($resultado)){
                    $planesPago[]=$fila;
                }

                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("planesPago"=>$planesPago);

            }else{
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    function login($id,$clave){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="SELECT * FROM jmra_clientes WHERE idCliente='".$id."' and clave='".$clave."'";

            if($resultado=mysqli_query($con,$consulta)){

                if(mysqli_num_rows($resultado)>0){
                    return array("cliente"=>mysqli_fetch_assoc($resultado));
                }else{
                    return array("mensaje"=>"Login incorrecto. Introduce los datos correctos");
                }

            }else{
                $mensaje="Imposible realizar la consulta. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    function obtenerTabla($tabla){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="SELECT * FROM ".$tabla;
            
            if($resultado=mysqli_query($con,$consulta)){

                $tabla=Array();
                while($fila=mysqli_fetch_assoc($resultado)){
                    $tabla[]=$fila;
                }

                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("tabla"=>$tabla);

            }else{
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    function obtenerTablas(){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="SHOW TABLES";
            
            if($resultado=mysqli_query($con,$consulta)){

                $tablas=Array();
                while($fila=mysqli_fetch_assoc($resultado)){
                    $tablas[]=$fila;
                }

                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("tablas"=>$tablas);

            }else{
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    function obtenerActividad($id){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="SELECT * FROM jmra_actividades WHERE idActividad='".$id."'";
            
            if($resultado=mysqli_query($con,$consulta)){

                $fila=mysqli_fetch_assoc($resultado);

                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("actividad"=>$fila);

            }else{
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    function aniadirActividad($nombre,$descripcion,$maximo,$aforo,$formacion){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="INSERT into jmra_actividades(nombre,descripcion,maximo,aforo,formacion) values('".$nombre."','".$descripcion."','".$maximo."','".$aforo."','".$formacion."')";

            if($resultado=mysqli_query($con,$consulta)){
                $id=mysqli_insert_id($con);
                $mensaje="Actividad introducida correctamente";
                return array("mensaje"=>$mensaje);
            }else{ 
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    function borrarActividad($id){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="DELETE FROM jmra_actividades WHERE idActividad='".$id."'";

            if($resultado=mysqli_query($con,$consulta)){
                $mensaje="Actividad borrada correctamente";
                return array("mensaje"=>$mensaje);
            }else{ 
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    /*function obtener_productos(){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="SELECT * FROM producto";
            
            if($resultado=mysqli_query($con,$consulta)){

                $productos=Array();
                while($fila=mysqli_fetch_assoc($resultado)){
                    $productos[]=$fila;
                }

                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("productos"=>$productos);

            }else{
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }*/

?>