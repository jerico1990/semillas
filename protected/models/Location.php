<?php

/**
 * This is the model class for table "location".
 *
 * The followings are the available columns in table 'location':
 * @property integer $id
 * @property string $department
 * @property string $province
 * @property string $district
 * @property string $wkt
 * @property integer $departament_id
 * @property integer $district_id
 * @property integer $province_id
 */
class Location extends CActiveRecord
{
	/*
private static $dbadvert = null;
 
public function getDbConnection() {
    return Yii::app()->db1;
}*/
	public function tableName()
	{
		return 'location';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('department, province, district, wkt', 'required'),
			array('departament_id, district_id, province_id', 'numerical', 'integerOnly'=>true),
			array('department, province, district', 'length', 'max'=>100),
			array('wkt', 'length', 'max'=>1000000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, department, province, district, wkt, departament_id, district_id, province_id', 'safe', 'on'=>'search'),
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
			'department' => 'Departamento',
			'province' => 'Provincia',
			'district' => 'Distrito',
			'wkt' => 'Wkt',
			'departament_id' => 'Departament',
			'district_id' => 'District',
			'province_id' => 'Province',
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
		$criteria->compare('department',$this->department,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('wkt',$this->wkt,true);
		$criteria->compare('departament_id',$this->departament_id);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('province_id',$this->province_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Location the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
