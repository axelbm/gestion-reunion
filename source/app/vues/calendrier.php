
<div class="container">
	<h1 align="center"> - Invitation(s) - </h1> 
	<br>
	<?php if ($estadmin):?> 
		<h6 align="right"> * Administrateur </h6>
		<a href="reunionCreee" button type="button" class="btn btn-dark float-right">Mes Réunions</a><br>
		<?php if ($nombredepage > 1){ ?>
	<div class="pagination">
  <!--<a href="#">&laquo;</a>
  <a href="#">1</a>
  <a class="active" href="#">2</a>
  <a href="#">3</a>
	<a href="#">&raquo;</a>-->
	
	<a href="<?=WEBROOT."calendrier"?>">&laquo;</a>
	<?php for ( $i = max(0, $page - 4); $i < min($nombredepage, $page + 4); $i++ ) :?>
			<a href="<?=WEBROOT."calendrier/$i"?>"><?=$i?></a>
	<?php endfor ?>
	<a href="<?=WEBROOT."calendrier/$nombredepage"?>">&raquo;</a>

</div><br>
	<?php } 
	endif?>

	<br>
	<!--
	<div class="card border-dark mb-3" style="max-width: 25rem;">
		<div class="card-body">
			<h4 class="card-title">15 Février 2019 - 11:00</h4>
			<p class="card-text">#36 - Par (créateur de la réunion)</p>
			<form action="" method="post" role="form" class="p-2" id="register-frm">
    <form action="/action_page.php">
		<label for="sel1"><strong>Confirmer ma participation</strong></label>
     <div class="form-group"><select class="form-control" id="sel1" name="sellist1">
        <option>Je participe</option>
        <option>Hésitant</option>
        <option>Absent</option>
			</select></div>
			<div class="form-group">
<button type="button" class="btn btn-dark">Confirmer</button><br>
			<br><span class="badge badge-success">Présent</span>
			<a href="#" class="card-link">Consulter</a>
</div>
		</div>
	</div>-->


	<?php  if(!empty($reunions)){
   foreach ($reunions as $reunion) :?>
  <div class="card border-dark mb-3" style="max-width: 19rem;">
    <div class="card-body">
      <h4 class="card-title"><?= strftime($reunion->getDate()->format('Y-M-d H:i')) ?></h4>
      <p class="card-text">#<?= $reunion->getId() ?> - Créée par (<?= $reunion->getCreateur() ?>)<br>(0) invités</p>
			<form action="" method="post" role="form" class="p-2" id="register-frm">
    <form action="/action_page.php">
		<label for="sel1"><strong>Confirmer ma participation</strong></label>
     <div class="form-group"><select class="form-control" id="sel1" name="sellist1">
        <option>Je participe</option>
        <option>Hésitant</option>
        <option>Absent</option>
			</select></div>
			<div class="form-group">
<button type="button" class="btn btn-dark">Confirmer</button><br>
			<br><span class="badge badge-success">Présent</span>
			<a href="detailsReunion?&reunion=<?= $reunion->getId() ?>" class="card-link">Consulter</a>
			</div>
    </div>
  </div>
  <?php endforeach; 
  }else{ 
    echo "<div>Vous n'avez pas été invité à réunion.</div>";
  }  ?>
	<br>
</div>

<br><span class="badge badge-warning">Hésitant</span>
<br><span class="badge badge-danger">Absent</span>
<br><span class="badge badge-dark">Terminée</span>
<br><span class="badge badge-info">En attente</span>


