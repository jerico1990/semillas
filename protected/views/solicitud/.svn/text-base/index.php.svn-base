<div class="container span12">
            <h2>Solicitud de Cuenta de Usuario</h2>
             <?php if(Yii::app()->user->hasFlash('msg')): ?>
            <div class="flash-success" style="text-align:left">
               <?php echo Yii::app()->user->getFlash('msg'); ?>
            </div>
         <?php endif;?>
</div>

<div class="form well span12">

<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));*/
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('class'=>'well'),
   
));

?>
	<?php echo $form->errorSummary($model); ?>
		
		
		  <div class="row-fluid">		  
					 <div class="span12"><h4>Datos de Productor de Semillas</h4>
		  </div>					
		  </div>
		  <div class="row-fluid" >
					 <div class="span4"><?php echo $form->textFieldRow($model,'var_registro',array('class'=>'span12','size'=>30,'maxlength'=>30)); ?></div>
					 <div class="span8"></div>
		  </div>
		  <div class="row-fluid" >
					 <div class="span4"><?php echo $form->textFieldRow($model,'var_ruc',array('class'=>'span12','size'=>12,'maxlength'=>12)); ?></div>
					 <div class="span8"><?php echo $form->textFieldRow($model,'var_razon_social',array('class'=>'span12','size'=>60,'maxlength'=>120)); ?></div>
		  </div>
		  
		  <div class="row-fluid">		  
					 <div class="span12"><h4>Datos de Usuario Responsable</h4>
		  </div>
		  <div class="row-fluid" >
					 <div class="span4"><?php echo $form->textFieldRow($model,'var_dni',array('class'=>'span12','size'=>12,'maxlength'=>12)); ?></div>
					 <div class="span8"></div>
		  </div>
		  <div class="row-fluid" >
					 <div class="span6"><?php echo $form->textFieldRow($model,'var_nombres',array('class'=>'span12','size'=>50,'maxlength'=>50)); ?></div>
					 <div class="span6"><?php echo $form->textFieldRow($model,'var_apellidos',array('class'=>'span12','size'=>50,'maxlength'=>50)); ?></div>
		  </div>
		  <div class="row-fluid" >
					 <div class="span4"><?php echo $form->textFieldRow($model,'var_correo',array('class'=>'span12','size'=>30,'maxlength'=>30)); ?></div>
					 <div class="span8"></div>
		  </div>
		  <div class="row-fluid"  >
					 <div class="span6"><?php echo $form->textFieldRow($model,'var_telefono',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>
					 <div class="span6"><?php echo $form->textFieldRow($model,'var_fax',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>
		  </div>
	
		
		  <div class="row-fluid" >
					 <div class="span12"><h4>Dirección del Productor de Semillas</h4>
		  </div>
		  </div>
		  <div class="row-fluid">		  
					 <div class="span4">
					 <?php echo $form->dropDownListRow($model,'int_departamento',$departments,array(								
								'ajax' => array(
								'type'=>'GET', //request type
								'url'=>CController::createUrl('location/provinces'), //url to call.
								'update'=>'#Solicitud_int_provincia', //selector to update
								'data'   => 'js:$("#Solicitud_int_departamento").val()'
						))); ?>
					 </div>
					 <div class="span8">
					 </div>
		  </div>
		  <div class="row-fluid">		  
					 <div class="span8"> <?php echo $form->dropDownListRow($model,'int_provincia',array(),array(								
								'ajax' => array(
										 'type'=>'GET', //request type
										  'url'=>CController::createUrl('location/districts'), //url to call.
										  'update' => '#Solicitud_int_district',
										  'data'   => 'js:$("#Solicitud_int_provincia").val()'
									  ))); ?>
					 </div>
					 <div class="span4">
					 </div>
		  </div>
		  
		  <div class="row-fluid">		  
					 <div class="span8"> <?php echo $form->dropDownListRow($model,'int_district',array(), array()); ?>
					 </div>
					 <div class="span4">
					 </div>
		  </div>	
		  <div class="row-fluid">		  
					 <div class="span12"><?php echo $form->textFieldRow($model,'var_direccion',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?>
					 </div>
		  </div>
		  <div class="row-fluid">		  
					 <div class="span12"><?php echo $form->textFieldRow($model,'var_referencia',array('class'=>'span12','size'=>50,'maxlength'=>200)); ?>
					 </div>
		  </div>
		  <div class="row-fluid">
				<div class="span12">
					<div class="form-actions">																							 
						<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Enviar' ,'htmlOptions' => array(),)); ?>
					</div>
				</div>
		  </div>


<?php $this->endWidget(); ?>

</div><!-- form -->
