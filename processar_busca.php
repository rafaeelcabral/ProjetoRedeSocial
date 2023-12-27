<?php

    // Incluir o arquivo de conexão
    include 'conexao_mysql.php';

    // Processa o termo de pesquisa
    $username = $_POST['username'];

    // Consulta no banco de dados
    $sql = "SELECT username, email FROM Usuario WHERE username LIKE '%$username%'";
    $result = $conexao->query($sql);

    // Exibe os resultados
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            echo "Nome: " . $row['username'] . "<br>";
            echo "Email: " . $row['email'] . "<br><br>";
        }
    }else{
        echo "Nenhum usuário encontrado.";
    }

    $conexao->close();

?>