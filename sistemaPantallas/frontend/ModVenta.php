<?php

session_start();
if(!(isset( $_SESSION['idUsuario']))){
    header('Location: ../index.php');
    exit();
}


include('../conexion.php');
    $con= new conexion();
    $con->conectar();

    $query="SELECT * FROM productos WHERE estatus=1";
    $productos = mysqli_query($con->Conexion_ID,$query);
   
    //var_dump($result);
?>


<html>
<head>
	<title>Ventas</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="keywords" content="menu, navigation, animation, transition, transform, rotate, css3, web design, component, icon, slide" />
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
     <link rel="stylesheet" type="text/css" href="../css/datatable.css">
    
 
    <script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
    
   
</head>
<body>
	<div clas="container-fluid">
		<div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<br>
				<img src="../img/logotipo.png" style="margin-left:18%">
				<ul id="tabs" class="nav nav-pills nav-stacked"> 
                    <li role="presentation"  class="active" id="linuevaventa"><a href="#nuevaventa" data-toggle="tab" align="center">Nueva venta</a></li>
                    <li role="presentation" id="liregistroventa"><a href="#registroventas" data-toggle="tab" align="center">Registro de ventas</a></li>
                    <li role="presentation" id="limodificarventa"><a href="#modificarventa" data-toggle="tab" align="center">Eliminar venta</a></li><br>
                    <hr>
                    <div id="divinicio" style="display:none;"><li><button type="button" id="inicio" onclick="location.href='inicio.php'" class="btn btn-primary btn-block">Inicio</button></li></div><br>
                    <li><button type="button" id="logout" class="btn btn-danger btn-block">Cerrar Sesi&oacute;n</button></li>
                </ul>
			</div>
			
             <div id="my-tab-content" class="tab-content col-xs-12 col-sm-9 col-md-8 ">
                 
                 <!-------------------------------------------------------------------------------->
                 <!-------------------------------TAB DE NUEVA VENTA ------------------------------>
                 <!-------------------------------------------------------------------------------->
                    <div class="tab-pane active" id="nuevaventa">
                        <center><h1>Nueva Venta</h1></center> <br>
                            
                            <div class="row">
                                <form id="datosProducto">    
                                    <div class="col-sm-12 col-md-6">
                                         <input type="hidden" id="idderol" value="<?php echo $_SESSION['idRol'] ?>">
                                        <label for="claveproducto" style="width:100%; margin-top:2%;">
                                          Buscar Producto:
                                          <select class="js-example-basic-single" id="claveproducto" style="width:100%;">
                                            <option selected="selected">Selecciona un producto...</option>
                                            <?php 
                                                while ($fila = mysqli_fetch_array($productos, MYSQL_ASSOC)) {
                                                    printf("<option value='%s'>%s - %s</option>", $fila['clave'],$fila['clave'], $fila['nombre']);  
                                             }  
                                             ?>  
                                          </select>
                                        </label>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <H1>TOTAL:</H1>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <H1><span id="SpanTotal"></span></H1>
                                    </div>
                                 </form>
                            </div>
                        
                            <div class="row">
                                <br>
                                <div>
                                    <table id="tablaproductos" class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Clave</th>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Precio Unitario</th>
                                                <th>Cantidad</th>
                                                <th>Subtotal</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            
                             <div class="row" id="botones" style='display:none;'>
                                 <div id="finalizar" class="col-sm-6 col-md-6">
                                    <button type="button" onclick="cancelarCompra()" class="btn btn-danger btn-block">Cancelar Compra</button>
                                </div>
                                 
                                 <div id="finalizar" class="col-sm-6 col-md-6">
                                    <button type="button" onclick="finCompra()" class="btn btn-success btn-block">Finalizar Compra</button>
                                </div>
                            </div>
                    </div>
                 
                 <!-------------------------------------------------------------------------------->
                 <!---------------------------TAB REGISTRO DE VENTAS ------------------------------>
                 <!-------------------------------------------------------------------------------->    
                    <div class="tab-pane" id="registroventas">
                        <center><h1>Registro de Ventas</h1></center>
                        <br><br>
                        <div class="col-sm-11 col-md-11 col-sm-offset-1">
                                <div>
                                    <table id="tablaventas" class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Clave</th>
                                                <th>Cedula Doctor</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                         
                                        
                                    </table>
                                </div>
                            </div>
                    </div>
                 
                 <!-------------------------------------------------------------------------------->
                 <!------------------------------TAB MODIFICAR VENTA ------------------------------>
                 <!-------------------------------------------------------------------------------->
                 
                    <div class="tab-pane" id="modificarventa">
                        <center><h1>Modificar Venta</h1></center>
                         <br><br>
                         <div class="row">
                                <form id="datosProducto">    
                                    <div class="col-sm-12 col-md-6">
                                        <label for="claveventa">Clave de la venta</label>
                                        <input type="text" class="form-control" id="claveventa" placeholder="Clave de la venta">
                                        <input type="hidden" id="claveventahidd">
                                    </div>
                                     <div class="col-sm-12 col-md-6" style="margin-top:3%;">
                                        <button type="button" id="cargaventa" class="btn btn-success">Buscar</button>    
                                     </div>
                                    
                                    
                                 </form>
                            </div>
                        
                            <div class="row">
                                <br>
                                <div>
                                    <table id="tablaModventas" class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Clave</th>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Precio Unitario</th>
                                                <th>Cantidad</th>
                                                <th>Subtotal</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        
                            <div class="row" id="botonesMod" style='display:none;'>
                                 <div class=" col-md-offset-6 col-sm-12 col-md-6">
                                    <button type="button" id="eliminarventac" class="btn btn-danger btn-block">Eliminar Venta</button>
                                </div>
                            </div>

                    </div>
                 
                 
                   
            </div>
            
            <!-- Modal ya esta-->
            <div class="modal fade" id="registrado" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Mensaje</h4>
                  </div>
                  <div class="modal-body">
                    <center><h1>Producto actualmente en lista</h1></center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
                
            
            <!-- Modal venta terminada -->
            <div class="modal fade" id="finVenta" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title">Venta Finalizada</h2>
                  </div>
                  <div class="modal-body">
                      <center><img src="../img/logotipo.png"></center><hr>
                    <h2><center><span id="claveFinVenta"></span></center></h2>
                    <h2><center><span id="fechaFinVenta"></span></center></h2>
                    <h2><center><span id="totalFinVenta"></span></center></h2>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="javascript:location.reload()" class="btn btn-default">Cerrar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
                
		</div>
	</div>


    <script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/select2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../js/datatable.min.js"></script>
