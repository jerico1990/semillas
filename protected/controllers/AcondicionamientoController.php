<?php

class AcondicionamientoController extends Controller
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
				'actions'=>array('index','view','general','papa','cumple','reetiquetado','nacondicionamiento','condicional','muestreo','rechazado'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','createpapa','creategeneral'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Acondicionamiento;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acondicionamiento']))
		{
			$model->attributes=$_POST['Acondicionamiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionCreatepapa()
	{
		$model=new Acondicionamiento;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acondicionamiento']))
		{
			$model->attributes=$_POST['Acondicionamiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('createpapa',array(
			'model'=>$model,
		));
	}
	public function actionCreategeneral()
	{
		
		
		$model=new Acondicionamiento;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acondicionamiento']))
		{
			$model->attributes=$_POST['Acondicionamiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('creategeneral',array(
			'model'=>$model,
		));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acondicionamiento']))
		{
			$model->attributes=$_POST['Acondicionamiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Acondicionamiento');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Acondicionamiento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Acondicionamiento']))
			$model->attributes=$_GET['Acondicionamiento'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Acondicionamiento the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Acondicionamiento::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Acondicionamiento $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='acondicionamiento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGeneral($id)
	{
	    $this->pageTitle = "Acondicionamiento General";
	    $model=$this->loadModel($id);
	    if(isset($_POST['Acondicionamiento']))
	    {
		$acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$model->id));
		$form=Iform::model()->find('id=:id',array(':id'=>$acondicionamiento->form_id));
		$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$form->headquarter_id));
		$muestreo=Muestreo::model()->find('acondicionamiento_id=:acondicionamiento_id',array(':acondicionamiento_id'=>$acondicionamiento->id));
		$model->attributes=$_POST['Acondicionamiento'];
		$model->save();
		
		if($form->crop_id==1 || $form->crop_id==2 || $form->crop_id==3 || $form->crop_id==4 || $form->crop_id==5 || $form->crop_id==6 || $form->crop_id==7 || $form->crop_id==8 || $form->crop_id==9 || $form->crop_id==10 || $form->crop_id==11 ||$form->crop_id==12 || $form->crop_id==13)			
		{
		    if($headquarter->tipo_empresa==2)
		    {
			$this->Muestreo($form->id,$form->user_id);
		    }
		    else if($headquarter->tipo_empresa==1 && $muestreo!==null)
		    {
			$muestreo->fecha_informe_acondicionamiento=date('Y-m-d');
			$muestreo->informe_acondicionamiento=1;
			$muestreo->save();
		    }
		}
		else if ($form->crop_id==15)
		{
		    $acondicionamiento->afectadas_erwinia=str_replace(',','',$acondicionamiento->afectadas_erwinia);
		    $acondicionamiento->afectadas_fusarium=str_replace(',','',$acondicionamiento->afectadas_fusarium);
		    $acondicionamiento->afectadas_rhizoctoniasis=str_replace(',','',$acondicionamiento->afectadas_rhizoctoniasis);
		    $acondicionamiento->afectadas_mezcla_varietal=str_replace(',','',$acondicionamiento->afectadas_mezcla_varietal);
		    $acondicionamiento->afectadas_fuera_tamano=str_replace(',','',$acondicionamiento->afectadas_fuera_tamano);
		    $acondicionamiento->observacion=$acondicionamiento->observacion;
		    $acondicionamiento->update();
		    if($headquarter->tipo_empresa==2)
		    {
			$this->Muestreo($form->id,$form->user_id);
		    }
		}
		$this->redirect(array('view','id'=>$model->id));
	    }

	    $this->render('general',array(
		    'model'=>$model,
	    ));
	}
	public function actionPapa($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acondicionamiento']))
		{
			$model->attributes=$_POST['Acondicionamiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('papa',array(
			'model'=>$model,
		));
	}
	/*public function actionPapa($id)
	{
		$this->layout = 'main_downloadable';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acondicionamiento']))
		{
			$model->attributes=$_POST['Acondicionamiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('papa',array(
			'model'=>$model,
		));
	}*/
	/*public function actionMovilizacion($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acondicionamiento']))
		{
			$model->attributes=$_POST['Acondicionamiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('movilizacion',array(
			'model'=>$model,
		));
	}
	public function actionProduccion($id)
	{
		$model=Iform::model()->findByPk($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$this->render('produccion',array(
			'model'=>$model,
		));
	}
	/*public function actionProducciona()
	{
		//Form
		$form=Iform::model()->find('id=:id',array(':id'=>$_REQUEST['id_form']));
		$form->produccion_area=str_replace(',','',$_REQUEST['produccion_area']);
		$form->produccion_total=str_replace(',','',$_REQUEST['produccion_total']);
		$form->produccion_fecha_cosecha=$_REQUEST['produccion_fecha_cosecha'];
		$form->save();
		//Acondicionamiento
		$acond=Acondicionamiento::model()->find('id=:id',array(':id'=>$_REQUEST['id_acondicionamiento']));
		$acond->proposed_date=$_REQUEST['proposed_date'];
		$acond->proposed_time=$_REQUEST['proposed_time'];
		$acond->save();
		//Inbox
		//$inbox=Inbox::model()->find('',array('')=>));
		//Nuevo Inbox
		
	}
	public function actionMovilizaciona()
	{
		
		//Acondicionamiento
		$acondiconamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$_REQUEST['id_acondicionamiento']));
		
		$acondiconamiento->number_envases=$_REQUEST['Acondicionamiento']['number_envases'];
		$acondiconamiento->capacidad_envases=str_replace(',','',$_REQUEST['Acondicionamiento']['capacidad_envases']);
		$acondiconamiento->movilizacion_cantidad=str_replace(',','',$_REQUEST['Acondicionamiento']['movilizacion_cantidad']);
		$acondiconamiento->movilizacion_fecha=$_REQUEST['Acondicionamiento']['movilizacion_fecha'];
		$acondiconamiento->movilizacion_origen=$_REQUEST['Acondicionamiento']['movilizacion_origen'];
		$acondiconamiento->movilizacion_origen_predio=$_REQUEST['Acondicionamiento']['movilizacion_origen_predio'];
		$acondiconamiento->movilizacion_destino=$_REQUEST['Acondicionamiento']['movilizacion_destino'];
		$acondiconamiento->movilizacion_destino_predio=$_REQUEST['Acondicionamiento']['movilizacion_destino_predio'];
		$acondiconamiento->registro_planta=$_REQUEST['Acondicionamiento']['registro_planta'];
		$acondiconamiento->movilizacion_origen_distrito=$_REQUEST['Acondicionamiento']['movilizacion_origen_distrito'];
		$acondiconamiento->movilizacion_destino_distrito=$_REQUEST['Acondicionamiento']['movilizacion_destino_distrito'];
		$acondiconamiento->save();	
	
	}*/
	public function actionReetiquetado($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acondicionamiento']))
		{
			$model->attributes=$_POST['Acondicionamiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('reetiquetado',array(
			'model'=>$model,
		));
	}
	
	
	public function actionCumple()
	{
	    $acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$_REQUEST['id']));
	    $form=Iform::model()->find('id=:id',array(':id'=>$acondicionamiento->form_id));
	    $headquarter=Headquarter::model()->find('id=:id',array(':id'=>$form->headquarter_id));
	    $muestreo=Muestreo::model()->find('acondicionamiento_id=:acondicionamiento_id',array(':acondicionamiento_id'=>$acondicionamiento->id));
	    if($form->crop_id==1 || $form->crop_id==2 || $form->crop_id==3 || $form->crop_id==4 ||
		    $form->crop_id==5 || $form->crop_id==6 || $form->crop_id==7 || $form->crop_id==8 ||
		    $form->crop_id==9 || $form->crop_id==10 || $form->crop_id==11 ||$form->crop_id==12 || $form->crop_id==13)			
	    {
		    
		    $acondicionamiento->district_id=$_REQUEST['general_distrito'];
		    $acondicionamiento->address=$_REQUEST['general_address'];			
		    $acondicionamiento->fecha_cosecha=date('Y-m-d',strtotime($_REQUEST['general_fecha_cosecha']));
		    $acondicionamiento->descripcion_secado=$_REQUEST['general_descripcion_secado'];
		    $acondicionamiento->disponibilidad=$_REQUEST['general_disponibilidad'];			
		    $acondicionamiento->registro_planta=$_REQUEST['general_registro_planta'];			
		    $acondicionamiento->tipo_envase=$_REQUEST['general_tipo_envase'];
		    $acondicionamiento->descripcion=$_REQUEST['general_descripcion'];
		    $acondicionamiento->operatividad=$_REQUEST['general_operatividad'];
		    $acondicionamiento->limpieza=$_REQUEST['general_limpieza'];
		    $acondicionamiento->identificacion_lote_semilla=(int)$_REQUEST['general_identificacion_lote_semilla'];
		    $acondicionamiento->observacion=$_REQUEST['general_observacion'];			
		    $acondicionamiento->number_envases=(int)str_replace(',','',$_REQUEST['general_number_envases']);			
		    $acondicionamiento->capacidad_envases=(int)str_replace(',','',$_REQUEST['general_capacidad_envases']);
		    $acondicionamiento->peso_estimado=(int)str_replace(',','',$_REQUEST['general_peso_estimado']);
		    $acondicionamiento->peso_ingreso=(int)str_replace(',','',$_REQUEST['general_peso_ingreso']);
		    $acondicionamiento->cantidad_lotes=(int)str_replace(',','',$_REQUEST['general_cantidad_lotes']);
		    $acondicionamiento->cantidad_envases=(int)str_replace(',','',$_REQUEST['general_cantidad_envases']);
		    $acondicionamiento->save();
		    
		    if($headquarter->tipo_empresa==2)
		    {
			    $this->Muestreo($form->id,$form->user_id);
		    }
		    else if($headquarter->tipo_empresa==1 && $muestreo!==null)
		    {
			    $muestreo->fecha_informe_acondicionamiento=date('Y-m-d');
			    $muestreo->informe_acondicionamiento=1;
			    $muestreo->save();			
		    }
	    }
	    else if ($form->crop_id==15)
	    {
		    //Cambiar para Papa
		    $acondicionamiento->afectadas_erwinia=str_replace(',','',$_REQUEST['papa_erwinia']);
		    $acondicionamiento->afectadas_fusarium=str_replace(',','',$_REQUEST['papa_fusarium']);
		    $acondicionamiento->afectadas_rhizoctoniasis=str_replace(',','',$_REQUEST['papa_rhizoctoniasis']);
		    $acondicionamiento->afectadas_mezcla_varietal=str_replace(',','',$_REQUEST['papa_varietal']);
		    $acondicionamiento->afectadas_fuera_tamano=str_replace(',','',$_REQUEST['papa_tamano']);
		    $acondicionamiento->observacion=$_REQUEST['papa_observacion'];
		    $acondicionamiento->save();			
		    
		    if($headquarter->tipo_empresa==2)
		    {
			    $this->Muestreo($form->id,$form->user_id);
		    }
	    }		
	}
	
	public function actionCondicional()
	{	
		$acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$_REQUEST['condicional_acondicionamientoa_id']));
		$form=Iform::model()->find('id=:id',array(':id'=>$acondicionamiento->form_id));
		
		if($form->crop_id==1 || $form->crop_id==2 || $form->crop_id==3 || $form->crop_id==4 ||
			$form->crop_id==5 || $form->crop_id==6 || $form->crop_id==7 || $form->crop_id==8 ||
			$form->crop_id==9 || $form->crop_id==10 || $form->crop_id==11 || $form->crop_id==12 || $form->crop_id==13)			
		{
		    $acondicionamiento->subsanacion_date=$_REQUEST['Acondicionamiento']['subsanacion_date'];
		    $acondicionamiento->district_id=$_REQUEST['Acondicionamiento']['district_id'];
		    $acondicionamiento->address=$_REQUEST['Acondicionamiento']['address'];
		    $acondicionamiento->number_envases=$_REQUEST['Acondicionamiento']['number_envases'];
		    $acondicionamiento->capacidad_envases=$_REQUEST['Acondicionamiento']['capacidad_envases'];
		    $acondicionamiento->peso_estimado=$_REQUEST['Acondicionamiento']['peso_estimado'];
		    $acondicionamiento->fecha_cosecha=$_REQUEST['Acondicionamiento']['fecha_cosecha'];
		    $acondicionamiento->descripcion_secado=$_REQUEST['Acondicionamiento']['descripcion_secado'];
		    $acondicionamiento->disponibilidad=$_REQUEST['Acondicionamiento']['disponibilidad'];
		    $acondicionamiento->peso_ingreso=$_REQUEST['Acondicionamiento']['peso_ingreso'];
		    $acondicionamiento->registro_planta=$_REQUEST['Acondicionamiento']['registro_planta'];
		    $acondicionamiento->cantidad_lotes=$_REQUEST['Acondicionamiento']['cantidad_lotes'];
		    $acondicionamiento->cantidad_envases=$_REQUEST['Acondicionamiento']['cantidad_envases'];
		    $acondicionamiento->tipo_envase=$_REQUEST['Acondicionamiento']['tipo_envase'];
		    $acondicionamiento->descripcion=$_REQUEST['Acondicionamiento']['descripcion'];
		    $acondicionamiento->operatividad=$_REQUEST['Acondicionamiento']['operatividad'];
		    $acondicionamiento->limpieza=$_REQUEST['Acondicionamiento']['limpieza'];
		    $acondicionamiento->identificacion_lote_semilla=$_REQUEST['Acondicionamiento']['identificacion_lote_semilla'];
		    $acondicionamiento->observacion=$_REQUEST['Acondicionamiento']['observacion'];
		    $acondicionamiento->subsanacion=1;
		    $acondicionamiento->save();
		}
		else if($form->crop_id==15)
		{
		    $acondicionamiento->subsanacion_date=$_REQUEST['Acondicionamiento']['subsanacion_date'];
		    $acondicionamiento->afectadas_erwinia=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_erwinia']);
		    $acondicionamiento->afectadas_fusarium=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_fusarium']);
		    $acondicionamiento->afectadas_rhizoctoniasis=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_rhizoctoniasis']);
		    $acondicionamiento->afectadas_mezcla_varietal=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_varietal']);
		    $acondicionamiento->afectadas_fuera_tamano=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_tamano']);
		    $acondicionamiento->observacion=$_REQUEST['Acondicionamiento']['papa_observacion'];
		    $acondicionamiento->subsanacion=1;
		    $acondicionamiento->save();			
		}
		$condicional=new Inbox;
		$condicional->date=date('Y-m-d');
		$condicional->form_id=$acondicionamiento->form_id;
		$condicional->to=$acondicionamiento->user_id;
		$condicional->status_id=16;
		$condicional->estado=1;
		$condicional->save();
	}
	
	public function actionRechazado()
	{
			/*
			$criteria=new CDbCriteria;
			$criteria->select='max(code) as code';
			$criteria->condition='form_id=:form_id';
			$max = Acondicionamiento::model()->find($criteria);
			$max = $max->code + 1;
			*/
			
		//$acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$_REQUEST['condicional_acondicionamientoa_id']));
		$acondicionamiento=new Acondicionamiento;
		$form=Iform::model()->find('id=:id',array(':id'=>$acondicionamiento->form_id));
		
		if($form->crop_id==1 || $form->crop_id==2 || $form->crop_id==3 || $form->crop_id==4 ||
			$form->crop_id==5 || $form->crop_id==6 || $form->crop_id==7 || $form->crop_id==8 ||
			$form->crop_id==9 || $form->crop_id==10 || $form->crop_id==11 ||$form->crop_id==12 || $form->crop_id==13)			
		{
			
			//$acondicionamiento->acondicionamiento_number=1;
			$acondicionamiento->district_id=$_REQUEST['Acondicionamiento']['district_id'];
			$acondicionamiento->address=$_REQUEST['Acondicionamiento']['address'];
			$acondicionamiento->number_envases=$_REQUEST['Acondicionamiento']['number_envases'];
			$acondicionamiento->capacidad_envases=$_REQUEST['Acondicionamiento']['capacidad_envases'];
			$acondicionamiento->peso_estimado=$_REQUEST['Acondicionamiento']['peso_estimado'];
			$acondicionamiento->fecha_cosecha=$_REQUEST['Acondicionamiento']['fecha_cosecha'];
			$acondicionamiento->descripcion_secado=$_REQUEST['Acondicionamiento']['descripcion_secado'];
			$acondicionamiento->disponibilidad=$_REQUEST['Acondicionamiento']['disponibilidad'];
			$acondicionamiento->peso_ingreso=$_REQUEST['Acondicionamiento']['peso_ingreso'];
			$acondicionamiento->registro_planta=$_REQUEST['Acondicionamiento']['registro_planta'];
			$acondicionamiento->cantidad_lotes=$_REQUEST['Acondicionamiento']['cantidad_lotes'];
			$acondicionamiento->cantidad_envases=$_REQUEST['Acondicionamiento']['cantidad_envases'];
			$acondicionamiento->tipo_envase=$_REQUEST['Acondicionamiento']['tipo_envase'];
			$acondicionamiento->descripcion=$_REQUEST['Acondicionamiento']['descripcion'];
			$acondicionamiento->operatividad=$_REQUEST['Acondicionamiento']['operatividad'];
			$acondicionamiento->limpieza=$_REQUEST['Acondicionamiento']['limpieza'];
			$acondicionamiento->identificacion_lote_semilla=$_REQUEST['Acondicionamiento']['identificacion_lote_semilla'];
			$acondicionamiento->observacion=$_REQUEST['Acondicionamiento']['observacion'];
			$acondicionamiento->rechazado=1;
			$acondicionamiento->save();
			
			
		}
		else if($form->crop_id==15)
		{
			
			$acondicionamiento->afectadas_erwinia=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_erwinia']);
			$acondicionamiento->afectadas_fusarium=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_fusarium']);
			$acondicionamiento->afectadas_rhizoctoniasis=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_rhizoctoniasis']);
			$acondicionamiento->afectadas_mezcla_varietal=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_varietal']);
			$acondicionamiento->afectadas_fuera_tamano=str_replace(',','',$_REQUEST['Acondicionamiento']['papa_tamano']);
			$acondicionamiento->observacion=$_REQUEST['Acondicionamiento']['papa_observacion'];
			$acondicionamiento->rechazado=1;
			$acondicionamiento->save();
		}
		
		$rechazado=new Inbox;
		$rechazado->date=date('d/m/y');
		$rechazado->form_id=$acondicionamiento->form_id;
		$rechazado->to=$acondicionamiento->user_id;
		$rechazado->status_id=15;
		$rechazado->estado=1;
		$rechazado->save();
		
	}
	
	public function actionNacondicionamiento($max,$fecha,$usuario,$formulario)
	{
		$sacondicionamiento=new Acondicionamiento;
		$sacondicionamiento->acondicionamiento_number=$max;
		$sacondicionamiento->proposed_date=$fecha;
		$sacondicionamiento->user_id=$usuario;
		$sacondicionamiento->form_id=$formulario;
		$sacondicionamiento->save();										
	}
	
	public function Muestreo($form,$user)
	{
		
		$productor=Inbox::model()->find('t.to=:to and form_id=:form_id and status_id=:status_id',
												  array(':form_id'=>$form,':to'=>$user,':status_id'=>17));
		$productor->estado=0;
		$productor->save();
		
		//Nuevo Acondcionamiento Solicitada
		$inbox=new Inbox;
		$inbox->date=date('Y-m-d');
		$inbox->form_id=$form;
		$inbox->status_id=18;
		$inbox->estado=1;
		$inbox->to=$user;
		$inbox->save();
	}
	
	
	
}
