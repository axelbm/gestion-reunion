<div class="container">
    <h1 align="center"> - Modifications - </h1> 
    <br>
    <h6 align="right"> * Administrateur </h6>

    <a href="calendrier" button type="button" class="btn btn-outline-dark float-right ">Revenir à mes invitations</a> <br><br>
<div class="card border-dark mb-3" style="max-width: 26rem;">

    <div class="card-body">
      <h4 class="card-title"><?= $reunion->getDate()->format('Y-F-d H:i') ?></h4>
      <p class="card-text">#<?= $reunion->getId() ?> - Créée par (<?= $reunion->getCreateur() ?>)<br>(0) invités</p>
      <span class="badge badge-success">Présent</span><br><br>
      <a href="ajoutParticipation?&reunion=<?= $reunion->getId() ?>" class="card-link">Inviter des participants </a>
      <a href="formPoints" class="card-link">Ajouter point d'ordre</a><br>
      <a href="#" class="card-link">Modifier point d'ordre</a>
      <a href="#" class="card-link">Annuler la réunion</a>
    </div>
  </div><br>

  <div class="row">
  <div class="column" style="background-color:#aaa;">
    <h5>Invité(s)</h5>
    <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Jhonas Brunet
    <span class="badge badge-primary badge-dark">invité</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Chantal Roy
    <span class="badge badge-primary badge-dark">pas invité</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Alexandre Paquet
    <span class="badge badge-primary badge-dark">invité</span>
  </li>
</ul>
  </div> 
  <div class="column" style="background-color:#bbb;">
    <h5>Point(s) d'ordre relié(s)</h5>
    <ol class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Présentations
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   Ajustements nécéssaires au dossier <strong>#Dossier</strong>
  </li><li class="list-group-item d-flex justify-content-between align-items-center">
   Remerciements
  </li><li class="list-group-item d-flex justify-content-between align-items-center">
   Prochains points d'ordre
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   Conclusion
  </li>
</ol>
  </div>
</div>
</div>
