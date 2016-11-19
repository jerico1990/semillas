<script src="//code.jquery.com/jquery-1.8.2.js"></script>
<script src="//code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
<?php
/*Direccion*/
    /*$departments = Location::model()->findAll(array(
    'select'   => 't.id, t.department, t.department_id',
    'group'    => 't.id,t.department',
    'order'    => 't.department ASC',
    'distinct' => true
    )); 
    $list = CHtml::listData($departments,'department_id','department');
    */
    if(isset($_REQUEST['id']))
    {
	$provinces = Location::model()->findAll(array(
	'select'    => 't.id, t.province, t.province_id, t.department_id',
	'condition' => 'department_id = "' . $model->department_id.'"',
	'group'    	=> 't.id,t.province',			
	'order'	=>	't.province',
	'distinct' 	=> true
	));
       // $listprovinces = CHtml::listData($provinces,'province_id','province');
	/*
	$districts = Location::model()->findAll(array(
	'select'    => 't.id, t.district, t.district_id, t.province_id',
	'condition' => 'department_id = ' . $model->department_id.' and province_id='.$model->province_id,
	'group'    => 't.id,t.district',			
	'order'		=>	't.district',
	'distinct' => true
	));
	$listdistricts = CHtml::listData($districts,'district_id','district');
	
	$arrayp=$listprovinces;
	$arrayd=$listdistricts;*/
    }
    else
    {
	$arrayp=array();
	$arrayd=array();
    }
/*Direccion*/
    $heard = Headquarter::model()->findAll('parent_id is null');
    $heardlist = CHtml::listData($heard,'id','name');	
    $tipoempresa=Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'008'));
    $lista_empresa=CHtml::listData($tipoempresa,'codigo_detalle','descripcion');	
    $usuarioempresa=Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'009'));
    $lista_usuario=CHtml::listData($usuarioempresa,'codigo_detalle','descripcion');
	    
    if($model->id!==null)
    {
	$user=User::model()->find('type_id=5 and headquarter_id=:headquarter',array(':headquarter'=>$model->id));				
	$cruge=Cruge::model()->find('iduser=:cruge_user_id',array(':cruge_user_id'=>$user->cruge_user_id));
    }
    else
    {
	$user=null;
	$cruge=null;
    }
?>


<div class="form well span12">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
<?php echo $form->errorSummary($model); ?>

<?php
if($cruge!==null)
{		
    echo CHtml::hiddenField('username_ant',$cruge->username);
    echo CHtml::hiddenField('email_ant',$cruge->email);
}		 
?>  

<div class="row-fluid" >
	<div class="span12"><h3>Datos Empresa</h3>
	</div>
</div>
<div class="row-fluid" >
    <div class="span4">
	<label for="Headquarter_ruc" class="required">Ruc <span class="required">*</span></label>
	<input size="11" maxlength="11" class="span12 numerico" name="Headquarter[ruc]" id="Headquarter_ruc" type="text" value="<?= $model->ruc ?>">
	<div class="help-block error" id="Headquarter_ruc_em_" style="display:none">RUC no es correcto.</div>
	<div class="help-block error" id="Headquarter_ruc_em_duplicado" style="display:none">RUC ya se encuentra registrado.</div>
    </div>
    <div class="span8"></div>
</div>
<div class="row-fluid" >
    <!--<div class="span9">
    <?php /*
    if($user!==null)
    {
	    echo $form->textFieldRow($user,'legal_name',array('size'=>12,'maxlength'=>150,'class'=>'span12'));
    }
    else
    {
	    echo $form->textFieldRow($model,'legal_name',array('size'=>12,'maxlength'=>150,'class'=>'span12'));
    }	*/		  
    ?>		  
    </div>-->
    <div class="span9">
	<label for="Headquarter_legal_name">Razon Social</label>
	<input size="12" maxlength="150" class="span12" name="Headquarter[legal_name]" id="Headquarter_legal_name" type="text" value="<?= $model->legal_name ?>">
	<div class="help-block error" id="Headquarter_legal_name_em_" style="display:none">Razon Social no es correcto.</div>
    </div>
    
    <div class="span3"></div>
