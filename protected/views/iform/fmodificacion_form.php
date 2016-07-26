<style>
h4{
		  display: block;
		  margin-bottom: 5px;
		  background:#CCFFFF;
}
</style>
<div class="form well span12" style="background: #FFFFFF">
<?php /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));*/
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'form-form',
   // 'htmlOptions'=>array('class'=>'well'),
   
)); ?>
   <script>
   jQuery( document ).ready(function( $ ) {
      $('#Iform_crop_id').change(function(){		
         if($('#Iform_crop_id').val()==21){			
            $('#Iform_category').html('<option value="5">Basica 1</option>'+
                       '<option value="6">Basica 2</option>'+
                       '<option value="7">Registrada 1</option>'+
                       '<option value="8">Registrada 2</option>'+
                       '<option value="9">Certificada</option>'+
                       '<option value="10">Autorizada</option>'
                       );
         }
         else
         {
            return $('#Iform_category').html('<option value="1">Basica</option>'+
                        '<option value="2">Registrada</option>'+
                        '<option value="3">Certificada</option>'+
                        '<option value="4">Autorizada</option>');
         }
      })
   });
   </script> 
    
   
   <div class="row-fluid">      
      <div class="span12"><h4>Semilla a producir</h4></div>
   </div>
   <?php
			$crop = Crop::model()->findAll(array('condition'=>'parent is null'));			 
			$listcrop = CHtml::listData($crop,'id','name');
         $variety = Crop::model()->findAll(array('condition'=>'parent is not null'));			 
			$listvariety = CHtml::listData($variety,'id','name');
	?>
   
   
   <div class="row-fluid">
      <div class="span4"><?php echo $form->dropDownListRow($model,'crop_id', $listcrop,array(
                              'empty'=>'Seleccionar..',
                              'class'=>'span12',
                              'ajax' => array(
                              'type'=>'GET', //request type
                                    'url'=>CController::createUrl('crop/variedad'), //url to call.
                                    'data'   => array( 'crop_id' => 'js:$("#Iform_crop_id").val()' ),
                                    'success' => 'function(data)
                                    {
                                    $("#Iform_variety_id").find("option").each(function(){
                                    $(this).remove();
                                    });																
                                    $("#Iform_variety_id").append(data);											
                                    console.log($("Iform_variety_id"));													
                                    }')));?></div>
      <div class="span4"><?php echo $form->dropDownListRow($model,'variety_id', $listvariety,array('class'=>'span12'));?></div>
      <div class="span4"><?php echo $form->dropDownListRow($model, 'category', array($model->semilla($model->category)), array('class'=>'span12')); ?></div>
   </div>
   <div class="row-fluid">
      <div class="span12"><h4>Campo de multiplicación</h4></div>      
   </div>     
   <div class="row-fluid">
      <div class="span6"><?php echo$form->textFieldRow($model,'location_name',array('class'=>'span12')); ?></div>
      <div class="span6"><?php echo$form->textFieldRow($model,'location_annex',array('class'=>'span12')); ?></div>    
   </div>
   <div class="row-fluid">
      <div class="span2"><?php echo $form->textFieldRow($model,'area',array('class'=>'span8')); ?></div>
      <div class="span3"><?php echo $form->datepickerRow($model,'seed_date',
                                    array(//'prepend'=>'<li class="icon-calendar"></li>',
                                       'htmlOptions'=>array('class'=>'span9',),
                                       'options'=>array( 'format' => 'dd/mm/yyyy', 
                                       'weekStart'=> 1,
                                       'showButtonPanel' => true,
                                       'showAnim'=>'fold',)));?></div>
      <div class="span4"><?php echo $form->textFieldRow($model,'sow_estimate_quantity',array('class'=>'span12')); ?></div>
      <div class="span3"><?php echo $form->textFieldRow($model,'last_crop',array('class'=>'span12')); ?></div>
   </div>

   <div class="row-fluid">
      <div class="span12"> <h4>Mezcla de lotes de semillas</h4></div>     
   </div> 
   <div class="row-fluid">
        
      <div class="span6">
        <?php echo $form->checkBoxListRow($model, 'mezclar_categorias', array(
        'Certificada',
        'Autorizada',
        'Certificada y Autorizada',
         ) //,array('hint'=>'<strong>Note:</strong> Labels surround all the options for much larger click areas.')
         ); ?>
      </div>
      <div class="span6"><?php echo $form->textAreaRow($model,'lotes',array('class'=>'span12','rows'=>3)); ?></div>    
   </div>
	
	
		  <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <div class="span4">													  
                          	     
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton',
										  array(
										  'type'=>'success',
										  'buttonType'=>'ajaxButton',
										  'label'=>'Aceptar',
										  'url'=>Yii::app()->createUrl( 'iform/modificacionupdate' ),
										   'ajaxOptions'   => array(
													 'type'    => 'POST',													
													 'data'    => array(
																'crop_id'=>'js:$("#Iform_crop_id").val()',
																'variety_id'=>'js:$("#Iform_variety_id").val()',
																'category'=>'js:$("#Iform_category").val()',
																'location_name'=>'js:$("#Iform_location_name").val()',
																'location_annex'=>'js:$("#Iform_location_annex").val()',
																'area'=>'js:$("#Iform_area").val()',
																'seed_date'=>'js:$("#Iform_seed_date").val()',
																'sow_estimate_quantity'=>'js:$("#Iform_sow_estimate_quantity").val()',
																'last_crop'=>'js:$("#Iform_last_crop").val()',
																'mezclar_categorias_0'=>'js:$("#Iform_mezclar_categorias_0").val()',
																'mezclar_categorias_1'=>'js:$("#Iform_mezclar_categorias_1").val()',
																'mezclar_categorias_2'=>'js:$("#Iform_mezclar_categorias_2").val()',
																'lotes'=>'js:$("#Iform_lotes").val()',
															
																),													 
													 ),
										  'htmlOptions'=>array(													 
										  'class'=>'span12',										 
										  'url' => Yii::app()->createUrl( 'iform/modificacionupdate' ),
										  ))); ?>															 
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger','buttonType'=>'submit', 'label'=>'Cancelar','htmlOptions'=>array('class'=>'span12',))); ?>																		 
                  </div>
               </div>
            </div>
        </div>
	 
<?php $this->endWidget(); ?>
</div><!-- form -->