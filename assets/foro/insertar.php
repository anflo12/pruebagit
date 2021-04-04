<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
	
	<?php
include_once("../conexion.php");


$nom=$_POST["nombre"];
$comentario=$_POST["comentarios"];
$imagen=$_FILES["imagen"]["name"];
$fecha=date("Y-m-d h-i-s");
$tamaño=$_FILES["imagen"]["size"];
$tipo=$_FILES["imagen"]["type"];

if($_FILES["imagen"]["name"]!=NULL){
if($tamaño<=200000 && $tipo=="image/jpg" || $tipo=="image/png" || $tipo=="image/jpeg" || $tipo=="image/gif"){ 
$carpeta=$_SERVER["DOCUMENT_ROOT"] . "/proyecto_sam/assets/img/";
move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta . $imagen);

}else if($tamaño>200000 || $tipo!="image/jpg" || $tipo!="image/png" || $tipo!="image/jpeg" || $tipo!="image/gif"){
	 
 exit("<script>alert('La imagen excede el tamaño autorizado o no es archivo de imagen')</script><meta http-equiv='Refresh' content='0.1;url=formulario.php'>");
	

}

}

$sql="INSERT INTO COMENTARIOS (FECHA,COMENTARIO,IMAGEN,NOMBRE) VALUES (:F,:C,:I,:N)";
$resultado=$mbd->prepare($sql);
$resultado->execute(array(":F"=>$fecha,":C"=>$comentario,":I"=>$imagen,":N"=>$nom));



header("location:formulario.php");

	?>



</body>

</html>

