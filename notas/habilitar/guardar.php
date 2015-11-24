<?php
include_once("../../login/check.php");
if(!empty($_POST)):

extract($_POST);

include_once("../../class/docentemateriacurso.php");
include_once("../../class/alumno.php");
include_once("../../class/notas.php");
$docentemateriacurso=new docentemateriacurso;
$alumno=new alumno;
$notas=new notas;
//echo "<pre>";print_r($_POST);echo "</pre>";
$notas->vaciar();
$docmatcur=$docentemateriacurso->mostrarTodo("");
foreach($docmatcur as $dmc){
	for($i=1;$i<=4;$i++){
		foreach($alumno->mostrarTodo("codcurso=".$dmc['codcurso']) as $al){
			$valores=array(	"coddocentemateriacurso"=>"'".$dmc['coddocentemateriacurso']."'",
							"codalumno"=>"'".$al['codalumno']."'",
							"trimestre"=>"'".$i."'",
							"nota"=>"'0'",
							"dps"=>"'0'",
							"notafinal"=>"'0'",
							);
							/*echo "<pre>";	
							print_r($valores);
							echo "</pre>";*/
			$notas->insertar($valores);
		}
	}
}

$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$nuevo=0;
$listar=1;
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>