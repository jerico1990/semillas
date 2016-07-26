<?php
/* @var $this ExcelController */
/* @var $data TempReporte */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_recepcion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_recepcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expediente')); ?>:</b>
	<?php echo CHtml::encode($data->expediente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productor')); ?>:</b>
	<?php echo CHtml::encode($data->productor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cultivo')); ?>:</b>
	<?php echo CHtml::encode($data->cultivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cultivar')); ?>:</b>
	<?php echo CHtml::encode($data->cultivar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria')); ?>:</b>
	<?php echo CHtml::encode($data->categoria); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('provincia')); ?>:</b>
	<?php echo CHtml::encode($data->provincia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('distrito')); ?>:</b>
	<?php echo CHtml::encode($data->distrito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anexo')); ?>:</b>
	<?php echo CHtml::encode($data->anexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_predio')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_predio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_num_1')); ?>:</b>
	<?php echo CHtml::encode($data->ins_num_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_num_2')); ?>:</b>
	<?php echo CHtml::encode($data->ins_num_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_num_3')); ?>:</b>
	<?php echo CHtml::encode($data->ins_num_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_num_4')); ?>:</b>
	<?php echo CHtml::encode($data->ins_num_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_num_5')); ?>:</b>
	<?php echo CHtml::encode($data->ins_num_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_fecha_1')); ?>:</b>
	<?php echo CHtml::encode($data->ins_fecha_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_fecha_2')); ?>:</b>
	<?php echo CHtml::encode($data->ins_fecha_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_fecha_3')); ?>:</b>
	<?php echo CHtml::encode($data->ins_fecha_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_fecha_4')); ?>:</b>
	<?php echo CHtml::encode($data->ins_fecha_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ins_fecha_5')); ?>:</b>
	<?php echo CHtml::encode($data->ins_fecha_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_siembra')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_siembra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_siembra_1')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_siembra_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_siembra_2')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_siembra_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_siembra_3')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_siembra_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_siembra_4')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_siembra_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_siembra_5')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_siembra_5); ?>
	<br />

	*/ ?>

</div>