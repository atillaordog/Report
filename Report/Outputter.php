<?php

namespace Report;

use Report\Outputterinterface as Outputterinterface;

abstract class Outputter implements Outputterinterface
{
	abstract public function generate_output($processed_data);
}