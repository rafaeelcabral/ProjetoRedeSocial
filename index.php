<!doctype html>
<html lang="pt-br">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Login</title>
  </head>

  <body>

    <form action="scripts/verificar_login.php" method="POST" id="form_login">

      <fieldset>

        <legend><img src="img/rede-social.png"></legend>
      
        <label for="username" style="margin-top: 30px;">Nome de usuário:</label>
        <input type="text" id="username" name="username" placeholder="username" required> <br>

        <label for="password" style="margin-top: 20px;">Senha:</label>
        <input type="password" id="password" name="password" placeholder="password" required> <br><br>

        <?php if(isset($_GET['login']) == true && $_GET['login'] == "error") { ?>

            <div>
              <p class="text-danger" style="text-align: center;">Usuário ou Senha inválidos</p>
            </div>

        <?php } ?>   
        
        <?php if(isset($_GET['login']) == true && $_GET['login'] == "error2") { ?>

            <div>
              <p class="text-danger" style="text-align: center;">Faça Login para acessar a página</p>
            </div>

        <?php } ?>   

        <input type="submit" value="Login" id="botaoEnviar">

      </fieldset>  

    </form>

    <footer class="fixed-bottom">

      <p>Ainda não tem uma conta? <a href="cadastrar.php">Cadastrar</a></p>

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