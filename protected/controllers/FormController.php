<?php

class FormController extends Controller
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
				'actions'=>array('index','view','aindex','aview','asignarinsp','iindex','iview','observacion','inspection'),
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
		$model=new Form;
		$inbox=new Inbox;
		
                //$crop = Crop::model()->findAll('parent is null');
		
		
		if(isset($_POST['Form']))
		{
			$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));			
			$model->attributes=$_POST['Form'];                        
			$model->user_id=$user->id;
			
                        $crop=Crop::model()->find('id=:id', array(':id'=>$_POST['Form']['variety_id']));
			$model->crop_id=$crop->parent;
			
			if($model->save())
			{	
				$criteria=new CDbCriteria;
				$criteria->select='max(id) as id';
				$criteria->condition='user_id=:user_id';
				$criteria->params=array(':user_id'=>$user->id);
				$form = Form::model()->find($criteria);

				
				
					$inbox->attributes=$_POST['Form'];
					$inbox->form_id=$form->id;
					$inbox->to=$user->id;
					$inbox->status_id=1;
					$inbox->date=date('d/m/y');
					if($inbox->save())
					$this->redirect(array('view','id'=>$model->id));
				
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
		$crop = Crop::model()->findAll('parent is null');
		if(isset($_POST['Form']))
		{
			$model->attributes=$_POST['Form'];
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
            
            if(Yii::app()->user->name=='admin')
            {
                $dataProvider=new CActiveDataProvider('Form');
            }
            else
            {
                $user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));               
                $dataProvider=new CActiveDataProvider('Form',array(
                                                                   'criteria'=>array('condition'=>'user_id='.$user->id)
                ));
            
            }
                       
           $this->render('index',array(
			 'dataProvider'=>$dataProvider,
	    ));
            
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Form('search');                
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Form']))
			$model->attributes=$_GET['Form'];
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
	 * @return Form the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
                if(Yii::app()->user->name=='admin'  || Yii::app()->user->name=='rol_cuentas' || Yii::app()->user->name=='rol_inspector' || Yii::app()->user->name=='administrador_inia')
                {
                     $model=Form::model()->findByPk($id);                    
                }
                else
                {
                    $user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
                    $model=Form::model()->find('user_id=:user_id and id=:id', array(':user_id'=>$user->id,':id'=>$id));                   
                }
               
		
                
                //$model=Form::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Form $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
		
	/*public function actionObtenercultivar($idcultivar){
		
		$resp = Crop::model()->findAll('parent=:parent',array(':parent'=>$idcultivar));
		header("Content-type: application/json");
		echo CJSON::encode($resp);
	}*/
              
        
	public function actionAindex()
	{
            
           /* if(Yii::app()->user->name=='admin')
            {
                $dataProvider=new CActiveDataProvider('Form');
            }
            else
            {
                $user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));               
                $dataProvider=new CActiveDataProvider('Form',array(
                                                                   'criteria'=>array('condition'=>'user_id='.$user->id)
                ));
            
            }*/
	   
	   
           /*$dataProvider=new CActiveDataProvider('Form',array(
                                                                   'criteria'=>array('condition'=>'user_id='.$user->id)
                ));*/
	   $dataProvider=new CActiveDataProvider('Form');
           $this->render('aindex',array(
			 'dataProvider'=>$dataProvider,
	    ));
            
	}
	
	public function actionAview($id)
	{
		$this->render('aview',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionAsignarinsp()
	{
			$inspector=$_REQUEST['inspector'];			
			$form=$_REQUEST['form'];
			$inbox=new Inbox;		
			$inbox->date=date('d/m/y');
			$inbox->form_id=$form;
			$inbox->to=$inspector;
			$inbox->status_id=3;
			$inbox->save();
			
			
	}
	
	public function actionIindex()
	{
            
           /* if(Yii::app()->user->name=='admin')
            {
                $dataProvider=new CActiveDataProvider('Form');
            }
            else
            {
                $user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));               
                $dataProvider=new CActiveDataProvider('Form',array(
                                                                   'criteria'=>array('condition'=>'user_id='.$user->id)
                ));
            
            }*/
	   
	   
           /*$dataProvider=new CActiveDataProvider('Form',array(
                                                                   'criteria'=>array('condition'=>'user_id='.$user->id)
                ));*/
	   $dataProvider=new CActiveDataProvider('Form');
           $this->render('iindex',array(
			 'dataProvider'=>$dataProvider,
	    ));
            
	}
	public function actionIview($id)
	{
		$this->render('iview',array(
			'model'=>$this->loadModel($id),
		));
	}
        
	public function actionObservacion()
	{
		$observacion=$_REQUEST['observacion'];
		$form=Form::model()->find('id=:id', array(':id'=>$_REQUEST['form']));
		if($_REQUEST['id']==1)
		{
			$form->observacion_aprobado=$observacion;
			$form->save();
			
		}
		else if($_REQUEST['id']==2)
		{
			$form->observacion_notificado=$observacion;
			$form->save();
		}
		
		
		/*$model=Form::model()->find('id=:id', array(':id'=>47));
		$model->observacion_aprobado='data';
		$model->save();
		*/		
		
	}
	
	
	
}
