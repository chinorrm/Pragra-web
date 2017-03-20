<?php

include('../conexion.php');
    $con= new conexion();
    $con->conectar();

    $query="SELECT * FROM producto WHERE estatus=1";
    $productos = mysqli_query($con->Conexion_ID,$query);
   
    //var_dump($result);
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
    <form class="well form-horizontal" action=" " method="post"  id="nuevaVenta">
        <fieldset>
        <!-- Form Name -->
        <legend>Nueva venta</legend>

        <div class="col-sm-4 col-md-4 col-sm-offset-1"> 
            <input type="hidden" id="idderol" >
            <label for="obtenerProductos" style="width:100%; margin-top:2%;" class="col-md-4 control-label">Buscar Producto:</label> 
                 <select class="form-control selectpicker" id="obtenerProductos" style="width:100%;">                           <option selected="selected">Selecciona un producto...</option>
                     <?php 
                        while ($fila = mysqli_fetch_array($productos, MYSQL_ASSOC)) {
                                printf("<option value='%d' > %s </option>",$fila['idProducto'],$fila['nombre']);  
                        }
                     ?>  
                 </select>
             </label>
         </div>
        <div class="form-group">
         <div class="col-sm-10 col-md-2">
             <H1>TOTAL:  $<h4></h4></H1>
         </div>
         <div class="col-sm-2 col-md-4"> 
             <H1><span id="SpanTotal"></span></H1>
         </div>
        </div>
        
        <div class="col-md-12 inputGroupContainer">
        <div class="col-md-4 inputGroupContainer">
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-6 control-label">Clave</label>  
            <div class="col-md-6 inputGroupContainer">
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
            <input name="calle" id="clave" readonly="readonly" placeholder="Clave" class="form-control"  type="text">
            </div>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-6 control-label">nombre</label>  
            <div class="col-md-6 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
          <input name="calle" id="nombre" readonly="readonly" placeholder="Nombre" class="form-control"  type="text">
            </div>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-6 control-label">Precio Unitario</label>  
            <div class="col-md-6 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></i></span>
          <input name="calle" id="precio" readonly="readonly" placeholder="Precio" class="form-control"  type="text">
            </div>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-6 control-label">Cantidad</label>  
            <div class="col-md-6 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                <input name="cantidad" id="cantidad" placeholder="Cantidad" class="form-control"  min="1"  type="number">
            </div>
          </div>
        </div>
        <!-- Button input-->
        <div class="form-group">
             <label class="col-md-6 control-label"></label>
            <div class="col-md-6 inputGroupContainer">
                <button id="agregar" type="button"  class="btn btn-success btn-block"><span class="glyphicon glyphicon-saved "></span> Agregar</button>
            </div>
        </div>
        <div class="form-group">
             <label class="col-md-6 control-label"></label>
            <div class="col-md-6 inputGroupContainer">
                <button id="venta" type="button" style='display:none;'  class="btn btn-success btn-block"><span class="glyphicon glyphicon-saved "></span> Finalizar venta</button>
            </div>
        </div>
        </div>
         <div class="col-md-8 inputGroupContainer">
        <div class="row"><br>
             <div class="col-sm-10 col-md-10 col-sm-offset-1">
                <div>
                    <table id="tablaproductos" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Precio Unitario</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                    </table>
                 </div>
             </div>
         </div> 
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
            <div class="row" id="botones" style='display:none;'>
                 <div id="finalizar" class="col-sm-6 col-md-6">
                    <button type="button"  class="btn btn-danger btn-block">Cancelar Compra</button>
                </div>

                 <div id="finalizar" class="col-sm-6 col-md-6">
                    <button type="button"  class="btn btn-success btn-block">Finalizar Compra</button>
                </div>
            </div>
        </div>
            </div>
        </div>
        </fieldset>
    </form>
