<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
	<!-- blueprint CSS framework -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	cgago-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/estilos.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tree.css" />
	<!--CGAGO-->
	<!--Wijmon-->
	
		
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::image(Yii::app()->baseUrl."/images/logo.jpg",'',array( 'width'=>'400')); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
               
            
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),				
				 
                                array('label'=>'Bandeja',
				      'url'=>array('/bandeja/index'),
				      'visible'=>!Yii::app()->user->isGuest),
				/*array('label'=>'Registro'
					, 'url'=>array('/user/create')),*/
					//, 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'Form'
					, 'url'=>array('/iform/index')
					, 'visible'=>!Yii::app()->user->isGuest),// && Yii::app()->user->checkAccess('productor')),
                                array('label'=>'Inbox'
					, 'url'=>array('/inbox/index')
					, 'visible'=>!Yii::app()->user->isGuest),// && Yii::app()->user->checkAccess('inspector')),
				array('label'=>'Administrar Usuarios'
					, 'url'=>Yii::app()->user->ui->userManagementAdminUrl 
					, 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin')),
				
				array('label'=>'Logout ('.Yii::app()->user->name.')'
					, 'url'=>Yii::app()->user->ui->logoutUrl
					, 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	
	
	<?php echo $content; ?>
	
	<div class="clear"></div>



</div><!-- page -->
<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>
</body>
</html>
