<?php

  session_start();

  if(isset($_SESSION['autenticado']) == false || $_SESSION['autenticado'] == false) {
    header("Location: login.php?login=error2");
    exit();
  }

?>

<!doctype html>
<html lang="pt-br">

  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="estilo-paginainicial.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Página Inicial</title>

  </head>

  <body>

    <div id="container">
      <header>
        <nav class="navbar navbar-expand-lg">

          <a class="navbar-brand" href="#">
            <img src="img/rede-social.png" id="logo">
          </a>

          <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
            <img src="img/navbartoogler.png" style="width: 50px; height: 50px;">
          </button>

          <div class="collapse navbar-collapse" id="menu">

            <div class="dropdown-divider"></div>

            <!-- formulário -->
            <form class="form-inline" action="processar_busca.php" method="post">
              <input type="text" id="username" name="username" class="form-control mr-1" placeholder="Pesquisar Usuário">
              <button>
                <img src="img/lupa.png">
              </button>
            </form>
            <!-- fim do formulário -->

            <div class="dropdown-divider"></div>

            <ul class="navbar-nav">
              <li class="nav-item active pr-3">
                <a class="nav-link" href="paginainicial.php">Meu perfil</a>
              </li>

              <div class="dropdown-divider"></div>

              <li class="nav-item active pr-3">
                <a class="nav-link" href="paginainicial.php">Home</a>
              </li>

              <div class="dropdown-divider"></div>

              <li class="nav-item pr-3">
                <a class="nav-link" href="">Chat</a>
              </li>

              <div class="dropdown-divider"></div>

              <li class="nav-item pr-3">
                <a class="nav-link" href="">Notificações</a> 
              </li>

              <div class="dropdown-divider"></div>
                
              <li class="nav-item pr-3">
                <a class="nav-link" href="login.html"><img src="img/logout.png" id="logout"></a>
              </li>
            </ul>

          </div>

        </nav>  
      </header>

      <section>

        <div id="resultado_busca">

          <h2>Resultados da Busca</h2>

          <?php if(isset($_GET['resultado']) == true && $_GET['resultado'] == "empty") { ?>

            <p>Nenhum resultado foi encontrado.</p>

          <?php } else { ?>

            <?php
              // Incluir o arquivo de conexão
              include 'conexao_mysql.php';

              // Processa o termo de pesquisa
              $busca = urldecode($_GET['busca']);

              // Consulta no banco de dados
              $sql = "SELECT username, email FROM Usuario WHERE username LIKE '%$busca%'";
              $result = $conexao->query($sql);

              // Exibe os resultados
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  echo"<hr>";
                  echo "<br><p>Nome: " . $row['username'] . "</p>";
                  echo "<p>Email: " . $row['email'] . "</p><br>";
                }
              } else{
                echo "<p>Nenhum usuário encontrado.</p>"; 
              }           
            ?>

          <?php } ?>  
              
        </div>

      </section>

      <footer>
        <p>Todos os direitos reservados ©️</p>
      </footer>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!--Popper.js-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--Bootstrap JS-->
    <script src="js/bootstrap.min.js"></script>

  </body>

</html>