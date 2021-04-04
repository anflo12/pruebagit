<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet"  href="../css/estilo2.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Imbue:wght@600&display=swap" rel="stylesheet">
</head>
<body id="conte">
	<nav id="n">

	<div class="a" >
	<a id="link" style="text-decoration-line: none;" href='../../index.php' >Pagina de inicio</a>
	</div>
	<div class="a" >
	<a id="link" style="text-decoration-line: none;" href="../foro/formulario.php">Foro</a>
	</div>
	</nav>
	<header class="nom">
		
	<h1>ENVIANOS TU COMENTARIO POR CORREO</h1>

<form id="f" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	
<label class="form1"><input  placeholder="Nombre" type="text" name="nom"></label>
<label class="form1"><input placeholder="Apellido" type="text" name="ape" ></label>
<label class="form1"><input placeholder="Asunto"  type="text" name="asunto"></label>
<label class="form1"><input placeholder="Direccion_Email*" style="width: 205px;" required="required" type="text" name="email" size="30"></label>
<textarea style="margin-left:10px ;height: 80px;width:220px;margin-top:4px;resize: none;" name="comentario" maxlength="600" cols="30" placeholder="comentario*" required="required" ></textarea>
<label><input style="position: relative;margin-left: 182px;" type="submit" name="Enviar" value="Enviar"></label></form>

</header>


<?php

if(isset($_POST["Enviar"])){
$texto=$_POST["comentario"]; 
$destinatario=$_POST["email"];
$haders="MIME-version: 1.0\r\n"; 
$haders.="content-type: text/html; charset=utf8\r\n";
$haders.="from: prueba anthony <rubionn27@gmail.com>\r\n";
$exito=mail($destinatario,"",$texto,$haders);
if($exito==true){
echo "Mensaje enviado";
}else{
echo "Error";
}
}


?>
<footer>
	
</footer>


</body>
</html>