</body>
</html>

<script type="text/javascript">    
         
        $('select').select2();
         var actuales=[];
         var controlados=[];
         var cantidades=[];
         var idMod=[];
         var cantidadesMod=[];
         var productosMod=[];
         var subt=[];
         var table;
    
         
    
         function maximo(maximum,value){
             console.log(maximum);
         }
    
        /**************************************************
                                TOTAL     
         ***************************************************/
        function total(){
            var total=0.0;
            $('#tablaproductos tr').each(function(){
                   var i=0;
                   $(this).find('td').each(function(){
                       if(i==5){
                         total+=parseFloat(this.innerHTML);
                       }
                       i++;
                   })    
            })
            document.getElementById("SpanTotal").innerHTML=total.toFixed(2);
            
            if(actuales.length>0){
                document.getElementById('botones').style.display = 'block';
            }else{
                document.getElementById('botones').style.display = 'none';
            }
            return total;
        }
    
       
        /**************************************************
                             CANCELAR COMPRA    
         ***************************************************/
    
        function cancelarCompra(){
             var h=0;
             $('#tablaproductos tr').each(function(){            
                 if(h>0){
                 this.remove();
                 }
                 
                 h++;
             })
             actuales.splice(0,actuales.length);
             cantidades.splice(0,cantidades.length);
             controlados.splice(0,controlados.length);
             total();
        }
        
         /**************************************************
                                SUBTOTAL     
         ***************************************************/
         function subtotal(value,id,tabla){  
                var i=0,j=-1;
                var precio;
             
                console.log(tabla);
                $("#"+tabla+" tr").each(function(){
                    if(this.id==id){
                        
                        if(tabla=="tablaModventas"){
                            cantidadesMod[j]=value;
                            idMod[j]=id;
                        }
                        
                       cantidades[j]=value;  
                       $(this).find('td').each(function(){
                           if(i==3){
                             precio=this.innerHTML * value;
                           }
                           if(i==5){
                              this.innerHTML=precio.toFixed(2);
                               subt[j]=precio;
                           }
                           i++;
                       })    
                    }
                    j++;
                })
                total();
         }
        
    
        /**************************************************
                            ELIMINAR FILA     
         ***************************************************/
    
        function deleteRow(id,tabla){
                console.log(id);
                var i=-1;
            
                if(tabla=='tablaModventas'){
                    console.log(id);
                    productosMod.push(id);
                }
            
                $("#"+tabla+" tr").each(function(){
                    if(this.id==id){
                      this.remove();
                      cantidades.splice(i,1);
                        
                     if(tabla=='tablaModventas'){
                       cantidadesMod.splice(i,1);
                     }    
                          
                    }
                    i++;
                })

                for(var i=0;i<actuales.length;i++){
                    if(actuales[i]==id){
                        actuales.splice(i,1);
                        break;
                    }
                }
            
                for(var i=0;i<controlados.length;i++){    
                    if(controlados[i]==id){
                           controlados.splice(i,1);
                            console.log("Eliminado controlado");
                        }
                }
            
                
            
                total();
         }
    

        function init_table(){     
             $.ajax({
                   url: '../ajax.php',
                   type:'post',
                   dataType:'json',
                   data:{
                   metodo:"obtenerventas"
                   }
                })
                .done(function(data){
                 console.log(data);               

                 table=$('#tablaventas').DataTable({
                    "aaData":data
                   }); 
                })
        }
    
     /**************************************************
                                FIN COMPRA     
     ***************************************************/
    
        function finCompra(){
            var i=0;
            var f=new Date();
            
            var productos="";
            var subtotales="";
            var cant="";
            var p="";
            var c="";
            var s="";
            
    
            
                for(var j=0;j<cantidades.length;j++){
                     cant+=cantidades[j]+",";
                }

            
                $('#tablaproductos tr').each(function(){
                       i=0;
                       $(this).find('td').each(function(){
                           switch(i){
                               case 0:
                                   productos+=(this.innerHTML+",");
                                   break;
                               case 5:
                                   subtotales+=(this.innerHTML+",");
                                   break;
                                   
                           }
                           i++;
                       })    
                })
            
                
            var cedula="123123";
            var idUsuario=1; //Cambiar este valor por el del user logeado
            var fecha=+f.getFullYear();
            if(String(f.getMonth()).length==1){
                fecha+="-0"+f.getMonth();
            }else{
                fecha+="-"+f.getMonth();
            }
            
            if(String(f.getDate()).length==1){
                fecha+="-0"+f.getDate();
            }else{
                fecha+="-"+f.getDate();
            }
            
            var hora="";
            
            if(String(f.getHours()).length==1){
                hora+="0"+f.getHours()+":";
            }else{
                hora+=f.getHours()+":";
            }
            
            if(String(f.getMinutes()).length==1){
                hora+="0"+f.getMinutes()+":";
            }else{
                hora+=f.getMinutes()+":";
            }
            
            if(String(f.getSeconds()).length==1){
                hora+="0"+f.getSeconds();
            }else{
                hora+=f.getSeconds();
            }
            
            var total =parseFloat(document.getElementById("SpanTotal").innerHTML);
            p=productos.substr(0,productos.length-1);
            c=cant.substr(0,cant.length-1);
            s=subtotales.substr(0,subtotales.length-1);
            
             $.ajax({
               url: '../ajax.php',
               type:'post',
               dataType:'json',
               data:{
               cedula:cedula,
               idusuario:idUsuario,
               fecha:fecha,
               hora:hora,
               total:total,
               productos:p,
               cantidades:c,
               subtotales:s,
               metodo:"agregarVenta"
               }
            })
            .done(function(){
    
            })
            .fail(function(e){
             console.log(e);               
            })
            .always(function(e){
               
                 $.ajax({
                   url: '../ajax.php',
                   type:'post',
                   dataType:'json',
                   data:{
                   metodo:"lastId"
                   }
                })
                .done(function(data){
                 console.log(data);
                 document.getElementById("claveFinVenta").innerHTML="Clave: "+data.idVenta;
                 document.getElementById("fechaFinVenta").innerHTML="Fecha: "+fecha;
                 document.getElementById("totalFinVenta").innerHTML="Total: "+total.toFixed(2);
                 $('#finVenta').modal('show');
                 cancelarCompra();
                 console.log(table);
                })
                           
            })
            
            
        } 
        
        
     $(document).ready(function() {
         
           var rool= $("#idderol").val();
        
            if(rool==1){
                document.getElementById('divinicio').style.display = 'block';
            }
     
         init_table();
         
         
         $('#eliminarventac').on('click',function(e){
            var venta = $("#claveventahidd").val();
            $.ajax({
                   url: '../ajax.php',
                   type:'post',
                   dataType:'json',
                   data:{
                   idVenta:venta,
                   metodo:"eliminarVenta"
                  }
            })
            
            var h=0;
             $('#tablaModVentas tr').each(function(){            
                 if(h>0){
                 this.remove();
                 }
                 
                 h++;
             })
             document.getElementById('botonesMod').style.display = 'none';
             location.reload();
            
         })
         
         
         
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
         
         
         
    
         $('#cargaventa').on('click',function(e){
             var claveventa=$('#claveventa').val();
                 console.log("entra");
                 $.ajax({
                   url: '../ajax.php',
                   type:'post',
                   dataType:'json',
                   data:{
                   claveventa:claveventa,
                   metodo:"obtenerventa"
                   }
                })
                .done(function(data){

                    console.log(data);
                         var h=0;
                         $('#tablaModventas tr').each(function(){            
                            if(h>0){
                                this.remove();
                            }
                 
                            h++;
                          })    
                     
                         for(var i=0;i<data.length;i++){
                            cantidadesMod.push(data[i].cantidad);
                            $("#claveventahidd").val(data[i].idVenta);
                            var fila= document.getElementById("tablaModventas").insertRow(-1);
                            fila.id=data[i].idProducto;
                            var celda=fila.insertCell(-1);
                            celda.innerHTML="<td>"+data[i].clave+"</td>";
                            var celda=fila.insertCell(-1);
                            celda.innerHTML="<td>"+data[i].nombre+"</td>";
                            var celda=fila.insertCell(-1);
                            celda.innerHTML="<td>"+data[i].tipo+"</td>";
                            var celda=fila.insertCell(-1);
                            celda.innerHTML="<td>"+data[i].precio+"</td>";
                            var celda=fila.insertCell(-1);
                            celda.innerHTML="<td>"+data[i].cantidad+"</td>";
                            var celda=fila.insertCell(-1);
                            celda.innerHTML="<td>"+data[i].subtotal+"</td>"; 
                            var celda=fila.insertCell(-1);
                            celda.innerHTML="<td><button id="+data[i].idProducto+" type=button onclick=deleteRow(this.id,'tablaModventas') class='btn btn-danger'>x</button></td>"; 
                         }
                         document.getElementById('botonesMod').style.display = 'block';
                         
                     
                })
                .fail(function(e){

                     console.log(e);               
                     
                })
         })
        
         $('#claveproducto').on('change',function(e){
             e.preventDefault();
            
             var claveProducto= $("#claveproducto").val();
             var ceduldaDoctor= $("#ceduladoctor").val(); 
            
             
             $.ajax({
               url: '../ajax.php',
               type:'post',
               dataType:'json',
               data:{
               claveProducto: claveProducto,
               cedulaDoctor: ceduldaDoctor,
               metodo:"obtenProducto"
               }
            })
            .done(function(data){
                 console.log(data);

                 var is=false;
                 
                 if(data!=null){
                     is=false
                     for(var i=0;i<actuales.length;i++){
                         if(data.clave==actuales[i]){
                             is=true;
                             break;
                         }
                     }
                     
                     
                     if(is==true){
                         $('#registrado').modal('show');
                     }else{
                         
                         if(data.tipo=='Controlado'){
                             console.log("Controlado");
                             controlados.push(data.clave);
                         }
                         
                         actuales.push(data.clave);
                         cantidades.push(1);
                         var form=document.getElementById("datosProducto");
                         form.reset();
                         var fila= document.getElementById("tablaproductos").insertRow(-1);
                         fila.id=data.clave;
                         var celda=fila.insertCell(-1);
                         celda.innerHTML="<td>"+data.clave+"</td>";
                         var celda=fila.insertCell(-1);
                         celda.innerHTML="<td>"+data.nombre+"</td>";
                         var celda=fila.insertCell(-1);
                         celda.innerHTML="<td>"+data.tipo+"</td>";
                         var celda=fila.insertCell(-1);
                         celda.innerHTML="<td>"+data.precio+"</td>";
                         var celda=fila.insertCell(-1);
                         celda.innerHTML="<td><input id="+data.clave+" type=number onkeypress='maximo(this.max,this.value)' onchange=subtotal(this.value,this.id,'tablaproductos') value=1 min=1 max="+data.diponibilidad+"></td>";
                         var celda=fila.insertCell(-1);
                         celda.innerHTML="<td>"+data.precio+"</td>";
                         var celda=fila.insertCell(-1);
                         celda.innerHTML="<td><button id="+data.clave+" type=button onclick=deleteRow(this.id,'tablaproductos') class='btn btn-danger'>x</button></td>";  
                         total();
                     }
                 
                 }else{
                     $('#myModal').modal('show'); 
                 }
                 console.log("success");
             })
            .fail(function(e){
                 console.log("fail");
                 console.log(e);
             })
            .always(function(){
                    console.log("always");
             });
        });
        
        
        
     });
        
    
</script>