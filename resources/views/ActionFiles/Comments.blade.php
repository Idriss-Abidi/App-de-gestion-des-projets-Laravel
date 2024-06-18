<div class="comment-section" >
  <h2>Commentaires</h2>
  <form id="comment-form">
    @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nom</label>
    <input name="name" style="width:auto; margin:auto;" placeholder="Your name" type="text" class="form-control text-center" value="{{session('username')}}" readonly>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">titre</label>
        <input name="titre" style="width:auto; margin:auto;" placeholder="Titre:" type="text" class="form-control">
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Commentaire</label>
<textarea name="comment" placeholder="..." type="text" class="form-control"  rows="5"></textarea>
</div>
    <button type="submit" class="btn btn-secondary" name="add" id="my-button">Envoyer</button>
  </form>
  <div id="my-div">
    @foreach($commentaires as $commentaire)
        <div class="card" style="width:90%;margin:1% auto;">
        <div class="card-header">{{($commentaire["membre"])}} @if($commentaire["titre"]!="") <small>(Titre: {{($commentaire["titre"])}})</small> @endif </div>
        <div class="card-body">{{nl2br($commentaire['content'])}}</div>
        <div><footer class="blockquote-footer">Date : {{date("Y/m/d H:i", strtotime($commentaire["created_at"]))}}</footer>
         </div>
        </div>
  @endforeach
</div>
<script>
    //Test d'inesrtion de données avec AJAX sans avoir à recharger complètement la page
    const input = document.querySelector("#my-div")
    $('#comment-form').submit(function(e) {
      e.preventDefault(); // empêcher le formulaire de se soumettre normalement
      // Envoyer AJAX requete au serveur
    $.ajax({
        url: "{{ route('Comment.add') }}",
        method: "POST",
        data: $('#comment-form').serialize(),
        success: function(response) {
    console.log(response);
    var commentaires = response.commentaires;
    console.log(commentaires);
    var html = "";
    //ajouter le commentaire
    for (var i = 0; i < commentaires.length; i++) {
        var commentaire = commentaires[i];
        html += '<div class="card" style="width:90%;margin:1% auto;">';
        html += '<div class="card-header">' + commentaire.membre + ' ' + (commentaire.titre != "" ? '<small>(Titre: ' + commentaire.titre + ')</small>' : '') + '</div>';
        html += '<div class="card-body">' + (commentaire.content) + '</div>';
        var commentDate = new Date(commentaire.created_at);
        var formattedDate = commentDate.toLocaleDateString([], { year: 'numeric', month: 'numeric', day: 'numeric' });
        var formattedTime = new Date(commentaire.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
        html += '<div><footer class="blockquote-footer">Date : ' + formattedDate+' '+formattedTime + '</footer></div>';
        html += '</div>';
    }
    console.log(html);
    input.innerHTML = html;
    },
        error: function(xhr, status, error) {
        console.log(error);
        }
    });
    });
</script>
