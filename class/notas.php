<?php
include_once("bd.php");
class notas extends bd{
	var $tabla="notas";
    function mejores($codcurso,$bimestre){
        switch($bimestre){
            case "1" :{$dato="bimestre".$bimestre;}break;
            case "2" :{$dato="bimestre".$bimestre;}break;
            case "3" :{$dato="bimestre".$bimestre;}break;
            case "4" :{$dato="bimestre".$bimestre;}break;
            case "Todos" :{$dato="notafinal";}break;    
        }
        //echo $dato;
        $this->campos=array("avg($dato)as nota,codalumno");
        return $this->getRecords("activo=1 and codalumno IN(SELECT codalumno FROM alumno WHERE codcurso=$codcurso) GROUP BY codalumno ORDER BY avg($dato) DESC");
    }
}
?>