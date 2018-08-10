<?php
$titulo = "Notícias"; // Título desta página
$css = "css/artigos.css"; // CSS desta página
$botao = "noticias"; // Botão que ficará ativo no menu principal
require ('_header.php'); // Executa o cabeçalho da página
// Conexão com base de dados
require('conn.php');
?>

<div class="parallax-artigos"></div>

<br>
<content align="center">
<?php
// Query que lê artigos na ordem das datas do mais novo para o mais antigo
// Não lê artigos futuros
$sql = "SELECT ID, data, titulo, resumo, imagem, categorias FROM artigos WHERE data <= NOW() AND status = '1' ORDER BY data DESC";

// Executa a query
$res = mysqli_query($conn, $sql);

// Loop para "varrer" artigos
while ($artigo = mysqli_fetch_assoc($res)):

	echo "<div class=\"listArtigo\">\n";
	echo "<img src=\"{$artigo['imagem']}\" alt=\"{$artigo['titulo']}\">\n";
	echo "<h3><a href=\"/leartigo.php?id={$artigo['ID']}\">{$artigo['titulo']}</a></h3>\n";
	echo "<p>{$artigo['resumo']}</p>\n";
	echo "</div>\n\n";

endwhile;

require ('_footer.php');
?>
</content>


