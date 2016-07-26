<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Solicitud extends CFormModel
{
   
   
   public $var_registro;
   public $var_ruc;
   public $var_razon_social;
   public $var_dni;
   public $var_nombres;
   public $var_apellidos;
   public $var_correo;
   public $var_telefono;
   public $var_fax;
	public $int_departamento;
	public $int_provincia;
   public $int_district;
   public $var_direccion;
   public $var_referencia;
	
   
   public function rules()
	{
		return array(			
			array('var_registro,var_ruc,var_razon_social,var_dni,
                var_nombres,var_apellidos,var_correo,int_district,
                var_direccion,var_referencia','required'),
         array('var_correo','email','message'=>"Email no es valido"),
			array('var_registro','verificando_registro'),
			array('var_ruc','verificando_ruc'),
			//array('var_registro','verificando_productor'),
			
			//array('password', 'authenticate'),		
		);
	}
   
   public function attributeLabels()
	{
		return array(
			'var_registro'=>'Nro de Registro',
			'var_ruc'=>'RUC',
			'var_razon_social'=>'Nombre / Razón Social',
			'var_dni'=>'DNI',
			'var_nombres'=>'Nombres',
			'var_apellidos'=>'Apellidos',
			'var_correo'=>'Correo Electrónico',
			'var_telefono'=>'Telefono',
			'var_fax'=>'Fax',
			'int_departamento'=>'Departamento',
			'int_provincia'=>'Provincia',
			'int_district'=>'Distrito',
			'var_direccion'=>'Dirección (Según Solicitud de R.P.S.)',
			'var_referencia'=>'Referencia',			
			//'username'=>'Usuario',		
		);
	}
	
	public function verificando_registro($attribute,$params)
	{		
		$producer=Producer::model()->find('registry=:registry',array(':registry'=>$this->var_registro));		
		if(!isset($producer))
		{
			$this->addError('var_registro', 'No existe Nro de Registro');
		}		
	}
	public function verificando_ruc($attribute,$params)
	{		
		$producer=Producer::model()->find('document_number=:document_number and registry=:registry',array(':document_number'=>$this->var_ruc,':registry'=>$this->var_registro));		
		if(!isset($producer))
		{
			$this->addError('var_ruc', 'No es el RUC correcto');
		}		
	}
	public function verificando_productor($attribute,$params)
	{		
		$user=User::model()->find('registry=:registry',array(':registry'=>$this->var_registro));		
		if($user->status=="2" || $user->status=="3")
		{
			$this->addError('var_registro', 'Ya es un usuario en el Sistema');
		}		
	}
}