<?php
session_start();
if(!(isset( $_SESSION['idUsuario']))){
    header('Location: ../index.php');
    exit();
}


include('../conexion.php');
    $con= new conexion();
    $con->conectar();
    $query="SELECT * FROM productos";
    $productos = mysqli_query($con->Conexion_ID,$query);
    
?>
<html>
<head>
	<title>Productos</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="keywords" content="menu, navigation, animation, transition, transform, rotate, css3, web design, component, icon, slide" />
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/datatable.css">
</head>
<body>
	<div clas="container-fluid">
		<div class="col-xs-12 col-sm-6 col-md-3">
			<br>
			<img src="../img/logotipo.png" style="margin-left:18%">
			<ul id="tabs" class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="#registroproductos" data-toggle="tab" align="center">Registro de Productos</a></li>
                <li role="presentation"><a href="#nuevoproducto" data-toggle="tab" align="center">Nuevo Producto</a></li>
                <li role="presentation"><a href="#modificarproducto" data-toggle="tab" align="center">Modificar de Productos</a></li><hr>
                    <div id="divinicio" style="display:none;"><li><button type="button" id="inicio" onclick="location.href='inicio.php'" class="btn btn-primary btn-block">Inicio</button></li></div><br>
                <li role="presentation"><button type="button" class="btn btn-danger btn-block" id="logout">Cerrar sesion</button></li>
            </ul>
		</div>
		
        <div id="my-tab-content" class="tab-content col-xs-12 col-sm-9 col-md-8 ">
             
             <!-------------------------------------------------------------------------------->
             <!-------------------------TAB DE REGISTRO PRODUCTO ------------------------------>
             <!-------------------------------------------------------------------------------->
            <div class="tab-pane active" id="registroproductos">
                <center><h1>Registro de Productos</h1></center> <br>   
                <input type="hidden" id="idderol" value="<?php echo $_SESSION['idRol'] ?>">
                <div class="col-sm-11 col-md-11 col-sm-offset-1">
                    <div>
                        <table id="tablaproductos" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Cantidad</th>
                                    <th>Clave estante</th>
                                    <th>Precio</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

             <!-------------------------------------------------------------------------------->
             <!---------------------TAB REGISTRO DE NUEVO PRODUCTO ----------------------------->
             <!-------------------------------------------------------------------------------->    
            <div class="tab-pane" id="nuevoproducto">
                <center><h1>Nuevo Producto</h1></center><br>
                <form id="nuevoProducto" >
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <h4>Nombre del producto:</h4>
                            <input type="text" class="form-control" placeholder="Nombre" id="nombre">
                            <h4>Tipo:</h4>
                            <select class="form-control" id="tipo">
                                <option>Seleccionar tipo...</option>
                                <option>Controlado</option>
                                <option>No controlado</option>
                            </select>
                            <h4>Clave de estante: </h4>
                            <input type="text" class="form-control" placeholder="Clave estante" id="claveEstante">
                            <h4>Estatus</h4>
                            <select class="form-control" id="estatus">
                                <option>Seleccionar estatus...</option>
                                <option>Disponible</option>
                                <option>No disponible</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <h4>Clave:</h4>
                            <input type="text" class="form-control" placeholder="Clave" id="clavePro">
                            <h4>Disponibilidad:</h4>
                            <input type="number" class="form-control" min="1" placeholder="Cantidad" id="cantidad">
                            <h4>Precio: </h4>
                            <input type="text" class="form-control" placeholder="Precio" id="precio">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-10">
                            <h4>Descripcion:</h4>
                            <textarea class="form-control" rows="5" id="descripcion"></textarea><br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-warning btn-block" id="cancelarNuevoPro">Cancelar</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success btn-block" id="nuevoProducto">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" tabindex="-1" role="dialog" id="productoGuardado">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" align="center">PRODUCTO GUARDADO</h4>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </form><br><br>
            </div>
            <!-------------------------------------------------------------------------------->
             <!----------------------------TAB MODIFICAR PRODUCTO ------------------------------>
             <!-------------------------------------------------------------------------------->
             
            <div class="tab-pane" id="modificarproducto">
                <center><h1>Modificar Producto</h1></center><br><br>
                <form id="modificarProducto">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <label for="buscarPro" style="width:100%; margin-top:4%;">
                                <h4>Nombre del producto:</h4>
                                <select class="form-control" id="buscarPro" style="width:100%;">
                                    <option selected="selected">Selecciona un producto...</option>
                                    <?php
                                        while ($fila = mysqli_fetch_array($productos, MYSQL_ASSOC)) {
                                            printf("<option value='%s'> %s : %s</option>", $fila['idProducto'],$fila['idProducto'],$fila['nombre']);  
                                        }
                                    ?>  
                                <select>
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <h4>Nombre del producto:</h4>
                            <input type="text" class="form-control" placeholder="Nombre" id="modificarNombre">
                            <h4>Tipo:</h4>
                            <select class="form-control" id="modificarTipo">
                                <option selected="selected">Seleccionar tipo...</option>
                                <option>Controlado</option>
                                <option>No controlado</option>
                            </select>
                            <h4>Clave de estante: </h4>
                            <input type="text" class="form-control" placeholder="Clave estante" id="modificarClaveEstante">
                            <h4>Estatus</h4>    
                            <select class="form-control" id="modificarEstatus">
                                <option selected="selected">Seleccionar estatus...</option>
                                <option>Disponible</option>
                                <option>No disponible</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <h4>Clave:</h4>
                            <input type="text" class="form-control" placeholder="Clave" id="modificarClavePro">
                            <h4>Disponibilidad:</h4>
                            <input type="number" class="form-control" placeholder="Cantidad" id="modificarCantidad">
                            <h4>Precio: </h4>
                            <input type="text" class="form-control" placeholder="Precio" id="modificarPrecio">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-10">
                            <h4>Descripcion:</h4>
                            <textarea class="form-control" rows="5" id="modificarDescripcion"></textarea><br>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-warning btn-block" id="cancelarModificarPro">Cancelar</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success btn-block" id="modificarProducto">Guardar</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger btn-block" id="eliminarProducto">Borrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" tabindex="-1" role="dialog" id="productoModificado">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" align="Center">PRODUCTO MODIFICADO</h4>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </form>
            </div>
        </div>
	</div>


    <script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/select2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../js/datatable.min.js"></script>
