<?php
/* @var $this CultivarController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Cultivar',
);
*/
$this->menu=array(
	array('label'=>'Crear Cultivar', 'url'=>array('create')),
	array('label'=>'Administrar Cultivar', 'url'=>array('admin')),
);
?>

<h1>Cultivar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