</div>

<div class="row-fluid" >
	<div class="span12"><h3>Dirección</h3>
</div>
</div>
<div class="row-fluid">
	<div class="span4">
	    <label for="Headquarter_department_id">Departamento</label>
	    <select name="Headquarter[department_id]" id="Headquarter_department_id" onchange="Provincias($(this).val())">
		<option value="">Seleccionar</option>
		<?php foreach($departamentos as $departamento){ ?>
		<option value="<?= $departamento->department_id ?>" <?= ($model->department_id==$departamento->department_id)?'selected':''; ?>><?= $departamento->department ?></option>
		<?php } ?>
	    </select>
	    <div class="help-block error" id="Headquarter_department_id_em_" style="display:none">Departamento no es correcto.</div>
	</div>
	
	<?php /*echo $form->dropDownListRow($model,'int_department_id',$departments,array(
			       'prompt' => 'Seleccionar',
			       'ajax' => array(
			       'type'=>'GET', //request type
			       'url'=>CController::createUrl('location/provinces'), //url to call.
			       'update'=>'#Solicitud_int_province_id', //selector to update
			       'data'   => 'js:$("#Solicitud_int_department_id").val()'
	       )));*/ ?>
	<div class="span8">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <label for="Headquarter_province_id">Provincia</label>
	    <select name="Headquarter[province_id]" id="Headquarter_province_id" onchange="Distritos($(this).val())">
		<option value="">Seleccionar</option>
		<?php foreach($provincias as $provincia){?>
		    <option value="<?= $provincia->province_id ?>" <?= ($model->province_id==$provincia->province_id)?'selected':''; ?>><?= $provincia->province ?></option>
		<?php }?>
	    </select>
	    <div class="help-block error" id="Headquarter_province_id_em_" style="display:none">Provincia no es correcto.</div>
	</div>
	
	    <?php /*echo $form->dropDownListRow($model,'int_province_id',array(),array(
		'prompt' => 'Seleccionar',
		'ajax' => array(
				 'type'=>'GET', //request type
				  'url'=>CController::createUrl('location/districts'), //url to call.
				  'update' => '#Solicitud_int_district',
				  'data'   => 'js:$("#Solicitud_int_province_id").val()'
			  )));*/
	    ?>
	<div class="span4"></div>
    </div>
    
    <div class="row-fluid">
	<div class="span8">
	    <label for="Headquarter_district_id" class="required">Distrito <span class="required">*</span></label>
	    <select name="Headquarter[district_id]" id="Headquarter_district_id">
		<option value="">Seleccionar</option>
		<?php foreach($distritos as $distrito){?>
		<option value="<?= $distrito->district_id ?>" <?= ($model->district_id==$distrito->district_id)?'selected':''; ?>><?= $distrito->district ?></option>
		<?php }?>
	    </select>
	    <div class="help-block error" id="Headquarter_district_id_em_" style="display:none">Distrito no es correcto.</div>
	</div>
	
	<!--<div class="span8"> <?php //echo $form->dropDownListRow($model,'int_district',array(), array('prompt' => 'Seleccionar',)); ?></div>-->
	<div class="span4"></div>
    </div>
    <?php /*
<div class="row-fluid">		  
	<div class="span4">
		
		
	<?php	
	echo $form->dropDownListRow($model,'department_id',$list,array(								
		'ajax' => array(
		'type'=>'GET', //request type
		'url'=>CController::createUrl('location/provinces'), //url to call.
		'update'=>'#Headquarter_province_id', //selector to update
		'data'   => 'js:$("#Headquarter_department_id").val()'
		 )));
	
	?>
	
	</div>
	<div class="span8"></div>
</div>
<div class="row-fluid">		  
	<div class="span8">
	
	<?php echo $form->dropDownListRow($model,'province_id',$arrayp,array(								
			  'ajax' => array(
						'type'=>'GET', //request type
						 'url'=>CController::createUrl('location/districts'), //url to call.
						 'update' => '#Headquarter_district_id',
						 'data'   => 'js:$("#Headquarter_province_id").val()'
					 )));
	?>
	</div>
	<div class="span4"></div>
</div>

<div class="row-fluid">		  
	<div class="span8">
		<?php echo $form->dropDownListRow($model,'district_id',$arrayd, array()); ?>
	</div>
	<div class="span4"></div>
</div>
*/ ?>



