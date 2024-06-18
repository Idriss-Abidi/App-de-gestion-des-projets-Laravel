<x-master titre="SectionB" css="" >
<div class="container text-center">
    <div class="card mb-3" style="border-radius:3rem; max-width: 100%;">
        <div class="row g-0 rounded-start-4">
            <div class="col-md-4" style="margin:auto; ">
                <img src="./imgs/profile.png" class="img-fluid " alt="...">
              </div>
            <div class="col-md-8" style="margin: auto;">
             <div class="card-headaer m-2 "><br/><h5>Profil:</h5></div>
            <div class="card-body">
                <form>

                    <div class="row">
                        <div class="col">
                        <label for="prenom">Prenom</label>
                          <input type="text" class="form-control" placeholder="prenom" aria-label="prenom" value="{{$user['prenom']}}" readonly>
                        </div>
                        <div class="col">
                          <label for="nom">Nom</label>
                          <input type="text" class="form-control" placeholder="nom" aria-label="nom" value="{{$user['nom']}}" readonly>
                        </div>
                      </div><br/>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Titre du projet" value="{{$user['email']}}" readonly>
                    </div><br/>
                    <div class="form-group">
                        <label for="mdp">Mot de passe:</label>
                        <input type="password" class="form-control" id="mdp" name="mdp"  value="{{$user['mdp']}}"  readonly>
                    </div>
                </form>
                <button class="btn btn-primary " data-bs-target="#profile" data-bs-toggle="modal">Modifier</button>

            </div>
          </div>
        </div>
      </div>
<!--modifier-->
<div class="modal fade"  id="profile" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" style="height: auto;">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Profil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!--form de creation d'un projet-->
        <form method="POST" action="{{route('Profile.edit')}}">
            @csrf
            <div class="row">
                <div class="col">
                <label for="prenom">Prenom</label>
                  <input type="text" class="form-control" name="prenom" placeholder="prenom" aria-label="prenom" value="{{$user['prenom']}}" required>
                </div>
                <div class="col">
                  <label for="nom">Nom</label>
                  <input type="text" class="form-control" name="nom" placeholder="nom" aria-label="nom" value="{{$user['nom']}}" required >
                </div>
              </div><br/>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Titre du projet" value="{{$user['email']}}" required>
            </div><br/>
            <div class="form-group">
                <label for="mdp">Mot de passe:</label>
                <input type="password" class="form-control" id="mdp" name="mdp" value="{{$user["mdp"]}}" required>
            </div>


          <!--fin de form-->
        </div>
        <div class="modal-footer">
 <button type="submit" name="edit" class="btn btn-primary">Enregistrer</button>
          </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </div>
    </div>
  </div>
<!---->
</x-master>
