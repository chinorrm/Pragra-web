<?php
include('conexion.php');
    $con= new conexion();
    $con->conectar();

   header('Content-Type: application/json;charset=utf-8');
 
   switch($_POST['metodo']){
        case 'agregarUsuario':
           $paterno = $_POST['aPaterno'];
           $materno = $_POST['aMaterno'];
           $apellidos = $paterno." ".$materno;
           
           $call = mysqli_prepare($con->Conexion_ID,'call Web1.addPersona(?,?,?,?,?,?,?,?,?)');       mysqli_stmt_bind_param($call,'ssssssbis',$_POST['nombre'],$apellidos,$_POST['correo'],$_POST['telefono'],$_POST['colonia'],$_POST['calle'],$_FILES['file'],$_POST['rol'],$_POST['sexo']);
           mysqli_stmt_execute($call);
         
           break;
       case 'agregarProducto':
           $precio = $_POST['precio'];
           echo json_encode($precio);
           $call = mysqli_prepare($con->Conexion_ID,'call Web1.addProducto(?,?,?,?,?,?)');
           mysqli_stmt_bind_param($call,'ssidsb',$_POST['nombre'],$_POST['clave'],$_POST['cantidad'],$_POST['precio'],$_POST['descripcion'],$_FILES['foto']);
           mysqli_stmt_execute($call);
           
           break;
           
       case 'nuevaVenta':
           $precio = $_POST['obtenerProductos'];
           
           $query="SELECT p.idProducto, p.nombre, p.clave, p.cantidad, p.precio, p.descripcion, p.estatus from producto p where p.idProducto=".$_POST['obtenerProductos']."";
           $result = mysqli_query($con->Conexion_ID,$query);
           $array=mysqli_fetch_array($result,MYSQLI_ASSOC);
           echo json_encode($array);
      
           
            break;
           
       case 'ActualizarCantidad':
           $call = mysqli_prepare($con->Conexion_ID,'call farmacia.updateUsuario(?,?)');
           mysqli_stmt_bind_param($call,'ii',$_POST['obtenerProducto'],$_POST['cantidadC']);
            
            mysqli_stmt_execute($call);
            //echo $call;
              
            break;
           
       case 'RealizarVenta':
           
           
           
    }

























    /*switch($_POST['metodo']){ 
            
        case 'obtenProducto':    
            $query="SELECT * FROM productos WHERE clave=".$_POST['claveProducto']."";
            $result = mysqli_query($con->Conexion_ID,$query);
            
            $array=mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            echo json_encode($array);
            break;
            
       case 'insertarUsuario':
            
            $call = mysqli_prepare($con->Conexion_ID,'call farmacia.addUsuarioDireccion(?,?,?,?,?,?,?,?,?,?)');
            
            mysqli_stmt_bind_param($call, 'sssssissss', $_POST['Nombre'],$_POST['APaterno'],$_POST['AMaterno'],$_POST['Usuario'],$_POST['Contrasena'],$_POST['Rol'],$_POST['Colonia'],$_POST['Calle'],$_POST['Numero'],$_POST['CodigoP']);
            
            mysqli_stmt_execute($call);
       break;
            
        case 'obtenerventas':
                $query="SELECT 
                        v.idVenta,
                        v.cedulaDoc,
                        v.fecha,
                        v.hora,
                        v.total
                    FROM ventas v WHERE v.estatus=1";
                $result = mysqli_query($con->Conexion_ID,$query);
            
                while($row  = $result->fetch_array(MYSQL_NUM)){
                    $array[]=$row;
                }
            
                echo json_encode($array);
            break;
            
        case 'obtenerventa':
                $query="SELECT * FROM vw_ventaproducto WHERE idVenta=".$_POST['claveventa']." AND estatusvp=1";
                $result = mysqli_query($con->Conexion_ID,$query);
            
                while($row  = $result->fetch_array(MYSQL_ASSOC)){
                    $array[]=$row;
                }
            
                echo json_encode($array);
            break;
            
        case 'agregarVenta':
            
              $call= mysqli_prepare($con->Conexion_ID,'call farmacia.addVenta(?,?,?,?,?,?,?,?)');
               mysqli_stmt_bind_param($call,'sissdsss',$_POST['cedula'],$_POST['idusuario'],$_POST['fecha'],$_POST['hora'],$_POST['total'],$_POST['productos'],$_POST['cantidades'],$_POST['subtotales']);
               mysqli_stmt_execute($call);
                
              break;
            
        case 'eliminarVenta':
                    
                    $query="UPDATE ventas SET estatus=0 WHERE idVenta=".$_POST['idVenta'];
            
                    echo $query;
                    if($con->Conexion_ID->query($query)===true){
                        echo "exitoso";
                    }else{
                        echo $con->Conexion_ID->error;
                    }
            
              break;
            
        case 'lastId':
              $query="SELECT * FROM ventas ORDER BY idVenta DESC LIMIT 1";
               $result = mysqli_query($con->Conexion_ID,$query);
               $array=mysqli_fetch_array($result,MYSQLI_ASSOC);
               echo json_encode($array);
        break;
            
        case 'obtenerProducto':    
            $query="SELECT * FROM productos WHERE idProducto=".$_POST['idProduct']."";
            $result = mysqli_query($con->Conexion_ID,$query);
            $array=mysqli_fetch_array($result,MYSQLI_ASSOC);
            echo json_encode($array);
            break;
        case 'nuevoProduct':
            $query="call addProducto (0,'".$_POST['nombre']."','".$_POST['descripcion']."','".$_POST['clavePro']."','".$_POST['tipo']."','".$_POST['claveEstante']."',".$_POST['cantidad'].",".$_POST['precio'].",".$_POST['estatus'].");";
            if($con->Conexion_ID->query($query)===true){
                echo "exitoso";
            }else{
                echo $con->Conexion_ID->error;
            }
            break;
        case 'obtenerproductos':
            $query="SELECT p.idProducto, p.nombre, p.tipo, p.diponibilidad,p.claveEstante,p.precio, p.estatus from productos p";
            $result = mysqli_query($con->Conexion_ID,$query);
            
            while($row  = $result->fetch_array(MYSQL_NUM)){
                $array[]=$row;
            }        
            echo json_encode($array);
            break;
        case 'modificarProducto':
            $query="UPDATE productos set nombre='".$_POST['nombre']."',descripcion='".$_POST['descripcion']."',clave='".$_POST['clavePro']."',tipo='".$_POST['tipo']."',claveEstante='".$_POST['claveEstante']."',diponibilidad=".$_POST['cantidad'].",precio=".$_POST['precio'].",estatus=".$_POST['estatus']." where idProducto=".$_POST['idPro'].";";
            echo $query;
            if($con->Conexion_ID->query($query)===true){
                echo "exitoso";
            }else{
                echo $con->Conexion_ID->error;
            }
            break;
        case 'eliminarProducto':
            $query="UPDATE productos set estatus = 0 where idProducto=".$_POST['idPro']."";
            if($con->Conexion_ID->query($query)===true){
                echo "exitoso";
            }else{
                echo $con->Conexion_ID->error;
            }
        break;
            
        //case para borrar usuarios
        case 'deleteUsuarios':
            
            $call = mysqli_prepare($con->Conexion_ID,'call farmacia.deleteUsuarios(?)');
            
            mysqli_stmt_bind_param($call, 'i', $_POST['IdUsuario']);
            
            mysqli_stmt_execute($call);
            
            break;
            
            
         //case para actualizar usuarios
        case 'updateUsuario': 
            
            $call = mysqli_prepare($con->Conexion_ID,'call farmacia.updateUsuario(?,?,?,?,?,?,?,?,?,?,?)');
            
            mysqli_stmt_bind_param($call, 'iisssssssss', $_POST['idUsuario'],$_POST['Rol'],$_POST['Nombre'],$_POST['APaterno'],$_POST['AMaterno'],$_POST['Usuario'],$_POST['Contrasena'],$_POST['Colonia'],$_POST['Calle'],$_POST['Numero'],$_POST['CodigoP']);
            
            mysqli_stmt_execute($call);
            //echo $call;
              
            break;
            
            
        // caso para obtener usuario para el select
        case 'obtenerUsuario':
                $query= "SELECT u.nombre as name,
                                u.paterno,
                                u.materno,
                                u.usuario,
                                u.idUsuario,
                                u.contrasena,
                                r.idRol,
                                d.colonia,
                                d.calle,
                                d.numero,
                                d.cp
                                FROM usuarios u  inner join rol r  on u.idRol = r.idRol inner join direccion d on d.idUsuario = u.idUsuario
                                where u.estatus = 1 and u.idUsuario=".$_POST['idusuario']."";
                $usuario = mysqli_query($con->Conexion_ID,$query);
            
                //echo $query;
                $array=mysqli_fetch_array($usuario,MYSQLI_ASSOC);
            
                echo json_encode($array);
            break;
            
        // caso para obtener los usuarios a los usuarios a la tabla 
        case 'obtenerUsuarios':
                $query= "SELECT  u.nombre as name,
                        CONCAT(u.paterno ,' ', u.materno) apellidos,
                        r.nombre
                        FROM usuarios u  inner join rol r  on u.idRol = r.idRol where u.estatus = 1";
                $usuarios = mysqli_query($con->Conexion_ID,$query);
            
                while($row  = $usuarios->fetch_array(MYSQL_NUM)){
                    $array[]=$row;
                }
            
                echo json_encode($array);
            break;
            
            
        case 'insertarUsuario':
              $consulta="CALL farmacia.addUsuarioDireccion('".$_POST['Nombre']."','".$_POST['APaterno']."','".$_POST['AMaterno']."','".$_POST['Usuario']."','".$_POST['Contrasena']."',".$_POST['Rol'].",'".$_POST['Colonia']."','".$_POST['Calle']."','".$_POST['Numero']."','".$_POST['CodigoP']."')";
            
              echo $consulta;
            
              if($con->Conexion_ID->query($consulta)===true){
                  echo "exitoso";
              }else{
                  echo $con->Conexion_ID->error;
              }
              break;
            
        case 'login':
                
                $query="SELECT * FROM usuarios WHERE usuario='".$_POST['usuario']."' AND estatus=1";
                $result = mysqli_query($con->Conexion_ID,$query);
                 while($row  = $result->fetch_array(MYSQL_ASSOC)){
                    if($row['contrasena']==$_POST['contrasena']){ 
                        session_start();
                        $_SESSION['idUsuario']=$row['idUsuario'];
                        $_SESSION['idRol']=$row['idRol'];
                        echo json_encode($row);
                        
                    }
                  }
            break;
            
        case 'logout':
                    session_destroy();
            break;
                
    }*/


?>


    