<?php

class BandejaController extends Controller
{
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
				'actions'=>array('index','prueba','pdf'),
				'users'=>array('*'),
			)
		);
	}
	
    public function actionIndex()
	{		
		$this->render('index');
	}
    
    public function actionInvocarUsandoAjax($prueba){
        echo "Tu me enviaste: {$prueba}";
    }
    public function actionInvocarUsandoAjaxPrueba2(){
        $resp = array();
        $resp[] = 'Jamboree';
        $resp[] = 'Lego';
        $resp[] = 'Cocco';
        $resp[] = 'Cairo';
        $resp[] = 'Kalita';
        $resp[] = 'Kim';
        $resp[] = 'Samoa';
        $resp[] = 'Choco';
        $resp[] = 'Chicola';
	
	
        header("Content-type: application/json");
        echo CJSON::encode($resp);
    }
    
    public function actionPrueba()
	{		
		 $this->renderPartial('prueba');
	}
	
    public function actionPdf($id)
    {
        $this->render('pdf',array(
            'model'=>$this->loadModel($id),
        ));
    }
    
    public function loadModel($id)
	{
		
		
                     $model=Inbox::model()->findByPk($id);                    
               
               
		
                
                //$model=Form::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	
		
	}
}