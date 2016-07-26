<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>
<script>

$(function(){
    $('#Etiquetado_hora_notificado_etiquetado').clockface();
});
</script>
<br>
<!--Generar Muestreo-->
<div class="row-fluid well">
	<div class='row-fluid'>      
      <div class="form">
         <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
               'id'=>'etiquetado-form',
            ));
         ?>
         <div class="row-fluid">			
            <div class="span4"><?php echo $form->datepickerRow($model,'fecha_notificado_etiquetado',
                                                                   array(																						 
                                                                       'htmlOptions'=>array('class'=>'etiquetado','value'=>''),
                                                                       'options'=>array( 'format' => 'dd-mm-yyyy', 
                                                                       'weekStart'=> 1,
                                                                       'showButtonPanel' => true,
                                                                       'showAnim'=>'fold',))); ?></div>
            <div class="span4"><?php echo $form->textFieldRow($model,'hora_notificado_etiquetado',array('data-format'=>'hh:mm A','class'=>'input-small','value'=>''));	?></div>
         </div>
         <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">																							 
                  <?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Solicitar','htmlOptions' => array(),)); ?>
               </div>
            </div>
         </div>
         <?php $this->endWidget(); ?>
      </div><!-- form -->
   </div>
</div>
