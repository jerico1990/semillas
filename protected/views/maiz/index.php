<?php
/* @var $this MaizController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inspections',
);

$this->menu=array(
	array('label'=>'Create Maiz', 'url'=>array('create')),
	array('label'=>'Manage Maiz', 'url'=>array('admin')),
);
?>

<h1>Maiz</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
