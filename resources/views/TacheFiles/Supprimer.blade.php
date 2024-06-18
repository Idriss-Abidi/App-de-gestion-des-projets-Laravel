<!-- Button trigger modal -->
<button type="button" id="modal{{$tache['id']}}"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal3{{$tache['id']}}">
    Supprimer
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal3{{$tache['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
         <form method="post" action ="{{route('Tache.delete')}}">
          @csrf
          <input type="hidden" name="tache" value="{{$tache['id']}}" />
          <button type="submit" class="btn btn-primary" id="confirmDelete{{$tache['id']}}" >Supprimer</button> </form>
      </div>
      </div>
    </div>
  </div>
 