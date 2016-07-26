<?php
/* @var $this ProduccionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Produccions',
);

$this->menu=array(
	array('label'=>'Create Produccion', 'url'=>array('create')),
	array('label'=>'Manage Produccion', 'url'=>array('admin')),
);
?>

<h1>Produccions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
