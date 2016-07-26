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
 *
 * The followings are the available model relations:
 * @property Inbox[] $inboxes
 * @property Inspection[] $inspections
 * @property Attachment[] $attachments
 * @property Crop $variety
 * @property Crop $crop
 * @property Headquarter $headquarter
 * @property User $user
 */
class Form extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $inspector_id;
	public $observacion;
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
			array('user_id, headquarter_id, crop_id, variety_id, location_id, sow_estimate_quantity, farmers_id, last_area', 'numerical', 'integerOnly'=>true),
			array('category', 'length', 'max'=>30),
			array('source_crop_code, location_name, location_annex, last_crop', 'length', 'max'=>100),
			array('quantity, area, location_lon, location_lat', 'length', 'max'=>18),
			array('observacion_aprobado, observacion_notificado', 'length', 'max'=>250),
			array('seed_date, registry_date, application_ok', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, headquarter_id, crop_id, variety_id, category, source_crop_code, quantity, location_id, location_name, location_annex, area, location_lon, location_lat, seed_date, sow_estimate_quantity, last_crop, farmers_id, registry_date, application_ok, last_area, observacion_aprobado, observacion_notificado', 'safe', 'on'=>'search'),
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
			'inboxes' => array(self::HAS_MANY, 'Inbox', 'form_id'),
			'inspections' => array(self::HAS_MANY, 'Inspection', 'form_id'),
			'attachments' => array(self::HAS_MANY, 'Attachment', 'form_id'),
			'variety' => array(self::BELONGS_TO, 'Crop', 'variety_id'),
			'crop' => array(self::BELONGS_TO, 'Crop', 'crop_id'),
			'headquarter' => array(self::BELONGS_TO, 'Headquarter', 'headquarter_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
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
			'source_crop_code' => 'Etiquetas (Nro de Lote)',
			'quantity' => 'Cantidad',
			'location_id' => 'Localizacion',
			'location_name' => 'Nombre',
			'location_annex' => 'Anexar Localizacion',
			'area' => 'Area',
			'location_lon' => 'Longitud',
			'location_lat' => 'Latitud',
			'seed_date' => 'Fecha de Siembra',
			'sow_estimate_quantity' => 'Estimado de Cosecha (Tm)',
			'last_crop' => 'Ultimo cultivo',
			'farmers_id' => 'Agricultor',
			'registry_date' => 'Registro de Fecha',
			'application_ok' => 'Application Ok',
			'last_area' => 'Ultima Area',
			'observacion_aprobado' => 'Observacion Aprobado',
			'observacion_notificado' => 'Observacion Notificado',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('headquarter_id',$this->headquarter_id);
		$criteria->compare('crop_id',$this->crop_id);
		$criteria->compare('variety_id',$this->variety_id);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('source_crop_code',$this->source_crop_code,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('location_name',$this->location_name,true);
		$criteria->compare('location_annex',$this->location_annex,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('location_lon',$this->location_lon,true);
		$criteria->compare('location_lat',$this->location_lat,true);
		$criteria->compare('seed_date',$this->seed_date,true);
		$criteria->compare('sow_estimate_quantity',$this->sow_estimate_quantity);
		$criteria->compare('last_crop',$this->last_crop,true);
		$criteria->compare('farmers_id',$this->farmers_id);
		$criteria->compare('registry_date',$this->registry_date,true);
		$criteria->compare('application_ok',$this->application_ok);
		$criteria->compare('last_area',$this->last_area);
		$criteria->compare('observacion_aprobado',$this->observacion_aprobado,true);
		$criteria->compare('observacion_notificado',$this->observacion_notificado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Form the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
