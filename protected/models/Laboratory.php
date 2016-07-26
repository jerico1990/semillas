<?php

/**
 * This is the model class for table "laboratory".
 *
 * The followings are the available columns in table 'laboratory':
 * @property integer $id
 * @property integer $user_id
 * @property integer $form_id
 * @property string $peso_recibido
 * @property string $date_recepcion
 * @property string $date_termino_analisis
 * @property string $number_analisis
 * @property string $semilla_pura
 * @property string $materia_inerte
 * @property string $otras_semillas
 * @property integer $number_day
 * @property string $plantulas_normales
 * @property string $semillas_duras
 * @property string $semillas_frescas
 * @property string $plantulas_anormales
 * @property string $semillas_muertas
 * @property string $contenido_humedad
 * @property string $clase_materia_inerte
 * @property string $observacion
 * @property integer $muestreo_id
 * @property integer $user_laboratory
 */
class Laboratory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'laboratory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, form_id, number_day, muestreo_id, user_laboratory', 'numerical', 'integerOnly'=>true),
			array('peso_recibido, semilla_pura, materia_inerte, otras_semillas, plantulas_normales, semillas_duras, semillas_frescas, plantulas_anormales, semillas_muertas, contenido_humedad', 'length', 'max'=>18),
			array('number_analisis', 'length', 'max'=>30),
			array('clase_materia_inerte, observacion', 'length', 'max'=>300),
			array('date_recepcion, date_termino_analisis', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, form_id, peso_recibido, date_recepcion, date_termino_analisis, number_analisis, semilla_pura, materia_inerte, otras_semillas, number_day, plantulas_normales, semillas_duras, semillas_frescas, plantulas_anormales, semillas_muertas, contenido_humedad, clase_materia_inerte, observacion, muestreo_id, user_laboratory', 'safe', 'on'=>'search'),
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
			'peso_recibido' => 'Peso Recibido(gramos)',
			'date_recepcion' => 'Fecha de recepción del muestra',
			'date_termino_analisis' => 'Fecha de término de análisis',
			'number_analisis' => 'Number Analisis',
			'semilla_pura' => 'Semilla pura',
			'materia_inerte' => 'Materia inerte',
			'otras_semillas' => 'Otras semillas',
			'number_day' => 'Numero de días',
			'plantulas_normales' => 'Plantulas normales',
			'semillas_duras' => 'Semillas duras',
			'semillas_frescas' => 'Semillas frescas',
			'plantulas_anormales' => 'Plantulas anormales',
			'semillas_muertas' => 'Semillas muertas',
			'contenido_humedad' => '',
			'clase_materia_inerte' => 'Clase materia inerte',
			'observacion' => '',
			'muestreo_id' => 'Muestreo',
			'user_laboratory' => 'User Laboratory',
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
		$criteria->compare('peso_recibido',$this->peso_recibido,true);
		$criteria->compare('date_recepcion',$this->date_recepcion,true);
		$criteria->compare('date_termino_analisis',$this->date_termino_analisis,true);
		$criteria->compare('number_analisis',$this->number_analisis,true);
		$criteria->compare('semilla_pura',$this->semilla_pura,true);
		$criteria->compare('materia_inerte',$this->materia_inerte,true);
		$criteria->compare('otras_semillas',$this->otras_semillas,true);
		$criteria->compare('number_day',$this->number_day);
		$criteria->compare('plantulas_normales',$this->plantulas_normales,true);
		$criteria->compare('semillas_duras',$this->semillas_duras,true);
		$criteria->compare('semillas_frescas',$this->semillas_frescas,true);
		$criteria->compare('plantulas_anormales',$this->plantulas_anormales,true);
		$criteria->compare('semillas_muertas',$this->semillas_muertas,true);
		$criteria->compare('contenido_humedad',$this->contenido_humedad,true);
		$criteria->compare('clase_materia_inerte',$this->clase_materia_inerte,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('muestreo_id',$this->muestreo_id);
		$criteria->compare('user_laboratory',$this->user_laboratory);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Laboratory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
