<?php
// src/Entity/Produto.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "produtos")]
class Produto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $nome;

    #[ORM\Column(type: "text")]
    private string $descricao;

    #[ORM\Column(type: "decimal", scale: 2)]
    private float $preco;

    #[ORM\Column(name: "quantidade_estoque", type: "integer")]
    private int $quantidadeEstoque;

    // Construtor
    public function __construct(string $nome, string $descricao, float $preco, int $quantidadeEstoque)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->quantidadeEstoque = $quantidadeEstoque;
    }
}
