<?php

/**
 * This is the model class for table "temp_reporte".
 *
 * The followings are the available columns in table 'temp_reporte':
 * @property integer $id
 * @property string $fecha_recepcion
 * @property string $expediente
 * @property string $productor
 * @property string $cultivo
 * @property string $cultivar
 * @property string $categoria
 * @property string $provincia
 * @property string $distrito
 * @property string $anexo
 * @property string $nombre_predio
 * @property string $area
 * @property integer $ins_num_1
 * @property integer $ins_num_2
 * @property integer $ins_num_3
 * @property integer $ins_num_4
 * @property integer $ins_num_5
 * @property string $ins_fecha_1
 * @property string $ins_fecha_2
 * @property string $ins_fecha_3
 * @property string $ins_fecha_4
 * @property string $ins_fecha_5
 * @property string $fecha_siembra
 * @property string $fecha_siembra_1
 * @property string $fecha_siembra_2
 * @property string $fecha_siembra_3
 * @property string $fecha_siembra_4
 * @property string $fecha_siembra_5
 */
class TempReporte extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'temp_reporte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ins_num_1, ins_num_2, ins_num_3, ins_num_4, ins_num_5', 'numerical', 'integerOnly'=>true),
			array('fecha_recepcion, expediente, cultivo, cultivar, categoria, provincia, distrito', 'length', 'max'=>100),
			array('productor, anexo, nombre_predio', 'length', 'max'=>200),
			array('area', 'length', 'max'=>18),
			array('ins_fecha_1, ins_fecha_2, ins_fecha_3, ins_fecha_4, ins_fecha_5, fecha_siembra, fecha_siembra_1, fecha_siembra_2, fecha_siembra_3, fecha_siembra_4, fecha_siembra_5', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha_recepcion, expediente, productor, cultivo, cultivar, categoria, provincia, distrito, anexo, nombre_predio, area, ins_num_1, ins_num_2, ins_num_3, ins_num_4, ins_num_5, ins_fecha_1, ins_fecha_2, ins_fecha_3, ins_fecha_4, ins_fecha_5, fecha_siembra, fecha_siembra_1, fecha_siembra_2, fecha_siembra_3, fecha_siembra_4, fecha_siembra_5', 'safe', 'on'=>'search'),
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
			'fecha_recepcion' => 'Fecha Recepcion',
			'expediente' => 'Expediente',
			'productor' => 'Productor',
			'cultivo' => 'Cultivo',
			'cultivar' => 'Cultivar',
			'categoria' => 'Categoria',
			'provincia' => 'Provincia',
			'distrito' => 'Distrito',
			'anexo' => 'Anexo',
			'nombre_predio' => 'Nombre Predio',
			'area' => 'Area',
			'ins_num_1' => 'Ins Num 1',
			'ins_num_2' => 'Ins Num 2',
			'ins_num_3' => 'Ins Num 3',
			'ins_num_4' => 'Ins Num 4',
			'ins_num_5' => 'Ins Num 5',
			'ins_fecha_1' => 'Ins Fecha 1',
			'ins_fecha_2' => 'Ins Fecha 2',
			'ins_fecha_3' => 'Ins Fecha 3',
			'ins_fecha_4' => 'Ins Fecha 4',
			'ins_fecha_5' => 'Ins Fecha 5',
			'fecha_siembra' => 'Fecha Siembra',
			'fecha_siembra_1' => 'Fecha Siembra 1',
			'fecha_siembra_2' => 'Fecha Siembra 2',
			'fecha_siembra_3' => 'Fecha Siembra 3',
			'fecha_siembra_4' => 'Fecha Siembra 4',
			'fecha_siembra_5' => 'Fecha Siembra 5',
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
		$criteria->compare('fecha_recepcion',$this->fecha_recepcion,true);
		$criteria->compare('expediente',$this->expediente,true);
		$criteria->compare('productor',$this->productor,true);
		$criteria->compare('cultivo',$this->cultivo,true);
		$criteria->compare('cultivar',$this->cultivar,true);
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('provincia',$this->provincia,true);
		$criteria->compare('distrito',$this->distrito,true);
		$criteria->compare('anexo',$this->anexo,true);
		$criteria->compare('nombre_predio',$this->nombre_predio,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('ins_num_1',$this->ins_num_1);
		$criteria->compare('ins_num_2',$this->ins_num_2);
		$criteria->compare('ins_num_3',$this->ins_num_3);
		$criteria->compare('ins_num_4',$this->ins_num_4);
		$criteria->compare('ins_num_5',$this->ins_num_5);
		$criteria->compare('ins_fecha_1',$this->ins_fecha_1,true);
		$criteria->compare('ins_fecha_2',$this->ins_fecha_2,true);
		$criteria->compare('ins_fecha_3',$this->ins_fecha_3,true);
		$criteria->compare('ins_fecha_4',$this->ins_fecha_4,true);
		$criteria->compare('ins_fecha_5',$this->ins_fecha_5,true);
		$criteria->compare('fecha_siembra',$this->fecha_siembra,true);
		$criteria->compare('fecha_siembra_1',$this->fecha_siembra_1,true);
		$criteria->compare('fecha_siembra_2',$this->fecha_siembra_2,true);
		$criteria->compare('fecha_siembra_3',$this->fecha_siembra_3,true);
		$criteria->compare('fecha_siembra_4',$this->fecha_siembra_4,true);
		$criteria->compare('fecha_siembra_5',$this->fecha_siembra_5,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TempReporte the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
