<?php
/*
$this->breadcrumbs=array(
	'Payments',
);

$this->menu=array(
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);*/
?>

<h1>Pendientes de Pago</h1>

<div class="form">
<?php echo CHtml::form(array('pay'), 'post', array ()); ?>

	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>

<?php //echo CHtml::submitButton('Generar',array('id'=>'generar')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Generar nota de pago','htmlOptions' => array('id'=>'generar','name'=>'yt0','value'=>'Generar'),)); ?>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->