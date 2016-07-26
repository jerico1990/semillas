<?php
/* @var $this LeguminosasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inspections',
);

$this->menu=array(
	array('label'=>'Create Leguminosas', 'url'=>array('create')),
	array('label'=>'Manage Leguminosas', 'url'=>array('admin')),
);
?>

<h1>Leguminosas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
