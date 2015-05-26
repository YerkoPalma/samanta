<?php 
	
	function getPagesNames(){
		$names = array();
		$dir = 'app';
		$subdirs = array_diff(scandir($dir), array('..', '.'));

		foreach ($subdirs as $subdir) {
			if ((strpos($subdir, '.') == false) && ($subdir != 'empty') ){
				array_push($names, $subdir);				
			}			
			#echo "<pre>".var_dump(strpos($subdir, 'empty') == false)."</pre>";
		}

		return $names;
	}

	function addPages(){
		$dir = 'app';
		$pages = getPagesNames();
		
		foreach ($pages as $page) {			
				include($dir . '/' . $page . '/' . $page . '.php');			
		}
	}

	function numPages(){
		$dir = 'app';
		$pages = getPagesNames();

		#TODO: validaciones

		return count($pages);
	}

?>