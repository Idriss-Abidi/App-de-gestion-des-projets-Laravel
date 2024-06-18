<?php
// session_start();
?>
<x-master titre="Projet" css="">
@include('./ProjetFiles.charts')
<div class="card mb-3 rounded-5 rounded-start-2" style="max-width:90%;margin:30px auto; background:#FCFDFD;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="./imgs/projet.png" class="img-fluid rounded-start" alt="..." style="padding: 15px;">
      </div>
      <div class="col-md-8">
        <div class="card-body" style="margin-top:7%;">
          <h5 class="card-title text-center">Formulaire de création de projet</h5>
          <p class="card-text pt-3 pb-2">Ce formulaire vous permet de créer un nouveau projet en remplissant les champs fournis. <br>Veuillez saisir les informations nécessaires telles que le titre, la description, la date de début, la date de fin et le statut. <br>Une fois que vous avez rempli tous les champs requis, cliquez sur le bouton "Créer le projet" pour soumettre votre demande.</p>
       <div class="">
       @include('./ProjetFiles/Creation')
       </div>
      </div>
      </div>
    </div>
  </div>

@include('./ProjetFiles.Liste')
</x-master>
{{-- hello --}}
