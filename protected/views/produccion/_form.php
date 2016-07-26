<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
$user=User::model()->find('cruge_user_id=:cruge_user_id',array(':cruge_user_id'=>Yii::app()->user->id));

$form=Iform::model()->find('id=:id',array(':id'=>$model->form_id));

$criteria1=new CDbCriteria;
$criteria1->condition='form_id=:form_id';
$criteria1->params=array(':form_id'=>$id);
$producciones = Produccion::model()->findAll($criteria1);
$produc=Produccion::model()->find('form_id=:form_id',array(':form_id'=>$id));

?>


<div class="row-fluid well">
	<div class='row-fluid'>
		<div class='span2'>Fecha</div>
		<div class='span2'>Area(ha)</div>
		<div class='span2'>Producción(kg)</div>
		<div class='span6'></div>
	</div>
	<?php
		foreach($producciones as $produccion){
				echo "<div class='row-fluid'>
							<div class='span2'>".date('d-m-Y',strtotime($produccion->fecha_cosecha))."</div>
							<div class='span2'>$produccion->area</div>
							<div class='span2'>$produccion->produccion</div>
							<div class='span6'>".CHtml::link('Descargar',array('pdf/produccion','id'=>$produccion->id))."</div>
						</div>";
		//echo $produccion->area." ".$produccion->produccion." ".$produccion->fecha_cosecha."</br>";		
	}
	?>
</div>

<?php if($produc===null){?>

<div class="form well span12">


<!---->

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'acondicionamiento-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));

?>
<?php echo CHtml::hiddenField('form_id',$id); ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>

<script>

$(function(){
    $('#Acondicionamiento_proposed_time').clockface();  
});
</script>

		
			<div class="row-fluid">			 
				<div class="span4"><?php echo $form->datepickerRow($model,'fecha_cosecha',
																				 array(	
																					  'htmlOptions'=>array('class'=>'produccion span12'),
																					  'options'=>array( 'format' => 'dd-mm-yyyy', 
																					  'weekStart'=> 1,
																					  'showButtonPanel' => true,
																					  'showAnim'=>'fold',))); ?></div>
			   <div class="span4"><?php echo $form->textFieldRow($model,'area',array('class'=>'produccion span12')); ?></div>
				<div class="span4"><?php echo $form->textFieldRow($model,'produccion',array('class'=>'produccion span12')); ?></div>
			</div> 
		  
			
		  <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <div class="span4">                             
                  </div>
                  <div class="span4">														 
                  </div>
                  <div class="span4">
							<?php $this->widget('bootstrap.widgets.TbButton',
															  array('type'=>'success',
																	  'buttonType'=>'submit',
																	  'label'=>$model->isNewRecord ? 'Reportar' : 'Aceptar',
																	  'htmlOptions'=>array('class'=>'span12 ','style'=>'align:left'))); ?>
                           </div>
               </div>
            </div>
        </div>



<?php $this->endWidget(); ?>

</div><!-- form -->
<?php }?>
<script>
	$('.produccion').on('blur', function(){
		$('#Produccion_area').val(numeral($('#Produccion_area').val()).format('0,0.00'));
		$('#Produccion_produccion').val(numeral($('#Produccion_produccion').val()).format('0,0.00'));
	});
	

</script>