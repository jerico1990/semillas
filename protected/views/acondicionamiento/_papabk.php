<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
?>

<style>
h4{
		  display: block;
		  margin-bottom: 5px;
		  background:#CCFFFF;
		  
}

</style>

<div class="form well span12" style="background: #FFFFFF">
	<input id="uniquefield" value="<?= $model->id; ?>" />
	<input id="uniqueurl"   value="<?= $this->createAbsoluteUrl('/') . '/acondicionamiento/papa/' . $model->id; ?>" /> 
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => $this->createAbsoluteUrl('/') . '/acondicionamiento/papa/' . $model->id,
    'id'=>'acondicionamiento-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));

?>

	<?php echo $form->errorSummary($model); ?>
	
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
			  <td><?php echo $form->textFieldRow($model,'afectadas_erwinia',array('class'=>'span12')); ?></td>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>Pobredumbre seca (Fusarium solari)</td>
			  <td>7</td>
			  <td>X</td>
			  <td><?php echo $form->textFieldRow($model,'afectadas_fusarium',array('class'=>'span12')); ?></td>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>Rhizoctoniasis (Rhizoctonia solari) y Roña (Spongospora Subterranea)</td>
			  <td>4</td>
			  <td>X</td>
			  <td><?php echo $form->textFieldRow($model,'afectadas_rhizoctoniasis',array('class'=>'span12')); ?></td>
			  
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>Mezcla varietal</td>
			  <td>1</td>
			  <td>X</td>
			  <td><?php echo $form->textFieldRow($model,'afectadas_mezcla_varietal',array('class'=>'span12')); ?></td>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>Fuera de tamaño , rajaduras , daño , pelado y deforme</td>
			  <td>3</td>
			  <td>X</td>
			  <td><?php echo $form->textFieldRow($model,'afectadas_fuera_tamano',array('class'=>'span12')); ?></td>
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
						  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>'Cumple','htmlOptions'=>array('class'=>'span12',))); ?>		     
				</div>
				<div class="span4">														  
						  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'submit', 'label'=>'Condicional','htmlOptions'=>array('class'=>'span12',))); ?>															 
				</div>
				<div class="span4">														  
						  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger','buttonType'=>'submit', 'label'=>'No Cumple','htmlOptions'=>array('class'=>'span12',))); ?>																		 
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="form-actions">
				<div class="span4">													  
						  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success', 'label'=>'Cumple (Offline)','htmlOptions'=>array('class'=>'span12',))); ?>		     
				</div>
				<div class="span4">														  
						  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'Condicional (Offline)','htmlOptions'=>array('class'=>'span12',))); ?>															 
				</div>
				<div class="span4">														  
						  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger', 'label'=>'No Cumple (Offline)','htmlOptions'=>array('class'=>'span12',))); ?>																		 
				</div>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->