<?php

/**
 * This is the model class for table "movilizacion".
 *
 * The followings are the available columns in table 'movilizacion':
 * @property integer $id
 * @property string $cantidad_envases
 * @property string $capacidad_envases
 * @property string $cantidad_movilizar
 * @property string $fecha
 * @property integer $origen
 * @property string $origen_nombre_predio
 * @property integer $origen_district_id
 * @property integer $destino
 * @property string $destino_nombre_predio
 * @property string $destino_registro
 * @property integer $destino_district_id
 * @property integer $iform_id
 */
class Movilizacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $destino_district_id;
	public $destino_registro;
	public $origen_district_id;
	public function tableName()
	{
		return 'movilizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('origen, origen_district_id, destino, destino_district_id, form_id', 'numerical', 'integerOnly'=>true),
			array('cantidad_envases, capacidad_envases, cantidad_movilizar', 'length', 'max'=>18),
			array('origen_district_id,destino_district_id,destino_registro','required'),
			array('origen_nombre_predio, destino_nombre_predio', 'length', 'max'=>150),
			array('destino_registro', 'length', 'max'=>100),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cantidad_envases,movilizacion_ok, capacidad_envases, cantidad_movilizar, fecha, origen, origen_nombre_predio, origen_district_id, destino, destino_nombre_predio, destino_registro, destino_district_id, form_id', 'safe', 'on'=>'search'),
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
			'cantidad_envases' => 'Cantidad Envases',
			'capacidad_envases' => 'Capacidad Envases (kg)',
			'cantidad_movilizar' => 'Cantidad Movilizar (kg)',
			'fecha' => 'Fecha de movilización',
			'origen' => 'Origen',
			'origen_nombre_predio' => 'Nombre del Predio',
			'origen_district_id' => 'Distrito',
			'destino' => 'Destino',
			'destino_nombre_predio' => 'Nombre del Predio',
			'destino_registro' => 'N° Registro',
			'destino_district_id' => 'Distrito',
			'form_id' => 'Iform',
			'movilizacion_ok'=>'movilizacion_ok',
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
		$criteria->compare('cantidad_envases',$this->cantidad_envases,true);
		$criteria->compare('capacidad_envases',$this->capacidad_envases,true);
		$criteria->compare('cantidad_movilizar',$this->cantidad_movilizar,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('origen',$this->origen);
		$criteria->compare('origen_nombre_predio',$this->origen_nombre_predio,true);
		$criteria->compare('origen_district_id',$this->origen_district_id);
		$criteria->compare('destino',$this->destino);
		$criteria->compare('destino_nombre_predio',$this->destino_nombre_predio,true);
		$criteria->compare('destino_registro',$this->destino_registro,true);
		$criteria->compare('destino_district_id',$this->destino_district_id);
		$criteria->compare('form_id',$this->form_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Movilizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
