<!-- Button trigger modal -->
<button type="button" id="modal"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal3A">
    Supprimer
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal3A" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Êtes-vous sûr?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Cette tache ne peut pas être annulée. Êtes-vous sûr de vouloir supprimer cet élément?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
         <form method="post" action ="{{route('Projet.delete')}}">
          @csrf
          <input type="hidden" name="projet" value="{{session("projet")}}" />
          <button type="submit" class="btn btn-primary" id="confirmDelete">Supprimer</button> </form>
      </div>
      </div>
    </div>
  </div>
 