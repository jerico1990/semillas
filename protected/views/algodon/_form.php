<?php
$forma=Iform::model()->find('id=:form_id',array(':form_id'=>$model->form_id));
$user=User::model()->find('id=:id',array(':id'=>$model->user_id));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$forma->location_id));
?>
<div class="form well span12" style="background: #FFFFFF">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm');  ?>
    <div class="row-fluid">
	<div class="span12" id="error" style="color: red"></div>      
    </div> 	
    <div class="row-fluid">
	<div class="span12"><h4>Campo de Multiplicación</h4></div>      
    </div> 
    <div class="row-fluid">
	<div class="span3">
	    <label for="Inspection_size">Area(m2)</label>
	    <input class="algodon span12" name="Inspection[size]" id="Inspection_size" type="text" maxlength="18">
	</div>
	<div class="span9">
	    <label for="Inspection_alg_fecha_siembra">Fecha Siembra</label>
	    <input class="algodon_fecha span10" type="text" autocomplete="off" name="Inspection[alg_fecha_siembra]" id="Inspection_alg_fecha_siembra">		     		        				     
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Etapa/Estado fenológico del cultivo</h4></div>      
    </div> 
    <div class="row-fluid">						 
	<div class="span4">
	    <label for="Inspection_alg_deshije">Fecha de Deshije</label>
	    <input class="algodon_fecha span10" type="text" autocomplete="off" name="Inspection[alg_deshije]" id="Inspection_alg_deshije">
	</div>
	<div class="span4">
	    <label for="Inspection_alg_floracion">Floracion (%)</label>
	    <input size="18" maxlength="18" class="algodon span12" name="Inspection[alg_floracion]" id="Inspection_alg_floracion" type="text">
	</div>
	<div class="span4">
	    <label for="Inspection_alg_bellotas">Bellotas Abiertas(%)</label>
	    <input size="18" maxlength="18" class="algodon span12" name="Inspection[alg_bellotas]" id="Inspection_alg_bellotas" type="text">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Distanciamiento</h4></div>
    </div> 
    <div class="row-fluid">
	<div class="row-fluid">
	    <div class="span3">
		<label for="Inspection_alg_surcos">Surcos (m)</label>
		<input size="18" maxlength="18" class="algodon span9" name="Inspection[alg_surcos]" id="Inspection_alg_surcos" type="text">
	    </div>
	    <div class="span9">
		<label for="Inspection_alg_mata">Mata (m)</label>
		<input size="18" maxlength="18" class="algodon span3" name="Inspection[alg_mata]" id="Inspection_alg_mata" type="text">
	    </div>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Aislamiento</h4></div>
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <label for="Inspection_alg_campo_comercial">Campo Comercial (m)</label>
	    <input size="18" maxlength="18" class="algodon span12" name="Inspection[alg_campo_comercial]" id="Inspection_alg_campo_comercial" type="text">
	</div>
	<div class="span4">
	    <label for="Inspection_alg_otra_especie">Otra Especie / Híbrido (m)</label>
	    <input size="18" maxlength="18" class="algodon span12" name="Inspection[alg_otra_especie]" id="Inspection_alg_otra_especie" type="text">
	</div>
	<div class="span4">
	    <label for="Inspection_alg_otra_cultivar">Otra Cultivar (m)</label>
	    <input size="18" maxlength="18" class="algodon span12" name="Inspection[alg_otra_cultivar]" id="Inspection_alg_otra_cultivar" type="text">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Plantas</h4></div>
    </div>
    <div class="row-fluid">
	<div class="span6">
	    <label for="Inspection_alg_plantas_otra_especie">Otra Especie</label>
	    <textarea size="60" maxlength="300" class="algodon span12" rows="8" name="Inspection[alg_plantas_otra_especie]" id="Inspection_alg_plantas_otra_especie"></textarea>
	</div>
	<div class="span6">
	    <label for="Inspection_alg_plantas_fuera_tipo">Fuera de Tipo</label>
	    <textarea size="60" maxlength="300" class="algodon span12" rows="8" name="Inspection[alg_plantas_fuera_tipo]" id="Inspection_alg_plantas_fuera_tipo"></textarea>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Datos</h4></div>
    </div>
    <div class="row-fluid">
	<div class="span12"><label for="Inspection_alg_malvacearum">Alg Malvacearum</label><input size="18" maxlength="18" class="algodon span2" name="Inspection[alg_malvacearum]" id="Inspection_alg_malvacearum" type="text"></div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Resultados</h4></div>      
    </div>
    <div class="row-fluid">
	<div class="span12"><label for="Inspection_observaciones"> </label><textarea size="60" maxlength="300" class="algodon span12" rows="8" name="Inspection[observaciones]" id="Inspection_observaciones"></textarea></div>
    </div>
    <div class="row-fluid">
	<div class="span12">
	    <div class="form-actions">
		<div class="span4">
		<!--Aprobado-->
		    <button id="btn_apro" class="btn btn-success span12" data-toggle="modal">Cumple</button>
		    <input name="Inspection[y01]" id="hidden" type="hidden">
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
    <!--Aprobado-->
    <div id="myModal_acond_apro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >	
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h4 id="myModalLabel">Pasar a Inspeccion de Acondicionamiento</h4>
	</div>
	<div class="modal-body">
	    <p>
		<div class="form">
		    <div class="row-fluid">
			<div class="span5">Continuar con la Inspección de</div>
			<div class="span7">
			    <select class="validar" name="Inspection[select_id]" id="Inspection_select_id">
				<option value>Seleccionar</option>
				<option value="1">Acondicionamiento</option>
				<option value="2">Campo</option>
			    </select>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span5">Fecha propuesta</div>
			<div class="span7">
			    <input type="date" name="Inspection[aprobado_fecha_propuesta]" id="Inspection_aprobado_fecha_propuesta">
			</div>
		    </div>
		</div><!-- form -->
	    </p>
	</div>
	<div class="modal-footer">
	    <button id="btn_enviar_aprobado" class="btn btn-primary">Enviar</button>
	</div>
    </div>
    <!--Boton Condicional-->	
    <div id="myModal_acond_conda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h4 id="myModalLabel">Fecha sugerida de Subsanación</h4>
	</div>
	<div class="modal-body">
	    <p>
		<label for="Inspection_subsanacion_date">Subsanación Fecha</label>
		<input type="date" name="Inspection[subsanacion_date]" id="Inspection_subsanacion_date">
	    </p>
	</div>
	<div class="modal-footer">
	    <button id="btn_enviar_condicional" class="btn btn-primary">Enviar</button>			
	</div>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php
    $cumple=CController::createUrl('inspection/rechazado');
    $condicional=CController::createUrl('inspection/condicional');
    $no_cumple=CController::createUrl('inspection/rechazado');
