<?php
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

    $entityManager = new EntityManager(DriverManager::getConnection($conn, $config), $config);