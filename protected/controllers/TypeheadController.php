<?php

class TypeheadController extends Controller
{
   
   public function actionRun()
	{
			
			
         $departments = Location::model()->findAll(array(
				'select'   => 't.department',
				'group'    => 't.department',
				'order'	  => 't.department',
				'distinct' => true
			)); 
         
			$arr = array();
			foreach ($departments as $department) {
				 $arr[] = $department->department;
         }
			echo CJSON::encode($arr);
   }
}