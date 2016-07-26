<?php
class SolicitudController extends Controller
{
   public function actionIndex()
   {
      //$this->layout='solicitud';
      $this->pageTitle = "Inscribir Productor";
      $model=new Solicitud;
      
      $locationsdeps = Location::model()->findAll(array(
			  'select'   => 't.id, t.department, t.departament_id',
			  'group'    => 't.id,t.department',
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
            if($user->save())
            {
               Yii::app()->user->setFlash('msg','Su registro ha sido enviado,gracias.');
               $this->refresh();
            }         
         }
      }  
      $this->render('index',array('model'=>$model,'departments'=>$departments));
   }
}