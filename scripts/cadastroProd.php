<?php
require_once __DIR__ . '/../config/db-config.php';
require "/../src/Entity/Produto.php";

use App\Entity\Produto;

// // Criando um novo produto
// $prod = new Produto();
// $prod->setNome("Sprite");
// $prod->setDescricao("Sprite 2L");
// $prod->setPreco("19.50");
// $prod->setQuantidadeEstoque(100);

// $entityManager->persist($prod);
// $entityManager->flush();

// echo "Produto criado com ID " . $prod->getId() . "\n";


public function salvarProduto(string $nome, string $descricao, float $preco, int $quantidadeEstoque): Produto
    {
        // Criando uma nova instância de Produto
        $produto = new Produto();
        $produto->setNome($nome);
        $produto->setDescricao($descricao);
        $produto->setPreco($preco);
        $produto->setQuantidadeEstoque($quantidadeEstoque);

        // Persistindo a entidade no banco de dados
        $this->entityManager->persist($produto);
        $this->entityManager->flush();

        return $produto;
    }

//     <?php
//     require_once __DIR__ . '/../config/db-config.php';
// require "/../src/Entity/Produto.php";
// require "/../src/Repository/ProdutoRepository.php";

// use App\Repository\ProdutoRepository;

// // Criando uma instância do repositório
// $produtoRepository = new ProdutoRepository($entityManager);

// // Chamando a função para salvar um novo produto
// $produto = $produtoRepository->salvarProduto("Sprite", "Sprite 2L", 19.50, 100);

// echo "Produto criado com ID " . $produto->getId() . "\n";