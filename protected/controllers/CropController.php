<?php

class CropController extends Controller
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
				'actions'=>array('index','view','variedad','variedadanterior'),
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
		$this->pageTitle = "Detalle Cultivo";
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
		$this->pageTitle = "Crear Cultivo";
		$model=new Crop;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Crop']))
		{
			$model->attributes=$_POST['Crop'];
			$model->date=date('Y-m-d');
			$crop=Crop::model()->find('parent is null and name=:name', array(':name'=>$_POST['Crop']['name']));
			
			if($crop===null)
			{
				if($_POST['Crop']['status']==1)
				{$model->search_estado="Habilitado";}
				elseif($_POST['Crop']['status']==2)
				{$model->search_estado="Deshabilitado";}
				
				if($model->save())
					$this->redirect(array('admin'));
			}
			else
			{
				$this->redirect(array('index'));
			}
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
		$this->pageTitle = "Actualizar Cultivo";
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Crop']))
		{
			$model->attributes=$_POST['Crop'];
			if($model->save())
				$this->redirect(array('admin'));
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
		$this->pageTitle = "Cultivo";
		$dataProvider=new CActiveDataProvider('Crop',array(
								   'criteria' => array(
										       'condition' => 'parent is null'))
						      );
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->pageTitle = "Administrar Cultivo";
		$model=new Crop('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Crop']))
			$model->attributes=$_GET['Crop'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Crop the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Crop::model()->find('id=:id and parent is null', array(':id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Crop $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='crop-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	
	public function actionVariedad($crop)
	{
		
		$criteria=new CDbCriteria;
		$criteria->select='id,name';  // seleccionar solo la columna 'title'
		$criteria->condition='parent=:parent and status=1';
		$criteria->params=array(':parent'=>$crop);
		
		$cultivar = Crop::model()->findAll($criteria); // $params no es necesario
		$options="";
		foreach ($cultivar as $data) {
			$options=$options."<option value='$data->id'>$data->name</option>";		
		}
		//var_dump($options);die;
		echo $options;		
	}
	public function actionVariedadanterior($crop)
	{		
		$criteria=new CDbCriteria;
		$criteria->select='id,name';  // seleccionar solo la columna 'title'
		$criteria->condition='parent=:parent and status=1';
		$criteria->params=array(':parent'=>$crop);
		
		$cultivar = Crop::model()->findAll($criteria); // $params no es necesario
		$options="";
		foreach ($cultivar as $data) {
			$options=$options."<option value='$data->id'>$data->name</option>";				
		}
		echo $options;
	}
	public function actionCategory()
	{		
		/*$criteria=new CDbCriteria;
		$criteria->select='id,name';  // seleccionar solo la columna 'title'
		$criteria->condition='parent=:parent';
		$criteria->params=array(':parent'=>$_REQUEST['crop_id']);
		*/
		
		//$cultivar = Crop::model()->findAll($criteria); // $params no es necesario
		//echo $_REQUEST['variety_id'];
		
		echo CHtml::tag('option',array('value'=>'1'),CHtml::encode('a'),true);
		
		/*foreach ($cultivar as $data) {
			echo CHtml::tag('option',
			array('value'=>$data->id),CHtml::encode($data->name),true);			
		}*/
		
		
	}
}
