<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
?>
<div class="form well span12" style="background: #FFFFFF">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
    <?php echo CHtml::hiddenField('formu',$model->form_id); ?>
    <div class="row-fluid">
	<div id="error" style="color: red"></div>
    </div>
    <div class="row-fluid">
	<div class="span12" >			
	    <table width="744" height="344" border="1px">
		<tr>
		    <td colspan="7">PLAGAS TUBERCULOS(De una muestra de 20 tubérculos envase, tomado en 5 envases diferentes de un lote de 100 envases.
		    Total de tubérculos muestreados lote = 100)</td>
		</tr>
		<tr>
		    <td width="223" rowspan="2">Plagas</td>
		    <td width="125" rowspan="2">Factor Importancia</td>
		    <td width="26" rowspan="2">Por</td>
		    <td height="29" colspan="2">Evaluación</td>
		</tr>
		<tr>
		    <td width="123" height="28">%PI. Afectadas</td>
		    <td width="58">Puntos</td>
		</tr>
		<tr>
		    <td>Pobredumbre blanda (Erwinia caratova)</td>
		    <td>10</td>
		    <td>X</td>
		    <td>
			<label for="Acondicionamiento_afectadas_erwinia">Afectadas Erwinia</label>
			<input class="papa span12" name="Acondicionamiento[afectadas_erwinia]" id="Acondicionamiento_afectadas_erwinia" type="text" maxlength="18">
			<?php //echo $form->textFieldRow($model,'afectadas_erwinia',array('class'=>'papa span12')); ?>
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td>Pobredumbre seca (Fusarium solari)</td>
		    <td>7</td>
		    <td>X</td>
		    <td>
			<label for="Acondicionamiento_afectadas_fusarium">Afectadas Fusarium</label>
			<input class="papa span12" name="Acondicionamiento[afectadas_fusarium]" id="Acondicionamiento_afectadas_fusarium" type="text" maxlength="18">
			<?php //echo $form->textFieldRow($model,'afectadas_fusarium',array('class'=>'papa span12')); ?>
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td>Rhizoctoniasis (Rhizoctonia solari) y Roña (Spongospora Subterranea)</td>
		    <td>4</td>
		    <td>X</td>
		    <td>
			<label for="Acondicionamiento_afectadas_rhizoctoniasis">Afectadas Rhizoctoniasis</label>
			<input class="papa span12" name="Acondicionamiento[afectadas_rhizoctoniasis]" id="Acondicionamiento_afectadas_rhizoctoniasis" type="text" maxlength="18">
			<?php //echo $form->textFieldRow($model,'afectadas_rhizoctoniasis',array('class'=>'papa span12')); ?>
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td>Mezcla varietal</td>
		    <td>1</td>
		    <td>X</td>
		    <td>
			<label for="Acondicionamiento_afectadas_mezcla_varietal">Afectadas Mezcla Varietal</label>
			<input class="papa span12" name="Acondicionamiento[afectadas_mezcla_varietal]" id="Acondicionamiento_afectadas_mezcla_varietal" type="text" maxlength="18">
			<?php //echo $form->textFieldRow($model,'afectadas_mezcla_varietal',array('class'=>'papa span12')); ?>
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td>Fuera de tamaño , rajaduras , daño , pelado y deforme</td>
		    <td>3</td>
		    <td>X</td>
		    <td>
			<label for="Acondicionamiento_afectadas_fuera_tamano">Afectadas Fuera Tamano</label>
			<input class="papa span12" name="Acondicionamiento[afectadas_fuera_tamano]" id="Acondicionamiento_afectadas_fuera_tamano" type="text" maxlength="18">
			<?php //echo $form->textFieldRow($model,'afectadas_fuera_tamano',array('class'=>'papa span12')); ?>
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td height="29" colspan="3">&nbsp;</td>
		    <td>Total</td>
		    <td>&nbsp;</td>
		</tr>
	    </table>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Puntaje Máximo de Tolerancia</h4></div>      
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <b><u>Categoria de semilla</u></b><br>
	    Certificada o Autorizada<br>
	    Registrada<br>
	    Básica
	</div>
	<div class="span8">
	    <b><u>Puntaje Límite(1ra Insp.)</u></b><br>
	    60<br>
	    50<br>
	    40
	</div>				
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Observaciones</h4></div>      
    </div> 
    <div class="row-fluid">
	<div class="span12">
	    <label for="Acondicionamiento_observacion">Observacion</label>
	    <textarea class="span12" maxlength="300" rows="6" name="Acondicionamiento[observacion]" id="Acondicionamiento_observacion"></textarea>
	    <?php //echo $form->textAreaRow($model,'observacion',array('class'=>'span12','maxlength'=>300,'rows'=>6)); ?>
	</div>		
    </div>
    <div class="row-fluid">
	<div class="span12">
	    <div class="form-actions">
		<div class="span4">
		<!--Aprobado-->
		    <input name="Acondicionamiento[y01]" id="hidden" type="hidden">
		    <button id="btn_apro" class="btn btn-success span12">Cumple</button>
		<!--Fin de Aprobado-->	
		</div>
		<div class="span4">
		<!--Condicional-->
		    <button id="btn_condi"  class="btn btn-primary span12" data-toggle="modal">condicional</button>
		<!--Fin de Condicional-->
		</div>
		<!--Boton de No cumples-->
		<div class="span4">
		    <button id="btn_recha"  class="btn btn-danger span12" >No cumple</button>
		</div>
	    </div>
	</div>
    </div>
    <!--Botones-->
    <!--Boton Condicional-->	
    <div id="myModal_acond_conda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h4 id="myModalLabel">Fecha sugerida de Subsanación</h4>
	</div>
	<div class="modal-body">
	    <p>
		<label for="Acondicionamiento_subsanacion_date">Subsanación Fecha</label>
		<input type="date" name="Acondicionamiento[subsanacion_date]" id="Acondicionamiento_subsanacion_date">
	    </p>
	</div>
	<div class="modal-footer">
	    <button id="btn_enviar_condicional" class="btn btn-primary">Enviar</button>			
	</div>
    </div>
   
