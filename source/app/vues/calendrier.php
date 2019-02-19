<div class="container">
	<h1 align="center"> - Réunion(s) - </h1> 
	<h6 align="center"> (Auxquelles vous êtes invité) </h6> 
	<br>
	<?php if ($estadmin):?> 
		<h6 align="right"> * Administrateur </h6>
		<a href="reunionCreee" button type="button" class="btn btn-primary float-right">Mes Réunions</a><br>
	<?php	endif ?>
	<br>
	<?php if ($nombredepage > 1){ ?>
		<div class="pagination">
			<a href="<?=WEBROOT."calendrier"?>">&laquo;</a>
			<?php for ( $i = max(0, $page - 4); $i < min($nombredepage, $page + 4); $i++ ) :?>
				<a href="<?=WEBROOT."calendrier/$i"?>"><?=$i+1?></a>
			<?php endfor ?>
			<a href="<?=WEBROOT."calendrier/$nombredepage"?>">&raquo;</a>

		</div><br>
	<?php } ?>

	<div>
		<?php foreach ($reunions as $reunion): ?>
			<hr>
			<h4>
				<h4 class="card-title"><?= strftime($reunion->getDate()->format('Y-M-d H:i')) ?></h4>
			</h4>
			<div>
				<span>Organisé par : <a href="#"><?= $reunion->getCreateur() ?></a></span>
				<br>
				<?=$participations [$reunion->getId()]->badge()?>
				<a href="<?= WEBROOT."detailsReunion/".$reunion->getId() ?>">Détails</a> |
				<a href="#">Modifier ma participation</a>
			</div>
			<p>
				<?php $count=$reunion->nbInvite();
				if ($count > 1):?>
					<?= $count ?> personnes ont été invitées.
				<?php else: ?>
					<?= $count ?> personne a été invitée.
				<?php endif ?>
			</p>
			
			<?php $pointdordres=$reunion->getPointDordres();
			if (count($pointdordres)): ?>
				<h5>Points d'ordre</h5>
				<ul>
					<?php foreach ($pointdordres as $pointdordre): ?>
						<li><?= $pointdordre->getTitre()?></li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>
		<?php endforeach ?>
	</div>
</div>



