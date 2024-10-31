<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity 
 * @ORM\Table(name="produtos")
 */
class Produto {
     /**
     * @ORM\Id 
     * @ORM\GeneratedValue 
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $nome;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $descricao;

    /**
     * @ORM\Column(type="decimal")
     * @var float
     */
    private $preco;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $quantidadeEstoque;

    public function __construct($id = null, $nome = null, $descricao = null, $preco = null, $quantidadeEstoque = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    // Método para exibir informações do produto
    public function exibirInformacoes() {
        return "ID: $this->id, Nome: $this->nome, Descrição: $this->descricao, Preço: R$" . number_format($this->preco, 2, ',', '.') . ", Quantidade em Estoque: $this->quantidadeEstoque";
    }

    // Método para atualizar a quantidade em estoque
    public function atualizarEstoque($quantidade) {
        $this->quantidadeEstoque += $quantidade;
        return "Estoque atualizado para $this->quantidadeEstoque unidades.";
    }

    // Método para aplicar desconto no preço do produto
    public function aplicarDesconto($percentual) {
        if ($percentual > 0 && $percentual <= 100) {
            $this->preco -= $this->preco * ($percentual / 100);
            return "Desconto de $percentual% aplicado. Novo preço: R$" . number_format($this->preco, 2, ',', '.');
        } else {
            return "Percentual de desconto inválido.";
        }
    }

    // Getters e Setters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getQuantidadeEstoque() {
        return $this->quantidadeEstoque;
    }

    public function setQuantidadeEstoque($quantidadeEstoque) {
        $this->quantidadeEstoque = $quantidadeEstoque;
    }
}