<?php

class LaboratoryController extends Controller
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
				'actions'=>array('index','view','vista','updatevista'),
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
		$model=new Laboratory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Laboratory']))
		{
			$model->attributes=$_POST['Laboratory'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
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
		$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$model->muestreo_id));
		$form=Iform::model()->find('id=:id',array(':id'=>$model->form_id));
		$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$form->headquarter_id));
		$inbox=Inbox::model()->find('t.form_id=:form_id and t.to=:to and status_id=:status_id',
													 array(':form_id'=>$muestreo->form_id,':to'=>$muestreo->user_id,':status_id'=>24,));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Laboratory']))
		{
			$model->attributes=$_POST['Laboratory'];
			$model->fecha_informe=date('Y-m-d');
			$model->peso_recibido=str_replace(',','',$_POST['Laboratory']['peso_recibido']);
			$model->semilla_pura=str_replace(',','',$_POST['Laboratory']['semilla_pura']);
			$model->materia_inerte=str_replace(',','',$_POST['Laboratory']['materia_inerte']);
			$model->otras_semillas=str_replace(',','',$_POST['Laboratory']['otras_semillas']);
			$model->plantulas_normales=str_replace(',','',$_POST['Laboratory']['plantulas_normales']);
			$model->semillas_duras=str_replace(',','',$_POST['Laboratory']['semillas_duras']);
			$model->semillas_frescas=str_replace(',','',$_POST['Laboratory']['semillas_frescas']);
			$model->plantulas_anormales=str_replace(',','',$_POST['Laboratory']['plantulas_anormales']);
			$model->semillas_muertas=str_replace(',','',$_POST['Laboratory']['semillas_muertas']);
			$model->contenido_humedad=str_replace(',','',$_POST['Laboratory']['contenido_humedad']);
			$model->date_recepcion=date('Y-m-d',strtotime($_POST['Laboratory']['date_recepcion']));
			$model->date_termino_analisis=date('Y-m-d',strtotime($_POST['Laboratory']['date_termino_analisis']));
			$model->informe=1;
			
			if($inbox===null){
			$aprobado=new Inbox;
			$aprobado->date=date('Y-m-d');
			$aprobado->form_id=$muestreo->form_id;
			$aprobado->to=$muestreo->user_id;
			$aprobado->status_id=24;
			$aprobado->estado=1;
			$aprobado->save();
			}
			if($headquarter->tipo_empresa=="2"){
			$etiquetado=new Etiquetado;
			$etiquetado->user_id=$muestreo->user_id;
			$etiquetado->form_id=$muestreo->form_id;
			$etiquetado->muestreo_id=$muestreo->id;
			$etiquetado->save();
			}
			if($model->save())
				$this->redirect(array('iform/laboratorio'));
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
		$dataProvider=new CActiveDataProvider('Laboratory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Laboratory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Laboratory']))
			$model->attributes=$_GET['Laboratory'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Laboratory the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Laboratory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Laboratory $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='laboratory-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionVista()
	{
		$model=new Laboratory;
		$data="";
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		$this->render('vista',array(
			'model'=>$model,'id'=>$data
		));
	}
	public function actionUpdatevista($id)
	{	
		$data = "$id"; 
		$this->renderPartial('_ajaxContent', array('id'=>$data));
	}
}
