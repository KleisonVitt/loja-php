<?php

class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $dataCriacao;
    private $telefone;
    private $endereco;
    private $cidade;
    private $estado;
    private $cep;

    public function __construct($id, $nome, $email, $senha, $telefone = null, $endereco = null, $cidade = null, $estado = null, $cep = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT); // Criptografa a senha
        $this->dataCriacao = date("Y-m-d H:i:s");
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    // Método para exibir informações do usuário
    public function exibirInformacoes() {
        return "ID: $this->id, Nome: $this->nome, Email: $this->email, Criado em: $this->dataCriacao";
    }

    // Método para atualizar a senha
    public function atualizarSenha($novaSenha) {
        $this->senha = password_hash($novaSenha, PASSWORD_DEFAULT);
        return "Senha atualizada com sucesso.";
    }

    // Método para validar o formato do email
    public function validarEmail() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    // Getters e Setters para acessar e atualizar dados específicos
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        if ($this->validarEmail()) {
            $this->email = $email;
        } else {
            return "Email inválido.";
        }
    }

    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }
}