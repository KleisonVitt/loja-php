<?php
require_once __DIR__ . '/../config/db-config.php';
require "/../src/Entity/Produto.php";

use App\Entity\Produto;

// Encontrando o produto
$prodId = 2; // ID do produto a ser deletado
$prod = $entityManager->find(Produto::class, $prodId);

if ($prod) {
    $entityManager->remove($prod);
    $entityManager->flush();
    echo "Produto deletado com sucesso.\n";
} else {
    echo "Produto não encontrado.\n";
}
