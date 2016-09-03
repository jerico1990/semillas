<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
	<!-- blueprint CSS framework 
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/estilos.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tree.css" />
	<!--CGAGO-->
	<!--Steps-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fuelux.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/docs.css" />
	<!--Wijmon-->
	<?php
	Yii::app()->clientScript->registerCoreScript('jquery');
	//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap/bootstrap.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/numeral.min.js');
	?>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>
<style>
	html{
		background: #FFF !important;
		
	}
	#midCol {
		position: fixed;
	}
</style>
<body>
		 
    <div class="container">
	<div class="row-fluid">
	    <div class="span3 bs-docs-sidebar"></div>
		<div class="span8">
		    <div class="row-fluid" >
			<div class="span12">
			    <?php echo $content; ?>
			</div>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</body>
<script>
	//$('#midCol').affix({offset: {top: 200, bottom: function () {return (this.bottom = $('.bs-footer').outerHeight(true))}}})
</script>
</html>
