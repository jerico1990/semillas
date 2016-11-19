<?php

class IformController extends Controller
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

				'actions'=>array('index','view','aindex','aview','asignarinsp','iindex','vsolicitud','vcampo','vacondicionamiento','vmuestreo','vetiquetado',
									  'iview','observacion','inspection','prueba','acondicionamiento','files','updateacondicionamiento',
									  'asolicitud','acampo','aacondicionamiento','amuestreo','aetiquetado','PupdateAcondicionamiento',
									  'PupdateMuestreo','PupdateEtiquetado',
									  'ivsolicitud','ivcampo','ivacondicionamiento','ivmuestreo','ivetiquetado','updatemuestreo','send','updateetiquetado',

									  'acondicionamientoview','cultivar','fmodificacion','fmodificacionindex',
									  'modificacionupdate','produccionindex','movilizacionindex','muestreo','laboratorio','ubicacion'),
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
		  $this->pageTitle = "Expediente";
		$this->render('vsolicitud',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionVsolicitud($id)
	{
		  $this->pageTitle = "Solicitud";
		$this->render('vsolicitud',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionVcampo($id)
	{
		  $this->pageTitle = "Campo";
		$this->render('vcampo',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionVacondicionamiento($id)
	{
		$this->pageTitle = "Acondicionamiento";
		$data = " ";
		$this->render('vacondicionamiento',array(
			'model'=>$this->loadModel($id),'myValue'=>$data,
		));
	}
	public function actionVmuestreo($id)
	{
			$this->pageTitle = "Muestreo";
			
			$data = " ";
		  
			$this->render('vmuestreo',array(
			'model'=>$this->loadModel($id),'myValue'=>$data,
			));
	}
	
	public function actionVetiquetado($id)
	{
			$this->pageTitle = "Etiquetado";
			
			$data = " ";
		  
			$this->render('vetiquetado',array(
			'model'=>$this->loadModel($id),'myValue'=>$data,
			));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->pageTitle = "Generar Solicitud";
		$model=new Iform;
		$inbox=new Inbox;
		$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
		$ubigeo=Location::model()->find('district_id=:district_id',array(':district_id'=>$user->district_id));
		if(isset($_POST['Iform']))
		{	
		    
		    $model->attributes=$_POST['Iform'];                        
		    $model->user_id=$user->id;
		    /*
		    if($_REQUEST['location_lon']=="" || $_REQUEST['location_lat']==""){
			    $_REQUEST['location_lat']=0;
			    $_REQUEST['location_lon']=0;
		    }*/
		    
		    //$model->location_lon=$_REQUEST['location_lon'];
		    //$model->location_lat=$_REQUEST['location_lat'];
		    
		    $crop_before=Crop::model()->find('id=:id', array(':id'=>$model->variety_before_id));
		    $model->variety_before_id=$model->variety_before_id;
		    $model->crop_before_id=$crop_before->parent;
		    
		    $crop=Crop::model()->find('id=:id', array(':id'=>$model->variety_id));
		    $model->crop_id=$crop->parent;
		    
		    $model->area=str_replace(',','',$model->area);
		    $model->sow_estimate_quantity=str_replace(',','',$model->sow_estimate_quantity);
		    $model->seed_date=date('Y-m-d',strtotime($model->seed_date));
		    if($model->save())
		    {
			if(!$model->farmers_dnis)
			{
			    $countAgricultores=0;
			}
			else
			{
			    $countAgricultores=count(array_filter($model->farmers_dnis));
			}
			for($i=1;$i<$countAgricultores;$i++)
			{
			    $farmers=new Farmers;
			    $farmers->form_id=$model->id;
			    $farmers->name=$model->farmers_nombres[$i];
			    $farmers->document_number=$model->farmers_dnis[$i];
			    $farmers->save();
			}
			    /*
			    //Insertando Farmers
			    for($i = 0; $i < (count($_REQUEST['Iform'])-10); ++$i)
			    {				
				    if(isset( $_REQUEST['Iform']['farmers_nombre_'.$i.'']) && $_REQUEST['Iform']['farmers_nombre_'.$i.'']!=="")
				    {
					    $farmers=new Farmers;
					    $farmers->form_id=$model->id;
					    $farmers->name=$_REQUEST['Iform']['farmers_nombre_'.$i.''];
					    $farmers->document_number=$_REQUEST['Iform']['farmers_dni_'.$i.''];
					    $farmers->save();
				    }
			    }*/
			    
			if(!$model->productors)
			{
			    $countFuentes=0;
			}
			else
			{
			    $countFuentes=count(array_filter($model->productors));
			}
			for($i=1;$i<$countFuentes;$i++)
			{
			    $source_doc=new SourceDoc;
			    $source_doc->form_id=$model->id;
			    $source_doc->control=$model->sources_controls[$i];
			    $source_doc->etiqueta=$model->sources_etiquetas[$i];  
			    $source_doc->cantidad=$model->sources_cantidades[$i]; 
			    $source_doc->document_reference=$model->documents_references[$i]; 
			    $source_doc->productor=$model->productors[$i];  
			    $source_doc->save();
			}
			/*
			    //Insertando Fuentes
			    for($a = 0; $a < (count($_REQUEST['Iform'])-10); ++$a)
			    {				
				    if(isset( $_REQUEST['Iform']['source_control_'.$a.'']) && $_REQUEST['Iform']['source_control_'.$a.'']!=="")
				    {
					    $source_doc=new SourceDoc;
					    //echo $_REQUEST['Iform']['farmers_nombre_'.$i.''];
					    $source_doc->form_id=$model->id;
					    $source_doc->control=$_REQUEST['Iform']['source_control_'.$a.''];
					    $source_doc->etiqueta=$_REQUEST['Iform']['source_etiqueta_'.$a.''];
					    $source_doc->cantidad=$_REQUEST['Iform']['source_cantidad_'.$a.''];
					    $source_doc->document_reference=$_REQUEST['Iform']['document_reference_'.$a.''];
					    $source_doc->productor=$_REQUEST['Iform']['productor_'.$a.''];
					    $source_doc->save();
				    }
			    }
			*/
			    $inbox->attributes=$_POST['Iform'];
			    $inbox->form_id=$model->id;
			    $inbox->to=$user->id;
			    $inbox->status_id=1;
			    $inbox->estado=1;
			    $inbox->date=date('Y-m-d');		
			    if($inbox->save())
			    {
				    
				    //Pagos
				    $headquarter=Headquarter::model()->find('id=:id',array(':id'=>$_POST['Iform']['headquarter_id']));
				    if($headquarter->tipo_empresa==2)
				    {
					    
					    $concepto = Concept::model()->find('id=:id',array(':id'=>1));					
					    $payment=new Payment;
					    $payment->concept_id=$concepto->id;
					    $payment->date=date('Y-m-d');
					    $payment->quantity=1;
					    $payment->ruc=$user->ruc;
					    $payment->price=$concepto->price;
					    $payment->form_id=$model->id;
					    $payment->user_id=$model->user_id;
					    $payment->descripcion=$concepto->short_name." de ".$model->crop->name;
					    $payment->document_reference=date('Y-m-d');
					    $payment->save();
				    }					
				    $this->redirect(array('view','id'=>$model->id));
			    }
		    }
		}

		$this->render('create',array(
			'model'=>$model,
			'ubigeo'=>$ubigeo
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->pageTitle = "Editar Solicitud";
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$crop = Crop::model()->findAll('parent is null');
		if(isset($_POST['Iform']))
		{
			$model->attributes=$_POST['Iform'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,'crop'=>$crop
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
	    $this->pageTitle = "Solicitudes";
		if(Yii::app()->user->name=='admin')
            {
                $dataProvider=new CActiveDataProvider('Iform');
            }
            else
            {
                $user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));               
                /*$dataProvider=new CActiveDataProvider('Iform',array(
                                                                   'criteria'=>array('condition'=>'user_id='.$user->id, 'order'=>'create_time DESC',)
                ));*/
		
		$dataProvider=new CActiveDataProvider('Iform', array(
			'criteria' => array(
			'condition'=>'status_id=1',
			'join' =>'INNER JOIN inbox  ON inbox.form_id=t.id and inbox.to='.$user->id,
			'order'=>'inbox.form_id DESC'
			),
		   'pagination'=>array(
            'pageSize'=>3,)			
			));							         
   
            }
                       
           $this->render('index',array(
			 'dataProvider'=>$dataProvider,
	    ));
	}
	
	public function actionSend() {

		$ds = DIRECTORY_SEPARATOR;  //1

		
		$model = new Files;
		$model->form_id = $_GET['id'];
		$model->url = $_GET['url'];
		$model->name_file = $_FILES['Iform']['name']['file'];
		$model->save();
		
		if (!empty($_FILES)) {
         $tempFile = $_FILES['Iform']['tmp_name']['file'];          //3             
         //$targetPath = Yii::getPathOfAlias('webroot.files');  //4
			$targetPath = 'c:\\xampp\\htdocs\\inia\\files\\'; 

		   $targetFile =  $targetPath. $_FILES['Iform']['name']['file'];  //5


			move_uploaded_file($tempFile,$targetFile); //6
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Iform('search');                
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Iform']))
			$model->attributes=$_GET['Iform'];
                $user = User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
                $model->user_id = $user->id;
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Iform the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		 if(Yii::app()->user->name=='administrador_inia'  || Yii::app()->user->checkAccess('estacion'))
                {
                     $model=Iform::model()->findByPk($id);                    
                }
		elseif(Yii::app()->user->checkAccess('inspector'))
		{			
			$model=Iform::model()->find('id=:id', array(':id'=>$id));
		}
                else
                {
                    $user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
                    $model=Iform::model()->find('user_id=:user_id and id=:id', array(':user_id'=>$user->id,':id'=>$id));                   
                }
		
                //$model=Form::model()->findByPk($id);
		if($model==null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Iform $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']=='iform-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionAindex()
	{	
	    $this->pageTitle = "Administrar Expedientes";
	    $model=new Iform('search');
	    $model->unsetAttributes();  // clear any default values
	    if(isset($_GET['Iform']))
	    {
		$model->attributes=$_GET['Iform'];
	    }
	    
	    $this->render('aindex',array(
		    'model'=>$model
	    ));
	}
	
	public function actionAview($id)
	{
		$this->render('aview',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionAsolicitud($id)
	{
		  $this->pageTitle = "Solicitud";
		  $this->render('asolicitud',array(
			  'model'=>$this->loadModel($id),
		  ));
	}
	public function actionAcampo($id)
	{
		  $this->pageTitle = "Campo";
		  $this->render('acampo',array(
			  'model'=>$this->loadModel($id),
		  ));
	}
	public function actionAacondicionamiento($id)
	{
		  $this->pageTitle = "Acondicionamiento";
		  $this->render('aacondicionamiento',array(
			  'model'=>$this->loadModel($id),
		  ));
	}
	public function actionAmuestreo($id)
	{
		  $this->pageTitle = "Muestreo";
		  $data="";
		  $this->render('amuestreo',array(
			  'model'=>$this->loadModel($id),'myValue'=>$data,
		  ));
	}
	public function actionAetiquetado($id)
	{
		  $this->pageTitle = "Etiquetado";
		  $data="";
		  $this->render('aetiquetado',array(
			  'model'=>$this->loadModel($id),'myValue'=>$data,
		  ));
	}
	public function actionAsignarinsp()
	{
	    //var_dump($_POST);die;   
	    $inspector=$_REQUEST['inspector'];			
	    $form=$_REQUEST['form'];
	    $inbox=new Inbox;		
	    $inbox->date=date('Y-m-d');
	    $inbox->form_id=$form;
	    $inbox->to=$inspector;
	    $inbox->status_id=3;
	    $inbox->estado=1;
	    $inbox->save();
	}
	
	public function actionIindex()
	{
		 /* $this->pageTitle = "Expedientes";
		  $user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
               $dataProvider=new CActiveDataProvider('Iform', array(
								'criteria' => array(
								    'condition'=>'status_id=3',
								    'join' => 'INNER JOIN inbox  ON inbox.form_id=t.id and inbox.to='.$user->id,
								)
							    ));
		$this->render('iindex',array(
			 'dataProvider'=>$dataProvider,
		));*/
      $this->pageTitle = "Administrar Expedientes";
		$model=new Iform('searchi');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Iform']))
			$model->attributes=$_GET['Iform'];
		$this->render('iindex',array(
			'model'=>$model
		));
	}
	
	
	
	public function actionIview($id)
	{
		  $this->pageTitle = "Detalle de expediente";
		  die;
		  $this->render('ivsolicitud',array(
			  'model'=>$this->loadModel($id),
		  ));
	}
	public function actionIvsolicitud($id)
	{
		  $this->pageTitle = "Solicitud";
		  $this->render('ivsolicitud',array(
			  'model'=>$this->loadModel($id),
		  ));
	}
	public function actionIvcampo($id)
	{
		  $this->pageTitle = "Campo";
		  $this->render('ivcampo',array(
			  'model'=>$this->loadModel($id),
		  ));
	}
	public function actionIvacondicionamiento($id)
	{
		  $data="";
		  $update_acondicionamiento="";
		  $this->pageTitle = "Acondicionamiento";
		  $this->render('ivacondicionamiento',array(
			  'model'=>$this->loadModel($id),'myValue'=>$data,'update_acondicionamiento'=>$update_acondicionamiento
		  ));
	}
	public function actionIvmuestreo($id)
	{
		  $this->pageTitle = "Muestreo";
		  $data="";
		  $this->render('ivmuestreo',array(
			  'model'=>$this->loadModel($id),'myValue'=>$data,
		  ));
	}
	public function actionIvetiquetado($id)
	{
		  $this->pageTitle = "Etiquetado";
		  $data="";
		  $this->render('ivetiquetado',array(
			  'model'=>$this->loadModel($id),'myValue'=>$data,
		  ));
	}  
	public function actionObservacion()
	{
		
		$observacion=$_REQUEST['observacion'];
		$form=Iform::model()->find('id=:id', array(':id'=>(int)$_REQUEST['form']));
		$inbox=Inbox::model()->find('t.form_id=:form_id and t.status_id=:status_id ', array(':form_id'=>$_REQUEST['form'],':status_id'=>3));
		$user=User::model()->find('id=:id',array(':id'=>$form->user_id));
		  //APROBADO
		if($_REQUEST['id']=='1')
		{
			
			$inbox->estado=0;
			$inbox->save();
			
			//Expediente
			
			$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$form->location_id));
			$headquarter=Headquarter::model()->find('parent_id=:parent_id and location_id=:location_id',
																 array(':parent_id'=>$form->headquarter_id,':location_id'=>$location->department_id));
			
			//Fechaa para diferentes anio
			$correlativo=$headquarter->correlativo+1;				
			$headquarter->correlativo=$correlativo;
			$headquarter->save();
			
			$expediente=$headquarter->codigo_simple."-".$correlativo."-".date('y');
			
			$form->form_number=$expediente;
			$form->save();
			
		
			
			//Aprobado
			$aprobado=new Inbox;		
			$aprobado->date=date('Y-m-d');
			$aprobado->form_id=$form->id;
			$aprobado->to=$form->user_id;
			$aprobado->status_id=4;
			$aprobado->estado=1;
			$aprobado->aprobado=$observacion;
			$aprobado->save();
			
			$inspeccion=new Inspection;
			$inspeccion->proposed_date=date('Y-m-d',strtotime($_REQUEST['fecha_visita']));
			$inspeccion->user_id=$form->user_id;
			$inspeccion->form_id=$form->id;
			$inspeccion->inspection_number=1;
			$inspeccion->save();
		
			
			$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$form->headquarter_id));
			
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
				$payment->form_id=$form->id;
				$payment->user_id=$form->user_id;
				$payment->document_reference=$form->form_number;
				$payment->descripcion="1ra Inspección de campo de multiplicación de ".$form->crop->name;
				$payment->save();			
			}
			else if($headquarter->tipo_empresa==1)//Particular
			{
				$inboxp=Inbox::model()->find('t.form_id=:form_id and t.status_id=:status_id ', array(':form_id'=>$_REQUEST['form'],':status_id'=>4));
				$inboxp->estado=0;
				$inboxp->save();
				//Solicitada
				$inspectionp=Inspection::model()->find('id=:id',array(':id'=>$inspeccion->id));
				if($inspectionp->inspection_number==1)
				{
					$solicitada=new Inbox;
					$solicitada->date=date('Y-m-d');
					$solicitada->form_id=$form->id;
					$solicitada->to=$form->user_id;
					$solicitada->status_id=7;
					$solicitada->estado=1;
					$solicitada->save();
				}
				//Inspeccion
				$inspeccion=Inspection::model()->find('form_id=:form_id and user_id=:user_id and inspection_number=:inspection_number',
														  array(':form_id'=>$form->id,':user_id'=>$inboxp->to,':inspection_number'=>$inspectionp->inspection_number));
				$inspeccion->proposed_time=date("H:i",strtotime('12:00 PM'));
				$inspeccion->proposed_date=date('Y-m-d',strtotime($_REQUEST['fecha_visita']));
				$inspeccion->save();
			}
		}
		//OBSERVACION
		else if($_REQUEST['id']=='2')
		{
			$inbox->estado=0;
			$inbox->save();
			
			$observar=new Inbox;		
			$observar->date=date('Y-m-d');
			$observar->form_id=$form->id;
			$observar->to=$form->user_id;
			$observar->status_id=6;
			$observar->estado=1;
			$observar->observado=$observacion;
			$observar->save();	
		}
		//RECHAZO
		else if($_REQUEST['id']=='3')
		{
			$inbox->estado=0;
			$inbox->save();
			$rechazar=new Inbox;		
			$rechazar->date=date('Y-m-d');
			$rechazar->form_id=$form->id;
			$rechazar->to=$form->user_id;
			$rechazar->status_id=5;
			$rechazar->estado=1;
			$rechazar->rechazado=$observacion;
			$rechazar->save();	
		}
		//Ins. Observada
		else if($_REQUEST['id']=='6')
		{
			$inbox->estado=0;
			$inbox->save();
			$rechazar=new Inbox;		
			$rechazar->date=date('Y-m-d');
			$rechazar->form_id=$form->id;
			$rechazar->to=$form->user_id;
			$rechazar->status_id=5;
			$rechazar->estado=1;
			$rechazar->rechazado=$observacion;
			$rechazar->save();	
		}
		//SOLICITAR INSPECCIÓN
		else if($_REQUEST['id']=='7')
		{		
			$inbox=Inbox::model()->find('t.form_id=:form_id and t.status_id=:status_id ', array(':form_id'=>$_REQUEST['form'],':status_id'=>4));
			$inbox->estado=0;
			$inbox->save();
			//Solicitada
			if($_REQUEST['inspeccion']==1)
			{
			$solicitada=new Inbox;
			$solicitada->date=date('Y-m-d');
			$solicitada->form_id=$form->id;
			$solicitada->to=$form->user_id;
			$solicitada->status_id=7;
			$solicitada->estado=1;
			$solicitada->save();
			}
			//Inspeccion
		   $inspeccion=Inspection::model()->find('form_id=:form_id and user_id=:user_id and inspection_number=:inspection_number',
													  array(':form_id'=>$_REQUEST['form'],':user_id'=>$inbox->to,':inspection_number'=>$_REQUEST['inspeccion']));
			$inspeccion->proposed_time=date("H:i",strtotime($_REQUEST['hora']));
			$inspeccion->proposed_date=date('Y-m-d',strtotime($_REQUEST['fecha']));
			$inspeccion->save();
			
		}
		//NOTIFICAR VISITA iform/iview
		else if($_REQUEST['id']=='8')
		{
			
		  //CREANDO N° DE EXPEDIENTE
			$criteria=new CDbCriteria;
			$criteria->select='max(form_number) as form_number';
			$max = Iform::model()->find($criteria);
			$max = $max->form_number + 1;
		  
		  //ACTUALIZANDO FECHA Y HORA PROGRAMADA
		  $inspeccion=Inspection::model()->find('form_id=:form_id and user_id=:user_id and inspection_number=:inspection_number',
															 array(':form_id'=> $_REQUEST['form'],':user_id'=>$form->user_id,':inspection_number'=>(int)$_REQUEST['ninspeccion']));
		  $inspeccion->real_date=date('Y-m-d',strtotime($_REQUEST['fecha']));
		  //$inspection->subsanacion=0;
		  //$inspection->rechazado=0;
		  $inspeccion->real_time=date("H:i",strtotime($_REQUEST['hora']));
		  $inspeccion->save();
		  //CREANDO INBOX DE INSPECCION PROGRAMADA
		  if($_REQUEST['ninspeccion']==1)
		  {
		   $programada=new Inbox;
			$programada->date=date('Y-m-d');
			$programada->form_id=$form->id;
			$programada->to=$form->user_id;
			$programada->status_id=11;
			$programada->estado=1;
			$programada->save();
			
			$progra=Inbox::model()->find('t.form_id=:form_id and t.status_id=:status_id ', array(':form_id'=>$programada->form_id,':status_id'=>11));
			if($progra!==null)
			{
				$solicitada=Inbox::model()->find('t.form_id=:form_id and t.status_id=:status_id ', array(':form_id'=>$programada->form_id,':status_id'=>7));
				$solicitada->estado=0;
				$solicitada->save();
			}
		  }
			
		}
		else if($_REQUEST['id']=='9')
		{
			$criteria=new CDbCriteria;			
			$criteria->condition='id=:id';
			$criteria->params=array(':id'=>$_REQUEST['inspeccion']);
			$inspeccion = Inspection::model()->find($criteria);			
			$inspeccion->subsanacion_date=date('Y-m-d',strtotime($_REQUEST['fecha']));
			$inspeccion->subsanacion_time=date("H:i",strtotime($_REQUEST['hora']));
			$inspeccion->save();
			
			
		}
		else if($_REQUEST['id']=='10')
		{
			
			//Guarda Fecha Propuesta
			$acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$_REQUEST['acondicionamiento']));
			$acondicionamiento->proposed_date=date('Y-m-d',strtotime($_REQUEST['fecha']));
			$acondicionamiento->proposed_time=date("H:i",strtotime($_REQUEST['hora']));
			$acondicionamiento->save();
			
			//Actualiza estado
			$solicitado=Inbox::model()->find('t.form_id=:form_id and t.status_id=:status_id ', array(':form_id'=>$form->id,':status_id'=>12));
			$solicitado->estado=0;
			$solicitado->save();
			
			//Creando inbox solicitud
			$solicitar=new Inbox;
			$solicitar->date=date('Y-m-d');
			$solicitar->form_id=$form->id;
			$solicitar->to=$form->user_id;
			$solicitar->status_id=13;
			$solicitar->estado=1;
			$solicitar->save();
		}
		else if($_REQUEST['id']=='11')//Notificar Acondicionamient
		{
			
			//Solicitada
			if($_REQUEST['acondicionamiento_number']==1)
			{
			$programada=new Inbox;
			$programada->date=date('Y-m-d');
			$programada->form_id=$form->id;
			$programada->to=$form->user_id;
			$programada->status_id=17;
			$programada->estado=1;
			$programada->save();
			}
			if($_REQUEST['acondicionamiento_number']==20)//Privados
			{
				$muestreo=Muestreo::model()->find('acondicionamiento_id=:acondicionamiento_id',array(':acondicionamiento_id'=>$_REQUEST['acondicionamiento']));
				$muestreo->notificacion_acondicionamiento=1;
				$muestreo->save();
			}
			//acondicionamient
			$acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$_REQUEST['acondicionamiento']));
			$acondicionamiento->real_date=date('Y-m-d',strtotime($_REQUEST['fecha']));
			$acondicionamiento->real_time=date("H:i",strtotime($_REQUEST['hora']));
			$acondicionamiento->save();
			
			
		}
		else if($_REQUEST['id']=='12')//Inspeccion Subsanacion
		{
			
			$inspeccion=Inspection::model()->find('form_id=:form_id and inspection_number=:inspection_number and subsanacion=TRUE',
															  array(':form_id'=>$_REQUEST['form'],
																	  ':inspection_number'=>$_REQUEST['ninspeccion']));
			$inspeccion->subsanacion_real_date=date('Y-m-d',strtotime($_REQUEST['fecha']));
			$inspeccion->subsanacion_real_time=date("H:i",strtotime($_REQUEST['hora']));
			$inspeccion->save();
		}
		else if($_REQUEST['id']=='13')//Acondicionamiento Subsanacion
		{
			
			$acondicionamiento=Acondicionamiento::model()->find('id=:id',array(':id'=>$_REQUEST['acondicionamiento']));
			$acondicionamiento->subsanacion_date=date('Y-m-d',strtotime($_REQUEST['fecha']));
			$acondicionamiento->subsanacion_time=date("H:i",strtotime($_REQUEST['hora']));
			$acondicionamiento->save();
		}
		else if($_REQUEST['id']=='14')//Acondicionamiento Subsanacion
		{
			
			$acondicionamiento=Acondicionamiento::model()->find('form_id=:form_id and acondicionamiento_number=:acondicionamiento_number and subsanacion=TRUE',
															  array(':form_id'=>$_REQUEST['form'],
																	  ':acondicionamiento_number'=>$_REQUEST['nacondicionamiento']));
			$acondicionamiento->subsanacion_real_date=date('Y-m-d',strtotime($_REQUEST['fecha']));
			$acondicionamiento->subsanacion_real_time=date("H:i",strtotime($_REQUEST['hora']));
			$acondicionamiento->save();
		}
		
	}
	
	public function actionAcondicionamiento()
	{
		$this->pageTitle = "Acondicionamiento de Campo";
		if(Yii::app()->user->checkAccess('productor'))
		{
			$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
			$dataProvider=new CActiveDataProvider('Iform', array(
						'criteria' => array(
							 'condition'=>'inbox.status_id=12',
							 'join' => 'INNER JOIN inbox  ON inbox.form_id=t.id and inbox.to='.$user->id,
						)
						 ));
		}
		if(Yii::app()->user->checkAccess('inspector'))
		{
			$dataProvider=new CActiveDataProvider('Iform', array(
			 'criteria' => array(
				  'condition'=>'inbox.status_id=12',
				  'join' => 'INNER JOIN inbox  ON inbox.form_id=t.id ',
			)
			)); 
		}
		
				 
		$this->render('acondicionamiento',array(
			'dataProvider'=>$dataProvider,
		));
            
	}
	
	public function actionAcondicionamientoview($id)
	{
		$this->render('acondicionamientoview',array(
		'model'=>$this->loadModel($id),
		));
	}
	
	public function actionCultivar()
	{
		$this->render('cultivar');
	}
	
	public function actionFmodificacion($id)
	{
		 $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$crop = Crop::model()->findAll('parent is null');
		if(isset($_POST['Iform']))
		{
			$model->attributes=$_POST['Iform'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('fmodificacion',array(
			'model'=>$model,'crop'=>$crop
		));
	}
	
	public function actionFmodificacionindex()
	{
		$this->pageTitle = "Modificación de Alcance";
		if(Yii::app()->user->checkAccess('productor'))
		{
			$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
			$dataProvider=new CActiveDataProvider('Iform', array(
			 'criteria' => array(
			 'condition'=>'status_id=4',
			 'join' =>'INNER JOIN inbox  ON inbox.form_id=t.id and inbox.to='.$user->id,
			 'order'=>'inbox.form_id DESC'
			 ),
			 'pagination'=>array(
				 'pageSize'=>3,)			
			 ));	
			
		}				
		$this->render('fmodificacionindex',array(
			 'dataProvider'=>$dataProvider,
		));
	}

	
	//Produccion
	public function actionProduccionindex()
	{
		$this->pageTitle = "Producción";
			if(Yii::app()->user->checkAccess('productor'))
			{
				$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
				$dataProvider=new CActiveDataProvider('Iform', array(
						'criteria' => array(
							 'condition'=>'inbox.status_id=12',
							 'join' => 'INNER JOIN inbox  ON inbox.form_id=t.id and inbox.to='.$user->id,
						),
				 'pagination'=>array(
					 'pageSize'=>3,)	
						 ));
			}				
			$this->render('produccionindex',array(
				'dataProvider'=>$dataProvider,
			));
	}
	
	public function actionMovilizacionindex()
	{
		$this->pageTitle = "Movilización";
			if(Yii::app()->user->checkAccess('productor'))
			{	
				$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
				$dataProvider=new CActiveDataProvider('Iform', array(
				 'criteria' => array(
				 'condition'=>'status_id=12',
				 'join' =>'INNER JOIN inbox  ON inbox.form_id=t.id and inbox.to='.$user->id,
				 'order'=>'inbox.form_id DESC'
				 ),
				 'pagination'=>array(
					 'pageSize'=>3,)			
				 ));	
				
			}				
			$this->render('movilizacionindex',array(
				'dataProvider'=>$dataProvider,
			));
	}
	public function actionMuestreo()
	{
		$this->pageTitle = "Muestreo";
			if(Yii::app()->user->checkAccess('productor'))
			{
				$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
				$dataProvider=new CActiveDataProvider('Iform', array(
						'criteria' => array(
							 'condition'=>'inbox.status_id=18',
							 'join' => 'INNER JOIN inbox  ON inbox.form_id=t.id and inbox.to='.$user->id,
						),
				 'pagination'=>array(
					 'pageSize'=>3,)	
						 ));		
			}				
			$this->render('muestreo',array(
				'dataProvider'=>$dataProvider,
			));
	}
	public function actionLaboratorio()
	{
		$this->pageTitle = "Laboratorio";
			if(Yii::app()->user->checkAccess('laboratorio'))
			{
				$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
				$dataProvider=new CActiveDataProvider('Iform', array(
						'criteria' => array(
							 'condition'=>'inbox.status_id=23',
							 'join' => 'INNER JOIN inbox  ON inbox.form_id=t.id and inbox.to='.$user->id,
						),
				 'pagination'=>array(
					 'pageSize'=>3,)	
						 ));		
			}				
			$this->render('laboratorio',array(
				'dataProvider'=>$dataProvider,
			));
	}
	
	public function actionUbicacion($id)
	{
		$form=Iform::model()->find('id=:id',array(':id'=>$id));
		$this->render('ubicacion',array('model'=>$form));
	}
	
	public function actionFiles($id)
	{
	    //$model=new Files;
	    $form=Iform::model()->find('id=:id',array(':id'=>$id));
	    $files=Files::model()->findAll('form_id=:form_id',array(':form_id'=>$id));
	    if(isset($_FILES['Files']))
	    {
		$model=new Files;
		//$count=count();
		$model->archivos=CUploadedFile::getInstances($model,'archivos');
		//var_dump($model->archivos);die;//
		foreach ($model->archivos as $file) {
		    $doc=new Files;
		    $doc->form_id=$id;
		    $doc->name=$file->name;
		    $doc->estado=1;
		    $doc->insert();
		    $file->saveAs('files/'.$doc->id.'.pdf');
		    $doc->name_file=$doc->id.'.pdf';
		    $doc->update();
		}
		$this->refresh();	
	    }
	    $this->render('files',array('model'=>$form,'files'=>$files));
	}
	
	public function actionUpdateMuestreo($id)
	{
		
		$data = "$id"; 
		$this->renderPartial('_ajaxContent', array('myValue'=>$data), false, true);
	}
	public function actionUpdateAcondicionamiento($id)
	{	
		$data = "$id"; 
		$this->renderPartial('_ajaxContentacon', array('myValue'=>$data), false, true);
	}
	
	public function actionUpdateEtiquetado($id)
	{	
		$data = "$id"; 
		$this->renderPartial('_ajaxContentaetiquetado', array('myValue'=>$data), false, true);
	}
	public function actionAhistory()
	{	
		if(Yii::app()->user->checkAccess('estacion'))
		{
		$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));               
                $dataProvider=new CActiveDataProvider('Iform', array(
			'criteria' => array(
			'condition'=>'status_id=2',
			'join' => 'INNER JOIN inbox  ON inbox.form_id=t.id and inbox.to='.$user->id,
			'order'=>'inbox.form_id DESC',
			)
			));
		$this->render('ahistory',array(
		'dataProvider'=>$dataProvider,		
		));
		}
		else
		throw new CHttpException(404,'The requested page does not exist.');
	}
	public function actionPupdateAcondicionamiento($id)
	{		
		$data = "$id";
		$update_acondicionamiento=new Acondicionamiento;
		$this->renderPartial('_ajaxPacondicionamiento', array('myValue'=>$data,'update_acondicionamiento'=>$update_acondicionamiento), false, true);
	}
	public function actionPupdateMuestreo($id)
	{
		
		$data = "$id"; 
		$this->renderPartial('_ajaxPmuestreo', array('myValue'=>$data), false, true);
	}
	public function actionPupdateEtiquetado($id)
	{
		$data = "$id"; 
		$this->renderPartial('_ajaxPetiquetado', array('myValue'=>$data), false, true);
	}
	
}
