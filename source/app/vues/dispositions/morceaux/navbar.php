<nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

	<div class="container">
		<!-- Links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link text-light" href="<?=WEBROOT?>">Accueil</a>
			</li>

			<?php if (isset($utilisateur)): ?>
				<li class="nav-item">
					<a class="nav-link text-light" href="<?=WEBROOT?>calendrier">Réunions</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="<?=WEBROOT?>dossiers">Dossiers</a>
				</li>
			<?php endif ?>
			
			
			<li class="nav-item">
				<a class="nav-link text-light" href="<?=WEBROOT?>nouscontacter">Nous contacter</a>
			</li>

			<?php if (isset($utilisateur) && $utilisateur->estAdministrateur()): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-light" href="#" id="navbardrop" data-toggle="dropdown">
						Administration
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?=WEBROOT?>invitation">Inviter</a>
						
						<?php if ($utilisateur->estSuperAdministrateur()): ?>
							<a class="dropdown-item" href="<?=WEBROOT?>superAdmin">Super Admin</a>
						<?php endif ?>
					</div>
				</li>
				
			<?php endif ?>
		</ul>

		<?php if (!isset($erreur)): ?>
			<?php if (isset($utilisateur)): ?>
				<div class="dropdown">
					<a class="nav-link dropdown-toggle text-light" href="#" data-toggle="dropdown">
						<?=$utilisateur->getNomComplet();?>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Mon profil</a>
						<a class="dropdown-item" href="#">Paramètres</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?=WEBROOT?>deconnexion">Se déconnecter</a>
					</div>
				</div>
			<?php else: ?>
				<a class="btn btn-light btn-sm" href="<?=WEBROOT?>connexion">Connexion</a>
			<?php endif ?>
		<?php endif ?>
	</div>
	

</nav>

