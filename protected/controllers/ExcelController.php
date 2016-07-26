<?php

class ExcelController extends Controller
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
				'actions'=>array('index','view','prueba','formato1','formato2','formato3','reportes','filtros'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new TempReporte;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TempReporte']))
		{
			$model->attributes=$_POST['TempReporte'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['TempReporte']))
		{
			$model->attributes=$_POST['TempReporte'];
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
		$dataProvider=new CActiveDataProvider('TempReporte');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TempReporte('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TempReporte']))
			$model->attributes=$_GET['TempReporte'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TempReporte the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TempReporte::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TempReporte $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='temp-reporte-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionFormato1($reportes){
		$this->proceso1();
		Yii::import('ext.phpexcel.XPHPExcel');    
      $objPHPExcel= XPHPExcel::createPHPExcel();
      $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                             ->setLastModifiedBy("Maarten Balliauw")
                             ->setTitle("Office 2007 XLSX Test Document")
                             ->setSubject("Office 2007 XLSX Test Document")
                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                             ->setKeywords("office 2007 openxml php")
                             ->setCategory("Test result file");
 
 
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
						->mergeCells('A1:A2')
						->mergeCells('B1:G1')
						->mergeCells('H1:J1')
						->mergeCells('K1:M1')
						->mergeCells('N1:P1')
						->mergeCells('Q1:S1')
						->mergeCells('T1:V1')
						->mergeCells('W1:Y1')
						->mergeCells('Z1:AB1')
						->mergeCells('AC1:AE1')
						->mergeCells('AF1:AG1')
						->mergeCells('AH1:AH2')
						//->setCellValue('A2','Expediente')
						->setCellValue('B2','Fecha Recepcion (2a)')
						->setCellValue('C2','Productor de Semillas (2b)')
						->setCellValue('D2','Agricultor Multiplicador (2c)')
						->setCellValue('E2','Cultivo (2d)')
						->setCellValue('F2','Cultivar (2e)')
						->setCellValue('G2','Categoria a Obtener (2f)')
						->setCellValue('H2','Procedencia (3a)')
						->setCellValue('I2','Numero de control de lote (3b)')
						->setCellValue('J2','Categoria a sembrar (3c)')
						->setCellValue('K2','Departamento (4a)')
						->setCellValue('L2','Provincia (4b)')
						->setCellValue('M2','Distrito (4c)')
						->setCellValue('N2','Area (ha) (5a)')
						->setCellValue('O2','Peso semilla usada (k/has) (5b)')
						->setCellValue('P2','Fecha (5c)')						
						->setCellValue('Q2','Fecha (6a)')
						->setCellValue('R2','Area aprobada (has) (6b)')
						->setCellValue('S2','Obs (6c) ')
						->setCellValue('T2','Fecha (7a)')
						->setCellValue('U2','Area aprobada (has) (7b)')
						->setCellValue('V2','Obs (7c)')
						->setCellValue('W2','Fecha (8a)')
						->setCellValue('X2','Area aprobada (has) (8b)')
						->setCellValue('Y2','Obs (8c)')
						->setCellValue('Z2','Fecha')
						->setCellValue('AA2','Area aprobada (has)')
						->setCellValue('AB2','Obs')
						->setCellValue('AC2','Fecha')
						->setCellValue('AD2','Area aprobada (has)')
						->setCellValue('AE2','Obs')
						->setCellValue('AF2','Produccion (kg)(9a)')
						->setCellValue('AG2','Fecha (9b)');
						
		 
		// Miscellaneous glyphs, UTF-8
		$objPHPExcel->getActiveSheet()
						->setCellValue('A1', 'Nº Exp.(1)')
						->setCellValue('B1','Datos de la Solicitud (2)')
						->setCellValue('H1','Datos de la semilla a sembrar (3)')
						->setCellValue('K1','Ubicacion del campo (4)')
						->setCellValue('N1','Siembra (5)')
						->setCellValue('Q1','Primera Inspeccion (6)')
						->setCellValue('T1','Segunda Inspeccion (7)')
						->setCellValue('W1','Tercera Inspeccion (8)')
						->setCellValue('Z1','Cuarta Inspeccion')
						->setCellValue('AC1','Quinta Inspeccion')
						->setCellValue('AF1','Cosecha (9)')
						->setCellValue('AH1','Informacion adicional (10)');
		/*$reportes = Formato1::model()->findAll(array(
			'select'    => 'expediente,fecha_recepcion,productor_semillas,agricultor_multiplicador,cultivo,cultivar,
									categoria_obtener,departamento,provincia,distrito,area,peso_semilla_usada,fecha_siembra,
									insp_fecha_1,insp_fecha_siembra_1,insp_area_aprobada_1,insp_observacion_1,
									insp_fecha_2,insp_fecha_siembra_2,insp_area_aprobada_2,insp_observacion_2,
									insp_fecha_3,insp_fecha_siembra_3,insp_area_aprobada_3,insp_observacion_3,
									insp_fecha_4,insp_fecha_siembra_4,insp_area_aprobada_4,insp_observacion_4,
									insp_fecha_5,insp_fecha_siembra_5,insp_area_aprobada_5,insp_observacion_5,
									fecha_cosecha,produccion',
			'group' 	=> 'expediente,fecha_recepcion,productor_semillas,agricultor_multiplicador,cultivo,cultivar,
							categoria_obtener,departamento,provincia,distrito,area,peso_semilla_usada,fecha_siembra,
							insp_fecha_1,insp_fecha_siembra_1,insp_area_aprobada_1,insp_observacion_1,
							insp_fecha_2,insp_fecha_siembra_2,insp_area_aprobada_2,insp_observacion_2,
							insp_fecha_3,insp_fecha_siembra_3,insp_area_aprobada_3,insp_observacion_3,
							insp_fecha_4,insp_fecha_siembra_4,insp_area_aprobada_4,insp_observacion_4,
							insp_fecha_5,insp_fecha_siembra_5,insp_area_aprobada_5,insp_observacion_5,
							fecha_cosecha,produccion',
		
		));*/
		$num=3;
		foreach($reportes as $reporte):
		$nombresfarm="";
		$form=Iform::model()->find('form_number=:form_number',array(':form_number'=>$reporte->expediente));
		$farmers=Farmers::model()->findAll('form_id=:form_id',array(':form_id'=>$form->id));
		
		
		
		if($farmers!=NULL){
			foreach($farmers as $farmer):
			{
				$nombresfarm=$farmer->name."    ".$nombresfarm;
			}
			endforeach;			
		}
		
		
		
		if($reporte->fecha_recepcion!=NULL){
			$reporte->fecha_recepcion=date('d-m-Y',strtotime($reporte->fecha_recepcion));
		}else{
			$reporte->fecha_recepcion="";
		}
		
		if($reporte->fecha_siembra!=NULL){
			$reporte->fecha_siembra=date('d-m-Y',strtotime($reporte->fecha_siembra));
		}else{
			$reporte->fecha_siembra="";
		}
		
		if($reporte->insp_fecha_1!=NULL){
			$reporte->insp_fecha_1=date('d-m-Y',strtotime($reporte->insp_fecha_1));
		}else{
			$reporte->insp_fecha_1="";
		}
		
		if($reporte->insp_fecha_2!=NULL){
			$reporte->insp_fecha_2=date('d-m-Y',strtotime($reporte->insp_fecha_2));
		}else{
			$reporte->insp_fecha_2="";
		}
		
		if($reporte->insp_fecha_3!=NULL){
			$reporte->insp_fecha_3=date('d-m-Y',strtotime($reporte->insp_fecha_3));
		}else{
			$reporte->insp_fecha_3="";
		}
		
		if($reporte->insp_fecha_4!=NULL){
			$reporte->insp_fecha_4=date('d-m-Y',strtotime($reporte->insp_fecha_4));
		}else{
			$reporte->insp_fecha_4="";
		}
		
		if($reporte->insp_fecha_5!=NULL){
			$reporte->insp_fecha_5=date('d-m-Y',strtotime($reporte->insp_fecha_5));
		}else{
			$reporte->insp_fecha_5="";
		}
		
		$objPHPExcel->setActiveSheetIndex(0)
						
						->setCellValue("A$num", $reporte->expediente)						
						->setCellValue("B$num", $reporte->fecha_recepcion)
						->setCellValue("C$num", $reporte->productor_semillas)
						->setCellValue("D$num", $nombresfarm)
						->setCellValue("E$num", $reporte->cultivo)
						->setCellValue("F$num", $reporte->cultivar)
						->setCellValue("G$num", $reporte->categoria_obtener)
						->setCellValue("K$num", $reporte->departamento)
						->setCellValue("L$num", $reporte->provincia)
						->setCellValue("M$num", $reporte->distrito)
						->setCellValue("N$num", $reporte->area)
						->setCellValue("O$num", $reporte->peso_semilla_usada)
						->setCellValue("P$num", $reporte->fecha_siembra)
						->setCellValue("Q$num", $reporte->insp_fecha_1)
						->setCellValue("R$num", $reporte->insp_area_aprobada_1)
						->setCellValue("S$num", $reporte->insp_observacion_1)
						->setCellValue("T$num", $reporte->insp_fecha_2)
						->setCellValue("U$num", $reporte->insp_area_aprobada_2)
						->setCellValue("V$num", $reporte->insp_observacion_2)
						->setCellValue("W$num", $reporte->insp_fecha_3)
						->setCellValue("X$num", $reporte->insp_area_aprobada_3)
						->setCellValue("Y$num", $reporte->insp_observacion_3)
						->setCellValue("Z$num", $reporte->insp_fecha_4)
						->setCellValue("AA$num", $reporte->insp_area_aprobada_4)
						->setCellValue("AB$num", $reporte->insp_observacion_4)
						->setCellValue("AC$num", $reporte->insp_fecha_5)
						->setCellValue("AD$num", $reporte->insp_area_aprobada_5)
						->setCellValue("AE$num", $reporte->insp_observacion_5)
						->setCellValue("AF$num", $reporte->produccion)
						->setCellValue("AG$num", date('d-m-Y',strtotime($reporte->fecha_cosecha)));
		 $num=$num+1;
		 endforeach;
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Campana');
		 
		 
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		 
		 
		// Redirect output to a clientâ€™s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Campaña.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		 
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		Yii::app()->end();
	}
	
	public function proceso1(){
		$command=Yii::app()->db->createCommand("CALL formato_1()");
		$command->execute();
		$temps=Formato1::model()->findAll();
		foreach($temps as $temp):
			$expediente1=Formato1::model()->find('expediente=:expediente and insp_num_1=1',array(':expediente'=>$temp->expediente));
			$expediente2=Formato1::model()->find('expediente=:expediente and insp_num_2=2',array(':expediente'=>$temp->expediente));
			$expediente3=Formato1::model()->find('expediente=:expediente and insp_num_3=3',array(':expediente'=>$temp->expediente));
			$expediente4=Formato1::model()->find('expediente=:expediente and insp_num_4=4',array(':expediente'=>$temp->expediente));
			$expediente5=Formato1::model()->find('expediente=:expediente and insp_num_5=5',array(':expediente'=>$temp->expediente));
			
			if($expediente1!=null){
				
				$expediente1->insp_num_2=2;
				$expediente1->insp_num_3=3;
				$expediente1->insp_num_4=4;
				$expediente1->insp_num_5=5;
				
				if($expediente2!=null){					
				$expediente1->insp_fecha_2=$expediente2->insp_fecha_2;
				$expediente1->insp_fecha_siembra_2=$expediente2->insp_fecha_siembra_2;
				$expediente1->insp_area_aprobada_2=$expediente2->insp_area_aprobada_2;
				$expediente1->insp_observacion_2=$expediente2->insp_observacion_2;
				}
				if($expediente3!=null){
				$expediente1->insp_fecha_3=$expediente3->insp_fecha_3;
				$expediente1->insp_fecha_siembra_3=$expediente3->insp_fecha_siembra_3;
				$expediente1->insp_area_aprobada_3=$expediente3->insp_area_aprobada_3;
				$expediente1->insp_observacion_3=$expediente3->insp_observacion_3;
				}
				if($expediente4!=null){
				$expediente1->insp_fecha_4=$expediente4->insp_fecha_4;
				$expediente1->insp_fecha_siembra_4=$expediente4->insp_fecha_siembra_4;
				$expediente1->insp_area_aprobada_4=$expediente4->insp_area_aprobada_4;
				$expediente1->insp_observacion_4=$expediente4->insp_observacion_4;
				}
				if($expediente5!=null){
				$expediente1->insp_fecha_5=$expediente5->insp_fecha_5;
				$expediente1->insp_fecha_siembra_5=$expediente5->insp_fecha_siembra_5;
				$expediente1->insp_area_aprobada_5=$expediente5->insp_area_aprobada_5;
				$expediente1->insp_observacion_5=$expediente5->insp_observacion_5;		
				}
				$expediente1->save();
				
			}
			
			if($expediente2!=null){
				$expediente2->insp_num_1=1;
				$expediente2->insp_num_3=3;
				$expediente2->insp_num_4=4;
				$expediente2->insp_num_5=5;
				
				if($expediente1!=null){
					
				$expediente2->insp_fecha_1=$expediente1->insp_fecha_1;
				$expediente2->insp_fecha_siembra_1=$expediente1->insp_fecha_siembra_1;
				$expediente2->insp_area_aprobada_1=$expediente1->insp_area_aprobada_1;
				$expediente2->insp_observacion_1=$expediente1->insp_observacion_1;
				}
				if($expediente3!=null){
				$expediente2->insp_fecha_3=$expediente3->insp_fecha_3;
				$expediente2->insp_fecha_siembra_3=$expediente3->insp_fecha_siembra_3;
				$expediente2->insp_area_aprobada_3=$expediente3->insp_area_aprobada_3;
				$expediente2->insp_observacion_3=$expediente3->insp_observacion_3;
				}
				if($expediente4!=null){
				$expediente2->insp_fecha_4=$expediente4->insp_fecha_4;
				$expediente2->insp_fecha_siembra_4=$expediente4->insp_fecha_siembra_4;
				$expediente2->insp_area_aprobada_4=$expediente4->insp_area_aprobada_4;
				$expediente2->insp_observacion_4=$expediente4->insp_observacion_4;
				}
				if($expediente5!=null){
				$expediente2->insp_fecha_5=$expediente5->insp_fecha_5;
				$expediente2->insp_fecha_siembra_5=$expediente5->insp_fecha_siembra_5;
				$expediente2->insp_area_aprobada_5=$expediente5->insp_area_aprobada_5;
				$expediente2->insp_observacion_5=$expediente5->insp_observacion_5;		
				}
				$expediente2->save();
			}
			if($expediente3!=null){
				$expediente3->insp_num_1=1;
				$expediente3->insp_num_2=2;
				$expediente3->insp_num_4=4;
				$expediente3->insp_num_5=5;
				
				if($expediente1!=null){					
				$expediente3->insp_fecha_1=$expediente1->insp_fecha_1;
				$expediente3->insp_fecha_siembra_1=$expediente1->insp_fecha_siembra_1;
				$expediente3->insp_area_aprobada_1=$expediente1->insp_area_aprobada_1;
				$expediente3->insp_observacion_1=$expediente1->insp_observacion_1;
				}
				if($expediente2!=null){
				$expediente3->insp_fecha_2=$expediente2->insp_fecha_2;
				$expediente3->insp_fecha_siembra_2=$expediente2->insp_fecha_siembra_2;
				$expediente3->insp_area_aprobada_2=$expediente2->insp_area_aprobada_2;
				$expediente3->insp_observacion_2=$expediente2->insp_observacion_2;
				}
				if($expediente4!=null){
				$expediente3->insp_fecha_4=$expediente4->insp_fecha_4;
				$expediente3->insp_fecha_siembra_4=$expediente4->insp_fecha_siembra_4;
				$expediente3->insp_area_aprobada_4=$expediente4->insp_area_aprobada_4;
				$expediente3->insp_observacion_4=$expediente4->insp_observacion_4;
				}
				if($expediente5!=null){
				$expediente3->insp_fecha_5=$expediente5->insp_fecha_5;
				$expediente3->insp_fecha_siembra_5=$expediente5->insp_fecha_siembra_5;
				$expediente3->insp_area_aprobada_5=$expediente5->insp_area_aprobada_5;
				$expediente3->insp_observacion_5=$expediente5->insp_observacion_5;		
				}
				$expediente3->save();
			}
			if($expediente4!=null){
				$expediente4->insp_num_1=1;
				$expediente4->insp_num_2=2;
				$expediente4->insp_num_3=3;
				$expediente4->insp_num_5=5;
				
				
				if($expediente1!=null){					
				$expediente4->insp_fecha_1=$expediente1->insp_fecha_1;
				$expediente4->insp_fecha_siembra_1=$expediente1->insp_fecha_siembra_1;
				$expediente4->insp_area_aprobada_1=$expediente1->insp_area_aprobada_1;
				$expediente4->insp_observacion_1=$expediente1->insp_observacion_1;
				}
				if($expediente2!=null){
				$expediente4->insp_fecha_2=$expediente2->insp_fecha_2;
				$expediente4->insp_fecha_siembra_2=$expediente2->insp_fecha_siembra_2;
				$expediente4->insp_area_aprobada_2=$expediente2->insp_area_aprobada_2;
				$expediente4->insp_observacion_2=$expediente2->insp_observacion_2;
				}
				if($expediente3!=null){
				$expediente4->insp_fecha_3=$expediente3->insp_fecha_3;
				$expediente4->insp_fecha_siembra_3=$expediente3->insp_fecha_siembra_3;
				$expediente4->insp_area_aprobada_3=$expediente3->insp_area_aprobada_3;
				$expediente4->insp_observacion_3=$expediente3->insp_observacion_3;
				}
				if($expediente5!=null){
				$expediente4->insp_fecha_5=$expediente5->insp_fecha_5;
				$expediente4->insp_fecha_siembra_5=$expediente5->insp_fecha_siembra_5;
				$expediente4->insp_area_aprobada_5=$expediente5->insp_area_aprobada_5;
				$expediente4->insp_observacion_5=$expediente5->insp_observacion_5;		
				}
				
				$expediente4->save();
			}
			if($expediente5!=null){
				$expediente5->insp_num_1=1;
				$expediente5->insp_num_2=2;
				$expediente5->insp_num_3=3;
				$expediente5->insp_num_4=4;
				
				if($expediente1!=null){					
				$expediente5->insp_fecha_1=$expediente1->insp_fecha_1;
				$expediente5->insp_fecha_siembra_1=$expediente1->insp_fecha_siembra_1;
				$expediente5->insp_area_aprobada_1=$expediente1->insp_area_aprobada_1;
				$expediente5->insp_observacion_1=$expediente1->insp_observacion_1;
				}
				if($expediente2!=null){
				$expediente5->insp_fecha_2=$expediente2->insp_fecha_2;
				$expediente5->insp_fecha_siembra_2=$expediente2->insp_fecha_siembra_2;
				$expediente5->insp_area_aprobada_2=$expediente2->insp_area_aprobada_2;
				$expediente5->insp_observacion_2=$expediente2->insp_observacion_2;
				}
				if($expediente3!=null){
				$expediente5->insp_fecha_3=$expediente3->insp_fecha_3;
				$expediente5->insp_fecha_siembra_3=$expediente3->insp_fecha_siembra_3;
				$expediente5->insp_area_aprobada_3=$expediente3->insp_area_aprobada_3;
				$expediente5->insp_observacion_3=$expediente3->insp_observacion_3;
				}
				if($expediente4!=null){
				$expediente5->insp_fecha_4=$expediente4->insp_fecha_4;
				$expediente5->insp_fecha_siembra_4=$expediente4->insp_fecha_siembra_4;
				$expediente5->insp_area_aprobada_4=$expediente4->insp_area_aprobada_4;
				$expediente5->insp_observacion_4=$expediente4->insp_observacion_4;		
				}
				$expediente5->save();
			}
			
		endforeach;
		
		
	}
	
	public function actionFormato2($reportes){
		
		Yii::import('ext.phpexcel.XPHPExcel');    
      $objPHPExcel= XPHPExcel::createPHPExcel();
      $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                             ->setLastModifiedBy("Maarten Balliauw")
                             ->setTitle("Office 2007 XLSX Test Document")
                             ->setSubject("Office 2007 XLSX Test Document")
                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                             ->setKeywords("office 2007 openxml php")
                             ->setCategory("Test result file");
 
 
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
						->mergeCells('A1:A2')
						->mergeCells('B1:E1')
						->mergeCells('F1:H1')
						->mergeCells('I1:N1')
						->mergeCells('O1:T1')
						->mergeCells('U1:U2')
						->mergeCells('V1:V2')
						->setCellValue('B2','Productor Semillas')
						->setCellValue('C2','Cultivo')
						->setCellValue('D2','Cultivar')
						->setCellValue('E2','Categoria')
						->setCellValue('F2','Fecha')
						->setCellValue('G2','Planta acondicionamiento')
						->setCellValue('H2','Observacion')
						->setCellValue('I2','N de Control')
						->setCellValue('J2','Peso de Lote')						
						->setCellValue('K2','N de Envase')
						->setCellValue('L2','Fecha toma muestra')
						->setCellValue('M2','Fecha reporte analisis ')
						->setCellValue('N2','Observacion ')
						->setCellValue('O2','Nº Acta de etiquetas ')
						->setCellValue('P2','Cantidad etiquetas ')
						->setCellValue('Q2','Numeracion DEL ')
						->setCellValue('R2','Numeracion AL')
						->setCellValue('S2','Fecha entrega etiquetas ')
						->setCellValue('T2','Nº Constancia de Origen (exoneracion etiquetado)')						
						;
		 
		// Miscellaneous glyphs, UTF-8
		$objPHPExcel->getActiveSheet()
						->setCellValue('A1', 'Nº Expediente')
						->setCellValue('B1', 'Datos del campo de multiplicacion')
						->setCellValue('F1', 'Inspeccion en acondicionamiento')
						->setCellValue('I1', 'Datos del Lote de Semillas')
						->setCellValue('O1', 'Datos del etiquetado')
						->setCellValue('U1', 'Categoria final')
						->setCellValue('V1', 'Observaciones');
		$command=Yii::app()->db->createCommand("CALL formato_2()");
		$command->execute();
		/*
		$reportes = Formato2::model()->findAll(array(
			'select'    => 'expediente,fecha_recepcion,productor_semillas,cultivo,cultivar,categoria,fecha,
								 planta_acondicionamiento,observacion_1,n_control,peso_lote,nro_envases,fecha_muestreo,
								 fecha_analisis,observacion_2,cantidad_etiquetas,serie_inicio,serie_fin,fecha_entrega'		
		));*/
		
		$num=3;
		foreach($reportes as $reporte):
		if($reporte->fecha!=NULL){
			$reporte->fecha=date('d-m-Y',strtotime($reporte->fecha));
		}else{
			$reporte->fecha="";
		}
		
		if($reporte->fecha_muestreo!=NULL){
			$reporte->fecha_muestreo=date('d-m-Y',strtotime($reporte->fecha_muestreo));
		}else{
			$reporte->fecha_muestreo="";
		}
		
		if($reporte->fecha_analisis!=NULL){
			$reporte->fecha_analisis=date('d-m-Y',strtotime($reporte->fecha_analisis));
		}else{
			$reporte->fecha_analisis="";
		}
		
		if($reporte->fecha_entrega!=NULL){
			$reporte->fecha_entrega=date('d-m-Y',strtotime($reporte->fecha_entrega));
		}else{
			$reporte->fecha_entrega="";
		}
		
		
		$objPHPExcel->setActiveSheetIndex(0)
						
						->setCellValue("A$num", $reporte->expediente)
						->setCellValue("B$num", $reporte->productor_semillas)
						->setCellValue("C$num", $reporte->cultivo)
						->setCellValue("D$num", $reporte->cultivar)
						->setCellValue("E$num", $reporte->categoria)
						->setCellValue("F$num", $reporte->fecha)
						->setCellValue("G$num", $reporte->planta_acondicionamiento)
						->setCellValue("H$num", $reporte->observacion_1)
						->setCellValue("I$num", $reporte->n_control)
						->setCellValue("J$num", $reporte->peso_lote)
						->setCellValue("K$num", $reporte->nro_envases)
						->setCellValue("L$num", $reporte->fecha_muestreo)
						->setCellValue("M$num", $reporte->fecha_analisis)
						->setCellValue("N$num", $reporte->observacion_2)
						->setCellValue("O$num", 'Acta')
						->setCellValue("P$num", $reporte->cantidad_etiquetas)
						->setCellValue("Q$num", $reporte->serie_inicio)
						->setCellValue("R$num", $reporte->serie_fin)
						->setCellValue("S$num", $reporte->fecha_entrega)
						->setCellValue("T$num", 'N Constancia')
						->setCellValue("U$num", $reporte->categoria)
						->setCellValue("V$num", 'Obvervaciones')
						;
		 $num=$num+1;
		 endforeach;
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Campana');
		 
		 
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		 
		 
		// Redirect output to a clientâ€™s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Campaña.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		 
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		Yii::app()->end();
	}
	public function actionReportes(){
		$model=new Reportes;
		
		//Region
		$departments = Location::model()->findAll(array(
				'select'   => 't.department',
				'group'    => 't.department',
				'order'	  => 't.department',
				'distinct' => true
			)); 
         
			$regarr = array();
			foreach ($departments as $department) {
				 $regarr[] = $department->department;
         }
         
      $region=CJSON::encode($regarr);
		//Fin region
		
		//CATEGORIA
		$categorias = Maestro::model()->findAll(array(
				'select'   => 't.descripcion',
				'condition'	  => 't.tipo="CATEGORIA"'
			)); 
         
			$catarr = array();
			foreach ($categorias as $categoria) {
				 $catarr[] = $categoria->descripcion;
         }
         
      $categoria=CJSON::encode($catarr);
		//Fin CATEGORIA
		
		//ESPECIE
		$especies = Crop::model()->findAll(array(
				'select'   => 't.name',
				'condition'	  => 't.parent is null'
			)); 
         
			$esparr = array();
			foreach ($especies as $especie) {
				 $esparr[] = $especie->name;
         }
         
      $especie=CJSON::encode($esparr);
		//Fin ESPECIE
		
		//CULTIVAR
		$cultivares = Crop::model()->findAll(array(
				'select'   => 't.name',
				'condition'	  => 't.parent is not null'
			)); 
         
			$cularr = array();
			foreach ($cultivares as $cultivar) {
				 $cularr[] = $cultivar->name;
         }
         
      $cultivar=CJSON::encode($cularr);
		//Fin CULTIVAR
		
		
		$this->render('reportes',array('model'=>$model,'region'=>$region,
												 'categoria'=>$categoria,'especie'=>$especie,
												 'cultivar'=>$cultivar));
	}
	public function actionFiltros()
	{
		//var_dump(date('Y-m-d',strtotime($_REQUEST['Reportes']['fecha'])));die;
		if($_REQUEST['id']=="0"){
			$reportes = Formato1::model()->findAll(array(
			'select'    => 'expediente,fecha_recepcion,productor_semillas,agricultor_multiplicador,cultivo,cultivar,
									categoria_obtener,departamento,provincia,distrito,area,peso_semilla_usada,fecha_siembra,
									insp_fecha_1,insp_fecha_siembra_1,insp_area_aprobada_1,insp_observacion_1,
									insp_fecha_2,insp_fecha_siembra_2,insp_area_aprobada_2,insp_observacion_2,
									insp_fecha_3,insp_fecha_siembra_3,insp_area_aprobada_3,insp_observacion_3,
									insp_fecha_4,insp_fecha_siembra_4,insp_area_aprobada_4,insp_observacion_4,
									insp_fecha_5,insp_fecha_siembra_5,insp_area_aprobada_5,insp_observacion_5,
									fecha_cosecha,produccion',
			'group' 	=> 'expediente,fecha_recepcion,productor_semillas,agricultor_multiplicador,cultivo,cultivar,
							categoria_obtener,departamento,provincia,distrito,area,peso_semilla_usada,fecha_siembra,
							insp_fecha_1,insp_fecha_siembra_1,insp_area_aprobada_1,insp_observacion_1,
							insp_fecha_2,insp_fecha_siembra_2,insp_area_aprobada_2,insp_observacion_2,
							insp_fecha_3,insp_fecha_siembra_3,insp_area_aprobada_3,insp_observacion_3,
							insp_fecha_4,insp_fecha_siembra_4,insp_area_aprobada_4,insp_observacion_4,
							insp_fecha_5,insp_fecha_siembra_5,insp_area_aprobada_5,insp_observacion_5,
							fecha_cosecha,produccion',		
			));
			$this->actionFormato1($reportes);
			//$this->redirect('Formato2',array('reportes'=>$reportes));
		}
		elseif($_REQUEST['id']=="1"){
			$reportes = Formato2::model()->findAll(array(
			'select'    => 'expediente,fecha_recepcion,productor_semillas,cultivo,cultivar,categoria,fecha,
								 planta_acondicionamiento,observacion_1,n_control,peso_lote,nro_envases,fecha_muestreo,
								 fecha_analisis,observacion_2,cantidad_etiquetas,serie_inicio,serie_fin,fecha_entrega',
			//'condition' => '',
			));
			$this->actionFormato2($reportes);
		}
		elseif($_REQUEST['id']=="2"){
			$reportes = Formato1::model()->findAll(array(
			'select'    => 'expediente,fecha_recepcion,productor_semillas,agricultor_multiplicador,cultivo,cultivar,
									categoria_obtener,departamento,provincia,distrito,area,peso_semilla_usada,fecha_siembra,
									insp_fecha_1,insp_fecha_siembra_1,insp_area_aprobada_1,insp_observacion_1,
									insp_fecha_2,insp_fecha_siembra_2,insp_area_aprobada_2,insp_observacion_2,
									insp_fecha_3,insp_fecha_siembra_3,insp_area_aprobada_3,insp_observacion_3,
									insp_fecha_4,insp_fecha_siembra_4,insp_area_aprobada_4,insp_observacion_4,
									insp_fecha_5,insp_fecha_siembra_5,insp_area_aprobada_5,insp_observacion_5,
									fecha_cosecha,produccion',
			'group' 	=> 'expediente,fecha_recepcion,productor_semillas,agricultor_multiplicador,cultivo,cultivar,
							categoria_obtener,departamento,provincia,distrito,area,peso_semilla_usada,fecha_siembra,
							insp_fecha_1,insp_fecha_siembra_1,insp_area_aprobada_1,insp_observacion_1,
							insp_fecha_2,insp_fecha_siembra_2,insp_area_aprobada_2,insp_observacion_2,
							insp_fecha_3,insp_fecha_siembra_3,insp_area_aprobada_3,insp_observacion_3,
							insp_fecha_4,insp_fecha_siembra_4,insp_area_aprobada_4,insp_observacion_4,
							insp_fecha_5,insp_fecha_siembra_5,insp_area_aprobada_5,insp_observacion_5,
							fecha_cosecha,produccion',
			'condition' => 'departamento="'.$_REQUEST['region'].'"',
			));
			$this->actionFormato1($reportes);
			
		}
		elseif($_REQUEST['id']=="3"){
			$reportes = Formato2::model()->findAll(array(
			'select'    => 'expediente,fecha_recepcion,productor_semillas,cultivo,cultivar,categoria,fecha,
								 planta_acondicionamiento,observacion_1,n_control,peso_lote,nro_envases,fecha_muestreo,
								 fecha_analisis,observacion_2,cantidad_etiquetas,serie_inicio,serie_fin,fecha_entrega',
			'condition' => 'fecha_entrega="'.date('Y-m-d',strtotime($_REQUEST['Reportes']['fecha'])).'"',
			));
			$this->actionFormato2($reportes);
		}
		elseif($_REQUEST['id']=="4"){
			$reportes = Formato2::model()->findAll(array(
			'select'    => 'expediente,fecha_recepcion,productor_semillas,cultivo,cultivar,categoria,fecha,
								 planta_acondicionamiento,observacion_1,n_control,peso_lote,nro_envases,fecha_muestreo,
								 fecha_analisis,observacion_2,cantidad_etiquetas,serie_inicio,serie_fin,fecha_entrega',
			'condition' => 'categoria="'.$_REQUEST['categoria'].'"',
			));
			$this->actionFormato2($reportes);
			
		}
		elseif($_REQUEST['id']=="5"){
			$reportes = Formato2::model()->findAll(array(
			'select'    => 'expediente,fecha_recepcion,productor_semillas,cultivo,cultivar,categoria,fecha,
								 planta_acondicionamiento,observacion_1,n_control,peso_lote,nro_envases,fecha_muestreo,
								 fecha_analisis,observacion_2,cantidad_etiquetas,serie_inicio,serie_fin,fecha_entrega',
			'condition' => 'cultivo="'.$_REQUEST['especie'].'"',
			));
			$this->actionFormato2($reportes);
		}
		elseif($_REQUEST['id']=="6"){
			$reportes = Formato2::model()->findAll(array(
			'select'    => 'expediente,fecha_recepcion,productor_semillas,cultivo,cultivar,categoria,fecha,
								 planta_acondicionamiento,observacion_1,n_control,peso_lote,nro_envases,fecha_muestreo,
								 fecha_analisis,observacion_2,cantidad_etiquetas,serie_inicio,serie_fin,fecha_entrega',
			'condition' => 'cultivar="'.$_REQUEST['cultivar'].'"',
			));
			$this->actionFormato2($reportes);
		}
	}
}
