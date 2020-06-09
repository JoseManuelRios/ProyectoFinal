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

    function obtenerCorreo($correo){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="SELECT * FROM jmra_clientes WHERE correo='".$correo."'";
            
            if($resultado=mysqli_query($con,$consulta)){

                if(mysqli_num_rows($resultado)>0){
                    mysqli_free_result($resultado);
                    mysqli_close($con);
                    return array("correo"=>"Existe un usuario con el correo ".$correo);
                }else{
                    mysqli_free_result($resultado);
                    mysqli_close($con);
                    return array("mensaje"=>"No existe ningun usuario con el correo ".$correo);
                }
            }else{
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    function login($correo,$clave){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="SELECT * FROM jmra_clientes WHERE correo='".$correo."' and clave='".$clave."'";

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

    function aniadirActividad($nombre,$descripcion,$maximo,$aforo,$formacion,$foto){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="INSERT into jmra_actividades(nombre,descripcion,maximo,aforo,formacion) values('".$nombre."','".$descripcion."','".$maximo."','".$aforo."','".$formacion."')";
            if($resultado=mysqli_query($con,$consulta)){
                if($foto!=""){
					$array=explode(".",$foto);
					$extension=end($array);
                    $consulta="UPDATE jmra_actividades set foto='actividad".mysqli_insert_id($con).".".$extension."' where idActividad='".mysqli_insert_id($con)."'";
                    $mensaje="actividad".mysqli_insert_id($con).".".$extension;
					if($resultado2=mysqli_query($con,$consulta)){
                        return array("mensaje"=>$mensaje);
					}else{
						echo "<p>No se pudo subir una imagen</p>";
					}
				}
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

    function actualizarActividad($id,$nombre,$descripcion,$maximo,$aforo,$formacion,$foto){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            if($foto!=""){  
                $array=explode(".",$foto);
				$extension=end($array);
                $consulta="UPDATE jmra_actividades set nombre='".$nombre."', descripcion='".$descripcion."', maximo='".$maximo."', aforo='".$aforo."', formacion='".$formacion."', foto='actividad".$id.".".$extension."' WHERE idActividad='".$id."'";
            }else{
                $consulta="UPDATE jmra_actividades set nombre='".$nombre."', descripcion='".$descripcion."', maximo='".$maximo."', aforo='".$aforo."', formacion='".$formacion."' WHERE idActividad='".$id."'";
            }

            if($resultado=mysqli_query($con,$consulta)){
                $mensaje="Actividad actualizada correctamente";
                return array("mensaje"=>$mensaje);
            }else{ 
                $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
        }
    }

    function aniadirClase($idActividad,$idCliente,$fecha,$hora){
        $con=conectar();
        if(!$con){
            return array("mensaje_error"=>"Imposible conectar. Error número ".mysqli_connect_errno().":".mysqli_connect_error());
        }else{
            mysqli_set_charset($con,"utf8");
            $consulta="SELECT * FROM jmra_clases WHERE fecha='".$fecha."' and hora='".$hora."' and info='si'";
            if($resultado=mysqli_query($con,$consulta)){
                $fila=mysqli_fetch_assoc($resultado);
                $consulta2="INSERT into jmra_clases(idActividad,idCliente,idMonitor,idAula,fecha,hora) values('".$idActividad."','".$idCliente."','".$fila["idMonitor"]."','".$fila["idAula"]."','".$fecha."','".$hora."')";
                if($resultado2=mysqli_query($con,$consulta2)){
                    $mensaje="Clase introducida correctamente";
                    return array("mensaje"=>$mensaje);
                }else{
                    $mensaje="Imposible conectar. Error número ".mysqli_errno($con).":".mysqli_error($con);
                    mysqli_close($con);
                    return array("mensaje_error"=>$mensaje);
                }
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