<?php
    require "conexion_bd.php";

    function registrarUsuario($nombre,$apellidos,$clave,$telefono,$edad,$correo,$direccion,$ciudad,$observaciones,$tarjeta){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="INSERT into clientes(nombre,apellidos,clave,telefono,edad,correo,direccion,ciudad,observaciones,tarjeta) values('".$nombre."','".$apellidos."','".$clave."','".$telefono."','".$edad."','".$correo."','".$direccion."','".$ciudad."','".$observaciones."','".$tarjeta."')";

            if($resultado=mysqli_query($con,$consulta)){
                $mensaje="Usuario insertado con éxito";
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