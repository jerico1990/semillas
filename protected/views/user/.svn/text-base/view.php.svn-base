<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),	
	array('label'=>'List User', 'url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess('admin')),
	array('label'=>'Create User', 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('admin')),	
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'visible'=>Yii::app()->user->checkAccess('admin')),
	array('label'=>'Manage User', 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'role_id',
		'name',
		'ruc',
		'cruge_user_id',
		'type_id',
		'person_type',
		'legal_name',
		'first_name',
		'last_name',
		'registry',
		'district_id',
		'email',
		'status',
	),
)); ?>
