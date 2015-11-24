<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Habilitar Registro de Notas";

$garantia=array(1=>"Si",0=>"No");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    <tr>
						<td><div class="rojoC">CUIDADO, Debe de tener registrado y asignado correctamente, a los Docentes , Materias y Curso,<br>SE GENERARA PARA LOS 4 PERIODOS, TEGNA MUCHO CUIDADO, <br>SI YA TIENE REGISTRADO NOTAS TENGA ENCUENTA QUE VOLVERAN AL VALOR INICIAL</div></td>
					</tr>
                 
					<tr><td><?php campos("Habilitar Notas ","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>