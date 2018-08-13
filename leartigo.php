
<?php
$titulo = "Notícias"; // Título desta página
$css = "css/artigos.css"; // CSS desta página
$botao = "noticias"; // Botão que ficará ativo no menu principal
require ('_header.php'); // Executa o cabeçalho da página
// Conexão com base de dados
require('conn.php');
?>

<content align="center">
<?php
// Obtém ID do artigo solicitado
if(isset($_GET['id'])) {
	$id = intval($_GET['id']);
} else {
	header('Location: /listartigos.php');
}

// Conexão com base de dados
require('conn.php');

// Query que lê o artigo, mas somente dentro da data e com status válido
$sql = "SELECT *, DATE_FORMAT(data, '%d\/%m\/%Y \à\s %H:%i') AS databr FROM artigos WHERE id = '{$id}' AND data < NOW() and status = '1'";

// Executa a query
$res = mysqli_query($conn, $sql);

// Loop para "varrer" artigos
$artigo = mysqli_fetch_assoc($res);

// Lista de categorias em um array
$cat = explode(",", $artigo['categorias']);


echo "<h2>{$artigo['titulo']}</h2>\n";
echo "<p><i>Por {$artigo['autor']} em {$artigo['databr']}.</i></p>\n";
echo "<div class=\"textoArtigo\">{$artigo['texto']}</div>\n";
echo "<ul>\n";
foreach($cat AS $listCat) {
	$listCat = trim($listCat);
	echo "{$listCat}\n";
}
echo "</ul>\n";
echo "<p><a href=\"\listartigos.php\">Voltar</a></p>\n";
?>

<?php

require ('_footer.php');
?>
</content>