<div class="row-fluid" >
    <?php /*
    <div class="span9">
    
    if($user!==null)
    {
	    echo $form->textFieldRow($user,'address',array('size'=>12,'maxlength'=>150,'class'=>'span12'));
    }
    else
    {
	    echo $form->textFieldRow($model,'address',array('size'=>12,'maxlength'=>150,'class'=>'span12'));
    }			
    
    </div>*/
    ?>
    <div class="span9">
	<label for="Headquarter_address">Dirección</label>
	<input size="12" maxlength="150" class="span12" name="Headquarter[address]" id="Headquarter_address" type="text" value="<?= $model->address ?>">
	<div class="help-block error" id="Headquarter_address_em_" style="display:none">Dirección no es correcto.</div>
    </div>
    <div class="span3"></div>
</div>
<div class="row-fluid" >
    <div class="span4">
	<label for="Headquarter_tipo_empresa">Tipo Empresa</label>
	<select name="Headquarter[tipo_empresa]" id="Headquarter_tipo_empresa">
	    <option value> </option>
	    <option value="1" <?= ($model->tipo_empresa==1)?'selected':''; ?> >Privado</option>
	    <option value="2" <?= ($model->tipo_empresa==2)?'selected':''; ?> >Estatal</option>
	</select>
	<div class="help-block error" id="Headquarter_tipo_empresa_em_" style="display:none">Tipo Empresa no es correcto.</div>
    </div>
    <!--
	<div class="span4">
	 <?php echo $form->dropDownListRow($model,'tipo_empresa',$lista_empresa,array('empty'=>' ')); ?>
	</div>
    -->
    <div class="span8"></div>
</div>

<div class="row-fluid" >
	<div class="span12"><h3>Datos Personales</h3>
	</div>
</div>
<div class="row-fluid" >
    <div class="span4">
	<label for="Headquarter_document_number">N° de Documento</label>
	<input size="8" maxlength="8" class="span12 numerico" name="Headquarter[document_number]" id="Headquarter_document_number" type="text" value="<?= $model->document_number ?>">
	<div class="help-block error" id="Headquarter_document_number_em_" style="display:none">N° de Documento no es correcto.</div>
	<div class="help-block error" id="Headquarter_document_number_em_duplicado" style="display:none">N° de Documento ya se encuentra registrado.</div>
    </div>
    <?php /*
	<div class="span4">
	
	if($user!==null)
	{				
		echo $form->textFieldRow($user,'document_number',array('size'=>8,'maxlength'=>8,'class'=>'span12'));
	}
	else
	{
		echo $form->textFieldRow($model,'document_number',array('size'=>8,'maxlength'=>8,'class'=>'span12'));
	}
	
	</div>*/
    ?>
    <div class="span8"></div>
</div>
<div class="row-fluid" >
    <div class="span8">
	<label for="Headquarter_first_name">Nombres</label>
	<input size="50" maxlength="50" class="span12 texto" name="Headquarter[first_name]" id="Headquarter_first_name" type="text" value="<?= $model->first_name ?>">
	<div class="help-block error" id="Headquarter_first_name_em_" style="display:none">Nombres no es correcto.</div>
    </div>
    <?php /*
	<div class="span8">
	
	if($user!==null)
	{
		echo $form->textFieldRow($user,'first_name',array('size'=>50,'maxlength'=>50,'class'=>'span12'));
	}
	else
	{
		echo $form->textFieldRow($model,'first_name',array('size'=>50,'maxlength'=>50,'class'=>'span12'));
	}
	
	</div> */
    ?>
    <div class="span4"></div>
