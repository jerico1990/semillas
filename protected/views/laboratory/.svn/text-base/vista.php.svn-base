<?php

$user=User::model()->find('cruge_user_id=:cruge_user_id',array(':cruge_user_id'=>Yii::app()->user->id));
$laboratorios=Laboratory::model()->findAll('user_laboratory=:user_laboratory and form_id=:form_id',
														 array(':user_laboratory'=>$user->id,':form_id'=>(int)$_REQUEST['id']));

?>
<br>
	
<div class="row-fluid well">
	<div class='row-fluid'>
		<?php foreach($laboratorios as $laboratorio):?>			
			<?php echo "<b>Codigo de Lote: </b>".CHtml::AjaxLink($laboratorio->muestreo->codigo_lote,array('laboratory/UpdateVista','id'=>$laboratorio->id),array('update' => '#data'))."<br>";?>			
		<?php endforeach;?>
   </div>
</div>


<div class="row-fluid well">
		<div id="data">
				<?php $this->renderPartial('_ajaxContent', array('id'=>$id)); ?>
		</div>
</div>