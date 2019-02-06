<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		
		<title><?= $titre ?></title>
	
		<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		
		
		<link rel="stylesheet" href="public/main.css">
		<script src="public/main.js"></script>

		<script>
			<?php foreach($vue->getJSVars() as $key => $value): ?>
				var <?=$key?> = <?=json_encode($value)?>;
			<?php endforeach; ?>
		</script>
	</head>

	<body>
		<?php require "morceaux/entete.php"; ?>
		
		<?= $contenue ?>

		<?php require "morceaux/pied de page.php"; ?>
	</body>
</html>



