<?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/OpenLayers/OpenLayers.js');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/css/style.css');
?>

<style>
    .thing {
	background: #eee;
	height: 200px;
	margin-bottom: 20px;
    }
    .map {
	height: 400px;
	width: 400px;
	background: #eee;
    }
</style>
<script>
/*
jQuery( document ).ready(function( $ ) {
			new_map = new OpenLayers.Map('map', {
			    theme: null,
			    zoomMethod: null,
			    projection: 'EPSG:3857',
				layers: [
				    new OpenLayers.Layer.Google(
				    "Google Hybrid",
				    {type: google.maps.MapTypeId.HYBRID, numZoomLevels: 20,  animationEnabled: false}
				    )
				],
			    center: new OpenLayers.LonLat(10.2, 48.9).transform('EPSG:4326', 'EPSG:3857'),
			    zoom: 5			
			});
			vector = new OpenLayers.Layer.Vector('vector');
			new_map.addLayers([vector]);
			pointLayer = new OpenLayers.Layer.Vector("Point Layer",
			{
			    styleMap: new OpenLayers.StyleMap({
				pointRadius: 6, // based on feature.attributes.type
				fillColor: "#ff0000"
			    }),														  
			});
			new_map.addLayers([pointLayer]);
			point = new OpenLayers.Control.DrawFeature(
				pointLayer,
				OpenLayers.Handler.Point);
			point.featureAdded = function(e) {
				pointLayer.removeAllFeatures();
				pointLayer.drawFeature(e)
				console.log(pointLayer)
				console.log(e);
				$("#location_lon").val(e.geometry.x);
				$("#location_lat").val(e.geometry.y);
				
			}
			new_map.addControl(point);
	
});*/
</script>

