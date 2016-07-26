<?php
$inbox=Inbox::model()->find('form_id=:form_id', array(':form_id'=>$model->id));
//$inboxs=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$model->id,'status_id'=>3));
$inboxs=Inbox::model()->findAll('form_id=:form_id', array(':form_id'=>$model->id));
//ID ORganismo certificador
//Si no existe mostrara la lista de inspctores
$minspectores=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$model->id,'status_id'=>3));
//Buscando los inspectores
$user=User::model()->find('cruge_user_id=:cruge_user_id',array(':cruge_user_id'=>Yii::app()->user->id));
$inspectores = User::model()->findAll('type_id=:type_id and headquarter_id=:headquarter_id',
												  array(':headquarter_id'=>$model->headquarter_id,':type_id'=>3));
$list = CHtml::listData($inspectores,'id','fullname');
//Fin de Inspectores

$step="";
?>
<br>
<div class="row-fluid span12 well">		  
	<div class="span12">		  
		<!--Steps-->
		<div class="row-fluid">					
			<div class="span11">
				<!-- WIZARD -->
				<?php
						foreach($inboxs as $etiqueta):
						{
							if($etiqueta->status_id===1)
							{
								$step='<li class="active"><span class="badge badge-info"></span>Expediente<span class="chevron"></span></li>';
							}
							if($etiqueta->status_id===1)
							{
								$step.='<li class="active"><span class="badge badge-info"></span>Solicitud<span class="chevron"></span></li>';
							}
							if($etiqueta->status_id===2)
							{
								$step.='<li><span class="badge"></span>Campo<span class="chevron"></span></li>';
							}
							if($etiqueta->status_id===3)
							{
								$step.='<li><span class="badge"></span>Acondicionamiento<span class="chevron"></span></li>';
							}
							if($etiqueta->status_id===4)
							{
								$step.='<li><span class="badge"></span>Muestreo<span class="chevron"></span></li>';
							}
						}
						endforeach;
						echo	'<div class="fuelux">
									<div id="MyWizard" class="wizard">
										<ul class="steps">'.$step.'</ul>										
									</div>
								</div>';
								?>
			</div>
		</div>	  
		<!--Fin Steps-->
		  
		<!--Detalle de Solicitud-->
		<div class="row-fluid"><div class="span12"></div></div>
		<!--Fin Detalle de Solicitud-->
		
		  <!--1° Fila de la Solicutd-->
		<div class="row-fluid">
			<div class="span3">
				<?php
				foreach($inboxs as $inbox)
				{
					if($inbox->status_id==1)
					{
						echo date("d/m/Y", strtotime($inbox->date));
					}
				}
				?>
			</div>
			<div class="span9">
				<div class="span7">
					<b>Solicitud de Certificación</b></br>
						<?php echo CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id)); ?>
				</div>
				<div class="span5"></div>								
			</div>
					
		</div>
		 
		  <!--Fin de 1° Fila de la Solicutd-->
		  <!--Inspector-->
		  <?php if($minspectores===null){ ?>		 
		  
		  <?php 
		  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			  'id'=>'iform-form',
		  ));
		  ?>			  
		  <div class="row-fluid">					 
					<div class="span3">
					 <b>Asignar Inspector:</b>
					</div>
					<div class="span6">
					 <?php  	echo $form->dropDownListRow($model,
								'inspector_id', $list, array(
										  'id'=>'inspector',
										  'empty'=>'Seleccionar..'));
								
					 ?>
					</div>
					<div class="span3">
								<?php
										  echo CHtml::ajaxLink(
										  "Asignar",
										  Yii::app()->createUrl( 'iform/asignarinsp' ),
										  array( // ajaxOptions
											 'type' => 'POST',
											'success' => "function( data )
												  {
													 location.reload();
												  }",
											 'data' => array( 'form' => $model->id, 'inspector' => 'js:$("#inspector").val()' )
										  ),
										  array( //htmlOptions
											 'href' => Yii::app()->createUrl( 'iform/asignarinsp' )					 
										  )
											  );
								
								?>
					</div>
		  </div>
		  <!--Fin de Inspector-->
		  <?php $this->endWidget(); ?>
		  <?php } else { ?>
		  <div class="row-fluid">
					 <div class="span3">
								<?php echo date("d/m/Y", strtotime($minspectores->date)); ?>
					 </div>
					 <div class="span8">
								<?php echo "<b>Inspector Asignado :</b> ".$minspectores->to0->fullname; ?>
					 </div>
		  </div>
		  <?php } ?>
		

		  </div>
</div>



<!--Inspector-->
<?php

/*
if($inboxs===null )
{
	$list = CHtml::listData($inspectores,'id','crugeuser.username');
	echo "</br>";
?>
	<div class="form">
		
		<?php 
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'iform-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'htmlOptions'=>array('class'=>'well'),
		   
		));
		
		?>	
		<?php echo $form->dropDownListRow($model, 'inspector_id', $list, array('id'=>'inspector','empty'=>'Seleccionar..'));; ?>
			
		<?php
		echo CHtml::ajaxLink(
					"Asignar",
					Yii::app()->createUrl( 'iform/asignarinsp' ),
					array( // ajaxOptions
					  'type' => 'POST',
					 'success' => "function( data )
							{
							  location.reload();
							}",
					  'data' => array( 'form' => $model->id, 'inspector' => 'js:$("#inspector").val()' )
					),
					array( //htmlOptions
					  'href' => Yii::app()->createUrl( 'iform/asignarinsp' )					 
					)
				      );	
		?>					 
		<?php $this->endWidget(); ?>
	</div><!-- form -->
<?php
	}
else
	{
	echo "</br>";	
	echo "<b>Inspector Asignado :</b>".$inboxs->to0->crugeuser->username;
	
	} */ ?>
<!--Fin Inspector-->


