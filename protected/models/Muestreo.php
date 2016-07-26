<?php

/**
 * This is the model class for table "muestreo".
 *
 * The followings are the available columns in table 'muestreo':
 * @property integer $id
 * @property integer $form_id
 * @property integer $user_id
 * @property string $date_proposed
 * @property string $time_proposed
 * @property string $codigo_lote
 * @property string $name_muestreador
 * @property string $observacion
 * @property string $date_real
 * @property string $time_real
 * @property integer $district_id
 * @property string $lugar_ubicacion
 * @property string $fecha_solicitud
 * @property boolean $solicitud
 * @property string $fecha_notificacion
 * @property boolean $notificacion
 * @property string $fecha_informe
 * @property boolean $informe
 * @property boolean $rechazo
 * @property string $fecha_rechazo
 * @property boolean $tipo_analisis_germinacion
 * @property boolean $tipo_analisis_humedad
 * @property boolean $tipo_analisis_pureza
 * @property boolean $tipo_analisis_otras_especies
 * @property string $registro
 * @property string $inspecciones_campo
 * @property string $folio_inspecciones_campo
 * @property string $inspecciones_observacion
 * @property string $acondicionamiento_campo
 * @property string $folio_acondicionamiento_campo
 * @property string $acondicionamiento_observacion
 * @property string $analisis_semillas
 * @property string $folio_analisis_semillas
 * @property string $analisis_semillas_observacion
 * @property string $observaciones_tecnicos
 * @property string $hora_notificacion
 */
