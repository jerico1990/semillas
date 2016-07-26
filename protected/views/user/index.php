<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Usuario',
);
*/
if(Yii::app()->user->name=='admin')
{
	$this->menu=array(
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Admistrar Usuario', 'url'=>array('admin')),
	);	
}

?>

<h1>Usuario</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
