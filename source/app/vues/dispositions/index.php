<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		
		<title><?= $titre ?></title>

		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

		<link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
		
		<?php foreach($vue->getScripts() as $fichier): ?>
			<script src="<?=$fichier?>"></script>
		<?php endforeach; ?>

		<?php foreach($vue->getStyles() as $fichier): ?>
			<link rel="stylesheet" href="<?=$fichier?>">
		<?php endforeach; ?>

		<script>
			<?php foreach($vue->getJSVars() as $key => $value): ?>
				var <?=$key?> = <?=json_encode($value)?>;
			<?php endforeach; ?>
		</script>
	</head>

	<body>
		<div id="container">
			<?php require "morceaux/header.php"; ?>
			<?php require "morceaux/navbar.php"; ?>
			
			<div id="content" class="container">
				<?= $contenue ?>
			</div>

			<?php require "morceaux/footer.php"; ?>
		</div>
	</body>
	
	<script src="//instant.page/1.1.0" type="module" integrity="sha384-EwBObn5QAxP8f09iemwAJljc+sU+eUXeL9vSBw1eNmVarwhKk2F9vBEpaN9rsrtp"></script>
</html>



