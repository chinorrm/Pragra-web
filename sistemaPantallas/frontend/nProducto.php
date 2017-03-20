<?php
include('../conexion.php');
    $con= new conexion();
    $con->conectar();
?>

<html>
<head>
	<title>Producto</title>
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

    <form class="well form-horizontal" action=" " method="post"  id="altaProducto">
<fieldset>

        <!-- Form Name -->
        <legend>Registrar Producto</legend>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Nombre del producto</label>  
          <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
          <input id="nombre" name="nombre" placeholder="Nombre del producto" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label" >Clave producto</label> 
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
          <input id="clave" name="claveP" placeholder="Clave producto" class="form-control"  type="text">
            </div>
          </div>
        </div>

            <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label" >Cantidad</label> 
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
          <input id="cantidad" name="clave" placeholder="Cantidad" class="form-control" min="1"  type="number">
            </div>
          </div>
        </div>

        <!-- Text input-->
               <div class="form-group">
          <label class="col-md-4 control-label">Precio</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
          <input id="precio" name="precio" placeholder="Precio" class="form-control"  type="text">
            </div>
          </div>
        </div>


        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Agregar foto</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
                <input type="file" class="form-control" id="foto" placeholder="Archivo">
            </div>
          </div>
        </div>

        <!-- Select Basic 

        <div class="form-group"> 
          <label class="col-md-4 control-label">Estatus</label>
            <div class="col-md-4 selectContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
            <select name="state" class="form-control selectpicker" >
              <option value=" " >Seleccionar</option>
              <option>Disponible</option>
              <option>No disponible</option>

            </select>
          </div>
        </div>
        </div>   -->

            <!--Text area -->

        <div class="form-group">
          <label class="col-md-4 control-label">Descripción</label>
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea id="descripcion" class="form-control" name="descripcion" placeholder="Descripción del producto"></textarea>
           </div>
          </div>
        </div>  


        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-2">
            <button type="button" id="agregarProducto"  class="btn btn-success btn-block"><span class="glyphicon glyphicon-saved "></span>   Agregar</button>
          </div>
        </div>

</fieldset>
</form>
</div>
</div><!-- /.container --> 
    
    <!-- Modal productos agregados -->
    <div class="modal fade" id="productoRegistrado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h1><i class="glyphicon glyphicon-thumbs-up"></i> Producto Agregado con Exito.!</h1>
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
        $('#agregarProducto').on('click',function(e){
            e.preventDefault();
            console.log("ya entra de nuevo");
            var nombre = $("#nombre").val();
            var clave = $("#clave").val();
            var cantidad = $("#cantidad").val();
            var precio = $("#precio").val();
            var descripcion = $("#descripcion").val();
            var metodo = 'agregarProducto'
            var file_data = $("#foto").prop("files")[0];
            var form_data = new FormData();
            form_data.append("nombre", nombre);
            form_data.append("clave", clave);
            form_data.append("cantidad", cantidad);
            form_data.append("precio", precio);
            form_data.append("descripcion", descripcion);
            form_data.append("metodo", metodo);
            form_data.append("foto", file_data);
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
                    $('#productoRegistrado').modal('show');
                    console.log("always");
             });
            var form = document.getElementById("altaProducto");
                form.reset();              
            
            
            
        });
        
        
        
    }); // fin del document
    
</script>