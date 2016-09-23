<?php
/* @var $this HeadquarterController */
/* @var $model Headquarter */
/* @var $form CActiveForm */

	$estaciones_experimentales=Headquarter::model()->findAll('parent_id is null and tipo_usuario=:tipo_usuario',array(':tipo_usuario'=>'2'));
	//$lista_ee=CHtml::listData($ee,'id','name');
	
	$departamentos = Location::model()->findAll(array(
			  'select'   => 't.department, t.department_id',
			  'group'    => 't.department',
				'order'	  => 't.department ASC',
				//'condition'=> 't.departament_id='.substr($ee->location_id,0,2),
				'distinct' => true
			)); 
	//$list = CHtml::listData($departments,'department_id','department');
	
?>





<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'headquarter-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'htmlOptions'=>array('class'=>'well'),
   
)); ?>

	<?php echo $form->errorSummary($model); ?>
		<?php //echo $form->textFieldRow($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		
	<div class="row-fluid" >
	    <div class="span4 success">
		<label for="Headquarter_parent_id">Organismo Certificador</label>
		<select name="Headquarter[parent_id]" id="Headquarter_parent_id">
		    <option value=""> </option>
		    <?php foreach($estaciones_experimentales as $estacion_experimental){ ?>
			<option value="<?= $estacion_experimental->id ?>" <?= ($estacion_experimental->id==$model->parent_id)?'selected':''; ?> ><?= $estacion_experimental->name ?></option>
		    <?php } ?>
		</select>
		<div class="help-block error" id="Headquarter_parent_id_em_" style="display:none">Organismo Certificador no es correcto.</div>	
	    </div>
	</div>
		
	<div class="row-fluid" >

			<div class="span4 success">
					<label for="Headquarter_location_id" class="required">Región <span class="required">*</span></label>
					<select name="Headquarter[location_id]" id="Headquarter_location_id">
						<option value=""> </option>
						<?php foreach($departamentos as $departamento){ ?>
						    <option value="<?= $departamento->department_id ?>" <?= ($departamento->department_id==$model->location_id)?'selected':''; ?>> <?= $departamento->department ?></option>
						<?php } ?>
					</select>
					<div class="help-block error" id="Headquarter_location_id_em_" style="display:none">Región no es correcto.</div>	
			</div>


	</div>
		
	<div class="row-fluid" >

	    <div class="span4 success">
			    <label for="Headquarter_codigo_simple">Codigo Simple</label>
			    <input size="10" maxlength="50" class="span12" name="Headquarter[codigo_simple]" id="Headquarter_codigo_simple" type="text" value="<?= $model->codigo_simple ?>">
			    <div class="help-block error" id="Headquarter_codigo_simple_em_" style="display:none">Codigo Simple no es Correcto</div>		
	    </div>
		 

	</div>






	<div class="row-fluid">
	<div class="span12">
	    <input type="submit" class="btn btn-success" id="registrar" value="Guardar">
		<?php //$this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Enviar' ,'htmlOptions' => array(),)); ?>
	</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->



<script>
$('#registrar').click(function(){
    var error='';

    if ($.trim($('#Headquarter_parent_id').val())=='') {
	    error=error+'documento';
	    $('#Headquarter_parent_id_em_').show();
	}
	else
	{
	    $('#Headquarter_parent_id_em_').hide();
	}


	if ($.trim($('#Headquarter_location_id').val())=='') {
	    error=error+'documento';
	    $('#Headquarter_location_id_em_').show();//muestra el mensaje que has puesto- el id del div del error 
	}
	else
	{
	    $('#Headquarter_location_id_em_').hide();//oculta el mensaje, ya que esta lleno el id del div del error 
	}

	if ($.trim($('#Headquarter_codigo_simple').val())=='') {
	    error=error+'documento';
	    $('#Headquarter_codigo_simple_em_').show();//muestra el mensaje que has puesto- el id del div del error 
	}
	else
	{
	    $('#Headquarter_codigo_simple_em_').hide();//oculta el mensaje, ya que esta lleno el id del div del error 
	}


    if (error!='')
    {
        return false;
    }
    else
    {
        return true; 
   	}
});


$('.numerico').keypress(function (e) {
	tecla = (document.all) ? e.keyCode : e.which; // 2
	if (tecla==8) return true; // 3
        var reg = /^[0-9\s]+$/;
        te = String.fromCharCode(tecla); // 5
	return reg.test(te); // 6
});		
	
$('.texto').keypress(function(e) {
	tecla = (document.all) ? e.keyCode : e.which; // 2
	if (tecla==8) return true; // 3
        var reg = /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ'_\s]+$/;
        te = String.fromCharCode(tecla); // 5
	return reg.test(te); // 6
});
</script