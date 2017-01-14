<?php

/**
 * This is the model class for table "headquarter".
 *
 * The followings are the available columns in table 'headquarter':
 * @property integer $id
 * @property string $name
 * @property integer $producer_id
 * @property integer $location_id
 * @property integer $parent_id
 * @property integer $tipo_empresa
 * @property string $ruc
 * @property integer $tipo_usuario
 * @property string $codigo_simple
 *
 * The followings are the available model relations:
 * @property Headquarter $parent
 * @property Headquarter[] $headquarters
 * @property Form[] $forms
 * @property User[] $users
 */
class Headquarter extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $legal_name;
	public $department_id;
	public $province_id;
	//public $district_id;
	public $address;
	public $document_number;
	public $first_name;
	public $last_name;
	public $username;
	public $email;
	public $departamento;
	public $provincia;
	public $district_id;
	public function tableName()
	{
		return 'headquarter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location_id, parent_id, tipo_empresa, tipo_usuario', 'numerical', 'integerOnly'=>true),
			//array('ruc,location_id','required'),
			array('name', 'length', 'max'=>200),
			array('ruc, codigo_simple', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name,  location_id, search_tipo_empresa ,parent_id, tipo_empresa, ruc, tipo_usuario, codigo_simple', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Headquarter', 'parent_id'),
			'headquarters' => array(self::HAS_MANY, 'Headquarter', 'parent_id'),
			'forms' => array(self::HAS_MANY, 'Form', 'headquarter_id'),
			'users' => array(self::HAS_MANY, 'User', 'headquarter_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nombre',
			
			'location_id' => 'Distritoa',
			'parent_id' => 'Organismo Certificador',
			'tipo_empresa' => 'Tipo Empresa',
			'ruc' => 'Ruc',
			'tipo_usuario' => 'Tipo Usuario',
			'codigo_simple' => 'Codigo Simple',
			'department_id'=>'Departamento',
			'province_id'=>'Provincia',
			'address'=>'Dirección',
			'document_number'=>'N° de Documento',
			'first_name'=>'Nombres',
			'last_name'=>'Apellidos',
			'legal_name'=>'Razon Social',
			'search_tipo_empresa'=>'Tipo de Empresa',
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
		$criteria->condition='parent_id is null and tipo_usuario=2';		
		$criteria->compare('name',$this->name,true);				
		$criteria->compare('search_tipo_empresa',$this->search_tipo_empresa,true);
		
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searcha()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='parent_id is not null and codigo_simple is not null';
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('tipo_empresa',$this->tipo_empresa);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('tipo_usuario',$this->tipo_usuario);
		$criteria->compare('codigo_simple',$this->codigo_simple,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchl()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='tipo_usuario=1';
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('tipo_empresa',$this->tipo_empresa);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('tipo_usuario',$this->tipo_usuario);
		$criteria->compare('codigo_simple',$this->codigo_simple,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Headquarter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function descripciontempresa($descripcion)
	{
	  
		  $empresa=Maestro::model()->find('codigo=:codigo and codigo_detalle=:codigo_detalle',
										  array(':codigo'=>'008',':codigo_detalle'=>$descripcion));
		
		  return $empresa->descripcion;
	}
	public function descripciontusuario($descripcion)
	{
		   $usuario=Maestro::model()->find('codigo=:codigo and codigo_detalle=:codigo_detalle',
										  array(':codigo'=>'009',':codigo_detalle'=>$descripcion));
		  return $usuario->descripcion;
	}
	
	
	public function getAmbito($departament_id)
	{
	    $departamentos = Location::model()->findAll(array(
		  'select'   => 't.department, t.department_id',
		  'group'    => 't.department',
		  'order'    => 't.department ASC',
		  'distinct' => true
	     ));
	    $descripcion="";
	    foreach($departamentos as $departamento)
	    {
		if($departamento->department_id==$departament_id)
		{
		    $descripcion=$departamento->department;
		}
	    }
	    return $descripcion;
	}
}
