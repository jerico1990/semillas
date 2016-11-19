<?php
	
?>
<script src="//code.jquery.com/jquery-1.8.2.js"></script>
<script src="//code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
  
  
<div class="form well span12">
<?php 
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('class'=>'well'),
   
));

?>
<?php echo $form->errorSummary($model); ?>
<?php /*<div class="row-fluid">		  
	<div class="span12"><h3>Datos de Empresa</h3></div>					
</div>
<div class="row-fluid" >
	<div class="span4"><?php echo $form->textFieldRow($model,'registry',array('class'=>'span12','size'=>30,'maxlength'=>30)); ?></div>
	<div class="span8"></div>
</div>
<div class="row-fluid" >
	<div class="span4"><?php echo $form->textFieldRow($model,'ruc',array('class'=>'span12','disabled'=>true,'value'=>'3423423','size'=>12,'maxlength'=>12)); ?></div>
	<div class="span8"><?php echo $form->textFieldRow($model,'legal_name',array('disabled'=>true,'value'=>'Inia','class'=>'span12','size'=>60,'maxlength'=>120)); ?></div>
</div>
*/ ?>
<div class="row-fluid">		  
	<div class="span12"><h3>Datos de Personales</h3></div>
</div>
<div class="row-fluid">
	<div class="span4">
	    <label for="User_var_tipo_documento" class="required">Tipo de documento <span class="required">*</span></label>
	    <select name="User[tipo_documento]" id="User_tipo_documento" >
		<option value>Seleccionar</option>
		<option value=1 <?= ($model->tipo_documento==1)?'selected':'';?> >DNI</option>
		<option value=2 <?= ($model->tipo_documento==2)?'selected':'';?> >CARNET DE EXTRANJERÍA</option>
	    </select>
	    <!--input class="span12" size="12" maxlength="12" name="Solicitud[tipo_persona]" id="Solicitud_var_tipo_persona" type="text">-->
	    <div class="help-block error" id="User_var_tipo_documento_em_" style="display:none">Tipo de documento no es correcto.</div>
	</div>
    
	<div class="span4">
		<label for="User_document_number">DNI</label>
		<input class="span12 numerico" size="8" maxlength="8" name="User[document_number]" id="User_document_number" type="text" value="<?= $model->document_number ?>">
		<div class="help-block error" id="User_document_number_em_" style="display:none">Nro de documento no puede ser nulo</div>
		<div class="help-block error" id="User_document_number_em_duplicado" style="display:none">Nro de documento ya se encuentra registrado</div>
		
	</div>
	<!--<div class="span4"><?php //echo $form->textFieldRow($model,'document_number',array('class'=>'span12','size'=>8,'maxlength'=>8)); ?></div>-->
	<div class="span8"></div>
</div>



<div class="row-fluid">
    <div class="span6">
	<label for="User_first_name">Nombres</label>
	<input class="span12 texto" size="50" maxlength="50" name="User[first_name]" id="User_first_name" type="text" value="<?= $model->first_name ?>">
	<div class="help-block error" id="User_first_name_em_" style="display:none">"El Nombre no es correcto "</div>
    </div>
    <div class="span6">
	<label for="User_last_name">Apellidos</label>
	<input class="span12 texto" size="50" maxlength="50" name="User[last_name]" id="User_last_name" type="text" value="<?= $model->last_name ?>">
	<div class="help-block error" id="User_last_name_em_" style="display:none">"El Apellido no puede ser Vacio"</div>
    </div>
	<!----
	<div class="span6"><?php echo $form->textFieldRow($model,'first_name',array('class'=>'span12','size'=>50,'maxlength'=>50)); ?></div>
	<div class="span6"><?php echo $form->textFieldRow($model,'last_name',array('class'=>'span12','size'=>50,'maxlength'=>50)); ?></div>
	-->
</div>

