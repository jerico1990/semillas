<?php
/* @var $this MuestreoController */
/* @var $model Muestreo */
/* @var $form CActiveForm */
$departamentos = Location::model()->findAll(array(
	  'select'   => 't.department, t.department_id',
	  'group'    => 't.department',
	  'order'    => 't.department ASC',
	  'distinct' => true
     ));

$departments = Location::model()->findAll(array(
					 'select'   => 't.id, t.department, t.department_id',
					 'group'    => 't.id,t.department',
					 'order'    => 't.department ASC',
					 'distinct' => true
		  )); 
$listdeparts = CHtml::listData($departments,'department_id','department');


$maestro=Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'011'));
$lista=CHtml::listData($maestro,'codigo_detalle','descripcion');

$laboratorios=User::model()->findAll('type_id=:type_id',array(':type_id'=>6));
$lista_laboratorios=CHtml::listData($laboratorios,'id','legal_name');
?>

<div class="form well span12">

<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
               'id'=>'muestreo-form',
            ));
?>

	

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row-fluid">
		<div class="span12"><h4>Datos del Muestreo</h4></div>      
	</div>
	<div class="row-fluid">			 				
		<div class="span4"><?php echo $form->textFieldRow($model,'name_muestreador',array('size'=>60,'maxlength'=>150)); ?></div>
		<div class="span4"><?php echo $form->datepickerRow($model,'fecha_muestreo',
																				 array(	
																					  //'class'=>'input-medium span10',
																					  //'prepend'=>'<i class="icon-calendar"></i>',
																					  'htmlOptions'=>array('class'=>'produccion','value'=>''),
																					  'options'=>array( 'format' => 'dd-mm-yyyy', 
																					  'weekStart'=> 1,
																					  'showButtonPanel' => true,
																					  'showAnim'=>'fold',))); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'peso_muestra',array('size'=>18,'maxlength'=>18)); ?></div>
	</div>
	<div class="row-fluid">			 				
		<div class="span12"><?php echo $form->textFieldRow($model,'lugar_ubicacion',array('size'=>60,'maxlength'=>300,'class'=>'span8')); ?></div>		
	</div>
		
		
	<div class="row-fluid">
	    <div class="span4">
		<label for="Muestreo_department_id">Departamento</label>
		<select name="Muestreo[department_id]" id="Muestreo_department_id" onchange="Provincias($(this).val())">
		    <option value="">Seleccionar</option>
		    <?php foreach($departamentos as $departamento){ ?>
		    <option value="<?= $departamento->department_id ?>"><?= $departamento->department ?></option>
		    <?php } ?>
		</select>
		<div class="help-block error" id="Muestreo_department_id_em_" style="display:none">Departamento no es correcto.</div>
	    </div>
	    <div class="span4">
		<label for="Muestreo_province_id">Provincia</label>
		<select name="Muestreo[province_id]" id="Muestreo_province_id" onchange="Distritos($(this).val())">
		    <option value="">Seleccionar</option>
		</select>
		<div class="help-block error" id="Muestreo_province_id_em_" style="display:none">Provincia no es correcto.</div>
	    </div>
	    <div class="span4">
		<label for="Muestreo_district_id" class="required">Distrito <span class="required">*</span></label>
		<select name="Muestreo[district_id]" id="Muestreo_district_id">
		    <option value="">Seleccionar</option>
		</select>
		<div class="help-block error" id="Muestreo_district_id_em_" style="display:none">Distrito no es correcto.</div>
	    </div>
	    <!--
		<div class="span4">
		<?php echo $form->dropDownListRow($model,'department_id',$listdeparts,array(								
				  'ajax' => array(
				  'type'=>'GET', //request type
				  'url'=>CController::createUrl('location/provinces'), //url to call.
				  'update'=>'#Muestreo_province_id', //selector to update
				  'data'   => 'js:$("#Muestreo_department_id").val()'
		  ))); ?>
		</div>
		<div class="span8">
		</div>-->
	</div>
	<!--
	<div class="row-fluid">		  
		<div class="span8"> <?php /*echo $form->dropDownListRow($model,'province_id',array(),array(								
				  'ajax' => array(
							'type'=>'GET', //request type
							 'url'=>CController::createUrl('location/districts'), //url to call.
							 'update' => '#Muestreo_district_id',
							 'data'   => 'js:$("#Muestreo_province_id").val()'
						 ))); ?></div>
		<div class="span4"></div>
	</div>
	
	<div class="row-fluid">		  
		<div class="span8"><?php echo $form->dropDownListRow($model,'district_id',array(), array());*/ ?></div>
		<div class="span4"></div>
	</div>
	-->
	<div class="row-fluid">			 				
		<div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_germinacion'); ?></div>
		<div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_humedad'); ?></div>
		<div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_pureza'); ?></div>
		<div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_otras_especies'); ?></div>
	</div>

	<div class="row-fluid">			 				
		<div class="span8"><?php echo $form->textAreaRow($model,'observacion',array('size'=>60,'maxlength'=>300,'rows'=>'6','class'=>'span12')); ?></div>
	</div>
	<div class="row-fluid">		  
		<div class="span8"><?php echo $form->dropDownListRow($model,'laboratorio_id',$lista_laboratorios, array('empty'=>' ')); ?></div>
		<div class="span4"></div>
	</div>
	
	<div class="row-fluid">
		<div class="span12">
			<div class="form-actions">																							 
				<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>$model->isNewRecord ? 'Crear' : 'Aceptar','htmlOptions' => array('name'=>'btn','value'=>'aceptar'),)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'danger','buttonType'=>'submit','label'=>$model->isNewRecord ? :'Rechazar','htmlOptions' => array('name'=>'btn','value'=>'rechazar'),)); ?>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$provincias=CController::createUrl('location/provinces');
$distritos=CController::createUrl('location/districts');
?>
<script>
    function Provincias(valor) {
	$.get( "<?= $provincias ?>?departamento="+valor, function( data ) {$( "#Muestreo_province_id" ).html( data );});
	$("#Muestreo_province_id").find("option").remove().end().append("<option value></option>").val("");
	$("#Muestreo_district_id").find("option").remove().end().append("<option value></option>").val("");
    }
    
    function Distritos(valor) {
	$.get( "<?= $distritos ?>?provincia="+valor, function( data ) {$( "#Muestreo_district_id" ).html( data );});
	$("#Muestreo_district_id").find("option").remove().end().append("<option value></option>").val("");
    }
</script>