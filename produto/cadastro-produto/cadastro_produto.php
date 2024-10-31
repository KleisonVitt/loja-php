<?php
// /cadastro/cadastro_produto.php
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <!-- Adicionando o Bootstrap via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Cadastro de Produto</h2>
        <form id="produtoForm" action="../scripts/cadastroProd.php" method="POST" class="border p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input type="number" id="preco" name="preco" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade em Estoque:</label>
                <input type="number" id="quantidade" name="quantidade" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
        </form>
    </div>

    <!-- Bootstrap JS e dependências Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
        document.getElementById("produtoForm").addEventListener("submit", function(event) {
            const preco = document.getElementById("preco").value;
            const quantidade = document.getElementById("quantidade").value;

            if (preco <= 0 || quantidade <= 0) {
                alert("Preço e Quantidade devem ser maiores que zero.");
                event.preventDefault(); // Cancela o envio do formulário
            }
        });
    </script>
</body>

</html>