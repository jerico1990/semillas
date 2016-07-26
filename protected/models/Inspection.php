<?php

/**
 * This is the model class for table "inspection".
 *
 * The followings are the available columns in table 'inspection':
 * @property integer $id
 * @property integer $inspection_number
 * @property string $proposed_time
 * @property string $proposed_date
 * @property string $size
 * @property string $established_date
 * @property string $established_time
 * @property string $real_date
 * @property string $real_time
 * @property string $alg_fecha_siembra
 * @property string $alg_deshije
 * @property string $alg_floracion
 * @property string $alg_bellotas
 * @property string $alg_surcos
 * @property string $alg_mata
 * @property string $alg_campo_comercial
 * @property string $alg_otra_especie
 * @property string $alg_otra_cultivar
 * @property string $alg_plantas_otra_especie
 * @property string $alg_plantas_fuera_tipo
 * @property integer $resultado
 * @property string $observaciones
 * @property string $recomendaciones
 * @property integer $arz_siembra_directa
 * @property integer $arz_transplante
 * @property string $arz_fecha_siembra
 * @property string $arz_fecha_almacigo
 * @property string $arz_fecha_transplante
 * @property string $arz_area_instalada
 * @property string $arz_aislamiento
 * @property string $cer_fecha_siembra
 * @property string $cer_floracion
 * @property string $cer_maduracion
 * @property string $cer_inflorecencias_otros_cultivares
 * @property string $cer_inflorecencias_otros_cultivares_menores
 * @property string $cer_carbon_apestoso
 * @property string $cer_carbon_cubierto
 * @property string $cer_carbon_volador
 * @property string $cer_cornezuelo
 * @property string $cer_mancha_foliar
 * @property string $cer_escaldadura
 * @property string $cer_presencia_maleza_nocivas
 * @property string $cer_aspecto_general_poblacion
 * @property string $cer_plagas
 * @property string $cer_aislamiento
 * @property string $cer_otra_cultivar
 * @property string $cer_otra_categoria
 * @property string $leg_fecha_siembra
 * @property string $leg_emergencia_fecha
 * @property string $leg_floracion
 * @property string $leg_llenado_grano
 * @property string $leg_fecha_cosecha
 * @property string $leg_distanciamiento_surcos
 * @property string $leg_mata
 * @property string $leg_campo_comercial
 * @property string $leg_otra_especie
 * @property string $leg_otro_cultivar
 * @property string $leg_presencia_maleza
 * @property string $leg_presencia_plagas
 * @property string $leg_plantas_otras_especies
 * @property string $leg_plantas_fuera_tipo
 * @property string $maiz_fecha_siembra
 * @property string $maiz_emergencia_fecha
 * @property string $maiz_floracion
 * @property string $maiz_llenado_grano
 * @property string $maiz_fecha_cosecha
 * @property string $maiz_distanciamiento_surcos
 * @property string $maiz_mata
 * @property string $maiz_campo_comercial
 * @property string $maiz_otra_especie
 * @property string $maiz_otro_cultivar
 * @property string $maiz_presencia_maleza
 * @property string $maiz_presencia_plagas
 * @property string $maiz_plantas_otras_especies
 * @property string $maiz_plantas_fuera_tipo
 * @property string $papa_campo_comercial
 * @property string $papa_otra_especie
 * @property string $papa_otro_cultivar
 * @property string $papa_fecha_siembra
 * @property integer $papa_plagas
 * @property integer $user_id
 * @property integer $form_id
 * @property string $maiz_floracion_fecha
 * @property string $leg_floracion_fecha
 * @property string $cer_fecha_fenologico
 * @property string $cer_cantidad_semilla
 * @property string $afectadas_enrollamiento
 * @property string $afectadas_mozaico
 * @property string $afectadas_otros_virus
 * @property string $afectadas_erwinia
 * @property string $afectadas_mezclas
 * @property integer $subsanacion
 * @property integer $aprobado
 * @property integer $observado
 * @property integer $rechazado
 * @property string $subsanacion_date
 * @property string $subsanacion_time
 * @property string $subsanacion_real_date
 * @property string $subsanacion_real_time
 * @property string $arz_fuera_tipo
 * @property string $arz_rojo
 * @property string $arz_plantas_sintomas
 * @property string $leg_mosaicos
 * @property string $leg_moteado
 * @property string $leg_bacteriosis
 * @property string $leg_mancha_angular
 * @property string $cer_plantas_fuera_tipo
 * @property string $cer_otras_especies
 * @property string $maiz_tolerancias
 * @property string $alg_malvacearum
 * @property integer $nueva_inspeccion
 *
 * The followings are the available model relations:
 * @property Acondicionamiento[] $acondicionamientos
 * @property Form $form
 */
