<?php

/**
 * This is the model class for table "etiquetado".
 *
 * The followings are the available columns in table 'etiquetado':
 * @property integer $id
 * @property integer $user_id
 * @property integer $form_id
 * @property integer $muestreo_id
 * @property string $fecha_solicitud
 * @property boolean $solicitud
 * @property integer $cantidad
 * @property string $fecha_notificado
 * @property boolean $notificado
 * @property string $fecha_informe
 * @property boolean $informe
 * @property string $fecha_rechazado
 * @property boolean $rechazado
 * @property string $peso_total
 */
class Etiquetado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'etiquetado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, form_id, muestreo_id, cantidad', 'numerical', 'integerOnly'=>true),
			array('peso_total', 'length', 'max'=>18),
			array('fecha_solicitud, solicitud, fecha_notificado, notificado, fecha_informe, informe, fecha_rechazado, rechazado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, form_id, muestreo_id, fecha_solicitud, solicitud, cantidad, fecha_notificado, notificado, fecha_informe, informe, fecha_rechazado, rechazado, peso_total', 'safe', 'on'=>'search'),
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
			'muestreo' => array(self::BELONGS_TO, 'Muestreo', 'muestreo_id')	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'form_id' => 'Form',
			'muestreo_id' => 'Muestreo',
			'fecha_solicitud' => 'Fecha Solicitud',
			'solicitud' => 'Solicitud',
			'cantidad' => 'Cantidad',
			'fecha_notificado' => 'Fecha Notificado',
			'notificado' => 'Notificado',
			'fecha_informe' => 'Fecha Informe',
			'informe' => 'Informe',
			'fecha_rechazado' => 'Fecha Rechazado',
			'rechazado' => 'Rechazado',
			'peso_total' => 'Peso Total(kg)',
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
		$criteria->compare('form_id',$this->form_id);
		$criteria->compare('muestreo_id',$this->muestreo_id);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('solicitud',$this->solicitud);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('fecha_notificado',$this->fecha_notificado,true);
		$criteria->compare('notificado',$this->notificado);
		$criteria->compare('fecha_informe',$this->fecha_informe,true);
		$criteria->compare('informe',$this->informe);
		$criteria->compare('fecha_rechazado',$this->fecha_rechazado,true);
		$criteria->compare('rechazado',$this->rechazado);
		$criteria->compare('peso_total',$this->peso_total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Etiquetado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
