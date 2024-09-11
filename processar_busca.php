<?php

    // Incluir o arquivo de conexão
    include 'conexao_mysql.php';

    // Processa o termo de pesquisa
    $username = $_POST['username'];

    // Consulta no banco de dados
    $sql = "SELECT username, email FROM Usuario WHERE username LIKE '%$username%'";
    $result = $conexao->query($sql);

    // Exibe os resultados
    if($result->num_rows > 0){
        // Redireciona para a página de resultados com o termo de pesquisa
        header("Location: resultado_busca.php?busca=" . urlencode($username));
    } else{
        header("Location: resultado_busca.php?resultado=empty");
    }

    $conexao->close();

?>