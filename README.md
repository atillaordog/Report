Report
======

A simple report class

The main goal here is to separate how a report is generated.
The reason is that in many cases one report is generated in one function of a class, making it a huge code, hard to understand and maintain.
In this case everything has its place, getting data in the getter, processing it in the processer and outputting it in the outputter.

How to use example:

include('Reports/autoload.php');

class TestGetter extends Report\Getter
{
	public function get_data()
	{
		// Get the data from anywhere
		return array('test' => 'a');
	}
}

class TestProcessor extends Report\Processor
{
	protected function _validate_input()
	{
		// Validate the input from getter
		if ( array_key_exists('test', $this->data) )
		{
			return true;
		}
		
		return false;
	}
	
	public function process()
	{
		// Process the data
		$this->data['test'] = 'b';
		
		return $this->data;
	}
}

class TestOutputter extends Report\Outputter
{
	public function generate_output($processed_data)
	{
		// Generate the wanted output, let it be anything from array to html, json, anything
		print_r($processed_data);
	}
}

$report = new Report(
	new TestGetter(),
	new TestProcessor(),
	new TestOutputter()
);

$report->generate();
