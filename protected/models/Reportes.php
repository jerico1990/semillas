<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Reportes extends CFormModel
{
	public $region;
	public $fecha;
	public $categoria;
   public $especie;
	public $cultivar;
	public $plantas;
	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array();
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'region'=>'',
         'fecha'=>'',
         'categoria'=>'',
         'especie'=>'',
         'cultivar'=>'',
         'plantas'=>'',
		);
	}
}