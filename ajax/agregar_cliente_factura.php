<?php
	
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_GET['id'])){$id=$_GET['id'];}

//var_dump($_POST);
/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
$sql=mysqli_query($con, "select * from clientes where id_cliente=".$id);
$lista= array();
while($cli=mysqli_fetch_array($sql))
	$lista[] = array('docide'=> $cli["docide_cliente"], 'nombre'=> $cli["nombre_cliente"], 'tlf'=> $cli["telefono_cliente"],'email'=> $cli["email_cliente"]);

echo json_encode($lista);
?>
