

<?php
$titulo = "Faça Contato"; // Título desta página
$css = "css/global.css"; // CSS desta página
$botao = "contatos"; // Botão que ficará ativo no menu principal
require ('_header.php'); // Executa o cabeçalho da página
?>

<div class="parallax-contato"></div>
<?php
// Processamento do formulário

// Função que sanitiza os dados do formulário antes de processar
function sanitize($v) {
	$v = trim($v); // removendo espaços
	$v = stripslashes($v); // removendo aspas
	$v = htmlspecialchars($v); // removendo caracteres perigosos
	return $v;
}

// Inicializando variáveis que contém valores dos campos
$nome = '';
$email = '';
$assunto = '';
$mensagem = '';

// Inicializando variável que contém mensagens de erro
$erro = '';

// Inicializando variável que exibe mensagem de sucesso
$sucesso = false;

// Testa se o form foi enviado
if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {

	// Sanitizando dados vindos do form
	$nome = sanitize($_POST['nome']);
	$email = sanitize($_POST['email']);
	$assunto = sanitize($_POST['assunto']);
	$mensagem = sanitize($_POST['mensagem']);

	// Validando 'nome'
	if (strlen($nome) < 3) {
		$erro .= "<li>O nome deve ter pelo menos 3 caracteres.</li>";
	} else {
		// testa se o nome só contém letras e espaços
		if (!preg_match("/^[a-zA-ZÀ-ÿ ]*$/", $nome)) {
			$erro .= "<li>Seu nome deve conter apenas letras e espaços.</li>"; 
		}
	}

	// Validando 'email'
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$erro .= "<li>Seu e-mail não é válido.</li>"; 
	}

	// Validando 'assunto' que deve ter pelo menos 3 caracteres quaisquer
	$contaAssunto = strlen($assunto);
	if ($contaAssunto == 0) {
		$erro .= "<li>Escreva um assunto para o contato.</li>";
	} elseif ($contaAssunto < 3) {
		$erro .= "<li>O assunto está muito curto.</li>";
	}

	// Validando 'mensagem' que deve ter pelo menos 5 caracteres quaisquer
	$contaMensagem = strlen($mensagem);
	if ($contaMensagem == 0) {
		$erro .= "<li>Escreva uma mensagem para o contato.</li>";
	} elseif ($contaMensagem < 5) {
		$erro .= "<li>A mensagem está muito curta.</li>";
	}

	// Se não ocorreram erros:
	if ($erro == '') {

		///////////////////////////////////////////////////
		// Enviando mensagem por e-mail ao administrador //
		///////////////////////////////////////////////////

		// Destinatários do e-mail
		// Pode ter mais de um, separando com vírgula
		$mailDestinatario = "email1@servidor.com, email2@servidor.com";

		// Assunto do e-mail
		$mailAssunto = "Formulário de Contatos de 'MeuSite'";

		// Mensagem a ser enviada
		$mailMensagem = "
		<!DOCTYPE html>
		<html lang=\"pt-br\">
		<head><title>Formulário de Contatos de 'MeuSite'</title></head>
		<body>
		<p><i>Olá!</i></p>
		<p>O formulário de contatos de 'MeuSite' foi enviado:</p>
		<ul>
		<li><b>Nome:</b> {$nome}</li>
		<li><b>E-mail:</b> {$email}</li>
		<li><b>Assunto:</b> {$assunto}</li>
		</ul>
		<hr><pre>{$mensagem}</pre><hr>
		</body></html>
		";

		// Cabeçalhos do e-mail (observe o "\r\n" no final de cada linha!)

		// Conteúdo será em HTML
		$mailHeader = "MIME-Version: 1.0" . "\r\n";
		$mailHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// Remetende do e-mail
		$mailHeader .= 'From: <root@localhost>' . "\r\n";

		// Enviando e-mail
		// Lembre-se que o XAMPP não envia e-mail
		// O '@' antes da função 'mail()' evita que essa gere mensagem de erro no XAMPP
		@mail($mailDestinatario, $mailAssunto, $mailMensagem, $mailHeader);

		/////////////////////////////////////////
		// Armazena mensagem no banco de dados //
		/////////////////////////////////////////

		// Conectando com a base de dados
		require('conn.php');

		// Preparando query
		$sql = "INSERT INTO `contatos` (`id`, `nome`, `email`, `assunto`, `mensagem`, `data`, `status`) VALUES (NULL, '{$nome}', '{$email}', '{$assunto}', '{$mensagem}', NOW(), '1');";

		// Executando query
		if (mysqli_query($conn, $sql)) {

			// Ativa mensagem de sucesso
			$sucesso = true;

			// Esvazia campos já preenchidos
			$nome = '';
			$email = '';
			$assunto = '';
			$mensagem = '';

		} else {

			// Falhou em gravar no banco de dados
			$erro = "<li>Ocorreu erro ao gravar sua mensagem no banco de dados.</li>";

		}

	}

}

?>

<form name="contatos" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

<?php
// Exibe as mensagens de erro caso elas existam
if($erro != '') {
	echo "<div class=\"erro\">";
	echo "<h3>Ooops!</h3>";
	echo "<p>Ocorreram erros que impedem o envio da mensagem:</p>";
	echo "<ul>{$erro}</ul>";
	echo "<p>Por favor, corrija os erros e tente novamente.</p>";
	echo "</div>";
}

// Exibe mensagem de sucesso
if($sucesso) {
	echo "<div class=\"sucesso\">";
	echo "<h3>Obrigado!</h3>";
	echo "<p>Seu contato foi enviado com sucesso...</p>";
	echo "</div>";	
}
?>

<h2>Faça Contato</h2>
<p>Preencha corretamente o formulário abaixo para entrar em contato conosco.</p>

<p>
	<label for="nome">Nome:</label>
	<input type="text" name="nome" id="nome" placeholder="Seu nome completo" value="<?php echo $nome ?>">
</p>
<p>
	<label for="email">E-mail:</label>
	<input type="text" name="email" id="email" placeholder="Seu e-mail válido" value="<?php echo $email ?>">
</p>
<p>
	<label for="assunto">Assunto:</label>
	<input type="text" name="assunto" id="assunto" placeholder="Assunto da mensagem" value="<?php echo $assunto ?>">
</p>
<p>
	<label for="mensagem">Mensagem:</label>
	<textarea name="mensagem" id="mensagem" placeholder="Sua mensagem"><?php echo $mensagem ?></textarea>
</p>
<p>
	<label></label>
	<button type="submit">Enviar</button>
	<small> ← Clique somente uma vez no botão</small>
</p>

</form>
</main>

<?php
require ('_footer.php');
?>