<?php
$ambitos = Headquarter::model()->with('users')->findAll('t.parent_id is null and users.type_id=5');
$heard = Headquarter::model()->with('users')->findAll('t.parent_id is null and users.type_id=5'); //:model()->findAll('parent_id is null');
$headquarters = CHtml::listData($heard,'id','name');
$cultivos = Crop::model()->findAll(array('condition'=>'parent is null and status=1'));
?>
<div class="form">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
	<p class="note">Campos <span class="required">*</span> requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	<h2>Semilla a Producir</h2>
	    <div class="row-fluid">
		<div class="span12">
		    <label class="required">Cultivo<span class="required">*</span></label>
		    <select name="Iform[crop_id]" id="crop_id" onchange="Cultivo($(this).val())">
			<option value>seleccionar</option>
			<?php foreach($cultivos as $cultivo){ ?>
			    <option value="<?= $cultivo->id ?>"><?= $cultivo->name ?></option>
			<?php } ?>
		    </select>
		    <div class="help-block error" id="Iform_crop_id_em_" style="display:none">Cultivo no es correcto.</div>
		</div>
	    </div>
	    
	    <div class="row-fluid">
		<div class="span12">
		    <label class="required">Cultivar<span class="required">*</span></label>
		    <select name="Iform[variety_id]" id="Iform_variety_id">
			<option value>seleccionar</option>
		    </select>
		    <div class="help-block error" id="Iform_variety_id_em_" style="display:none">Cultivar no es correcto.</div>
		</div>
	    </div>
	    
	    <div class="row-fluid">
		<div class="span12">
		    <label class="required">Cultivo anterior<span class="required">*</span></label>
		    <select name="Iform[crop_before_id]" id="crop_before_id" onchange="CultivoAnterior($(this).val())">
			<option value>seleccionar</option>
			<?php foreach($cultivos as $cultivo){ ?>
			    <option value="<?= $cultivo->id ?>"><?= $cultivo->name ?></option>
			<?php } ?>
		    </select>
		    <div class="help-block error" id="Iform_crop_before_id_em_" style="display:none">Cultivo anterior no es correcto.</div>
		</div>
	    </div>
	    
	    <div class="row-fluid">
		<div class="span12">
		    <label class="required">Cultivar anterior<span class="required">*</span></label>
		    <select name="Iform[variety_before_id]" id="variety_before_id">
			<option value>seleccionar</option>
		    </select>
		    <div class="help-block error" id="Iform_variety_before_id_em_" style="display:none">Cultivar anterior no es correcto.</div>
		</div>
	    </div>
	    
	    <div class="row-fluid">
		<div class="span12">
		    <label class="required">Categoria<span class="required">*</span></label>
		    <select name="Iform[category]" id="Iform_category">
			<option value>seleccionar</option>
		    </select>
		    <div class="help-block error" id="Iform_category_em_" style="display:none">Categoria no es correcto.</div>
		</div>
	    </div>
	    
	    
	    <h2>Fuente de Origen</h2>
	    <button type="button" id="agregar_fuente" class="btn btn-primary">Agregar fuente de origen</button><br><br>
	    <table class="table borderless table-hover" id="detalle_tabla_fuente" border="0">
		<thead>
		    <tr>
			<th>N° Control</th>
			<th>N° Etiqueta</th>
			<th>Cant.(kg)</th>
			<th>Nro de documento</th>
			<th>Producido por</th>
			<th width="22">&nbsp;</th>
		    </tr>
		</thead>
		<tbody>
		    <tr id='fuente_addr_1'></tr>
		</tbody>
	    </table>
	    <div id="error_fuente_origen" style="color: red"></div>
	
		
	<h2>Campo de Multiplicacion</h2>
	<ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#home">Ubicación</a></li>
	    <li><a data-toggle="tab" href="#menu1">Datos</a></li>
	</ul>  
	<div class="tab-content">
	    <div id="home" class="tab-pane fade in active">
		<div class="row-fluid">
		    <div class="span4">
			<label for="Iform_headquarter_id">Organismo Certificador</label>
			<select name="Iform[headquarter_id]" id="Iform_headquarter_id" onchange="Region($(this).val())">
			    <option value> </option>
			    <?php foreach($ambitos as $ambito){ ?>
				<option value="<?= $ambito->id ?>"><?= $ambito->name ?></option>
			    <?php } ?>
			</select>
			<div class="help-block error" id="Iform_headquarter_id_em_" style="display:none">Organismo Certificador no es correcto.</div>
		    </div>
		</div>
		<div class="row-fluid">
		    <div class="span4">
			<label for="Iform_department_id">Departamento</label>
			<select name="Iform[department_id]" id="Iform_department_id" onchange="Provincias($(this).val())">
			    <option value>Seleccionar</option>
			</select>
			<div class="help-block error" id="Iform_department_id_em_" style="display:none">Departamento no es correcto.</div>
		    </div>
		    <div class="span8">
		    </div>
		</div>
		<div class="row-fluid">
		    <div class="span4">
			<label for="Iform_province_id">Provincia</label>
			<select name="Iform[province_id]" id="Iform_province_id" onchange="Distritos($(this).val())">
			    <option value="">Seleccionar</option>
			</select>
			<div class="help-block error" id="Iform_province_id_em_" style="display:none">Provincia no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_location_id" class="required">Distrito <span class="required">*</span></label>
			<select name="Iform[location_id]" id="Iform_location_id">
			    <option value="">Seleccionar</option>
			</select>
			<div class="help-block error" id="Iform_location_id_em_" style="display:none">Distrito no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_location_annex" class="required">Anexo/Sector <span class="required">*</span></label>
			<input size="60" maxlength="100" name="Iform[location_annex]" id="Iform_location_annex" type="text">
			<div class="help-block error" id="Iform_location_annex_em_" style="display:none">Anexo/Sector no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
	    </div>
	    <div id="menu1" class="tab-pane fade">
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_location_name" class="required">Nombre de Campo <span class="required">*</span></label>
			<input name="Iform[location_name]" id="Iform_location_name" type="text" maxlength="100">
			<div class="help-block error" id="Iform_location_name_em_" style="display:none">Nombre de Campo no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_area" class="required">Area (ha) <span class="required">*</span></label>
			<input size="18" maxlength="18" class="solicitud" name="Iform[area]" id="Iform_area" type="text">
			<div class="help-block error" id="Iform_area_em_" style="display:none">Area (ha) no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_seed_date" class="required">Fecha Estimada de Siembra <span class="required">*</span></label>
			<input type="date"  name="Iform[seed_date]" id="Iform_seed_date">
			<div class="help-block error" id="Iform_seed_date_em_" style="display:none">Fecha Estimada de Siembra no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_sow_estimate_quantity" class="required">Estimado de Cosecha (kg) <span class="required">*</span></label>
			<input class="solicitud" name="Iform[sow_estimate_quantity]" id="Iform_sow_estimate_quantity" type="text" maxlength="18">
			<div class="help-block error" id="Iform_sow_estimate_quantity_em_" style="display:none">Estimado de Cosecha (kg) no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
	    </div>
	</div>

	<?php 	/*$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		//'htmlOptions'=>array('style'=>'height: 400px; width: 400px;'),
		'tabs'=>array(				
		array('label'=>'Ubicacion', 
			'content'=>
				
				"Región</br>".
				CHtml::dropDownList('department_id','', array(),
						    array(
							  'ajax' => array(
									  'type'=>'GET', //request type
									  'url'=>CController::createUrl('location/provinces'), //url to call.
									  'update'=>'#province_id', //selector to update
									  'data'   => 'js:$("#department_id").val()'
									  ))).
				"</br>".
				"Provincia</br>".
				CHtml::dropDownList('province_id','', array(),
						    array(
							  'ajax' => array(
									'type'=>'GET', //request type
									'url'=>CController::createUrl('location/districts'), //url to call.
									'update' => '#Iform_location_id',
									'data'   => 'js:$("#province_id").val()'
									))).			   
				$form->dropDownListRow($model,'location_id',array(), array('ajax'   => array(
									'type'    => 'GET', 
									'url'     => CController::createUrl('location/district'),
									'data'    => 'js:$("#Iform_location_id").val()',
									'success' => 'js:function(e){
										eval("data = " + e);
										vector.removeAllFeatures();
										pointLayer.removeAllFeatures();
										
										
										point.activate();

										var wkt = new OpenLayers.Format.WKT;
										var f = wkt.read(data.wkt);
										vector.addFeatures([f]);
										new_map.zoomToExtent(f.geometry.bounds);
					
										
										OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {                
											defaultHandlerOptions: {
												"single": true,
												"double": false,
												"pixelTolerance": 0,
												"stopSingle": false,
												"stopDouble": false
											},
		
											initialize: function(options) {
												this.handlerOptions = OpenLayers.Util.extend(
													{}, this.defaultHandlerOptions
												);
												OpenLayers.Control.prototype.initialize.apply(
													this, arguments
												); 
												this.handler = new OpenLayers.Handler.Click(
													this, {
													"click": this.trigger
												}, this.handlerOptions
												);
											}, 
		
											trigger: function(e) {
												var lonlat = new_map.getLonLatFromPixel(e.xy);
												$("#location_lon").val(lonlat.lon);
												$("#location_lat").val(lonlat.lat);
											}
										});					
					
									var click = new OpenLayers.Control.Click();
									new_map.addControl(click);
									click.activate();
									}'
									))).
				$form->textFieldRow($model,'location_annex',array('size'=>60,'maxlength'=>100)).
				"<div class='map' id='map' style='height: 400px; width: 100%;'></div>",
				'active'=>true
				),
		array('label'=>'Datos',
			'content'=>								
				$form->textFieldRow($model,'location_name').				
				$form->textFieldRow($model,'area',array('size'=>18,'maxlength'=>18,'class'=>'solicitud')).							
				$form->datepickerRow($model,'seed_date',
						     array(//'prepend'=>'<i class="icon-calendar"></i>',
								'options'=>array( 'format' => 'dd-mm-yyyy', 
								'weekStart'=> 1,
								'showButtonPanel' => true,
								'showAnim'=>'fold',))).	
				$form->textFieldRow($model,'sow_estimate_quantity',array('class'=>'solicitud'))
				//$form->textFieldRow($model,'last_crop')
				//'active'=>true
				),
		),
	)); */ ?>
	<?php echo CHtml::hiddenField('location_lon'); ?>
	<?php echo CHtml::hiddenField('location_lat'); ?>
	
	<h2>Agricultor Multiplicador</h2>
	<button type="button" id="agregar_agricultor" class="btn btn-primary">Agregar agricultor</button><br><br>
	<table class="table borderless table-hover" id="detalle_tabla_agricultor" border="0">
	    <thead>
		<tr>
		    <th>Nombre / Razón Social</th>
		    <th>Nro de Documento</th>
		    <th width="22">&nbsp;</th>
		</tr>
	    </thead>
	    <tbody>
		<tr id='agricultor_addr_1'></tr>
	    </tbody>
	</table>
	<div id="error_agricultor" style="color: red"></div>
	<div class="form-actions">
	    <button class="btn btn-success" id="yw2" type="submit" name="yt0">Crear</button>
	    <button class="btn btn-danger" id="yw3" type="submit" name="yt1">Cancelar</button>
	</div>
