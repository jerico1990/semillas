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
    <?php $this->widget('bootstrap.widgets.TbNavbar', array(
		'type'=>'inverse', // null or 'inverse'
		'fixed' => 'top',
		'brand' => CHtml::image(Yii::app()->request->baseUrl."/images/large_logo.png"),
		'brandOptions' => array('style' => 'float: left'),
		'brandUrl'=>'#',
		'collapse'=>true, // requires bootstrap-responsive.css				
		'items'=>array(                                                                        
		    array(
			'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array('class'=>'pull-right'),
			'items'=>array(array('label'=>'Logout('.Yii::app()->user->name.')','url'=>Yii::app()->user->ui->logoutUrl,),),
		    ),
		),
	    )
	);
    ?>
		 
<div class="container">
    <div class="row-fluid">
	<div class="span3 bs-docs-sidebar"  >
	    <?php	$this->widget('bootstrap.widgets.TbMenu', array(
			'type' => 'list',
			'stacked' => true,
			'htmlOptions' => array(
				'class' => 'bs-sidenav bs-docs-sidenav'
			), 
			'items' => array(
			    //PRODUCTOR			
			    array(
				'label' => 'Bandeja de Expediente',
				'url' => array('/iform/index'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('productor'))
			    ),								
			    array(),
			    array(
				'label' => 'Solicitando Servicio',
				'url' => array('/iform/create'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('productor'))
			    ),
			    array(),									
			    array(
				'label' => 'Etapa de Campo',
				'url' => array('/iform/produccionindex'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('productor'))
			    ),
			    array(
				'label' => 'Movilización de cosecha',
				'url' => array('/iform/movilizacionindex'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('productor'))
			    ),
			    array(),
			    array(
				'label' => 'Pago por servicio solicitado',
				'url' => array('/payment/index'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('productor'))
			    ),
			    array(
				'label' => 'Registrar Pago realizado',
				'url' => array('/payment/notapago'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('productor'))
			    ),
			    array(
				'label' => 'Historial pagos realizados',
				'url' => array('/payment/pagos'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('productor'))
			    ),							
			    
			    //INSPECTOR	
			    array(
				'label' => 'INSPECTOR',
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('inspector'))
			    ),
			    array(
				'label' => 'Campo',
				'icon' => 'icon-chevron-right',
				'url' => array('/iform/iindex'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('inspector'))
			    ),
			    /*array(
				    'label' => 'Acondicionamiento',
				    'icon' => 'icon-chevron-right',
				    'url' => '/peas/iform/acondicionamiento',
				    'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('inspector'))
			    ),
			    array(
				    'label' => 'Muestreo',
				    'icon' => 'icon-chevron-right',
				    'url' => '/peas/iform/acondicionamiento',
				    'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('inspector'))
			    ),*/
			    
			    //ORGANISMO CERTIFICADOR
			    array(
				'label' => 'ORGANISMO CERTIFICADOR',
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('estacion'))
			    ),
			    array(
				'label' => 'Solicitudes',
				'icon' => 'icon-chevron-right',
				'url' => array('/iform/aindex'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('estacion'))
			    ),
			    
			    
			    //ADMINISTRADOR INIA
			    array(
				'label' => 'Usuarios',										
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Productores',
				'icon' => 'icon-chevron-right',
				'url' => array('/user/cuenta'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Productores E.E.A.',
				'icon' => 'icon-chevron-right',
				'url' => array('/user/iadmin'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Inspector',
				'icon' => 'icon-chevron-right',
				'url' => array('/inspector/admin'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Registros',										
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    
			    array(
				'label' => 'Productor',
				'icon' => 'icon-chevron-right',
				'url' => array('/producer/admin'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    
			    array(
				'label' => 'Cultivo',
				'icon' => 'icon-chevron-right',
				'url' => array('/crop/admin'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Cultivares',
				'icon' => 'icon-chevron-right',
				'url' => array('/cultivar/admin'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Entidades',										
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'O.C / E.E',
				'icon' => 'icon-chevron-right',
				'url' => array('/headquarter/admin'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Ambito',
				'icon' => 'icon-chevron-right',
				'url' => array('/headquarter/admin_ambito'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Plantas',
				'icon' => 'icon-chevron-right',
				'url' => array('/plantas/admin'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),									
			    array(
				'label' => 'Laboratorio',
				'icon' => 'icon-chevron-right',
				'url' => array('/headquarter/admin_laboratorio'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Reporte',										
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),
			    array(
				'label' => 'Campaña',
				'icon' => 'icon-chevron-right',
				'url' => array('/excel/reportes'),
				'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('peas')
			    ),						
			    //General
			    
			    //MUESTREO
			    array(
				'label' => 'Laboratorio',
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('laboratorio'))
			    ),
			    array(
				'label' => 'Laboratorio',
				'url' => array('/iform/laboratorio'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('laboratorio'))
			    ),
			    
			    //Pagador
			    array(
				'label' => 'Pagos',
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('pagador'))
			    ),
			    array(
				'label' => 'Registrar notas de ventas',
				'url' => array('/payment/validainia'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('pagador'))
			    ),
			    array(
				'label' => 'Registro de Notas de Ventas',
				'url' => array('payment/admin'),
				'visible' => !Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('pagador'))
			    ),
			    //administrador_default
			    array(
				'label' => 'Administrar Usuarios',
				'icon' => 'cog',
				'url' => Yii::app()->user->ui->userManagementAdminUrl,
				'visible' => Yii::app()->user->checkAccess('admin')
			    )
			)
		    ));
		    ?>
		</div>
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
	 $('#midCol').affix({
    offset: {
      top: 100
    , bottom: function () {
        return (this.bottom = $('.bs-footer').outerHeight(true))
      }
    }
  })
</script>
</html>
