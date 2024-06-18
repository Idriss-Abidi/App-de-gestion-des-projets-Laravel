<div class="modal fade"  id="exampleModalToggle{{$action['id']}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Action</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!--form de creation d'un projet-->
        <form action="{{route('Action.edit')}}" method="POST" >
            @csrf
        <input type="hidden" name="action" value="{{$action['id']}}" />
              <div class="form-group">
                  <label for="titre">Titre: </label>
                  <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre d'action" value="{{$action['titre']}}">
              </div>
              <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description d'action">{{$action['description']}}</textarea>
              </div>
              <div class="row g-3">
                <label for="date_debut">Date de début:</label>
                <div class="col-md-8 mt-0">
                  <?php $date_value = date('Y-m-d', strtotime($action['date_debut'])); ?>
                  <input type="date" class="form-control" id="date_debut" value="<?= $date_value ?>" name="date_debut">
                </div>
                <div class="col-md-4 mt-0">
                <input type="time" style="
                background-image: url('{{asset('timeDebut.svg')}}');
                background-repeat: no-repeat;
                background-size: 38px 20px; /* size of the icon */
                background-position: right;
              " placeholder="hh:mm"  class="form-control" id="time_debut" value="{{ date('H:i', strtotime($action['date_debut'])) }}" name="time_debut">
                </div>
            </div>
            <div class="row g-3 mt-0">
              <label for="date_fin">Date de fin: </label>
              <div class="col-md-8 mt-0">
                  <?php $date_value = date('Y-m-d', strtotime($action['date_fin'])); ?>
                  <input type="date" class="form-control" id="date_fin" value="<?= $date_value ?>" name="date_fin">
              </div>
              <div class="col-md-4 mt-0">
              <input type="time" style="
                  background-image: url('{{asset('timeFin.svg')}}');
                  background-repeat: no-repeat;
                  background-size: 38px 20px; /* size of the icon */
                  background-position: right;
                " placeholder="hh:mm" class="form-control" id="time_fin" value="{{ date('H:i', strtotime($action['date_fin'])) }}" name="time_fin">
              </div>
          </div><br/>
              <div class="form-group">
                  <label for="statut">Statut:</label>
                  <select class="form-control" id="statut" name="statut">
          <option value="1" <?php if($action['statut']==1) echo "selected"?>>En attente</option>
                      <option value="2" <?php if($action['statut']==2) echo "selected"?>>En cours</option>
                      <option value="3" <?php if($action['statut']==3) echo "selected"?>>Terminé</option>
                      <option value="4" <?php if($action['statut']==4) echo "selected"?>>Annulé</option>
            <option value="5" <?php if($action['statut']==5) echo "selected"?>>En retard</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="avancement">Avancement:</label>
                <input type="range" class="form-control-range" id="avancement{{$action['id']}}" name="avancement" min="0" max="100" value="{{$action['eval']}}" oninput="updateValue{{$action['id']}}(this.value)">
                <span id="avancement-indice{{$action['id']}}">{{$action['eval']}}%</span>
                <script>
                    function updateValue{{$action['id']}}(val) {
                        document.getElementById('avancement-indice{{$action['id']}}').innerHTML = val + '%';
                    }
                </script>
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
  <button class="btn btn-primary " data-bs-target="#exampleModalToggle{{$action['id']}}" data-bs-toggle="modal">Modifier</button>
