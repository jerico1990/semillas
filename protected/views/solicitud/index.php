<script src="//code.jquery.com/jquery-1.8.2.js"></script>
<script src="//code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
<?php if(Yii::app()->user->hasFlash('msg')): ?>
<div class="container span12">
    <h2>Solicitud de Cuenta de Usuario</h2>
    
    <div class="flash-success" style="text-align:left">
       <?php echo Yii::app()->user->getFlash('msg'); ?>
    </div>
    
</div>
<?php else: ?>
<div class="container span12">
    <h2>Solicitud de Cuenta de Usuario</h2>
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
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm');

?>
    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">		  
	<div class="span12"><h4>Datos de Productor de Semillas</h4>
    </div>					
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <label for="Solicitud_var_registro" class="required">Nro de Registro <span class="required">*</span></label>
	    <input class="span12" size="30" maxlength="30" name="Solicitud[var_registro]" id="Solicitud_var_registro" type="text">
	    <div class="help-block error" id="Solicitud_var_registro_em_" style="display: none">Nro de Registro no es correcto.</div>
	    <div class="help-block error" id="Solicitud_var_registro_em_duplicado" style="display: none">Nro de Registro ya se encuentra registrado.</div>
	</div>
	
	<!--<div class="span4"><?php //echo $form->textFieldRow($model,'var_registro',array('class'=>'span12','size'=>30,'maxlength'=>30)); ?></div>-->
	<div class="span8"></div>
    </div>
    <div class="row-fluid" >
	<div class="span4">
	    <label class="required" for="Solicitud_var_ruc">RUC <span class="required">*</span></label>
	    <input class="span12 numerico" size="11" maxlength="11" name="Solicitud[var_ruc]" id="Solicitud_var_ruc" type="text">
	    <div class="help-block error" id="Solicitud_var_ruc_em_" style="display: none">RUC no es correcto.</div>
	    <div class="help-block error" id="Solicitud_var_ruc_em_duplicado" style="display: none">RUC ya se encuentra registrado.</div>
	</div>
	<div class="span8">
	    <label class="required" for="Solicitud_var_razon_social">Nombre / Razón Social <span class="required">*</span></label>
	    <input class="span12" size="60" maxlength="120" name="Solicitud[var_razon_social]" id="Solicitud_var_razon_social" type="text" >
	    <div class="help-block error" id="Solicitud_var_razon_social_em_" style="display: none">Nombre / Razón Social no es correcto.</div>
	</div>
	<!--<div class="span4"><?php //echo $form->textFieldRow($model,'var_ruc',array('class'=>'span12','size'=>12,'maxlength'=>12)); ?></div>-->
	<!--<div class="span8"><?php //echo $form->textFieldRow($model,'var_razon_social',array('class'=>'span12','size'=>60,'maxlength'=>120)); ?></div>-->
    </div>
    
    <div class="row-fluid">		  
	<div class="span12"><h4>Datos de Usuario Responsable</h4>
    </div>
    <div class="row-fluid" >
	<div class="span4">
	    <label for="Solicitud_var_tipo_documento" class="required">Tipo de documento <span class="required">*</span></label>
	    <select name="Solicitud[tipo_documento]" id="Solicitud_tipo_documento" >
		<option value>Seleccionar</option>
		<option value=1>DNI</option>
		<option value=2>CARNET DE EXTRANJERÍA</option>
	    </select>
	    <!--input class="span12" size="12" maxlength="12" name="Solicitud[tipo_persona]" id="Solicitud_var_tipo_persona" type="text">-->
	    <div class="help-block error" id="Solicitud_var_tipo_documento_em_" style="display:none">Tipo de documento no es correcto.</div>
	</div>
	<div class="span4">
	    <label for="Solicitud_var_dni" class="required">Nro Documento <span class="required">*</span></label>
	    <input class="span12 numerico" size="9" maxlength="9" name="Solicitud[var_dni]" id="Solicitud_var_dni" type="text">
	    <div class="help-block error" id="Solicitud_var_dni_em_" style="display:none">DNI no es correcto.</div>
	    <div class="help-block error" id="Solicitud_var_dni_em_duplicado" style="display: none">DNI ya se encuentra registrado.</div>
	</div>
	
	<!--<div class="span4"><?php //echo $form->textFieldRow($model,'var_dni',array('class'=>'span12','size'=>12,'maxlength'=>12)); ?></div>-->
	<div class="span8"></div>
    </div>
    <div class="row-fluid" >
	<div class="span6">
	    <label class="required" for="Solicitud_var_nombres">Nombres <span class="required">*</span></label>
	    <input class="span12 texto" size="50" maxlength="50" name="Solicitud[var_nombres]" id="Solicitud_var_nombres" type="text">
	    <div class="help-block error" id="Solicitud_var_nombres_em_" style="display:none">Nombres no es correcto.</div>
	</div>
	<div class="span6">
	    <label class="required" for="Solicitud_var_apellidos">Apellidos <span class="required">*</span></label>
	    <input class="span12 texto" size="50" maxlength="50" name="Solicitud[var_apellidos]" id="Solicitud_var_apellidos" type="text">
	    <div class="help-block error" id="Solicitud_var_apellidos_em_" style="display:none">Apellidos no es correcto.</div>
	</div>
	<!--<div class="span6"><?php //echo $form->textFieldRow($model,'var_nombres',array('class'=>'span12','size'=>50,'maxlength'=>50)); ?></div>-->
	<!--<div class="span6"><?php //echo $form->textFieldRow($model,'var_apellidos',array('class'=>'span12','size'=>50,'maxlength'=>50)); ?></div>-->
    </div>
    <div class="row-fluid" >
	<div class="span4">
	    <label class="required" for="Solicitud_var_correo">Correo Electrónico <span class="required">*</span></label>
	    <input class="span12" size="30" maxlength="30" name="Solicitud[var_correo]" id="Solicitud_var_correo" type="text">
	    <div class="help-block error" id="Solicitud_var_correo_em_" style="display:none">Correo electrónico no es correcto.</div>
	    <div class="help-block error" id="Solicitud_var_correo_em_duplicado" style="display: none">Correo electrónico ya se encuentra registrado.</div>
	    <div class="help-block error" id="Solicitud_email_em_incorrecto" style="display: none">No es un correo electrónico.</div>
	</div>
	
	<!--<div class="span4"><?php //echo $form->textFieldRow($model,'var_correo',array('class'=>'span12','size'=>30,'maxlength'=>30)); ?></div>-->
	<div class="span8"></div>
    </div>
    <div class="row-fluid"  >
	<div class="span6">
	    <label for="Solicitud_var_telefono">Telefono</label>
	    <input class="span12 numerico" size="50" maxlength="9" name="Solicitud[var_telefono]" id="Solicitud_var_telefono" type="text">
	</div>
	<div class="span6">
	    <label for="Solicitud_var_fax">Fax</label>
	    <input class="span12" size="50" maxlength="20" name="Solicitud[var_fax]" id="Solicitud_var_fax" type="text">
	</div>
	<!--<div class="span6"><?php //echo $form->textFieldRow($model,'var_telefono',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>-->
	<!--<div class="span6"><?php //echo $form->textFieldRow($model,'var_fax',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>-->
    </div>

  
    <div class="row-fluid" >
	<div class="span12"><h4>Dirección del Productor de Semillas</h4>
    </div>
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <label for="Solicitud_department_id">Departamento</label>
	    <select name="Solicitud[department_id]" id="Solicitud_department_id" onchange="Provincias($(this).val())">
		<option value="">Seleccionar</option>
		<?php foreach($departamentos as $departamento){ ?>
		<option value="<?= $departamento->department_id ?>"><?= $departamento->department ?></option>
		<?php } ?>
	    </select>
	    <div class="help-block error" id="Solicitud_department_id_em_" style="display:none">Departamento no es correcto.</div>
	</div>
	
	<?php /*echo $form->dropDownListRow($model,'department_id',$departments,array(
			       'prompt' => 'Seleccionar',
			       'ajax' => array(
			       'type'=>'GET', //request type
			       'url'=>CController::createUrl('location/provinces'), //url to call.
			       'update'=>'#Solicitud_province_id', //selector to update
			       'data'   => 'js:$("#Solicitud_department_id").val()'
	       )));*/ ?>
	<div class="span8">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <label for="Solicitud_province_id">Provincia</label>
	    <select name="Solicitud[province_id]" id="Solicitud_province_id" onchange="Distritos($(this).val())">
		<option value="">Seleccionar</option>
	    </select>
	    <div class="help-block error" id="Solicitud_province_id_em_" style="display:none">Provincia no es correcto.</div>
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
	    <label for="Solicitud_district_id" class="required">Distrito <span class="required">*</span></label>
	    <select name="Solicitud[district_id]" id="Solicitud_district_id">
		<option value="">Seleccionar</option>
	    </select>
	    <div class="help-block error" id="Solicitud_district_id_em_" style="display:none">Distrito no es correcto.</div>
	</div>
	
	<!--<div class="span8"> <?php //echo $form->dropDownListRow($model,'district_id',array(), array('prompt' => 'Seleccionar',)); ?></div>-->
	<div class="span4"></div>
    </div>	
    <div class="row-fluid">
	<div class="span12">
	    <label for="Solicitud_var_direccion" class="required">Dirección (Según Solicitud de R.P.S.) <span class="required">*</span></label>
	    <input class="span12" size="50" maxlength="150" name="Solicitud[var_direccion]" id="Solicitud_var_direccion" type="text">
	    <div class="help-block error" id="Solicitud_var_direccion_em_" style="display:none">Dirección (Según Solicitud de R.P.S.) no es correcto.</div>
	</div>
	
	<!--<div class="span12"><?php //echo $form->textFieldRow($model,'var_direccion',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>-->
    </div>
    <div class="row-fluid">
	<div class="span12">
	    <label for="Solicitud_var_referencia" class="required">Referencia <span class="required">*</span></label>
	    <input class="span12" size="50" maxlength="200" name="Solicitud[var_referencia]" id="Solicitud_var_referencia" type="text">
	    <div class="help-block error" id="Solicitud_var_referencia_em_" style="display:none">Referencia no es correcto.</div>
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
<?php endif;?>
<?php
$provincias=CController::createUrl('location/provinces');
$distritos=CController::createUrl('location/districts');
//$distritos=CController::createUrl('location/districts');
$nroregistro=CController::createUrl('solicitud/nroregistro');
$nroruc=CController::createUrl('solicitud/nroruc');
$documento=CController::createUrl('solicitud/dni');
$email=CController::createUrl('solicitud/email');
?>
<script>
    $('#Solicitud_tipo_documento').change(function(){
	if ($(this).val()==1) {
	    $('#Solicitud_var_dni').attr('maxlength','8');
	}
	else if ($(this).val()==2) {
	    $('#Solicitud_var_dni').attr('maxlength','9');
	}
    });
    
    $('#registrar').click(function(){
        var error='';
	
	var nroregistro=$.ajax({
            url: '<?= $nroregistro ?>',
            type: 'POST',
            async: false,
            data: {registro:$('#Solicitud_var_registro').val()},
            success: function(data){
                
            }
        });
	
        if (nroregistro.responseText=='1') {
	    error=error+'Solicitud';
	    $('#Solicitud_var_registro_em_duplicado').show();
        }
	else
	{
	    $('#Solicitud_var_registro_em_duplicado').hide();
	}
	
	var nroruc=$.ajax({
            url: '<?= $nroruc ?>',
            type: 'POST',
            async: false,
            data: {ruc:$('#Solicitud_var_ruc').val()},
            success: function(data){
                
            }
        });
	
        if (nroruc.responseText=='1') {
	    error=error+'Solicitud';
            $('#Solicitud_var_ruc_em_duplicado').show();
        }
	else
	{
	    $('#Solicitud_var_ruc_em_duplicado').hide();
	}
	
	
	var nrodocumento=$.ajax({
            url: '<?= $documento ?>',
            type: 'POST',
            async: false,
            data: {documento:$('#Solicitud_var_dni').val()},
            success: function(data){
                
            }
        });
	
        if (nrodocumento.responseText=='1') {
	    error=error+'Solicitud';
            $('#Solicitud_var_dni_em_duplicado').show();
        }
	else
	{
	    $('#Solicitud_var_dni_em_duplicado').hide();
	}
	
	var correo=$.ajax({
            url: '<?= $email ?>',
            type: 'POST',
            async: false,
            data: {email:$('#Solicitud_var_correo').val()},
            success: function(data){
                
            }
        });
	
        if (correo.responseText=='1') {
	    error=error+'Solicitud';
            $('#Solicitud_var_correo_em_duplicado').show();
        }
	else
	{
	    $('#Solicitud_var_correo_em_duplicado').hide();
	}
	
	
	
	if ($.trim($('#Solicitud_var_registro').val())=='') {
	    error=error+'Solicitud';
	    $('#Solicitud_var_registro_em_').show();
	}
	else
	{
	    $('#Solicitud_var_registro_em_').hide();
	}
	
	if ($.trim($('#Solicitud_var_ruc').val())=='') {
	    error=error+'Razon Social';
	    $('#Solicitud_var_ruc_em_').show();
	}
	else
	{
	    $('#Solicitud_var_ruc_em_').hide();
	}
	
	if ($.trim($('#Solicitud_var_razon_social').val())=='') {
	    error=error+'Razon Social';
	    $('#Solicitud_var_razon_social_em_').show();
	}
	else
	{
	    $('#Solicitud_var_razon_social_em_').hide();
	}
	
	
	if ($.trim($('#Solicitud_tipo_documento').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_var_tipo_documento_em_').show();
	}
	else
	{
	    $('#Solicitud_var_tipo_documento_em_').hide();
	}
	
	
	if ($.trim($('#Solicitud_var_dni').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_var_dni_em_').show();
	}
	else
	{
	    $('#Solicitud_var_dni_em_').hide();
	}
	
	if ($.trim($('#Solicitud_var_nombres').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_var_nombres_em_').show();
	}
	else
	{
	    $('#Solicitud_var_nombres_em_').hide();
	}
	
	if ($.trim($('#Solicitud_var_apellidos').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_var_apellidos_em_').show();
	}
	else
	{
	    $('#Solicitud_var_apellidos_em_').hide();
	}
	
	if ($.trim($('#Solicitud_var_correo').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_var_correo_em_').show();
	}
	else
	{
	    $('#Solicitud_var_correo_em_').hide();
	}
	
	if($('#Solicitud_var_correo').val()!='' && !validateEmail($('#Solicitud_var_correo').val()))
        {
            error=error+'Debes ingresar una dirección de correo válida <br>';
            $('#Solicitud_email_em_incorrecto').show();
        }
	else
	{
	    $('#Solicitud_email_em_incorrecto').hide();
	}
	
	
	if ($.trim($('#Solicitud_department_id').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_department_id_em_').show();
	}
	else
	{
	    $('#Solicitud_department_id_em_').hide();
	}
	
	if ($.trim($('#Solicitud_province_id').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_province_id_em_').show();
	}
	else
	{
	    $('#Solicitud_province_id_em_').hide();
	}
	
	if ($.trim($('#Solicitud_district_id').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_district_id_em_').show();
	}
	else
	{
	    $('#Solicitud_district_id_em_').hide();
	}
	
	if ($.trim($('#Solicitud_var_direccion').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_var_direccion_em_').show();
	}
	else
	{
	    $('#Solicitud_var_direccion_em_').hide();
	}
	
	if ($.trim($('#Solicitud_var_referencia').val())=='') {
	    error=error+'RUC';
	    $('#Solicitud_var_referencia_em_').show();
	}
	else
	{
	    $('#Solicitud_var_referencia_em_').hide();
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
    
    function Provincias(valor) {
	$.get( "<?= $provincias ?>?departamento="+valor, function( data ) {$( "#Solicitud_province_id" ).html( data );});
        $("#Solicitud_province_id").find("option").remove().end().append("<option value></option>").val("");
        $("#Solicitud_district_id").find("option").remove().end().append("<option value></option>").val("");
    }
    
    function Distritos(valor) {
	$.get( "<?= $distritos ?>?provincia="+valor, function( data ) {$( "#Solicitud_district_id" ).html( data );});
        $("#Solicitud_district_id").find("option").remove().end().append("<option value></option>").val("");
    }
    
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