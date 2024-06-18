<div class="container  text-center" style="padding-bottom: 3%;">
    <div class="accordion container" id="accordionPanelsStayOpenExample">
      @foreach($ListeAutre as $autre)

        <div class="accordion-item" style="margin-top:10px;" id="Actiondiv{{$autre['id']}}">
        <h2 class="accordion-header" id="panelsStayOpen-heading{{$autre['id']}}">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$autre['id']}}" aria-expanded="false" aria-controls="panelsStayOpen-collapse{{$autre['id']}}">
            {{$autre['titre']}}
          </button>
        </h2>
        <div id="panelsStayOpen-collapse{{$autre['id']}}" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading{{$autre['id']}}">
          <div class="accordion-body">
            <strong>Description de l'Action</strong> Cette description peut inclure des informations telles que les objectifs de la tâche, les ressources nécessaires pour la réaliser, les étapes à suivre, les échéances et les critères de réussite.
          <br>{{$autre['description']}}<br>
          <small>Responsable(s):
            @foreach($membres as $membre)
            @if($membre['user_id'] == $autre['utilisateur']) {{ $membre['nom']." ".$membre['prenom'] }}({{ $membre->role }})
            @else
            {{-- {{ $membre['nom']." ".$membre['prenom']." ".$membre['user_id']." ".$autre["utilisateur"]}} --}}
            @endif
            @endforeach

          </small>

    </div>
        </div>

      </div>

        @endforeach


    </div>
    </div>
