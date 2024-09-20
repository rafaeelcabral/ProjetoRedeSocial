<?php
    session_start();

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

            // Autenticação
            $row = mysqli_fetch_assoc($resultado);
            $_SESSION['autenticado'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user'] = $row['username'];
            $_SESSION['genero'] = $row['genero'];
            $_SESSION['data_nascimento'] = $row['data_nascimento'];
            $_SESSION['img'] = $row['profile_img'];

            // Redireciona para a página inicial
            header("Location: ../perfil.php");
            exit();

        } else{
            // Login inválido, exibe uma mensagem de erro
            $_SESSION['autenticado'] = false;
            header("Location: ../index.php?login=error");
            exit();
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conexao);
    }
?>
