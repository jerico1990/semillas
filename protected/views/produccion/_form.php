<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
$user=User::model()->find('cruge_user_id=:cruge_user_id',array(':cruge_user_id'=>Yii::app()->user->id));

$form=Iform::model()->find('id=:id',array(':id'=>$model->form_id));

$criteria1=new CDbCriteria;
$criteria1->condition='form_id=:form_id';
$criteria1->params=array(':form_id'=>$id);

$producciones = Produccion::model()->findAll($criteria1);
$produc=Produccion::model()->find('form_id=:form_id',array(':form_id'=>$id));

?>
<div class="row-fluid span12" id="error" style="color:red"></div>
<div class="row-fluid well span12">
    <div class='row-fluid'>
	<div class='span2'>Fecha</div>
	<div class='span2'>Area(ha)</div>
	<div class='span2'>Producción(kg)</div>
	<div class='span6'></div>
    </div>
    <?php foreach($producciones as $produccion){ ?>
	<div class='row-fluid'>
	    <div class='span2'><?= date('d-m-Y',strtotime($produccion->fecha_cosecha)) ?></div>
	    <div class='span2'><?= $produccion->area ?> </div>
	    <div class='span2'><?=$produccion->produccion ?></div>
	    <div class='span6'><?= CHtml::link('Descargar',array('pdf/produccion','id'=>$produccion->id)) ?></div>
	</div>
    <?php } ?>
</div>

<?php if($produc==null){ ?>

<div class="form well span12">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
<?php echo CHtml::hiddenField('form_id',$id); ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>

<script>
$(function(){
    $('#Acondicionamiento_proposed_time').clockface();  
});
</script>
    <div class="row-fluid">			 
	<div class="span4"><label for="Produccion_fecha_cosecha">Fecha de cosecha</label><input class="produccion span12" type="text" autocomplete="off" name="Produccion[fecha_cosecha]" id="Produccion_fecha_cosecha"></div>
	<div class="span4"><label for="Produccion_area">Area cosechada(ha)</label><input class="produccion span12" name="Produccion[area]" id="Produccion_area" type="text" maxlength="18"></div>
	<div class="span4"><label for="Produccion_produccion">Producción(kg)</label><input class="produccion span12" name="Produccion[produccion]" id="Produccion_produccion" type="text" maxlength="18"></div>
    </div> 
    <div class="row-fluid">
	<div class="span12">
	    <div class="form-actions">
		<div class="span4"></div>
		<div class="span4"></div>
		<div class="span4"><button class="span12  btn btn-success" style="align:left" id="yw2" type="submit" name="yt0">Reportar</button></div>
	    </div>
	</div>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php }?>
<script>
    $('.produccion').on('blur', function(){
	    $('#Produccion_area').val(numeral($('#Produccion_area').val()).format('0,0.00'));
	    $('#Produccion_produccion').val(numeral($('#Produccion_produccion').val()).format('0,0.00'));
    });
    $('#Produccion_fecha_cosecha').datepicker({format: 'dd-mm-yyyy'})
    $('#yw2').on('click', function(){
	var error='';
	if ($('#Produccion_fecha_cosecha').val()=='') {
	    error=error+'Debe ingresar la fecha de coseche<br>';
	}
	if ($('#Produccion_area').val()=='') {
		error=error+'Debe ingresar el área cosechada<br>';
	    }
	if ($('#Produccion_produccion').val()=='') {
	    error=error+'Debe ingresar cantidad de producción<br>';
	}
	if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	
	return true;
    });
</script>