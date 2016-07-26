<?php


?>
<div class="row-fluid">
	<div class="span12"><h1>Análisis de Muestreo</h1></div>      
</div>
<div class="form well span12">
<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
               'id'=>'muestreo-form',
            ));
?>

<?php echo $form->errorSummary($model); ?>

	<div class="row-fluid">			 				
		<div class="span12"><?php echo $form->textFieldRow($model,'registro',array()); ?></div>          
   </div>
   <div class="row-fluid">			 				
		<div class="span5"><?php echo $form->textFieldRow($model,'inspecciones_campo',array()); ?></div>
      <div class="span7"><?php echo $form->textFieldRow($model,'folio_inspecciones_campo',array()); ?></div>      
   </div>
    <div class="row-fluid">			 				
		<div class="span12"><?php echo $form->textAreaRow($model,'inspecciones_observacion',array('rows'=>5,'class'=>'span12')); ?></div>         
   </div>
   
   <div class="row-fluid">			 				
		<div class="span5"><?php echo $form->textFieldRow($model,'acondicionamiento_campo',array()); ?></div>
      <div class="span7"><?php echo $form->textFieldRow($model,'folio_acondicionamiento_campo',array()); ?></div>      
   </div>
    <div class="row-fluid">			 				
		<div class="span12"><?php echo $form->textAreaRow($model,'acondicionamiento_observacion',array('rows'=>5,'class'=>'span12')); ?></div>         
   </div>
   
    <div class="row-fluid">			 				
		<div class="span5"><?php echo $form->textFieldRow($model,'analisis_semillas',array()); ?></div>
      <div class="span7"><?php echo $form->textFieldRow($model,'folio_analisis_semillas',array()); ?></div>      
   </div>
    <div class="row-fluid">			 				
		<div class="span12"><?php echo $form->textAreaRow($model,'analisis_semillas_observacion',array('rows'=>5,'class'=>'span12')); ?></div>         
   </div>
    
     <div class="row-fluid">			 				
		<div class="span12"><?php echo $form->textAreaRow($model,'observaciones_tecnicos',array('rows'=>5,'class'=>'span12')); ?></div>         
   </div>
   
   <div class="row-fluid">
		<div class="span12">
			<div class="form-actions">																							 
				<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>$model->isNewRecord ? 'Reportar' : 'Emitir','htmlOptions' => array('name'=>'btn','value'=>'aceptar'),)); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'danger','buttonType'=>'submit','label'=>$model->isNewRecord ? :'Rechazar','htmlOptions' => array('name'=>'btn','value'=>'rechazar'),)); ?>
			</div>
		</div>
	</div>
    
<?php $this->endWidget(); ?>

</div><!-- form -->