<?php

/**
 * This is the model class for table "produccion".
 *
 * The followings are the available columns in table 'produccion':
 * @property integer $id
 * @property string $area
 * @property string $produccion
 * @property string $fecha_cosecha
 * @property integer $iform_id
 */
class Produccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	
	public $area;
	public $produccion;
	public $fecha_cosecha;
	public function tableName()
	{
		return 'produccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('form_id', 'numerical', 'integerOnly'=>true),
			//array('area,produccion,fecha_cosecha','required'),
			array('area, produccion', 'length', 'max'=>18),
			array('fecha_cosecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, area, produccion,produccion_ok, fecha_cosecha, form_id', 'safe', 'on'=>'search'),
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
			'area' => 'Area cosechada(ha)',
			'produccion' => 'Producción(kg)',
			'fecha_cosecha' => 'Fecha de cosecha',
			'form_id' => 'Iform',
			'produccion_ok'=>'produccion_ok',
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
		$criteria->compare('area',$this->area,true);
		$criteria->compare('produccion',$this->produccion,true);
		$criteria->compare('fecha_cosecha',$this->fecha_cosecha,true);
		$criteria->compare('form_id',$this->iform_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Produccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
