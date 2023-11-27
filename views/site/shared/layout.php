<?php
$url = $this->helpers['URLHelper']->getURL();
$location = $this->helpers['URLHelper']->getLocation();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="keywords" content="HTML, CSS, JS, PHP">
	<meta name="description" content="Descrição do site">
	<meta name="author" content="Code Universe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="index, follow">
	<title>Projeto</title>
	<link rel="shortcut icon" href="<?= $url ?>/assets/img/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/fontawesome/css/brands.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/fontawesome/css/solid.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/css/loader.css">
</head>

<body>
	<div id="loader-overlay" style="display:none">
		<span class="loader loader-circles"></span>
	</div>
	<header>
		<?php require 'header.php'; ?>
	</header>
	<main>
		<?php require $file; ?>
	</main>
	<footer>
		<?php require 'footer.php'; ?>
	</footer>

	<script type="text/javascript">
		var PATH = '<?= $url; ?>';
		var Helpers = {};
	</script>
	<script type="text/javascript" src="<?= $url; ?>/assets/libs/jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?= $url; ?>/assets/libs/jquery/jquery.mask.min.js"></script>
	<script type="text/javascript" src="<?= $url; ?>/assets/libs/popper/popper.min.js"></script>
	<script type="text/javascript" src="<?= $url; ?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
	<script type="text/javascript" src="<?= $url; ?>/assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= $url; ?>/assets/js/helpers/helpers.js"></script>
	<script type="text/javascript" src="<?= $url; ?>/assets/js/site/layout.js"></script>
	<script type="text/javascript" src="<?= $url ?>/assets/js/site/contact.js"></script>
</body>

</html>