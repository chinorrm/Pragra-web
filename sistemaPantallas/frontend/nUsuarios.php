<?php
session_start();/*
if(!(isset( $_SESSION['idUsuario']))){
    header('Location: ../index.php');
    exit();
}*/


include('../conexion.php');
    $con= new conexion();
    $con->conectar();
    //echo "jala";
        //$query="SELECT * FROM persona WHERE estatus = 1";
      /*  $query="SELECT * FROM Persona";
        $usuariosT = mysqli_query($con->Conexion_ID,$query); 
        echo  $usuariosT;*/
?>

<html>
<head>
	<title>Registrar Usuario</title>
    <meta charset="UTF-8" />
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
        <nav class="navbar navbar-default" style="background-color: #19917B;"></nav>
<!--			<div  class="col-xs-12 col-sm-6 col-md-3">
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
    -->
<div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="usuarioAlta" name="usuarioAlta" enctype="multipart/form-data">
        <fieldset>

        <!-- Form Name -->
        <legend>Registrar Usuario</legend>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Nombre</label>  
          <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input  name="nombre" id="nombre" placeholder="Nombre" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label" >Apellido Paterno</label> 
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input name="aPaterno" id="aPaterno" placeholder="Apellido Paterno" class="form-control"  type="text">
            </div>
          </div>
        </div>

            <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label" >Apellido Materno</label> 
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input name="aMaterno" id="aMaterno" placeholder="Apellido Materno" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->
               <div class="form-group">
          <label class="col-md-4 control-label">Correo</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input name="correo" id="correo" placeholder="Correo Electronico" class="form-control"  type="text">
            </div>
          </div>
        </div>


        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Teléfono #</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
          <input name="tel"id="telefono" placeholder="(834)555-1212" class="form-control" type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Colonia</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
          <input name="colonia" id="colonia" placeholder="Colonia" class="form-control" type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Calle</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
          <input name="calle" id="calle" placeholder="Calle" class="form-control"  type="text">
            </div>
          </div>
        </div>

            <!-- File input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">Agregar foto</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
                        <input type="file" accept="image/x-png" class="form-control" id="foto" placeholder="Archivo">
                    </div>
                  </div>
                </div>

        <!-- Select Basic -->

        <div class="form-group"> 
          <label class="col-md-4 control-label">Rol</label>
            <div class="col-md-4 selectContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <select name="state" id="rol" class="form-control selectpicker" >
              <option value="0">Seleccionar</option>
              <option value="1">Administrador</option>
              <option value="2">Ventas</option>
              <option value="3">Almacen</option>

            </select>
          </div>
        </div>
        </div>

        <!-- radio checks -->
         <div class="form-group">
            <label class="col-md-4 control-label">Sexo</label>
            <div class="col-md-4">
                <div class="radio">
                    <label><input type="radio" name="sexo" id="masculino" value="masculino" />Masculino</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="sexo" id="femenino" value="femenino" />Femenino</label>
                </div>
            </div>
        </div>

        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="success_message">Usuario agregado con exito.! <i class="glyphicon glyphicon-thumbs-up"></i></div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-2">
            <button type="submit" id="agregarUsuario" class="btn btn-success btn-block" >Agregar <span class="glyphicon glyphicon-send"></span></button>
          </div>
        </div>

        </fieldset>
</form>
</div>
</div><!-- /.container --> 
    
    <!-- Modal usuarios agregados -->
    <div class="modal fade" id="usuarioRegistrado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h1><i class="glyphicon glyphicon-thumbs-up"></i> Success Modal</h1>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal -->
    
    

    <script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/select2.min.js"></script>
    <script type="text/javascript" src="../js/datatable.min.js"></script>
</body>
</html>

<!-- ////////////////////////// Scripts \\\\\\\\\\\\\\\\\\\\\\\\\ -->

<script type="text/javascript">
    
    $(document).ready(function(){ // inicio de documet.
         $('#agregarUsuario').on('click',function(e){
             e.preventDefault();
             var nombre = $("#nombre").val();
             var aPaterno = $("#aPaterno").val();
             var aMaterno = $("#aMaterno").val();
             var correo = $("#correo").val();
             var telefono = $("#telefono").val();
             var colonia = $("#colonia").val();
             var calle = $("#calle").val();
             var rol = $("#rol").val();
             var sexo = $("input[name='sexo']:checked").val();
             var metodo = 'agregarUsuario'
             var file_data = $("#foto").prop("files")[0];   // Getting the properties of file from file field
             var form_data = new FormData();                  // Creating object of FormData class
             form_data.append("nombre", nombre)
             form_data.append("aPaterno", aPaterno)
             form_data.append("aMaterno", aMaterno)
             form_data.append("correo", correo)
             form_data.append("telefono", telefono)
             form_data.append("colonia", colonia)
             form_data.append("calle", calle)
             form_data.append("rol", rol)
             form_data.append("sexo", sexo)
             form_data.append("metodo", metodo)
	         form_data.append("file", file_data)// Appending parameter named file with properties of file_field to form_data
             console.log("success");
              $.ajax({
                    url: '../ajax.php',
                    type:'post',
                    dataType:'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    
              })
              .done(function(data){
                 console.log("success");
             })
              .fail(function(e){
                 console.log("faiLLLl");
                 console.log(e);
             })
            .always(function(){
                    $('#usuarioRegistrado').modal('show');
                    console.log("always");
             });
            var form = document.getElementById("usuarioAlta");
                form.reset();
            
        
        });
        
        
        
        
    });// fin del document

</script>