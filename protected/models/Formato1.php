<?php

/**
 * This is the model class for table "formato_1".
 *
 * The followings are the available columns in table 'formato_1':
 * @property integer $id
 * @property string $expediente
 * @property string $fecha_recepcion
 * @property string $productor_semillas
 * @property string $agricultor_multiplicador
 * @property string $cultivo
 * @property string $cultivar
 * @property string $categoria_obtener
 * @property string $procedencia
 * @property string $nro_control_lote
 * @property string $categoria_sembrar
 * @property string $departamento
 * @property string $provincia
 * @property string $distrito
 * @property string $area
 * @property string $peso_semilla_usada
 * @property string $fecha_siembra
 * @property string $insp_num_1
 * @property string $insp_fecha_1
 * @property string $insp_fecha_siembra_1
 * @property string $insp_area_aprobada_1
 * @property string $insp_observacion_1
 * @property string $insp_num_2
 * @property string $insp_fecha_2
 * @property string $insp_fecha_siembra_2
 * @property string $insp_area_aprobada_2
 * @property string $insp_observacion_2
 * @property string $insp_num_3
 * @property string $insp_fecha_3
 * @property string $insp_fecha_siembra_3
 * @property string $insp_area_aprobada_3
 * @property string $insp_observacion_3
 * @property string $insp_num_4
 * @property string $insp_fecha_4
 * @property string $insp_fecha_siembra_4
 * @property string $insp_area_aprobada_4
 * @property string $insp_observacion_4
 * @property string $insp_num_5
 * @property string $insp_fecha_5
 * @property string $insp_fecha_siembra_5
 * @property string $insp_area_aprobada_5
 * @property string $insp_observacion_5
 * @property string $produccion
 * @property string $fecha_cosecha
 * @property string $informacion
 */
