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
			  'select'   => 't.id, t.department, t.departament_id',
			  'group'    => 't.id,t.department',
			  'order'    => 't.department ASC',
			  'distinct' => true
		     ));
      $departamentos = Location::model()->findAll(array(
			  'select'   => 't.department, t._departament_id',
			  'group'    => 't.department',
			  'order'    => 't.department ASC',
			  'distinct' => true
		     ));
      $departments = CHtml::listData($locationsdeps,'departament_id','department');      
      
      if(isset($_POST['Solicitud']))
      {
         //New objeto User
         $user=new User;
         
         $model->attributes=$_POST['Solicitud'];			
         if($model->validate())
         {
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
            $user->district_id=$model->int_district;   
            $user->address=$model->var_direccion;
            $user->reference=$model->var_referencia;
            $user->producer_id=$producer->id;
            $user->status=1;
	    $user->type_id=1;
	    $user->fecha_registro=date("Y-m-d H:i:s");
            if($user->save())
            {
               Yii::app()->user->setFlash('msg','Su registro ha sido enviado,gracias.');
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
	 $ruc=$_POST['ruc'];
	 $usuario=User::model()->find('ruc=:ruc', array(':ruc'=>$ruc));
	 if($usuario)
	 {
	    echo 1;
	 }
      }
   }
   
   public function actionNroregistro()
   {
      if(isset($_POST['registro']) && $_POST['registro']!='')
      {
	 $registro=$_POST['registro'];
	 $usuario=User::model()->find('registry=:ruc', array(':registry'=>$registro));
	 if($usuario)
	 {
	    echo 1;
	 }
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