<div class="row-fluid">
    <div class="span6">
	<label for="User_phone">Telefono</label>
	<input class="span12 numerico" size="50" maxlength="9" name="User[phone]" id="User_phone" type="text" value="<?= $model->phone ?>">
	<div class="help-block error" id="User_phone_em_" style="display:none">El telefono no es correcto</div>
    </div>
	<!--
	<div class="span6"><?php echo $form->textFieldRow($model,'phone',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>
	<div class="span6"><?php echo $form->textFieldRow($model,'fax',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>
	-->
    <div class="span6">
	<label for="User_fax">Fax</label>
	<input class="span12" size="50" maxlength="150" name="User[fax]" id="User_fax" type="text" value="<?= $model->fax ?>">
	<div class="help-block error" id="User_fax_em_" style="display:none">El Fax no es correcto</div>
    </div>
</div>
<div class="row-fluid">		  
	<div class="span12"><h3>Cuenta</h3></div>
</div>
<div class="row-fluid">
    <div class="span6">
	<label>Cuenta</label>
	<input class="span12" size="50" maxlength="150" type="text" disabled value="<?= $model->username ?>">
    </div>
</div>
<div class="row-fluid">
    <div class="span4">
	<label for="User_email">Correo Electrónico</label>
	<input class="span12" size="30" maxlength="30" name="User[email]" id="User_email" type="text" value="<?= $model->email ?>">
	<div class="help-block error" id="User_email_em_" style="display:none">El email no es correcto.</div>
	<div class="help-block error" id="User_email_em_incorrecto" style="display:none">No es un correo electrónico.</div>
	<div class="help-block error" id="User_email_em_duplicado" style="display:none">El correo electrónico ya se encuentra registrado.</div>
    </div>
    <div class="span8">
	<label for="User_tipo_estacion_experimental">Estación Experimental</label>
	<select name="User[tipo_estacion_experimental]" id="User_tipo_estacion_experimental">
	    <option value=>Seleccionar</option>
	    <?php foreach($estaciones as $estacion){ ?>
	    <option value="<?= $estacion->id ?>" <?= ($estacion->id==$model->tipo_estacion_experimental)?'selected':'';?>><?= $estacion->descripcion ?></option>
	    <?php } ?>
	</select>
	<div class="help-block error" id="User_tipo_estacion_experimental_em_" style="display:none">Tipo de estacion experimental no es correcto.</div>
    </div>
	<!--
	<div class="span4"><?php echo $form->textFieldRow($model,'email',array('class'=>'span12','size'=>30,'maxlength'=>30)); ?></div>
	<div class="span8"></div>
	-->
</div>
<div class="row-fluid" >
	<div class="span12"><h3>Dirección</h3></div>
</div>
<div class="row-fluid">
    <div class="span4">
	<label for="User_department_id">Departamento</label>
	<select name="User[department_id]" id="User_department_id" onchange="Provincias($(this).val())">
	    <option value="">Seleccionar</option>
	    <?php foreach($departamentos as $departamento){ ?>
	    <option value="<?= $departamento->department_id ?>" <?= ($model->department_id==$departamento->department_id)?'selected':''; ?>><?= $departamento->department ?></option>
	    <?php } ?>
	</select>
	<div class="help-block error" id="User_department_id_em_" style="display:none">Departamento no puede ser nulo.</div>
    </div>
    
    <?php /*echo $form->dropDownListRow($model,'department_id',$departments,array(
			   'prompt' => 'Seleccionar',
			   'ajax' => array(
			   'type'=>'GET', //request type
			   'url'=>CController::createUrl('location/provinces'), //url to call.
			   'update'=>'#Solicitud_province_id', //selector to update
			   'data'   => 'js:$("#Solicitud_department_id").val()'
	   )));*/ ?>
    <div class="span8"></div>
</div>
<div class="row-fluid">
    <div class="span4">
	<label for="User_province_id">Provincia</label>
	<select name="User[province_id]" id="User_province_id" onchange="Distritos($(this).val())">
	    <option value="">Seleccionar</option>
	    <?php foreach($provincias as $provincia){?>
	    <option value="<?= $provincia->province_id ?>" <?= ($model->province_id==$provincia->province_id)?'selected':''; ?>><?= $provincia->province ?></option>
	    <?php }?>
	</select>
	<div class="help-block error" id="User_province_id_em_" style="display:none">Provincia no puede ser nulo.</div>
    </div>
    
	<?php /*echo $form->dropDownListRow($model,'province_id',array(),array(
	    'prompt' => 'Seleccionar',
	    'ajax' => array(
			     'type'=>'GET', //request type
			      'url'=>CController::createUrl('location/districts'), //url to call.
			      'update' => '#Solicitud_district_id',
			      'data'   => 'js:$("#Solicitud_province_id").val()'
		      )));*/
	?>
    <div class="span4"></div>
</div>

<div class="row-fluid">
    <div class="span8">
	<label for="User_district_id" class="required">Distrito <span class="required">*</span></label>
	<select name="User[district_id]" id="User_district_id">
	    <option value="">Seleccionar</option>
	    <?php foreach($distritos as $distrito){?>
	    <option value="<?= $distrito->district_id ?>" <?= ($model->district_id==$distrito->district_id)?'selected':''; ?>><?= $distrito->district ?></option>
	    <?php }?>
	</select>
	<div class="help-block error" id="User_district_id_em_" style="display:none">Distrito no puede ser nulo.</div>
    </div>
    
    <!--<div class="span8"> <?php //echo $form->dropDownListRow($model,'district_id',array(), array('prompt' => 'Seleccionar',)); ?></div>-->
    <div class="span4"></div>
</div>	
<div class="row-fluid">
    <div class="span12">
	<label for="User_var_direccion" class="required">Dirección (Según Solicitud de R.P.S.) <span class="required">*</span></label>
	<input class="span12" size="50" maxlength="150" name="User[var_direccion]" id="User_var_direccion" type="text" value="<?= $model->address ?>">
	<div class="help-block error" id="User_var_direccion_em_" style="display:none">Dirección (Según Solicitud de R.P.S.) no puede ser nulo.</div>
    </div>
    
    <!--<div class="span12"><?php //echo $form->textFieldRow($model,'var_direccion',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>-->
</div>
<div class="row-fluid">
    <div class="span12">
	<label for="User_var_referencia" class="required">Referencia <span class="required">*</span></label>
	<input class="span12" size="50" maxlength="200" name="User[var_referencia]" id="User_var_referencia" type="text" value="<?= $model->reference ?>">
	<div class="help-block error" id="User_var_referencia_em_" style="display:none">Referencia no puede ser nulo.</div>
    </div>
    
    <!--<div class="span12"><?php //echo $form->textFieldRow($model,'var_referencia',array('class'=>'span12','size'=>50,'maxlength'=>200)); ?></div>-->
</div>
<div class="row-fluid">
    <div class="span12">
	<input type="submit" class="btn btn-success" id="registrar" value="Enviar">
	    <?php //$this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Enviar' ,'htmlOptions' => array(),)); ?>
    </div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$provincias=CController::createUrl('location/provinces');
$distritos=CController::createUrl('location/districts');
$documento=CController::createUrl('solicitud/dni');
$email=CController::createUrl('solicitud/email');
?>
<script>
    $('#User_tipo_documento').change(function(){
	if ($(this).val()==1) {
	    $('#User_document_number').attr('maxlength','8');
	}
	else if ($(this).val()==2) {
	    $('#User_document_number').attr('maxlength','9');
	}
    });
    
    function Provincias(valor) {
	$.get( "<?= $provincias ?>?departamento="+valor, function( data ) {$( "#User_province_id" ).html( data );});
        $("#User_province_id").find("option").remove().end().append("<option value></option>").val("");
        $("#User_district_id").find("option").remove().end().append("<option value></option>").val("");
    }
    
    function Distritos(valor) {
	$.get( "<?= $distritos ?>?provincia="+valor, function( data ) {$( "#User_district_id" ).html( data );});
        $("#User_district_id").find("option").remove().end().append("<option value></option>").val("");
    }
    
    $('#registrar').click(function(){
        var error='';
	var ant_documento='<?= $model->document_number ?>';
	if (ant_documento!=$('#User_document_number').val()) {
	    var nrodocumento=$.ajax({
		url: '<?= $documento ?>',
		type: 'POST',
		async: false,
		data: {documento:$('#User_document_number').val()},
		success: function(data){
		    
		}
	    });
	    if (nrodocumento.responseText=='1') {
		error=error+'Solicitud';
		$('#User_document_number_em_duplicado').show();
	    }
	    else
	    {
		$('#User_document_number_em_duplicado').hide();
	    }
	}
        
	var ant_correo='<?= $model->email ?>';
	if (ant_correo!=$('#User_email').val()) {
	    var correo=$.ajax({
		url: '<?= $email ?>',
		type: 'POST',
		async: false,
		data: {email:$('#User_email').val()},
		success: function(data){
		    
		}
	    });
	    
	    if (correo.responseText=='1') {
		error=error+'Solicitud';
		$('#User_email_em_duplicado').show();
	    }
	    else
	    {
		$('#User_email_em_duplicado').hide();
	    }
	}
	if ($.trim($('#User_tipo_estacion_experimental').val())=='') {
	    error=error+'RUC';
	    $('#User_tipo_estacion_experimental_em_').show();
	}
	else
	{
	    $('#User_tipo_estacion_experimental_em_').hide();
	}
	
	
	
	
	
	
	if ($.trim($('#User_document_number').val())=='') {
	    error=error+'RUC';
	    $('#User_document_number_em_').show();
	}
	else
	{
	    $('#User_document_number_em_').hide();
	}
	
	if ($.trim($('#User_first_name').val())=='') {
	    error=error+'RUC';
	    $('#User_first_name_em_').show();
	}
	else
	{
	    $('#User_first_name_em_').hide();
	}
	
	if ($.trim($('#User_last_name').val())=='') {
	    error=error+'RUC';
	    $('#User_last_name_em_').show();
	}
	else
	{
	    $('#User_last_name_em_').hide();
	}
	
	if ($.trim($('#User_email').val())=='') {
	    error=error+'RUC';
	    $('#User_email_em_').show();
	}
	else
	{
	    $('#User_email_em_').hide();
	}
	
	if($('#User_email').val()!='' && !validateEmail($('#User_email').val()))
        {
            error=error+'Debes ingresar una dirección de correo válida <br>';
            $('#User_email_em_incorrecto').show();
        }
	else
	{
	    $('#User_email_em_incorrecto').hide();
	}
	
	
	if ($.trim($('#User_department_id').val())=='') {
	    error=error+'RUC';
	    $('#User_department_id_em_').show();
	}
	else
	{
	    $('#User_department_id_em_').hide();
	}
	
	if ($.trim($('#User_province_id').val())=='') {
	    error=error+'RUC';
	    $('#User_province_id_em_').show();
	}
	else
	{
	    $('#User_province_id_em_').hide();
	}
	
	if ($.trim($('#User_district_id').val())=='') {
	    error=error+'RUC';
	    $('#User_district_id_em_').show();
	}
	else
	{
	    $('#User_district_id_em_').hide();
	}
	
	if ($.trim($('#User_var_direccion').val())=='') {
	    error=error+'RUC';
	    $('#User_var_direccion_em_').show();
	}
	else
	{
	    $('#User_var_direccion_em_').hide();
	}
	
	if ($.trim($('#User_var_referencia').val())=='') {
	    error=error+'RUC';
	    $('#User_var_referencia_em_').show();
	}
	else
	{
	    $('#User_var_referencia_em_').hide();
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
    function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        }
        else {
            return false;
        }
    }
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
</script>