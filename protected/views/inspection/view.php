<?php
/* @var $this InspectionController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Inspection', 'url'=>array('index')),
	array('label'=>'Create Inspection', 'url'=>array('create')),
	array('label'=>'Update Inspection', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Inspection', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Inspection', 'url'=>array('admin')),
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
		'alg_fecha_siembra',
		'alg_deshije',
		'alg_floracion',
		'alg_bellotas',
		'alg_surcos',
		'alg_mata',
		'alg_campo_comercial',
		'alg_otra_especie',
		'alg_otra_cultivar',
		'alg_plantas_otra_especie',
		'alg_plantas_fuera_tipo',
		'resultado',
		'observaciones',
		'recomendaciones',
		'arz_siembra_directa',
		'arz_transplante',
		'arz_fecha_siembra',
		'arz_fecha_almacigo',
		'arz_fecha_transplante',
		'arz_area_instalada',
		'arz_aislamiento',
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
	),
)); ?>