?>
<script>
    //Fecha Formato
    $('.algodon_fecha').datepicker({format: 'dd-mm-yyyy'})
    
    $('.algodon').on('blur', function(){
	    $('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
	    $('#Inspection_alg_surcos').val(numeral($('#Inspection_alg_surcos').val()).format('0,0.00'));
	    $('#Inspection_alg_mata').val(numeral($('#Inspection_alg_mata').val()).format('0,0.00'));
	    $('#Inspection_alg_campo_comercial').val(numeral($('#Inspection_alg_campo_comercial').val()).format('0,0.00'));
	    $('#Inspection_alg_otra_especie').val(numeral($('#Inspection_alg_otra_especie').val()).format('0,0.00'));
	    $('#Inspection_alg_otra_cultivar').val(numeral($('#Inspection_alg_otra_cultivar').val()).format('0,0.00'));
	    $('#Inspection_alg_floracion').val(numeral($('#Inspection_alg_floracion').val()).format('0,0.00'));
	    $('#Inspection_alg_bellotas').val(numeral($('#Inspection_alg_bellotas').val()).format('0,0.00'));
    });
    
    $('#btn_apro').on('click', function(){
	var error='';
	if ($('#Inspection_size').val()=='') {
	    error=error+'Debe ingresar el Area(m2)<br>';
	}
	if ($('#Inspection_alg_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha Siembra<br>';
	    }
	if ($('#Inspection_alg_deshije').val()=='') {
	    error=error+'Debe ingresar la Fecha de Deshije<br>';
	}
	if ($('#Inspection_alg_floracion').val()=='') {
	    error=error+'Debe ingresar Floracion (%)<br>';
	}
	if ($('#Inspection_alg_bellotas').val()=='') {
	    error=error+'Debe ingresar Bellotas Abiertas(%)<br>';
	}
	if ($('#Inspection_alg_surcos').val()=='') {
	    error=error+'Debe ingresar Surcos (m)<br>';
	}
	if ($('#Inspection_alg_mata').val()=='') {
	    error=error+'Debe ingresar Mata (m)<br>';
	}
	if ($('#Inspection_alg_campo_comercial').val()=='') {
	    error=error+'Debe ingresar el Campo Comercial (m)<br>';
	}
	if ($('#Inspection_alg_otra_especie').val()=='') {
	    error=error+'Debe ingresar Otra Especie / Híbrido (m)<br>';
	}
	if ($('#Inspection_alg_otra_cultivar').val()=='') {
	    error=error+'Debe ingresar Otra Cultivar (m)<br>';
	}
	if ($('#Inspection_alg_plantas_otra_especie').val()=='') {
	    error=error+'Debe ingresar Otra Especie<br>';
	}
	if ($('#Inspection_alg_plantas_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar Fuera de Tipo<br>';
	}
	if ($('#Inspection_alg_malvacearum').val()=='') {
	    error=error+'Debe ingresar Algodón Malvacearum<br>';
	}
	if ($('#Inspection_observaciones').val()=='') {
	    error=error+'Debe ingresar el resultado<br>';
	}
	if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	$('#myModal_acond_apro').modal('show');
	return true;
    });
    
    $('#btn_condi').on('click', function(){
	var error='';
	if ($('#Inspection_size').val()=='') {
	    error=error+'Debe ingresar el Area(m2)<br>';
	}
	if ($('#Inspection_alg_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha Siembra<br>';
	    }
	if ($('#Inspection_alg_deshije').val()=='') {
	    error=error+'Debe ingresar la Fecha de Deshije<br>';
	}
	if ($('#Inspection_alg_floracion').val()=='') {
	    error=error+'Debe ingresar Floracion (%)<br>';
	}
	if ($('#Inspection_alg_bellotas').val()=='') {
	    error=error+'Debe ingresar Bellotas Abiertas(%)<br>';
	}
	if ($('#Inspection_alg_surcos').val()=='') {
	    error=error+'Debe ingresar Surcos (m)<br>';
	}
	if ($('#Inspection_alg_mata').val()=='') {
	    error=error+'Debe ingresar Mata (m)<br>';
	}
	if ($('#Inspection_alg_campo_comercial').val()=='') {
	    error=error+'Debe ingresar el Campo Comercial (m)<br>';
	}
	if ($('#Inspection_alg_otra_especie').val()=='') {
	    error=error+'Debe ingresar Otra Especie / Híbrido (m)<br>';
	}
	if ($('#Inspection_alg_otra_cultivar').val()=='') {
	    error=error+'Debe ingresar Otra Cultivar (m)<br>';
	}
	if ($('#Inspection_alg_plantas_otra_especie').val()=='') {
	    error=error+'Debe ingresar Otra Especie<br>';
	}
	if ($('#Inspection_alg_plantas_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar Fuera de Tipo<br>';
	}
	if ($('#Inspection_alg_malvacearum').val()=='') {
	    error=error+'Debe ingresar Algodón Malvacearum<br>';
	}
	if ($('#Inspection_observaciones').val()=='') {
	    error=error+'Debe ingresar el resultado<br>';
	}
	if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	$('#myModal_acond_conda').modal('show');
	return true;
    });
    
    
    $('#btn_recha').on('click', function(){
	var error='';
	if ($('#Inspection_size').val()=='') {
	    error=error+'Debe ingresar el Area(m2)<br>';
	}
	if ($('#Inspection_alg_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha Siembra<br>';
	    }
	if ($('#Inspection_alg_deshije').val()=='') {
	    error=error+'Debe ingresar la Fecha de Deshije<br>';
	}
	if ($('#Inspection_alg_floracion').val()=='') {
	    error=error+'Debe ingresar Floracion (%)<br>';
	}
	if ($('#Inspection_alg_bellotas').val()=='') {
	    error=error+'Debe ingresar Bellotas Abiertas(%)<br>';
	}
	if ($('#Inspection_alg_surcos').val()=='') {
	    error=error+'Debe ingresar Surcos (m)<br>';
	}
	if ($('#Inspection_alg_mata').val()=='') {
	    error=error+'Debe ingresar Mata (m)<br>';
	}
	if ($('#Inspection_alg_campo_comercial').val()=='') {
	    error=error+'Debe ingresar el Campo Comercial (m)<br>';
	}
	if ($('#Inspection_alg_otra_especie').val()=='') {
	    error=error+'Debe ingresar Otra Especie / Híbrido (m)<br>';
	}
	if ($('#Inspection_alg_otra_cultivar').val()=='') {
	    error=error+'Debe ingresar Otra Cultivar (m)<br>';
	}
	if ($('#Inspection_alg_plantas_otra_especie').val()=='') {
	    error=error+'Debe ingresar Otra Especie<br>';
	}
	if ($('#Inspection_alg_plantas_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar Fuera de Tipo<br>';
	}
	if ($('#Inspection_alg_malvacearum').val()=='') {
	    error=error+'Debe ingresar Algodón Malvacearum<br>';
	}
	if ($('#Inspection_observaciones').val()=='') {
	    error=error+'Debe ingresar el resultado<br>';
	}
	if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	
	var txt;
	var r = confirm("¿Estas seguro de que el informe no cumple?");
	if (r == true) {
	    $('#hidden').val(3);
	    return true;
	} else {
	    return false;
	}
    });
    
    $('#btn_enviar_aprobado').click(function(){
	var error='';
	if ($('#Inspection_aprobado_fecha_propuesta').val()=='') {
	    error=error+'Debe ingresar la fecha propuesta\n';
	}
	if (error!='') {
	    alert(error);
	    return false;
	}
	
	
	var txt;
	var r = confirm("¿Estas seguro de enviar la fecha sugerida?");
	if (r == true) {
	    $('#hidden').val(1);
	    return true;
	} else {
	    return false;
	}
    });
    
    $('#btn_enviar_condicional').click(function(){
	var error='';
	if ($('#Inspection_subsanacion_date').val()=='') {
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


