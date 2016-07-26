<?php

class PdfController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','solicitud','aprobacion','solicitudcampo','notificacion','notificacioncampo','semilla',
									  'informecereales','informecampoalgodon','informearroz','informeleguminosas','prueba','informecampoarroz','informecampoleguminosas',
									  'informecampocereales','informecampomaiz','informecampopapa','solicitudacondicionamiento','notificacionacondicionamiento',
									  'movilizacion','produccion','informeacondicionamientootros','informeacondicionamientopapa',
									  'acondicionamiento','solicitudmuestreo','notificacionmuestreo','informemuestreo','notaventa','notapago',
									  'informelaboratorio','informeanalisis','actaentregaetiquetas','constanciacertificacion','actaetiquetado'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
   
   public function actionSolicitud($id)
   {
      $form=Iform::model()->findByPk($id);
      
      $this->render('solicitud',array('model'=>$form));
   }
	
	public function actionNotificacion($id,$identificador)
   {
      $form=Iform::model()->findByPk($id);
      
      $this->render('notificacion',array('model'=>$form,'identificador'=>$identificador));
   }
	
	public function actionSolicitudcampo($id,$idinspect)
   {
      $form=Iform::model()->findByPk($id);
      
      $this->render('solicitudcampo',array('model'=>$form,'id'=>$idinspect));
   }
	
	public function actionNotificacioncampo($id,$idinspect)
   {
      $form=Iform::model()->findByPk($id);
      
      $this->render('notificacioncampo',array('model'=>$form,'id'=>$idinspect));
   }
	
	public function actionSemilla($id,$idinspect,$identificador)
	{
		
			
		$form=Iform::model()->find('id=:id',array(':id'=>(int)$id));
		
		if($form->crop_id==1)
		{		
			$this->redirect(array('Informecampoarroz','id'=>$id,'number'=>$idinspect,'identificador'=>$identificador));			
		}
		if($form->crop_id==2)
		{			
			$this->redirect(array('Informecampoalgodon','id'=>$id,'number'=>$idinspect,'identificador'=>$identificador));
		}
		if($form->crop_id==3 || $form->crop_id==4 || $form->crop_id==5)
		{			
			$this->redirect(array('informecampocereales','id'=>$id,'number'=>$idinspect,'identificador'=>$identificador));
		}
		if($form->crop_id==6 || $form->crop_id==7 || $form->crop_id==8 || $form->crop_id==9 ||
			$form->crop_id==10 || $form->crop_id==11 || $form->crop_id==12)
		{			
			$this->redirect(array('Informecampoleguminosas','id'=>$id,'number'=>$idinspect,'identificador'=>$identificador));
		}
		if($form->crop_id==13)
		{			
			$this->redirect(array('Informecampomaiz','id'=>$id,'number'=>$idinspect,'identificador'=>$identificador));
		}
		if($form->crop_id==15)
		{			
			$this->redirect(array('Informecampopapa','id'=>$id,'number'=>$idinspect,'identificador'=>$identificador));
		}
		$this->render('semilla',array('id'=>$id));
	}
	
	public function actionInformecampoarroz($id,$number,$identificador)
   {
      $form=Iform::model()->findByPk($id);      
      $this->render('informecampoarroz',array('model'=>$form,'id'=>$number,'identificador'=>$identificador));
   }
	
	public function actionInformecampoalgodon($id,$number,$identificador)
   {
      $form=Iform::model()->findByPk($id);      
      $this->render('informecampoalgodon',array('model'=>$form,'id'=>$number,'identificador'=>$identificador));
   }
	
	public function actionInformecampocereales($id,$number,$identificador)
   {
      $form=Iform::model()->findByPk($id);      
      $this->render('informecampocereales',array('model'=>$form,'id'=>$number,'identificador'=>$identificador));
   }
	
	public function actionInformecampoleguminosas($id,$number,$identificador)
	{
		$form=Iform::model()->findByPk($id);      
      $this->render('informecampoleguminosas',array('model'=>$form,'id'=>$number,'identificador'=>$identificador));
	}
	
	public function actionInformecampomaiz($id,$number,$identificador)
	{
		$form=Iform::model()->findByPk($id);      
      $this->render('informecampomaiz',array('model'=>$form,'id'=>$number,'identificador'=>$identificador));
	}
	
   public function actionInformecampopapa($id,$number,$identificador)
   {
      $form=Iform::model()->findByPk($id);
      
      $this->render('informecampopapa',array('model'=>$form,'id'=>$number,'identificador'=>$identificador));
   }
	
	public function actionSolicitudacondicionamiento($id)
	{		
		$form=Iform::model()->findByPk($id);
		$acondicionamiento=Acondicionamiento::model()->find('form_id=:form_id',array(':form_id'=>$form->id));
      $this->render('solicitudacondicionamiento',array('model'=>$form,'acondicionamiento'=>$acondicionamiento));		
	}
	
	public function actionNotificacionacondicionamiento($id)
	{
		if($_REQUEST['identificador']==1){
		$muestreo=Muestreo::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$muestreo->form_id));
		$acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$muestreo->acondicionamiento_id));     
      $this->render('notificacionacondicionamiento',array('model'=>$form,'acondicionamiento'=>$acondicionamiento));
		}
		elseif($_REQUEST['identificador']==2)
		{
			
		$form=Iform::model()->findByPk($id);
		$acondicionamiento=Acondicionamiento::model()->find('form_id=:form_id',array(':form_id'=>$form->id));     
      $this->render('notificacionacondicionamiento',array('model'=>$form,'acondicionamiento'=>$acondicionamiento));
		}
		
	}
	public function actionMovilizacion($id)
	{
		$movilizacion=Movilizacion::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$movilizacion->form_id));
      $this->render('movilizacion',array('model'=>$form,'movilizacion'=>$movilizacion));
	}
	public function actionProduccion($id)
	{		
		$produccion=Produccion::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$produccion->form_id));
      $this->render('produccion',array('model'=>$form,'produccion'=>$produccion));
	}
	public function actionAcondicionamiento($id)
	{
		$form=Iform::model()->findByPk($id);      
      if($form->crop_id==15)
		{
			$this->redirect(array('informeacondicionamientopapa','id'=>$id));
		}
		else
		{
			$this->redirect(array('informeacondicionamientootros','id'=>$id));
		}
	}
	
	public function actionInformeacondicionamientootros($id)
	{
		$acondiconamiento=Acondicionamiento::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$acondiconamiento->form_id));
		
      $this->render('informeacondicionamientootros',array('model'=>$form,'acondicionamiento'=>$acondiconamiento));
	}
	public function actionInformeacondicionamientopapa($id)
	{
		$acondiconamiento=Acondicionamiento::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$acondiconamiento->form_id));
      $this->render('informeacondicionamientopapa',array('model'=>$form,'acondicionamiento'=>$acondiconamiento));
	}
	
	public function actionSolicitudmuestreo($id)
	{
		$muestreo=Muestreo::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$muestreo->form_id));
		$acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$muestreo->acondicionamiento_id));
      $this->render('solicitudmuestreo',array('model'=>$form,'muestreo'=>$muestreo,'acondiconamiento'=>$acondicionamiento));
	}
	public function actionNotificacionmuestreo($id)
	{
		$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$id));
		$form=Iform::model()->find('id=:id',array(':id'=>$muestreo->form_id));
		
      $this->render('notificacionmuestreo',array('model'=>$form,'muestreo'=>$muestreo));
	}
	public function actionInformemuestreo($id)
	{
		$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$id));
		$form=Iform::model()->find('id=:id',array(':id'=>$muestreo->form_id));
		$acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$muestreo->acondicionamiento_id));
      $this->render('informemuestreo',array('model'=>$form,'muestreo'=>$muestreo,'acondicionamiento'=>$acondicionamiento));
	}
	public function actionInformelaboratorio($id)
	{
		$laboratory=Laboratory::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$laboratory->form_id));
		$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$laboratory->muestreo_id));
      $this->render('informelaboratorio',array('model'=>$form,'laboratory'=>$laboratory,'muestreo'=>$muestreo));
	}
	public function actionInformeanalisis($id)
	{
		$form=Iform::model()->findByPk($id);      
      $this->render('informeanalisis',array('model'=>$form));
	}
	public function actionActaentregaetiquetas($id)
	{
		
		$etiquetado=Etiquetado::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$etiquetado->form_id));
		$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$etiquetado->muestreo_id));
		$etiquetas=Etiquetas::model()->findAll('etiquetado_id=:etiquetado_id',array(':etiquetado_id'=>$etiquetado->id));
      $this->render('actaentregaetiquetas',array('model'=>$form,'etiquetado'=>$etiquetado,'muestreo'=>$muestreo,'etiquetas'=>$etiquetas));
	}
	
	public function actionNotapago($id)
	{
		$user=User::model()->find('cruge_user_id=:cruge_user_id',array(':cruge_user_id'=>Yii::app()->user->id));
		$payments=Payment::model()->findAll('code=:code',array(':code'=>$id));
		$model=Payment::model()->find('code=:code',array(':code'=>$id));
      $this->render('notapago',array('payments'=>$payments,'user'=>$user,'model'=>$model));
	}
	public function actionNotaventa($id)
	{
		$code=Payment::model()->find('code=:code',array(':code'=>$id));
		$user=User::model()->find('id=:id',array(':id'=>$code->user_id));
		$payments=Payment::model()->findAll('code=:code',array(':code'=>$id));		
      $this->render('notaventa',array('payments'=>$payments,'user'=>$user));
	}
	
	public function actionConstanciacertificacion($id)
	{
		$etiquetado=Etiquetado::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$etiquetado->form_id));
		$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$etiquetado->muestreo_id));
		$etiquetas=Etiquetas::model()->findAll('etiquetado_id=:etiquetado_id',array(':etiquetado_id'=>$etiquetado->id));
		$this->render('constanciacertificacion',array('model'=>$form,'etiquetado'=>$etiquetado,'muestreo'=>$muestreo,'etiquetas'=>$etiquetas));
		
	}
	public function actionActaetiquetado($id)
	{
		$etiquetado=Etiquetado::model()->findByPk($id);
		$form=Iform::model()->find('id=:id',array(':id'=>$etiquetado->form_id));
		$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$etiquetado->muestreo_id));
		$etiquetas=Etiquetas::model()->findAll('etiquetado_id=:etiquetado_id',array(':etiquetado_id'=>$etiquetado->id));
		$this->render('actaetiquetado',array('model'=>$form,'etiquetado'=>$etiquetado,'muestreo'=>$muestreo,'etiquetas'=>$etiquetas));
		
	}
	
	
	
}  
   