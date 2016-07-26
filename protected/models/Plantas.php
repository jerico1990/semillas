<?php

/**
 * This is the model class for table "conditioning_lab".
 *
 * The followings are the available columns in table 'conditioning_lab':
 * @property integer $id
 * @property string $registry
 * @property string $date
 * @property string $name
 * @property string $document_number
 * @property string $address
 * @property integer $location_id
 * @property string $crops
 * @property integer $status_admin
 */
class Plantas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $departamento;
	public $provincia;
	public function tableName()
	{
		return 'plantas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location_id, status_admin', 'numerical', 'integerOnly'=>true),
			array('registry, document_number', 'length', 'max'=>50),
			array('name, crops', 'length', 'max'=>200),
			array('address', 'length', 'max'=>250),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, registry, date, name, document_number, address, location_id, crops, status_admin', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'registry' => 'Registro',
			'date' => 'Fecha',
			'name' => 'Nombre',
			'document_number' => 'DNI',
			'address' => 'Dirección',
			'location_id' => 'Distrito',
			'crops' => 'Cultivar',
			'status_admin' => 'Estado',
			'Departamento'=>'Departamento',
			'Provincia'=>'Provincia',
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
		$criteria->compare('registry',$this->registry,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('document_number',$this->document_number,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('crops',$this->crops,true);
		$criteria->compare('status_admin',$this->status_admin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConditioningLab the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
