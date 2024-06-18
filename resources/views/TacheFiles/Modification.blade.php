<div class="modal fade"  id="exampleModalToggle{{$tache['id']}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">tache</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!--form de creation d'une tache-->
        <form action="{{route('Tache.edit')}}" method="POST" >
            @csrf
        <input type="hidden" name="tache" value="{{$tache['id']}}" />
              <div class="form-group">
                  <label for="titre">Titre: </label>
                  <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du tâche" value="{{$tache['titre']}}">
              </div>
              <div class="form-group">
                  <label for="description">Description ou Notes:</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description ou Notes du tâche">{{$tache['description']}}</textarea>
              </div>
              <div class="row g-3">
                  <label for="date_debut">Date de début:</label>
                  <div class="col-md-8 mt-0">
                    <?php $date_value = date('Y-m-d', strtotime($tache['date_debut'])); ?>
                    <input type="date" class="form-control" id="date_debut" value="<?= $date_value ?>" name="date_debut">
                  </div>
                  <div class="col-md-4 mt-0">
                  <input type="time" style="
                  background-image: url('{{asset('timeDebut.svg')}}');
                  background-repeat: no-repeat;
                  background-size: 38px 20px; /* size of the icon */
                  background-position: right;
                " placeholder="hh:mm"  class="form-control" id="time_debut" value="{{ date('H:i', strtotime($tache['date_debut'])) }}" name="time_debut">
                  </div>
              </div>
              <div class="row g-3 mt-0">
                <label for="date_fin">Date de fin: </label>
                <div class="col-md-8 mt-0">
                    <?php $date_value = date('Y-m-d', strtotime($tache['date_fin'])); ?>
                    <input type="date" class="form-control" id="date_fin" value="<?= $date_value ?>" name="date_fin">
                </div>
                <div class="col-md-4 mt-0">
                <input type="time" style="
                    background-image: url('{{asset('timeFin.svg')}}');
                    background-repeat: no-repeat;
                    background-size: 38px 20px; /* size of the icon */
                    background-position: right;
                  " placeholder="hh:mm" class="form-control" id="time_fin" value="{{ date('H:i', strtotime($tache['date_fin'])) }}" name="time_fin">
                </div>
            </div><br/>
              <div class="form-group">
                  <label for="statut">Statut:</label>
                  <select class="form-control" id="statut" name="statut">
          <option value="1" <?php if($tache['statut']==1) echo "selected"?>>En attente</option>
                      <option value="2" <?php if($tache['statut']==2) echo "selected"?>>En cours</option>
                      <option value="3" <?php if($tache['statut']==3) echo "selected"?>>Terminé</option>
                      <option value="4" <?php if($tache['statut']==4) echo "selected"?>>Annulé</option>
            <option value="5" <?php if($tache['statut']==5) echo "selected"?>>En retard</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="avancement">Avancement:</label>
                <input type="range" class="form-control-range" id="avancement{{$tache['id']}}" name="avancement" min="0" max="100" value="{{$tache['eval']}}" oninput="updateValue2({{$tache['id']}},this.value)">
                <span id="avancement-indice2{{$tache['id']}}">{{$tache['eval']}}%</span>

            </div>


              <button type="submit" name="edit" class="btn btn-primary">Enregistrer</button>
          </form>

          <!--fin de form-->
        </div>
        <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </div>
    </div>
  </div>
  <button class="btn btn-primary " data-bs-target="#exampleModalToggle{{$tache['id']}}" data-bs-toggle="modal">Modifier</button>

