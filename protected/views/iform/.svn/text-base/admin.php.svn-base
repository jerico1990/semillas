<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	'Administrar',
);




$this->menu=array(
	array('label'=>'Listar Solicitudes', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#form-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Solicitudes</h1>



<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'form-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		      'name'=>'crop_id',
		      'value'=>'$data->crop->name',
		      ),
		array(
		      'name'=>'variety_id',
		      'value'=>'$data->variety->name',
		      ),
		array(
		      'name'=>'category',
		      'value'=>'$data->variety->name',
		      ),
		
		//'category',
		
		array(
			'class'=>'CButtonColumn',
			
		),		
	),
)); ?>



