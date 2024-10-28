<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../vendor/autoload.php';

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../src/Entity'], $isDevMode);

$conn = [
    'dbname' => 'loja',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost:3307',
    'driver' => 'pdo_mysql',
];

// EntityManager
$entityManager = EntityManager::create($conn, $config);
