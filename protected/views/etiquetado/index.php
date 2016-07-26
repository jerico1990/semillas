<?php
/* @var $this EtiquetadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etiquetados',
);

$this->menu=array(
	array('label'=>'Create Etiquetado', 'url'=>array('create')),
	array('label'=>'Manage Etiquetado', 'url'=>array('admin')),
);
?>

<h1>Etiquetados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
