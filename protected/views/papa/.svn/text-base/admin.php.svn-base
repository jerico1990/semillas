<?php
$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Papa','url'=>array('index')),
	array('label'=>'Create Papa','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
		$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
		$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('inspection-grid', {
		data: $(this).serialize()
	});
		return false;
	});
	");
?>

<h1>Manage Papa</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
	$this->widget('bootstrap.widgets.TbGridView',array(
							'id'=>'inspection-grid',
							'dataProvider'=>$model->search(),
							'filter'=>$model,
							'columns'=>array(
									'id',
									'inspection_number',
									'proposed_time',
									'proposed_date',
									'size',
									'established_date',
									/*
									'established_time',
									'real_date',
									'real_time',		
									'resultado',
									'observaciones',
									'recomendaciones',		
									'papa_campo_comercial',
									'papa_otra_especie',
									'papa_otro_cultivar',
									'papa_fecha_siembra',
									'papa_plagas',
									'user_id',
									'form_id',
									*/
									array(
										'class'=>'bootstrap.widgets.TbButtonColumn',
									),
							),
							));
?>