</body>
</html>

<script language="javascript">

$(document).ready(function() {
    
     var rool= $("#idderol").val();
        
        if(rool==1){
            document.getElementById('divinicio').style.display = 'block';
        }
    
    
    
     $('#logout').on('click',function(e){
              $.ajax({
                   url: '../ajax.php',
                   type:'post',
                   dataType:'json',
                   data:{
                   metodo:"logout"
                   }
                })
                .always(function(data){
                  location.href="../index.php";
                })
             
             
         })
 

    /**************************************
        Cargar la tabla de registros
    **************************************/
    $.ajax({
       url: '../ajax.php',
       type:'post',
       dataType:'json',
       data:{
       metodo:"obtenerproductos"
       }
    })
    .done(function(data){
     
     console.log(data);               
     
     $('#tablaproductos').DataTable( {
        "aaData":data
       });
    })
    /**************************************
          MANDAR LOS PARAMETROS DEL INSERT
    **************************************/
    $('#nuevoProducto').on('submit',function(e){
        e.preventDefault();
        var nombre = $("#nombre").val();
        var clavePro = $("#clavePro").val();
        var tipo = $("#tipo").val();
        var claveEstante = $("#claveEstante").val();
        var precio = $("#precio").val();
        var descripcion = $("#descripcion").val();
        var cantidad = $("#cantidad").val();
        var estatus = $("#estatus").val();
        if(estatus=="Disponible"){
            estatus=1;
        }else{
            estatus=0;
        }
        $.ajax({
            url:'../ajax.php',
            type:'post',
            dataType:'json',
            data:{
                nombre: nombre,
                clavePro : clavePro,
                tipo : tipo,
                claveEstante : claveEstante,
                precio : precio,
                descripcion : descripcion,
                cantidad : cantidad,
                estatus : estatus,
                metodo:"nuevoProduct"
            }
        }).fail(function(e){
            console.log("fail");
            console.log(e);
        }).always(function(){
            console.log("always");
            $('#productoGuardado').modal('show');
        });
    });

    /**************************************
          MANDAR PARAMETROS PARA EL UPDATE
    **************************************/
    $('#modificarProducto').on('submit',function(e){
        e.preventDefault();
        var nombre = $("#modificarNombre").val();
        var clavePro = $("#modificarClavePro").val();
        var tipo = $("#modificarTipo").val();
        var claveEstante = $("#modificarClaveEstante").val();
        var precio = $("#modificarPrecio").val();
        var descripcion = $("#modificarDescripcion").val();
        var cantidad = $("#modificarCantidad").val();
        var modificarEstatus =$("#modificarEstatus").val();
        var idPro= $("#buscarPro").val();
        if(modificarEstatus=="Disponible"){
            estatus=1;
        }else{
            estatus=0;
        }
        $.ajax({
            url:'../ajax.php',
            type:'post',
            dataType:'json',
            data:{
                nombre: nombre,
                clavePro : clavePro,
                tipo : tipo,
                claveEstante : claveEstante,
                precio : precio,
                descripcion : descripcion,
                cantidad : cantidad,
                estatus : estatus,
                idPro : idPro,
                metodo:"modificarProducto"
            }
        }).fail(function(e){
            console.log("fail");
            console.log(e);
        }).always(function(){
            console.log("always");
            $('#productoModificado').modal('show');
        });
    });

    /**************************************
          buscar los productos
             
    **************************************/
    $('#buscarPro').on('change',function(e){
        e.preventDefault();
        var idProduct= $("#buscarPro").val();
        console.log("producto: "+idProduct);
         
        $.ajax({
            url: '../ajax.php',
            type:'post',
            dataType:'json',
            data:{
                idProduct: idProduct,
                metodo:"obtenerProducto"
            }
        }).done(function(data){
            console.log(data);
            if(data.estatus==1){
                $("#modificarEstatus").val("Disponible");
            }else if(data.estatus==0){
                $("#modificarEstatus").val("No disponible");
            }
            $("#modificarNombre").val(data.nombre);
            $("#modificarTipo").val(data.tipo);
            $("#modificarClaveEstante").val(data.claveEstante);
            $("#modificarClavePro").val(data.idProducto);
            $("#modificarCantidad").val(data.diponibilidad);
            $("#modificarPrecio").val(data.precio);
            $("#modificarDescripcion").val(data.descripcion);
        })
    });


    /**************************************
          ELIMINAR PRODUCTO
    **************************************/
    $('#eliminarProducto').on('click',function(e){
        e.preventDefault();
        var idPro= $("#buscarPro").val();
        $.ajax({
            url:'../ajax.php',
            type:'post',
            dataType:'json',
            data:{
                idPro : idPro,
                metodo:"eliminarProducto"
            }
        }).fail(function(e){
            console.log("fail");
            console.log(e);
            })
        .always(function(){
            console.log("always");
        });
    });


    /**************************************
                Cancelar nuevo producto
    **************************************/
    $("#cancelarNuevoPro").on('click',function(e){
        $("#nombre").val("");
        $("#clavePro").val("");
        $("#tipo").val("Seleccionar tipo...");
        $("#claveEstante").val("");
        $("#precio").val("");
        $("#descripcion").val("");
        $("#cantidad").val("");
        $("#estatus").val("Seleccionar estatus...");
    });

    /**************************************
            Cancelar modificar producto
    **************************************/
    $("#cancelarModificarPro").on('click',function(e){
        $("#modificarNombre").val("");
        $("#modificarTipo").val("Seleccionar tipo...");
        $("#modificarClaveEstante").val("");
        $("#modificarClavePro").val("");
        $("#modificarCantidad").val("");
        $("#modificarPrecio").val("");
        $("#modificarDescripcion").val("");
        $("#modificarEstatus").val("Seleccionar estatus...");
        $("#buscarPro").val("Selecciona un producto...")
    });

});

</script>