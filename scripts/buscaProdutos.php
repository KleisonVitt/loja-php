<?php
require_once __DIR__ . '/../config/db-config.php';
require "/../src/Entity/Produto.php";

use App\Entity\Produto;

// Repositório de produto
$prodRepository = $entityManager->getRepository(Produto::class);

// Buscar todos os produto
$prods = $prodRepository->findAll();

foreach ($prods as $prod) {
    echo $prod->getId() . ' - ' . $prod->getNome() . ' - ' . $prod->getDescricao() . ' - ' . $prod->getPreco() . ' - ' . $prod->getQuantidade() . "</br>";
}