<?php $this->endWidget(); ?>
</div>
<?php
$provincias=CController::createUrl('location/provinces');
$distritos=CController::createUrl('location/districts');
$filtrardep=CController::createUrl('location/filtrardep');
$cultivares=CController::createUrl('crop/variedad');
$cultivaresant=CController::createUrl('crop/variedadanterior');
?>
<script>
    agr=1;
    $("#agregar_agricultor").click(function(){
	var detalles_agricultores=$('input[name=\'Iform[farmers_nombres][]\']').length;
	
	var error = '';
	for (i=1;i<=detalles_agricultores;i++) {
	    if ($.trim($('#farmers_nombres_'+i).val())=='') {
		error=error+'Debe ingresar el Nombre / Razón Social del registro n° '+i+'<br>';
	    }
	    
	    if ($.trim($('#farmers_dnis_'+i).val())=='') {
		error=error+'Debe ingresar el Nro de Documento del registro n° '+i+'';
	    }
	}
	
	if (error != '') {
	    $("#error_agricultor").html(error);
            return false;
	}
	else
        {
	    var option = null;
            $('#agricultor_addr_'+agr).html(
					    '<td>'+
                                                '<input type="text" name="Iform[farmers_nombres][]" id="farmers_nombres_'+agr+'">'+
					    '</td>'+
                                            '<td>'+
                                                '<input type="text" name="Iform[farmers_dnis][]" id="farmers_dnis_'+agr+'">'+
					    '</td>'+
					    '<td>'+
						'<span class="eliminar icon-minus-sign" >'+
						'</span>'+
					    '</td>');
            $('#detalle_tabla_agricultor').append('<tr id="agricultor_addr_'+(agr+1)+'"></tr>');
            agr++;
            return true;
        }
    });
    
    
    fuente=1;
    $("#agregar_fuente").click(function(){
	var detalles_fuentes=$('input[name=\'Iform[sources_controls][]\']').length;
	
	var error = '';
	
	for (i=1;i<=detalles_fuentes;i++) {
	    if ($.trim($('#sources_controls_'+i).val())=='') {
		error=error+'Debe ingresar el N° Control del registro n° '+i+'<br>';
	    }
	    
	    if ($.trim($('#sources_etiquetas_'+i).val())=='') {
		error=error+'Debe ingresar el N° Etiqueta del registro n° '+i+'<br>';
	    }
	    
	    if ($.trim($('#sources_cantidades_'+i).val())=='') {
		error=error+'Debe ingresar la Cant.(kg) en el registro n° '+i+'<br>';
	    }
	    
	    if ($.trim($('#documents_references_'+i).val())=='') {
		error=error+'Debe ingresar el Nro de Documento en el registro n° '+i+'<br>';
	    }
	    
	    if ($.trim($('#productors_'+i).val())=='') {
		error=error+'Debe ingresar Producido por en el registro n° '+i+'<br>';
	    }
	}
	
	if (error != '') {
	    $("#error_fuente_origen").html(error);
            return false;
	}
	else
        {
	    var option = null;
            $('#fuente_addr_'+fuente).html(
					    '<td>'+
                                                '<input type="text" style="width:100px !important;" name="Iform[sources_controls][]" id="sources_controls_'+fuente+'">'+
					    '</td>'+
                                            '<td>'+
                                                '<input type="text" style="width:100px !important;" name="Iform[sources_etiquetas][]" id="sources_etiquetas_'+fuente+'">'+
					    '</td>'+
					    '<td>'+
                                                '<input type="text" style="width:100px !important;" name="Iform[sources_cantidades][]" id="sources_cantidades_'+fuente+'">'+
					    '</td>'+
					    '<td>'+
                                                '<input type="text" style="width:100px !important;" name="Iform[documents_references][]" id="documents_references_'+fuente+'">'+
					    '</td>'+
					    '<td>'+
                                                '<input type="text" style="width:100px !important;" name="Iform[productors][]" id="productors_'+fuente+'">'+
					    '</td>'+
					    '<td>'+
						'<span class="eliminar icon-minus-sign" >'+
						'</span>'+
					    '</td>');
            $('#detalle_tabla_fuente').append('<tr id="fuente_addr_'+(fuente+1)+'"></tr>');
            fuente++;
            return true;
        }
    });
    
    $("#detalle_tabla_fuente").on('click','.eliminar',function(){
        var r = confirm("Estas seguro de Eliminar?");
        var mensaje = '';
        if (r == true) {
            id=$(this).children().val();
            if (id) {
                
                $(this).parent().parent().remove();
            }
            else
            {
                $(this).parent().parent().remove();    
            }   
            mensaje = "Se elimino el Registro Correctamente";
        } 
    });
    
    $("#detalle_tabla_agricultor").on('click','.eliminar',function(){
        var r = confirm("Estas seguro de Eliminar?");
        var mensaje = '';
        if (r == true) {
            id=$(this).children().val();
            if (id) {
                
                $(this).parent().parent().remove();
            }
            else
            {
                $(this).parent().parent().remove();    
            }   
            mensaje = "Se elimino el Registro Correctamente";
        } 
    });
    
    $('#yw2').click(function(){
	var error='';
	
	if ($.trim($('#crop_id').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_crop_id_em_').show();
	}
	else
	{
	    $('#Iform_crop_id_em_').hide();
	}
	
	if ($.trim($('#Iform_variety_id').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_variety_id_em_').show();
	}
	else
	{
	    $('#Iform_variety_id_em_').hide();
	}
	
	if ($.trim($('#crop_before_id').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_crop_before_id_em_').show();
	}
	else
	{
	    $('#Iform_crop_before_id_em_').hide();
	}
	
	if ($.trim($('#variety_before_id').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_variety_before_id_em_').show();
	}
	else
	{
	    $('#Iform_variety_before_id_em_').hide();
	}
	
	if ($.trim($('#Iform_category').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_category_em_').show();
	}
	else
	{
	    $('#Iform_category_em_').hide();
	}
	
	if ($.trim($('#Iform_headquarter_id').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_headquarter_id_em_').show();
	}
	else
	{
	    $('#Iform_headquarter_id_em_').hide();
	}
	
	if ($.trim($('#Iform_department_id').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_department_id_em_').show();
	}
	else
	{
	    $('#Iform_department_id_em_').hide();
	}
	
	if ($.trim($('#Iform_province_id').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_province_id_em_').show();
	}
	else
	{
	    $('#Iform_province_id_em_').hide();
	}
	
	if ($.trim($('#Iform_location_id').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_location_id_em_').show();
	}
	else
	{
	    $('#Iform_location_id_em_').hide();
	}
	
	if ($.trim($('#Iform_location_annex').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_location_annex_em_').show();
	}
	else
	{
	    $('#Iform_location_annex_em_').hide();
	}
	
	if ($.trim($('#Iform_location_name').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_location_name_em_').show();
	}
	else
	{
	    $('#Iform_location_name_em_').hide();
	}
	
	if ($.trim($('#Iform_area').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_area_em_').show();
	}
	else
	{
	    $('#Iform_area_em_').hide();
	}
	
	if ($.trim($('#Iform_seed_date').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_seed_date_em_').show();
	}
	else
	{
	    $('#Iform_seed_date_em_').hide();
	}
	
	if ($.trim($('#Iform_sow_estimate_quantity').val())=='') {
	    error=error+'Solicitud';
	    $('#Iform_sow_estimate_quantity_em_').show();
	}
	else
	{
	    $('#Iform_sow_estimate_quantity_em_').hide();
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
    
    
    function Cultivo(valor) {
	$.get( "<?= $cultivares ?>?crop="+valor, function( data ) {															
	    $("#Iform_variety_id").append(data);	
	});
	if($('#crop_id').val()==15){			
		$('#Iform_category').html('<option>seleccionar</option>'+
					  '<option value="5">Basica 1</option>'+
					  '<option value="6">Basica 2</option>'+
					  '<option value="7">Registrada 1</option>'+
					  '<option value="8">Registrada 2</option>'+
					  '<option value="9">Certificada</option>'+
					  '<option value="10">Autorizada</option>'
					  );
	}
	else
	{
	    return $('#Iform_category').html('<option>seleccionar</option>'+
					    '<option value="1">Basica</option>'+
					    '<option value="2">Registrada</option>'+
					    '<option value="3">Certificada</option>'+
					    '<option value="4">Autorizada</option>');
	}
    }
    
    function CultivoAnterior(valor) {
	$.get( "<?= $cultivaresant ?>?crop="+valor, function( data ) {															
	    $("#variety_before_id").append(data);	
	});
    }
    
    function Region(valor) {
	$.get( "<?= $filtrardep ?>?ambito="+valor, function( data ) {$( "#Iform_department_id" ).html( data );});
    }
    
    function Provincias(valor) {
	$.get( "<?= $provincias ?>?departamento="+valor, function( data ) {$( "#Iform_province_id" ).html( data );});
	$("#Iform_province_id").find("option").remove().end().append("<option value></option>").val("");
	$("#Iform_location_id").find("option").remove().end().append("<option value></option>").val("");
    }
    
    function Distritos(valor) {
	$.get( "<?= $distritos ?>?provincia="+valor, function( data ) {$( "#Iform_location_id" ).html( data );});
	$("#Iform_location_id").find("option").remove().end().append("<option value></option>").val("");
    }
    $('.solicitud').on('blur', function(){
	    $('#Iform_area').val(numeral($('#Iform_area').val()).format('0,0.00'));
	    $('#Iform_sow_estimate_quantity').val(numeral($('#Iform_sow_estimate_quantity').val()).format('0,0.00'));
    });
    
    $(document).ready(function(){
	
	$(document).on('click','caption',function(){
	    var objTabla=$(this).parent();
	    if(objTabla.find('tbody').is(':visible')){
		$(this).removeClass('clsContraer');
		$(this).addClass('clsExpandir');
	    }else{
		$(this).removeClass('clsExpandir');
		$(this).addClass('clsContraer');
	    }
	    objTabla.find('tbody').toggle();
	});
	var a=1;
	$(document).on('click','.clsAgregarFila',function(){
	    var strNueva_Fila=	'<tr>'+
				    '<td><input id="Iform_source_control_'+a+'" name="Iform[source_control_'+a+']" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>'+
				    '<td><input id="Iform_source_etiqueta_'+a+'" name="Iform[source_etiqueta_'+a+']" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>'+
				    '<td><input id="Iform_source_cantidad_'+a+']" name="Iform[source_cantidad_'+a+']" style="width:50px !important;" type="text" class="clsAnchoTotal"></td>'+
				    '<td><input id="Iform_document_reference_'+a+']" name="Iform[document_reference_'+a+']" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>'+
				    '<td><input id="Iform_productor_'+a+']" name="Iform[productor_'+a+']" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>'+
				    '<td align="right"><input style="width:30px !important;" type="button" value="-" class="clsEliminarFila"></td>'+
				'</tr>';
	    var objTabla=$(this).parents().get(3);
	    $(objTabla).find('tbody').append(strNueva_Fila);
	    if(!$(objTabla).find('tbody').is(':visible')){
		$(objTabla).find('caption').click();
	    }
	    a++;
	});
	var b=1;
	$(document).on('click','.clsAgregarFilaagricultor',function(){
	    var strNueva_Fila='<tr>'+
				'<td><input id="Iform_farmers_nombre_'+b+'" name="Iform[farmers_nombre_'+b+']" style="width:350px !important;" type="text" class="clsAnchoTotal"></td>'+
				'<td><input id="Iform_farmers_dni_'+b+'" name="Iform[farmers_dni_'+b+']" style="width:120px !important;" type="text" class="clsAnchoTotal"></td>'+
				'<td align="right"><input style="width:50px !important;" type="button" value="-" class="clsEliminarFila"></td>'+
			    '</tr>';
	    var objTabla=$(this).parents().get(3);
	    $(objTabla).find('tbody').append(strNueva_Fila);
	    if(!$(objTabla).find('tbody').is(':visible')){
		$(objTabla).find('caption').click();
	    }
	    b++;
	});
	$(document).on('click','.clsEliminarFila',function(){
	    var objCuerpo=$(this).parents().get(2);
	    if($(objCuerpo).find('tr').length==1){
		if(!confirm('Esta es el Ãºnica fila de la lista Â¿Desea eliminarla?')){
		    return;
		}
	    }
	    var objFila=$(this).parents().get(1);
	    $(objFila).remove();
	});			
});
</script>





