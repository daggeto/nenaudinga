<?php
	session_start(); // rospoczęcie sesji.

	use Doctrine\ORM\Tools\Setup;
	use Doctrine\ORM\EntityManager;

	require "vendor/autoload.php";

	$isDevMode = true;
	$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__.'\src\persistance'), $isDevMode);

	$conn = array(
		'dbname' => 'nenaudinga',
		'user' => 'root',
		'password' => '',
		'host' => 'localhost',
		'driver' => 'pdo_mysql',
	);

	$entityManager = EntityManager::create($conn, $config);

?>