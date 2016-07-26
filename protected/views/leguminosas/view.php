<?php
/* @var $this LeguminosasController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Leguminosas', 'url'=>array('index')),
	array('label'=>'Create Leguminosas', 'url'=>array('create')),
	array('label'=>'Update Leguminosas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Leguminosas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Leguminosas', 'url'=>array('admin')),
);
?>

<h1>View Leguminosas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'inspection_number',
		'proposed_time',
		'proposed_date',
		'size',
		'established_date',
		'established_time',
		'real_date',
		'real_time',		
		'resultado',
		'observaciones',
		'recomendaciones',		
		'leg_fecha_siembra',
		'leg_emergencia_fecha',
		'leg_floracion',
		'leg_llenado_grano',
		'leg_fecha_cosecha',
		'leg_distanciamiento_surcos',
		'leg_mata',
		'leg_campo_comercial',
		'leg_otra_especie',
		'leg_otro_cultivar',
		'leg_presencia_maleza',
		'leg_presencia_plagas',
		'leg_plantas_otras_especies',
		'leg_plantas_fuera_tipo',		
		'user_id',
		'form_id',
	),
)); ?>
