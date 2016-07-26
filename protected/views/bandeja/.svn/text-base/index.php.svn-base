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
    'htmlOptions'=>array('class'=>'well'),
   
)); ?>

<div class="container">
	<div class="row">


		<div class="span2">
				
				<div class="btn-toolbar">					
					<?php $this->widget('bootstrap.widgets.TbButton', array(
							'buttonType'=>'ajaxButton',
							'label'=>'Primary',
							'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
							'size'=>'large', // null, 'large', 'small' or 'mini'
							//'url'=>'form/index',
							'ajaxOptions' => array(
								'url'=> 'form/index',
								//'type' => 'post',
								'success' => 'function(){
									
									
									$( "#divResults").load("prueba");
									
								}',
							    )
    					    )); ?>
					
				</div>
				<div id="divResults" >la respuesta se pondra aqui</div>

		</div>
		<div class="span6">

                               <?php
					$this->widget(
						'CTreeView',
						array( 
						      
							'animated'=>'fast', //quick animation
							'collapsed' => true,							
							'htmlOptions'=>array(
								'class'=>'treeview-famfamfam',
							),
							'data'=>array(array('text'=>'Solicitudes','children'=>array( //using 'children' key to indicate there are children
									
										array('text'=>'Campo',
										    
										      ),
										array('text'=>'Acondicionamiento')
									
								))),
							
						)
						
						
					);
				?>
	
		</div>
		<div class="span4">
                    asdas
		</div>
	</div>
</div>
<?php  echo CHtml::link('read more', $this->createAbsoluteUrl('bandeja/pdf',array('id'=>5))); ?>

<?php $this->endWidget(); ?>