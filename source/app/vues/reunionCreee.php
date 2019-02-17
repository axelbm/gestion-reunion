<?php echo "Date du jour : ", strftime("%A %d %B %Y"); ?>

<div class="container">
	<h1 align="center"> - Mes Réunions - </h1> 
	<br>
	<h6 align="right"> * Administrateur </h6>

    <a href="calendrier" button type="button" class="btn btn-outline-dark float-right ">Revenir à mes invitations</a> 
    <a href="formReunion" button type="button" class="btn btn-dark float-right">Ajouter une Réunion</a><br><br>
    <?php if ($nombredepage > 1){ ?>
	<div class="pagination">
  <!--<a href="#">&laquo;</a>
  <a href="#">1</a>
  <a class="active" href="#">2</a>
  <a href="#">3</a>
	<a href="#">&raquo;</a>-->
	
	<a href="<?=WEBROOT."reunionCreee"?>">&laquo;</a>
	<?php for ( $i = max(0, $page - 4); $i < min($nombredepage, $page + 4); $i++ ) :?>
			<a href="<?=WEBROOT."reunionCreee/$i"?>"><?=$i?></a>
	<?php endfor ?>
	<a href="<?=WEBROOT."reunionCreee/$nombredepage"?>">&raquo;</a>

</div><br>
  <?php } ?>
  <!--
  <div class="card border-dark mb-3" style="max-width: 19rem;">
    <div class="card-body">
      <h4 class="card-title">15 Février 2019 - 11:00</h4>
      <p class="card-text">#36 - Créée par (utilisateur)<br>(0) invités</p>
      <span class="badge badge-success">Présent</span><br>
      <a href="detailsReunion?&reunion=1" class="card-link">Modifier</a>
    </div>
  </div>-->

  <?php foreach ($reunions as $reunion) :?>
  <div class="card border-dark mb-3" style="max-width: 19rem;">
    <div class="card-body">
      <h4 class="card-title"><?= $reunion->getDate()->format('Y-M-d H:i') ?></h4>
      <p class="card-text">#<?= $reunion->getId() ?> - Créée par (<?= $reunion->getCreateur() ?>)<br>(0) invités</p>
      <span class="badge badge-success">Présent</span><br>
      <a href="detailsReunion?&reunion=<?= $reunion->getId() ?>" class="card-link">Modifier</a>
    </div>
  </div>
  <?php endforeach ?>

</div>
