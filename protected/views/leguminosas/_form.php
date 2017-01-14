<div class="form well span12" style="background: #FFFFFF">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
<div class="row-fluid">
    <div class="span12"><h4>Campo de Multiplicación</h4></div>      
</div>
<div class="row-fluid">		  
    <div class="span3"><label for="Inspection_size">Area(m2)</label><input class="leguminosas span12" name="Inspection[size]" id="Inspection_size" type="text" maxlength="18"></div>
    <div class="span9"><label for="Inspection_leg_fecha_siembra">Fecha de Siembra</label><input class="leguminosas_fecha span10" type="text" autocomplete="off" name="Inspection[leg_fecha_siembra]" id="Inspection_leg_fecha_siembra"></div>
</div>
<div class="row-fluid">
    <div class="span12"><h4>Etapa / Estado fenológico de cultivo</h4></div>      
</div> 
<div class="row-fluid">
    <div class="span4"><label for="Inspection_leg_emergencia_fecha">Fecha de Emergencia</label><input class="leguminosas_fecha span10" type="text" autocomplete="off" name="Inspection[leg_emergencia_fecha]" id="Inspection_leg_emergencia_fecha"></div>
    <div class="span8">
	<div class="row-fluid">
	    <div class="span6"><label for="Inspection_leg_floracion">Floración (%)</label><input class="leguminosas span12" name="Inspection[leg_floracion]" id="Inspection_leg_floracion" type="text" maxlength="18"></div>				
	    <div class="span6"><label for="Inspection_leg_floracion_fecha"></label><input class="leguminosas_fecha span10" type="text" autocomplete="off" name="Inspection[leg_floracion_fecha]" id="Inspection_leg_floracion_fecha"></div>
	</div>
    </div>
</div>
<div class="row-fluid">
    <div class="span4"><label for="Inspection_leg_llenado_grano">Llenado de Grano (%)</label><input class="leguminosas span12" name="Inspection[leg_llenado_grano]" id="Inspection_leg_llenado_grano" type="text" maxlength="18"></div>
    <div class="span8"><label for="Inspection_leg_fecha_cosecha">Fecha de Cosecha</label><input class="leguminosas_fecha span10" type="text" autocomplete="off" name="Inspection[leg_fecha_cosecha]" id="Inspection_leg_fecha_cosecha"></div>
</div>
<div class="row-fluid">
    <div class="span12"><h4>Distanciamiento</h4></div>      
</div> 
<div class="row-fluid">
    <div class="span6"><label for="Inspection_leg_distanciamiento_surcos">Surcos (m)</label><input size="18" maxlength="18" class="leguminosas span12" name="Inspection[leg_distanciamiento_surcos]" id="Inspection_leg_distanciamiento_surcos" type="text"></div>
    <div class="span6"><label for="Inspection_leg_mata">Mata (m)</label><input size="18" maxlength="18" class="leguminosas span12" name="Inspection[leg_mata]" id="Inspection_leg_mata" type="text"></div>
</div>
<div class="row-fluid">
    <div class="span12"><h4>Aislamiento</h4></div>      
</div> 
<div class="row-fluid">
    <div class="span4"><label for="Inspection_leg_campo_comercial">Campo Comercial (m)</label><input size="18" maxlength="18" class="leguminosas span12" name="Inspection[leg_campo_comercial]" id="Inspection_leg_campo_comercial" type="text"></div>
    <div class="span4"><label for="Inspection_leg_otra_especie">Otra Especie (m)</label><input size="18" maxlength="18" class="leguminosas span12" name="Inspection[leg_otra_especie]" id="Inspection_leg_otra_especie" type="text"></div>
    <div class="span4"><label for="Inspection_leg_otro_cultivar">Otro Cultivar (m)</label><input size="18" maxlength="18" class="leguminosas span12" name="Inspection[leg_otro_cultivar]" id="Inspection_leg_otro_cultivar" type="text"></div>
</div>
<div class="row-fluid">
    <div class="span12"><h4>Presencias</h4></div>      
