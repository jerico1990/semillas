<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Usuarios',
);
*/
if(Yii::app()->user->checkAccess('peas'))
{
	$this->menu=array(
	//array('label'=>'Crear Organismo Certificador', 'url'=>array('estcreate')),
	//array('label'=>'Crear Inspector', 'url'=>array('inscreate')),
	array('label'=>'Crear Productor Inia', 'url'=>array('icreate')),
	//array('label'=>'Crear Productor Ext.', 'url'=>array('create')),
	array('label'=>'Administrar Usuario', 'url'=>array('iadmin')),
	);
	$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>false, // whether this is a stacked menu
		'items'=>array(
			array('label'=>'Home', 'url'=>'#', 'active'=>true),
			array('label'=>'Profile', 'url'=>'#'),
			array('label'=>'Messages', 'url'=>'#'),
		),
	)); 

}

?>

<h1>Usuarios</h1>

<div class="row-fluid well span12">
		  
</div>
<div class="row-fluid well span12">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'i_view',
)); ?>
</div>

