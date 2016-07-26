<?php
$inbox=Inbox::model()->find('form_id=:form_id', array(':form_id'=>$model->id));
$inboxs=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$model->id,'status_id'=>3));
$inspector = User::model()->findAll('type_id=1');



$this->breadcrumbs=array(
	'Solicitudes'=>array('aindex'),
	$model->id,
);

?>

<h1>Ver Solicitud </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'headquarter_id',
		'crop_id',
		'variety_id',
		'category',
		'source_crop_code',
		'quantity',
		'location_id',
		'location_name',
		'location_annex',
		'area',
		'location_lon',
		'location_lat',
		'seed_date',
		'sow_estimate_quantity',
		'last_crop',
		'farmers_id',
		'registry_date',
	),
)); ?>


<?php




if($inbox->status_id!=1)
{
//$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'pdf','url'=>array('inbox/pdf', 'id'=>$model->id))); 	
}

?>


<!--Inspector-->
<?php


if($inboxs===null )
{
	$list = CHtml::listData($inspector,'id','crugeuser.username');
	echo "</br>";
?>
	<div class="form">
		
		<?php 
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'form-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'htmlOptions'=>array('class'=>'well'),
		   
		));
		
		?>	
		<?php echo $form->dropDownListRow($model, 'inspector_id', $list, array('id'=>'inspector','empty'=>'Seleccionar..'));; ?>
			
		<?php
		echo CHtml::ajaxLink(
					"Asignar",
					Yii::app()->createUrl( 'form/asignarinsp' ),
					array( // ajaxOptions
					  'type' => 'POST',
					  /*'beforeSend' => "function( request )
							   {
							     // Set up any pre-sending stuff like initializing progress indicators
							   }",
					  */'success' => "function( data )
							{
							  location.reload();
							}",
					  'data' => array( 'form' => $model->id, 'inspector' => 'js:$("#inspector").val()' )
					),
					array( //htmlOptions
					  'href' => Yii::app()->createUrl( 'form/asignarinsp' )					 
					)
				      );	
		?>					 
		<?php $this->endWidget(); ?>
	</div><!-- form -->
<?php
	}
else
	{
	echo "</br>";	
	echo $inboxs->to0->crugeuser->username;
	
	} ?>
<!--Fin Inspector-->


