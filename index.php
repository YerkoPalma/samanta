<?php 
	require_once 'vendor/autoload.php';
	require_once 'core/page.php';
	Twig_Autoloader::register();

	$loader = new Twig_Loader_Filesystem('app');
	$twig = new Twig_Environment($loader);

	#Este include debiese ser hecho por el .sh
	include('app/home/home.php');

	$home = new Home();

	#obtener nombres de metodos
	$homeClass = get_class($home);
	$homeMethods = get_class_methods($homeClass);

	$homeVars = get_object_vars($home);

	#obtener nombred de filtros
	$homeFilters = $homeVars['filters'];

	#obtener nombre de funciones
	$homeFunctions = $homeVars['functions'];

	#por cada metodo
	foreach ($homeMethods as $homeMethod) {

		#si es un filtro, agregar como filtro de twig
		if(in_array($homeMethod, $homeFilters)){
			#Registro el filtro
			$filter = new Twig_SimpleFilter($homeMethod, array($homeClass, $homeMethod));

			#Lo agrego al template
			$twig->addFilter($filter);
		}

		#si es una funcion, agregar como funcion de twig
		if(in_array($homeMethod, $homeFunctions)){
			#Registro el filtro
			$function = new Twig_SimpleFunction($homeMethod, array($homeClass, $homeMethod));

			#Lo agrego al template
			$twig->addFunction($function);
		}
	}
		

	echo $twig->render($home->templateDir(), $home->vars)

?>