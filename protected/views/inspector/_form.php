<script src="//code.jquery.com/jquery-1.8.2.js"></script>
<script src="//code.jquery.com/ui/1.8.24/jquery-ui.js"></script>


<?php
	$ambitos = Headquarter::model()->findAll('tipo_usuario=:tipo_usuario',array(':tipo_usuario'=>'2'));
	//$heardlist = CHtml::listData($heard,'id','name');
?>
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
	'id'=>'users-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('class'=>'well'),
   
));
?>
<?php echo $form->errorSummary($model); ?>		
<div class="row-fluid" >
    <div class="span12"><h3>Datos Personales</h3>
    </div>
</div>

<div class="row-fluid" >
    <div class="span4">
	    <label for="User_document_number">DNI</label>
	    <input size="8" maxlength="8" class="span12 numerico" name="User[document_number]" id="User_document_number" type="text" value="<?= $model->document_number ?>">
	    <div class="help-block error" id="User_document_number_em_" style="display:none">DNI no es correcto.</div>		  
    </div>
</div>
<div class="row-fluid" >
    <div class="span8">
	<label for="User_first_name">Nombres</label>
	<input size="50" maxlength="50" class="span12 texto" name="User[first_name]" id="User_first_name" type="text" value="<?= $model->first_name ?>">
	<div class="help-block error" id="User_first_name_em_" style="display:none">Nombres no es correcto.</div>	
    </div>
</div>	
<div class="row-fluid" >
    <div class="span8">
	<label for="User_last_name">Apellidos</label>
	<input size="50" maxlength="50" class="span12 texto" name="User[last_name]" id="User_last_name" type="text" value="<?= $model->last_name ?>">
	<div class="help-block error" id="User_last_name_em_" style="display:none">Apellidos no es correctos</div>
    </div>
</div>	
<div class="row-fluid" >
    <div class="span12"><h3>Cuenta</h3></div>
</div>
<div class="row-fluid">	
    <div class="span4">
	<label for="User_name">Usuario</label>
	<input size="30" maxlength="30" class="span12" name="User[name]" id="User_name" type="text" value="<?= $model->name ?>">
	<div class="help-block error" id="User_name_em_" style="display:none">Usuario no es correcto</div>
    </div>
</div>	
<div class="row-fluid">	
    <div class="span8 success">
	<label for="User_email">Correo Electrónico</label>
	<input size="30" maxlength="30" class="span12" name="User[email]" id="User_email" type="text" value="<?= $model->email ?>">
	<div class="help-block error" id="User_email_em_" style="display:none">Email no es correcto</div>
    </div>
</div>	
<div class="row-fluid" >
    <div class="span12"><h3>Estación</h3></div>
</div>
<div class="row-fluid">	
    <div class="span8 success">
	<label for="User_headquarter_id">Estacion</label>
	<select name="User[headquarter_id]" id="User_headquarter_id">
	    <option></option>
	    <?php foreach($ambitos as $ambito){?>
		<option value="<?= $ambito->id ?>" <?= ($model->headquarter_id==$ambito->id)?'selected':''; ?>><?= $ambito->name ?></option>
	    <?php }?>
	</select>
	<div class="help-block error" id="User_headquarter_id_em_" style="display:none">Estacion no es correcta</div>
    </div>
</div>

<div class="row-fluid">
	<div class="span12">
	    <input type="submit" class="btn btn-success" id="registrar" value="Enviar">
		<?php //$this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Enviar' ,'htmlOptions' => array(),)); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
<script>
$('#registrar').click(function(){
    var error='';

    if ($.trim($('#User_document_number').val())=='') {
	    error=error+'documento';
	    $('#User_document_number_em_').show();
	}
	else
	{
	    $('#User_document_number_em_').hide();
	}


	if ($.trim($('#User_first_name').val())=='') {
	    error=error+'documento';
	    $('#User_first_name_em_').show();//muestra el mensaje que has puesto- el id del div del error 
	}
	else
	{
	    $('#User_first_name_em_').hide();//oculta el mensaje, ya que esta lleno el id del div del error 
	}

	if ($.trim($('#User_last_name').val())=='') {
	    error=error+'documento';
	    $('#User_last_name_em_').show();//muestra el mensaje que has puesto- el id del div del error 
	}
	else
	{
	    $('#User_last_name_em_').hide();//oculta el mensaje, ya que esta lleno el id del div del error 
	}


	if ($.trim($('#User_name').val())=='') {
	    error=error+'documento';
	    $('#User_name_em_').show();//muestra el mensaje que has puesto- el id del div del error 
	}
	else
	{
	    $('#User_name_em_').hide();//oculta el mensaje, ya que esta lleno el id del div del error 
	}


	if ($.trim($('#User_email').val())=='') {
	    error=error+'documento';
	    $('#User_email_em_').show();//muestra el mensaje que has puesto- el id del div del error 
	}
	else
	{
	    $('#User_email_em_').hide();//oculta el mensaje, ya que esta lleno el id del div del error 
	}

	if ($.trim($('#User_headquarter_id').val())=='') {
	    error=error+'documento';
	    $('#User_headquarter_id_em_').show();//muestra el mensaje que has puesto- el id del div del error 
	}
	else
	{
	    $('#User_headquarter_id_em_').hide();//oculta el mensaje, ya que esta lleno el id del div del error 
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