<?php
namespace Report;

interface Processorinterface
{
	function set_params(Array $params);
	function pass_data($data);
	function process();
}