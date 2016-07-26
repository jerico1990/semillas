<?php
/* @var $this ConditioningLabController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plantas',
);

$this->menu=array(
	array('label'=>'Crear Plantas', 'url'=>array('create')),
	array('label'=>'Administrar Plantas', 'url'=>array('admin')),
);
?>

<h1>Conditioning Labs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
