<?php
  // Incluir o arquivo de conexão
  include 'conexao_mysql.php';

  // Mensagens de feedback
  $mensagem = '';
  $mensagem_link = '';

  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $email = $_POST['email'];
    $usuario = $_POST['username'];
    $senha = $_POST['password'];

    // Insere os dados na tabela "Usuario"
    $sql = "INSERT INTO Usuario (email, username, senha) VALUES ('$email', '$usuario', '$senha')";

    if ($conexao->query($sql) === TRUE) {
      $mensagem = "Usuário cadastrado com sucesso!";
      $mensagem_link = "Clique <a href='login.html'>aqui</a> para retornar à página de login.";
    } else {
      $mensagem = "Erro ao cadastrar usuário: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
  }
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Cadastro de Usuário</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="estilo.css">
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
