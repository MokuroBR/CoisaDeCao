<?php
/* Fazendo conexão com Base de Dados MySQL em PHP */
// A função 'mysqli_connect()', faz a conexão com o servidor e em seguida com a base de dados
// A função 'mysqli_connect_error()' retorna a mensagem de erro em caso de falha no MySQL

// Variáveis contendo dados da conexão

	// Servidor padrão do MySQL no XAMPP
	$serverName = "localhost";

	// Usuário padrão do MySQL no XAMPP
	$userName = "root";

	// Senha padrão do MySQL no XAMPP?
	$password = "";
	
	// Nome da base de dados a ser usada
	$database = "meusite";

// Criando conexão --> A variável '$conn' armazenará o ID único da conexão
$conn = mysqli_connect($serverName, $userName, $password, $database);

// Testando conexão e interrompendo se houve falha
if (!$conn) {
    die("Conexao com DB falhou retornando o erro: " . mysqli_connect_error() . "<br><br>");
}

// Correção para caracteres acentuados no MySQL
// Não se esqueça de sempre criar bases de dados no formato "utf8_general_ci"
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

// Descomente a linha abaixo somente para testes. Mantenha-a comentada.
// echo "Conexao com o DB bem sucedida!<br><br>";
?>