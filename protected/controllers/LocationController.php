<?php

class LocationController extends Controller
{
    public function actionProvinces($departamento) {
	$locations = Location::model()->findAll(array(
		'select'    => 't.id, t.province, t.province_id, t.department_id',
		'condition' => 'department_id = "' . $departamento.'"',
		'order'		=>'t.province',
	));
	$msg = array(""=>"");
	$data = CHtml::listData($locations, 'province_id', 'province');
	$data=$msg+$data;
	foreach ($data as $value => $name)
	{
	    echo CHtml::tag('option',
	    array('value'=>$value),CHtml::encode($name), true);
	}
    }
    
    public function actionDistricts($provincia) {
	$locations = Location::model()->findAll(array(
		'select'    => 't.district, t.district_id, t.province_id',
		'condition' => 'province_id = "' . $provincia.'"',
		'order'		=>'t.district',
	));
	$msg = array(""=>"");
	$data = CHtml::listData($locations, 'district_id', 'district');
	$data=$msg+$data;
	foreach ($data as $value => $name)
	{
	    echo CHtml::tag('option',
	    array('value'=>$value),CHtml::encode($name), true);
	}
    }
    
    public function actionDistrict() {
	$location = Location::model()->find(array(
		'select'    => 't.id, t.wkt',
		'condition' => 'district_id = ' . array_keys($_GET)[0]
	));
	echo CJSON::encode($location);
    }
    
    public function actionIndex()
    {
	$this->render('index');
    }

    public function actionFiltrardep()
    {
	$listdepartament=Headquarter::model()->findAll('parent_id=:parent_id',array(':parent_id'=>array_keys($_GET)[0]));
	$lista=CHtml::listData($listdepartament, 'location_id', 'location_id');
	$criteria = new CDbCriteria();
	$criteria->addInCondition("departament_id", $lista);
	$result = Location::model()->findAll($criteria);
	/*$locations = Location::model()->findAll(array(
		'select'    => 't.id, t.province, t.province_id, t.departament_id',
		'condition' => 'departament_id = ' . array_keys($_GET)[0],
		'order'		=>	't.province',
	));*/
	//$miarray = [ 0 => 'bar'];
	
	$data = CHtml::listData($result, 'departament_id', 'department');
	$data=array(""=>"")+$data;
	foreach ($data as $value => $name)
	{
		echo CHtml::tag('option',
		array('value'=>$value),CHtml::encode($name), true);
	}
    }
}