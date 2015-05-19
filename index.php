<?php 
	require_once 'vendor/autoload.php';
	require_once 'core/page.php';
	Twig_Autoloader::register();

	$loader = new Twig_Loader_Filesystem('app');
	$twig = new Twig_Environment($loader);

	#Este include debiese ser hecho por el .sh
	include('app/home/home.php');

	$home = new Home();

	echo $twig->render($home->templateDir(), $home->vars)

?>