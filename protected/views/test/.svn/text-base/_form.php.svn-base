
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>
 
<div class="modal-body">
    <p>
	<div class="form">
		
		<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'inbox-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'htmlOptions'=>array('class'=>'well'),
		   
		));		
		?>
	
		<?php echo $form->textFieldRow($model, 'observacion_aprobado', array()); ?>
		<?php echo $form->textFieldRow($model, 'area', array('id'=>'area')); ?>			
					
					 
		<?php $this->endWidget(); ?>
		
	</div><!-- form -->	 
	 
	
    </p>
</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(	
        'type'=>'primary',
        'label'=>'Aprobar',
	'buttonType'=>'ajaxButton',
	//'url'=>Yii::app()->createUrl( 'inboxinspector/observacion' ),
	'ajaxOptions'=>array(			     
				//'type'=>'POST',	
				'success' => 'js:function()
					     {
					     var cantidad=$("#area").val();
					     var tablag="<tr><td>"+$("#area").val()+"</td><td></td></tr>"						
						
					     
					     for (var i = 0; i < cantidad; i++) {
							$("#tabla").append(tablag);
						}			
					     
					       
					     }',
			     ),
       // 'url'=>'#',
       
    )); ?>
    
    
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Notificar',
        'htmlOptions'=>array('data-dismiss'=>'modal'
			     ),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Revisar Doc.',
    'type'=>'primary',
    'htmlOptions'=>array(
        'data-toggle'=>'modal',
        'data-target'=>'#myModal',
    ),
)); ?>


<table id="tabla">
	<th></th>	
	<tr>
		<td></td>
	</tr>
</table>