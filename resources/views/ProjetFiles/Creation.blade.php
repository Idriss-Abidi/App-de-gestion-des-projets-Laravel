<div class="modal fade"  id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Projet</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!--form de creation d'un projet-->
        <form action="{{route('Projet.add')}}" method="POST" >
            @csrf

              <div class="form-group">
                  <label for="titre">Titre:</label>
                  <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du projet" required>
              </div>
              <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du projet"></textarea>
              </div>
              <div class="row g-3">
                <label for="date_debut">Date de début:</label>
                <div class="col-md-8 mt-0">
                  <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                </div>
                <div class="col-md-4 mt-0">
                <input type="time" style="
                background-image: url('{{asset('timeDebut.svg')}}');
                background-repeat: no-repeat;
                background-size: 38px 20px; /* size of the icon */
                background-position: right;
              " placeholder="hh:mm"  class="form-control" id="time_debut" name="time_debut">
                </div>
            </div>
            <div class="row g-3 mt-0">
              <label for="date_fin">Date de fin: </label>
              <div class="col-md-8 mt-0">
                  <input type="date" class="form-control" id="date_fin"  name="date_fin" required>
              </div>
              <div class="col-md-4 mt-0">
              <input type="time" style="
                  background-image: url('{{asset('timeFin.svg')}}');
                  background-repeat: no-repeat;
                  background-size: 38px 20px; /* size of the icon */
                  background-position: right;
                " placeholder="hh:mm" class="form-control" id="time_fin" name="time_fin">
              </div>
          </div>
              <div class="form-group">
                  <label for="statut">Statut:</label>
                  <select class="form-control" id="statut" name="statut">
                      <option value="1">En attente</option>
                      <option value="2">En cours</option>
                      <option value="3">Terminé</option>
                      <option value="4">Annulé</option>
                      <option value="5">En retard</option>
                  </select>
              </div>
              <button type="submit" name="Add" class="btn btn-primary">Créer le projet</button>
          </form>
          <!--fin de form-->
        </div>
        <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
         <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Creer</button>-->
        </div>
      </div>
    </div>
  </div>
  <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Créer un projet</button>
