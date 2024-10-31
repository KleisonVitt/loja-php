<?php
include('../connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT id, nome, sobrenome, senha, imagem FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows() > 0) {
        $stmt->bind_result($id, $nome, $sobrenome, $hash, $imagem);
        $stmt->fetch();

        if (password_verify($senha, $hash)) {
            $_SESSION["validateLogin"] = true;
            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_nome'] = $nome . ' ' . $sobrenome;
            $_SESSION['usuario_imagem'] = $imagem;

            echo 'Login efetuado com sucesso';
        } else {
            echo 'Usuario ou senha incorretos';
        }
    } else {
        echo "Usuario ou senha incorretos";
    }

    $stmt->close();
    $conn->close();
}
?>