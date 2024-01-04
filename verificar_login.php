<?php
    // Incluir o arquivo de conexão
    include 'conexao_mysql.php';

    // Verifica se o formulário de login foi enviado
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Obtém os valores digitados pelo usuário
        $user = $_POST['username'];
        $senha = $_POST['password'];

        // Consulta SQL para verificar se os dados de login estão corretos
        $sql = "SELECT * FROM Usuario WHERE username = '$user' AND senha = '$senha'";
        $resultado = mysqli_query($conexao, $sql);

        // Verifica se a consulta retornou algum resultado
        if(mysqli_num_rows($resultado) === 1){
            // Obtém o nome do usuário
            $row = mysqli_fetch_assoc($resultado);
            $nomeUsuario = $row['username'];

            // Redireciona para a página inicial
            header("Location: paginainicial.html?nome=$nomeUsuario");
            exit();
        } else{
            // Login inválido, exibe uma mensagem de erro
            echo "Usuário ou senha inválidos";
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conexao);
    }
?>
