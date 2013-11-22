<?php
namespace Report;

use Report\Processorinterface as Processorinterface;

abstract class Processor implements Processorinterface
{
	protected $params;
	
	protected $data;
	
	public function set_params(Array $params = array())
	{
		$this->params = $params;
	}
	
	abstract protected function _validate_input();
	
	public function pass_data($data)
	{
		$this->data = $data;
		
		if ( !$this->_validate_input() )
		{
			throw new Exception('The incoming data is not in required format.');
		}
	}
	
	abstract public function process();
}