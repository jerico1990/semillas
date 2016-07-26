<?php

class PaymentController extends Controller
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
				'actions'=>array('index','view','pay','notapago','registrarpago','registrados','validainsp','validainia','pagos','registrarnota'),
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
		$model=new Payment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Payment']))
		{
			$model->attributes=$_POST['Payment'];
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Payment']))
		{
			$model->attributes=$_POST['Payment'];
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
		$this->pageTitle = "Pendientes de Pago";
		$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
		$criteria=new CDbCriteria;
		$criteria->condition='user_id=:user_id and pay_date is null';
		$criteria->addCondition('code is null');
		$criteria->params=array(':user_id'=>$user->id);
		$criteria->order='document_reference ASC';
		$dataProvider=new CActiveDataProvider('Payment',
														  array(
																  'criteria'=>$criteria																  
		));
		
		
		
		//$dataProvider=new CActiveDataProvider('Payment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Payment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Payment']))
			$model->attributes=$_GET['Payment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Payment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
      $model=Payment::model()->find('user_id=:user_id and id=:id', array(':user_id'=>$user->id,':id'=>$id));
		
		//$model=Payment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Payment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='payment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionPay()
	{
		$datos=count($_REQUEST);
		
		if($datos>1)
		{
		//Pay
			$criteria=new CDbCriteria;
			$criteria->select='max(code) as code';
			$max = Payment::model()->find($criteria);
			$max = $max->code + 1;
			
			$mtotal=0;
			foreach ($_POST['data']['datacheck'] as $key => $val) {
				$payment = Payment::model()->findByPk($key);		
				$payment->code = $max;
				$payment->save();
				$mtotal=$mtotal+$payment->price;
			}
			
			$totals=Payment::model()->findAll('code=:code',array(':code'=>$max));
			foreach($totals as $total){
				$total->total=$mtotal;
				$total->save();
			}		
			//$payments = Payment::model()->findAll('code=:code',array(':code'=>$max));		
			
			$this->redirect('notapago');
		}
		else
		$this->redirect(array('index'));
			
		
	}
	
	public function actionNotapago()
	{
		$this->pageTitle = "Notas por Pagar";
		$user = User::model()->find('cruge_user_id=:cruge_user_id',
											 array(':cruge_user_id'=>Yii::app()->user->id));
		
		$criteria=new CDbCriteria;
		$criteria->select='code,concept_id,price,sum(price) as total';		
		$criteria->condition='user_id=:user_id and pay_date is null';
		$criteria->addCondition('code is not null');
		//$criteria->condition='pay_date is null';
		$criteria->params=array(':user_id'=>$user->id);
		$criteria->group='code';		
		$payments = Payment::model()->findAll($criteria);
		
		$criteria1=new CDbCriteria;
		$criteria1->select='code,concept_id,price,form_id,descripcion,quantity,document_reference';
		$criteria1->condition='user_id=:user_id and pay_date is null';
		$criteria1->addCondition('code is not null');
		$criteria1->params=array(':user_id'=>$user->id);
		//$criteria1->group='code,concept_id,price,form_id,descripcion';
		$conceptos = Payment::model()->findAll($criteria1);
		
		$this->render('notapago',array('payments'=>$payments,'conceptos'=>$conceptos));
	}
	
	public function actionRegistrarpago()
	{
		
		if($_POST['data']!=="")
		{
			
			$payments = Payment::model()->findAll('code=:code',array(':code'=>$_POST['code']));
			foreach($payments as $payment)
			{
				$payment->pay_code=$_POST['data'];				
				$payment->pay_date=date('d/m/y');
				//$payment->document_number=$_POST['data'];
				$payment->save();
			}			
		}
		$this->redirect('pagos');
	}
	
	public function actionRegistrados()
	{
		$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
		$criteria=new CDbCriteria;
		$criteria->condition='user_id=:user_id and pay_date is not null';
		$criteria->addCondition('code is not null');
		$criteria->params=array(':user_id'=>$user->id);
		$dataProvider=new CActiveDataProvider('Payment',
														  array(
																  'criteria'=>$criteria																  
		));
		
		
		
		//$dataProvider=new CActiveDataProvider('Payment');
		$this->render('registrados',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionValidainsp()
	{
		$user = User::model()->find('cruge_user_id=:cruge_user_id',
											 array(':cruge_user_id'=>Yii::app()->user->id));
		
		$criteria=new CDbCriteria;
		$criteria->select='code,sum(price) as total';		
		$criteria->condition='user_id=:user_id and pay_date is null';
		$criteria->addCondition('code is not null');
		//$criteria->condition='pay_date is null';
		$criteria->params=array(':user_id'=>$user->id);
		$criteria->group='code';		
		$payments = Payment::model()->findAll($criteria);
		$this->render('validainsp',array('payments'=>$payments));
		
	}
	public function actionValidainia()
	{
		$user = User::model()->find('cruge_user_id=:cruge_user_id',
											 array(':cruge_user_id'=>Yii::app()->user->id));
		
		$criteria=new CDbCriteria;
		$criteria->select='code,concept_id,price,sum(price) as total';		
		$criteria->condition='pay_date is not null and document_number is null';
		$criteria->addCondition('code is not null');
		//$criteria->condition='pay_date is null';
		$criteria->group='code,concept_id,price';		
		$payments = Payment::model()->findAll($criteria);
		
		$criteria1=new CDbCriteria;
		$criteria1->select='code,concept_id,price,form_id,quantity,document_reference,descripcion';
		$criteria1->condition='pay_date is not null';
		$criteria1->addCondition('code is not null');
		
		$conceptos = Payment::model()->findAll($criteria1);
		
		$this->render('validainia',array('payments'=>$payments,'conceptos'=>$conceptos));
		
		
	}
	public function actionPagos()
	{
		$this->pageTitle = "Pagos Registrados";
		$user = User::model()->find('cruge_user_id=:cruge_user_id',
											 array(':cruge_user_id'=>Yii::app()->user->id));
		
		$criteria=new CDbCriteria;
		$criteria->select='code,concept_id,price,sum(price) as total';		
		$criteria->condition='user_id=:user_id and pay_date is not null';
		$criteria->addCondition('code is not null');
		//$criteria->condition='pay_date is null';
		$criteria->params=array(':user_id'=>$user->id);
		$criteria->group='code';		
		$payments = Payment::model()->findAll($criteria);
		
		$criteria1=new CDbCriteria;
		$criteria1->select='code,concept_id,price,form_id,quantity,document_reference,descripcion';
		$criteria1->condition='user_id=:user_id and pay_date is not null';
		$criteria1->addCondition('code is not null');
		$criteria1->params=array(':user_id'=>$user->id);
		//$criteria1->group='code,concept_id,price,form_id';
		$conceptos = Payment::model()->findAll($criteria1);
		
		$this->render('pagos',array('payments'=>$payments,'conceptos'=>$conceptos));
		
		
	}
	
	public function actionRegistrarnota()
	{
		
		if($_REQUEST['data']!=="")
		{
			
			$payments=Payment::model()->findAll('code=:code',array(':code'=>$_REQUEST['code']));
			foreach($payments as $payment)
			{
				$payment->document_number=$_REQUEST['data'];
				$payment->save();
			}
			$this->redirect('admin');			
		}
		
		$this->redirect('validainia');
		
	}
}
