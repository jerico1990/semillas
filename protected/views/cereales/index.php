<?php
/* @var $this CerealesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inspections',
);

$this->menu=array(
	array('label'=>'Create Cereales', 'url'=>array('create')),
	array('label'=>'Manage Cereales', 'url'=>array('admin')),
);
?>

<h1>Cereales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
