<?php

/**
 * This is the model class for table "acondicionamiento".
 *
 * The followings are the available columns in table 'acondicionamiento':
 * @property integer $id
 * @property integer $user_id
 * @property integer $form_id
 * @property integer $inspection_id
 * @property integer $number_envases
 * @property string $capacidad_envases
 * @property string $peso_estimado
 * @property string $descripcion_secado
 * @property string $peso_ingreso
 * @property string $peso_salida
 * @property string $cantidad_lotes
 * @property integer $cantidad_envases
 * @property string $tipo_envase
 * @property integer $disponibilidad
 * @property string $descripcion
 * @property string $operatividad
 * @property string $limpieza
 * @property integer $number_acondicionamiento
 * @property integer $district_id
 * @property integer $province_id
 * @property integer $departament_id
 * @property string $address
 * @property string $fecha_cosecha
 * @property string $observacion
 * @property string $afectadas_erwinia
 * @property string $afectadas_fusarium
 * @property string $afectadas_rhizoctoniasis
 * @property string $afectadas_mezcla_varietal
 * @property string $afectadas_fuera_tamano
 * @property string $registro_planta
 * @property integer $identificacion_lote_semilla
 * @property integer $reetiquetado_mezclar_categorias
 * @property string $reetiquetado_campana
 * @property string $reetiquetado_categoria_resultante
 * @property string $reetiquetado_control_resultante
 * @property string $reetiquetado_motivo
 * @property integer $reetiquetado_analisis_semilla
 * @property string $reetiquetado_observacion
 * @property string $proposed_date
 * @property string $proposed_time
 * @property string $real_date
 * @property string $real_time
 * @property integer $acondicionamiento_number
 * @property boolean $subsanacion
 * @property string $subsanacion_time
 * @property string $subsanacion_date
 * @property string $subsanacion_real_date
 * @property string $subsanacion_real_time
 * @property boolean $aprobado
 * @property boolean $observado
 * @property boolean $rechazado
 *
 * The followings are the available model relations:
 * @property Form $form
 * @property Inspection $inspection
 * @property User $user
 */