</div>
    </div><!-- /.container --> 
    </div>
        
    <!-- Modal sin productos -->
    <div class="modal fade" id="faltaProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h1><i class="glyphicon glyphicon-thumbs-up"></i> Productos Insuficientes en la base de datos</h1>
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
    var temId;
    var temClave;
    var temNombre;
    var temPrecio;
    var temCantidadB;
    var temCantidad;
    var subtotal;
    var total = 0;
    var Total = 0;
    var cont = 0;
    var productos=[];
    var t;
    function subTotal(precio, cantidad){
        t = precio * cantidad;
        return t;
    }
    
    function deleteRow(id){
        var precio = $('#'+id).attr("subtotal");   
        var total = $('#SpanTotal').html();
        t = total - precio;
        $('#SpanTotal').html(t);
        Total = t;
        productos.splice(id, 1);
        $('#'+id).remove(); 
        
    }
    
   
     $(document).ready(function(){// inicio del document
         
          $('#obtenerProductos').on('change',function(e){ // inicio de obtener productos
              e.preventDefault();
              var obtenerProducto = $("#obtenerProductos").val();
              var nuevaVenta = $("#nuevaVenta").val();
              
              console.log(obtenerProducto);
              $.ajax({
                   url: '../ajax.php',
                   type:'post',
                   dataType:'json',
                   data:{
                   obtenerProductos: obtenerProducto,
                   metodo:"nuevaVenta"
               }
            })
              .done(function(data){ // inicio del primer done
                // console.log("No entra"); 
                $("#clave").val(data.clave);
                $("#nombre").val(data.nombre);
                $("#precio").val(data.precio);
                $("#cantidad").val(1);
                temId = data.idProducto;
                temClave = data.clave;
                temNombre = data.nombre;
                temPrecio = data.precio;
                temCantidadB = data.cantidad;
                temCantidad;
                  
              //  console.log("success");
              }) // fin del primer done
              .fail(function(e){
                console.log("fail");
                 console.log(e.message);
             })
              .always(function(){
                 //   console.log("always");
             });
              
          }); // fin de obtener productos
         
         $('#agregar').on('click',function(e){ // inicio de agregar
                temCantidad = $("#cantidad").val();
                subtotal =  subTotal(temPrecio, temCantidad);
                total = total + subtotal;
                document.getElementById("SpanTotal").innerHTML=total.toFixed(2);
                $("#tablaproductos").append("<tr id="+cont+" idn="+temId+" clave="+temClave+" nom="+temNombre+" preci="+temPrecio+" cant="+temCantidad+" sub="+subtotal+"><td>"+temClave+"</td><td>"+temNombre+"</td><td>"+"$ "+temPrecio+"</td><td>"+temCantidad+"</td><td>"+"$ "+subtotal+"</td><td><button id="+cont+" type=button onclick=deleteRow(this.id,total) class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></td></tr>");
                $("#clave").val("");
                $("#nombre").val("");
                $("#precio").val("");
                $("#cantidad").val("");
                productos.push(cont);
                
                cont ++;
                temClave = "";
                temNombre = "";
                temPrecio = "";
                temCantidad = "";
                subtotal = "";
                document.getElementById('venta').style.display = 'block';
             /* if(cantidad <= cantidadB){// inicio del if
                    console.log("Entra al if");
                    var ActualizarCantidad = 'ActualizarCantidad';
                    $.ajax({ // inicio del ajax
                       url: '../ajax.php',
                       type:'post',
                       dataType:'json',
                       data:{
                       obtenerProducto: obtenerProducto,
                       cantidadC: cantidad,
                       metodo:"ActualizarCantidad"
                       }//fin del data

                    })// fin del ajax
                    .done(function(data){ // inicio del segundo done
                        console.log("REgresa");
                    })// fin del segundo done
                    .fail(function(e){ // inicio del segundo fail
                        console.log("fail");
                        console.log(e.message);
                    })// fin del segundo fail
                }else{// fin del if
                    $('#faltaProductos').modal('show');
                }*/
                    
                }); // fin de agregar
         

         $('#venta').on('click', function(e){ // inicio de Venta
             var Id = "";
             var Nombre = "";
             var Cantidad = "";
             var SubT = "";
            /*  $.each(productos, function (ind, elem) { 
                console.log('indice :'+ind+'!');
                console.log('valor :'+elem+'!'); 
                //console.log('id :'+id+'!');
            });*/
             
             for(i=0; i<productos.length; i++){
                 Id += $("#"+productos[i]).attr("idn")+",";
                 Nombre += $("#"+productos[i]).attr("nom")+",";
                 Cantidad += $("#"+productos[i]).attr("cant")+",";
                 SubT += $("#"+productos[i]).attr("sub")+",";
                 
              }
             if(Total > 0){
                 total = Total;
             }
             var tot = total;
             var f=new Date();
             var fecha=+f.getFullYear();
            if(String(f.getMonth()).length==1){
                fecha+="-0"+(f.getMonth()+1);
            }else{
                fecha+="-"+f.getMonth();
            }
            
            if(String(f.getDate()).length==1){
                fecha+="-0"+f.getDate();
            }else{
                fecha+="-"+f.getDate();
            }
             var Metodo = 'RealizarVenta';
             $.ajax({// inicio del ajax
                 url: '../ajax.php',
                 type:'post',
                 dataType:'json',
                 data:{//inicio del data
                     id: Id,
                     nombre: Nombre,
                     cantidad: Cantidad,
                     subT:SubT,
                     metodo:"RealizarVenta"
                 }//fin del data
             }) // fin del ajax
             .done(function(data){
                 console.log("success");
             })
              .fail(function(e){
                 console.log("faiLLLl");
                 console.log(e);
             })
            .always(function(){
                //    $('#usuarioRegistrado').modal('show');
                    console.log("always");
             });
           // var form = document.getElementById("usuarioAlta");
            //    form.reset();
             console.log(Id);
             console.log(Nombre);
             console.log(Cantidad);
             console.log(SubT);
             console.log("FECHA "+fecha);
             
         });// fin de Venta
         
         
     }); /// Final del document
    
    
        
</script>