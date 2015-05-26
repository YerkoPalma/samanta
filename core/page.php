<?php 
class Page
{
	public $name;
	public $vars;
	private $dir;
	private $extension;

	function __construct($name){
		$this->name = $name;
		$this->dir = strtolower($name) . '/' . strtolower($name);
		$this->vars = array();
		$this->extension = array(
		'template' => '.html',
		'code' => '.php');
	}

	function set($variable, $content){		
			
		$this->vars[$variable] = $content;		
	}

	function templateDir(){
		return $this->dir . $this->extension['template'];
	}
}
?>