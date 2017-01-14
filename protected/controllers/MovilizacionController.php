<?php

class MovilizacionController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
	public function actionCreate($id=null)
	{
		$this->pageTitle = "Movilización";
		$model=new Movilizacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Movilizacion']))
		{
		    //var_dump($_REQUEST);die;
		    $model->attributes=$_POST['Movilizacion'];
		    $model->form_id=$id;
		    $model->fecha=date('Y-m-d',strtotime($_REQUEST['Movilizacion']['fecha']));
		    $model->cantidad_envases=str_replace(',','',$_REQUEST['Movilizacion']['cantidad_envases']);
		    $model->capacidad_envases=str_replace(',','',$_REQUEST['Movilizacion']['capacidad_envases']);
		    $model->cantidad_movilizar=str_replace(',','',$_REQUEST['Movilizacion']['cantidad_movilizar']);
		    $model->destino_registro=$_REQUEST['destino_registro'];
		    if($model->save())
		    {
			$this->redirect(array('iform/movilizacionindex'));
		    }
		}
		
		$plantas = Plantas::model()->findAll(array('select'   => 't.registry',));
		$plantarr = array();
		foreach ($plantas as $planta) {
		    $plantarr[] = $planta->registry;
		}
		$plantas=CJSON::encode($plantarr);
		$this->render('create',array(
			'model'=>$model,'id'=>$id,'plantas'=>$plantas
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

		if(isset($_POST['Movilizacion']))
		{
			$model->attributes=$_POST['Movilizacion'];
			if($model->save())
				$this->redirect(array('iform/movilizacionindex'));
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
		$dataProvider=new CActiveDataProvider('Movilizacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Movilizacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Movilizacion']))
			$model->attributes=$_GET['Movilizacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Movilizacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Movilizacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Movilizacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='movilizacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
