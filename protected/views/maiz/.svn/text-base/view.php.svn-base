<?php
/* @var $this MaizController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Maiz', 'url'=>array('index')),
	array('label'=>'Create Maiz', 'url'=>array('create')),
	array('label'=>'Update Maiz', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Maiz', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Maiz', 'url'=>array('admin')),
);
?>

<h1>View Inspection #<?php echo $model->id; ?></h1>

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
		'maiz_fecha_siembra',
		'maiz_emergencia_fecha',
		'maiz_floracion',
		'maiz_llenado_grano',
		'maiz_fecha_cosecha',
		'maiz_distanciamiento_surcos',
		'maiz_mata',
		'maiz_campo_comercial',
		'maiz_otra_especie',
		'maiz_otro_cultivar',
		'maiz_presencia_maleza',
		'maiz_presencia_plagas',
		'maiz_plantas_otras_especies',
		'maiz_plantas_fuera_tipo',		
		'user_id',
		'form_id',
	),
)); ?>
