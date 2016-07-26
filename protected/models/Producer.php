<?php

/**
 * This is the model class for table "producer".
 *
 * The followings are the available columns in table 'producer':
 * @property integer $id
 * @property string $registry
 * @property integer $folio
 * @property string $name
 * @property string $address
 * @property integer $location_id
 * @property string $document_number
 * @property string $status
 * @property string $legal_address
 * @property string $libro
 * @property integer $status_admin
 */
class Producer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $registry;
	public $name;
	public $address;
	public $document_number;
	public $location_id;
	public $status;
	public $libro;
	public $folio;
	public $status_admin;
	public $departamento;
	public $provincia;
	public function tableName()
	{
		return 'producer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('folio, location_id, status_admin', 'numerical', 'integerOnly'=>true),
			array('status_admin,folio,libro,registry,name,address,document_number,location_id','required','message'=>'{attribute} El campo no debe estar vacio .'),
			array('registry, document_number', 'length', 'max'=>50),
			array('name', 'length', 'max'=>200),
			array('address', 'length', 'max'=>250),
			array('status, libro', 'length', 'max'=>30),
			array('legal_address', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, registry, folio, name, address, location_id, document_number, status, legal_address, libro, status_admin', 'safe', 'on'=>'search'),
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
			'location' => array(self::BELONGS_TO, 'Location', 'location_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'registry' => 'Nro de Registro',
			'folio' => 'Folio',
			'name' => 'Nombre / Razón Social',
			'address' => 'Direccion',
			'location_id' => 'Distrito',
			'document_number' => 'RUC',
			'status' => 'Estado',
			'legal_address' => 'Direccion Legal',
			'libro' => 'Libro',
			'status_admin' => 'Habilidad',
			'departamento'=>'Departamento',
			'provincia'=>'Provincia'
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
		$criteria->compare('folio',$this->folio);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('document_number',$this->document_number,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('legal_address',$this->legal_address,true);
		$criteria->compare('libro',$this->libro,true);
		$criteria->compare('status_admin',$this->status_admin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
