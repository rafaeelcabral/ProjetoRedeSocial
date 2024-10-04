<?php

  session_start();

  if(isset($_SESSION['autenticado']) == false || $_SESSION['autenticado'] == false) {
    header("Location: index.php?login=error2");
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
    <link rel="stylesheet" href="css/estilo-paginainicial.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>

        /* Estilos para o modal */
        .modal {
            display: none; /* Modal oculto por padrão */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 150px auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #mensagens {
            margin: 20px;
            padding: 15px;
            border: 5px solid gold;
        }

        #mensagens p {
            font-size: 25px;
            font-weight: bold;
            color: navy;
        }

    </style>

    <title>Chat</title>

  </head>

    <body>

        <div id="container">
            <header>
                <nav class="navbar navbar-expand-lg">

                    <a class="navbar-brand" href="paginainicial.php">
                    <img src="img/rede-social.png" id="logo">
                    </a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                    <img src="img/navbartoogler.png" style="width: 50px; height: 50px;">
                    </button>

                    <div class="collapse navbar-collapse" id="menu">

                    <div class="dropdown-divider"></div>

                    <!-- formulário -->
                    <form class="form-inline" action="scripts/processar_busca.php" method="post">
                        <input type="text" id="username" name="username" class="form-control mr-1" placeholder="Pesquisar Usuário">
                        <button>
                        <img src="img/lupa.png">
                        </button>
                    </form>
                    <!-- fim do formulário -->

                    <div class="dropdown-divider"></div>

                    <ul class="navbar-nav">
                        <li class="nav-item active pr-3">
                            <a class="nav-link" href="perfil.php">Meu perfil</a>
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
                            <a class="nav-link" href="scripts/logout.php"><img src="img/logout.png" id="logout"></a>
                        </li>
                    </ul>
                </nav>  
            </header>

            <section>

                <!-- Botão que abre o modal -->
                <button id="openModalBtn" style="margin: 20px; cursor:pointer;">Enviar Mensagem</button>

                <!-- Estrutura do modal -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <div class="close" style="width: 35px;">&times;</div><br>
                        <p>Envie uma Mensagem</p>
                        <form action="scripts/inserir_mensagem_banco.php" method="post">
                            <input type="text" id="username" name="username" placeholder="Destinatário" style="width: 150px;" required>
                            <br><br>
                            <input type="textarea" id="mensagem" name="mensagem" placeholder="Mensagem" style="width: 450px;" required>
                            <br><br>
                            <button type="submit" style="cursor:pointer">Enviar</button>
                        </form>
                    </div>
                </div>

                <!-- Mensagem de Erro Ususario nao encontrado -->
                <?php if(isset($_GET['mensagem']) == true && $_GET['mensagem'] == "erro1") {?>
                    <div>
                        <b><p class="text-warning" style="text-align: center;">Usuário não encontrado</p></b>
                    </div>
                <?php } ?> 

                <!-- Mensagem de Erro Ususario nao encontrado -->
                <?php if(isset($_GET['mensagem']) == true && $_GET['mensagem'] == "erro1") {?>
                    <div>
                        <b><p class="text-warning" style="text-align: center;">Falha na Conexão com o Banco</p></b>
                    </div>
                <?php } ?> 

                <!-- Mensagem de Sucesso ao enviar a mensagem -->
                <?php if(isset($_GET['mensagem']) == true && $_GET['mensagem'] == "sucesso") {?>
                    <div>
                        <b><p class="text-success" style="text-align: center;">Mensagem enviada com Sucesso!</p></b>
                    </div>
                <?php }?>

                <!-- Lista de Conversas -->
                <?php
                    include "scripts/conexao_mysql.php";

                    $meu_id = $_SESSION['user_id'];
                    
                    //Detectando as Mensagens q tenham meu id
                    $sql = "SELECT * FROM messages WHERE id_destinatario = '$meu_id'";
                    $resultado = mysqli_query($conexao, $sql);

                    //Abrindo Laço de Repetição para exibir as divs de acordo com o nº de Linhas
                    $cont = 0;
                    while($cont < mysqli_num_rows($resultado)) {
                        //Pegando de $resultado <=> Tabela "mensagens"
                        $row = mysqli_fetch_assoc($resultado);
                        $id_remetente = $row["id_remetente"];
                        $mensagem = $row["mensagem"];

                        //Pegando de $resultado2 <=> Tabela "usuario"
                        $sql2 = "SELECT * FROM users WHERE user_id = $id_remetente";
                        $resultado2 = mysqli_query($conexao, $sql2);
                        $row2 = mysqli_fetch_assoc($resultado2);
                        $user_remetente = $row2["username"];
                ?>
                        <div id="mensagens">
                            <br>
                            <p>Remetente => <?= $user_remetente ?></p>
                            <br>
                            <p>Mensagem => <?= $mensagem ?></p>
                            <br>
                        </div>
                <?php 
                        $cont++;
                    } 
                ?>   
                        
            </section>

            <footer>
                <p>Todos os direitos reservados ©️</p>
            </footer>
        </div>

        <!-- jQuery first-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!--Popper.js-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!--Bootstrap JS-->
        <script src="js/bootstrap.min.js"></script>
        <!-- Optional JavaScript -->
        <script>
            // JavaScript para abrir e fechar o modal
            var modal = document.getElementById("myModal");
            var btn = document.getElementById("openModalBtn");
            var span = document.getElementsByClassName("close")[0];

            // Abrir o modal ao clicar no botão
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // Fechar o modal ao clicar no "x"
            span.onclick = function() {
                modal.style.display = "none";
            }

            // Fechar o modal se clicar fora dele
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

    </body>

</html>