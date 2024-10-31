<?php
require_once __DIR__ . '/../config/db-config.php';
require "/../src/Entity/Produto.php";

use App\Entity\Produto;

// Encontrando o produto
$prodId = 1; // ID do produto a ser atualizado
$prod = $entityManager->find(Produto::class, $prodId);

if ($prod) {
    $prod->setNome('Bolacha Oreo');
    $entityManager->flush();
    echo "Produto atualizado com sucesso.\n";
} else {
    echo "Produto não encontrado.\n";
}