class Inspection extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
   public $fecha_propuesta;
   public $select_id;
	//
   
	public $condicional_fecha_propuesta;
	public $aprobado_fecha_propuesta;
	public $nhora_propuesta;
	public $inlineck;
	public function tableName()
	{
		return 'inspection';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inspection_number, resultado, arz_siembra_directa, arz_transplante, papa_plagas, user_id, form_id, subsanacion, aprobado, observado, rechazado, nueva_inspeccion', 'numerical', 'integerOnly'=>true),
			array('size, alg_floracion, alg_bellotas, alg_surcos, alg_mata, alg_campo_comercial, alg_otra_especie, alg_otra_cultivar, arz_area_instalada, arz_aislamiento, cer_floracion, cer_maduracion, cer_aislamiento, cer_otra_cultivar, cer_otra_categoria, leg_floracion, leg_llenado_grano, leg_distanciamiento_surcos, leg_mata, leg_campo_comercial, leg_otra_especie, leg_otro_cultivar, maiz_floracion, maiz_llenado_grano, maiz_distanciamiento_surcos, maiz_mata, maiz_campo_comercial, maiz_otra_especie, maiz_otro_cultivar, papa_campo_comercial, papa_otra_especie, papa_otro_cultivar, cer_cantidad_semilla, afectadas_enrollamiento, afectadas_mozaico, afectadas_otros_virus, afectadas_erwinia, afectadas_mezclas, arz_fuera_tipo, arz_rojo, arz_plantas_sintomas, leg_mosaicos, leg_moteado, leg_bacteriosis, leg_mancha_angular, cer_plantas_fuera_tipo, cer_otras_especies, maiz_tolerancias, alg_malvacearum', 'length', 'max'=>18),
			array('alg_plantas_otra_especie, alg_plantas_fuera_tipo, observaciones, recomendaciones, cer_inflorecencias_otros_cultivares, cer_inflorecencias_otros_cultivares_menores, cer_carbon_apestoso, cer_carbon_cubierto, cer_carbon_volador, cer_cornezuelo, cer_mancha_foliar, cer_escaldadura, cer_presencia_maleza_nocivas, cer_aspecto_general_poblacion, cer_plagas, leg_presencia_maleza, leg_presencia_plagas, leg_plantas_otras_especies, leg_plantas_fuera_tipo, maiz_presencia_maleza, maiz_presencia_plagas, maiz_plantas_otras_especies, maiz_plantas_fuera_tipo', 'length', 'max'=>300),
			array('proposed_time, proposed_date, established_date, established_time, real_date, real_time, alg_fecha_siembra, alg_deshije, arz_fecha_siembra, arz_fecha_almacigo, arz_fecha_transplante, cer_fecha_siembra, leg_fecha_siembra, leg_emergencia_fecha, leg_fecha_cosecha, maiz_fecha_siembra, maiz_emergencia_fecha, maiz_fecha_cosecha, papa_fecha_siembra, maiz_floracion_fecha, leg_floracion_fecha, cer_fecha_fenologico, subsanacion_date, subsanacion_time, subsanacion_real_date, subsanacion_real_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, inspection_number, proposed_time, proposed_date, size, established_date, established_time, real_date, real_time, alg_fecha_siembra, alg_deshije, alg_floracion, alg_bellotas, alg_surcos, alg_mata, alg_campo_comercial, alg_otra_especie, alg_otra_cultivar, alg_plantas_otra_especie, alg_plantas_fuera_tipo, resultado, observaciones, recomendaciones, arz_siembra_directa, arz_transplante, arz_fecha_siembra, arz_fecha_almacigo, arz_fecha_transplante, arz_area_instalada, arz_aislamiento, cer_fecha_siembra, cer_floracion, cer_maduracion, cer_inflorecencias_otros_cultivares, cer_inflorecencias_otros_cultivares_menores, cer_carbon_apestoso, cer_carbon_cubierto, cer_carbon_volador, cer_cornezuelo, cer_mancha_foliar, cer_escaldadura, cer_presencia_maleza_nocivas, cer_aspecto_general_poblacion, cer_plagas, cer_aislamiento, cer_otra_cultivar, cer_otra_categoria, leg_fecha_siembra, leg_emergencia_fecha, leg_floracion, leg_llenado_grano, leg_fecha_cosecha, leg_distanciamiento_surcos, leg_mata, leg_campo_comercial, leg_otra_especie, leg_otro_cultivar, leg_presencia_maleza, leg_presencia_plagas, leg_plantas_otras_especies, leg_plantas_fuera_tipo, maiz_fecha_siembra, maiz_emergencia_fecha, maiz_floracion, maiz_llenado_grano, maiz_fecha_cosecha, maiz_distanciamiento_surcos, maiz_mata, maiz_campo_comercial, maiz_otra_especie, maiz_otro_cultivar, maiz_presencia_maleza, maiz_presencia_plagas, maiz_plantas_otras_especies, maiz_plantas_fuera_tipo, papa_campo_comercial, papa_otra_especie, papa_otro_cultivar, papa_fecha_siembra, papa_plagas, user_id, form_id, maiz_floracion_fecha, leg_floracion_fecha, cer_fecha_fenologico, cer_cantidad_semilla, afectadas_enrollamiento, afectadas_mozaico, afectadas_otros_virus, afectadas_erwinia, afectadas_mezclas, subsanacion, aprobado, observado, rechazado, subsanacion_date, subsanacion_time, subsanacion_real_date, subsanacion_real_time, arz_fuera_tipo, arz_rojo, arz_plantas_sintomas, leg_mosaicos, leg_moteado, leg_bacteriosis, leg_mancha_angular, cer_plantas_fuera_tipo, cer_otras_especies, maiz_tolerancias, alg_malvacearum, nueva_inspeccion', 'safe', 'on'=>'search'),
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
			'acondicionamientos' => array(self::HAS_MANY, 'Acondicionamiento', 'inspection_id'),
			'form' => array(self::BELONGS_TO, 'Form', 'form_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'inspection_number' => 'N°',
			'proposed_time' => 'Hora Propuesta',
			'proposed_date' => 'Fecha propuesta',
			'size' => 'Area(m2)',
			'established_date' => 'Established Date',
			'established_time' => 'Established Time',
			'real_date' => 'Fecha programada',
			'real_time' => 'Hora programada',
			'alg_fecha_siembra' => 'Fecha Siembra',
			'alg_deshije' => 'Fecha de Deshije',
			'alg_floracion' => 'Floracion (%)',
			'alg_bellotas' => 'Bellotas Abiertas(%)',
			'alg_surcos' => 'Surcos (m)',
			'alg_mata' => 'Mata (m)',
			'alg_campo_comercial' => 'Campo Comercial (m)',
			'alg_otra_especie' => 'Otra Especie / Híbrido (m)',
			'alg_otra_cultivar' => 'Otra Cultivar (m)',
			'alg_plantas_otra_especie' => 'Otra Especie',
			'alg_plantas_fuera_tipo' => 'Fuera de Tipo',
			'resultado' => 'Resultado',
			'observaciones' => ' ',
			'recomendaciones' => 'Recomendaciones',
			'arz_siembra_directa' => 'Siembra Directa',
			'arz_transplante' => 'Transplante',
			'arz_fecha_siembra' => 'Fecha Siembra',
			'arz_fecha_almacigo' => 'Fecha Almacigo',
			'arz_fecha_transplante' => 'Fecha Transplante',
			'arz_area_instalada' => 'Area Instalada (ha)',
			'arz_aislamiento' => 'Aislamiento (m)',
			'cer_fecha_siembra' => 'Fecha de Siembra',
			'cer_floracion' => 'Floración (%)',
			'cer_maduracion' => 'Maduración (%)',
			'cer_inflorecencias_otros_cultivares' => 'Inflorecencias de Otros Cultivares',
			'cer_inflorecencias_otros_cultivares_menores' => 'Inflorecencias de Otros Cultivares Menores',
			'cer_carbon_apestoso' => 'Carbón Apestoso',
			'cer_carbon_cubierto' => 'Carbón Cubierto',
			'cer_carbon_volador' => 'Carbón Volador',
			'cer_cornezuelo' => 'Cornezuelo',
			'cer_mancha_foliar' => 'Mancha Foliar',
			'cer_escaldadura' => 'Escaldadura',
			'cer_presencia_maleza_nocivas' => 'Presencia Malezas Nocivas',
			'cer_aspecto_general_poblacion' => 'Aspecto General Población',
			'cer_plagas' => 'Plagas',
			'cer_aislamiento' => 'Campo comercial (m)',
			'cer_otra_cultivar' => 'Otra Cultivar (m)',
			'cer_otra_categoria' => 'Otra Categoria (m)',
			'cer_fecha_fenologico'=>'Fecha',
			'leg_fecha_siembra' => 'Fecha de Siembra',
			'leg_emergencia_fecha' => 'Fecha de Emergencia',
			'leg_floracion' => 'Floración (%)',
			'leg_llenado_grano' => 'Llenado de Grano (%)',
			'leg_fecha_cosecha' => 'Fecha de Cosecha',
			'leg_distanciamiento_surcos' => 'Surcos (m)',
			'leg_mata' => 'Mata (m)',
			'leg_campo_comercial' => 'Campo Comercial (m)',
			'leg_otra_especie' => 'Otra Especie (m)',
			'leg_otro_cultivar' => 'Otro Cultivar (m)',
			'leg_presencia_maleza' => 'De malezas',
			'leg_presencia_plagas' => 'De plagas',
			'leg_plantas_otras_especies' => 'Otras Especies',
			'leg_plantas_fuera_tipo' => 'Fuera de Tipo',
			'maiz_fecha_siembra' => 'Fecha de Siembra',
			'maiz_emergencia_fecha' => 'Fecha de Emergencia',
			'maiz_floracion' => 'Floración (%)',
			'maiz_llenado_grano' => 'Llenado de Grano (%)',
			'maiz_fecha_cosecha' => 'Fecha de Cosecha',
			'maiz_distanciamiento_surcos' => 'Surcos (m)',
			'maiz_mata' => 'Mata (m)',
			'maiz_campo_comercial' => 'Campo Comercial (m)',
			'maiz_otra_especie' => 'Otra Especie (m)',
			'maiz_otro_cultivar' => 'Otro Cultivar (m)',
			'maiz_presencia_maleza' => 'De malezas',
			'maiz_presencia_plagas' => 'De Plagas',
			'maiz_plantas_otras_especies' => 'Otras Especies',
			'maiz_plantas_fuera_tipo' => 'Fuera de Tipo',
			'papa_campo_comercial' => 'Campo Comercial (m)',
			'papa_otra_especie' => 'Otra Especies (m)',
			'papa_otro_cultivar' => 'Otro Cultivar (m)',
			'papa_fecha_siembra' => 'Fecha Siembra',
			'papa_plagas' => 'Plagas',
			'user_id' => 'User',
			'form_id' => 'Form',
			'maiz_floracion_fecha' => '',
			'leg_floracion_fecha' => '',
			'cer_cantidad_semilla'=>'',
			'afectadas_enrollamiento' => '',
			'afectadas_mozaico' => '',
			'afectadas_otros_virus' => '',
			'afectadas_erwinia' => '',
			'afectadas_mezclas' => '',
			'fecha_propuesta'=>'Fecha Programada',
			'nfecha_propuesta'=>'Fecha Prospueta',
			'nhora_propuesta'=>'Hora Propuesta',
		   'inlineck'=>'',
			'aprobado_fecha_propuesta'=>'',
			'subsanacion_real_date'=>'Fecha',
			'subsanacion_real_time'=>'Hora',
         'arz_fuera_tipo'=>'Plantas fuera de tipo',
         'arz_rojo'=>'Arroz rojo',
         'arz_plantas_sintomas'=>' Plantas con síntomas de enfermedades',
         'leg_mosaicos'=>'Mosaicos causados',
         'leg_moteado'=>'Moteado causado por virus',
         'leg_bacteriosis'=>'Bacteriosis',
         'leg_mancha_angular'=>'Mancha angular',
         'cer_plantas_fuera_tipo'=>'Plantas fuera de tipo',
         'cer_otras_especies'=>'Otras Especies',
         'maiz_tolerancias'=>'Tolerancias de Mazorcas',
         'select_id'=>'',
			'alg_malvacearum' => 'Alg Malvacearum',
			'nueva_inspeccion' => 'Nueva Inspeccion',
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
		$criteria->compare('inspection_number',$this->inspection_number);
		$criteria->compare('proposed_time',$this->proposed_time,true);
		$criteria->compare('proposed_date',$this->proposed_date,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('established_date',$this->established_date,true);
		$criteria->compare('established_time',$this->established_time,true);
		$criteria->compare('real_date',$this->real_date,true);
		$criteria->compare('real_time',$this->real_time,true);
		$criteria->compare('alg_fecha_siembra',$this->alg_fecha_siembra,true);
		$criteria->compare('alg_deshije',$this->alg_deshije,true);
		$criteria->compare('alg_floracion',$this->alg_floracion,true);
		$criteria->compare('alg_bellotas',$this->alg_bellotas,true);
		$criteria->compare('alg_surcos',$this->alg_surcos,true);
		$criteria->compare('alg_mata',$this->alg_mata,true);
		$criteria->compare('alg_campo_comercial',$this->alg_campo_comercial,true);
		$criteria->compare('alg_otra_especie',$this->alg_otra_especie,true);
		$criteria->compare('alg_otra_cultivar',$this->alg_otra_cultivar,true);
		$criteria->compare('alg_plantas_otra_especie',$this->alg_plantas_otra_especie,true);
		$criteria->compare('alg_plantas_fuera_tipo',$this->alg_plantas_fuera_tipo,true);
		$criteria->compare('resultado',$this->resultado);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('recomendaciones',$this->recomendaciones,true);
		$criteria->compare('arz_siembra_directa',$this->arz_siembra_directa);
		$criteria->compare('arz_transplante',$this->arz_transplante);
		$criteria->compare('arz_fecha_siembra',$this->arz_fecha_siembra,true);
		$criteria->compare('arz_fecha_almacigo',$this->arz_fecha_almacigo,true);
		$criteria->compare('arz_fecha_transplante',$this->arz_fecha_transplante,true);
		$criteria->compare('arz_area_instalada',$this->arz_area_instalada,true);
		$criteria->compare('arz_aislamiento',$this->arz_aislamiento,true);
		$criteria->compare('cer_fecha_siembra',$this->cer_fecha_siembra,true);
		$criteria->compare('cer_floracion',$this->cer_floracion,true);
		$criteria->compare('cer_maduracion',$this->cer_maduracion,true);
		$criteria->compare('cer_inflorecencias_otros_cultivares',$this->cer_inflorecencias_otros_cultivares,true);
		$criteria->compare('cer_inflorecencias_otros_cultivares_menores',$this->cer_inflorecencias_otros_cultivares_menores,true);
		$criteria->compare('cer_carbon_apestoso',$this->cer_carbon_apestoso,true);
		$criteria->compare('cer_carbon_cubierto',$this->cer_carbon_cubierto,true);
		$criteria->compare('cer_carbon_volador',$this->cer_carbon_volador,true);
		$criteria->compare('cer_cornezuelo',$this->cer_cornezuelo,true);
		$criteria->compare('cer_mancha_foliar',$this->cer_mancha_foliar,true);
		$criteria->compare('cer_escaldadura',$this->cer_escaldadura,true);
		$criteria->compare('cer_presencia_maleza_nocivas',$this->cer_presencia_maleza_nocivas,true);
		$criteria->compare('cer_aspecto_general_poblacion',$this->cer_aspecto_general_poblacion,true);
		$criteria->compare('cer_plagas',$this->cer_plagas,true);
		$criteria->compare('cer_aislamiento',$this->cer_aislamiento,true);
		$criteria->compare('cer_otra_cultivar',$this->cer_otra_cultivar,true);
		$criteria->compare('cer_otra_categoria',$this->cer_otra_categoria,true);
		$criteria->compare('leg_fecha_siembra',$this->leg_fecha_siembra,true);
		$criteria->compare('leg_emergencia_fecha',$this->leg_emergencia_fecha,true);
		$criteria->compare('leg_floracion',$this->leg_floracion,true);
		$criteria->compare('leg_llenado_grano',$this->leg_llenado_grano,true);
		$criteria->compare('leg_fecha_cosecha',$this->leg_fecha_cosecha,true);
		$criteria->compare('leg_distanciamiento_surcos',$this->leg_distanciamiento_surcos,true);
		$criteria->compare('leg_mata',$this->leg_mata,true);
		$criteria->compare('leg_campo_comercial',$this->leg_campo_comercial,true);
		$criteria->compare('leg_otra_especie',$this->leg_otra_especie,true);
		$criteria->compare('leg_otro_cultivar',$this->leg_otro_cultivar,true);
		$criteria->compare('leg_presencia_maleza',$this->leg_presencia_maleza,true);
		$criteria->compare('leg_presencia_plagas',$this->leg_presencia_plagas,true);
		$criteria->compare('leg_plantas_otras_especies',$this->leg_plantas_otras_especies,true);
		$criteria->compare('leg_plantas_fuera_tipo',$this->leg_plantas_fuera_tipo,true);
		$criteria->compare('maiz_fecha_siembra',$this->maiz_fecha_siembra,true);
		$criteria->compare('maiz_emergencia_fecha',$this->maiz_emergencia_fecha,true);
		$criteria->compare('maiz_floracion',$this->maiz_floracion,true);
		$criteria->compare('maiz_llenado_grano',$this->maiz_llenado_grano,true);
		$criteria->compare('maiz_fecha_cosecha',$this->maiz_fecha_cosecha,true);
		$criteria->compare('maiz_distanciamiento_surcos',$this->maiz_distanciamiento_surcos,true);
		$criteria->compare('maiz_mata',$this->maiz_mata,true);
		$criteria->compare('maiz_campo_comercial',$this->maiz_campo_comercial,true);
		$criteria->compare('maiz_otra_especie',$this->maiz_otra_especie,true);
		$criteria->compare('maiz_otro_cultivar',$this->maiz_otro_cultivar,true);
		$criteria->compare('maiz_presencia_maleza',$this->maiz_presencia_maleza,true);
		$criteria->compare('maiz_presencia_plagas',$this->maiz_presencia_plagas,true);
		$criteria->compare('maiz_plantas_otras_especies',$this->maiz_plantas_otras_especies,true);
		$criteria->compare('maiz_plantas_fuera_tipo',$this->maiz_plantas_fuera_tipo,true);
		$criteria->compare('papa_campo_comercial',$this->papa_campo_comercial,true);
		$criteria->compare('papa_otra_especie',$this->papa_otra_especie,true);
		$criteria->compare('papa_otro_cultivar',$this->papa_otro_cultivar,true);
		$criteria->compare('papa_fecha_siembra',$this->papa_fecha_siembra,true);
		$criteria->compare('papa_plagas',$this->papa_plagas);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('form_id',$this->form_id);
		$criteria->compare('maiz_floracion_fecha',$this->maiz_floracion_fecha,true);
		$criteria->compare('leg_floracion_fecha',$this->leg_floracion_fecha,true);
		$criteria->compare('cer_fecha_fenologico',$this->cer_fecha_fenologico,true);
		$criteria->compare('cer_cantidad_semilla',$this->cer_cantidad_semilla,true);
		$criteria->compare('afectadas_enrollamiento',$this->afectadas_enrollamiento,true);
		$criteria->compare('afectadas_mozaico',$this->afectadas_mozaico,true);
		$criteria->compare('afectadas_otros_virus',$this->afectadas_otros_virus,true);
		$criteria->compare('afectadas_erwinia',$this->afectadas_erwinia,true);
		$criteria->compare('afectadas_mezclas',$this->afectadas_mezclas,true);
		$criteria->compare('subsanacion',$this->subsanacion);
		$criteria->compare('aprobado',$this->aprobado);
		$criteria->compare('observado',$this->observado);
		$criteria->compare('rechazado',$this->rechazado);
		$criteria->compare('subsanacion_date',$this->subsanacion_date,true);
		$criteria->compare('subsanacion_time',$this->subsanacion_time,true);
		$criteria->compare('subsanacion_real_date',$this->subsanacion_real_date,true);
		$criteria->compare('subsanacion_real_time',$this->subsanacion_real_time,true);
		$criteria->compare('arz_fuera_tipo',$this->arz_fuera_tipo,true);
		$criteria->compare('arz_rojo',$this->arz_rojo,true);
		$criteria->compare('arz_plantas_sintomas',$this->arz_plantas_sintomas,true);
		$criteria->compare('leg_mosaicos',$this->leg_mosaicos,true);
		$criteria->compare('leg_moteado',$this->leg_moteado,true);
		$criteria->compare('leg_bacteriosis',$this->leg_bacteriosis,true);
		$criteria->compare('leg_mancha_angular',$this->leg_mancha_angular,true);
		$criteria->compare('cer_plantas_fuera_tipo',$this->cer_plantas_fuera_tipo,true);
		$criteria->compare('cer_otras_especies',$this->cer_otras_especies,true);
		$criteria->compare('maiz_tolerancias',$this->maiz_tolerancias,true);
		$criteria->compare('alg_malvacearum',$this->alg_malvacearum,true);
		$criteria->compare('nueva_inspeccion',$this->nueva_inspeccion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inspection the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
