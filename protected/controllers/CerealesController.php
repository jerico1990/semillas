<?php

class CerealesController extends Controller
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
	    $this->pageTitle = "Cereales";
	    $model=$this->loadModel($id);
	    $form=Iform::model()->findByPk($model->form_id);

	    // Uncomment the following line if AJAX validation is needed
	    // $this->performAjaxValidation($model);

	    if(isset($_POST['Inspection']))
	    {
		$model->attributes=$_POST['Inspection'];
		$model->cer_fecha_siembra=date("Y-m-d", strtotime($model->cer_fecha_siembra));
		$model->size=str_replace(',','',$model->size);
		$model->cer_floracion=str_replace(',','',$model->cer_floracion);
		$model->cer_maduracion=str_replace(',','',$model->cer_maduracion);
		$model->cer_cantidad_semilla=str_replace(',','',$model->cer_cantidad_semilla);
		$model->cer_aislamiento=str_replace(',','',$model->cer_aislamiento);
		$model->cer_otra_cultivar=str_replace(',','',$model->cer_otra_cultivar);
		$model->cer_otra_categoria=str_replace(',','',$model->cer_otra_categoria);
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
