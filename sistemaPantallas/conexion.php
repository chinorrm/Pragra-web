<?php
class conexion{
        
    /* variables de conexión */
     private $BaseDatos;
     private $Servidor;
     private $Usuario;
     private $Clave;
     public $Conexion_ID;
     private $Consulta;
  
 
 
    /* Método Constructor: Cada vez que creemos una variable
    de esta clase, se ejecutará esta función */
    function conexion() {
        $this->BaseDatos = "Web1";
        $this->Servidor = "localhost";
        $this->Usuario = "root";
        $this->Clave = "";
        $this->Error = "Exitosamente";
    }

    /*Conexión a la base de datos*/
     public function conectar(){
        // Conectamos al servidor
        $this->Conexion_ID = mysqli_connect($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
        if (!$this->Conexion_ID) {
            $this->Error = "Ha fallado la conexión.";
            return 0;
        }

        //seleccionamos la base de datos
        if (!@mysql_select_db($this->BaseDatos, $this->Conexion_ID)) {
            $this->Error = "Imposible abrir ".$this->BaseDatos ;
            return 0;
        }
        
    } 
    
}
?>