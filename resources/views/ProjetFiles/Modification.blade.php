
			<form method="POST" action="{{route('Projet.edit')}}">
                @csrf
			<div class="form-group">
				<label for="titre">Titre:</label>
				<input type="text" class="form-control" id="titre" value="{{$list2['titre']}}" name="titre" placeholder="Titre du projet">
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du projet">{{$list2['description']}}</textarea>
			</div>
            <div class="row g-3">
                <label for="date_debut">Date de début:</label>
                <div class="col-md-8 mt-0">
                  <?php $date_value = date('Y-m-d', strtotime($list2['date_debut'])); ?>
                  <input type="date" class="form-control" id="date_debut" value="<?= $date_value ?>" name="date_debut">
                </div>
                <div class="col-md-4 mt-0">
                <input type="time" style="
                background-image: url('{{asset('timeDebut.svg')}}');
                background-repeat: no-repeat;
                background-size: 38px 20px; /* size of the icon */
                background-position: right;
              " placeholder="hh:mm"  class="form-control" id="time_debut" value="{{ date('H:i', strtotime($list2['date_debut'])) }}" name="time_debut">
                </div>
            </div>
            <div class="row g-3 mt-0">
              <label for="date_fin">Date de fin: </label>
              <div class="col-md-8 mt-0">
                  <?php $date_value = date('Y-m-d', strtotime($list2['date_fin'])); ?>
                  <input type="date" class="form-control" id="date_fin" value="<?= $date_value ?>" name="date_fin">
              </div>
              <div class="col-md-4 mt-0">
              <input type="time" style="
                  background-image: url('{{asset('timeFin.svg')}}');
                  background-repeat: no-repeat;
                  background-size: 38px 20px; /* size of the icon */
                  background-position: right;
                " placeholder="hh:mm" class="form-control" id="time_fin" value="{{ date('H:i', strtotime($list2['date_fin'])) }}" name="time_fin">
              </div>
          </div><br/>
			<div class="form-group">
				<label for="statut">Statut:</label>
				<select class="form-control" id="statut" name="statut">
                    <option value="1" <?php if($list2['statut']==1) echo "selected"?>>En attente</option>
					<option value="2" <?php if($list2["statut"]==2) echo "selected"?>>En cours</option>
					<option value="3" <?php if($list2["statut"]==3) echo "selected"?>>Terminé</option>
					<option value="4" <?php if($list2["statut"]==4) echo "selected"?>>Annulé</option>
                    <option value="5" <?php if($list2["statut"]==5) echo "selected"?>>En retard</option>
				</select>
			</div>
			<button type="submit" name="edit" class="btn btn-primary">Enregistrer</button>
		</form><br/>
        @include("ProjetFiles.Supprimer")