class Muestreo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $n_muestreo;
	public $department_id;
	public $province_id;
	public $laboratorio_id;
	public function tableName()
	{
		return 'muestreo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('form_id, user_id, district_id', 'numerical', 'integerOnly'=>true),
			array('codigo_lote', 'length', 'max'=>120),
			array('name_muestreador', 'length', 'max'=>150),
			array('observacion, lugar_ubicacion, registro, inspecciones_campo, inspecciones_observacion, acondicionamiento_campo, folio_acondicionamiento_campo, acondicionamiento_observacion, analisis_semillas, folio_analisis_semillas, analisis_semillas_observacion, observaciones_tecnicos', 'length', 'max'=>300),
			array('folio_inspecciones_campo', 'length', 'max'=>100),
			array('date_proposed, time_proposed, date_real, time_real, fecha_solicitud, solicitud, fecha_notificacion, notificacion, fecha_informe, informe, rechazo, fecha_rechazo, tipo_analisis_germinacion, tipo_analisis_humedad, tipo_analisis_pureza, tipo_analisis_otras_especies, hora_notificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, form_id, user_id, date_proposed, time_proposed, codigo_lote, name_muestreador, observacion, date_real, time_real, district_id, lugar_ubicacion, fecha_solicitud, solicitud, fecha_notificacion, notificacion, fecha_informe, informe, rechazo, fecha_rechazo, tipo_analisis_germinacion, tipo_analisis_humedad, tipo_analisis_pureza, tipo_analisis_otras_especies, registro, inspecciones_campo, folio_inspecciones_campo, inspecciones_observacion, acondicionamiento_campo, folio_acondicionamiento_campo, acondicionamiento_observacion, analisis_semillas, folio_analisis_semillas, analisis_semillas_observacion, observaciones_tecnicos, hora_notificacion', 'safe', 'on'=>'search'),
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
			'form_id' => 'Form',
			'user_id' => 'User',
			'date_proposed' => 'Fecha solicitud',
			'time_proposed' => 'Hora solicitud',
			'codigo_lote' => 'Codigo Lote',
			'name_muestreador' => 'Nombre del Muestreador',
			'observacion' => 'Observación',
			'date_real' => 'Fecha',
			'time_real' => 'Hora',
			'district_id' => 'Distrito',
			'lugar_ubicacion' => 'Lugar Ubicación del Lote (Nombre de planta acondicionadora,almacén,etc)',
			'fecha_solicitud' => 'Fecha Solicitud',
			'solicitud' => 'Solicitud',
			'fecha_notificacion' => 'Fecha de notificación',
			'notificacion' => 'Notificación',
			'fecha_informe' => 'Fecha Informe',
			'informe' => 'Informe',
			'rechazo' => 'Rechazo',
			'fecha_rechazo' => 'Fecha Rechazo',
			'tipo_analisis_germinacion' => 'Germinación',
			'tipo_analisis_humedad' => 'Humedad',
			'tipo_analisis_pureza' => 'Pureza',
			'tipo_analisis_otras_especies' => 'Otras Especies',
			'registro' => 'Registro',
			'inspecciones_campo' => 'Inspecciones de campo',
			'folio_inspecciones_campo' => 'Folio(s)',
			'inspecciones_observacion' => 'Observación(cuando corresponda)',
			'acondicionamiento_campo' => 'Inspección(es) de acondicionamiento',
			'folio_acondicionamiento_campo' => 'Folio(s)',
			'acondicionamiento_observacion' => 'Observación (cuando corresponda)',
			'analisis_semillas' => 'Analisis semillas (cuando corresponda)',
			'folio_analisis_semillas' => 'Folio(s)',
			'analisis_semillas_observacion' => 'Observación (cuando corresponda)',
			'observaciones_tecnicos' => 'Otras observaciones (cuando corresponda)',
			'hora_notificacion' => 'Hora de notificación',
			'n_muestreo'=>'Nro de Lotes',
			'department_id'=>'Departamento',
			'province_id'=>'Provincia',
			'laboratorio_id'=>'Laboratorios'
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
		$criteria->compare('form_id',$this->form_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date_proposed',$this->date_proposed,true);
		$criteria->compare('time_proposed',$this->time_proposed,true);
		$criteria->compare('codigo_lote',$this->codigo_lote,true);
		$criteria->compare('name_muestreador',$this->name_muestreador,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('date_real',$this->date_real,true);
		$criteria->compare('time_real',$this->time_real,true);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('lugar_ubicacion',$this->lugar_ubicacion,true);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('solicitud',$this->solicitud);
		$criteria->compare('fecha_notificacion',$this->fecha_notificacion,true);
		$criteria->compare('notificacion',$this->notificacion);
		$criteria->compare('fecha_informe',$this->fecha_informe,true);
		$criteria->compare('informe',$this->informe);
		$criteria->compare('rechazo',$this->rechazo);
		$criteria->compare('fecha_rechazo',$this->fecha_rechazo,true);
		$criteria->compare('tipo_analisis_germinacion',$this->tipo_analisis_germinacion);
		$criteria->compare('tipo_analisis_humedad',$this->tipo_analisis_humedad);
		$criteria->compare('tipo_analisis_pureza',$this->tipo_analisis_pureza);
		$criteria->compare('tipo_analisis_otras_especies',$this->tipo_analisis_otras_especies);
		$criteria->compare('registro',$this->registro,true);
		$criteria->compare('inspecciones_campo',$this->inspecciones_campo,true);
		$criteria->compare('folio_inspecciones_campo',$this->folio_inspecciones_campo,true);
		$criteria->compare('inspecciones_observacion',$this->inspecciones_observacion,true);
		$criteria->compare('acondicionamiento_campo',$this->acondicionamiento_campo,true);
		$criteria->compare('folio_acondicionamiento_campo',$this->folio_acondicionamiento_campo,true);
		$criteria->compare('acondicionamiento_observacion',$this->acondicionamiento_observacion,true);
		$criteria->compare('analisis_semillas',$this->analisis_semillas,true);
		$criteria->compare('folio_analisis_semillas',$this->folio_analisis_semillas,true);
		$criteria->compare('analisis_semillas_observacion',$this->analisis_semillas_observacion,true);
		$criteria->compare('observaciones_tecnicos',$this->observaciones_tecnicos,true);
		$criteria->compare('hora_notificacion',$this->hora_notificacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Muestreo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
