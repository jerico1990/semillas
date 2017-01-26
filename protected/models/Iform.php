<?php

/**
 * This is the model class for table "form".
 *
 * The followings are the available columns in table 'form':
 * @property integer $id
 * @property integer $user_id
 * @property integer $headquarter_id
 * @property integer $crop_id
 * @property integer $variety_id
 * @property string $category
 * @property string $source_crop_code
 * @property string $quantity
 * @property integer $location_id
 * @property string $location_name
 * @property string $location_annex
 * @property string $area
 * @property string $location_lon
 * @property string $location_lat
 * @property string $seed_date
 * @property integer $sow_estimate_quantity
 * @property string $last_crop
 * @property integer $farmers_id
 * @property string $registry_date
 * @property boolean $application_ok
 * @property integer $last_area
 * @property string $observacion_aprobado
 * @property string $observacion_notificado
 * @property string $form_number
 * @property string $produccion_area
 * @property string $produccion_total
 * @property string $produccion_fecha_cosecha
 *
 * The followings are the available model relations:
 * @property Inspection[] $inspections
 * @property Inbox[] $inboxes
 * @property Attachment[] $attachments
 * @property Crop $variety
 * @property Crop $crop
 * @property Headquarter $headquarter
 * @property User $user
 * @property Payment[] $payments
 * @property Acondicionamiento[] $acondicionamientos
 */
class Iform extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $fecha_visita;
	public $observacion;
	public $inspector_id;
	public $validainsp;
	public $proposed_time;

	public $lotes;
	//Validaciones
	public $variety_id;
	public $crop_id;
	public $seed_date;
	public $category;
	//public $source_crop_code;
	//public $quantity;
	public $location_id;
	public $area;
	public $sow_estimate_quantity;
	public $headquarter_id;
	//variables para particulars
	
	public $peso_total;
	public $peso_envase;
	public $nro_envases;
	
	public $sources_controls;
	public $sources_etiquetas;
	public $sources_cantidades;
	public $documents_references;
	public $productors;
	public $sources_ids;
	
	public $farmers_nombres;
	public $farmers_dnis;
	public $farmers_ids;
	
	public function tableName()
	{
	    return 'form';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
	    // NOTE: you should only define rules for those attributes that
	    // will receive user inputs.
	    return array(
		array('user_id, headquarter_id, crop_id, variety_id, location_id,  farmers_id, last_area', 'numerical', 'integerOnly'=>true),
		array('category', 'length', 'max'=>30),
		//array('crop_id,variety_id,seed_date,category,location_id,area,sow_estimate_quantity','required'),
		array(' location_name, location_annex, last_crop', 'length', 'max'=>100),
		array(' area, location_lon, location_lat, produccion_area, produccion_total,sow_estimate_quantity', 'length', 'max'=>18),
		array('observacion_aprobado, observacion_notificado', 'length', 'max'=>250),
		array('form_number', 'length', 'max'=>120),
		array('farmers_ids,sources_ids,productors,documents_references,sources_cantidades,sources_etiquetas,sources_controls,farmers_dnis,farmers_nombres,seed_date, registry_date, application_ok, produccion_fecha_cosecha,variety_before_id', 'safe'),
		// The following rule is used by search().
		// @todo Please remove those attributes that should not be searched.
		array('farmers_dnis,farmers_nombres,productors,documents_references,sources_cantidades,sources_etiquetas,sources_controls,id, user_id, headquarter_id, crop_id, modificacion,lotes,mezclar_categorias,variety_id, category,   location_id, location_name, location_annex, area, location_lon, location_lat, seed_date, sow_estimate_quantity, last_crop, farmers_id, registry_date, application_ok, last_area, observacion_aprobado, observacion_notificado, form_number, produccion_area, produccion_total, produccion_fecha_cosecha', 'safe', 'on'=>'search'),
	    );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'inspections' => array(self::HAS_MANY, 'Inspection', 'form_id'),
			'inboxes' => array(self::HAS_MANY, 'Inbox', 'form_id'),
			'attachments' => array(self::HAS_MANY, 'Attachment', 'form_id'),
			'variety' => array(self::BELONGS_TO, 'Crop', 'variety_id'),
			'crop' => array(self::BELONGS_TO, 'Crop', 'crop_id'),
			'headquarter' => array(self::BELONGS_TO, 'Headquarter', 'headquarter_id'),
			'usera' => array(self::BELONGS_TO, 'User', 'user_id'),
			'payments' => array(self::HAS_MANY, 'Payment', 'form_id'),
			'acondicionamientos' => array(self::HAS_MANY, 'Acondicionamiento', 'form_id'),
			'location' => array(self::BELONGS_TO, 'Location', 'district_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',			
			'user_id' => 'Usuario',
			'headquarter_id' => '',
			'crop_id' => 'Cultivo',
			'variety_id' => 'Cultivar',
			'category' => 'Categoria',
			//'source_crop_code' => 'Etiquetas (Nro de Lote)',
			
			'location_id' => 'Distrito',
			'location_name' => 'Nombre de Campo',
			'location_annex' => 'Anexo/Sector',
			'area' => 'Area (ha)',
			'location_lon' => 'Longitud',
			'location_lat' => 'Latitud',
			'seed_date' => 'Fecha Estimada de Siembra',
			'sow_estimate_quantity' => 'Estimado de Cosecha (kg)',
			'last_crop' => 'Historial de campo',
			'farmers_id' => 'Agricultor',
			'registry_date' => 'Fecha de Registro',
			'application_ok' => 'Application Ok',
			'last_area' => 'Area modificada',
			'observacion_aprobado' => 'Observación Aprobado',
			'observacion_notificado' => 'Observación Notificado',
			'fecha_visita'=>'Fecha Sugerida de 1° Inspección',
			'form_number'=>'Nro Expediente',
			'validainsp'=>'Pago efectuado',
			'mezclar_categorias'=>'Categorias a Mezclar',
			'produccion_area' => 'Area (ha)',
			'produccion_total' => 'Producción total (kg)',
			'produccion_fecha_cosecha' => 'Fecha cosecha',
			'observacion'=>'Observación',
			'inspector_id'=>'',
			'variety_before_id'=>'Cultivar anterior',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));               
      
		$criteria=new CDbCriteria;
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('crop.name',$this->crop_id);		
		$criteria->compare('location_id',$this->location_id);		
		$criteria->compare('form_number',$this->form_number,true);
		$criteria->with = array('crop', 'usera','inboxes');
		$criteria->together = true;
		$criteria->addCondition("inboxes.status_id=2 and inboxes.to=".$user->id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function excel()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria;	
		$criteria->compare('user_id',$this->user_id);		
		$criteria->compare('location_id',$this->location_id);		
		$criteria->compare('form_number',$this->form_number,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function searchi()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$user=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));               
      
		$criteria=new CDbCriteria;
		
		
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('crop.name',$this->crop_id);		
		$criteria->compare('location_id',$this->location_id);		
		$criteria->compare('form_number',$this->form_number,true);
		$criteria->with = array('crop', 'usera','inboxes');
		$criteria->together = true;
		$criteria->addCondition("inboxes.to=".$user->id);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Iform the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function categoria($categ){
		
		
		if($estado==1)
		{
			$descripcion="Habilitado";
		}
		else if($estado==2)
		{
			$descripcion="Deshabilitado";
		
		}
		else
			$descripcion="";
	return $descripcion;
	}
	
	
	
	
	
	
}
