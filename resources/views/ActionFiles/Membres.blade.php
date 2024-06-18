     <div class="col pt-2">
      <div class="card h-100">
        <div class="card-body">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
</svg> : Membres
        </div>
      </div>
    </div>
    <form method="post" action="{{route('Membre.add')}}">
        @csrf
        <div class="form-group">
            <label for="login">Email:</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Membre">

        </div>
        <div class="form-group">
            <label for="role">role:</label>
            <input type="text" class="form-control" id="role" name="role" placeholder="role du membre">

        </div>
        <button type="submit" name="add" class="btn btn-primary">Ajouter</button>
    </form>
    @foreach($membres as $membre)
    <div class="col pt-2">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title"> {{$membre['nom']." ".$membre['prenom']}} : {{$membre['role']}}</h5>
          <p class="card-text" style="margin-bottom: 0;">Email :{{$membre['email']}} <br/>.</p>
          <form method="post" action="{{route('Membre.delete')}}">
            @csrf
            <input type="hidden" name="memebre_id" value="{{$membre['user_id']}}">
            <button type="submit" class="btn btn-dark" style="" value="Supprimer">Supprimer</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
