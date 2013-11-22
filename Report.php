<?php

/**
 * The goal of this class is to separate and make more logical the process of creating a report
 * 
 * Every report has 3 parts connected by this class
 * The idea is the following: we have a getetr class that gets the data from somewhere, like DB
 * The processor's task is to convert, handle, calculate, generate, etc the data needed for the output
 * The outputter simply finalizes the process by generating the needed output (the output can be html, array, json, etc)
 */
class Report
{
	private $getter;
	private $processor;
	private $outputter;
	
	public function __construct(Report\Getterinterface $getter, Report\Processorinterface $processor, Report\Outputterinterface $outputter)
	{
		$this->getter = $getter;
		$this->processor = $processor;
		$this->outputter = $outputter;
	}
	
	/**
	 * Controlls the whole process and in the end returns the output
	 * @return mixed
	 */
	public function generate()
	{
		$this->processor->pass_data($this->getter->get_data());
		
		return $this->outputter->generate_output($this->processor->process());
	}
}