<?php

class LeguminosasController extends Controller
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
	public function actionCreate()
	{
		$model=new Inspection;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inspection']))
		{
			$model->attributes=$_POST['Inspection'];
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
		$this->pageTitle = "Leguminosas";
		$model=$this->loadModel($id);
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inspection']))
		{
		    $model->attributes=$_POST['Inspection'];
		    $model->leg_fecha_siembra=date("Y-m-d", strtotime($model->leg_fecha_siembra));
		    $model->leg_emergencia_fecha=date("Y-m-d", strtotime($model->leg_emergencia_fecha));
		    $model->leg_floracion_fecha=date("Y-m-d", strtotime($model->leg_floracion_fecha));
		    $model->leg_fecha_cosecha=date("Y-m-d", strtotime($model->leg_fecha_cosecha));
		    $model->size=str_replace(',','',$model->size);
		    $model->leg_floracion=str_replace(',','',$model->leg_floracion);
		    $model->leg_llenado_grano=str_replace(',','',$model->leg_llenado_grano);
		    $model->leg_distanciamiento_surcos=str_replace(',','',$model->leg_distanciamiento_surcos);
		    $model->leg_mata=str_replace(',','',$model->leg_mata);
		    $model->leg_campo_comercial=str_replace(',','',$model->leg_campo_comercial);
		    $model->leg_otra_especie=str_replace(',','',$model->leg_otra_especie);
		    $model->leg_otro_cultivar=str_replace(',','',$model->leg_otro_cultivar);
		    $model->leg_mosaicos=str_replace(',','',$model->leg_mosaicos);
		    $model->leg_moteado=str_replace(',','',$model->leg_moteado);
		    $model->leg_bacteriosis=str_replace(',','',$model->leg_bacteriosis);
		    $model->leg_mancha_angular=str_replace(',','',$model->leg_mancha_angular);
		    $fecha=date("Y-m-d", strtotime($model->aprobado_fecha_propuesta));
		    if($model->y01==1)//cumple
		    {
			if($model->select_id==2){
			    $max=$model->inspection_number+1;
			    $model->Inspeccion($max,$fecha,$form->user_id,$form->id,$form->headquarter_id);
			}
			elseif($model->select_id==1){
			    $model->Acondicionamiento($fecha,$form->id,$model->id,$form->user_id);
			}
		    }
		    elseif($model->y01==2)//condicional
		    {
			$model->subsanacion_date=date("Y-m-d", strtotime($model->subsanacion_date));
			$model->subsanacion=1;
		    }
		    elseif($model->y01==3)//denegado
		    {
			$model->rechazado=1;
		    }
		    $model->update();
		    return $this->redirect(array('iform/ivcampo','id'=>$model->form_id));
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
		$dataProvider=new CActiveDataProvider('Inspection');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Inspection('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Inspection']))
			$model->attributes=$_GET['Inspection'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Inspection the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Inspection::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Inspection $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inspection-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
