<?php
/*
session_start();
if(!(isset( $_SESSION['idUsuario']))){
    header('Location: ../index.php');
    exit();
}


include('../conexion.php');
    $con= new conexion();
    $con->conectar();
    //$query="SELECT * FROM usuarios WHERE estatus = 1";
        $query="SELECT *
                   FROM usuarios where estatus = 1";
        $usuariosT = mysqli_query($con->Conexion_ID,$query);
  
    //var_dump($usuariosT);*/
?>

<html>
<head>
	<title>Usuario Modificado</title>
    <meta charset= "UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="keywords" content="menu, navigation, animation, transition, transform, rotate, css3, web design, component, icon, slide" />
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/datatable.css" />
    
    <script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="../js/select2.min.js"></script>
</head>
<body>
	<div clas="container-fluid">
			<div  class="col-xs-12 col-sm-6 col-md-3">
				<br>
				<img src="../img/logotipo.png" style="margin-left:18%">
				<ul id="tabs" class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a id="registros" href="#registroUsuarios" data-toggle="tab">Registro de usuarios</a></li>
                    <li role="presentation"><a href="#nuevoUsuarios" data-toggle="tab">Alta de usuario</a></li>
                    <li role="presentation"><a href="#modificarUsuarios" data-toggle="tab">Modificar usuario</a></li><hr>
                    <div id="divinicio" style="display:none;"><li><button type="button" onclick="location.href='inicio.php'" class="btn btn-primary btn-block">Inicio</button></li></div><br>
                    <li><button type="button" id="logout" class="btn btn-danger btn-block">Cerrar Sesi&oacute;n</button></li>
                    
                </ul>
			</div>
             <div id="my-tab-content" class="tab-content col-xs-12 col-sm-9 col-md-8 ">
                 
                 <!-------------------------------------------------------------------------------->
                 <!-------------------------TAB DE REGISTRO USUARIOS ------------------------------>
                 <!-------------------------------------------------------------------------------->
                             
                    <div class="tab-pane active" id="registroUsuarios">
                        <center><h1>Registro de Usuarios</h1></center> <br>
                        <div class="row">
                                <form id="registroUsuario"></form>
                                <input type="hidden" id="idderol" value="<?php echo $_SESSION['idRol'] ?>">
                         </div>
                        <div class="row">
                                <div>
                                    <table id="tablaRegistros" class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th><center>Nombre</center></th>
                                                <th>Apellidos</th>
                                                <th>Rol</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                    </div>
                 
                 <!-------------------------------------------------------------------------------->
                 <!---------------------TAB REGISTRO DE NUEVO USUARIO ----------------------------->
                 <!-------------------------------------------------------------------------------->    
                    <div class="tab-pane" id="nuevoUsuarios" >
                        <center><h1>Nuevo Usuario</h1></center>
                                <form id="insertarUsuario" >  
                                    <div class="row">
                                        <br>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-11" >
                                            <div class="col-md-4" >
                                                <h4>Nombre:</h4>
                                                    <input type="text" class="form-control" id="nuevoNombre" placeholder="Nombre">
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Apellido paterno:</h4>
                                                <input type="text" class="form-control" id="nuevoAPaterno" placeholder="Apellido paterno">
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Apellido materno:</h4>
                                                <input type="text" class="form-control" id="nuevoAMaterno" placeholder="Apellido materno">
                                            </div> 
                                            <div class="col-md-6">
                                                <h4>Colonia:</h4>
                                                    <input type="text" class="form-control" id="nuevoColonia" placeholder="Colonia">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Calle:</h4>
                                                    <input type="text" class="form-control" id="nuevoCalle" placeholder="Calle">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Número:</h4>
                                                    <input type="text" class="form-control" id="nuevoNumero" placeholder="Número">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Código postal:</h4>
                                                    <input type="text" class="form-control" id="nuevoCodigoP" placeholder="Código postal">
                                            </div> 
                                            <div class="col-md-6">
                                                <h4>Usuario:</h4>
                                                    <input type="text" class="form-control" id="nuevoUsuario" placeholder="Usuario">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Contraseña:</h4>
                                                    <input type="password" class="form-control" id="nuevoContraseña" placeholder="Contraseña">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Rol:</h4>
                                                     <select id="nuevoRol" class="form-control" style="width:80%;">
                                                          <option value="0">Seleccionar</option>
                                                          <option value="1">Administrador</option>
                                                          <option value="2">Ventas</option>
                                                          <option value="3">Almacén</option>
                                                    </select>
                                            </div>
                                            <div class="row">
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                             <div class="col-md-12">
                                                 <div class="col-md-3 col-md-offset-6"></div>
                                                 <div class="col-md-3">
                                                    <button type="button" id="nuevoAgregar" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok"></span> Agregar</button>
                                                 </div>
                                            </div>
                                             <br>
                                             <br>
                                             <br> 
                                        </div>
                                                                           
                                    </div>
                             </form>
                        </div>
                 
                 <!-------------------------------------------------------------------------------->
                 <!----------------------------TAB MODIFICAR USUARIO ------------------------------>
                 <!-------------------------------------------------------------------------------->
                 
                    <div class="tab-pane" id="modificarUsuarios" >
                        <center><h1>Modificar o eliminar Usuario</h1></center>
                                <form id="modificarUsuarioss" >   
                                    <div class="col-md-1"></div>
                                    <div class="col-md-11">                                    
                                        <label for="modificarUser" style="width:100%; margin-top:4%;">
                                              <h4>Nombre:</h4>
                                              <select class="js-example-basic-single" id="modificarUser" style="width:70%;">
                                                <option selected="selected">Selecciona un usuario...</option>
                                                <?php 
                                                    while ($fila = mysqli_fetch_array($usuariosT, MYSQL_ASSOC)) {
                                                        printf("<option value='%d'>%s %s %s</option>", $fila['idUsuario'],$fila['nombre'],$fila['paterno'],$fila['materno']);  
                                                 }  
                                                 ?>  

                                              </select>
                                        </label>
                                    </div>
                                 
                                    <div class="row">
                                        <br>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-11" >
                                            <div class="col-md-4" >
                                                <h4>Nombre:</h4>
                                                    <input type="text" class="form-control" id="modificarNombre" placeholder="Nombre">
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Apellido paterno:</h4>
                                                <input type="text" class="form-control" id="modificarAPaterno" placeholder="Apellido paterno">
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Apellido materno:</h4>
                                                <input type="text" class="form-control" id="modificarAMaterno" placeholder="Apellido materno">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Colonia:</h4>
                                                    <input type="text" class="form-control" id="modificarColonia" placeholder="Colonia">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Calle:</h4>
                                                    <input type="text" class="form-control" id="modificarCalle" placeholder="Calle">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Número:</h4>
                                                    <input type="text" class="form-control" id="modificarNumero" placeholder="Número">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Código postal:</h4>
                                                    <input type="text" class="form-control" id="modificarCodigoP" placeholder="Código postal">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Usuario:</h4>
                                                    <input type="text" class="form-control" id="modificarUsuario" placeholder="Usuario">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Contraseña:</h4>
                                                    <input type="password" class="form-control" id="modificarContrasena" placeholder="Contraseña">
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Rol:</h4>
                                                     <select id="modificarRol"  class="form-control" style="width:80%;">
                                                          <option value="0">Seleccionar</option>
                                                          <option value="1">Administrador</option>
                                                          <option value="2">Ventas</option>
                                                          <option value="3">Almacén</option>
                                                    </select>
                                            </div>
                                            <div class="row">
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-md-12">
                                                 <div class="col-md-3 col-md-offset-6">
                                                    <button type="submit" id="modificarElimiar" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                                                 </div>
                                                 <div class="col-md-3">
                                                    <button type="submit" id="modificarGuardar"  class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok"></span> Guardar cambios</button>
                                                 </div>
                                            </div>
                                             <br>
                                             <br>
                                             <br> 
                                        </div>                            
                                    </div>
                  </form>
              </div>
         </div>
	</div>

    <!-- Modal Usuarios agregados-->
    
            <div class="modal fade" id="userRegistrado" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Mensaje</h4>
                  </div>
                  <div class="modal-body">
                    <center><h1>Usuario agregado con exito</h1></center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
    
    
     <!-- Modal Actualizar Usuarios-->
    
            <div class="modal fade" id="userModificado" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Mensaje</h4>
                  </div>
                  <div class="modal-body">
                    <center><h1>Usuario actualizado con exito</h1></center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
    
    
     <!-- Modal Eliminar Usuarios-->
    
            <div class="modal fade" id="userEliminar" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Mensaje</h4>
                  </div>
                  <div class="modal-body">
                    <center><h1>Usuario eliminado con exito</h1></center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
  

    <script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/select2.min.js"></script>
    <script type="text/javascript" src="../js/datatable.min.js"></script>
    
