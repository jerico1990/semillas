
<?php
$forma=Iform::model()->find('id=:form_id',array(':form_id'=>$model->form_id));
$user=User::model()->find('id=:id',array(':id'=>$model->user_id));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$forma->location_id));
?>
<style>
label{
		  display: block;
		  margin-bottom: 5px;
		  background:#CCFFFF;
}
</style>
<div class="form well span12" style="background: #FFFFFF">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'inspection-form',
	//'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>false,
));

?>

<?php echo $form->errorSummary($model); ?>
<?php /*
		  <div class="row-fluid">
			  <div class="span4"><?php echo $form->textFieldRow($forma,'form_number',array('class'=>'span12','disabled'=>true)); ?></div>
			  <div class="span4"></div>
			  <div class="span4"><?php echo $form->datepickerRow($model,'real_date',
																 array(	
											 'class'=>'input-medium span10',
											 'disabled'=>true,
											 'prepend'=>'<i class="icon-calendar"></i>',
											 'options'=>array( 'format' => 'dd/mm/yyyy', 
											 'weekStart'=> 1,
											 'showButtonPanel' => true,
											 'showAnim'=>'fold',))); ?></div>
		  </div>
		  <div class="row-fluid">
			  <div class="span4"><?php echo $form->textFieldRow($user,'legal_name',array('class'=>'span12','disabled'=>true)); ?></div>
			  <div class="span4"><?php echo $form->textFieldRow($user,'registry',array('class'=>'span12','disabled'=>true)); ?></div>
			  <div class="span4 well">Agricultor multiplicador</div>
		  </div>
		  <div class="row-fluid">
			  <div class="span3"><?php echo $form->textFieldRow($location,'province',array('class'=>'span12','disabled'=>true)); ?></div>
			  <div class="span3"><?php echo $form->textFieldRow($location,'district',array('class'=>'span12','disabled'=>true)); ?></div>
			  <div class="span3"><?php echo $form->textFieldRow($forma,'location_annex',array('class'=>'span12','disabled'=>true)); ?></div>
			  <div class="span3"><?php echo $form->textFieldRow($forma,'location_name',array('class'=>'span12','disabled'=>true)); ?></div>
		  </div>
		  */ ?>
		  <div class="row-fluid">
			  <div class="span3"><?php echo $form->textFieldRow($model,'size',array('class'=>'span12')); ?></div>
			  <div class="span3"><?php echo $form->textFieldRow($forma,'category',array('value'=>$forma->semilla($forma->category),'class'=>'span12','disabled'=>true)); ?></div>
			  <div class="span3"><?php echo $form->textFieldRow($forma,'variety_id',array('value'=>$forma->variety->name,'class'=>'span12','disabled'=>true)); ?></div>
			  <div class="span3 well">Cultivo anterior</div>
		  </div>
		  <div class="row-fluid">
			  <div class="span3"><?php echo $form->textFieldRow($model,'papa_campo_comercial',array('class'=>'span12','maxlength'=>18)); ?></div>
			  <div class="span3"><?php echo $form->textFieldRow($model,'papa_otra_especie',array('class'=>'span12','maxlength'=>18)); ?></div>
			  <div class="span3"><?php echo $form->textFieldRow($model,'papa_otro_cultivar',array('class'=>'span12','maxlength'=>18)); ?></div>
			  <div class="span3"><?php echo $form->datepickerRow($model,'papa_fecha_siembra',
																 array(	
																'class'=>'input-medium span10',
																'prepend'=>'<i class="icon-calendar"></i>',
																'options'=>array( 'format' => 'dd/mm/yyyy', 
																'weekStart'=> 1,
																'showButtonPanel' => true,
																'showAnim'=>'fold',))); ?></div>
		  </div>
		  <div class="row-fluid">
			  <div class="span12">			
            <table width="744" height="344" border="1">
               <tr>
                 <td colspan="7">PLAGAS EN EL CULTIVO</td>
               </tr>
               <tr>
                 <td width="223" rowspan="2">Plagas</td>
                 <td width="125" rowspan="2">Factor Importancia</td>
                 <td width="26" rowspan="2">Por</td>
                 <td height="29" colspan="2">Primera Evaluación</td>
                 <td colspan="2">Segunda Evaluación</td>
               </tr>
               <tr>
                 <td width="123" height="28">%PI. Afectadas</td>
                 <td width="58">Puntos</td>
                 <td width="98">%PI. Afectadas</td>
                 <td width="45">Puntos</td>
               </tr>
               <tr>
                 <td>Enrollamiento</td>
                 <td>&nbsp;</td>
                 <td>X</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                 <td>Mozaico suave</td>
                 <td>&nbsp;</td>
                 <td>X</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                 <td>Otros virus</td>
                 <td>&nbsp;</td>
                 <td>X</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                 <td>Erwinia</td>
                 <td>&nbsp;</td>
                 <td>X</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                 <td>Mezcla</td>
                 <td>&nbsp;</td>
                 <td>X</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                 <td height="29" colspan="3">&nbsp;</td>
                 <td>Total</td>
                 <td>&nbsp;</td>
                 <td>Total</td>
                 <td>&nbsp;</td>
               </tr>
             </table>
			  </div>			  
		  </div>
		 
		  <div class="row-fluid">
			  <div class="span12"><?php echo $form->textAreaRow($model,'observaciones',array('class'=>'span12','maxlength'=>300,'rows'=>6)); ?></div>		
		  </div>
		  <div class="row-fluid">
			  <div class="span12"><?php echo $form->textAreaRow($model,'recomendaciones',array('class'=>'span12','maxlength'=>300,'rows'=>6)); ?></div>		
		  </div>	
	
         <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <div class="span4">													  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger','buttonType'=>'submit', 'label'=>'Cumple','htmlOptions'=>array('class'=>'span12',))); ?>		     
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'Primary','buttonType'=>'submit', 'label'=>'Condicional','htmlOptions'=>array('class'=>'span12',))); ?>															 
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>'No Cumple','htmlOptions'=>array('class'=>'span12',))); ?>																		 
                  </div>
               </div>
            </div>
         </div>
<?php $this->endWidget(); ?>
</div>