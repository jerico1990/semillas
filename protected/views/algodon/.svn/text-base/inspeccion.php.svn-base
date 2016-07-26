<?php
$forma=Iform::model()->find('id=:form_id', array(':form_id'=>$model->form_id));
?>



<div class="form well span12">

<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'inspection-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inspection-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));
?>



	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
		     
        <div class="row-fluid" >
            <div class="span4" >
            </div>
            <div class="span8" >
                <div class="row-fluid" >
                    <div class="span3 " >
                    <?php echo $form->textFieldRow($forma,'form_number',array('class'=>'span12','disabled'=>true)); ?>
                    </div>
                    <div class="span2 ">
                    <?php echo $form->textFieldRow($model,'inspection_number',array('class'=>'span12','disabled'=>true)); ?>
                    </div>
                    <div class="span6 ">
                        <div class="row-fluid">
                            <div class="span6 ">
                                <?php echo $form->datepickerRow($model,'real_date',
                                                        array(	
                                                        'class'=>'input-medium span9',
                                                        'disabled'=>true,
                                                        'prepend'=>'<i class="icon-calendar"></i>',
                                                        'options'=>array( 'format' => 'dd/mm/yyyy', 
                                                        'weekStart'=> 1,
                                                        'showButtonPanel' => true,
                                                        'showAnim'=>'fold',))); ?>
                            </div>
                            <div class="span6 "><?php echo $form->textFieldRow($model,'real_time',array('class'=>'span12')); ?></div>
                        </div>			     
                    </div>
                </div>
            </div>         
        </div>           
        <div class="row-fluid">
            <div class="span4 ">
                               <?php echo "Productor de Semillas"; ?>
                               <?php echo "<br/>"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
            <div class="span4 ">
                               <?php echo "Nro de Registro"; ?>
                               <?php echo "<br/>"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
            <div class="span4 ">
                               <?php echo "Agricultor Multiplicador"; ?>
                               <?php echo "<br/>"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
        </div>       
        <div class="row-fluid">
            <div class="span3">
                               <?php echo "Provincia"; ?>
                               <?php echo "<br/>"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
            <div class="span3">
                               <?php echo "Distrito"; ?>
                               <?php echo "<br/>"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
            <div class="span3">
                               <?php echo "Sector/Zona"; ?>
                               <?php echo "<br/>"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
            <div class="span3">
                               <?php echo "Codigo Catastral"; ?>
                               <?php echo "<br/>"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span3">
                               <?php echo "Categoria a Obtener"; ?>
                               <?php echo "<br/>"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
            <div class="span3">
                               <?php echo $form->textFieldRow($model,'size',array('class'=>'span12'));//."m<sup>2</sup>"; ?>
            </div>
            <div class="span3">
                               <?php echo "Cultivo a Obtener"; ?>
                               <?php echo "<br/>"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
            <div class="span3">
                               <?php echo "Cultivar a Obtener"; ?>
                               <?php echo CHtml::textField('','',array('value'=>$form->id,'class'=>'span12')); ?>
            </div>
        </div>
        
        <div class="row-fluid">
          <div class="span3">
                             <?php echo $form->datepickerRow($model,'alg_fecha_siembra',
                                                                  array(	
                                                                  'class'=>'input-medium span10',
                                                                  'prepend'=>'<i class="icon-calendar"></i>',
                                                                  'options'=>array( 'format' => 'dd/mm/yyyy', 
                                                                  'weekStart'=> 1,
                                                                  'showButtonPanel' => true,
                                                                  'showAnim'=>'fold',))); ?>		     		        				     
          </div>
          <div class="span9">
                <div class="row-fluid">
                    <div class="span4">
                    <?php echo $form->datepickerRow($model,'alg_deshije',
                                                                  array(	
                                                                  'class'=>'input-medium span10',
                                                                  'prepend'=>'<i class="icon-calendar"></i>',
                                                                  'options'=>array( 'format' => 'dd/mm/yyyy', 
                                                                  'weekStart'=> 1,
                                                                  'showButtonPanel' => true,
                                                                  'showAnim'=>'fold',))); ?>
                    </div>
                    <div class="span4"><?php echo $form->textFieldRow($model,'alg_floracion',array('size'=>18,'maxlength'=>18,'class'=>'span12')); ?></div>
                    <div class="span4"><?php echo $form->textFieldRow($model,'alg_bellotas',array('size'=>18,'maxlength'=>18 ,'class'=>'span12')); ?></div>
                </div>	     
          </div>		 
        </div>		    
        <div class="row-fluid">
          <div class="span6">
                <div class="row-fluid">
                    <div class="span6"><?php echo $form->textFieldRow($model,'alg_surcos',array('size'=>18,'maxlength'=>18,'class'=>'span12')); ?></div>
                    <div class="span6"><?php echo $form->textFieldRow($model,'alg_mata',array('size'=>18,'maxlength'=>18,'class'=>'span12')); ?></div>			    
                </div>
          </div>
          <div class="span6">
                <div class="row-fluid">
                    <div class="span4"><?php echo $form->textFieldRow($model,'alg_campo_comercial',array('size'=>18,'maxlength'=>18,'class'=>'span12')); ?></div>
                    <div class="span4"><?php echo $form->textFieldRow($model,'alg_otra_especie',array('size'=>18,'maxlength'=>18,'class'=>'span12')); ?></div>
                    <div class="span4"><?php echo $form->textFieldRow($model,'alg_otra_cultivar',array('size'=>18,'maxlength'=>18,'class'=>'span12')); ?></div>
                </div>	     
          </div>
        </div>
        <div class="row-fluid">
          <div class="span6"><?php echo $form->textAreaRow($model,'alg_plantas_otra_especie',array('size'=>60,'maxlength'=>300,'class'=>'span12','rows'=>8)); ?></div>
          <div class="span6"><?php echo $form->textAreaRow($model,'alg_plantas_fuera_tipo',array('size'=>60,'maxlength'=>300,'class'=>'span12','rows'=>8)); ?></div>		  
        </div>
        
        <div class="row-fluid">
          <div class="span12"><?php echo $form->textAreaRow($model,'observaciones',array('size'=>60,'maxlength'=>300,'class'=>'span12','rows'=>8)); ?></div>
        </div>
		
	
						
		
	

	<?php /*
		<?php echo $form->textFieldRow($model,'real_date'); ?>
		<?php echo $form->error($model,'real_date'); ?>
	

		<?php echo $form->textFieldRow($model,'real_time'); ?>
		<?php echo $form->error($model,'real_time'); ?>
	
		
	
		
	
	
	
		<?php echo $form->textFieldRow($model,'resultado'); ?>
		<?php echo $form->error($model,'resultado'); ?>
	
	
		<?php echo $form->textFieldRow($model,'observaciones',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	
	
		<?php echo $form->textFieldRow($model,'recomendaciones',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'recomendaciones'); ?>
	
	
		<?php echo $form->textFieldRow($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	
	
		<?php echo $form->textFieldRow($model,'form_id'); ?>
		<?php echo $form->error($model,'form_id'); ?>
		
		*/ ?>
                <div class="row-fluid">
		  <div class="span12">
			<div class="form-actions">		
			      <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Crear' : 'Guardar','htmlOptions'=>array('class'=>'span2 offset10',))); ?>		     
                        </div>	     
		  </div>
		</div>
	
		
	

<?php $this->endWidget(); ?>

</div><!-- form -->