</div>
<div class="row-fluid" >
    <div class="span8">
	<label for="Headquarter_last_name">Apellidos</label>
	<input size="50" maxlength="50" class="span12 texto" name="Headquarter[last_name]" id="Headquarter_last_name" type="text" value="<?= $model->last_name ?>">
	<div class="help-block error" id="Headquarter_last_name_em_" style="display:none">Apellidos no es correcto.</div>
    </div>
    <?php /*
	<div class="span8">
	
	if($user!==null)
	{
		echo $form->textFieldRow($user,'last_name',array('size'=>50,'maxlength'=>50,'class'=>'span12'));
	}
	else
	{
		echo $form->textFieldRow($model,'last_name',array('size'=>50,'maxlength'=>50,'class'=>'span12'));
	}
	
	</div>*/
    ?>
    <div class="span4"></div>
</div>

<div class="row-fluid" >
    <div class="span12"><h3>Cuenta</h3>
</div>
</div>
<div class="row-fluid">
    <div class="span4">
	<label for="Headquarter_username">Usuario</label>
	<input size="30" maxlength="40" class="span12" name="Headquarter[username]" id="Headquarter_username" type="text" value="<?= $model->username ?>">
	<div class="help-block error" id="Headquarter_username_em_" style="display:none">Usuario no es correcto.</div>
	<div class="help-block error" id="Headquarter_username_em_duplicado" style="display:none">Nombre de usuario ya se encuentra registrado.</div>
    </div>
    <?php /*
		  <div class="span4">
		  
		  if($cruge!==null)
		  {
			echo $form->textFieldRow($cruge,'username',array('size'=>30,'maxlength'=>40,'class'=>'span12'));
		  }
		  else
		  {
			echo $form->textFieldRow($model,'username',array('size'=>30,'maxlength'=>40,'class'=>'span12'));
		  }
		  
		  
		  </div> */
    ?>
    <div class="span8"></div>
</div>
<div class="row-fluid">
    <div class="span8">
	<label for="Headquarter_email">Correo electrónico</label>
	<input size="30" maxlength="30" class="span12" name="Headquarter[email]" id="Headquarter_email" type="text" value="<?= $model->email ?>">
	<div class="help-block error" id="Headquarter_email_em_" style="display:none">Correo electrónico no es correcto.</div>
	<div class="help-block error" id="Headquarter_email_em_duplicado" style="display:none">Correo electrónico ya se encuentra registrado.</div>
    </div>
    <?php /*
		  <div class="span8">
		  
		  if($cruge!==null)
		  {
				echo $form->textFieldRow($cruge,'email',array('size'=>30,'maxlength'=>30,'class'=>'span12'));
		  }
		  else
		  {
				echo $form->textFieldRow($model,'email',array('size'=>30,'maxlength'=>30,'class'=>'span12'));
		  }
		  
		  
		  </div> */
    ?>
    <div class="span4"></div>
</div>
	
<div id="codigo" class="row-fluid">		 
    <div class="span4"><?php //echo $form->textFieldRow($model,'codigo_simple',array('size'=>10,'maxlength'=>10,'class'=>'span12')); ?>
    </div>
    <div class="span8">
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

