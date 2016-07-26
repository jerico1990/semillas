<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
?>


<div class="form well span12" style="background: #FFFFFF">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'acondicionamiento-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));

?>

	<?php echo $form->errorSummary($model); ?>
	<?php echo CHtml::hiddenField('formu',$model->form_id); ?>
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
			  <td><?php echo $form->textFieldRow($model,'afectadas_erwinia',array('class'=>'papa span12')); ?></td>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>Pobredumbre seca (Fusarium solari)</td>
			  <td>7</td>
			  <td>X</td>
			  <td><?php echo $form->textFieldRow($model,'afectadas_fusarium',array('class'=>'papa span12')); ?></td>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>Rhizoctoniasis (Rhizoctonia solari) y Roña (Spongospora Subterranea)</td>
			  <td>4</td>
			  <td>X</td>
			  <td><?php echo $form->textFieldRow($model,'afectadas_rhizoctoniasis',array('class'=>'papa span12')); ?></td>
			  
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>Mezcla varietal</td>
			  <td>1</td>
			  <td>X</td>
			  <td><?php echo $form->textFieldRow($model,'afectadas_mezcla_varietal',array('class'=>'papa span12')); ?></td>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>Fuera de tamaño , rajaduras , daño , pelado y deforme</td>
			  <td>3</td>
			  <td>X</td>
			  <td><?php echo $form->textFieldRow($model,'afectadas_fuera_tamano',array('class'=>'papa span12')); ?></td>
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
			  <div class="span12"><?php echo $form->textAreaRow($model,'observacion',array('class'=>'span12','maxlength'=>300,'rows'=>6)); ?></div>		
	</div>
	
	
	<div class="row-fluid">
		<div class="span12">
			<div class="form-actions">
				<div class="span4">
					<!--Aprobado-->
						<!--<a id="myModal_btn_apro" role="button" class="btn btn-success span12">
							Cumple
						</a>-->
						<?php $this->widget('bootstrap.widgets.TbButton', array(
								'id'=>'btn_aprobado_si',
								'type'=>'success',
								'label'=>'Cumple',
								'buttonType'=>'ajaxButton',
								'url'=>Yii::app()->createUrl( 'acondicionamiento/cumple' ),
								'ajaxOptions'=>array(			     
								'type'=>'POST',	
								'data' => array(
											'papa_erwinia'=>'js:$("#Acondicionamiento_afectadas_erwinia").val()',
											'papa_fusarium'=>'js:$("#Acondicionamiento_afectadas_fusarium").val()',
											'papa_rhizoctoniasis'=>'js:$("#Acondicionamiento_afectadas_rhizoctoniasis").val()',
											'papa_varietal'=>'js:$("#Acondicionamiento_afectadas_mezcla_varietal").val()',
											'papa_tamano'=>'js:$("#Acondicionamiento_afectadas_fuera_tamano").val()',											
											'papa_observacion'=>'js:$("#Acondicionamiento_observacion").val()',											 
											'id'=>$model->id,										
											),
								'success' => 'function(data){	location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());}'
								),
								
								'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'span12',
								'url' => Yii::app()->createUrl( 'acondicionamiento/cumple' ),
								),));
								?>
					<!--Fin de Aprobado-->	
				</div>
				<div class="span4">
					<!--Condicional-->
						<a id="myModal_btn_condi" role="button" class="btn btn-primary span12">
							condicional
						</a>
					<!--Fin de Condicional-->							 										 
				</div>
				<!--Boton de No cumples-->
				<div class="span4">														  
						  <?php $this->widget('bootstrap.widgets.TbButton', array(
											'id'=>'myModal_btn_recha',
											'type'=>'danger',
											'buttonType'=>'ajaxButton',
											'label'=>'No Cumple',
											'url'=>Yii::app()->createUrl( 'acondicionamiento/rechazado' ),
											'ajaxOptions'=>array(
																		'type'=>'POST',
																		'data' => 'js:$("#acondicionamiento-form").serialize()',
																		'success' =>'function( data ){
																		location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());
																		}'
																		),													
											'htmlOptions'=>array('class'=>'span12',
																		'url' => Yii::app()->createUrl( 'acondicionamiento/rechazado' ),))); ?>																		 
				</div>
			</div>
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
</script>