<?php
include_once("../../impresion/pdf.php");
$titulo="Documentos Presentados";
$bimestre=$_GET['bimestre'];
$codcurso=$_GET['codcurso'];

include_once("../../class/alumno.php");
$alumno=new alumno;

include_once("../../class/curso.php");
$curso=new curso;
$cur=array_shift($curso->mostrar($codcurso));

include_once("../../class/docentemateriacurso.php");
$docentemateriacurso=new docentemateriacurso;


class PDF extends PPDF{
	function Cabecera(){
		global $bimestre,$cur,$materia,$codcurso;
		$this->Ln();
		$this->CuadroCabecera(25,"Curso:",50,capitalizar($cur['nombre']),0);
	    //$this->CuadroCabecera(25,"Bimestre:",50,capitalizar($bimestre),0);
		$this->Ln();
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(20,"Paterno");
		$this->TituloCabecera(20,"Materno");
		$this->TituloCabecera(30,"Nombres");
        $this->TituloCabecera(30,"Fotocopia. CI");
        $this->TituloCabecera(30,"Fot. Cert. Nac.");
        $this->TituloCabecera(30,"Form. Rude");
        $this->TituloCabecera(30,"Fot. CI Tutor");
        $this->TituloCabecera(30,"Compromiso");
	}	 
}

$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
$i=0;
foreach($alumno->mostrarTodo("codcurso=".$codcurso,"paterno,materno,nombres") as $al){$i++;
	$pdf->CuadroCuerpo(10,$i,"","R",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['paterno']),"","",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['materno']),"","",1);
	$pdf->CuadroCuerpo(30,capitalizar($al['nombres']),"","",1);
	$pdf->CuadroCuerpo(30,capitalizar($al['fotocopiaci']?'Si':'No'),"","C",1);
    $pdf->CuadroCuerpo(30,capitalizar($al['fotocopianacimiento']?'Si':'No'),"","C",1);
    $pdf->CuadroCuerpo(30,capitalizar($al['formulariorude']?'Si':'No'),"","C",1);
    $pdf->CuadroCuerpo(30,capitalizar($al['fotocopiapadre']?'Si':'No'),"","C",1);
    $pdf->CuadroCuerpo(30,capitalizar($al['compromiso']?'Si':'No'),"","C",1);
	$pdf->Ln();
}

$pdf->Output("Documentos Presentados.pdf","I");
?>