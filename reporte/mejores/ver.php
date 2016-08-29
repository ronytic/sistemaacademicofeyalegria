<?php
include_once("../../impresion/pdf.php");
$titulo="Mejores y Peores Notas";
$bimestre=$_GET['bimestre'];
$codcurso=$_GET['codcurso'];

include_once("../../class/alumno.php");
$alumno=new alumno;

include_once("../../class/curso.php");
$curso=new curso;
$cur=array_shift($curso->mostrar($codcurso));

include_once("../../class/docentemateriacurso.php");
$docentemateriacurso=new docentemateriacurso;

include_once("../../class/materia.php");
$materia=new materia;

include_once("../../class/notas.php");
$notas=new notas;

class PDF extends PPDF{
	function Cabecera(){
		global $bimestre,$cur,$docentemateriacurso,$materia,$codcurso;
		$this->Ln();
		$this->CuadroCabecera(25,"Curso:",50,capitalizar($cur['nombre']),0);
	    $this->CuadroCabecera(25,"Bimestre:",50,capitalizar($bimestre),0);
		$this->Ln();
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(20,"Paterno");
		$this->TituloCabecera(20,"Materno");
		$this->TituloCabecera(30,"Nombres");
		$this->TituloCabecera(30,"Nota");
	}	 
}

$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
$i=0;

foreach($notas->mejores($codcurso,$bimestre) as $n){$i++;
    $al=$alumno->mostrar($n['codalumno']);
    $al=array_shift($al);
    $pdf->CuadroCuerpo(10,$i,"","R",1);
    $pdf->CuadroCuerpo(20,capitalizar($al['paterno']),"","",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['materno']),"","",1);
	$pdf->CuadroCuerpo(30,capitalizar($al['nombres']),"","",1);
    $pdf->CuadroCuerpo(30,number_format($n['nota'],2),($n['nota']<51?1:0),"R",1);
    $pdf->Ln();
}

$pdf->Output("Mejores y Peores.pdf","I");
?>