</body>
</html>

<script type="text/javascript">    
                 /*
                 <!-------------------------------------------------------------------------------->
                 <!-----------------------------Script AGREGAR USUARIO ------------------------------>
                 <!-------------------------------------------------------------------------------->*/
    $(document).ready(function(){
        
        
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
        
        $('#nuevoAgregar').on('click',function(e){
            e.preventDefault();
            var nuevoNombre = $("#nuevoNombre").val();
            var nuevoAPaterno = $("#nuevoAPaterno").val();
            var nuevoAMaterno = $("#nuevoAMaterno").val();
            var nuevoColonia = $("#nuevoColonia").val();
            var nuevoCalle = $("#nuevoCalle").val();
            var nuevoRol = $("#nuevoRol").val();
            var nuevoNumero = $("#nuevoNumero").val();
            var nuevoCodigoP = $("#nuevoCodigoP").val();
            var nuevoUsuario = $("#nuevoUsuario").val();
            var nuevoContrasena = $("#nuevoContraseña").val();
            $.ajax({
               url: '../ajax.php',
               type:'post',
               dataType:'json',
               data:{
               Nombre: nuevoNombre,
               APaterno: nuevoAPaterno,
               AMaterno: nuevoAMaterno,
               Colonia: nuevoColonia,
               Calle: nuevoCalle,
               Rol: nuevoRol,  
               Numero: nuevoNumero,
               CodigoP: nuevoCodigoP,
               Usuario: nuevoUsuario,
               Contrasena: nuevoContrasena,
               metodo:"insertarUsuario"
               }
            })
            .done(function(data){
                 console.log("success");
             })
            .fail(function(e){
                 console.log("faiLLLl");
                 console.log(e);
             })
            .always(function(){
                    $('#userRegistrado').modal('show');
                    console.log("always");
             });
            var form=document.getElementById("insertarUsuario");
                form.reset();   
        });
        
            /*
                 <!-------------------------------------------------------------------------------->
                 <!-----------------------------Script Registro USUARIOs ------------------------------>
                 <!-------------------------------------------------------------------------------->*/
        
        $('select').select2();
        $.ajax({
               url: '../ajax.php',
               type:'post',
               dataType:'json',
               data:{
               metodo:"obtenerUsuarios"
               }
            })
            .done(function(data){
                 $('#tablaRegistros').DataTable( {
                    "aaData":data 
                   }); 
            })
                    /*
                 <!-------------------------------------------------------------------------------->
                 <!-----------------------------Script modificar USUARIOs ------------------------------>
                 <!-------------------------------------------------------------------------------->*/ 
       $('#modificarUser').on('change',function(e){
             e.preventDefault();
             var usuario = $('#modificarUser').val();
             $.ajax({
                   url: '../ajax.php',
                   type:'post',
                   dataType:'json',
                   data:{
                   idusuario:usuario,   
                   metodo:"obtenerUsuario"
                   }
                })
                .done(function(data){
                    $("#modificarNombre").val(data.name);
                    $("#modificarAPaterno").val(data.paterno);
                    $("#modificarAMaterno").val(data.materno);
                    $("#modificarUsuario").val(data.usuario);
                    $("#modificarContrasena").val(data.contrasena); 
                    $("#modificarRol option[value ='"+data.idRol+"']").attr('selected', 'selected'); 
                    $("#modificarRol").change();
                    $("#modificarColonia").val(data.colonia);
                    $("#modificarCalle").val(data.calle);
                    $("#modificarNumero").val(data.numero);
                    $("#modificarCodigoP").val(data.cp);
                })
               .fail(function(e){
                 console.log(e);
                })
             
        });
        
        
          /*
                 <!-------------------------------------------------------------------------------->
                 <!-----------------------------Script update USUARIOs ------------------------------>
                 <!-------------------------------------------------------------------------------->*/
        
        
        $('#modificarGuardar').on('click',function(e){
            e.preventDefault();
            var modificarNombre = $("#modificarNombre").val();
            var modificarAPaterno = $("#modificarAPaterno").val();
            var modificarAMaterno = $("#modificarAMaterno").val();
            var modificarColonia = $("#modificarColonia").val();
            var modificarCalle = $("#modificarCalle").val();
            var modificarRol = $("#modificarRol").val();
            $("#modificarRol option[value ='"+0+"']").attr('selected', 'selected'); 
            $("#modificarRol").change();
            var modificarNumero = $("#modificarNumero").val();
            var modificarCodigoP = $("#modificarCodigoP").val();
            var modificarUsuario = $("#modificarUsuario").val();
            var modificarContrasena = $("#modificarContrasena").val();
            var Usuario = $('#modificarUser').val();     
            $.ajax({
               url: '../ajax.php',
               type:'post',
               dataType:'json',
               data:{
               idUsuario:Usuario,
               Rol: modificarRol,
               Nombre: modificarNombre,
               APaterno: modificarAPaterno,
               AMaterno: modificarAMaterno,
               Colonia: modificarColonia,
               Calle: modificarCalle,  
               Numero: modificarNumero,
               CodigoP: modificarCodigoP,
               Usuario: modificarUsuario,
               Contrasena: modificarContrasena,
               metodo:"updateUsuario"
               }  
            })
            .done(function(data){
                $("#modificarRol option[value ='"+0+"']").attr('selected', 'selected'); 
                $("#modificarRol").change();
                 console.log("success");
             })
            .fail(function(e){
                 console.log("fail");
                 console.log(e);
             })
            .always(function(){
                 $('#userModificado').modal('show');
                 console.log("always");
             });
            var form=document.getElementById("modificarUsuarioss");
                form.reset();            
    
        });
        
                  /*
                 <!-------------------------------------------------------------------------------->
                 <!-----------------------------Script eliminar USUARIOs ------------------------------>
                 <!-------------------------------------------------------------------------------->*/
        
        
        
        
        $('#modificarElimiar').on('click',function(e){
             e.preventDefault();
             var UsuariO = $('#modificarUser').val();  
            $.ajax({
               url: '../ajax.php',
               type:'post',
               dataType:'json',
               data:{   
               IdUsuario:UsuariO,             
               metodo:"deleteUsuarios"
               }  
            })
            .done(function(data){
                 console.log("success");
             })
            
            .fail(function(e){
                 console.log("fail");
                 console.log(e);
             })
            .always(function(){
                  $("#modificarRol option[value ='"+0+"']").prop('selected', 'selected'); 
                  $("#modificarRol").change();
                  $('#userEliminar').modal('show');
                  console.log("always");
             });
            var form=document.getElementById("modificarUsuarioss");
                form.reset(); 
        });
        
            $('#registros').on('click',function(e){
                e.preventDefault();
                location.reload();
            });
    });
    
    
    
    
    
    
</script>