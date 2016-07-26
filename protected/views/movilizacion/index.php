<?php
/* @var $this MovilizacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Movilizacions',
);

$this->menu=array(
	array('label'=>'Create Movilizacion', 'url'=>array('create')),
	array('label'=>'Manage Movilizacion', 'url'=>array('admin')),
);
?>

<h1>Movilizacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
