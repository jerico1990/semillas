<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
$user=User::model()->find('cruge_user_id=:cruge_user_id',array(':cruge_user_id'=>Yii::app()->user->id));


//Encontrar el max number_acondicionamiento
$criteria3=new CDbCriteria;
$criteria3->condition='form_id=:form_id and user_id=:user_id';
$criteria3->group='id';
$criteria3->params=array(':form_id'=>$model->id,':user_id'=>$user->id);
$criteria3->select='id,max(acondicionamiento_number) as acondicionamiento_number';
$maxacond = Acondicionamiento::model()->find($criteria3);


//Tods ls acondicionamiento
$criteria4=new CDbCriteria;
$criteria4->condition='id=:id';
$criteria4->params=array(':id'=>$maxacond->id);
$acondicionamiento = Acondicionamiento::model()->find($criteria4);
?>

<div class="form well span12" style="background: #FFFFFF">

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'acondicionamiento-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));

?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>

<script>

$(function(){
    $('#Acondicionamiento_proposed_time').clockface();  
});
</script>
			
			<div class="row-fluid">
							<div class="span12"><h4>Campo de Multiplicación</h4></div>      
			</div> 
			<div class="row-fluid">
			  <div class="span4"><?php echo $form->textFieldRow($model,'produccion_area',array('class'=>'produccion span12')); ?></div>
			  <div class="span4"><?php echo $form->textFieldRow($model,'produccion_total',array('class'=>'produccion span12')); ?></div>
			  <div class="span4"><?php echo $form->datepickerRow($model,'produccion_fecha_cosecha',
																				 array(	
																					  //'class'=>'input-medium span10',
																					  //'prepend'=>'<i class="icon-calendar"></i>',
																					  'options'=>array( 'format' => 'dd/mm/yyyy', 
																					  'weekStart'=> 1,
																					  'showButtonPanel' => true,
																					  'showAnim'=>'fold',))); ?></div>
			</div> 
		  
			<div class="row-fluid">
				<div class="span4"><?php echo $form->datepickerRow($acondicionamiento,'proposed_date',
																						array(
																							'htmlOptions'=>array('value'=>date('d/m/Y', strtotime($acondicionamiento->proposed_date))),
																							'options'=>array( 'format' => 'dd/mm/yyyy',																								
																							'startDate'=>'',
																							'weekStart'=> 1,
																							'showButtonPanel' => true,
																							'showAnim'=>'fold',))); ?>
				</div>
				<div class="span8">
				  <?php echo	$form->textFieldRow($acondicionamiento,'proposed_time',array('value'=>date("h:m A",strtotime($acondicionamiento->proposed_time)),'data-format'=>'hh:mm A','class'=>'input-small'));	?>
				</div>
				<?php echo CHtml::hiddenField('formu',$model->id); ?>
			</div>
		  <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <div class="span4">                             
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton',
											array('type'=>'success',
												'buttonType'=>'ajaxButton',
												'label'=>'Aceptar',
												'url'=>Yii::app()->createUrl( 'acondicionamiento/producciona' ),
												'ajaxOptions'=>array(			     
												'type'=>'POST',	
												'data' => array(
													'produccion_area'=>'js:$("#Iform_produccion_area").val()',
													'produccion_total'=>'js:$("#Iform_produccion_total").val()',
													'produccion_fecha_cosecha'=>'js:$("#Iform_produccion_fecha_cosecha").val()',
													'proposed_date'=>'js:$("#Acondicionamiento_proposed_date").val()',
													'proposed_time'=>'js:$("#Acondicionamiento_proposed_time").val()',
													'id_form'=>$model->id,
													'id_acondicionamiento'=>$maxacond->id,
													),
												'success' => 'function(data){
																				location.replace("'.Yii::app()->getRequest()->getHostInfo().'/semillas/iform/view/"+$("#formu").val());
																				}'
												),
												'htmlOptions'=>array('class'=>'span12',
												'url'=>Yii::app()->createUrl( 'acondicionamiento/producciona' ),)
											)); ?>															 
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton',
															 array(
																	'type'=>'danger',
																	'buttonType'=>'ajaxButton',
																	'label'=>'Cancelar',
																	'ajaxOptions'=>array(
																		'success' => 'function(){
																		location.replace("'.Yii::app()->getRequest()->getHostInfo().'/semillas/iform/iview/"+$("#formu").val());
																		}'	),
																	'htmlOptions'=>array('class'=>'span12',))); ?>																		 
                  </div>
               </div>
            </div>
        </div>



<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	$('.produccion').on('keyup', function(){
		$('#Iform_produccion_area').val(numeral($('#Iform_produccion_area').val()).format('0,0'));
		$('#Iform_produccion_total').val(numeral($('#Iform_produccion_total').val()).format('0,0'));
	});
	
	
</script>