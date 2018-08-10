<?php
/* Fazendo conex�o com Base de Dados MySQL em PHP */
// A fun��o 'mysqli_connect()', faz a conex�o com o servidor e em seguida com a base de dados
// A fun��o 'mysqli_connect_error()' retorna a mensagem de erro em caso de falha no MySQL

// Vari�veis contendo dados da conex�o

	// Servidor padr�o do MySQL no XAMPP
	$serverName = "localhost";

	// Usu�rio padr�o do MySQL no XAMPP
	$userName = "root";

	// Senha padr�o do MySQL no XAMPP?
	$password = "";
	
	// Nome da base de dados a ser usada
	$database = "meusite";

// Criando conex�o --> A vari�vel '$conn' armazenar� o ID �nico da conex�o
$conn = mysqli_connect($serverName, $userName, $password, $database);

// Testando conex�o e interrompendo se houve falha
if (!$conn) {
    die("Conexao com DB falhou retornando o erro: " . mysqli_connect_error() . "<br><br>");
}

// Corre��o para caracteres acentuados no MySQL
// N�o se esque�a de sempre criar bases de dados no formato "utf8_general_ci"
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

// Descomente a linha abaixo somente para testes. Mantenha-a comentada.
// echo "Conexao com o DB bem sucedida!<br><br>";
?>