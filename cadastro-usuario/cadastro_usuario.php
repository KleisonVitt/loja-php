<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../config/dbconn.php';

use App\Entity\Usuario;

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'] ?? null;
    $sobrenome = $_POST['sobrenome'] ?? null;
    $cpf = $_POST['cpf'] ?? null;
    $rg = $_POST['rg'] ?? null;
    $email = $_POST['email'] ?? null;
    $telefone = $_POST['telefone'] ?? null;
    $cep = $_POST['cep'] ?? null;
    $endereco = $_POST['endereco'] ?? null;
    $numero = $_POST['numero'] ?? null;
    $bairro = $_POST['bairro'] ?? null;
    $cidade = $_POST['cidade'] ?? null;
    $estado = $_POST['estado'] ?? null;
    $senha = password_hash($_POST['senha'] ?? '', PASSWORD_BCRYPT);

    // Verificação de campos obrigatórios
    if (!$nome || !$sobrenome || !$cpf || !$rg || !$email || !$telefone || !$cep || !$endereco || !$numero || !$bairro || !$cidade || !$estado || !$senha) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Tratamento do upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/'; // Certifique-se de que este diretório existe e é gravável
        if (!is_dir($uploadDir)) {
            echo "Diretório de upload não existe.";
            exit;
        }
        if (!is_writable($uploadDir)) {
            echo "Diretório de upload não é gravável.";
            exit;
        }
        $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
            $imagemPath = $uploadFile;
        } else {
            echo "Erro ao mover o arquivo de upload.";
            exit;
        }
    } else {
        $imagemPath = null;
    }

    $usuario = new Usuario(email: $email, nome: $nome, senha: $senha, telefone: $telefone, endereco: $endereco, cidade: $cidade, estado: $estado, cep: $cep);
    $entityManager->persist($usuario);
    $entityManager->flush();

    echo "sucesso";
} else {
    echo "Método de requisição inválido.";
}
