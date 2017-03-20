
<html>
<head>
	<title>Usuario</title>
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
             <!-------------------------------------------------------------------------------->
             <!-------------------------REGISTROS DE USUARIOS ------------------------------>
             <!-------------------------------------------------------------------------------->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
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
                                    <th>Imagen</th>
                                </tr>
                                <tr>
                                    <th><center>Abraham</center></th>
                                    <th>Perales Torres</th>
                                    <th>Administrador</th>
                                </tr>
                                <tr>
                                    <th><center>Jose Pedro</center></th>
                                    <th>Escalante Ramos</th>
                                    <th>Almacen</th>
                                </tr>
                                
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        
        </div>
    </div>
</body>
</html>