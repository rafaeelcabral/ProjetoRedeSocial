<?php

    include "conexao_mysql.php";

    session_start();

    // Consulta SQL para verificar se o username existe e recuperar o id dele
    $username = $_POST['username'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $resultado = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($resultado) === 1){
        $row = mysqli_fetch_assoc($resultado);
        $id_user_destinatario = $row["user_id"];
    }else {
        header("Location:../chat.php?mensagem=erro1");
        exit();
    }

    // Obtém os valores digitados pelo usuário
    $id_user_remetente = $_SESSION["user_id"];
    $mensagem = $_POST["mensagem"];

    // Insere os dados na tabela "Usuario"
    $sql = "INSERT INTO messages (id_remetente, id_destinatario, mensagem) VALUES ('$id_user_remetente', '$id_user_destinatario', '$mensagem')";

    if($conexao->query($sql) === TRUE){
        header("Location: ../chat.php?mensagem=sucesso");
    } else{
        header("Location:../chat.php?mensagem=erro2");
        exit();
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);

?>