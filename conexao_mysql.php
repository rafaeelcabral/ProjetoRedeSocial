<?php
  // Dados de conexão com o banco de dados
  $servername = "localhost"; // endereço do servidor
  $username = "root"; // nome de usuário do banco de dados
  $password = ""; // senha do banco de dados
  $dbname = "ProjetoRedeSocial"; // nome do banco de dados

  // Cria a conexão com o banco de dados
  $conexao = new mysqli($servername, $username, $password, $dbname);

  // Verifica se houve erro na conexão
  if ($conexao === false) {
    die("Erro de conexão com o banco de dados: " . mysqli_connect_error());
  }