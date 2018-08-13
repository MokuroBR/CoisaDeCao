<?php
if($_SERVER['SERVER_NAME'] == 'localhost') {
   header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
   header('Cache-Control: no-store, no-cache, must-revalidate');
   header('Cache-Control: post-check=0, pre-check=0', FALSE);
   header('Pragma: no-cache');
}
?>
<!DOCTYPE html>
<?php if($_SERVER['SERVER_NAME'] == 'localhost'): ?>
    <html manifest="manifest.appcache">
<?php else: ?>
    <html lang="pt-br">
<?php endif ?>
<head>
	<title>Coisa de Cão <?php echo $titulo; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="css/favicon.ico">
	<link rel="icon" href="css/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="normalize" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/global.css?<?php if($_SERVER['SERVER_NAME'] == 'localhost') echo rand() ?>">
	<link rel="stylesheet" href="<?php echo $css; ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){

jQuery("#subirTopo").hide();

jQuery('a#subirTopo').click(function () {
         jQuery('body,html').animate({
           scrollTop: 0
         }, 800);
        return false;
   });

jQuery(window).scroll(function () {
         if (jQuery(this).scrollTop() > 1000) {
            jQuery('#subirTopo').fadeIn();
         } else {
            jQuery('#subirTopo').fadeOut();
         }
     });
});
</script>
</head>
<body>
<a id="topo"></a>

	<header>
	<a href="/"></a>
		<div class="container-header">
		
		<div class="logologo">
			<img  src="/img/logotipo.png" class="logo">
		</div>
		<div class="nav">
	<nav>
		<a href="/" <?php if ($botao == "home") echo 'class="navActive"'; ?>>Início</a>
		<a href="/listartigos.php" <?php if ($botao == "noticias") echo 'class="navActive"'; ?>>Artigos</a>
		<a href="/contatos.php" <?php if ($botao == "contatos")  echo 'class="navActive"'; ?>>Contatos</a>
		<a href="/sobre.php" <?php if ($botao == "sobre")  echo 'class="navActive"'; ?>>Sobre</a>
	</nav>
	</div>
		</div>
		
	</header>
</body>