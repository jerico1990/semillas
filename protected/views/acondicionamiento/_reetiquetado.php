<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
?>
<style>
h4{
		  display: block;
		  margin-bottom: 5px;
		  background:#CCFFFF;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $('#categoria input[type=checkbox]').live('click', function(){
		   $('#categoria input[type=checkbox]').removeAttr('checked');
			$(this).attr('checked', 'checked');		
    });
	 $('#semilla input[type=checkbox]').live('click', function(){
		    $('#semilla input[type=checkbox]').removeAttr('checked');
			$(this).attr('checked', 'checked');		
    });
});
</script>

<div class="form well span12" style="background: #FFFFFF">

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'acondicionamiento-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));

?>

	<?php echo $form->errorSummary($model); ?>
   
   <div class="row-fluid">
					 <div class="span12"><h4>Identificación del lote de semilla</h4></div>      
	</div>
	<div class="row-fluid">
		<div id="categoria" class="span6"> <?php echo $form->checkBoxListRow($model, 'reetiquetado_mezclar_categorias', array(
                              'Certificada',
                              'Autorizada',
                              'Certificada y Autorizada',
                               )); ?></div>
      <div class="span6"><?php echo $form->textAreaRow($model,'reetiquetado_campana',array('class'=>'span12','rows'=>5)); ?></div>
      
	</div>
   <div class="row-fluid">
		<div class="span6"><?php echo $form->textAreaRow($model,'reetiquetado_categoria_resultante',array('class'=>'span12','rows'=>5)); ?></div>
      <div class="span6"><?php echo $form->textAreaRow($model,'reetiquetado_control_resultante',array('class'=>'span12','rows'=>5)); ?></div>
      
	</div>
   <div class="row-fluid">
					 <div class="span12"><h4>Reenvasado y/o Reetiquetado</h4></div>      
	</div>
   
   <div class="row-fluid">
		<div class="span6"><?php echo $form->textAreaRow($model,'reetiquetado_motivo',array('class'=>'span12','rows'=>5)); ?></div>
      <div id="semilla" class="span6"><?php echo $form->checkBoxListRow($model, 'reetiquetado_analisis_semilla', array(
                              'Requiere',
                              'No Requiere',
                               ) //,array('hint'=>'<strong>Note:</strong> Labels surround all the options for much larger click areas.')
                               ); ?></div>
	</div>
     <div class="row-fluid">
					 <div class="span12"><h4>Observaciones</h4></div>      
	</div>
   <div class="row-fluid">  
      <div class="span12"><?php echo $form->textAreaRow($model,'reetiquetado_observacion',array('class'=>'span12','rows'=>5)); ?></div> 
   </div>
   
   <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <div class="span4">                             
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>'Aceptar','htmlOptions'=>array('class'=>'span12',))); ?>															 
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger','buttonType'=>'submit', 'label'=>'Cancelar','htmlOptions'=>array('class'=>'span12',))); ?>																		 
                  </div>
               </div>
            </div>
   </div>
<?php $this->endWidget(); ?>

</div><!-- form -->