class Acondicionamiento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $aprobado_fecha_propuesta;
	public $y01;
	public function tableName()
	{
	    return 'acondicionamiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
	    // NOTE: you should only define rules for those attributes that
	    // will receive user inputs.
	    return array(
		array('user_id, form_id, inspection_id, number_envases, cantidad_envases, disponibilidad, number_acondicionamiento, district_id, province_id, departament_id, identificacion_lote_semilla,  acondicionamiento_number', 'numerical', 'integerOnly'=>true),
		array('capacidad_envases, peso_estimado, peso_ingreso, peso_salida, cantidad_lotes, afectadas_erwinia, afectadas_fusarium, afectadas_rhizoctoniasis, afectadas_mezcla_varietal, afectadas_fuera_tamano', 'length', 'max'=>18),
		array('descripcion_secado, descripcion, operatividad, limpieza, observacion', 'length', 'max'=>300),
		array('tipo_envase, address', 'length', 'max'=>200),
		array('registro_planta', 'length', 'max'=>50),
		
		array('y01,fecha_cosecha, proposed_date, proposed_time, real_date, real_time, subsanacion, subsanacion_time, subsanacion_date, subsanacion_real_date, subsanacion_real_time, aprobado, observado, rechazado', 'safe'),
		// The following rule is used by search().
		// @todo Please remove those attributes that should not be searched.
		array('id, user_id, form_id, parent_id,inspection_id, number_envases, capacidad_envases, peso_estimado, descripcion_secado, peso_ingreso, peso_salida, cantidad_lotes, cantidad_envases, tipo_envase, disponibilidad, descripcion, operatividad, limpieza, number_acondicionamiento, district_id, province_id, departament_id, address, fecha_cosecha, observacion, afectadas_erwinia, afectadas_fusarium, afectadas_rhizoctoniasis, afectadas_mezcla_varietal, afectadas_fuera_tamano, registro_planta, identificacion_lote_semilla, proposed_date, proposed_time, real_date, real_time, acondicionamiento_number, subsanacion, subsanacion_time, subsanacion_date, subsanacion_real_date, subsanacion_real_time, aprobado, observado, rechazado', 'safe', 'on'=>'search'),
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
		'form' => array(self::BELONGS_TO, 'Form', 'form_id'),
		'inspection' => array(self::BELONGS_TO, 'Inspection', 'inspection_id'),
		'user' => array(self::BELONGS_TO, 'User', 'user_id'),
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
			'inspection_id' => 'Inspection',
			'number_envases' => 'N° Envases',
			'capacidad_envases' => 'Capacidad Envases',
			'peso_estimado' => 'Peso Estimado',
			'descripcion_secado' => 'Descripcion Secado',
			'peso_ingreso' => 'Peso Ingreso',
			'peso_salida' => 'Peso Salida',
			'cantidad_lotes' => 'Cantidad Lotes',
			'cantidad_envases' => 'Cantidad Envases',
			'tipo_envase' => 'Tipo Envase',
			'disponibilidad' => 'Disponibilidad',
			'descripcion' => 'Descripcion',
			'operatividad' => 'Operatividad',
			'limpieza' => 'Limpieza',
			'number_acondicionamiento' => 'Number Acondicionamiento',
			'district_id' => 'Distrito',
			'province_id' => 'Provincia',
			'departament_id' => 'Departamento',
			'address' => 'Dirección',
			'fecha_cosecha' => 'Fecha Cosecha',
			'observacion' => 'Observacion',
			'afectadas_erwinia' => 'Afectadas Erwinia',
			'afectadas_fusarium' => 'Afectadas Fusarium',
			'afectadas_rhizoctoniasis' => 'Afectadas Rhizoctoniasis',
			'afectadas_mezcla_varietal' => 'Afectadas Mezcla Varietal',
			'afectadas_fuera_tamano' => 'Afectadas Fuera Tamano',
			'registro_planta' => 'Registro Planta',
			'identificacion_lote_semilla' => 'Identificacion Lote Semilla',		
			'proposed_date' => 'Fecha solicitada',
			'proposed_time' => 'Hora solicitada',
			'real_date' => 'Fecha programada',
			'real_time' => 'Hora programada',
			'acondicionamiento_number' => 'Acondicionamiento Number',
			'subsanacion' => 'Subsanacion',
			'subsanacion_time' => 'Subsanacion Time',
			'subsanacion_date' => 'Subsanacion Date',
			'subsanacion_real_date' => 'Subsanacion Real Date',
			'subsanacion_real_time' => 'Subsanacion Real Time',
			'aprobado' => 'Aprobado',
			'observado' => 'Observado',
			'rechazado' => 'Rechazado',
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
		$criteria->compare('inspection_id',$this->inspection_id);
		$criteria->compare('number_envases',$this->number_envases);
		$criteria->compare('capacidad_envases',$this->capacidad_envases,true);
		$criteria->compare('peso_estimado',$this->peso_estimado,true);
		$criteria->compare('descripcion_secado',$this->descripcion_secado,true);
		$criteria->compare('peso_ingreso',$this->peso_ingreso,true);
		$criteria->compare('peso_salida',$this->peso_salida,true);
		$criteria->compare('cantidad_lotes',$this->cantidad_lotes,true);
		$criteria->compare('cantidad_envases',$this->cantidad_envases);
		$criteria->compare('tipo_envase',$this->tipo_envase,true);
		$criteria->compare('disponibilidad',$this->disponibilidad);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('operatividad',$this->operatividad,true);
		$criteria->compare('limpieza',$this->limpieza,true);
		$criteria->compare('number_acondicionamiento',$this->number_acondicionamiento);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('departament_id',$this->departament_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('fecha_cosecha',$this->fecha_cosecha,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('afectadas_erwinia',$this->afectadas_erwinia,true);
		$criteria->compare('afectadas_fusarium',$this->afectadas_fusarium,true);
		$criteria->compare('afectadas_rhizoctoniasis',$this->afectadas_rhizoctoniasis,true);
		$criteria->compare('afectadas_mezcla_varietal',$this->afectadas_mezcla_varietal,true);
		$criteria->compare('afectadas_fuera_tamano',$this->afectadas_fuera_tamano,true);
		$criteria->compare('registro_planta',$this->registro_planta,true);
		$criteria->compare('identificacion_lote_semilla',$this->identificacion_lote_semilla);
	
		$criteria->compare('proposed_date',$this->proposed_date,true);
		$criteria->compare('proposed_time',$this->proposed_time,true);
		$criteria->compare('real_date',$this->real_date,true);
		$criteria->compare('real_time',$this->real_time,true);
		$criteria->compare('acondicionamiento_number',$this->acondicionamiento_number);
		$criteria->compare('subsanacion',$this->subsanacion);
		$criteria->compare('subsanacion_time',$this->subsanacion_time,true);
		$criteria->compare('subsanacion_date',$this->subsanacion_date,true);
		$criteria->compare('subsanacion_real_date',$this->subsanacion_real_date,true);
		$criteria->compare('subsanacion_real_time',$this->subsanacion_real_time,true);
		$criteria->compare('aprobado',$this->aprobado);
		$criteria->compare('observado',$this->observado);
		$criteria->compare('rechazado',$this->rechazado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Acondicionamiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
