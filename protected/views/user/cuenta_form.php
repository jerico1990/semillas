<script src="//code.jquery.com/jquery-1.8.2.js"></script>
<script src="//code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
<?php
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->district_id));
if($model->registry!==null && $model->registry!=="")
{
    $producer=Producer::model()->find('registry=:registry',array(':registry'=>$model->registry));
}
$estados=Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'010'));
?>
<!--Validar Productor-->
<div class="row-fluid">
    <div class="span12">
	<div class="row-fluid">
	    <div class="span6 well">
		<!--Productor-->
		<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'user-form',)); ?>		
		    <div class="row-fluid">
			<div class="span12">
			    <?php echo $form->textFieldRow($model,'legal_name',array('size'=>60,'maxlength'=>120,'disabled'=>true ,'class'=>'span12')); ?>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span12">
			    <label for="User_ruc">RUC</label>
			    <input size="11" maxlength="11" class="span12 numerico" name="User[ruc]" id="User_ruc" type="text" value="<?= $model->ruc ?>">
			    <div class="help-block error" id="User_var_ruc_em_" style="display: none">RUC no es correcto.</div>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span12">
			    <?php echo $form->textFieldRow($model,'registry',array('size'=>30,'maxlength'=>30,'disabled'=>true,'class'=>'span12')); ?>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span12">
			    <label for="User_email">Correo Electrónico</label>
			    <input size="30" maxlength="30" class="span12" name="User[email]" id="User_email" type="text" value="<?= $model->email ?>">
			    <div class="help-block error" id="User_var_email_em_" style="display: none">Correo Electrónico no es correcto.</div>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span12">
			    <?php echo $form->textFieldRow($model,'department_id',array('value'=>$location->department,'disabled'=>true,'class'=>'span12')); ?>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span12">
			    <?php echo $form->textFieldRow($model,'province_id',array('value'=>$location->province,'disabled'=>true,'class'=>'span12')); ?>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span12">
			    <?php echo $form->textFieldRow($model,'district_id',array('value'=>$location->district,'disabled'=>true,'class'=>'span12')); ?>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span12">
			    <label for="User_address">Dirección (Según Solicitud de R.P.S.)</label>
			    <input size="30" maxlength="100" class="span12" name="User[address]" id="User_address" type="text" value="<?= $model->address ?>">
			    <div class="help-block error" id="User_var_address_em_" style="display: none">Dirección (Según Solicitud de R.P.S.) no es correcto.</div>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span12">
			    <label for="User_status">Estado</label>
			    <select name="User[status]" id="User_status">
				<option value>seleccionar</option>
				<?php foreach($estados as $estado){ ?>
				    <option value=<?= $estado->codigo_detalle ?> <?= ($estado->codigo_detalle==$model->status)?'selected':''; ?>><?= $estado->descripcion ?></option>
				<?php }?>
			    </select>
			</div>					</div>
		    <div class="row-fluid">
			<div class="span12">
			    <input type="submit" class="btn btn-success" id="registrar" value="Enviar">
			</div>
		    </div>				
		<?php $this->endWidget(); ?>
	    </div>
	    <?php if($model->registry!==null && $model->registry!==""){  ?>
	    <div class="span6 well">
		<div class="row-fluid">
		    <div class="span12">
			<?php echo $form->textFieldRow($producer,'name',array('disabled'=>true ,'class'=>'span12')); ?>
		    </div>
		</div>
		<div class="row-fluid">
		    <div class="span12">
			<?php echo $form->textFieldRow($producer,'document_number',array('disabled'=>true ,'class'=>'span12')); ?>
		    </div>
		</div>
		<div class="row-fluid">
		    <div class="span12">
			<?php echo $form->textFieldRow($producer,'registry',array('disabled'=>true ,'class'=>'span12')); ?>
		    </div>
		</div>
		<div class="row-fluid">
		    <div class="span12">
			<?php echo $form->textFieldRow($producer,'address',array('disabled'=>true ,'class'=>'span12')); ?>
		    </div>
		</div>
	    </div>
	    <?php } ?>
	</div>
    </div>	
</div>
<script>
    $('#registrar').click(function(){
        var error='';
	if ($.trim($('#User_ruc').val())=='') {
	    error=error+'Razon Social';
	    $('#User_var_ruc_em_').show();
	}
	else
	{
	    $('#User_var_ruc_em_').hide();
	}
	
	if ($.trim($('#User_address').val())=='') {
	    error=error+'Razon Social';
	    $('#User_var_address_em_').show();
	}
	else
	{
	    $('#User_var_address_em_').hide();
	}
	
	if ($.trim($('#User_email').val())=='') {
	    error=error+'Razon Social';
	    $('#User_var_email_em_').show();
	}
	else
	{
	    $('#User_var_email_em_').hide();
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
</script>
