<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/notas.php");
$notas=new notas;
extract($_POST);

foreach($n as $no){
	$valores=array(	"nota"=>"'".$no['nota']."'",
				"dps"=>"'".$no['dps']."'",
				"notafinal"=>"'".$no['notafinal']."'",
				);	
	/*echo "<pre>";
	print_r($valores);
	echo "</pre>";*/
	
	$notas->actualizar($valores,$no['codnotas']);
}

$mensaje[]="SUS NOTAS SE GUARDARON CORRECTAMENTE";


$nuevo=1;
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>