</div>
<div class="row-fluid">
    <div class="span6"><label for="Inspection_leg_presencia_maleza">De malezas</label><textarea size="18" maxlength="18" class="leguminosas span12" rows="6" name="Inspection[leg_presencia_maleza]" id="Inspection_leg_presencia_maleza"></textarea></div>
    <div class="span6"><label for="Inspection_leg_presencia_plagas">De plagas</label><textarea size="18" maxlength="18" class="leguminosas span12" rows="6" name="Inspection[leg_presencia_plagas]" id="Inspection_leg_presencia_plagas"></textarea></div>
</div>
<div class="row-fluid">
    <div class="span12"><h4>Plantas</h4></div>      
</div> 	
<div class="row-fluid">
    <div class="span6"><label for="Inspection_leg_plantas_otras_especies">Otras Especies</label><textarea size="18" maxlength="18" class="leguminosas span12" rows="6" name="Inspection[leg_plantas_otras_especies]" id="Inspection_leg_plantas_otras_especies"></textarea></div>
    <div class="span6"><label for="Inspection_leg_plantas_fuera_tipo">Fuera de Tipo</label><textarea size="18" maxlength="18" class="leguminosas span12" rows="6" name="Inspection[leg_plantas_fuera_tipo]" id="Inspection_leg_plantas_fuera_tipo"></textarea></div>
</div>
<div class="row-fluid">
    <div class="span12"><h4>Datos</h4></div>      
</div> 	
<div class="row-fluid">
    <div class="span3"><label for="Inspection_leg_mosaicos">Mosaicos causados</label><input size="18" maxlength="18" class="leguminosas span12" rows="6" name="Inspection[leg_mosaicos]" id="Inspection_leg_mosaicos" type="text"></div>
    <div class="span4"><label for="Inspection_leg_moteado">Moteado causado por virus</label><input size="18" maxlength="18" class="leguminosas span12" rows="6" name="Inspection[leg_moteado]" id="Inspection_leg_moteado" type="text"></div>
    <div class="span2"><label for="Inspection_leg_bacteriosis">Bacteriosis</label><input size="18" maxlength="18" class="leguminosas span12" rows="6" name="Inspection[leg_bacteriosis]" id="Inspection_leg_bacteriosis" type="text"></div>
    <div class="span3"><label for="Inspection_leg_mancha_angular">Mancha angular</label><input size="18" maxlength="18" class="leguminosas span12" rows="6" name="Inspection[leg_mancha_angular]" id="Inspection_leg_mancha_angular" type="text"></div>
</div>
<div class="row-fluid">
    <div class="span12"><h4>Observación</h4></div>      
</div> 	
<div class="row-fluid">
    <div class="span12"><label for="Inspection_observaciones"> </label><textarea size="60" maxlength="300" class="cereales span12" rows="6" name="Inspection[observaciones]" id="Inspection_observaciones"></textarea></div>
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
    <!--Boton Rechazado-->
    <!--
    <div id="myModal_acond_recha" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
	    <button id="btn_enviar_rechazado" class="btn btn-primary">Enviar</button>			
	</div>
    </div>
    -->
<!--Fin de botones-->
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php
    $cumple=CController::createUrl('inspection/rechazado');
    $condicional=CController::createUrl('inspection/condicional');
    $no_cumple=CController::createUrl('inspection/rechazado');
