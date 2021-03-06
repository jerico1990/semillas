<?php
class SolicitudController extends Controller
{
   public function actionIndex()
   {
      $this->layout='blanco';
      $this->pageTitle = "Inscribir Productor";
      $model=new Solicitud;
      //$departamentos=$connection->createCommand('select department_id,department,department_id from location')->queryAll();
      $locationsdeps = Location::model()->findAll(array(
			  'select'   => 't.id, t.department, t.department_id',
			  'group'    => 't.id,t.department',
			  'order'    => 't.department ASC',
			  'distinct' => true
		     ));
      $departamentos = Location::model()->findAll(array(
			  'select'   => 't.department, t.department_id',
			  'group'    => 't.department',
			  'order'    => 't.department ASC',
			  'distinct' => true
		     ));
      $departments = CHtml::listData($locationsdeps,'department_id','department');      
      
      if(isset($_POST['Solicitud']))
      {
         //New objeto User
         $user=new User;
         
         $model->attributes=$_POST['Solicitud'];			
         if($model->validate())
         {
	    //var_dump($model->tipo_documento);die;
            $producer=Producer::model()->find('registry=:registry', array(':registry'=>$model->var_registro));
            $user->registry=$model->var_registro;
            $user->ruc=$model->var_ruc;
            $user->legal_name=$model->var_razon_social;
            $user->document_number=$model->var_dni;
            $user->first_name=$model->var_nombres;
            $user->last_name=$model->var_apellidos;
            $user->email=$model->var_correo;
            $user->phone=$model->var_telefono;
            $user->fax=$model->var_fax;
            $user->district_id=$model->district_id;   
            $user->address=$model->var_direccion;
            $user->reference=$model->var_referencia;
            $user->producer_id=$producer->id;
            $user->status=1;
	    $user->type_id=1;
	    $user->tipo_documento=$model->tipo_documento;
	    $user->fecha_registro=date("Y-m-d H:i:s");
            if($user->save())
            {
               Yii::app()->user->setFlash('msg','Su registro ha sido enviado,gracias.<br>Por favor revisar su correo electrónico.');
               $this->refresh();
            }         
         }
      }  
      $this->render('index',array('model'=>$model,'departments'=>$departments,'departamentos'=>$departamentos));
   }
   
   public function actionNroruc()
   {
      if(isset($_POST['ruc']) && $_POST['ruc']!='')
      {
	 $bandera=0;
	 $ruc=$_POST['ruc'];
	 $producer=Producer::model()->find('document_number=:document_number',array(':document_number'=>$ruc));
	 if($producer)
	 {
	    $usuario=User::model()->find('ruc=:ruc', array(':ruc'=>$ruc));
	    if($usuario)
	    {
	       $bandera=1;
	    }
	 }
	 else
	 {
	    $bandera=2;
	 }
	 echo $bandera;
      }
   }
   
   public function actionNroregistro()
   {
      if(isset($_POST['registro']) && $_POST['registro']!='')
      {
	 $bandera=0;
	 $registro=$_POST['registro'];
	 $producer=Producer::model()->find('registry=:registry',array(':registry'=>$registro));
	 if($producer)
	 {
	    $usuario=User::model()->find('registry=:registry', array(':registry'=>$registro));
	    if($usuario)
	    {
	       $bandera=1;
	    }
	 }
	 else
	 {
	    $bandera=2;
	 }
	 echo $bandera;
      }
   }
   
   public function actionNroregistroruc()
   {
      if(isset($_POST['registro']) && $_POST['registro']!='' && isset($_POST['ruc']) && $_POST['ruc']!='')
      {
	 $registro=$_POST['registro'];
	 $ruc=$_POST['ruc'];
	 $bandera=0;
	 $producer=Producer::model()->find('registry=:registry and document_number=:document_number',array(':registry'=>$registro,':document_number'=>$ruc));
	 if(!$producer)
	 {
	    $bandera=1;
	 }
	 echo $bandera;
      }      
   }
   
   public function actionDni()
   {
      if(isset($_POST['documento']) && $_POST['documento']!='')
      {
	 $dni=$_POST['documento'];
	 $usuario=User::model()->find('document_number=:document_number', array(':document_number'=>$dni));
	 if($usuario)
	 {
	    echo 1;
	 }
      }
   }
   
   public function actionEmail()
   {
      if(isset($_POST['email']) && $_POST['email']!='')
      {
	 $email=$_POST['email'];
	 $usuario=User::model()->find('email=:email', array(':email'=>$email));
	 if($usuario)
	 {
	    echo 1;
	 }
      }
   }
}