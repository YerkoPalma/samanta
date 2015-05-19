<?php 
class Home extends Page
{
	public $name = "Home";

	function __construct(){
		parent::__construct($this->name);
		$this->set("test", "primer test");
	}
	
}

?>