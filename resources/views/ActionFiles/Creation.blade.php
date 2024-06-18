<form method="POST" action="{{route('Action.add')}}">
    @csrf
    <div class="form-group">
        <label for="titre">Titre:</label>
        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre d'action" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" zid="description" name="description" rows="3" placeholder="Description d'action"></textarea>
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
    <button type="submit" name="add" class="btn btn-primary">Ajouter</button>
</form>
