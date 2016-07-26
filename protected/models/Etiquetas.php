<?php

/**
 * This is the model class for table "etiquetas".
 *
 * The followings are the available columns in table 'etiquetas':
 * @property integer $id
 * @property integer $user_id
 * @property integer $form_id
 * @property integer $muestreo_id
 * @property string $serie_inicio
 * @property integer $etiquetado_id
 * @property string $serie_fin
 * @property string $cantidad
 */
class Etiquetas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'etiquetas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, form_id, muestreo_id, etiquetado_id', 'numerical', 'integerOnly'=>true),
			array('serie_inicio, serie_fin', 'length', 'max'=>30),
			array('cantidad', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, form_id, muestreo_id, serie_inicio, etiquetado_id, serie_fin, cantidad', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'form_id' => 'Form',
			'muestreo_id' => 'Muestreo',
			'serie_inicio' => 'Serie Inicio',
			'etiquetado_id' => 'Etiquetado',
			'serie_fin' => 'Serie Fin',
			'cantidad' => 'Cantidad',
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
		$criteria->compare('serie_inicio',$this->serie_inicio,true);
		$criteria->compare('etiquetado_id',$this->etiquetado_id);
		$criteria->compare('serie_fin',$this->serie_fin,true);
		$criteria->compare('cantidad',$this->cantidad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Etiquetas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