<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    $('.papa').on('blur', function(){
	$('#Acondicionamiento_afectadas_erwinia').val(numeral($('#Acondicionamiento_afectadas_erwinia').val()).format('0,0.00'));
	$('#Acondicionamiento_afectadas_fusarium').val(numeral($('#Acondicionamiento_afectadas_fusarium').val()).format('0,0.00'));
	$('#Acondicionamiento_afectadas_rhizoctoniasis').val(numeral($('#Acondicionamiento_afectadas_rhizoctoniasis').val()).format('0,0.00'));
	$('#Acondicionamiento_afectadas_mezcla_varietal').val(numeral($('#Acondicionamiento_afectadas_mezcla_varietal').val()).format('0,0.00'));
	$('#Acondicionamiento_afectadas_fuera_tamano').val(numeral($('#Acondicionamiento_afectadas_fuera_tamano').val()).format('0,0.00'));
    });
    
    
    $('#btn_apro').on('click', function(){
	var error='';
	if ($('#Acondicionamiento_afectadas_erwinia').val()=='') {
	    error=error+'Debe ingresar el % de Afectadas Erwinia<br>';
	}
	if ($('#Acondicionamiento_afectadas_fusarium').val()=='') {
		error=error+'Debe ingresar el % Afectadas Fusarium<br>';
	    }
	if ($('#Acondicionamiento_afectadas_rhizoctoniasis').val()=='') {
	    error=error+'Debe ingresar el % Afectadas Rhizoctoniasis<br>';
	}
	if ($('#Acondicionamiento_afectadas_mezcla_varietal').val()=='') {
	    error=error+'Debe ingresar el % Afectadas Mezcla Varietal<br>';
	}
	if ($('#Acondicionamiento_afectadas_fuera_tamano').val()=='') {
	    error=error+'Debe ingresar el % Afectadas Fuera Tamano<br>';
	}
	if ($('#Acondicionamiento_observacion').val()=='') {
	    error=error+'Debe ingresar la observación<br>';
	}
	if (error!='') {
	    $('#error').html(error);
	    return false;
	}
	$('#error').html('');
	var txt;
	var r = confirm("¿Estas seguro de que cumple con el acondicionamiento?");
	if (r == true) {
	    $('#hidden').val(1);
	    return true;
	} else {
	    return false;
	}
    });
    
    $('#btn_condi').on('click', function(){
	var error='';
	if ($('#Acondicionamiento_afectadas_erwinia').val()=='') {
	    error=error+'Debe ingresar el % de Afectadas Erwinia<br>';
	}
	if ($('#Acondicionamiento_afectadas_fusarium').val()=='') {
		error=error+'Debe ingresar el % Afectadas Fusarium<br>';
	    }
	if ($('#Acondicionamiento_afectadas_rhizoctoniasis').val()=='') {
	    error=error+'Debe ingresar el % Afectadas Rhizoctoniasis<br>';
	}
	if ($('#Acondicionamiento_afectadas_mezcla_varietal').val()=='') {
	    error=error+'Debe ingresar el % Afectadas Mezcla Varietal<br>';
	}
	if ($('#Acondicionamiento_afectadas_fuera_tamano').val()=='') {
	    error=error+'Debe ingresar el % Afectadas Fuera Tamano<br>';
	}
	if ($('#Acondicionamiento_observacion').val()=='') {
	    error=error+'Debe ingresar la observación<br>';
	}
	if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	$('#error').html('');
	$('#myModal_acond_conda').modal('show');
	return true;
    });
    
    
    $('#btn_recha').on('click', function(){
	var error='';
	if ($('#Acondicionamiento_afectadas_erwinia').val()=='') {
	    error=error+'Debe ingresar el % de Afectadas Erwinia<br>';
	}
	if ($('#Acondicionamiento_afectadas_fusarium').val()=='') {
		error=error+'Debe ingresar el % Afectadas Fusarium<br>';
	    }
	if ($('#Acondicionamiento_afectadas_rhizoctoniasis').val()=='') {
	    error=error+'Debe ingresar el % Afectadas Rhizoctoniasis<br>';
	}
	if ($('#Acondicionamiento_afectadas_mezcla_varietal').val()=='') {
	    error=error+'Debe ingresar el % Afectadas Mezcla Varietal<br>';
	}
	if ($('#Acondicionamiento_afectadas_fuera_tamano').val()=='') {
	    error=error+'Debe ingresar el % Afectadas Fuera Tamano<br>';
	}
	if ($('#Acondicionamiento_observacion').val()=='') {
	    error=error+'Debe ingresar la observación<br>';
	}
	if (error!='') {
	    $('#error').html(error);
	    return false;
	}
	$('#error').html('');
	var txt;
	var r = confirm("¿Estas seguro de que el informe no cumple?");
	if (r == true) {
	    $('#hidden').val(3);
	    return true;
	} else {
	    return false;
	}
    });
    
    
    $('#btn_enviar_condicional').click(function(){
	var error='';
	if ($('#Acondicionamiento_subsanacion_date').val()=='') {
	    error=error+'Debe ingresar la fecha de subsanación\n';
	}
	if (error!='') {
	    alert(error);
	    return false;
	}
	
	
	var txt;
	var r = confirm("¿Estas seguro de enviar la fecha de subsanación?");
	if (r == true) {
	    $('#hidden').val(2);
	    return true;
	} else {
	    return false;
	}
    });
</script>