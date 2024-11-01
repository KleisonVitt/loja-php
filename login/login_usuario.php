<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../config/dbconn.php';

use App\Entity\Usuario;

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Buscar usuário pelo email
    $user = $entityManager->getRepository(Usuario::class)->findOneBy(['email' => $email]);

    if ($user !== null) {
        $hash = password_hash('123123', PASSWORD_BCRYPT);
        

        if (password_verify($senha, $hash)) {
            // Extrair informações do usuário para armazenar na sessão
            $_SESSION["validateLogin"] = true;
            $_SESSION['usuario_id'] = $user->getId();
            $_SESSION['usuario_nome'] = $user->getNome();

            echo 'Login efetuado com sucesso';
        } else {
            echo 'Usuário ou senha incorretos3';
        }
    } else {
        echo "Usuário ou senha incorretos2";
    }
}

// Função de alerta para depuração
function alertTeste($message)
{
    echo "<script>alert('$message');</script>";
}
