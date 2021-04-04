	<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Francois+One&family=Ibarra+Real+Nova&display=swap" rel="stylesheet">

	<link rel="stylesheet"  href="../css/estilo.css">
</head>
<body>
	<figure><img class='img' src="../img/logo.jpg"></figure>
<header class="header" >
	
	<h1>FORO DE COMENTARIOS</h1>
	
	<nav id="n">

	<div class="a" >
	<a id="link" style="text-decoration-line: none;" href='../../index.php' >Pagina de inicio</a>
	</div>
	<div class="a" >
	<a id="link" style="text-decoration-line: none;" href="../contactar/contacto.php">contactanos</a>
	</div>
	</nav>

	
</header>


<aside id="a">

<table class='nom'>

	<form action="insertar.php" method="post" enctype="multipart/form-data">
		<tr><td ><input class="cas" type="text" name="nombre" placeholder="Nombres y apellidos" style="height:25px; margin-bottom: 10px;"></td></tr>
		
		<tr><td><textarea class="cas" name="comentarios" id="comentarios" required="required" minlength="10" maxlength="300" style="height:90px; width:250px;resize: none;" placeholder="Comentarios*"></textarea></td></tr>
		
		<tr><td><div id="d"><input type="file" name="imagen" id="btn_enviar"><p id="texto">Selecione la imagen</p></div></div></td></tr></table>
		<div id="button">
		<input type="submit" name="enviar" value="Comentar" style="background-color: red;color:white;border: none;">
		</div>

	</form>
	
</aside>
<section>
	<?php
	
	include_once("../conexion.php");

	if(isset($_GET["pagina"])){
		if ($_GET["pagina"]==1) {
			header("location:formulario.php");
		}else{
			$pagina=$_GET["pagina"];
		}
	}else{
		$pagina=1;
	}

	$cantidad=7;
	
	$empezar=($pagina-1)*$cantidad;
	$sql="SELECT * FROM COMENTARIOS";
		$resul=$mbd->prepare($sql);
		$resul->execute(array());
		$numfilas=$resul->rowcount(); 
		$totalp=ceil($numfilas/$cantidad);







$consulta=$mbd->query("SELECT * FROM COMENTARIOS ORDER BY FECHA DESC LIMIT $empezar,$cantidad");


while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
echo "<div style='border:1px solid';background-color: #4F5950;>";
	echo "<strong style='font-size:18px;margin-right:250px;'>" . $fila["NOMBRE"] . "</strong>";
	echo "<h2 style='font-style:italic;margin-right:250px;'>" . $fila["FECHA"] . "</h2>";
	
	echo "<p class='com'>" . $fila["COMENTARIO"] . "</p>";
	if($fila["IMAGEN"]!=NULL){
		echo "<figure class='op'>";
echo "<img class='cl' src='../img/" . $fila["IMAGEN"] . "' width='110px' height='140px'/>";
echo "</figure>";

}else{
	echo "<figure class='op'>";
	echo "<img class='cl' src='../img/logo.jpg' width='105px' height='130px'>";
	echo "</figure>";
}
	echo "</div>";
}



	?>

	</section>
	<footer style="padding: 5px;">
		<?php
		
for ($i=1; $i <= $totalp ; $i++) { 
		echo "<a class='pie' href='?pagina=" . $i . "'>" . $i . "</a>  ";
	}
	

	?>
	</footer>


</body>
</html>