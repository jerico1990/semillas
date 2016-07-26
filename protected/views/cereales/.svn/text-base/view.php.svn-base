<?php
/* @var $this CerealesController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cereales', 'url'=>array('index')),
	array('label'=>'Create Cereales', 'url'=>array('create')),
	array('label'=>'Update Cereales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cereales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cereales', 'url'=>array('admin')),
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
		'cer_fecha_siembra',
		'cer_floracion',
		'cer_maduracion',
		'cer_inflorecencias_otros_cultivares',
		'cer_inflorecencias_otros_cultivares_menores',
		'cer_carbon_apestoso',
		'cer_carbon_cubierto',
		'cer_carbon_volador',
		'cer_cornezuelo',
		'cer_mancha_foliar',
		'cer_escaldadura',
		'cer_presencia_maleza_nocivas',
		'cer_aspecto_general_poblacion',
		'cer_plagas',
		'cer_aislamiento',
		'cer_otra_cultivar',
		'cer_otra_categoria',		
		'user_id',
		'form_id',
	),
)); ?>
