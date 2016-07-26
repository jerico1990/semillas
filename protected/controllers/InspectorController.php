<?php

class InspectorController extends Controller
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
		$this->pageTitle = "Inspector";
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
		$this->pageTitle = "Crear Inspector";
		$model=new User;
		$cruge=new Cruge;
		$rol=new CrugeAuthassignment;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			$cruge->username=$_POST['User']['name'];
			$cruge->password=$this->passwordGenerator();
			$cruge->email=$_POST['User']['email'];
			$cruge->state=1;
			
			if($cruge->save())
			{
				$cuenta=Cruge::model()->find('username=:username and email=:email', array(':username'=>$_POST['User']['name'],':email'=>$_POST['User']['email']));
				
				$rol->userid=$cuenta->iduser;
				$rol->itemname='inspector';
				$rol->data='N;';
				$rol->save();
				
				//Buscando al Organismo Certificador
				$org=Headquarter::model()->find('id=:id',array(':id'=>$_POST['User']['headquarter_id']));
				$ee=User::model()->find('headquarter_id=:headquarter_id',array(':headquarter_id'=>$org->id));
				
				$model->address=$ee->address;
				if($org->tipo_empresa==2)
				{
				//Inspectores Nacionales
					$model->ruc='20131365994';
					$model->legal_name='INSTITUTO NACIONAL DE INNOVACION AGRARIA';					
					$model->phone='3492600';
				}	
				elseif($org->tipo_empresa==1)
				{//Inspetore PArticulares
					$user=User::model()->find('headquarter_id=:headquarter',array(':headquarter'=>$_POST['User']['headquarter_id']));
					$model->ruc=$org->ruc;
					$model->legal_name=$user->legal_name;				
					$model->phone=$user->phone;
				}
				
				$model->name=$_POST['User']['name'];
				$model->status=2;//Activo
				$model->type_id=3;	//Inspector
				$model->cruge_user_id=$cuenta->iduser;
				$model->district_id=$org->location_id;
				$model->headquarter_id=$org->id;
				$model->search_oc_ee=$org->name;
				if($model->save())
					
					$mensaje=$this->mensaje($model->name,'2');
					$this->redirect(array('admin'));			
				
			}
			
				
		}
		
		$this->render('create',array(
			'model'=>$model
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->pageTitle = "Actualizar Inspector";
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			
			$model->attributes=$_POST['User'];
			
			$cruge=Cruge::model()->findByPk($model->cruge_user_id);
			if($cruge->username!==$_POST['User']['name'] || $cruge->email!==$_POST['User']['email'])
			{
				$name=$cruge->username;
				$cruge->username=$_POST['User']['name'];
				$cruge->email=$_POST['User']['email'];
				$cruge->password=$this->passwordGenerator();
				
				$this->mensaje($name,'2');
				$cruge->save();
			}
			$model->name=$_POST['User']['name'];
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
		$this->pageTitle = "Inspector";
		$dataProvider=new CActiveDataProvider('User',array(
			'criteria' => array(
			'condition'=>'type_id=3',			
			),
		   //'pagination'=>array(
          //  'pageSize'=>3,)			
			));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->pageTitle = "Administrar Inspector";
		$model=new User('searchi');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public static function passwordGenerator()
	{
	    return substr(rand(), 0, 8);
	}
	public function mensaje($usern,$id)
	{
		  if($id==1)
		  {
			  $user=User::model()->find('ruc=:ruc', array(':ruc'=>$usern));		
			  $cruge=Cruge::model()->find('username=:username', array(':username'=>$usern));	
		  }
		  if($id==2)
		  {
			  $cruge=Cruge::model()->find('username=:username', array(':username'=>$usern));
			  $user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>$cruge->iduser));
		  }
		  $smt=Yii::app()->Smtpmail;
		  $smt->SetFrom(Yii::app()->Smtpmail->Username, 'INIA');
		  $smt->Subject    = '=?UTF-8?B?'.base64_encode("CUENTA INIA").'?=';
		  $smt->MsgHTML("Hola ".$user->legal_name.": <br />".
					 "<br />".
					 "Su cuenta ha sido registrada en las Bases del INIA,sus datos son:".
					 "<br />".
					 "Usuario:".$cruge->username."<br />".
					 "Password:".$cruge->password."<br />".
					 "<br />".
					 "Para mas información contactar con el INIA".
					 "<br />".
					 "Atentamente,<br />".
					 "Administrador del INIA<br />"
					 );
		  $smt->AddAddress($cruge->email, "");
		  if(!$smt->Send())
		  {
					 $error="Mailer Error: " . $smt->ErrorInfo;
		  }
		  else
		  {
					 $error="Message sent!";
		  }
		
		  return $error;
		
	}
}
