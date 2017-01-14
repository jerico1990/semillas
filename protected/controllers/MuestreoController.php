<?php

class MuestreoController extends Controller
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
				'actions'=>array('index','view','vista','notificacion','tecnico','lotes'),
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
		$model=new Muestreo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Muestreo']))
		{
			$model->attributes=$_POST['Muestreo'];
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
		$this->pageTitle = "Actualizar muestreo";
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Muestreo']))
		{
		
			$model->attributes=$_POST['Muestreo'];
			if($_REQUEST['btn']=='aceptar')
			{
				$model->informe=1;
				$model->fecha_informe=date('Y-m-d');
				$model->fecha_muestreo=date('Y-m-d',strtotime($_POST['Muestreo']['fecha_muestreo']));
				$model->tipo_analisis_germinacion=(int)$_POST['Muestreo']['tipo_analisis_germinacion'];
				$model->tipo_analisis_humedad=(int)$_POST['Muestreo']['tipo_analisis_humedad'];
				$model->tipo_analisis_pureza=(int)$_POST['Muestreo']['tipo_analisis_pureza'];
				$model->tipo_analisis_otras_especies=(int)$_POST['Muestreo']['tipo_analisis_otras_especies'];
				$model->peso_muestra=(int)$_POST['Muestreo']['peso_muestra'];
				
				$this->Laboratorio($_POST['Muestreo']['laboratorio_id'],$model->id);
			}
			else if($_REQUEST['btn']=='rechazar')
			{
				$model->fecha_muestreo=date('Y-m-d',strtotime($_POST['Muestreo']['fecha_muestreo']));
				$model->tipo_analisis_germinacion=(int)$_POST['Muestreo']['tipo_analisis_germinacion'];
				$model->tipo_analisis_humedad=(int)$_POST['Muestreo']['tipo_analisis_humedad'];
				$model->tipo_analisis_pureza=(int)$_POST['Muestreo']['tipo_analisis_pureza'];
				$model->tipo_analisis_otras_especies=(int)$_POST['Muestreo']['tipo_analisis_otras_especies'];
				$model->peso_muestra=(int)$_POST['Muestreo']['peso_muestra'];
				$model->rechazo=1;
				$model->fecha_rechazo=date('Y-m-d');
			}
			
			if($model->save())
				$this->redirect(array('iform/ivmuestreo','id'=>$model->form_id));
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
		$dataProvider=new CActiveDataProvider('Muestreo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Muestreo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Muestreo']))
			$model->attributes=$_GET['Muestreo'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Muestreo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Muestreo::model()->findByPk($id);
		if($model==null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Muestreo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']=='muestreo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionVista()
	{
		
		$model=new Muestreo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Muestreo']))
		{
			$form=Iform::model()->find('id=:id',array(':id'=>$_REQUEST['id']));
			$acondicionamiento=Acondicionamiento::model()->find('form_id=:form_id',array(':form_id'=>$form->id));
			$criteria=new CDbCriteria;
			$criteria->select='max(id) as id';
			$criteria->condition='form_id=:form_id';
			$criteria->params=array(':form_id'=>$form->id);			
			$max = Muestreo::model()->find($criteria);	
			$codigo=Muestreo::model()->find('id=:id',array(':id'=>$max->id));
			if($codigo!==null)
			{
				$code=substr($codigo->codigo_lote, -1);
			}
			else
			{
				$code=0;
			}
			
			//Payment
			$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$form->headquarter_id));
			$user=User::model()->find('id=:id',array(':id'=>$form->user_id));
			
			for( $i = 1+(int)$code ; $i <= 1+(int)$code  ; $i ++)
			{
				$muestreo=new Muestreo;
				$muestreo->form_id=$_REQUEST['id'];
				$muestreo->user_id=$form->user_id;
				$muestreo->codigo_lote=$form->form_number."-".$i;
				$muestreo->fecha_solicitud=date('Y-m-d');
				$muestreo->solicitud=1;
				$muestreo->date_proposed=date('Y-m-d',strtotime($_REQUEST["Muestreo"]['date_proposed']));
				$muestreo->time_proposed=date("H:i",strtotime($_REQUEST["Muestreo"]['time_proposed']));				
				$muestreo->peso_total=$_REQUEST["Muestreo"]['peso_total'];
				$muestreo->peso_envase=$_REQUEST["Muestreo"]['peso_envase'];
				$muestreo->nro_envases=$_REQUEST["Muestreo"]['nro_envases'];
				$muestreo->etiquetado_notificacion=1;
				$muestreo->acondicionamiento_id=$acondicionamiento->id;
				$muestreo->save();
				
				if($headquarter->tipo_empresa==2)
				{
					switch($i)
					{
						case(1):$texto="1er";break;
						case(2):$texto="2do";break;
						case(3):$texto="3er";break;
						case(4):$texto="4to";break;
					}
					
					$concepto = Concept::model()->find('id=:id',array(':id'=>4));					
					$payment=new Payment;
					$payment->concept_id=$concepto->id;
					$payment->date=date('Y-m-d');
					$payment->quantity=1;
					$payment->ruc=$user->ruc;
					$payment->price=$concepto->price;
					$payment->form_id=$form->id;
					$payment->user_id=$form->user_id;
					$payment->descripcion=$i." ".$concepto->short_name.$form->crop->name;
					$payment->document_reference=$muestreo->codigo_lote;
					$payment->save();			
				}
			}
			
			$this->redirect(array('iform/vmuestreo','id'=>$form->id));
		}

		$this->render('vista',array(
			'model'=>$model,'id'=>$_REQUEST['id'],
		));
	}
	
	public function actionNotificacion($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Muestreo']))
		{
			$model->attributes=$_POST['Muestreo'];
			$model->notificacion=1;
			$model->time_real=date("H:i",strtotime($_POST['Muestreo']['time_real']));
			$model->date_real=date("Y-m-d",strtotime($_POST['Muestreo']['date_real']));
			$model->fecha_notificacion=date("Y-m-d");
			if($model->save())
			
				$this->redirect(array('iform/ivmuestreo','id'=>$model->form_id));
		}

		$this->render('notificacion',array(
			'model'=>$model,
		));
	}
	
	public function Laboratorio($id,$muestreo_id)
	{
		$user=User::model()->find('id=:id',array(':id'=>$id));
		$muestreo=Muestreo::model()->find('id=:id',array(':id'=>$muestreo_id));
		$inbox=Inbox::model()->find('t.form_id=:form_id and t.to=:to and status_id=:status_id',
											 array(':form_id'=>$muestreo->form_id,':to'=>$user->id,':status_id'=>23,));
		if($inbox===null){
		$laboratorio=new Inbox;
		$laboratorio->date=date('Y-m-d');
		$laboratorio->form_id=$muestreo->form_id;
		$laboratorio->to=$user->id;
		$laboratorio->status_id=23;
		$laboratorio->estado=1;
		$laboratorio->save();
		}
		$laboratory=new Laboratory;
		$laboratory->form_id=$muestreo->form_id;
		$laboratory->user_id=$muestreo->user_id;
		$laboratory->muestreo_id=$muestreo->id;
		$laboratory->user_laboratory=$id;
		$laboratory->save();
	}
	
	public function actionTecnico($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Muestreo']))
		{
			$model->attributes=$_POST['Muestreo'];
			
			if($_REQUEST['btn']=='aceptar')
			{
				$model->tecnico=1;
				$model->fecha_tecnico=date('Y-m-d');
				
				$aprobado=new Inbox;
				$aprobado->date=date('Y-m-d');
				$aprobado->form_id=$model->form_id;
				$aprobado->to=$model->user_id;
				$aprobado->status_id=24;
				$aprobado->estado=1;
				$aprobado->save();
				
				$etiquetado=new Etiquetado;
				$etiquetado->user_id=$model->user_id;
				$etiquetado->form_id=$model->form_id;
				$etiquetado->muestreo_id=$model->id;
				$etiquetado->save();
				//$this->Laboratorio($_POST['Muestreo']['laboratorio_id'],$model->id);
			}
			else if($_REQUEST['btn']=='rechazar')
			{
				$model->tecnico_rechazo=1;
				$model->fecha_tecnico_rechazo=date('Y-m-d');
				
				$rechazado=new Inbox;
				$rechazado->date=date('Y-m-d');
				$rechazado->form_id=$model->form_id;
				$rechazado->to=$model->user_id;
				$rechazado->status_id=25;
				$rechazado->estado=1;
				$rechazado->save();				
			}			
			if($model->save())
				$this->redirect(array('iform/iindex'));
		}
		$this->render('tecnico',array(
			'model'=>$model,
		));
	}
	
	public function actionLotes()
	{
		
		$form=Iform::model()->find('id=:id',array(':id'=>$_REQUEST['id']));
		
		$criteria=new CDbCriteria;
		$criteria->select='max(id) as id';
		$criteria->condition='form_id=:form_id';
		$criteria->params=array(':form_id'=>$form->id);			
		$max = Muestreo::model()->find($criteria);	
		$codigo=Muestreo::model()->find('id=:id',array(':id'=>$max->id));
		if($codigo!==null)
		{
			$code=substr($codigo->codigo_lote, -1);
		}
		else
		{
			$code=0;
		}
		
		$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$form->headquarter_id));
		$user=User::model()->find('id=:id',array(':id'=>$form->user_id));		
		
		for( $i = 1+(int)$code ; $i <= 1+(int)$code  ; $i ++)
		{
			
			$criteria=new CDbCriteria;
			$criteria->select='max(parent_id) as parent_id';		
			$max = Acondicionamiento::model()->find($criteria);
			$max = $max->parent_id + 1;
			
			if($headquarter->tipo_empresa==1){
			$acondicionamiento=new Acondicionamiento;
			$acondicionamiento->form_id=$_REQUEST['id'];
			$acondicionamiento->user_id=$form->user_id;
			$acondicionamiento->acondicionamiento_number=1;
			$acondicionamiento->parent_id=$max;
			$acondicionamiento->save();			
			}
			$muestreo=new Muestreo;
			$muestreo->form_id=$_REQUEST['id'];
			$muestreo->user_id=$form->user_id;
			$muestreo->codigo_lote=$form->form_number."-".$i;
			$muestreo->fecha_notificacion_acondicionamiento=date('Y-m-d');//Acondicionamiento
			$muestreo->notificacion_acondicionamiento=0;//Acondicionamiento
			$muestreo->informe_acondicionamiento=0;//Acondicionamiento
			$muestreo->fecha_solicitud=date('Y-m-d');//muestreo
			$muestreo->solicitud=1;//muestreo
			$muestreo->etiquetado_notificacion=1;//etiquetado
			$muestreo->peso_total=str_replace(',','',$_REQUEST["Iform"]['peso_total']);
			$muestreo->peso_envase=str_replace(',','',$_REQUEST["Iform"]['peso_envase']);
			$muestreo->nro_envases=str_replace(',','',$_REQUEST["Iform"]['nro_envases']);
			if($headquarter->tipo_empresa==1)
			{
			$muestreo->acondicionamiento_id=$acondicionamiento->id;
			}
			elseif($headquarter->tipo_empresa==2)
			{
				$acon=Acondicionamiento::model()->find('form_id=:form_id',array(':form_id'=>$form->id));
				$muestreo->acondicionamiento_id=$acon->id;
			}
			$muestreo->save();			 
			
		}		
		
	}
}