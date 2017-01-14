<?php

class ArrozController extends Controller
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
	
	    $this->pageTitle = "Arroz";
	    $model=$this->loadModel($id);
	    $form=Iform::model()->findByPk($model->form_id);
	    
	    if(isset($_POST['Inspection']))
	    {
		$model->attributes=$_POST['Inspection'];
		
		$model->arz_fecha_siembra=date("Y-m-d", strtotime($model->arz_fecha_siembra));
		$model->arz_fecha_almacigo=date("Y-m-d", strtotime($model->arz_fecha_almacigo));
		$model->arz_fecha_transplante=date("Y-m-d", strtotime($model->arz_fecha_transplante));
		$model->arz_area_instalada=str_replace(',','',$model->arz_area_instalada);
		$model->arz_aislamiento=str_replace(',','',$model->arz_aislamiento);
		$fecha=date("Y-m-d", strtotime($model->aprobado_fecha_propuesta));
		//$fecha=date("Y-m-d", strtotime($_REQUEST['fecha']));
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

	    return $this->render('update',array(
		    'model'=>$model,
	    ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 
	
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
	/*
	public function Inspeccion($max,$fecha,$usuario,$formulario,$headquarter_id)
	{
		
	    $sinspection=new Inspection;
	    $sinspection->inspection_number=$max;
	    $sinspection->proposed_date=$fecha;
	    //$sinspection->proposed_time=$hora;
	    $sinspection->user_id=$usuario;
	    $sinspection->form_id=$formulario;
	    $sinspection->save();
	    
	    switch($max)
	    {
		    case(1): $texto="1ra"; break;
		    case(2): $texto="2da"; break;
		    case(3): $texto="3ra"; break;
		    case(4): $texto="4ta"; break;
		    case(5): $texto="5ta"; break;
	    }
	    
	    
	    $headquarter=Headquarter::model()->find('id=:id',array(':id'=>$headquarter_id));
	    $form=Iform::model()->find('id=:id',array(':id'=>$formulario));
	    $user=User::model()->find('id=:id',array(':id'=>$form->user_id));
	    if($headquarter->tipo_empresa==2)
	    {
		$quantity=round($form->area);
		$concepto = Concept::model()->find('id=:id',array(':id'=>2));					
		$payment=new Payment;
		$payment->concept_id=$concepto->id;
		$payment->date=date('Y-m-d');
		$payment->quantity=$quantity;
		$payment->ruc=$user->ruc;
		$payment->price=$concepto->price;
		$payment->form_id=$formulario;
		$payment->user_id=$form->user_id;
		$payment->document_reference=$form->form_number;
		$payment->descripcion="$texto Inspección de campo de multiplicación de ".$form->crop->name;
		$payment->save();			
	    }
	    else if($headquarter->tipo_empresa==1)
	    {				
		//Inspeccion
		$inspeccion=Inspection::model()->find('id=:id',array(':id'=>$sinspection->id));
		$inspeccion->proposed_time=date("H:i",strtotime('12:00 PM'));
		$inspeccion->proposed_date=date('Y-m-d',strtotime($fecha));
		$inspeccion->save();
	    }
	}
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
	/*
	public function Acondicionamiento($fecha,$aform,$aid,$usuario)
	{
	    $form=Iform::model()->find('id=:id',array(':id'=>$aform));
	    $headquarter=Headquarter::model()->find('id=:id',array(':id'=>$form->headquarter_id));
	    $user=User::model()->find('id=:id',array(':id'=>$form->user_id));
	    
	    $criteria=new CDbCriteria;
	    $criteria->select='max(parent_id) as parent_id';		
	    $max = Acondicionamiento::model()->find($criteria);
	    $max = $max->parent_id + 1;		
		    
	    if($headquarter->tipo_empresa==2)
	    {				
		    $concepto = Concept::model()->find('id=:id',array(':id'=>3));					
		    $payment=new Payment;
		    $payment->concept_id=$concepto->id;
		    $payment->date=date('Y-m-d');
		    $payment->quantity=1;
		    $payment->ruc=$user->ruc;
		    $payment->price=$concepto->price;
		    $payment->form_id=$form->id;
		    $payment->user_id=$form->user_id;
		    $payment->document_reference=$form->form_number;
		    $payment->descripcion="1ra ".$concepto->short_name;
		    $payment->save();
		    
		    //Nueo Acondicionamieno
		    $acondicionamiento=new Acondicionamiento;
		    $acondicionamiento->proposed_date=$fecha;
		    $acondicionamiento->form_id=$aform;
		    $acondicionamiento->inspection_id=$aid;
		    $acondicionamiento->user_id=$usuario;
		    $acondicionamiento->acondicionamiento_number=1;
		    $acondicionamiento->parent_id=$max;
		    $acondicionamiento->save();	
	    }
	    
	    //Nuevo Acondcionamiento Solicitada
	    $inbox=new Inbox;
	    $inbox->date=date('Y-m-d');
	    $inbox->form_id=$aform;
	    $inbox->status_id=12;
	    $inbox->estado=1;
	    $inbox->to=$usuario;
	    $inbox->save();
		
	}
	*/
}
