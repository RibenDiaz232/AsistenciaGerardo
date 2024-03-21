<?php $carrera = (!empty($_GET['carrera'])) ? $_GET['carrera'] : null;
$semestre = (!empty($_GET['semestre'])) ? $_GET['semestre'] : null;
if ($carrera != null && $semestre != null) { ?>
<input type="hidden" id="carrera" value="<?php echo $carrera; ?>">
<input type="hidden" id="semestre" value="<?php echo $semestre; ?>">
<div id="registro"></div>
<?php }else{
    echo 'PAGINA NO ENCONTRADA';
} ?>