<?php

/**
 * This is the model class for table "formato_2".
 *
 * The followings are the available columns in table 'formato_2':
 * @property integer $id
 * @property string $expediente
 * @property string $fecha_recepcion
 * @property string $productor_semillas
 * @property string $cultivo
 * @property string $cultivar
 * @property string $categoria
 * @property string $fecha
 * @property string $planta_acondicionamiento
 * @property string $observacion_1
 * @property string $n_control
 * @property string $peso_lote
 * @property string $nro_envases
 * @property string $fecha_muestreo
 * @property string $fecha_analisis
 * @property string $observacion_2
 * @property string $n_etiquetas
 * @property string $cantidad_etiquetas
 * @property string $serie_inicio
 * @property string $serie_fin
 * @property string $fecha_entrega
 * @property string $n_constancia_orige
 * @property string $categoria_final
 */
class Formato2 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'formato_2';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('expediente, productor_semillas, cultivo, cultivar, categoria, fecha, planta_acondicionamiento, n_control, peso_lote, nro_envases, fecha_muestreo, fecha_analisis, observacion_2, n_etiquetas, cantidad_etiquetas, serie_inicio, serie_fin, fecha_entrega, n_constancia_orige, categoria_final', 'length', 'max'=>100),
			array('fecha_recepcion', 'length', 'max'=>20),
			array('observacion_1', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, expediente, fecha_recepcion, productor_semillas, cultivo, cultivar, categoria, fecha, planta_acondicionamiento, observacion_1, n_control, peso_lote, nro_envases, fecha_muestreo, fecha_analisis, observacion_2, n_etiquetas, cantidad_etiquetas, serie_inicio, serie_fin, fecha_entrega, n_constancia_orige, categoria_final', 'safe', 'on'=>'search'),
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
			'cultivo' => 'Cultivo',
			'cultivar' => 'Cultivar',
			'categoria' => 'Categoria',
			'fecha' => 'Fecha',
			'planta_acondicionamiento' => 'Planta Acondicionamiento',
			'observacion_1' => 'Observacion 1',
			'n_control' => 'N Control',
			'peso_lote' => 'Peso Lote',
			'nro_envases' => 'Nro Envases',
			'fecha_muestreo' => 'Fecha Muestreo',
			'fecha_analisis' => 'Fecha Analisis',
			'observacion_2' => 'Observacion 2',
			'n_etiquetas' => 'N Etiquetas',
			'cantidad_etiquetas' => 'Cantidad Etiquetas',
			'serie_inicio' => 'Serie Inicio',
			'serie_fin' => 'Serie Fin',
			'fecha_entrega' => 'Fecha Entrega',
			'n_constancia_orige' => 'N Constancia Orige',
			'categoria_final' => 'Categoria Final',
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
		$criteria->compare('cultivo',$this->cultivo,true);
		$criteria->compare('cultivar',$this->cultivar,true);
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('planta_acondicionamiento',$this->planta_acondicionamiento,true);
		$criteria->compare('observacion_1',$this->observacion_1,true);
		$criteria->compare('n_control',$this->n_control,true);
		$criteria->compare('peso_lote',$this->peso_lote,true);
		$criteria->compare('nro_envases',$this->nro_envases,true);
		$criteria->compare('fecha_muestreo',$this->fecha_muestreo,true);
		$criteria->compare('fecha_analisis',$this->fecha_analisis,true);
		$criteria->compare('observacion_2',$this->observacion_2,true);
		$criteria->compare('n_etiquetas',$this->n_etiquetas,true);
		$criteria->compare('cantidad_etiquetas',$this->cantidad_etiquetas,true);
		$criteria->compare('serie_inicio',$this->serie_inicio,true);
		$criteria->compare('serie_fin',$this->serie_fin,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('n_constancia_orige',$this->n_constancia_orige,true);
		$criteria->compare('categoria_final',$this->categoria_final,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Formato2 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
