<?php

  // Incluir o arquivo de conexão
  include 'conexao_mysql.php';

  // Mensagens de feedback
  $mensagem = '';
  $mensagem_link = '';

  // Verifica se o formulário foi enviado
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Recebe os dados do formulário
    $email = $_POST['email'];
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];

    // Insere os dados na tabela "Usuario"
    $sql = "INSERT INTO Usuario (email, username, senha, genero, data_nascimento) VALUES ('$email', '$usuario', '$senha', '$genero', '$data_nascimento')";

    if($conexao->query($sql) === TRUE){
      $mensagem = "Usuário cadastrado com sucesso!";
      $mensagem_link = "Clique <a href='../index.php'>aqui</a> para retornar à página de login.";
    } else{
      $mensagem = "Erro ao cadastrar usuário: " . $conexao->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
  }
?>

<!DOCTYPE html>
<html>

  <head>

    <title>Cadastro de Usuário</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>

      h2{
        padding-left: 20px;
        font-weight: bold;
        color: orange;
      }

      #mensagem{
        width: 30%;
        margin: 80px auto 10px auto;
        padding:30px;
        background: rgba(162, 170, 172, .4);
        border-radius: 20px;
      }

      /* @media para telas "medium" */
      @media (max-width: 992px) {
        #mensagem {
          width: 50%;
        }
      }

      /* @media para telas "small" */
      @media (max-width: 768px) {
        #mensagem {
          width: 70%;
        }
        h2{
          padding-left: 0px;
        }
        p{
          padding-left: 0px;
        }
      }    

    </style>

  </head>

  <body>

    <div id="mensagem">

      <h2>Cadastro de Usuário</h2>

      <p><?php echo $mensagem; ?></p><br>
      <hr>

      <p><?php echo $mensagem_link; ?></p>
      <hr>

    </div>  

  </body>

</html>
