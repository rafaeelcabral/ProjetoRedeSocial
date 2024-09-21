<!doctype html>
<html lang="pt-br">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Se Cadastre</title>
  </head>

  <body>

    <form action="scripts/cadastrar_usuario.php" method="POST">

      <fieldset>

        <br>

        <label for="email" style="margin-top: 20px;">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="genero">Gênero:</label>
        <select id="genero" name="genero">
          <option value="masculino">Masculino</option>
          <option value="feminino">Feminino</option>
        </select>

        <label for="data_nascimento" id="label_data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento"> 

        <label for="username">Nome de usuário:</label>
        <input type="text" name="username" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" required> <br><br>

        <input type="submit" value="Cadastrar" id="botaoEnviar">

      </fieldset>

    </form> 

    <footer>

      <p>Já tem uma conta? <a href="index.php">Login</a></p>

    </footer>  

    <!-- Optional JavaScript -->
    <!-- jQuery first-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!--Popper.js-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--Bootstrap JS-->
    <script src="js/bootstrap.min.js"></script>

  </body>

</html>