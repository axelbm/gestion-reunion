<div class="container">
	<h1 align="center"> - Les dossiers - </h1><br>
	<h6 align="right"> * Administrateur </h6>
	<a href="formDossier" button type="button" class="btn btn-dark float-right">Nouveau Dossier</a><br><br>

	<?php if ($nombredepage > 1){ ?>
	<div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#">1</a>
  <a class="active" href="#">2</a>
  <a href="#">3</a>
  <a href="#">&raquo;</a>
</div><br>
	<?php } ?>

<form action="/action_page.php" align="center">
  Recherche par Titre <input type="search" name="titre">
  <input type="submit"><br><br><br>
</form>
	<div class="card border-dark mb-3" style="max-width: 15rem;">
		<div class="card-body">
			<h4 class="card-title">Titre</h4>
			<p class="card-text">Par (créateur du dossier)</p>
			<a href="#" class="card-link">Consulter </a>
			<a href="#" class="card-link">Supprimer</a>
		</div>
		<span class="oi oi-account-login"></span>
	</div>
</div>
