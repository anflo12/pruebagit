<?php


try {
	$mbd=new PDO("mysql:host=localhost;dbname=foro","root","");
	$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$mbd->exec("SET CHARACTER SET utf8");
} catch (Exception $e) {
	die("Error en la conexion: " . $e->getmessage());
	echo "Error en la conexion: " . $e->getline();	
			}

		


?>