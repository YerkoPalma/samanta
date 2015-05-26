<?php 
	require_once 'vendor/autoload.php';
	require_once 'core/page.php';
	require_once 'core/functions.php';
	require_once 'config.php';

	Twig_Autoloader::register();

	$loader = new Twig_Loader_Filesystem('app');
	$twig = new Twig_Environment($loader);

	$pages = getPagesNames();

	#Este include debiese ser hecho por el .sh

	foreach ($pages as $page) {
		include('app/'.$page.'/'.$page.'.php');	

		$page = ucwords($page);

		$pageInstance = new $page();

		#obtener nombres de metodos
		$pageClass = get_class($pageInstance);
		$pageMethods = get_class_methods($pageClass);

		$pageVars = get_object_vars($pageInstance);

		#obtener nombred de filtros
		$pageFilters = $pageVars['filters'];

		#obtener nombre de funciones
		$pageFunctions = $pageVars['functions'];

		#por cada metodo
		foreach ($pageMethods as $pageMethod) {

			#si es un filtro, agregar como filtro de twig
			if(in_array($pageMethod, $pageFilters)){
				#Registro el filtro
				$filter = new Twig_SimpleFilter($pageMethod, array($pageClass, $pageMethod));

				#Lo agrego al template
				$twig->addFilter($filter);
			}

			#si es una funcion, agregar como funcion de twig
			if(in_array($pageMethod, $pageFunctions)){
				#Registro el filtro
				$function = new Twig_SimpleFunction($pageMethod, array($pageClass, $pageMethod));

				#Lo agrego al template
				$twig->addFunction($function);
			}
		}	

		
	}
	
	#addPages();

	$startPage = new $start_page();
	echo $twig->render($startPage->templateDir(), $startPage->vars);
	#$home = new Home();	

?>