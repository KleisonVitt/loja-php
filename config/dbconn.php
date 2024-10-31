<?php
// config/dbconn.php

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/../vendor/autoload.php';

$isDevMode = true;
$config = ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/../src/Entity'], $isDevMode);

$conn = [
    'dbname' => 'loja',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost:3307',
    'driver' => 'pdo_mysql'
];

// Criação do EntityManager
$entityManager = new EntityManager(DriverManager::getConnection($conn, $config), $config);

// Retorna o EntityManager para ser usado em outros arquivos
return $entityManager;
