<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Materia";
$id=$_GET['id'];
include_once '../../class/materia.php';
$materia=new materia;
$mat=array_shift($materia->mostrar($id));

$garantia=array(1=>"Si",0=>"No");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">
$(document).ready(function(e) {
    $("#acuenta,#saldo,#total").change(function(e) {
        var acuenta=$("#acuenta").val();
		var saldo=$("#saldo").val();
		var total=$("#total").val();
		$("#saldo").val(total-acuenta);
    });
});
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
                    <tr>
						<td><?php campos("Nombre de Materia","nombre","text",$mat['nombre'],0,array("size"=>"40"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Abreviado","abreviado","text",$mat['abreviado'],0,array("size"=>"40"));?></td>
					</tr>
                  
					<tr><td><?php campos("Guardar","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>