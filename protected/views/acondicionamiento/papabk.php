<?php
/* @var $this AlgodonController */
/* @var $model Inspection */
/*
$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Algodon', 'url'=>array('index')),
	array('label'=>'Create Algodon', 'url'=>array('create')),
	array('label'=>'View Algodon', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Algodon', 'url'=>array('admin')),
);*/
?>

<div class="form row-fluid offset1">
    
<h2>REG-SEM-06-13: Informe de acondicionamiento de semillas de papa</h2>

</div>

<?php $this->renderPartial('_papa', array('model'=>$model)); ?>

<script>
$( document ).ready(function() {
   $('#acondicionamiento-form').attr('action', $('#uniqueurl').val())
   
   
   
   $('#acondicionamiento-form input').each(function(i, e){
      $(e).val(localStorage.getItem($('#uniquefield').val() + '_' + $(e).attr('id')));
   });

   $('#yw3').on('click', function() {
      console.log($('#uniquefield').val())
      $('#acondicionamiento-form input').each(function(i, e){
         localStorage.setItem($('#uniquefield').val() + '_' + $(e).attr('id'), $(e).val());
      })
   });
  
});
</script>