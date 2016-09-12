<?php

class HeadquarterController extends Controller
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
				'actions'=>array('index','view',
									  'admin_ambito','create_ambito','update_ambito','view_ambito',
									  'admin_laboratorio','create_laboratorio','update_laboratorio','view_laboratorio'),
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
		$this->pageTitle = "Detalle Estación";
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionView_ambito($id)
	{
		$this->pageTitle = "Detalle Estación";
		$this->render('view_ambito',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionView_laboratorio($id)
	{
		$this->pageTitle = "Laboratorio";
		$this->render('view_laboratorio',array(
			'model'=>$this->loadModel($id),
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	    $this->pageTitle = "Crear Estación";
	    $model=new Headquarter;
	    $user=new User;
	    $cruge=new Cruge;
	    $rol=new CrugeAuthassignment;
	    // Uncomment the following line if AJAX validation is needed
	    // $this->performAjaxValidation($model);
	    $departamentos = Location::model()->findAll(array(
		      'select'   => 't.department, t.department_id',
		      'group'    => 't.department',
		      'order'    => 't.department ASC',
		      'distinct' => true
		 ));
	    if(isset($_POST['Headquarter']))
	    {
		$model->attributes=$_POST['Headquarter'];
		//Amarrando la estacion
		$model->name=$_POST['Headquarter']['legal_name'];
		$model->ruc=$_POST['Headquarter']['ruc'];
		$model->district_id=$model->district_id;
		$model->department_id=$_POST['Headquarter']['department_id'];
		$model->province_id=$_POST['Headquarter']['province_id'];
		$model->tipo_empresa=$_POST['Headquarter']['tipo_empresa'];
		$model->tipo_usuario=2;//Aqui
		if($_POST['Headquarter']['tipo_empresa']==1)
		{$model->search_tipo_empresa="Privado";}
		elseif($_POST['Headquarter']['tipo_empresa']==2)
		{$model->search_tipo_empresa="Estatal";}
		$model->ruc=$_POST['Headquarter']['ruc'];
		
		if($model->save())
		{
		    //Creando datos del Cruge_user
		    $cruge->username=$_POST['Headquarter']['username'];
		    $cruge->password=$this->passwordGenerator();
		    $cruge->email=$_POST['Headquarter']['email'];
		    $cruge->state=1;
		    if($cruge->save())
		    {
			$cuenta=Cruge::model()->find('username=:username and email=:email',
												array(':username'=>$_POST['Headquarter']['username'],
														':email'=>$_POST['Headquarter']['email']));
			////////////// Rol Estacion
			$rol->userid=$cuenta->iduser;
			$rol->itemname='estacion';
			$rol->data='N;';
			$rol->save();
			/////Fin
			$user->ruc=$_POST['Headquarter']['ruc'];	
			$user->legal_name=$_POST['Headquarter']['legal_name'];
			$user->address=$_POST['Headquarter']['address'];
			$user->name=$_POST['Headquarter']['username'];
			$user->email=$_POST['Headquarter']['email'];
			$user->first_name=$_POST['Headquarter']['first_name'];
			$user->last_name=$_POST['Headquarter']['last_name'];
			$user->document_number=$_POST['Headquarter']['document_number'];
			$user->type_id=5;
			$user->status=2;//Activo  
			$user->headquarter_id=$model->id;				
			$user->cruge_user_id=$cuenta->iduser;
			$user->district_id=$_POST['Headquarter']['location_id'];
			if($user->save())
			{					
			    $mensaje=$this->mensaje($cuenta->iduser);
			    $this->redirect(array('admin'));
			}
		    }				
		}			
	    }
	    $this->render('create',array(
		    'model'=>$model,
		    'departamentos'=>$departamentos
	    ));
	}
	
	public function actionCreate_ambito()
	{
		$this->pageTitle = "Crear Estación";
		$model=new Headquarter;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Headquarter']))
		{
			$ee=Headquarter::model()->find('id=:id',array(':id'=>$_POST['Headquarter']['parent_id']));
			$model->attributes=$_POST['Headquarter'];
			$model->location_id=$_POST['Headquarter']['location_id'];
			$model->ruc=$ee->ruc;
			$model->legal_name="legal_name";
			$model->email="email";
			$model->correlativo=0;
			$model->anio=date('y');
			if($model->save())
				$this->redirect(array('admin_ambito'));
		}

		$this->render('create_ambito',array(
			'model'=>$model,
		));
	}
	
	public function actionCreate_laboratorio()
	{
		$this->pageTitle = "Crear Laboratorio";
		$model=new Headquarter;
		
		$user=new User;
		$cruge=new Cruge;
		$rol=new CrugeAuthassignment;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Headquarter']))
		{
			$model->attributes=$_POST['Headquarter'];
			
			//Amarrando la estacion
			$model->name=$_POST['Headquarter']['legal_name'];			
			$model->location_id=$model->location_id;
			$model->tipo_empresa=$_POST['Headquarter']['tipo_empresa'];
			$model->tipo_usuario=1;	
			$model->ruc=$_POST['Headquarter']['ruc'];		
			
			$model->save();
			if($model->save())
			{
				//Creando datos del Cruge_user
				$cruge->username=$_POST['Headquarter']['username'];
				$cruge->password=$this->passwordGenerator();
				$cruge->email=$_POST['Headquarter']['email'];
				$cruge->state=1;
				
				if($cruge->save())
				{
					$cuenta=Cruge::model()->find('username=:username and email=:email',
														array(':username'=>$_POST['Headquarter']['username'],
																':email'=>$_POST['Headquarter']['email']));
					////////////// Rol Estacion					
					$rol->userid=$cuenta->iduser;
					$rol->itemname='laboratorio';
					$rol->data='N;';
					$rol->save();
					
					$user->ruc=$_POST['Headquarter']['ruc'];	
					$user->legal_name=$_POST['Headquarter']['legal_name'];
					$user->address=$_POST['Headquarter']['address'];
					$user->name=$_POST['Headquarter']['username'];
					$user->email=$_POST['Headquarter']['email'];
					$user->first_name=$_POST['Headquarter']['first_name'];
					$user->last_name=$_POST['Headquarter']['last_name'];
					$user->document_number=$_POST['Headquarter']['document_number'];
					$user->type_id=6;
					$user->status=2;//Activo  
					$user->headquarter_id=$model->id;				
					$user->cruge_user_id=$cuenta->iduser;
					$user->district_id=$_POST['Headquarter']['location_id'];						
					$user->save();		
				
					$mensaje=$this->mensaje($cuenta->iduser);
					$this->redirect(array('admin_laboratorio'));
					
				}				
			}			
		}
		$this->render('create_laboratorio',array(
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
		$this->pageTitle = "Editar Estación";
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);		
		
		if(isset($_POST['Headquarter']))
		{
			
			$model->attributes=$_POST['Headquarter'];
			$model->ruc=$_POST['Headquarter']['ruc'];
			$model->location_id=$_POST['Headquarter']['location_id'];
			$model->tipo_empresa=$_POST['Headquarter']['tipo_empresa'];
			$model->departamento=$_POST['Headquarter']['departamento'];
			$model->provincia=$_POST['Headquarter']['provincia'];
			if($_POST['Headquarter']['tipo_empresa']==1)
			{$model->search_tipo_empresa="Privado";}
			elseif($_POST['Headquarter']['tipo_empresa']==2)
			{$model->search_tipo_empresa="Estatal";}
			
			$model->name=$_POST['User']['legal_name'];
			if($model->save())	
			{
				$user=User::model()->find('type_id=5 and headquarter_id=:headquarter_id',array(':headquarter_id'=>$model->id));			
				$user->legal_name=$_POST['User']['legal_name'];
				$user->address=$_POST['User']['address'];
				$user->document_number=$_POST['User']['document_number'];
				$user->first_name=$_POST['User']['first_name'];
				$user->last_name=$_POST['User']['last_name'];
				$user->name=$_POST['Cruge']['username'];
				$user->save();		
				
				if($_REQUEST['username_ant']!==$_POST['Cruge']['username'] || $_REQUEST['email_ant']!==$_POST['Cruge']['email'])
				{
					$cruge=Cruge::model()->find('username=:username',array(':username'=>$_REQUEST['username_ant']));					
					$cruge->username=$_POST['Cruge']['username'];
					$cruge->email=$_POST['Cruge']['email'];
					$cruge->password=$this->passwordGenerator();					
					$cruge->save();
					$this->mensaje($cruge->iduser);					
				}			
				$this->redirect(array('admin'));
			}
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdate_ambito($id)
	{
		$this->pageTitle = "Actualizar Estación";
		$model=$this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Headquarter']))
		{
			$model->attributes=$_POST['Headquarter'];
			if($model->save())
				$this->redirect(array('admin_ambito'));
		}

		$this->render('update_ambito',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdate_laboratorio($id)
	{
		$this->pageTitle = "Actualizar Estación";
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Headquarter']))
		{
			
			$model->attributes=$_POST['Headquarter'];
			
			$user=User::model()->find('type_id=6 and headquarter_id=:headquarter_id',array(':headquarter_id'=>$model->id));
			
			$user->legal_name=$_POST['User']['legal_name'];
			$user->address=$_POST['User']['address'];
			$user->document_number=$_POST['User']['document_number'];
			$user->first_name=$_POST['User']['first_name'];
			$user->last_name=$_POST['User']['last_name'];
			$user->save();
			
			if($model->save())
				$this->redirect(array('admin_laboratorio'));
		}

		$this->render('update_laboratorio',array(
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
		
		$this->pageTitle = "Estaciones";
		$dataProvider=new CActiveDataProvider('Headquarter');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->pageTitle = "Administrar Estación";
		$model=new Headquarter('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Headquarter']))
			$model->attributes=$_GET['Headquarter'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Headquarter the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Headquarter::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Headquarter $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='headquarter-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAdmin_ambito()
	{
		$this->pageTitle = "Administrar";
		$model=new Headquarter('searcha');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Headquarter']))
			$model->attributes=$_GET['Headquarter'];

		$this->render('admin_ambito',array(
			'model'=>$model,
		));
	}
	public function actionAdmin_laboratorio()
	{
		$this->pageTitle = "Administrar Estación";
		$model=new Headquarter('searchl');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Headquarter']))
			$model->attributes=$_GET['Headquarter'];

		$this->render('admin_laboratorio',array(
			'model'=>$model,
		));
	}
	 public static function passwordGenerator()
	{
	    return substr(rand(), 0, 8);
	}
	public function mensaje($id)
	{
		 
			$cruge=Cruge::model()->find('iduser=:id', array(':id'=>$id));
			$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>$cruge->iduser));
		 
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
