<?php
if (isset($_POST['cep'])) {
    $cep = preg_replace('/[^0-9]/', '', $_POST['cep']); // Limpa caracteres não numéricos do CEP

    if (strlen($cep) == 8) {
        // URL da API ViaCEP
        $url = "https://viacep.com.br/ws/{$cep}/json/";

        // Consulta o conteúdo da API
        $response = file_get_contents($url);

        if ($response) {
            $data = json_decode($response, true); // Decodifica o JSON

            // Verifica se o CEP foi encontrado
            if (!isset($data['erro'])) {
                // Monta a resposta HTML com os dados do endereço
                echo "Endereço: " . $data['logradouro'] . ", Bairro: " . $data['bairro'] . ", Cidade: " . $data['localidade'] . ", Estado: " . $data['uf'];
            } else {
                // Retorna uma mensagem de erro se o CEP não for encontrado
                echo "CEP não encontrado";
            }
        } else {
            echo "Erro ao consultar o CEP";
        }
    } else {
        echo "CEP inválido";
    }
} else {
    echo "Nenhum CEP informado";
}


# TESTE EU
#Teste Você