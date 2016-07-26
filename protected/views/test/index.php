<?php
/* @var $this TestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Forms',
);
?>
<script>
	$( document ).ready(function() {
    
	 $('#myAffix').affix({
    offset: {
      top: 100
    , bottom: function () {
        return (this.bottom = $('.bs-footer').outerHeight(true))
      }
    }
  })
	
	
	
  });
	
</script>


<div class="row">
          <div class="span6">
				<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&dfgfdgdfgdfgfd;</a>
				<div data-spy="affix" data-offset-top="200">...</div>
				
				
				
			 </div>
          <div class="span6">	
				
				<h1>Forms</h1>
				
				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
				)); ?>
				
				
			 </div>
</div>
		  

