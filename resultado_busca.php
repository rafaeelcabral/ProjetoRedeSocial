<!doctype html>
<html lang="pt-br">

  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Página Inicial</title>

    <style>

      body{
        background: rgba(162, 170, 172, .4);
      } 

      header{
        background: url(img/fundo.jpg);
      }

    </style>

  </head>

  <body>

    <header class="navbar navbar-expand-lg navbar-dark header with-bg-image">

      <a class="navbar-brand" href="paginainicial.html"><img src="img/rede-social.png" style="height: 60px; width: 60px;"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">

        <!-- formulário -->
        <form class="form-inline ml-auto" action="processar_busca.php" method="post">
          <input type="text" id="username" name="username" class="form-control mr-1" placeholder="Pesquisar Usuário" style="width:400px;">
          <button>
            <img src="img/lupa.png" style="width: 25px; height: 25px; cursor: pointer;">
          </button>
        </form>
        <!-- fim do formulário -->

          <ul class="navbar-nav ml-auto">
            <li class="nav-item active p-2">
              <a class="nav-link" href="#">Home &nbsp; &nbsp; &nbsp; |</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="">Chat &nbsp; &nbsp; &nbsp; |</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="">Notificações &nbsp; &nbsp; &nbsp; |</a> 
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="login.html"><img src="img/power.png" style="width: 40px; height: 30px;"></a>
            </li>
          </ul>

      </div>

    </header>  

    <div class="container mt-4">
        <h2>Resultados da Busca</h2>
        <div id="resultado_busca">

            <?php
                // Incluir o arquivo de conexão
                include 'conexao_mysql.php';

                // Processa o termo de pesquisa
                $username = urldecode($_GET['busca']);

                // Consulta no banco de dados
                $sql = "SELECT username, email FROM Usuario WHERE username LIKE '%$username%'";
                $result = $conexao->query($sql);

                // Exibe os resultados
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>Nome: " . $row['username'] . "<br>";
                        echo "Email: " . $row['email'] . "</p>";
                    }
                } else {
                    echo "<p>Nenhum usuário encontrado.</p>";
                }           
            ?>
            
        </div>
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