

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
		@mail($mailDestinatario, $mailMensagem, $mailHeader);

		/////////////////////////////////////////
		// Armazena mensagem no banco de dados //
		/////////////////////////////////////////

		// Conectando com a base de dados
		require('conn.php');

		// Preparando query
		$sql = "INSERT INTO `contatos` (`id`, `nome`, `email`, `sugestao`, `data`, `status`) VALUES (NULL, '{$nome}', '{$email}', '{$mensagem}', NOW(), '1');";

		// Executando query
		if (mysqli_query($conn, $sql)) {

			// Ativa mensagem de sucesso
			$sucesso = true;

			// Esvazia campos já preenchidos
			$nome = '';
			$email = '';
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
$modalTitle = "";
$modalBody = "";
// Exibe as mensagens de erro caso elas existam
if($erro != ''):
	$modalTitle = "Ooops!";
	$modalBody = "<p>Ocorreram erros que impedem o envio da mensagem:</p>";
	$modalBody .= "<ul>{$erro}</ul>";
	$modalBody .= "<p>Por favor, corrija os erros e tente novamente.</p>";
endif;

if($sucesso):
	$modalTitle = "Obrigado!";
	$modalBody = "<p>Seu contato foi enviado com sucesso...</p>";
endif;	
?>

<div id="myModal" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2><?php echo $modalTitle ?></h2>
		</div>
		<div class="modal-body"><?php echo $modalBody ?></div>
		<!-- div class="modal-footer"><h3>Modal Footer</h3></div -->
	</div>
</div>

<?php if($erro != '' OR $sucesso): ?>
	<script>
	var modal = document.getElementById('myModal');
	modal.style.display = "block";
	</script>
<?php endif; ?>
<main align="center">
<h2>Envie uma sugestão</h2>
<p>Preencha corretamente o formulário abaixo para enviar uma sugestão.</p>

<p>
	<label for="nome">Nome:</label>
	<input type="text" name="nome" id="nome" placeholder="Seu nome completo" value="<?php echo $nome ?>">
</p>
<p>
	<label for="email">E-mail:</label>
	<input type="text" name="email" id="email" placeholder="Seu e-mail válido" value="<?php echo $email ?>">
</p>
<p>
	<label for="mensagem">Sugestão:</label>
	<textarea name="mensagem" id="mensagem" placeholder="Sua mensagem"><?php echo $mensagem ?></textarea>
</p>
<p>
	<label></label>
	<button type="submit">Enviar</button>
	<small> ← Clique somente uma vez no botão</small>
</p>

</form>
</main>
<script>
// Get the modal


// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
//btn.onclick = function() {
    // modal.style.display = "block";
//}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php
require ('_footer.php');
?>