<?php
$province_ids=CController::createUrl('location/provinces');
$distritos=CController::createUrl('location/districts');
$nroruc=CController::createUrl('user/nroruc');
$documento=CController::createUrl('user/dni');
$email=CController::createUrl('user/email');
$username=CController::createUrl('user/username');
?>
<script>
    $('#registrar').click(function(){
	var error='';
	var username=$.ajax({
            url: '<?= $username ?>',
            type: 'POST',
            async: false,
            data: {ruc:$('#Headquarter_username').val()},
            success: function(data){
                
            }
        });
	
        if (username.responseText=='1') {
	    error=error+'Username';
            $('#Headquarter_username_em_duplicado').show();
        }
	else
	{
	    $('#Headquarter_username_em_duplicado').hide();
	}
	
	var nroruc=$.ajax({
            url: '<?= $nroruc ?>',
            type: 'POST',
            async: false,
            data: {ruc:$('#Headquarter_ruc').val()},
            success: function(data){
                
            }
        });
	
        if (nroruc.responseText=='1') {
	    error=error+'RUC';
            $('#Headquarter_ruc_em_duplicado').show();
        }
	else
	{
	    $('#Headquarter_ruc_em_duplicado').hide();
	}
	
	var nrodocumento=$.ajax({
            url: '<?= $documento ?>',
            type: 'POST',
            async: false,
            data: {documento:$('#Headquarter_document_number').val()},
            success: function(data){
                
            }
        });
	
        if (nrodocumento.responseText=='1') {
	    error=error+'dni';
            $('#Headquarter_document_number_em_duplicado').show();
        }
	else
	{
	    $('#Headquarter_document_number_em_duplicado').hide();
	}
	
	
	var correo=$.ajax({
            url: '<?= $email ?>',
            type: 'POST',
            async: false,
            data: {email:$('#Headquarter_email').val()},
            success: function(data){
                
            }
        });
	
        if (correo.responseText=='1') {
	    error=error+'email';
            $('#Headquarter_email_em_duplicado').show();
        }
	else
	{
	    $('#Headquarter_email_em_duplicado').hide();
	}
	
	
	
	if ($.trim($('#Headquarter_ruc').val())=='') {
	    error=error+'RUC';
	    $('#Headquarter_ruc_em_').show();
	}
	else
	{
	    $('#Headquarter_ruc_em_').hide();
	}
	
	if ($.trim($('#Headquarter_legal_name').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_legal_name_em_').show();
	}
	else
	{
	    $('#Headquarter_legal_name_em_').hide();
	}
	
	if ($.trim($('#Headquarter_department_id').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_department_id_em_').show();
	}
	else
	{
	    $('#Headquarter_department_id_em_').hide();
	}
	
	if ($.trim($('#Headquarter_province_id').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_province_id_em_').show();
	}
	else
	{
	    $('#Headquarter_province_id_em_').hide();
	}
	
	if ($.trim($('#Headquarter_district_id').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_district_id_em_').show();
	}
	else
	{
	    $('#Headquarter_district_id_em_').hide();
	}
	
	if ($.trim($('#Headquarter_address').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_address_em_').show();
	}
	else
	{
	    $('#Headquarter_address_em_').hide();
	}
	
	if ($.trim($('#Headquarter_tipo_empresa').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_tipo_empresa_em_').show();
	}
	else
	{
	    $('#Headquarter_tipo_empresa_em_').hide();
	}
	
	if ($.trim($('#Headquarter_document_number').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_document_number_em_').show();
	}
	else
	{
	    $('#Headquarter_document_number_em_').hide();
	}
	
	if ($.trim($('#Headquarter_first_name').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_first_name_em_').show();
	}
	else
	{
	    $('#Headquarter_first_name_em_').hide();
	}
	
	if ($.trim($('#Headquarter_last_name').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_last_name_em_').show();
	}
	else
	{
	    $('#Headquarter_last_name_em_').hide();
	}
	
	if ($.trim($('#Headquarter_username').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_username_em_').show();
	}
	else
	{
	    $('#Headquarter_username_em_').hide();
	}
	
	if ($.trim($('#Headquarter_email').val())=='') {
	    error=error+'Leganl name';
	    $('#Headquarter_email_em_').show();
	}
	else
	{
	    $('#Headquarter_email_em_').hide();
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
	$.get( "<?= $province_ids ?>?departamento="+valor, function( data ) {$( "#Headquarter_province_id" ).html( data );});
        $("#Headquarter_province_id").find("option").remove().end().append("<option value></option>").val("");
        $("#Headquarter_district_id").find("option").remove().end().append("<option value></option>").val("");
    }
    
    function Distritos(valor) {
	$.get( "<?= $distritos ?>?provincia="+valor, function( data ) {$( "#Headquarter_district_id" ).html( data );});
        //$("#Headquarter_district_id").find("option").remove().end().append("<option value></option>").val("");
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