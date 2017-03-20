<?php 
session_start();
if(!(isset( $_SESSION['idUsuario']))){
     header('Location: ../index.php');
    exit();
}
?>

<html>
    <head>
        <title>Inicio</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="menu, navigation, animation, transition, transform, rotate, css3, web design, component, icon, slide" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/style4.css" />
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">

            </div>
        </nav>

        <div class="container">
               <center><img src="../img/logotipo.png"></center>
            <div class="content">
                <ul class="ca-menu">
                  <div class="row">    
                    <div class="col-sm-3 col-md-offset-2">
                    <li>
                        <a href="ModUsuario.php">
                            <span class="ca-icon">U</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Usuarios</h2>
                                <h2 class="ca-sub">Gesti&oacute;n de Usuarios</h2>
                            </div>
                        </a>
                    </li>
                    </div>    
                    
                    <div class="col-sm-3">
                    <li>
                        <a href="ModVenta.php">
                            <span class="ca-icon">F</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Ventas</h2>
                                <h2 class="ca-sub">Gesti&oacute;n de Ventas</h2>
                            </div>
                        </a>
                    </li>
                    </div>
                    <div class="col-sm-3">
                    <li>
                        <a href="ModProducto.php">
                            <span class="ca-icon">.</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Inventario</h2>
                                <h2 class="ca-sub">Gesti&oacute;n de Inventario</h2>
                            </div>
                        </a>
                    </li>
                    </div>
                  </div>
                </ul>
            </div>
            
            <br><br>
            <center><button type="button" id="logout" class="btn btn-danger">Cerrar Sesi&oacute;n</button></center>
            
        </div>
    </body>
    
    
    <script src="../js/jquery.min.js"></script>
</html>



<script type="text/javascript">    
             
    
    $(document).ready(function(){
        
        
        
        
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
         
    })
</script>