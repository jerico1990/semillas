<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	/*public function beforeAction($action)
	{
		switch($action)
		{
			//case('view'):$this->redirect('user/view/');
		}
	}
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
				'actions'=>array('index','view','cuenta','cuentaupdate','cuentaview','iindex','iview'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','icreate','iupdate','inscreate'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','iadmin','idelete'),
				'users'=>array('*'),
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
		  if((!Yii::app()->user->isGuest))
		  {
			  $model=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
			  if($model->id==$id)
			  {
				  $this->render('view',array(
					  'model'=>$this->loadModel($id),
				  ));		
			  }
			  else
			  {
				  $this->redirect(array('site/index'));
			  }
		  }
		  else
		  $this->redirect(array('cruge/ui/login'));
		
		/*$this->render('view',array(
			'model'=>$this->loadModel($id),
		));*/
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	    $this->pageTitle = "Inscribir Productor";
	    $model=new User;
	    if(isset($_POST['User']))
	    {
		$model->attributes=$_POST['User'];
		$user=User::model()->find('registry=:registry', array(':registry'=>$_POST['User']['registry']));
		$producer=Producer::model()->find('registry=:registry', array(':registry'=>$_POST['User']['registry']));
		if($user==null)
		{
		    if($producer!==null)
		    {
			$model->status=1;
			$model->type_id=1;
			$model->registry=$producer->registry;
			$model->producer_id=$producer->id;
			if($model->save())						
			Yii::app()->user->setFlash('create','su inscripción ha sido enviada');
			$this->refresh();							
		    }
		    else
		    {
			$model->addError('registry', 'El N° de productor no se encuentra');
		    }										  
		}
		else
		{
		  $model->addError('registry', 'El N° de productor ya se encuentra registrado');
		}  
	    }  
	    $this->render('create',array(
		    'model'=>$model,'tipo'=>'externo'
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

		if(isset($_POST['User']))
		{
			var_dump($_REQUEST);
				die;
			$model->attributes=$_POST['User'];
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
		$model=$this->loadModel($id);
		if($model->cruge_user_id!=NULL)
		{
		    $model->status=3;
		    $model->search_estado='Suspendido';
		    $model->update();
		}
		else
		{
		    $this->loadModel($id)->delete();
		    $this->mensaje_d($model->email);
		}
		
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
		if($user==null){
			$this->redirect(array('create'));
		}
		else{
			$dataProvider=new CActiveDataProvider('User', array(
				'criteria'=>array(
					'condition'=>'cruge_user_id=:id',
					'params'=>array(':id'=>Yii::app()->user->id),
			)));
		
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}				      
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
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
		//1 administrador
		//2 inspector
		//3 productor
			if(Yii::app()->user->name=="admin"  || Yii::app()->user->checkAccess('peas'))
			{
				$model=User::model()->findByPk($id);                   
			}
			elseif(Yii::app()->user->checkAccess('estacion'))
			{
				$model=User::model()->findByPk($id);  
		     //$model=User::model()->find('id=:id and type_id=:type_id',array(':id'=>$id,':type_id'=>3));  
			}
			else
			{
				$model=User::model()->findByPk($id);
				//$model=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
				 //$model=Form::model()->find('user_id=:user_id and id=:id', array(':user_id'=>$user->id,':id'=>$id));                   
			} 
		  if($model==null)
					 throw new CHttpException(404,'The requested page does not exist.');
		  return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']=='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionCuenta()
	{
	    $this->pageTitle = "Cuentas";
	    $model=new User('searchproductor');
	    $model->unsetAttributes();  // clear any default values
	    if(isset($_GET['User']))
		    $model->attributes=$_GET['User'];

	    $this->render('cuenta',array(
		    'model'=>$model,
	    ));
	}
	
	public function actionCuentaupdate($id)
	{
		$this->pageTitle = "Actualizar Productor";
		$model=$this->loadModel($id);				
		
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];					
			if($_POST['User']['status']=='1')
			{		
				$cruge=Cruge::model()->find('username=:username', array(':username'=>$_POST['User']['ruc']));
				if($cruge==null)
				{					
					$model->search_estado="Inactivo";
					if($model->save())
					$this->redirect(array('cuenta'));					
				}
				else
				{				
					$cruge->state=0;
					//$model->ruc=$_POST['User']['ruc'];
					//$model->email=$_POST['User']['email'];
					//$model->address=$_POST['User']['address'];
					$model->search_estado="Inactivo";
					$model->status=1;
					if($model->save())			
					{	
						$cruge->save();			
						$this->redirect(array('cuenta'));
					}	
				}					
			}
			else if($_POST['User']['status']=='2')
			{					 
				$cruge=Cruge::model()->find('username=:username', array(':username'=>$_POST['User']['ruc']));
				
				if($cruge==null)
				{
					$user=new Cruge;					
					
					if($model->type_id==2)
					{
					    $user->username=$model->tipo_estacion_experimental.'_'.$_POST['User']['ruc'];
					}
					else
					{
					    $user->username=$_POST['User']['ruc'];
					}
					$user->password=$this->passwordGenerator();
					$user->email=$_POST['User']['email'];
					$user->state=1;	
					$model->status=2;
					$model->name=$_POST['User']['ruc'];
					$model->search_estado="Activo";
					if($model->save())			
					{								
						if($user->save())
						{
							$rol=new CrugeAuthassignment;					
							//$anexar=Cruge::model()->findByPk($id);      ->find('username=:username', array(':username'=>$_POST['User']['ruc']));
							$usuario=User::model()->find('ruc=:ruc', array(':ruc'=>$_POST['User']['ruc']));
							$usuario->cruge_user_id=$user->iduser;						
							$rol->userid=$user->iduser;
							$rol->itemname='productor';
							$rol->data='N;';
							$rol->save();
							$usuario->save();
							$mensaje=$this->mensaje($user->username,'1');							
							$this->redirect(array('cuenta'));
						}					
					}
				}
				else
				{					
					if($_POST['User']['email']!=$cruge->email)
					{
						$cruge->email=$_POST['User']['email'];
						$model->email=$_POST['User']['email'];
						$model->save();
						$cruge->save();
						$mensaje=$this->mensaje($model->ruc,'1');
					}	
					$cruge->state=1;			
					$model->attributes=$_POST['User'];
					$model->status=2;
					$model->search_estado="Activo";
					if($model->save())			
					{	
						$cruge->save();			
						$this->redirect(array('cuenta'));
					}
				}				
			}
			else if($_POST['User']['status']=='3')
			{
				$cruge=Cruge::model()->find('username=:username', array(':username'=>$_POST['User']['ruc']));
				
				if($cruge==null)
				{
					$model->attributes=$_POST['User'];
					$model->status=1;
					$model->search_estado="Inactivo";
					if($model->save())
					$this->redirect(array('cuenta'));
				}
				else
				{
					$cruge->state=2;			
					$model->attributes=$_POST['User'];
					$model->status=3;
					$model->search_estado="Suspendido";
					if($model->save())			
					{	
						$cruge->save();			
						$this->redirect(array('cuenta'));
					}					
				}
			}
		}
		$this->render('cuentaupdate',array(
			'model'=>$model,
		));
	}
	
	public function actionCuentaView($id)
	{
		$this->pageTitle = "Detalle Productor";
		$this->render('cuentaview',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function mensaje_d($email)
	{
		$smt=Yii::app()->Smtpmail;
		  $smt->SetFrom(Yii::app()->Smtpmail->Username, 'INIA');
		  $smt->Subject    = '=?UTF-8?B?'.base64_encode("CUENTA INIA").'?=';
		  $smt->MsgHTML("<br />".
					 "<br />".
					 "Su inscripción ha sido denegada del INIA,porfavor verificar:".
					 "<br />".
					 "Nro de Registro <br />".
					 "RUC ".
					 "<br />".
					 "Para mas información contactar con el INIA".
					 "<br />".
					 "Atentamente,<br />".
					 "Administrador del INIA<br />"
					 );
		  $smt->AddAddress($email, "");
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
	public function mensaje($usern,$id)
	{
	    if($id==1)
	    {
		$cruge=Cruge::model()->find('username=:username', array(':username'=>$usern));
		$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>$cruge->iduser));
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
	
	 public static function passwordGenerator()
	{
		//Se define una cadena de caractares. Te recomiendo que uses esta.		
		$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";		
		//Obtenemos la longitud de la cadena de caracteres		
		$longitudCadena=strlen($cadena);		
		//Se define la variable que va a contener la contraseña		
		$pass = "";
		//Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras		
		$longitudPass=10;		
		//Creamos la contraseña		
		for($i=1 ; $i<=$longitudPass ; $i++){		
		//Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1		
		$pos=rand(0,$longitudCadena-1);		
		//Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
		
		$pass .= substr($cadena,$pos,1);		
		}		
		return $pass;
	    //return substr(rand(), 0, 8);
	}
	public function actionIview($id)
	{
		$this->pageTitle = "Usuario";
		$this->render('iview',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionIcreate()
	{
	    $this->pageTitle = "Usuario Productor";
	    $model=new User;
	    // Uncomment the following line if AJAX validation is needed
	    // $this->performAjaxValidation($model);
	    $departamentos = Location::model()->findAll(array(
		      'select'   => 't.department, t.department_id',
		      'group'    => 't.department',
		      'order'    => 't.department ASC',
		      'distinct' => true
	    ));
	    
	    $estaciones = EstacionExperimental::model()->findAll(array(
		      'select'   => 't.id, t.descripcion',
		      'group'    => 't.descripcion',
		      'order'    => 't.descripcion ASC',
		      'distinct' => true
	    ));
	    $provincias = array();
	    $distritos = array();
	    if(isset($_POST['User']))
	    {
		$model->attributes=$_POST['User'];
		$model->ruc='20131365994';
		$model->legal_name='INSTITUTO NACIONAL DE INNOVACION AGRARIA';
		$model->type_id=2;
		$model->district_id=$_POST['User']['district_id'];
		$model->address=$_POST['User']['var_direccion'];
		$model->reference=$_POST['User']['var_referencia'];
		$model->tipo_estacion_experimental=$_POST['User']['tipo_estacion_experimental'];
		$model->fecha_registro=date("Y-m-d H:i:s");
		$model->save();
		$this->redirect(array('iadmin'));
	    }

	    $this->render('create',array(
		    'model'=>$model,
		    'tipo'=>'interno',
		    'departamentos'=>$departamentos,
		    'estaciones'=>$estaciones,
		    'provincias'=>$provincias,
		    'distritos'=>$distritos
	    ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionIupdate($id)
	{
		$this->pageTitle = "Actualizar";
		$model=$this->loadModel($id);
		/*
		$distritos = Location::model()->findAll(array(
		      'select'   => 't.district, t._district_id',
		      'where'	 => 't._district_id="'..'"',
		      'group'    => 't.district',
		      'order'    => 't.district ASC',
		      'distinct' => true
		));
		
		$provincias = Location::model()->findAll(array(
		      'select'   => 't.province, t._province_id',
		      'where'	 => 't._department_id="'.$mode.'"',
		      'group'    => 't.province',
		      'order'    => 't.province ASC',
		      'distinct' => true
		));*/
		/*$region = Location::model()->findOne(array(
		      'select'   => 't.department_id,t.province_id,t.district, t.district_id',
		      'condition'=> 't.district_id='.$model->district_id.'',
		      'order'    => 't.district ASC',
		      'distinct' => true
		));*/
		$region=Location::model()->find('district_id=:district_id', array(':district_id'=>$model->district_id));	
		$model->department_id=$region->department_id;
		$model->province_id=$region->province_id;
		//var_dump($distritos);die;
		$departamentos = Location::model()->findAll(array(
		      'select'   => 't.department, t.department_id',
		      'group'    => 't.department',
		      'order'    => 't.department ASC',
		      'distinct' => true
		));
		
		$provincias = Location::model()->findAll(array(
			'select'    => 't.province_id, t.province, t.province_id, t.department_id',
			'condition' => 'department_id = "' . $model->department_id.'"',
			'order'		=>'t.province',
			'distinct' => true
		));
		
		$distritos = Location::model()->findAll(array(
			'select'    => 't.district, t.district_id, t.province_id',
			'condition' => 'province_id = "' . $model->province_id.'"',
			'order'		=>'t.district',
			'distinct' => true
		));
		
		
		
		$estaciones = EstacionExperimental::model()->findAll(array(
		      'select'   => 't.id, t.descripcion',
		      'group'    => 't.descripcion',
		      'order'    => 't.descripcion ASC',
		      'distinct' => true
		));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('iadmin'));
		}

		$this->render('iupdate',array(
			'model'=>$model,
			'estaciones'=>$estaciones,
			'departamentos'=>$departamentos,
			'provincias'=>$provincias,
			'distritos'=>$distritos
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionIdelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('iadmin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIindex()
	{
		$this->pageTitle = "Usuario";
		$dataProvider=new CActiveDataProvider('User',array(
				'criteria'=>array(
					'condition'=>'cruge_user_id!=:id',
					'params'=>array(':id'=>Yii::app()->user->id),
			)));
		$this->render('iindex',array(
			'dataProvider'=>$dataProvider,
		));		      
	}

	/**
	 * Manages all models.
	 */
	public function actionIadmin()
	{
		$this->pageTitle = "Administrador";
		$model=new User('searchproductoree');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('iadmin',array(
			'model'=>$model,
		));
	}
	
	public function actionInscreate()
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
			
			$cruge->username=$_POST['User']['username'];
			$cruge->password=$this->passwordGenerator();
			$cruge->email=$_POST['User']['email'];
			$cruge->state=1;
			
			if($cruge->save())
			{
				$cuenta=Cruge::model()->find('username=:username and email=:email', array(':username'=>$_POST['User']['username'],':email'=>$_POST['User']['email']));
				
				$rol->userid=$cuenta->iduser;
				$rol->itemname='inspector';
				$rol->data='N;';
				$rol->save();
				
				//Buscando al Organismo Certificador
				$org=Headquarter::model()->find('id=:id',array(':id'=>$_POST['User']['headquarter_id']));
				
				if($org->tipo_empresa==2)
				{
				//Inspectores Nacionales
					$model->ruc='20131365994';
					$model->legal_name='INSTITUTO NACIONAL DE INNOVACION AGRARIA';			
					$model->address='Av. la Molina Nro. 1981 (Frente Universidad Agraria la Molina)';
					$model->phone='3492600';
				}	
				elseif($org->tipo_empresa==1)
				{//Inspetore PArticulares
					$user=User::model()->find('headquarter=:headquarter',array(':headquarter'=>$_POST['User']['headquarter_id']));
					$model->ruc=$org->ruc;
					$model->legal_name=$user->legal_name;			
					$model->address=$user->address;
					$model->phone=$user->phone;
				}
				
				$model->name=$_POST['User']['username'];
				$model->status=2;//Activo
				$model->type_id=3;	//Inspector
				$model->cruge_user_id=$cuenta->iduser;
				$model->district_id=$org->location_id;
				$model->headquarter_id=$org->id;
				
				if($model->save())
					
					$mensaje=$this->mensaje($model->name,'2');
					
					$this->redirect(array('iview','id'=>$model->id));			
				
			}
			
				
		}
		
		$this->render('create',array(
			'model'=>$model,'tipo'=>'inspector'
		));
	}	
}