?>
<script>
	
	
	//Fecha Formato
	$('.leguminosas_fecha').datepicker({
	    format: 'dd-mm-yyyy',    
	})
	$('.leguminosas_fecha').datepicker().on('changeDate', function(ev){		
	    $('#Inspection_size').trigger('keyup');
	});
	
	$('.leguminosas').on('blur', function(){
		$('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
		$('#Inspection_leg_distanciamiento_surcos').val(numeral($('#Inspection_leg_distanciamiento_surcos').val()).format('0,0.00'));
		$('#Inspection_leg_mata').val(numeral($('#Inspection_leg_mata').val()).format('0,0.00'));
		$('#Inspection_leg_campo_comercial').val(numeral($('#Inspection_leg_campo_comercial').val()).format('0,0.00'));
		$('#Inspection_leg_otra_especie').val(numeral($('#Inspection_leg_otra_especie').val()).format('0,0.00'));
		$('#Inspection_leg_otro_cultivar').val(numeral($('#Inspection_leg_otro_cultivar').val()).format('0,0.00'));
		$('#Inspection_leg_floracion').val(numeral($('#Inspection_leg_floracion').val()).format('0,0.00'));
		$('#Inspection_leg_llenado_grano').val(numeral($('#Inspection_leg_llenado_grano').val()).format('0,0.00'));
		$('#Inspection_leg_mosaicos').val(numeral($('#Inspection_leg_mosaicos').val()).format('0,0.00'));
		$('#Inspection_leg_moteado').val(numeral($('#Inspection_leg_moteado').val()).format('0,0.00'));
		$('#Inspection_leg_bacteriosis').val(numeral($('#Inspection_leg_bacteriosis').val()).format('0,0.00'));
		$('#Inspection_leg_mancha_angular').val(numeral($('#Inspection_leg_mancha_angular').val()).format('0,0.00'));		
	});
	
	$('#btn_apro').on('click', function(){
	    var error='';
	    if ($('#Inspection_size').val()=='') {
		error=error+'Debe ingresar Area(m2)<br>';
	    }
	    if ($('#Inspection_leg_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha de Siembra<br>';
	    }
	    if ($('#Inspection_leg_emergencia_fecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Emergencia<br>';
	    }
	    if ($('#Inspection_leg_floracion').val()=='') {
		error=error+'Debe ingresar la Floración (%)<br>';
	    }
	    if ($('#Inspection_leg_floracion_fecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Floración<br>';
	    }
	    if ($('#Inspection_leg_llenado_grano').val()=='') {
		error=error+'Debe ingresar el Llenado de Grano (%)<br>';
	    }
	    if ($('#Inspection_leg_fecha_cosecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Cosecha<br>';
	    }
	    if ($('#Inspection_leg_distanciamiento_surcos').val()=='') {
		error=error+'Debe ingresar los Surcos (m)<br>';
	    }
	    if ($('#Inspection_leg_mata').val()=='') {
		error=error+'Debe ingresar el Mata (m)<br>';
	    }
	    if ($('#Inspection_leg_campo_comercial').val()=='') {
		error=error+'Debe ingresar el Campo Comercial (m)<br>';
	    }
	    if ($('#Inspection_leg_otra_especie').val()=='') {
		error=error+'Debe ingresar la Otra Especie (m)<br>';
	    }
	    if ($('#Inspection_leg_otro_cultivar').val()=='') {
		error=error+'Debe ingresar Otro Cultivar (m)<br>';
	    }
	    if ($('#Inspection_leg_presencia_maleza').val()=='') {
		error=error+'Debe ingresar la presencia de malezas<br>';
	    }
	    if ($('#Inspection_leg_presencia_plagas').val()=='') {
		error=error+'Debe ingresar la presencia de plagas<br>';
	    }
	    if ($('#Inspection_leg_plantas_otras_especies').val()=='') {
		error=error+'Debe ingresar plantas de otras especies<br>';
	    }
	    if ($('#Inspection_leg_plantas_fuera_tipo').val()=='') {
		error=error+'Debe ingresar plantas de fuera de tipo<br>';
	    }
	    if ($('#Inspection_leg_mosaicos').val()=='') {
		error=error+'Debe ingresar los datos mosaicos causados<br>';
	    }
	    if ($('#Inspection_leg_moteado').val()=='') {
		error=error+'Debe ingresar el moteado causado por virus<br>';
	    }
	    if ($('#Inspection_leg_bacteriosis').val()=='') {
		error=error+'Debe ingresar la Bacteriosis<br>';
	    }
	    if ($('#Inspection_leg_mancha_angular').val()=='') {
		error=error+'Debe ingresar la Mancha angular<br>';
	    }
	    if ($('#Inspection_observaciones').val()=='') {
		error=error+'Debe ingresar Observaciones<br>';
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
		error=error+'Debe ingresar Area(m2)<br>';
	    }
	    if ($('#Inspection_leg_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha de Siembra<br>';
	    }
	    if ($('#Inspection_leg_emergencia_fecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Emergencia<br>';
	    }
	    if ($('#Inspection_leg_floracion').val()=='') {
		error=error+'Debe ingresar la Floración (%)<br>';
	    }
	    if ($('#Inspection_leg_floracion_fecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Floración<br>';
	    }
	    if ($('#Inspection_leg_llenado_grano').val()=='') {
		error=error+'Debe ingresar el Llenado de Grano (%)<br>';
	    }
	    if ($('#Inspection_leg_fecha_cosecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Cosecha<br>';
	    }
	    if ($('#Inspection_leg_distanciamiento_surcos').val()=='') {
		error=error+'Debe ingresar los Surcos (m)<br>';
	    }
	    if ($('#Inspection_leg_mata').val()=='') {
		error=error+'Debe ingresar el Mata (m)<br>';
	    }
	    if ($('#Inspection_leg_campo_comercial').val()=='') {
		error=error+'Debe ingresar el Campo Comercial (m)<br>';
	    }
	    if ($('#Inspection_leg_otra_especie').val()=='') {
		error=error+'Debe ingresar la Otra Especie (m)<br>';
	    }
	    if ($('#Inspection_leg_otro_cultivar').val()=='') {
		error=error+'Debe ingresar Otro Cultivar (m)<br>';
	    }
	    if ($('#Inspection_leg_presencia_maleza').val()=='') {
		error=error+'Debe ingresar la presencia de malezas<br>';
	    }
	    if ($('#Inspection_leg_presencia_plagas').val()=='') {
		error=error+'Debe ingresar la presencia de plagas<br>';
	    }
	    if ($('#Inspection_leg_plantas_otras_especies').val()=='') {
		error=error+'Debe ingresar plantas de otras especies<br>';
	    }
	    if ($('#Inspection_leg_plantas_fuera_tipo').val()=='') {
		error=error+'Debe ingresar plantas de fuera de tipo<br>';
	    }
	    if ($('#Inspection_leg_mosaicos').val()=='') {
		error=error+'Debe ingresar los datos mosaicos causados<br>';
	    }
	    if ($('#Inspection_leg_moteado').val()=='') {
		error=error+'Debe ingresar el moteado causado por virus<br>';
	    }
	    if ($('#Inspection_leg_bacteriosis').val()=='') {
		error=error+'Debe ingresar la Bacteriosis<br>';
	    }
	    if ($('#Inspection_leg_mancha_angular').val()=='') {
		error=error+'Debe ingresar la Mancha angular<br>';
	    }
	    if ($('#Inspection_observaciones').val()=='') {
		error=error+'Debe ingresar Observaciones<br>';
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
		error=error+'Debe ingresar Area(m2)<br>';
	    }
	    if ($('#Inspection_leg_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha de Siembra<br>';
	    }
	    if ($('#Inspection_leg_emergencia_fecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Emergencia<br>';
	    }
	    if ($('#Inspection_leg_floracion').val()=='') {
		error=error+'Debe ingresar la Floración (%)<br>';
	    }
	    if ($('#Inspection_leg_floracion_fecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Floración<br>';
	    }
	    if ($('#Inspection_leg_llenado_grano').val()=='') {
		error=error+'Debe ingresar el Llenado de Grano (%)<br>';
	    }
	    if ($('#Inspection_leg_fecha_cosecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Cosecha<br>';
	    }
	    if ($('#Inspection_leg_distanciamiento_surcos').val()=='') {
		error=error+'Debe ingresar los Surcos (m)<br>';
	    }
	    if ($('#Inspection_leg_mata').val()=='') {
		error=error+'Debe ingresar el Mata (m)<br>';
	    }
	    if ($('#Inspection_leg_campo_comercial').val()=='') {
		error=error+'Debe ingresar el Campo Comercial (m)<br>';
	    }
	    if ($('#Inspection_leg_otra_especie').val()=='') {
		error=error+'Debe ingresar la Otra Especie (m)<br>';
	    }
	    if ($('#Inspection_leg_otro_cultivar').val()=='') {
		error=error+'Debe ingresar Otro Cultivar (m)<br>';
	    }
	    if ($('#Inspection_leg_presencia_maleza').val()=='') {
		error=error+'Debe ingresar la presencia de malezas<br>';
	    }
	    if ($('#Inspection_leg_presencia_plagas').val()=='') {
		error=error+'Debe ingresar la presencia de plagas<br>';
	    }
	    if ($('#Inspection_leg_plantas_otras_especies').val()=='') {
		error=error+'Debe ingresar plantas de otras especies<br>';
	    }
	    if ($('#Inspection_leg_plantas_fuera_tipo').val()=='') {
		error=error+'Debe ingresar plantas de fuera de tipo<br>';
	    }
	    if ($('#Inspection_leg_mosaicos').val()=='') {
		error=error+'Debe ingresar los datos mosaicos causados<br>';
	    }
	    if ($('#Inspection_leg_moteado').val()=='') {
		error=error+'Debe ingresar el moteado causado por virus<br>';
	    }
	    if ($('#Inspection_leg_bacteriosis').val()=='') {
		error=error+'Debe ingresar la Bacteriosis<br>';
	    }
	    if ($('#Inspection_leg_mancha_angular').val()=='') {
		error=error+'Debe ingresar la Mancha angular<br>';
	    }
	    if ($('#Inspection_observaciones').val()=='') {
		error=error+'Debe ingresar Observaciones<br>';
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


















<?php /*


<div class="span4">													  
                        <!--APROBADO-->													
								<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
											  
								<div class="modal-header">
								<a class="close" data-dismiss="modal">&times;</a>
								<h4>Solicitar Inspección</h4>
								</div>				 
								<div class="modal-body">
								<p>
								<div class="form">						
								<?php 
								$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
								'id'=>'inbox-form',
								'enableClientValidation'=>true,
								'clientOptions'=>array('validateOnSubmit'=>true),
								'htmlOptions'=>array('class'=>'well'),						   
								));						
								?>
								
							
								
								<?php echo	$form->textFieldRow($model,'nhora_propuesta',array('value'=>date("h:m A",strtotime($model->proposed_time)),'data-format'=>'hh:mm A','class'=>'input-small'));	?>	
								<?php $this->endWidget(); ?>				
								</div><!-- form -->					
								</p>
								</div>				 
								<div class="modal-footer">
								  <!--Boton de Si cumple-->
								<?php $this->widget('bootstrap.widgets.TbButton', array(	
								'type'=>'primary',
								'label'=>'Si',
								'buttonType'=>'ajaxButton',
								'url'=>Yii::app()->createUrl( 'inspection/cumple' ),
								'ajaxOptions'=>array(			     
								'type'=>'POST',	
								'data' => array(
										  'size'=>'js:$("#Inspection_size").val()',
										  'leg_fecha_siembra'=>'js:$("#Inspection_leg_fecha_siembra").val()',
										  'leg_emergencia_fecha'=>'js:$("#Inspection_leg_emergencia_fecha").val()',
										  'leg_floracion'=>'js:$("#Inspection_leg_floracion").val()',
										  'leg_floracion_fecha'=>'js:$("#Inspection_leg_floracion_fecha").val()',
										  'leg_llenado_grano'=>'js:$("#Inspection_leg_llenado_grano").val()',
										  'leg_fecha_cosecha'=>'js:$("#Inspection_leg_fecha_cosecha").val()',
										  'leg_distanciamiento_surcos'=>'js:$("#Inspection_leg_distanciamiento_surcos").val()',
										  'leg_mata'=>'js:$("#Inspection_leg_mata").val()',
										  'leg_campo_comercial'=>'js:$("#Inspection_leg_campo_comercial").val()',
										  'leg_otra_especie'=>'js:$("#Inspection_leg_otra_especie").val()',
										  'leg_otro_cultivar'=>'js:$("#Inspection_leg_otro_cultivar").val()',
										  'leg_presencia_maleza'=>'js:$("#Inspection_leg_presencia_maleza").val()',
										  'leg_presencia_plagas'=>'js:$("#Inspection_leg_presencia_plagas").val()',
										  'leg_plantas_otras_especies'=>'js:$("#Inspection_leg_plantas_otras_especies").val()',
										  'leg_plantas_fuera_tipo'=>'js:$("#Inspection_leg_plantas_fuera_tipo").val()',
										  'btn'=>'1',
										  'id'=>$model->id,
										  ),
								//'success' => "function( data ){alert(data);}"
								),
								'htmlOptions'=>array('data-dismiss'=>'modal',
								'url' => Yii::app()->createUrl( 'inspection/cumple' ),
								),));
								?>
								 <!--Boton de No cumple-->
								<?php $this->widget('bootstrap.widgets.TbButton', array(	
								'type'=>'primary',
								'label'=>'No',
								'buttonType'=>'ajaxButton',
								'url'=>Yii::app()->createUrl( 'inspection/cumple' ),
								'ajaxOptions'=>array(			     
								'type'=>'POST',	
								'data' => array(
										  'size'=>'js:$("#Inspection_size").val()',
										  'leg_fecha_siembra'=>'js:$("#Inspection_leg_fecha_siembra").val()',
										  'leg_emergencia_fecha'=>'js:$("#Inspection_leg_emergencia_fecha").val()',
										  'leg_floracion'=>'js:$("#Inspection_leg_floracion").val()',
										  'leg_floracion_fecha'=>'js:$("#Inspection_leg_floracion_fecha").val()',
										  'leg_llenado_grano'=>'js:$("#Inspection_leg_llenado_grano").val()',
										  'leg_fecha_cosecha'=>'js:$("#Inspection_leg_fecha_cosecha").val()',
										  'leg_distanciamiento_surcos'=>'js:$("#Inspection_leg_distanciamiento_surcos").val()',
										  'leg_mata'=>'js:$("#Inspection_leg_mata").val()',
										  'leg_campo_comercial'=>'js:$("#Inspection_leg_campo_comercial").val()',
										  'leg_otra_especie'=>'js:$("#Inspection_leg_otra_especie").val()',
										  'leg_otro_cultivar'=>'js:$("#Inspection_leg_otro_cultivar").val()',
										  'leg_presencia_maleza'=>'js:$("#Inspection_leg_presencia_maleza").val()',
										  'leg_presencia_plagas'=>'js:$("#Inspection_leg_presencia_plagas").val()',
										  'leg_plantas_otras_especies'=>'js:$("#Inspection_leg_plantas_otras_especies").val()',
										  'leg_plantas_fuera_tipo'=>'js:$("#Inspection_leg_plantas_fuera_tipo").val()',
										
										  
										  		 
										  'btn'=>'2',
										  'id'=>$model->id,
										  'hora'=>'js:$("#Inspection_nhora_propuesta").val()',
										  'fecha'=>'js:$("#Inspection_nfecha_propuesta").val()' ,
										  ),
								//'success' => "function( data ){alert(data);}"
								),
								'htmlOptions'=>array('data-dismiss'=>'modal',
								'url' => Yii::app()->createUrl( 'inspection/cumple' ),
								),));
								?>		
								</div>				 
								<?php $this->endWidget(); ?>
								<?php $this->widget('bootstrap.widgets.TbButton', array(
								'label'=>'Cumple',
								'type'=>'success',
								'htmlOptions'=>array(
								'class'=>'span12',
								'data-toggle'=>'modal',
								'data-target'=>'#myModal',
								),
								));
								?>  	     
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'submit', 'label'=>'Condicional','htmlOptions'=>array('class'=>'span12',))); ?>															 
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger','buttonType'=>'submit', 'label'=>'No Cumple','htmlOptions'=>array('class'=>'span12',))); ?>																		 
                  </div>  */ ?>