class Formato1 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'formato_1';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(	
			array('expediente, fecha_recepcion, productor_semillas, agricultor_multiplicador, cultivo, cultivar, categoria_obtener, procedencia, nro_control_lote, categoria_sembrar, departamento, provincia, distrito, area, peso_semilla_usada, fecha_siembra, insp_fecha_1, insp_area_aprobada_1, insp_observacion_1, insp_fecha_2, insp_area_aprobada_2, insp_observacion_2, insp_fecha_3, insp_area_aprobada_3, insp_observacion_3, insp_fecha_4, insp_area_aprobada_4, insp_observacion_4, insp_fecha_5, insp_area_aprobada_5, insp_observacion_5, produccion, fecha_cosecha, informacion', 'length', 'max'=>100),
			array('insp_num_1, insp_num_2, insp_num_3, insp_num_4, insp_num_5', 'length', 'max'=>10),
			array('insp_fecha_siembra_1, insp_fecha_siembra_2, insp_fecha_siembra_3, insp_fecha_siembra_4, insp_fecha_siembra_5', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, expediente, fecha_recepcion, productor_semillas, agricultor_multiplicador, cultivo, cultivar, categoria_obtener, procedencia, nro_control_lote, categoria_sembrar, departamento, provincia, distrito, area, peso_semilla_usada, fecha_siembra, insp_num_1, insp_fecha_1, insp_fecha_siembra_1, insp_area_aprobada_1, insp_observacion_1, insp_num_2, insp_fecha_2, insp_fecha_siembra_2, insp_area_aprobada_2, insp_observacion_2, insp_num_3, insp_fecha_3, insp_fecha_siembra_3, insp_area_aprobada_3, insp_observacion_3, insp_num_4, insp_fecha_4, insp_fecha_siembra_4, insp_area_aprobada_4, insp_observacion_4, insp_num_5, insp_fecha_5, insp_fecha_siembra_5, insp_area_aprobada_5, insp_observacion_5, produccion, fecha_cosecha, informacion', 'safe', 'on'=>'search'),
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
			'expediente' => 'Expediente',
			'fecha_recepcion' => 'Fecha Recepcion',
			'productor_semillas' => 'Productor Semillas',
			'agricultor_multiplicador' => 'Agricultor Multiplicador',
			'cultivo' => 'Cultivo',
			'cultivar' => 'Cultivar',
			'categoria_obtener' => 'Categoria Obtener',
			'procedencia' => 'Procedencia',
			'nro_control_lote' => 'Nro Control Lote',
			'categoria_sembrar' => 'Categoria Sembrar',
			'departamento' => 'Departamento',
			'provincia' => 'Provincia',
			'distrito' => 'Distrito',
			'area' => 'Area',
			'peso_semilla_usada' => 'Peso Semilla Usada',
			'fecha_siembra' => 'Fecha Siembra',
			'insp_num_1' => 'Insp Num 1',
			'insp_fecha_1' => 'Insp Fecha 1',
			'insp_fecha_siembra_1' => 'Insp Fecha Siembra 1',
			'insp_area_aprobada_1' => 'Insp Area Aprobada 1',
			'insp_observacion_1' => 'Insp Observacion 1',
			'insp_num_2' => 'Insp Num 2',
			'insp_fecha_2' => 'Insp Fecha 2',
			'insp_fecha_siembra_2' => 'Insp Fecha Siembra 2',
			'insp_area_aprobada_2' => 'Insp Area Aprobada 2',
			'insp_observacion_2' => 'Insp Observacion 2',
			'insp_num_3' => 'Insp Num 3',
			'insp_fecha_3' => 'Insp Fecha 3',
			'insp_fecha_siembra_3' => 'Insp Fecha Siembra 3',
			'insp_area_aprobada_3' => 'Insp Area Aprobada 3',
			'insp_observacion_3' => 'Insp Observacion 3',
			'insp_num_4' => 'Insp Num 4',
			'insp_fecha_4' => 'Insp Fecha 4',
			'insp_fecha_siembra_4' => 'Insp Fecha Siembra 4',
			'insp_area_aprobada_4' => 'Insp Area Aprobada 4',
			'insp_observacion_4' => 'Insp Observacion 4',
			'insp_num_5' => 'Insp Num 5',
			'insp_fecha_5' => 'Insp Fecha 5',
			'insp_fecha_siembra_5' => 'Insp Fecha Siembra 5',
			'insp_area_aprobada_5' => 'Insp Area Aprobada 5',
			'insp_observacion_5' => 'Insp Observacion 5',
			'produccion' => 'Produccion',
			'fecha_cosecha' => 'Fecha Cosecha',
			'informacion' => 'Informacion',
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
		$criteria->compare('expediente',$this->expediente,true);
		$criteria->compare('fecha_recepcion',$this->fecha_recepcion,true);
		$criteria->compare('productor_semillas',$this->productor_semillas,true);
		$criteria->compare('agricultor_multiplicador',$this->agricultor_multiplicador,true);
		$criteria->compare('cultivo',$this->cultivo,true);
		$criteria->compare('cultivar',$this->cultivar,true);
		$criteria->compare('categoria_obtener',$this->categoria_obtener,true);
		$criteria->compare('procedencia',$this->procedencia,true);
		$criteria->compare('nro_control_lote',$this->nro_control_lote,true);
		$criteria->compare('categoria_sembrar',$this->categoria_sembrar,true);
		$criteria->compare('departamento',$this->departamento,true);
		$criteria->compare('provincia',$this->provincia,true);
		$criteria->compare('distrito',$this->distrito,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('peso_semilla_usada',$this->peso_semilla_usada,true);
		$criteria->compare('fecha_siembra',$this->fecha_siembra,true);
		$criteria->compare('insp_num_1',$this->insp_num_1,true);
		$criteria->compare('insp_fecha_1',$this->insp_fecha_1,true);
		$criteria->compare('insp_fecha_siembra_1',$this->insp_fecha_siembra_1,true);
		$criteria->compare('insp_area_aprobada_1',$this->insp_area_aprobada_1,true);
		$criteria->compare('insp_observacion_1',$this->insp_observacion_1,true);
		$criteria->compare('insp_num_2',$this->insp_num_2,true);
		$criteria->compare('insp_fecha_2',$this->insp_fecha_2,true);
		$criteria->compare('insp_fecha_siembra_2',$this->insp_fecha_siembra_2,true);
		$criteria->compare('insp_area_aprobada_2',$this->insp_area_aprobada_2,true);
		$criteria->compare('insp_observacion_2',$this->insp_observacion_2,true);
		$criteria->compare('insp_num_3',$this->insp_num_3,true);
		$criteria->compare('insp_fecha_3',$this->insp_fecha_3,true);
		$criteria->compare('insp_fecha_siembra_3',$this->insp_fecha_siembra_3,true);
		$criteria->compare('insp_area_aprobada_3',$this->insp_area_aprobada_3,true);
		$criteria->compare('insp_observacion_3',$this->insp_observacion_3,true);
		$criteria->compare('insp_num_4',$this->insp_num_4,true);
		$criteria->compare('insp_fecha_4',$this->insp_fecha_4,true);
		$criteria->compare('insp_fecha_siembra_4',$this->insp_fecha_siembra_4,true);
		$criteria->compare('insp_area_aprobada_4',$this->insp_area_aprobada_4,true);
		$criteria->compare('insp_observacion_4',$this->insp_observacion_4,true);
		$criteria->compare('insp_num_5',$this->insp_num_5,true);
		$criteria->compare('insp_fecha_5',$this->insp_fecha_5,true);
		$criteria->compare('insp_fecha_siembra_5',$this->insp_fecha_siembra_5,true);
		$criteria->compare('insp_area_aprobada_5',$this->insp_area_aprobada_5,true);
		$criteria->compare('insp_observacion_5',$this->insp_observacion_5,true);
		$criteria->compare('produccion',$this->produccion,true);
		$criteria->compare('fecha_cosecha',$this->fecha_cosecha,true);
		$criteria->compare('informacion',$this->informacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Formato1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
