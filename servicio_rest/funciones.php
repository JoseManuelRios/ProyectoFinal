<?php
    require "conexion_bd.php";

    function registrarUsuario($planPago,$nombre,$apellidos,$clave,$telefono,$edad,$correo,$direccion,$ciudad,$observaciones,$tarjeta){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="INSERT into clientes(idPlanPago,nombre,apellidos,clave,telefono,edad,correo,direccion,ciudad,observaciones,tarjeta) values('".$planPago."','".$nombre."','".$apellidos."','".$clave."','".$telefono."','".$edad."','".$correo."','".$direccion."','".$ciudad."','".$observaciones."','".$tarjeta."')";

            if($resultado=mysqli_query($con,$consulta)){
                $mensaje="Usuario insertado con éxito";
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
            $consulta="SELECT * FROM planpago";
            
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
            $consulta="SELECT * FROM clientes WHERE idCliente='".$id."' and clave='".$clave."'";

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