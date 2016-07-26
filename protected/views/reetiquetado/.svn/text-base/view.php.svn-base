<?php
/* @var $this ReetiquetadoController */
/* @var $model Acondicionamiento */

$this->breadcrumbs=array(
	'Acondicionamientos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Acondicionamiento', 'url'=>array('index')),
	array('label'=>'Create Acondicionamiento', 'url'=>array('create')),
	array('label'=>'Update Acondicionamiento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Acondicionamiento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Acondicionamiento', 'url'=>array('admin')),
);
?>

<h1>View Acondicionamiento #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'form_id',
		'inspection_id',
		'number_envases',
		'capacidad_envases',
		'peso_estimado',
		'descripcion_secado',
		'peso_ingreso',
		'peso_salida',
		'cantidad_lotes',
		'cantidad_envases',
		'tipo_envase',
		'disponibilidad',
		'descripcion',
		'operatividad',
		'limpieza',
		'number_acondicionamiento',
		'district_id',
		'province_id',
		'departament_id',
		'address',
		'fecha_cosecha',
		'observacion',
		'afectadas_erwinia',
		'afectadas_fusarium',
		'afectadas_rhizoctoniasis',
		'afectadas_mezcla_varietal',
		'afectadas_fuera_tamano',
		'movilizacion_fecha',
		'movilizacion_cantidad',
		'movilizacion_origen_distrito',
		'movilizacion_destino_distrito',
		'movilizacion_origen',
		'movilizacion_destino',
		'movilizacion_destino_predio',
		'movilizacion_origen_predio',
		'registro_planta',
		'identificacion_lote_semilla',
		'reetiquetado_mezclar_categorias',
		'reetiquetado_campana',
		'reetiquetado_categoria_resultante',
		'reetiquetado_control_resultante',
		'reetiquetado_motivo',
		'reetiquetado_analisis_semilla',
		'reetiquetado_observacion',
	),
)); ?>
