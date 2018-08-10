<?php
///////////////////
// Página Modelo //
///////////////////
/*
	Esta página serve de modelo para todas as outras páginas do site.

	Dica: só crie as outras página quando esta estiver totalmente pronta e funcional.

	Passos:

		1. Faça uma cópia desta página;
		2. Renomeie com o nome da nova página;
		3. Altere os valores das variáveis:
			• $titulo --> Define o nome desta página especificamente, na tag <title>...</title>
			• $botao --> Define o botão do menu principal que ficará ativo
			• $css --> Arquivo CSS específico desta página
		4. Altere o conteúdo da página que está entre os dois "require"
			• Você pode usar tanto HTML quando PHP neste conteúdo
		5. Salve a página e teste

*/

////////////////////////////
// Controlando as páginas //
////////////////////////////
/*
	Observe as variáveis no arquivo "_header.php"!
*/

///////////////////////////////////////////////////////////////////////////
// Define o nome desta página especificamente, na tag <title>...</title> //
///////////////////////////////////////////////////////////////////////////
/*
	Por exemplo, ao criar a página de contatos faça:
		$titulo = "Faça Contato";
	Para que a tag <title>...</title> fique como:
		<title>Nome do Site - </title>
*/
$titulo = "Página Modelo";

///////////////////////////////////////////////////////
// Define o botão do menu principal que ficará ativo //
///////////////////////////////////////////////////////
/*
	Atribui a classe ".navActive" (ver /css/global.css) ao botão do menu que 
	tiver o valor de $botao. Valores possíveis no exemplo são:

	 • "home" --> quando estiver na página "index.php" ou páginas relacionadas
	 • "noticias" --> quando estiver na página "noticias.php" ou páginas relacionadas
	 • "artigos" --> quando estiver na página "artigos.php" ou páginas relacionadas
	 • "contatos" --> quando estiver na página "contatos.php" ou páginas relacionadas
	 • "sobre" --> quando estiver na página "sobre.php" ou páginas relacionadas

	Dica: Estude o menu principal no arquivo "_header.php" para entender.
*/
$botao = "";

/////////////////////////////////
// CSS específico desta página //
/////////////////////////////////
/*
	Caso você use um CSS diferente para cada página, pode tornar a carga dele
	mais dinâmica. Altere o valor de $css para o endereço do arquivo CSS da 
	página, como por exemplo:

	 • $css = "/css/index.css" --> CSS da página "index.php" ou páginas relacionadas
	 • $css = "/css/noticias.css" --> CSS da página "noticias.php" ou páginas relacionadas
	 • $css = "/css/artigos.css" --> CSS da página "artigos.php" ou páginas relacionadas
	 • $css = "/css/contatos.css" --> CSS da página "contatos.php" ou páginas relacionadas
	 • $css = "/css/sobre.css" --> CSS da página "sobre.php" ou páginas relacionadas
*/
$css = "/css/index.css";

///////////////////////////////////
// Executa o cabeçalho da página //
///////////////////////////////////
require ('_header.php'); 
?>

<h2>Página modelo. Altere isso como quiser!</h2>
<p>Blá blá blá blá blá blá blá blá blá blá blá blá blá blá</p>

<?php
////////////////////////////////
// Executa o rodapé da página //
////////////////////////////////
require ('_footer.php');
?>