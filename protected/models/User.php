<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $ruc
 * @property integer $cruge_user_id
 * @property integer $type_id
 * @property string $person_type
 * @property string $legal_name
 * @property string $first_name
 * @property string $last_name
 * @property string $registry
 * @property integer $district_id
 * @property string $email
 * @property integer $status
 * @property integer $headquarter_id
 * @property string $address
 * @property string $reference
 * @property string $phone
 * @property string $fax
 * @property string $document_number
 * @property integer $producer_id
 * @property string $search_cultivo
 * @property string $search_usuario
 * @property string $search_estado
 * @property string $search_oc_ee
 *
 * The followings are the available model relations:
 * @property Acondicionamiento[] $acondicionamientos
 * @property Attachment[] $attachments
 * @property Form[] $forms
 * @property Inbox[] $inboxes
 * @property Payment[] $payments
 * @property Headquarter $headquarter
 * @property Status $status0
 * @property Type $type
 * @property CrugeUser $crugeUser
 */
class User extends CActiveRecord
{
	public $ruc;
	public $legal_name;
	public $email;
	public $address;
	public $district_id;
	
	public $reference;
	//public $fax;
	public $document_number;
	public $username;
	
	//Variables
	public $department_id;
	public $province_id;
	public $tipo_empresa;
	public $tipo_usuario;
	public $codigo_simple;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('search_cultivo, search_usuario, search_estado, search_oc_ee', 'required'),
			array('cruge_user_id, type_id, district_id, status, headquarter_id, producer_id', 'numerical', 'integerOnly'=>true),
			array('name, registry, email', 'length', 'max'=>30),
			array('ruc, phone', 'length', 'max'=>12),
			array('person_type, legal_name', 'length', 'max'=>120),
			array('first_name, last_name', 'length', 'max'=>50),
			array('address', 'length', 'max'=>150),
			array('reference, search_cultivo, search_usuario, search_oc_ee', 'length', 'max'=>200),
			array('fax', 'length', 'max'=>20),
			array('document_number', 'length', 'max'=>9),
			array('search_estado', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, ruc, cruge_user_id, type_id, person_type, legal_name, first_name, last_name, registry, district_id, email, status, headquarter_id, address, reference, phone, fax, document_number, producer_id, search_cultivo, search_usuario, search_estado, search_oc_ee', 'safe', 'on'=>'search'),
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
			'acondicionamientos' => array(self::HAS_MANY, 'Acondicionamiento', 'user_id'),
			'attachments' => array(self::HAS_MANY, 'Attachment', 'user_id'),
			'forms' => array(self::HAS_MANY, 'Form', 'user_id'),
			'inboxes' => array(self::HAS_MANY, 'Inbox', 'to'),
			'payments' => array(self::HAS_MANY, 'Payment', 'user_id'),
			'headquarter' => array(self::BELONGS_TO, 'Headquarter', 'headquarter_id'),
			'status0' => array(self::BELONGS_TO, 'Status', 'status'),
			'typea' => array(self::BELONGS_TO, 'Type', 'type_id'),
			'crugeuser' => array(self::BELONGS_TO, 'Cruge', 'cruge_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',			
			'name' => 'Usuario',
			'ruc' => 'RUC',
			'cruge_user_id' => 'Cruge User',
			'type_id' => 'Tipo de Usuario',
			'person_type' => 'Tipo persona',
			'legal_name' => 'Nombre / Razón Social',
			'first_name' => 'Nombres',
			'last_name' => 'Apellidos',
			'registry' => 'Nro de Registro',
			'district_id' => 'Distrito',
			'email' => 'Correo Electrónico',
			'status' => 'Estado',
			'headquarter_id' => 'Estacion',
			'address' => 'Dirección (Según Solicitud de R.P.S.)',
			'reference' => 'Referencia',
			'phone' => 'Telefono',
			'fax' => 'Fax',
			'document_number' => 'DNI',
			'username'=>'Usuario',
			'department_id'=>'Departamento',
			'province_id'=>'Provincia',
			'producer_id' => 'Producer',
			'search_cultivo' => 'Search Cultivo',
			'search_usuario' => 'Search Usuario',
			'search_estado' => 'Estado',
			'search_oc_ee' => 'Search Oc Ee',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('cruge_user_id',$this->cruge_user_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('person_type',$this->person_type,true);
		$criteria->compare('legal_name',$this->legal_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('registry',$this->registry,true);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('headquarter_id',$this->headquarter_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('document_number',$this->document_number,true);
		$criteria->compare('producer_id',$this->producer_id);
		$criteria->compare('search_cultivo',$this->search_cultivo,true);
		$criteria->compare('search_usuario',$this->search_usuario,true);
		$criteria->compare('search_estado',$this->search_estado,true);
		$criteria->compare('search_oc_ee',$this->search_oc_ee,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searcho()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('cruge_user_id',$this->cruge_user_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('person_type',$this->person_type,true);
		$criteria->compare('legal_name',$this->legal_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('registry',$this->registry,true);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('headquarter_id',$this->headquarter_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('document_number',$this->document_number,true);
		$criteria->compare('producer_id',$this->producer_id);
		$criteria->compare('search_cultivo',$this->search_cultivo,true);
		$criteria->compare('search_usuario',$this->search_usuario,true);
		$criteria->compare('search_estado',$this->search_estado,true);
		$criteria->compare('search_oc_ee',$this->search_oc_ee,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchi()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='type_id=3';  
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('cruge_user_id',$this->cruge_user_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('person_type',$this->person_type,true);
		$criteria->compare('legal_name',$this->legal_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('registry',$this->registry,true);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('headquarter_id',$this->headquarter_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('document_number',$this->document_number,true);
		$criteria->compare('producer_id',$this->producer_id);
		$criteria->compare('search_cultivo',$this->search_cultivo,true);
		$criteria->compare('search_usuario',$this->search_usuario,true);
		$criteria->compare('search_estado',$this->search_estado,true);
		$criteria->compare('search_oc_ee',$this->search_oc_ee,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchproductor()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='type_id in (1,2)';  
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('cruge_user_id',$this->cruge_user_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('person_type',$this->person_type,true);
		$criteria->compare('legal_name',$this->legal_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('registry',$this->registry,true);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('headquarter_id',$this->headquarter_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('document_number',$this->document_number,true);
		$criteria->compare('producer_id',$this->producer_id);
		$criteria->compare('search_cultivo',$this->search_cultivo,true);
		$criteria->compare('search_usuario',$this->search_usuario,true);
		$criteria->compare('search_estado',$this->search_estado,true);
		$criteria->compare('search_oc_ee',$this->search_oc_ee,true);
		$criteria->order = 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchproductoree()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='type_id=2';
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('cruge_user_id',$this->cruge_user_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('person_type',$this->person_type,true);
		$criteria->compare('legal_name',$this->legal_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('registry',$this->registry,true);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('headquarter_id',$this->headquarter_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('document_number',$this->document_number,true);
		$criteria->compare('producer_id',$this->producer_id);
		$criteria->compare('search_cultivo',$this->search_cultivo,true);
		$criteria->compare('search_usuario',$this->search_usuario,true);
		$criteria->compare('search_estado',$this->search_estado,true);
		$criteria->compare('search_oc_ee',$this->search_oc_ee,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function estado($estado)
	{
		$maestro=Maestro::model()->find('codigo=:codigo and codigo_detalle=:codigo_detalle',
												  array(':codigo'=>'010',':codigo_detalle'=>$estado));
	
		$descripcion=$maestro->descripcion;
		return $descripcion;
	}
	
	public function departamento($id)
	{
		  $location=Location::model()->find('district_id=:district_id',array(':district_id'=>$id));
		  return $location->department;
	}
	public function estacion($id)
	{
		  $headquarter=Headquarter::model()->find('id=:id',array(':id'=>$id));
		  return $headquarter->name;
	}
	
	public function getFullname(){
		  return $this->first_name.' '.$this->last_name;
	}
}
