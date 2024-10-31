<?php
// /scripts/cadastroProd.php

require __DIR__ . '/../vendor/autoload.php';
$entityManager = require __DIR__ . '/../config/dbconn.php';

use App\Entity\Produto;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $quantidadeEstoque = $_POST['quantidade'] ?? 0;

    // Cria uma nova inst�ncia de Produto
    $produto = new Produto($nome, $descricao, $preco, $quantidadeEstoque);

    // Persiste e salva o produto no banco de dados
    $entityManager->persist($produto);
    $entityManager->flush();

    echo "Produto cadastrado com sucesso!";
}
?>

<?php
// // Criando um novo produto
// $prod = new Produto();
// $prod->setNome("Sprite");
// $prod->setDescricao("Sprite 2L");
// $prod->setPreco("19.50");
// $prod->setQuantidadeEstoque(100);

// $entityManager->persist($prod);
// $entityManager->flush();

// echo "Produto criado com ID " . $prod->getId() . "\n";

// 
//     require_once __DIR__ . '/../config/db-config.php';
// require "/../src/Entity/Produto.php";
// require "/../src/Repository/ProdutoRepository.php";

// use App\Repository\ProdutoRepository;

// // Criando uma instância do repositório
// $produtoRepository = new ProdutoRepository($entityManager);

// // Chamando a função para salvar um novo produto
// $produto = $produtoRepository->salvarProduto("Sprite", "Sprite 2L", 19.50, 100);

// echo "Produto criado com ID " . $produto->getId() . "\n";