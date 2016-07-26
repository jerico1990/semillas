<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */

?>

<h1>View Acondicionamiento #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'produccion_area',
		'produccion_total',
		'produccion_fecha_cosecha',		
	),
)); ?>
