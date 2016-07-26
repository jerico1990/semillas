<?php

/**
 * This is the model class for table "inbox".
 *
 * The followings are the available columns in table 'inbox':
 * @property integer $id
 * @property string $date
 * @property integer $form_id
 * @property integer $to
 * @property integer $status_id
 * @property boolean $estado
 * @property string $aprobado
 * @property string $rechazado
 * @property string $observado
 *
 * The followings are the available model relations:
 * @property User $to0
 * @property Form $form
 * @property Status $status
 */
class Inbox extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $observacion;
	public $inspector_id;
	public $fecha;
	
	
	public function tableName()
	{
		return 'inbox';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('form_id, to, status_id', 'numerical', 'integerOnly'=>true),
			array('aprobado, rechazado, observado', 'length', 'max'=>250),
			array('date, estado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, form_id, to, status_id, estado, aprobado, rechazado, observado', 'safe', 'on'=>'search'),
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
			'to0' => array(self::BELONGS_TO, 'User', 'to'),
			'form' => array(self::BELONGS_TO, 'Form', 'form_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Fecha',
			'form_id' => 'Form',
			'to' => 'To',
			'status_id' => 'Status',
			'estado' => 'Estado',
			'aprobado' => 'Aprobado',
			'rechazado' => 'Rechazado',
			'observado' => 'Observado',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('form_id',$this->form_id);
		$criteria->compare('to',$this->to);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('aprobado',$this->aprobado,true);
		$criteria->compare('rechazado',$this->rechazado,true);
		$criteria->compare('observado',$this->observado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searcha()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('form_id',$this->form_id);
		$criteria->compare('to',$this->to);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('aprobado',$this->aprobado,true);
		$criteria->compare('rechazado',$this->rechazado,true);
		$criteria->compare('observado',$this->observado,true);
		$criteria->condition='status_id=2';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchi()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('form_id',$this->form_id);
		$criteria->compare('to',$this->to);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('aprobado',$this->aprobado,true);
		$criteria->compare('rechazado',$this->rechazado,true);
		$criteria->compare('observado',$this->observado,true);
		$criteria->condition='status_id>2';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inbox the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
