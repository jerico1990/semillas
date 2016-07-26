<?php
/* @var $this InboxController */
/* @var $model Inbox */

$this->breadcrumbs=array(
	'Inboxes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Inbox', 'url'=>array('index')),
	array('label'=>'Create Inbox', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#inbox-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Correo</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inbox-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	//'fixedLeft' => array('CCheckBoxColumn'), //fix checkbox to the left side 
	'columns'=>array(
		'id',
		'date',
		'form_id',
		'to',
		array(
		      'name'=>'status_id',
		      'value'=>'$data->status->status_name',
		      ),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update} {view} {delete}',
			//'visible'=>$model->status_id=='1',
			'buttons'=>array (
			    'update'=> array(
				'label'=>'',
				'imageUrl'=>'',
				'visible'=>'$data->status_id == 1',
				//'click'=>'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
				'options'=>array( 'class'=>'icon-edit' ),
			    ),
			    'view'=>array(
				'label'=>'',
				'imageUrl'=>'',
				'options'=>array( 'class'=>'icon-search' ),
			    ),
			    'delete'=>array(
				'label'=>'',
				'imageUrl'=>'',
				'visible'=>'$data->status_id == 1',
				//'click'=>'function(){alert("asda");}',
				'options'=>array( 'class'=>'icon-remove'),
			    ),
			),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{email}',
			'buttons'=>array (
				'email'=> array(
				'label'=>'',
				'url'=>'Yii::app()->createUrl("inbox/mensaje", array("id"=>$data->id))',				
				'imageUrl'=>'',				
				'options'=>array('class'=>'icon-edit'),
				),
				
			)
		),
	),
)); ?>

