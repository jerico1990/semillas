<?php

class EtiquetadoController extends Controller
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
				'actions'=>array('index','view','vista','solicitud','notificacion'),
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
		$model=new Etiquetado;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Etiquetado']))
		{
			$model->attributes=$_POST['Etiquetado'];
			$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$_REQUEST['id']));		
			$muestreo->etiquetado_notificacion=0;
			$muestreo->save();
			//$etiquetado->cantidad=$total;
			$model->user_id=$muestreo->user_id;
			$model->form_id=$muestreo->form_id;
			$model->muestreo_id=$muestreo->id;
			$model->fecha_emitir_etiquetado=date('Y-m-d');			
			$model->peso_total=str_replace(',','',$_POST['Etiquetado']['peso_total']);
			$model->save();
			
			
			
			if($model->save()){
				
				$total=0;
				for($i = 0; $i < (count($_POST['Etiquetado'])); ++$i)
					{				
						if(isset( $_REQUEST['Etiquetado']['cantidad_'.$i.'']) && $_REQUEST['Etiquetado']['cantidad_'.$i.'']!=="")
						{
							$etiquetas=new Etiquetas;
							$etiquetas->user_id=$muestreo->user_id;
							$etiquetas->form_id=$muestreo->form_id;
							$etiquetas->muestreo_id=$muestreo->id;
							$etiquetas->serie_inicio=$_REQUEST['Etiquetado']['inicio_'.$i.''];
							$etiquetas->serie_fin=$_REQUEST['Etiquetado']['fin_'.$i.''];
							$etiquetas->cantidad=(int)$_REQUEST['Etiquetado']['cantidad_'.$i.''];
							$etiquetas->etiquetado_id=$model->id;
							$etiquetas->save();
							$total=$total+$etiquetas->cantidad+$model->cantidad;
						}
					}
				$etiquetadoup=Etiquetado::model()->find('id=:id',array(':id'=>$model->id));
				$etiquetadoup->cantidad=$total;
				$etiquetadoup->save();
				$this->redirect(array('iform/ivetiquetado','id'=>$model->form_id));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Etiquetado']))
		{
			
			
			$model->attributes=$_POST['Etiquetado'];
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
		$dataProvider=new CActiveDataProvider('Etiquetado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Etiquetado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Etiquetado']))
			$model->attributes=$_GET['Etiquetado'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Etiquetado the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Etiquetado::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Etiquetado $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='etiquetado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionVista($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Etiquetado']))
		{
			$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$model->muestreo_id));		
			$muestreo->etiquetado_notificacion=0;
			$muestreo->save();
			$model->attributes=$_POST['Etiquetado'];		
			$model->fecha_emitir_etiquetado=date('Y-m-d');		
			$model->save();
			
			$total=0;
			for($i = 0; $i < (count($_POST['Etiquetado'])); ++$i)
				{				
					if(isset( $_REQUEST['Etiquetado']['cantidad_'.$i.'']) && $_REQUEST['Etiquetado']['cantidad_'.$i.'']!=="")
					{
						$etiquetas=new Etiquetas;
						$etiquetas->user_id=$model->user_id;
						$etiquetas->form_id=$model->form_id;
						$etiquetas->muestreo_id=$model->muestreo_id;
						$etiquetas->serie_inicio=$_REQUEST['Etiquetado']['inicio_'.$i.''];
						$etiquetas->serie_fin=$_REQUEST['Etiquetado']['fin_'.$i.''];
						$etiquetas->cantidad=(int)$_REQUEST['Etiquetado']['cantidad_'.$i.''];
						$etiquetas->etiquetado_id=$model->id;
						$etiquetas->save();
						$total=$total+$etiquetas->cantidad+$model->cantidad;
					}
				}
				
			$model->cantidad=$total;
			$model->fecha_solicitud=date('Y-m-d');
			$model->peso_total=str_replace(',','',$_POST['Etiquetado']['peso_total']);
			if($model->save())
				$this->redirect(array('iform/iindex'));
		}
		$this->render('vista',array(
			'model'=>$model,
		));
	}
	
	public function actionSolicitud($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Etiquetado']))
		{		
			$model->attributes=$_POST['Etiquetado'];
			$model->fecha_solicitud=date('Y-m-d');
			$model->solicitud=1;
			$model->fecha_solicitud_etiquetado=date('Y-m-d',strtotime($_POST['Etiquetado']['fecha_solicitud_etiquetado']));			
			$model->hora_solicitud_etiquetado=date('H:i',strtotime($_POST['Etiquetado']['hora_solicitud_etiquetado']));
			if($model->save())
				$this->redirect(array('iform/vetiquetado','id'=>$model->form_id));
		}

		$this->render('solicitud',array(
			'model'=>$model,
		));
	}
	public function actionNotificacion($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Etiquetado']))
		{		
			$model->attributes=$_POST['Etiquetado'];
			$model->fecha_notificado=date('Y-m-d');
			$model->notificado=1;
			$model->informe=1;
			$model->fecha_notificado_etiquetado=date('Y-m-d',strtotime($_POST['Etiquetado']['fecha_notificado_etiquetado']));			
			$model->hora_notificado_etiquetado=date('H:i',strtotime($_POST['Etiquetado']['hora_notificado_etiquetado']));
			if($model->save())
				$this->redirect(array('iform/ivetiquetado','id'=>$model->form_id));
		}

		$this->render('notificacion',array(
			'model'=>$model,
		));
	}
}
