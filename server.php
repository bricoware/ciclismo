<?php  
      

// Crear servidor de SOAP      
$server = new SoapServer(
				null, 
				// No utilizar WSDL     
				array('uri' => 'urn:webservices') // Se debe especificar el URI    
); 

function saudar(){
	return 5;
}

function engadir($texto){
	
	$conector = new mysqli("localhost", "root", "", "ciclismo");
	
	$consulta = "INSERT INTO ciclista (Dorsal, Nombre, Edad, peso, altura, NomeQ) VALUES (\"$dorsal\",\"$nomeCiclista\",\"$dataNacemento\",\"$peso\",\"$altura\",\"$equipo\")";
	
	$pregunta = $conector->query($texto);
	
	if($conector->errno){
		return $conector->error;
	}
	
	return $pregunta;
	
}

function listaxeEquipos(){
	$conector = new mysqli("localhost", "root", "", "ciclismo");
	$consulta = "SELECT * FROM equipo";
	$pregunta = $conector->query($consulta);
	
	$arrayEquipos = $pregunta->fetch_all();
	
	return $arrayEquipos;
	
}

$server->addFunction("saudar");
$server->addFunction("engadir");
$server->addFunction("listaxeEquipos");
$server->handle();
?>

























