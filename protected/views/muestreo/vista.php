<?php
$muestreos=Muestreo::model()->findAll('form_id=:form_id',array(':form_id'=>$id));
$boton=Muestreo::model()->find('form_id=:form_id',array(':form_id'=>$id));

?>


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>

<script>

$(function(){
    $('#Muestreo_time_proposed').clockface();

});
</script>

<?php if(Yii::app()->user->checkAccess('productor')) {?>
<br>
<!--Generar Muestreo-->
<div class="row-fluid well">
	<div class='row-fluid'>      
      <div class="form">
         <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
               'id'=>'muestreo-form',
            ));
         ?>
         <?php echo CHtml::hiddenField('form_id',$id); ?>
         <div class="row-fluid">			 				
			   <?php // <div class="span3">echo $form->textFieldRow($model,'n_muestreo',array('class'=>'produccion span12'));</div> ?>
				<div class="span2"><?php echo $form->textFieldRow($model,'peso_total',array('class'=>'produccion span12'));?></div>
			   <div class="span2"><?php echo $form->textFieldRow($model,'peso_envase',array('class'=>'produccion span12'));?></div>
				<div class="span2"><?php echo $form->textFieldRow($model,'nro_envases',array('class'=>'produccion span12'));?></div>
				<div class="span2"><?php echo $form->datepickerRow($model,'date_proposed',
																				 array(	
																					  //'class'=>'input-medium span10',
																					  //'prepend'=>'<i class="icon-calendar"></i>',
																					  'htmlOptions'=>array('class'=>'span12 produccion'),
																					  'options'=>array( 'format' => 'dd-mm-yyyy', 
																					  'weekStart'=> 1,
																					  'showButtonPanel' => true,
																					  'showAnim'=>'fold',))); ?></div>
            <div class="span2"><?php echo	$form->textFieldRow($model,'time_proposed',array('data-format'=>'hh:mm A','class'=>'span12 input-small'));	?></div>
			</div>         
         <div class="row-fluid">
            
               <?php $this->widget('bootstrap.widgets.TbButton', array(
                     'buttonType'=>'submit',
                     'label'=>'Aceptar',
                     'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'                
                 )); ?>
           
         </div>         
         <?php $this->endWidget(); ?>
      </div><!-- form -->
   </div>
</div>
<?php } else {?>
</br>
<?php } ?>
