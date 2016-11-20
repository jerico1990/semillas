<?php

class InspectionController extends Controller
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
				'actions'=>array('index','view','inspection','cumple','condicional','rechazado'),
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
		$model=new Inspection;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inspection']))
		{
			$model->attributes=$_POST['Inspection'];
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

		if(isset($_POST['Inspection']))
		{
			$model->attributes=$_POST['Inspection'];
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
		$dataProvider=new CActiveDataProvider('Inspection');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Inspection('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Inspection']))
			$model->attributes=$_GET['Inspection'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Inspection the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Inspection::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Inspection $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inspection-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionInspection($id)
	{
		$model=new Inspection;
		$this->render('inspection',array('model'=>$model));
	}
	public function actionCumple()
	{
		
		$inspection=Inspection::model()->find('id=:id',array(':id'=>$_REQUEST['id']));
		$form=Iform::model()->findByPk($inspection->form_id);
		$ainspection=Inspection::model()->find('id=:id',array(':id'=>$_REQUEST['id']));
		
		$fecha=date("Y-m-d", strtotime($_REQUEST['fecha']));
		$usuario=$form->user_id;
		$formulario=$form->id;
		$aform=$ainspection->form_id;
		$aid=$ainspection->id;
		
		if($form->crop_id==1)//Arroz
		{
			$inspection->size=0;
			$inspection->arz_siembra_directa=$_REQUEST['arz_siembra_directa'];
			$inspection->arz_transplante=$_REQUEST['arz_transplante'];
			$inspection->arz_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['arz_fecha_siembra']));
			$inspection->arz_fecha_almacigo=date("Y-m-d", strtotime($_REQUEST['arz_fecha_almacigo']));
			$inspection->arz_fecha_transplante=date("Y-m-d", strtotime($_REQUEST['arz_fecha_transplante']));
			$inspection->arz_area_instalada=str_replace(',','',$_REQUEST['arz_area_instalada']);
			$inspection->arz_aislamiento=str_replace(',','',$_REQUEST['arz_aislamiento']);
			$inspection->arz_fuera_tipo=$_REQUEST['arz_fuera_tipo'];
			$inspection->arz_rojo=$_REQUEST['arz_rojo'];
			$inspection->arz_plantas_sintomas=$_REQUEST['arz_plantas_sintomas'];
			$inspection->observaciones=$_REQUEST['observaciones'];			
			$inspection->save();
			
			if($_REQUEST['btn']==2)//Crea N Inspeccion opcion "No"
			{
				$max=$inspection->inspection_number+1;				
				$this->Inspeccion($max,$fecha,$usuario,$formulario,$form->headquarter_id);
			}
			elseif($_REQUEST['btn']==1)//Crea Acondicionamiento opcion "Si"
			{				
				$this->Acondicionamiento($fecha,$aform,$aid,$usuario);			
			}
				$this->redirect(array('iform/iview','id'=>$form->id));
		}//Fin Arroz
		if($form->crop_id==2)//Algodón
		{
			$inspection->size=str_replace(',','',$_REQUEST['size']);
			$inspection->alg_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['alg_fecha_siembra']));
			$inspection->alg_deshije=date("Y-m-d", strtotime($_REQUEST['alg_deshije']));
			$inspection->alg_floracion=str_replace(',','',$_REQUEST['alg_floracion']);;
			$inspection->alg_bellotas=str_replace(',','',$_REQUEST['alg_bellotas']);;
			$inspection->alg_surcos=str_replace(',','',$_REQUEST['alg_surcos']);
			$inspection->alg_mata=str_replace(',','',$_REQUEST['alg_mata']);
			$inspection->alg_campo_comercial=str_replace(',','',$_REQUEST['alg_campo_comercial']);
			$inspection->alg_otra_especie=str_replace(',','',$_REQUEST['alg_otra_especie']);
			$inspection->alg_otra_cultivar=str_replace(',','',$_REQUEST['alg_otra_cultivar']);
			$inspection->alg_plantas_otra_especie=$_REQUEST['alg_plantas_otra_especie'];
			$inspection->alg_plantas_fuera_tipo=$_REQUEST['alg_plantas_fuera_tipo'];
			$inspection->alg_malvacearum=$_REQUEST['alg_malvacearum'];
			$inspection->observaciones=$_REQUEST['observaciones'];
			$inspection->save();				
			if($_REQUEST['btn']==2)//Crea N Inspeccion
			{
				$max=$inspection->inspection_number+1;				
				$this->Inspeccion($max,$fecha,$usuario,$formulario,$form->headquarter_id);			
			}
			elseif($_REQUEST['btn']==1)//Crea Acondicionamiento
			{				
				$this->Acondicionamiento($fecha,$aform,$aid,$usuario);			
			}				
		}//Fin Algodón	
		
		if($form->crop_id==3 || $form->crop_id==4 || $form->crop_id==5 )//Trigo,cebada,avena cereales
		{
			
			$inspection->size=str_replace(',','',$_REQUEST['size']);
			$inspection->cer_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['cer_fecha_siembra']));
			$inspection->cer_floracion=str_replace(',','',$_REQUEST['cer_floracion']);
			$inspection->cer_maduracion=str_replace(',','',$_REQUEST['cer_maduracion']);
			$inspection->cer_cantidad_semilla=str_replace(',','',$_REQUEST['cer_cantidad_semilla']);
			$inspection->cer_inflorecencias_otros_cultivares=$_REQUEST['cer_inflorecencias_otros_cultivares'];
			$inspection->cer_inflorecencias_otros_cultivares_menores=$_REQUEST['cer_inflorecencias_otros_cultivares_menores'];
			$inspection->cer_carbon_apestoso=$_REQUEST['cer_carbon_apestoso'];
			$inspection->cer_carbon_cubierto=$_REQUEST['cer_carbon_cubierto'];
			$inspection->cer_carbon_volador=$_REQUEST['cer_carbon_volador'];
			$inspection->cer_cornezuelo=$_REQUEST['cer_cornezuelo'];
			$inspection->cer_mancha_foliar=$_REQUEST['cer_mancha_foliar'];
			$inspection->cer_escaldadura=$_REQUEST['cer_escaldadura'];
			$inspection->cer_presencia_maleza_nocivas=$_REQUEST['cer_presencia_maleza_nocivas'];
			$inspection->cer_aspecto_general_poblacion=$_REQUEST['cer_aspecto_general_poblacion'];
			$inspection->cer_plagas=$_REQUEST['cer_plagas'];
			$inspection->cer_aislamiento=str_replace(',','',$_REQUEST['cer_aislamiento']);
			$inspection->cer_otra_cultivar=str_replace(',','',$_REQUEST['cer_otra_cultivar']);
			$inspection->cer_otra_categoria=str_replace(',','',$_REQUEST['cer_otra_categoria']);
			$inspection->cer_plantas_fuera_tipo=str_replace(',','',$_REQUEST['cer_plantas_fuera_tipo']);
			$inspection->cer_otras_especies=str_replace(',','',$_REQUEST['cer_otras_especies']);
			
			$inspection->observaciones=$_REQUEST['observaciones'];
			$inspection->save();
			
			if($_REQUEST['btn']==2)//Crea N Inspeccion
			{
				$max=$inspection->inspection_number+1;				
				$this->Inspeccion($max,$fecha,$usuario,$formulario,$form->headquarter_id);			
			}
			elseif($_REQUEST['btn']==1)//Crea Acondicionamiento
			{				
				$this->Acondicionamiento($fecha,$aform,$aid,$usuario);			
			}	
			
		}//Fin //Trigo,cebada,avena cereales
		
		
		if($form->crop_id==6 || $form->crop_id==7 || $form->crop_id==8 || $form->crop_id==9 || $form->crop_id==10 ||$form->crop_id==11 ||$form->crop_id==12)//Frijol,haba,pallar,lenteja,caupi,soya, leguminosas
		{
			
			$inspection->size=str_replace(',','',$_REQUEST['size']);
			$inspection->leg_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['leg_fecha_siembra']));
			$inspection->leg_emergencia_fecha=date("Y-m-d", strtotime($_REQUEST['leg_emergencia_fecha']));
			$inspection->leg_floracion=str_replace(',','',$_REQUEST['leg_floracion']);
			$inspection->leg_floracion_fecha=date("Y-m-d", strtotime($_REQUEST['leg_floracion_fecha']));
			$inspection->leg_llenado_grano=str_replace(',','',$_REQUEST['leg_llenado_grano']);
			$inspection->leg_fecha_cosecha=date("Y-m-d", strtotime($_REQUEST['leg_fecha_cosecha']));
			$inspection->leg_distanciamiento_surcos=str_replace(',','',$_REQUEST['leg_distanciamiento_surcos']);
			$inspection->leg_mata=str_replace(',','',$_REQUEST['leg_mata']);
			$inspection->leg_campo_comercial=str_replace(',','',$_REQUEST['leg_campo_comercial']);
			$inspection->leg_otra_especie=str_replace(',','',$_REQUEST['leg_otra_especie']);
			$inspection->leg_otro_cultivar=str_replace(',','',$_REQUEST['leg_otro_cultivar']);
			$inspection->leg_presencia_maleza=$_REQUEST['leg_presencia_maleza'];
			$inspection->leg_presencia_plagas=$_REQUEST['leg_presencia_plagas'];
			$inspection->leg_plantas_otras_especies=$_REQUEST['leg_plantas_otras_especies'];
			$inspection->leg_plantas_fuera_tipo=$_REQUEST['leg_plantas_fuera_tipo'];
			$inspection->leg_mosaicos=str_replace(',','',$_REQUEST['leg_mosaicos']);
			$inspection->leg_moteado=str_replace(',','',$_REQUEST['leg_moteado']);
			$inspection->leg_bacteriosis=str_replace(',','',$_REQUEST['leg_bacteriosis']);
			$inspection->leg_mancha_angular=str_replace(',','',$_REQUEST['leg_mancha_angular']);
			$inspection->observaciones=$_REQUEST['observaciones'];
			$inspection->save();				
			if($_REQUEST['btn']==2)//Crea N Inspeccion
			{
				$max=$inspection->inspection_number+1;				
				$this->Inspeccion($max,$fecha,$usuario,$formulario,$form->headquarter_id);			
			}
			elseif($_REQUEST['btn']==1)//Crea Acondicionamiento
			{				
				$this->Acondicionamiento($fecha,$aform,$aid,$usuario);			
			}		
			
		}//Fin //Frijol,haba,pallar,lenteja,caupi,soya, leguminosas
		
		if($form->crop_id==13)//Maiz
		{
			
			$inspection->size=str_replace(',','',$_REQUEST['size']);
			$inspection->maiz_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['maiz_fecha_siembra']));
			$inspection->maiz_emergencia_fecha=date("Y-m-d", strtotime($_REQUEST['maiz_emergencia_fecha']));
			$inspection->maiz_floracion=str_replace(',','',$_REQUEST['maiz_floracion']);
			$inspection->maiz_floracion_fecha=date("Y-m-d", strtotime($_REQUEST['maiz_floracion_fecha']));
			$inspection->maiz_llenado_grano=str_replace(',','',$_REQUEST['maiz_llenado_grano']);
			$inspection->maiz_fecha_cosecha=date("Y-m-d", strtotime($_REQUEST['maiz_fecha_cosecha']));
			$inspection->maiz_distanciamiento_surcos=str_replace(',','',$_REQUEST['maiz_distanciamiento_surcos']);
			$inspection->maiz_mata=str_replace(',','',$_REQUEST['maiz_mata']);
			$inspection->maiz_campo_comercial=str_replace(',','',$_REQUEST['maiz_campo_comercial']);
			$inspection->maiz_otra_especie=str_replace(',','',$_REQUEST['maiz_otra_especie']);
			$inspection->maiz_otro_cultivar=str_replace(',','',$_REQUEST['maiz_otro_cultivar']);
			$inspection->maiz_presencia_maleza=$_REQUEST['maiz_presencia_maleza'];
			$inspection->maiz_presencia_plagas=$_REQUEST['maiz_presencia_plagas'];
			$inspection->maiz_plantas_otras_especies=$_REQUEST['maiz_plantas_otras_especies'];
			$inspection->maiz_plantas_fuera_tipo=$_REQUEST['maiz_plantas_fuera_tipo'];
			$inspection->maiz_tolerancias=$_REQUEST['maiz_tolerancias'];
			$inspection->observaciones=$_REQUEST['observaciones'];
			$inspection->save();
			
			if($_REQUEST['btn']==2)//Crea N Inspeccion
			{
				$max=$inspection->inspection_number+1;				
				$this->Inspeccion($max,$fecha,$usuario,$formulario,$form->headquarter_id);			
			}
			elseif($_REQUEST['btn']==1)//Crea Acondicionamiento
			{				
				$this->Acondicionamiento($fecha,$aform,$aid,$usuario);			
			}				
		}//Fin Maiz
		
		if($form->crop_id==15 )//Papa
		{
			
			$inspection->size=str_replace(',','',$_REQUEST['size']);
			$inspection->papa_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['papa_fecha_siembra']));
			$inspection->papa_campo_comercial=str_replace(',','',$_REQUEST['papa_campo_comercial']);
			$inspection->papa_otra_especie=str_replace(',','',$_REQUEST['papa_otra_especie']);
			$inspection->papa_otro_cultivar=str_replace(',','',$_REQUEST['papa_otro_cultivar']);
			$inspection->afectadas_enrollamiento=str_replace(',','',$_REQUEST['afectadas_enrollamiento']);
			$inspection->afectadas_mozaico=str_replace(',','',$_REQUEST['afectadas_mozaico']);
			$inspection->afectadas_otros_virus=str_replace(',','',$_REQUEST['afectadas_otros_virus']);
			$inspection->afectadas_erwinia=str_replace(',','',$_REQUEST['afectadas_erwinia']);
			$inspection->afectadas_mezclas=str_replace(',','',$_REQUEST['afectadas_mezclas']);
			$inspection->observaciones=$_REQUEST['observaciones'];
			$inspection->save();				
			if($_REQUEST['btn']==2)//Crea N Inspeccion
			{
				$max=$inspection->inspection_number+1;				
				$this->Inspeccion($max,$fecha,$usuario,$formulario,$form->headquarter_id);			
			}
			elseif($_REQUEST['btn']==1)//Crea Acondicionamiento
			{				
				$this->Acondicionamiento($fecha,$aform,$aid,$usuario);			
			}					
		}//Fin Papa
	}
	
	public function actionCondicional()
	{
		
		$inspection=Inspection::model()->findByPk($_REQUEST['condicional_inspection_id']);
		$form=Iform::model()->findByPk($inspection->form_id);
		
		if($form->crop_id==1)//Arroz
		{
			$inspection->subsanacion_date=date("Y-m-d", strtotime($_REQUEST['Inspection']['subsanacion_date']));
			$inspection->arz_siembra_directa=$_REQUEST['Inspection']['arz_siembra_directa'];
			$inspection->arz_transplante=$_REQUEST['Inspection']['arz_transplante'];
			$inspection->arz_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['arz_fecha_siembra']));
			$inspection->arz_fecha_almacigo=date("Y-m-d", strtotime($_REQUEST['Inspection']['arz_fecha_almacigo']));
			$inspection->arz_fecha_transplante=date("Y-m-d", strtotime($_REQUEST['Inspection']['arz_fecha_transplante']));
			$inspection->arz_area_instalada=str_replace(',','',$_REQUEST['Inspection']['arz_area_instalada']);
			$inspection->arz_aislamiento=str_replace(',','',$_REQUEST['Inspection']['arz_aislamiento']);
			$inspection->arz_fuera_tipo=$_REQUEST['Inspection']['arz_fuera_tipo'];
			$inspection->arz_rojo=$_REQUEST['Inspection']['arz_rojo'];
			$inspection->arz_plantas_sintomas=$_REQUEST['Inspection']['arz_plantas_sintomas'];
			$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
			$inspection->subsanacion=1;
			$inspection->save();
		}//Fin Arroz
		
		if($form->crop_id==2)//Algodon
		{
			$inspection->subsanacion_date=date("Y-m-d", strtotime($_REQUEST['Inspection']['subsanacion_date']));
			$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
			$inspection->alg_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['alg_fecha_siembra']));
			$inspection->alg_deshije=date("Y-m-d", strtotime($_REQUEST['Inspection']['alg_deshije']));
			$inspection->alg_floracion=str_replace(',','',$_REQUEST['Inspection']['alg_floracion']);
			$inspection->alg_bellotas=str_replace(',','',$_REQUEST['Inspection']['alg_bellotas']);
			$inspection->alg_surcos=str_replace(',','',$_REQUEST['Inspection']['alg_surcos']);
			$inspection->alg_mata=str_replace(',','',$_REQUEST['Inspection']['alg_mata']);
			$inspection->alg_campo_comercial=str_replace(',','',$_REQUEST['Inspection']['alg_campo_comercial']);
			$inspection->alg_otra_especie=str_replace(',','',$_REQUEST['Inspection']['alg_otra_especie']);
			$inspection->alg_otra_cultivar=str_replace(',','',$_REQUEST['Inspection']['alg_otra_cultivar']);
			$inspection->alg_plantas_otra_especie=$_REQUEST['Inspection']['alg_plantas_otra_especie'];
			$inspection->alg_plantas_fuera_tipo=$_REQUEST['Inspection']['alg_plantas_fuera_tipo'];
			$inspection->alg_malvacearum=$_REQUEST['Inspection']['alg_malvacearum'];
			$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
			$inspection->subsanacion=1;
			$inspection->save();	
		}//Fin Algodon
		if($form->crop_id==3 || $form->crop_id==4 || $form->crop_id==5)//cereales
		{
			$inspection->subsanacion_date=date("Y-m-d", strtotime($_REQUEST['Inspection']['subsanacion_date']));
			$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
			$inspection->cer_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['cer_fecha_siembra']));
			$inspection->cer_floracion=str_replace(',','',$_REQUEST['Inspection']['cer_floracion']);
			$inspection->cer_maduracion=str_replace(',','',$_REQUEST['Inspection']['cer_maduracion']);
			$inspection->cer_cantidad_semilla=str_replace(',','',$_REQUEST['Inspection']['cer_cantidad_semilla']);
			$inspection->cer_inflorecencias_otros_cultivares=$_REQUEST['Inspection']['cer_inflorecencias_otros_cultivares'];
			$inspection->cer_inflorecencias_otros_cultivares_menores=$_REQUEST['Inspection']['cer_inflorecencias_otros_cultivares_menores'];
			$inspection->cer_carbon_apestoso=$_REQUEST['Inspection']['cer_carbon_apestoso'];
			$inspection->cer_carbon_cubierto=$_REQUEST['Inspection']['cer_carbon_cubierto'];
			$inspection->cer_carbon_volador=$_REQUEST['Inspection']['cer_carbon_volador'];
			$inspection->cer_cornezuelo=$_REQUEST['Inspection']['cer_cornezuelo'];
			$inspection->cer_mancha_foliar=$_REQUEST['Inspection']['cer_mancha_foliar'];
			$inspection->cer_escaldadura=$_REQUEST['Inspection']['cer_escaldadura'];
			$inspection->cer_presencia_maleza_nocivas=$_REQUEST['Inspection']['cer_presencia_maleza_nocivas'];
			$inspection->cer_aspecto_general_poblacion=$_REQUEST['Inspection']['cer_aspecto_general_poblacion'];
			$inspection->cer_plagas=$_REQUEST['Inspection']['cer_plagas'];
			$inspection->cer_aislamiento=str_replace(',','',$_REQUEST['Inspection']['cer_aislamiento']);
			$inspection->cer_otra_cultivar=str_replace(',','',$_REQUEST['Inspection']['cer_otra_cultivar']);
			$inspection->cer_otra_categoria=str_replace(',','',$_REQUEST['Inspection']['cer_otra_categoria']);
			$inspection->cer_plantas_fuera_tipo=str_replace(',','',$_REQUEST['cer_plantas_fuera_tipo']);
			$inspection->cer_otras_especies=str_replace(',','',$_REQUEST['cer_otras_especies']);
			$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
			$inspection->subsanacion=1;
			$inspection->save();	
		}//Fin cereales
		
		if($form->crop_id==6 || $form->crop_id==7 || $form->crop_id==8 || $form->crop_id==9 || $form->crop_id==10 ||$form->crop_id==11 ||$form->crop_id==12)//Frijol,haba,pallar,lenteja,caupi,soya, leguminosas
		{
			$inspection->subsanacion_date=date("Y-m-d", strtotime($_REQUEST['Inspection']['subsanacion_date']));
			$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
			$inspection->leg_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['leg_fecha_siembra']));
			$inspection->leg_emergencia_fecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['leg_emergencia_fecha']));
			$inspection->leg_floracion=str_replace(',','',$_REQUEST['Inspection']['leg_floracion']);
			$inspection->leg_floracion_fecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['leg_floracion_fecha']));
			$inspection->leg_llenado_grano=str_replace(',','',$_REQUEST['Inspection']['leg_llenado_grano']);
			$inspection->leg_fecha_cosecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['leg_fecha_cosecha']));
			$inspection->leg_distanciamiento_surcos=str_replace(',','',$_REQUEST['Inspection']['leg_distanciamiento_surcos']);
			$inspection->leg_mata=str_replace(',','',$_REQUEST['Inspection']['leg_mata']);
			$inspection->leg_campo_comercial=str_replace(',','',$_REQUEST['Inspection']['leg_campo_comercial']);
			$inspection->leg_otra_especie=str_replace(',','',$_REQUEST['Inspection']['leg_otra_especie']);
			$inspection->leg_otro_cultivar=str_replace(',','',$_REQUEST['Inspection']['leg_otro_cultivar']);
			$inspection->leg_presencia_maleza=$_REQUEST['Inspection']['leg_presencia_maleza'];
			$inspection->leg_presencia_plagas=$_REQUEST['Inspection']['leg_presencia_plagas'];
			$inspection->leg_plantas_otras_especies=$_REQUEST['Inspection']['leg_plantas_otras_especies'];
			$inspection->leg_plantas_fuera_tipo=$_REQUEST['Inspection']['leg_plantas_fuera_tipo'];			
			$inspection->leg_mosaicos=str_replace(',','',$_REQUEST['Inspection']['leg_mosaicos']);
			$inspection->leg_moteado=str_replace(',','',$_REQUEST['Inspection']['leg_moteado']);
			$inspection->leg_bacteriosis=str_replace(',','',$_REQUEST['Inspection']['leg_bacteriosis']);
			$inspection->leg_mancha_angular=str_replace(',','',$_REQUEST['Inspection']['leg_mancha_angular']);
			$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
			$inspection->subsanacion=1;
			$inspection->save();
		}//Fin Leguminosas
		
		if($form->crop_id==13)//Maiz
		{
			$inspection->subsanacion_date=date("Y-m-d", strtotime($_REQUEST['Inspection']['subsanacion_date']));
			$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
			$inspection->maiz_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['maiz_fecha_siembra']));
			$inspection->maiz_emergencia_fecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['maiz_emergencia_fecha']));
			$inspection->maiz_floracion=str_replace(',','',$_REQUEST['Inspection']['maiz_floracion']);
			$inspection->maiz_floracion_fecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['maiz_floracion_fecha']));
			$inspection->maiz_llenado_grano=str_replace(',','',$_REQUEST['Inspection']['maiz_llenado_grano']);
			$inspection->maiz_fecha_cosecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['maiz_fecha_cosecha']));
			$inspection->maiz_distanciamiento_surcos=str_replace(',','',$_REQUEST['Inspection']['maiz_distanciamiento_surcos']);
			$inspection->maiz_mata=str_replace(',','',$_REQUEST['Inspection']['maiz_mata']);
			$inspection->maiz_campo_comercial=str_replace(',','',$_REQUEST['Inspection']['maiz_campo_comercial']);
			$inspection->maiz_otra_especie=str_replace(',','',$_REQUEST['Inspection']['maiz_otra_especie']);
			$inspection->maiz_otro_cultivar=str_replace(',','',$_REQUEST['Inspection']['maiz_otro_cultivar']);
			$inspection->maiz_presencia_maleza=$_REQUEST['Inspection']['maiz_presencia_maleza'];
			$inspection->maiz_presencia_plagas=$_REQUEST['Inspection']['maiz_presencia_plagas'];
			$inspection->maiz_plantas_otras_especies=$_REQUEST['Inspection']['maiz_plantas_otras_especies'];
			$inspection->maiz_plantas_fuera_tipo=$_REQUEST['Inspection']['maiz_plantas_fuera_tipo'];
			$inspection->maiz_tolerancias=$_REQUEST['Inspection']['maiz_tolerancias'];
			$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
			$inspection->subsanacion=1;
			$inspection->save();
		}//Fin Maiz
		if($form->crop_id==15 )//Papa
		{
			$inspection->subsanacion_date=date("Y-m-d", strtotime($_REQUEST['Inspection']['subsanacion_date']));
			$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
			$inspection->papa_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['papa_fecha_siembra']));
			$inspection->papa_campo_comercial=str_replace(',','',$_REQUEST['Inspection']['papa_campo_comercial']);
			$inspection->papa_otra_especie=str_replace(',','',$_REQUEST['Inspection']['papa_otra_especie']);
			$inspection->papa_otro_cultivar=str_replace(',','',$_REQUEST['Inspection']['papa_otro_cultivar']);
			$inspection->afectadas_enrollamiento=str_replace(',','',$_REQUEST['Inspection']['afectadas_enrollamiento']);
			$inspection->afectadas_mozaico=str_replace(',','',$_REQUEST['Inspection']['afectadas_mozaico']);
			$inspection->afectadas_otros_virus=str_replace(',','',$_REQUEST['Inspection']['afectadas_otros_virus']);
			$inspection->afectadas_erwinia=str_replace(',','',$_REQUEST['Inspection']['afectadas_erwinia']);
			$inspection->afectadas_mezclas=str_replace(',','',$_REQUEST['Inspection']['afectadas_mezclas']);
			$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
			$inspection->subsanacion=1;
			$inspection->save();
		}//Fin Papa
		
	}
	
	public function actionRechazado()
	{
	    $inspection=Inspection::model()->find('id=:id',array(':id'=>$_REQUEST['condicional_inspection_id']));
	    $form=Iform::model()->find('id=:id',array(':id'=>$_REQUEST['formu']));
	    
	    if($form->crop_id==1)//Arroz
	    {
		$inspection->arz_siembra_directa=$_REQUEST['Inspection']['arz_siembra_directa'];
		$inspection->arz_transplante=$_REQUEST['Inspection']['arz_transplante'];
		$inspection->arz_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['arz_fecha_siembra']));
		$inspection->arz_fecha_almacigo=date("Y-m-d", strtotime($_REQUEST['Inspection']['arz_fecha_almacigo']));
		$inspection->arz_fecha_transplante=date("Y-m-d", strtotime($_REQUEST['Inspection']['arz_fecha_transplante']));
		$inspection->arz_area_instalada=str_replace(',','',$_REQUEST['Inspection']['arz_area_instalada']);
		$inspection->arz_aislamiento=str_replace(',','',$_REQUEST['Inspection']['arz_aislamiento']);
		$inspection->arz_fuera_tipo=$_REQUEST['Inspection']['arz_fuera_tipo'];
		$inspection->arz_rojo=$_REQUEST['Inspection']['arz_rojo'];
		$inspection->arz_plantas_sintomas=$_REQUEST['Inspection']['arz_plantas_sintomas'];
		$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
		$inspection->rechazado=1;
		$inspection->save();
	    }
	    if($form->crop_id==2)//Algodon
	    {
		$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
		$inspection->alg_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['alg_fecha_siembra']));
		$inspection->alg_deshije=date("Y-m-d", strtotime($_REQUEST['Inspection']['alg_deshije']));
		$inspection->alg_floracion=str_replace(',','',$_REQUEST['Inspection']['alg_floracion']);
		$inspection->alg_bellotas=str_replace(',','',$_REQUEST['Inspection']['alg_bellotas']);
		$inspection->alg_surcos=str_replace(',','',$_REQUEST['Inspection']['alg_surcos']);
		$inspection->alg_mata=str_replace(',','',$_REQUEST['Inspection']['alg_mata']);
		$inspection->alg_campo_comercial=str_replace(',','',$_REQUEST['Inspection']['alg_campo_comercial']);
		$inspection->alg_otra_especie=str_replace(',','',$_REQUEST['Inspection']['alg_otra_especie']);
		$inspection->alg_otra_cultivar=str_replace(',','',$_REQUEST['Inspection']['alg_otra_cultivar']);
		$inspection->alg_plantas_otra_especie=$_REQUEST['Inspection']['alg_plantas_otra_especie'];
		$inspection->alg_plantas_fuera_tipo=$_REQUEST['Inspection']['alg_plantas_fuera_tipo'];
		$inspection->alg_malvacearum=$_REQUEST['Inspection']['alg_malvacearum'];
		$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
		$inspection->rechazado=1;
		$inspection->save();
	    }
	    
	    if($form->crop_id==3 || $form->crop_id==4 || $form->crop_id==5)//cereales
	    {
		$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
		$inspection->cer_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['cer_fecha_siembra']));
		$inspection->cer_floracion=str_replace(',','',$_REQUEST['Inspection']['cer_floracion']);
		$inspection->cer_maduracion=str_replace(',','',$_REQUEST['Inspection']['cer_maduracion']);
		$inspection->cer_cantidad_semilla=str_replace(',','',$_REQUEST['Inspection']['cer_cantidad_semilla']);
		$inspection->cer_inflorecencias_otros_cultivares=$_REQUEST['Inspection']['cer_inflorecencias_otros_cultivares'];
		$inspection->cer_inflorecencias_otros_cultivares_menores=$_REQUEST['Inspection']['cer_inflorecencias_otros_cultivares_menores'];
		$inspection->cer_carbon_apestoso=$_REQUEST['Inspection']['cer_carbon_apestoso'];
		$inspection->cer_carbon_cubierto=$_REQUEST['Inspection']['cer_carbon_cubierto'];
		$inspection->cer_carbon_volador=$_REQUEST['Inspection']['cer_carbon_volador'];
		$inspection->cer_cornezuelo=$_REQUEST['Inspection']['cer_cornezuelo'];
		$inspection->cer_mancha_foliar=$_REQUEST['Inspection']['cer_mancha_foliar'];
		$inspection->cer_escaldadura=$_REQUEST['Inspection']['cer_escaldadura'];
		$inspection->cer_presencia_maleza_nocivas=$_REQUEST['Inspection']['cer_presencia_maleza_nocivas'];
		$inspection->cer_aspecto_general_poblacion=$_REQUEST['Inspection']['cer_aspecto_general_poblacion'];
		$inspection->cer_plagas=$_REQUEST['Inspection']['cer_plagas'];
		$inspection->cer_aislamiento=str_replace(',','',$_REQUEST['Inspection']['cer_aislamiento']);
		$inspection->cer_otra_cultivar=str_replace(',','',$_REQUEST['Inspection']['cer_otra_cultivar']);
		$inspection->cer_otra_categoria=str_replace(',','',$_REQUEST['Inspection']['cer_otra_categoria']);
		$inspection->cer_plantas_fuera_tipo=str_replace(',','',$_REQUEST['cer_plantas_fuera_tipo']);
		$inspection->cer_otras_especies=str_replace(',','',$_REQUEST['cer_otras_especies']);
		$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
		$inspection->rechazado=1;
		$inspection->save();
	    }//Fin cereales
	    
	    if($form->crop_id==6 || $form->crop_id==7 || $form->crop_id==8 || $form->crop_id==9 || $form->crop_id==10 ||$form->crop_id==11 ||$form->crop_id==12)//Frijol,haba,pallar,lenteja,caupi,soya, leguminosas
	    {
		$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
		$inspection->leg_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['leg_fecha_siembra']));
		$inspection->leg_emergencia_fecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['leg_emergencia_fecha']));
		$inspection->leg_floracion=str_replace(',','',$_REQUEST['Inspection']['leg_floracion']);
		$inspection->leg_floracion_fecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['leg_floracion_fecha']));
		$inspection->leg_llenado_grano=str_replace(',','',$_REQUEST['Inspection']['leg_llenado_grano']);
		$inspection->leg_fecha_cosecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['leg_fecha_cosecha']));
		$inspection->leg_distanciamiento_surcos=str_replace(',','',$_REQUEST['Inspection']['leg_distanciamiento_surcos']);
		$inspection->leg_mata=str_replace(',','',$_REQUEST['Inspection']['leg_mata']);
		$inspection->leg_campo_comercial=str_replace(',','',$_REQUEST['Inspection']['leg_campo_comercial']);
		$inspection->leg_otra_especie=str_replace(',','',$_REQUEST['Inspection']['leg_otra_especie']);
		$inspection->leg_otro_cultivar=str_replace(',','',$_REQUEST['Inspection']['leg_otro_cultivar']);
		$inspection->leg_presencia_maleza=$_REQUEST['Inspection']['leg_presencia_maleza'];
		$inspection->leg_presencia_plagas=$_REQUEST['Inspection']['leg_presencia_plagas'];
		$inspection->leg_plantas_otras_especies=$_REQUEST['Inspection']['leg_plantas_otras_especies'];
		$inspection->leg_plantas_fuera_tipo=$_REQUEST['Inspection']['leg_plantas_fuera_tipo'];			
		$inspection->leg_mosaicos=str_replace(',','',$_REQUEST['Inspection']['leg_mosaicos']);
		$inspection->leg_moteado=str_replace(',','',$_REQUEST['Inspection']['leg_moteado']);
		$inspection->leg_bacteriosis=str_replace(',','',$_REQUEST['Inspection']['leg_bacteriosis']);
		$inspection->leg_mancha_angular=str_replace(',','',$_REQUEST['Inspection']['leg_mancha_angular']);
		$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
		$inspection->rechazado=1;
		$inspection->save();
	    }//Fin Leguminosas
	    
	    if($form->crop_id==13)//Maiz
	    {			
		$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
		$inspection->maiz_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['maiz_fecha_siembra']));
		$inspection->maiz_emergencia_fecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['maiz_emergencia_fecha']));
		$inspection->maiz_floracion=str_replace(',','',$_REQUEST['Inspection']['maiz_floracion']);
		$inspection->maiz_floracion_fecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['maiz_floracion_fecha']));
		$inspection->maiz_llenado_grano=str_replace(',','',$_REQUEST['Inspection']['maiz_llenado_grano']);
		$inspection->maiz_fecha_cosecha=date("Y-m-d", strtotime($_REQUEST['Inspection']['maiz_fecha_cosecha']));
		$inspection->maiz_distanciamiento_surcos=str_replace(',','',$_REQUEST['Inspection']['maiz_distanciamiento_surcos']);
		$inspection->maiz_mata=str_replace(',','',$_REQUEST['Inspection']['maiz_mata']);
		$inspection->maiz_campo_comercial=str_replace(',','',$_REQUEST['Inspection']['maiz_campo_comercial']);
		$inspection->maiz_otra_especie=str_replace(',','',$_REQUEST['Inspection']['maiz_otra_especie']);
		$inspection->maiz_otro_cultivar=str_replace(',','',$_REQUEST['Inspection']['maiz_otro_cultivar']);
		$inspection->maiz_presencia_maleza=$_REQUEST['Inspection']['maiz_presencia_maleza'];
		$inspection->maiz_presencia_plagas=$_REQUEST['Inspection']['maiz_presencia_plagas'];
		$inspection->maiz_plantas_otras_especies=$_REQUEST['Inspection']['maiz_plantas_otras_especies'];
		$inspection->maiz_plantas_fuera_tipo=$_REQUEST['Inspection']['maiz_plantas_fuera_tipo'];
		$inspection->maiz_tolerancias=$_REQUEST['Inspection']['maiz_tolerancias'];
		$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
		$inspection->rechazado=1;
		$inspection->save();
	    }//Fin Maiz
	    if($form->crop_id==15 )//Papa
	    {			
		$inspection->size=str_replace(',','',$_REQUEST['Inspection']['size']);
		$inspection->papa_fecha_siembra=date("Y-m-d", strtotime($_REQUEST['Inspection']['papa_fecha_siembra']));
		$inspection->papa_campo_comercial=str_replace(',','',$_REQUEST['Inspection']['papa_campo_comercial']);
		$inspection->papa_otra_especie=str_replace(',','',$_REQUEST['Inspection']['papa_otra_especie']);
		$inspection->papa_otro_cultivar=str_replace(',','',$_REQUEST['Inspection']['papa_otro_cultivar']);
		$inspection->afectadas_enrollamiento=str_replace(',','',$_REQUEST['Inspection']['afectadas_enrollamiento']);
		$inspection->afectadas_mozaico=str_replace(',','',$_REQUEST['Inspection']['afectadas_mozaico']);
		$inspection->afectadas_otros_virus=str_replace(',','',$_REQUEST['Inspection']['afectadas_otros_virus']);
		$inspection->afectadas_erwinia=str_replace(',','',$_REQUEST['Inspection']['afectadas_erwinia']);
		$inspection->afectadas_mezclas=str_replace(',','',$_REQUEST['Inspection']['afectadas_mezclas']);
		$inspection->observaciones=$_REQUEST['Inspection']['observaciones'];
		$inspection->rechazado=1;
		$inspection->save();
	    }//Fin Papa
	}
	
	public function Inspeccion($max,$fecha,$usuario,$formulario,$headquarter_id)
	{
		
		$sinspection=new Inspection;
		$sinspection->inspection_number=$max;
		$sinspection->proposed_date=$fecha;
		//$sinspection->proposed_time=$hora;
		$sinspection->user_id=$usuario;
		$sinspection->form_id=$formulario;
		$sinspection->save();
		
		switch($max)
		{
			case(1): $texto="1ra"; break;
			case(2): $texto="2da"; break;
			case(3): $texto="3ra"; break;
			case(4): $texto="4ta"; break;
			case(5): $texto="5ta"; break;
		}
		
		
		$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$headquarter_id));
		$form=Iform::model()->find('id=:id',array(':id'=>$formulario));
		$user=User::model()->find('id=:id',array(':id'=>$form->user_id));
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
				$payment->form_id=$formulario;
				$payment->user_id=$form->user_id;
				$payment->document_reference=$form->form_number;
				$payment->descripcion="$texto Inspección de campo de multiplicación de ".$form->crop->name;
				$payment->save();			
			}
			else if($headquarter->tipo_empresa==1)
			{				
				//Inspeccion
				$inspeccion=Inspection::model()->find('id=:id',
														  array(':id'=>$sinspection->id));
				$inspeccion->proposed_time=date("H:i",strtotime('12:00 PM'));
				$inspeccion->proposed_date=date('Y-m-d',strtotime($fecha));
				$inspeccion->save();
			}
	}
	public function Acondicionamiento($fecha,$aform,$aid,$usuario)
	{
		$form=Iform::model()->find('id=:id',array(':id'=>$aform));
		$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$form->headquarter_id));
		$user=User::model()->find('id=:id',array(':id'=>$form->user_id));
		
		$criteria=new CDbCriteria;
		$criteria->select='max(parent_id) as parent_id';		
		$max = Acondicionamiento::model()->find($criteria);
		$max = $max->parent_id + 1;		
			
		if($headquarter->tipo_empresa==2)
		{				
			$concepto = Concept::model()->find('id=:id',array(':id'=>3));					
			$payment=new Payment;
			$payment->concept_id=$concepto->id;
			$payment->date=date('Y-m-d');
			$payment->quantity=1;
			$payment->ruc=$user->ruc;
			$payment->price=$concepto->price;
			$payment->form_id=$form->id;
			$payment->user_id=$form->user_id;
			$payment->document_reference=$form->form_number;
			$payment->descripcion="1ra ".$concepto->short_name;
			$payment->save();
			
			//Nueo Acondicionamieno
			$acondicionamiento=new Acondicionamiento;
			$acondicionamiento->proposed_date=$fecha;
			$acondicionamiento->form_id=$aform;
			$acondicionamiento->inspection_id=$aid;
			$acondicionamiento->user_id=$usuario;
			$acondicionamiento->acondicionamiento_number=1;
			$acondicionamiento->parent_id=$max;
			$acondicionamiento->save();	
		}
		
		//Nuevo Acondcionamiento Solicitada
		$inbox=new Inbox;
		$inbox->date=date('Y-m-d');
		$inbox->form_id=$aform;
		$inbox->status_id=12;
		$inbox->estado=1;
		$inbox->to=$usuario;
		$inbox->save();
		
	}
	
	
}
