const input = document.querySelector("#my-div")
$('#comment-form').submit(function(e) {
  e.preventDefault(); // prevent the form from submitting normally

  // send an AJAX request to the server
  $.ajax({
    url: "{{ route('Comment.add') }}", // use the Laravel route helper to generate the URL
    method: "POST", // use the HTTP method defined in the route
    data: $('#comment-form').serialize(), // send the form data
    success: function(response) {
console.log(response);
var commentaires = response.commentaires;
console.log(commentaires);
var html = "";
for (var i = 0; i < commentaires.length; i++) {
    var commentaire = commentaires[i];
    html += '<div class="card" style="width:90%;margin:1% auto;">';
    html += '<div class="card-header">' + commentaire.membre + ' ' + (commentaire.titre != "" ? '<small>(Titre: ' + commentaire.titre + ')</small>' : '') + '</div>';
    html += '<div class="card-body">' + (commentaire.content) + '</div>';
    html += '<div><footer class="blockquote-footer">Date:' + commentaire.created_at + '</footer></div>';
    html += '</div>';
}

console.log(html);
input.innerHTML = html;
},
    error: function(xhr, status, error) {
      // handle any errors that occur during the AJAX request
      console.log(error);
    }
  });
});
