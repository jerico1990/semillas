<?php
/* @var $this FormController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Solicitud',
);
*/
/*
$this->menu=array(
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	//array('label'=>'Administrar Solicitud', 'url'=>array('admin')),
);*/
//get count

 

?>

<h1>Expedientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	//'template'=>'{items} {pager}',
	'itemView'=>'_fmodificacionview',
	
	
)); ?>