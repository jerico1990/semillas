<?php
	$inbox=Inbox::model()->find('form_id=:form_id', array(':form_id'=>$model->id));
	$inboxs=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$model->id,'status_id'=>3));



$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Solicitud', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Actualizar Solicitud', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Solicitud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Administrar Solicitud', 'url'=>array('admin')),
);
?>

<h1>Ver Solicitud </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'headquarter_id',
		'crop_id',
		'variety_id',
		'category',
		'source_crop_code',
		'quantity',
		'location_id',
		'location_name',
		'location_annex',
		'area',
		'location_lon',
		'location_lat',
		'seed_date',
		'sow_estimate_quantity',
		'last_crop',
		'farmers_id',
		'registry_date',
	),
)); ?>

<?php
if($inbox->status_id!=1)
{
	//$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'pdf','url'=>array('inbox/pdf', 'id'=>$model->id))); 	

}

if($inboxs!==null)
{
	echo "</br>";	
	echo "Inspector Asignado: ". $inboxs->to0->crugeuser->username;
}


if($model->observacion_aprobado!==null)
{
	echo "</br>";	
	echo "Documento de Aprobacion: ";
	//$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'pdf','url'=>array('inbox/pdf', 'id'=>$model->id)));;
}
elseif($model->observacion_notificado!==null)
{
	echo "</br>";	
	echo "Documento de Notificacion: ";
	//$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'pdf','url'=>array('inbox/pdf', 'id'=>$model->id)));;
}

	echo "</br>";
	//$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'ver inspecciones','url'=>array('inspection/inspection','id'=>$model->id))); 



?>

