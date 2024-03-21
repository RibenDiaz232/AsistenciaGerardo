<?php $carrera = (!empty($_GET['carrera'])) ? $_GET['carrera'] : null;
$semestre = (!empty($_GET['semestre'])) ? $_GET['semestre'] : null;
$grupo = (!empty($_GET['grupo'])) ? $_GET['grupo'] : null;
if ($carrera != null && $semestre != null && $grupo != null) { ?>
<input type="hidden" id="carrera" value="<?php echo $carrera; ?>">
<input type="hidden" id="semestre" value="<?php echo $semestre; ?>">
<input type="hidden" id="grupo" value="<?php echo $grupo; ?>">
<div id="registro"></div>
<?php }else{
    echo 'PAGINA NO ENCONTRADA';
} ?>