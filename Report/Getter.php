<?php
namespace Report;

use Report\Getterinterface as Getterinterface;

abstract class Getter implements Getterinterface
{
	protected $params;
	
	public function set_params(Array $params = array())
	{
		$this->params = $params;
	}
	
	abstract function get_data();
}