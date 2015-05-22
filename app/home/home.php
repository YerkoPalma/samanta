<?php 
class Home extends Page
{
	public $name = "Home";
	public $filters = array('lower_case', 'not_a_filter');
	public $functions = array();

	function __construct(){
		parent::__construct($this->name);
		$this->set("test", "PriMer Test");
		$this->set("go", "SEGUNDO");
	}

	function lower_case($txt){
		return strtolower($txt);
	}

	function not_a_filter($txt){
		return strtoupper($txt);
	}
	
}

?>