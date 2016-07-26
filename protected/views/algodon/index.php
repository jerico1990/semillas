<?php
/* @var $this AlgodonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inspections',
);

$this->menu=array(
	array('label'=>'Create Algodon', 'url'=>array('create')),
	array('label'=>'Manage Algodon', 'url'=>array('admin')),
);
?>

<h1>Inspections</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
