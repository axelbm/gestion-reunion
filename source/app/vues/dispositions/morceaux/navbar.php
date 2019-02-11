<nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

	<div class="container">
		<!-- Links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link text-light" href="<?=WEBROOT?>">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-light" href="<?=WEBROOT?>calendrier">Calendrier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-light" href="<?=WEBROOT?>dossiers">Liste des dossiers</a>
			</li>
		</ul>

		<?php if (!isset($erreur)): ?>
			<?php if (isset($utilisateur)): ?>
				<div class="dropdown">
					<a class="dropdown-toggle text-light" data-toggle="dropdown">
						Axel Michaud
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Link 1</a>
						<a class="dropdown-item" href="#">Link 2</a>
						<a class="dropdown-item" href="#">Link 3</a>
					</div>
				</div>
			<?php else: ?>
				<a class="btn btn-light btn-sm" href="<?=WEBROOT?>connexion">Connexion</a>
			<?php endif ?>
		<?php endif ?>
	</div>

</nav>

