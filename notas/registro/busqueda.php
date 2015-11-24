<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/alumno.php';
	include_once '../../class/curso.php';
	include_once '../../class/docentemateriacurso.php';
	include_once '../../class/notas.php';
	extract($_POST);
	
	$alumno=new alumno;
	$curso=new curso;
	$notas=new notas;
	$docentemateriacurso=new docentemateriacurso;
	if($coddocentemateriacurso==""){
		echo "Seleccione un Curso y Materia Por favor";	
		exit();
	}
	$dmc=array_shift($docentemateriacurso->mostrar($coddocentemateriacurso));
	$cur=array_shift($curso->mostrar($dmc['codcurso']));
	
	
	$al=$alumno->mostrarTodo("codcurso=".$dmc['codcurso'],"paterno,materno,nombres");
	$i=0;
	foreach($al as $a){$i++;
		$d[$i]['codalumno']=$a['codalumno'];
		$d[$i]['paterno']=capitalizar($a['paterno']);
		$d[$i]['materno']=capitalizar($a['materno']);
		$d[$i]['nombres']=capitalizar($a['nombres']);
		$d[$i]['curso']=$cur['nombre'];
		$d[$i]['sexo']=$a['sexo']?'Masculino':'Femenino';
		$d[$i]['rude']=$a['rude'];
		$d[$i]['telefonocasa']=$a['telefonocasa'];
		$d[$i]['celular']=$a['celular'];
		$n=array_shift($notas->mostrarTodo("coddocentemateriacurso=".$coddocentemateriacurso." and trimestre=".$trimestre." and codalumno=".$a['codalumno']));
		
		$d[$i]['nota']='<input type="hidden" name="n['.$i.'][codnotas]" value="'.$n['codnotas'].'">
		<input type="number" name="n['.$i.'][nota]" value="'.$n['nota'].'" required max="70" min="0" style="width:35px;">';
		$d[$i]['dps']='<input type="number" name="n['.$i.'][dps]" value="'.$n['dps'].'" required max="10" min="0" style="width:35px;">';
		$d[$i]['notafinal']='<input type="number" name="n['.$i.'][notafinal]" value="'.$n['notafinal'].'" required max="70" min="0" style="width:35px;">';
	}
	$titulo=array("paterno"=>"Paterno","materno"=>"Materno","nombres"=>"Nombres","nota"=>"Nota","dps"=>"Dps","notafinal"=>"Nota Final");
	?>
    <form action="actualizar.php" method="post">
    
	<strong>Curso: <?php echo $cur['nombre']?></strong>
    <?php
	listadoTablaregistro($titulo,$d,0,$modi,$elimi,$ver);
	?>
    <input type="submit" value="Guardar Nota">
    </form>
    <?php
	
}
?>