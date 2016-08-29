<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Curso";
$id=$_GET['id'];
include_once '../../class/curso.php';
$curso=new curso;
$cur=array_shift($curso->mostrar($id));

$garantia=array(1=>"Si",0=>"No");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script type="text/javascript" language="javascript">
$(document).on("ready",function(){
    $("#nombre").keyup(function(e) {
        var valor=$(this).val();
        var dato="";
        dato+=valor[0];
        for(i=1;i<=valor.length;i++){
            if(valor[i]==" "){
                if(typeof(valor[i+1])!=="undefined")
                dato+=valor[i+1];    
            }    
        }
        $("#abreviado").val(dato.toUpperCase())
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
						<td><?php campos("Nombre de Curso","nombre","text",$cur['nombre'],0,array("size"=>"40"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Abreviado","abreviado","text",$cur['abreviado'],0,array("size"=>"40"));?></td>
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