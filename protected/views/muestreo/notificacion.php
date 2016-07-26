<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>
<script>

$(function(){
    $('#Muestreo_time_real').clockface();

});
</script>
<br>
<div class="form well span12">   
   <?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                  'id'=>'muestreo-form',
               ));
   ?>
   
   <div class="row-fluid">			
		<div class="span4"><?php echo $form->datepickerRow($model,'date_real',
																				 array(																						 
																					  'htmlOptions'=>array('class'=>'produccion'),
																					  'options'=>array( 'format' => 'dd-mm-yyyy', 
																					  'weekStart'=> 1,
																					  'showButtonPanel' => true,
																					  'showAnim'=>'fold',))); ?></div>
		 <div class="span4"><?php echo	$form->textFieldRow($model,'time_real',array('data-format'=>'hh:mm A','class'=>'input-small'));	?></div>
	</div>
   <div class="row-fluid">
		<div class="span12">
			<div class="form-actions">																							 
				<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Validar','htmlOptions' => array(),)); ?>
			</div>
		</div>
	</div>
   <?php $this->endWidget(); ?>
</div>