<!-- Button trigger modal -->
<button type="button" id="modal{{$action['id']}}"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal3{{$action['id']}}">
  Supprimer
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal3{{$action['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Êtes-vous sûr?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Cette action ne peut pas être annulée. Êtes-vous sûr de vouloir supprimer cet élément?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
       <form method="post" action ="{{route('Action.delete')}}">
        @csrf
        <input type="hidden" name="action" value="{{$action['id']}}" />
        <button type="submit" class="btn btn-primary" id="confirmDelete{{$action['id']}}" href="{{route('Action.delete')}}">Supprimer</button> </form>
    </div>
    </div>
  </div>
</div>
