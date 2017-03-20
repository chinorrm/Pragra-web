<?php 
    session_start(); 
    session_destroy(); 
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Iniciar Sesion</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
		</div>
	</nav>
	<br>


	<!-- Cuerpo de la pagina -->
	<div class="container">
		<form class="form-horizontal">
			<div class="col-sm-offset-4 col-sm-4" >
				<img src="img\logotipo.png" class="img-responsive" style="margin-left:18%">
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<h1 align="center">Iniciar Sesi&oacute;n</h1>
			    </div>
			</div>

			<div class="form-group">
		    	<div class="col-sm-offset-4 col-sm-4">
		    		<div class="input-group input-group-lg">
					  <span class="input-group-addon" id="inputusuario-addon">
					  	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					  </span>
					  <input type="text" class="form-control" id="usuario" placeholder="Usuario" aria-describedby="sizing-addon1">
					</div>
			    </div>
			</div>

		  	<div class="form-group">
		    	<div class="col-sm-offset-4 col-sm-4">
		    		<div class="input-group input-group-lg">
					  <span class="input-group-addon" id="inputusuario-addon">
					  	<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
					  </span>
		      			<input type="password" class="form-control" id="contrasena" placeholder="Contraseña">
		      		</div>
		    	</div>
		 	</div>

			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
			      <button type="button" id="entrar" class="btn btn-info btn-block">Entrar</button>
			    </div>
			</div>
            
            <div class="col-sm-offset-4 col-sm-4">
                <font color="red"><span id="nouser">
                    
                    </span></font>
            </div>
		</form>
	</div>
    
    
    
    <script src="js/jquery.min.js"></script>
    
    
    
    
</body>
</html>



<script type="text/javascript">

    
    
    $(document).ready(function() {
        $('#entrar').on('click',function(e){
            var usuario = $("#usuario").val();
            var contrasena = $("#contrasena").val();
            $.ajax({
                   url: 'ajax.php',
                   type:'post',
                   dataType:'json',
                   data:{
                   usuario:usuario,
                   contrasena:contrasena,
                   metodo:"login"
                  }
            })
            .done(function(data){
                console.log(data);
                
                switch(data.idRol){
                        
                    case "1":
                        location.href="frontend/inicio.php";
                        break;
                        
                    case "2":
                        location.href="frontend/ModVenta.php";
                        break;
                        
                    case "3":
                        location.href="frontend/ModUsuario.php";
                        break;
                    
                    case "4":
                        location.href="frontend/ModProducto.php";
                        break;
                        
                }
                    
             
                
            })
            .fail(function(e){
                console.log(e);
                document.getElementById("nouser").innerHTML="Usuario y/o contrasena incorrectos";
            })
            
            
        })
    })



</script>