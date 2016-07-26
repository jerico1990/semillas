<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>
<script>
$(function(){
		$('#Acondicionamiento_real_time').clockface();		
});
</script>

<?php
$muestreo=Muestreo::model()->find('id=:id',array(':id'=>(int)$myValue));


if($muestreo!==null)
{
	$model=Iform::model()->find('id=:id',array(':id'=>$muestreo->form_id));
	$laboratory=Laboratory::model()->find('muestreo_id=:muestreo_id',array(':muestreo_id'=>$muestreo->id));
	
}

?>
<?php
if($muestreo!==null)
{
	echo "<b>$muestreo->codigo_lote</b>";
}
?>
<!--Productor-->
<?php if($muestreo!==null && Yii::app()->user->checkAccess('productor')){?>

		
		<?php if($muestreo->notificacion_acondicionamiento==1){?>
			<div class="row-fluid">
				<div class="span2"><?php echo $muestreo->fecha_notificacion_acondicionamiento; ?></div>
				<div class="span4"><?php echo CHtml::link('Notificación de Acondicionamiento',array('pdf/notificacionacondicionamiento','id'=>$muestreo->id,'identificador'=>1))?></div>
				<div class="span6"></div>
			</div>
		<?php } ?>
		
		
		<?php if($muestreo->informe_acondicionamiento==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo $muestreo->fecha_informe_acondicionamiento; ?></div>
         <div class="span4">
			<?php
			if($muestreo!==null)
			{
			if($model->crop_id==15){?>
			<?php echo CHtml::link('Informe de Acondicionamiento',array('pdf/informeacondicionamientopapa','id'=>$muestreo->acondicionamiento_id,'identificador'=>1))?>
			<?php }else{?>
			<?php echo CHtml::link('Informe de Acondicionamiento',array('pdf/informeacondicionamientootros','id'=>$muestreo->acondicionamiento_id,'identificador'=>1))?>
			<?php }}?>
			</div>
			<div class="span6">
						
         </div>
		</div>
   <?php } ?>		
		
<?php } ?>




<!--Inspector-->
<?php if($muestreo!==null && Yii::app()->user->checkAccess('inspector')){?>

   
	<?php
	if($muestreo->notificacion_acondicionamiento==0)
	{?>					
	<div class="row-fluid">
		<div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_notificacion_acondicionamiento)); ?></div>
			<div class="span4">			
			<!--Eventos-->					
			<!--Notificar Visita-->
			<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?> 
				<div class="modal-header">
					 <a class="close" data-dismiss="modal">&times;</a>
					 <h4>Notificar</h4>
				</div>							 
				<div class="modal-body">
					<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array('id'=>'inbox-form',));?>
						
						<?php echo $form->datepickerRow($update_acondicionamiento,'real_date',
																  array(//'prepend'=>'<li class="icon-calendar"></li>',
																		  //'value'=>date("d-m-Y",strtotime($acondicionamiento->proposed_date)),
																		  'options'=>
																			array( 'format' => 'dd-mm-yyyy',
																				'weekStart'=> 1,
																				'showButtonPanel' => true,
																				'showAnim'=>'fold',))); ?>
						<?php echo $form->textFieldRow($update_acondicionamiento,'real_time',
																array(
																//'value'=>date("h:m A",strtotime($acondicionamiento->proposed_time)),
																'data-format'=>'hh:mm A',
																'class'=>'input-small'));	?>
					<?php $this->endWidget(); ?>
				</div>
				 
				<div class="modal-footer">
					<?php $this->widget('bootstrap.widgets.TbButton', array(
													 'type'=>'primary',
													 'label'=>'Aceptar',
													 'buttonType'=>'ajaxButton',
													 'url'=>Yii::app()->createUrl( 'iform/observacion' ),
													 'ajaxOptions'=>array(
																				 'type'=>'POST',
																				 'data' => array('acondicionamiento'=>$muestreo->acondicionamiento_id,
																										'acondicionamiento_number'=>20,
																										'id'=>11,
																										'form'=>$muestreo->form_id,
																										'hora'=>'js:$("#Acondicionamiento_real_time").val()',
																										'observacion'=>'observacion',
																										'fecha' => 'js:$("#Acondicionamiento_real_date").val()' ),
																				 'success' => "function( data ){location.reload();}"
																				 ),
													 'htmlOptions'=>array(
																				 'url' => Yii::app()->createUrl( 'iform/observacion' ),
																				 ),)); ?>
				</div>
				 
				<?php $this->endWidget(); ?>
				
				<?php $this->widget('bootstrap.widgets.TbButton', array(
						'label'=>'Notificar',
						'type'=>'primary',
						'htmlOptions'=>array(
							 'data-toggle'=>'modal',
							 'data-target'=>'#myModal',
						),
				  )); ?>
				<!--Fin de Notificar Visita-->
			</div>
	<div class="span6">							
	</div>
	</div>	
   <?php } ?>
	
   <?php if($muestreo->notificacion_acondicionamiento==1){?>
		<div class="row-fluid">
         <div class="span2"><?php echo $muestreo->fecha_notificacion_acondicionamiento; ?></div>
			<div class="span4"><?php echo CHtml::link('Notificación de Acondicionamiento',array('pdf/notificacionacondicionamiento','id'=>$muestreo->id,'identificador'=>1))?></div>
			<div class="span6"></div>
	   </div>
		<?php if($muestreo->informe_acondicionamiento==0){
			echo '<div class="row-fluid">
						<div class="span2"></div><div class="span10">';
				if($model->crop_id==1 || $model->crop_id==2 || $model->crop_id==3 || $model->crop_id==4 || $model->crop_id==5 ||
					$model->crop_id==6 || $model->crop_id==7 || $model->crop_id==8 || $model->crop_id==9 ||
					$model->crop_id==10 ||$model->crop_id==11 || $model->crop_id==12 || $model->crop_id==13)
				{
				$this->widget('bootstrap.widgets.TbButton', array(
								'buttonType'=>'link',
								'size'=>'small',
								'type'=>'primary',
								'label'=>'Realizar Acondiconamiento',
								'url'=>array('acondicionamiento/general',
												 'id'=>$muestreo->acondicionamiento_id)));
				}			
				
				if($model->crop_id==15)//Papa
				{
				$this->widget('bootstrap.widgets.TbButton', array(
								'buttonType'=>'link',
								'size'=>'small',
								'type'=>'primary',
								'label'=>'Realizar Acondicionamiento',
								'url'=>array('acondicionamiento/papa',
												 'id'=>$muestreo->acondicionamiento_id)));
				}
				echo '</div></div>'; ?>
			
   <?php } } ?>
   
	
   <?php if($muestreo->informe_acondicionamiento==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo $muestreo->fecha_informe_acondicionamiento; ?></div>
         <div class="span4">
			<?php
			if($muestreo!==null)
			{
			if($model->crop_id==15){?>
			<?php echo CHtml::link('Informe de Acondicionamiento',array('pdf/informeacondicionamientopapa','id'=>$muestreo->acondicionamiento_id,'identificador'=>1))?>
			<?php }else{?>
			<?php echo CHtml::link('Informe de Acondicionamiento',array('pdf/informeacondicionamientootros','id'=>$muestreo->acondicionamiento_id,'identificador'=>1))?>
			<?php }}?>
			</div>
			<div class="span6">
						
         </div>
		</div>
   <?php } ?>  
   
   
<?php } ?>






