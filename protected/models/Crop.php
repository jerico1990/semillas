<?php

/**
 * This is the model class for table "crop".
 *
 * The followings are the available columns in table 'crop':
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $register
 * @property string $applicant
 * @property string $date
 * @property string $location_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Form[] $forms
 * @property Form[] $forms1
 * @property Crop $parent0
 * @property Crop[] $crops
 */
class Crop extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $departamento;
	public $provincia;
	public function tableName()
	{
		return 'crop';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent, status', 'numerical', 'integerOnly'=>true),
			array('name,departamento', 'length', 'max'=>30),
			array('register', 'length', 'max'=>60),
			array('applicant, location_id', 'length', 'max'=>150),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, departamento,parent, search_estado,register, applicant, date, location_id, status', 'safe', 'on'=>'search'),
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
			'forms' => array(self::HAS_MANY, 'Form', 'variety_id'),
			'forms1' => array(self::HAS_MANY, 'Form', 'crop_id'),
			'parents' => array(self::BELONGS_TO, 'Crop', 'parent'),
			'crops' => array(self::HAS_MANY, 'Crop', 'parent'),
			'location'=>array(self::BELONGS_TO, 'Location', 'location_id'),
			'maestro'=>array(self::BELONGS_TO, 'Maestro', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Descripcion',
			'parent' => 'Cultivo',
			'register' => 'Registro',
			'applicant' => 'Solicitante',
			'date' => 'Fecha',
			'location_id' => 'Distrito',
			'status' => 'Estado',
			'search_estado'=>'Estado',
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
		$criteria->condition='t.parent is null';
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.register',$this->register,true);
		$criteria->compare('t.applicant',$this->applicant,true);
		$criteria->compare('t.search_estado',$this->search_estado,true);
		$criteria->compare('t.date',$this->date,true);		
		$criteria->compare('status',$this->status);
		//$criteria->addInCondition('parent is null',,'');
		//$criteria->condition='parent is null';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function searchv()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='t.parent is not null';
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('parents.name',$this->parent);
		$criteria->compare('t.applicant',$this->applicant,true);
		$criteria->compare('t.search_estado',$this->search_estado,true);
		
		$criteria->with='parents';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Crop the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/*public function estado($estado){
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
	}*/
}
