<?php 
	require_once 'vendor/autoload.php';
	Twig_Autoloader::register();

	$loader = new Twig_Loader_Filesystem('app');
	$twig = new Twig_Environment($loader);

	echo $twig->render('index.html', array('the' => 'variables', 'go' => 'here'))

?>