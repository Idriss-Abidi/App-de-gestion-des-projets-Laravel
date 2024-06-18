<div class="container  text-center" style="padding-bottom: 1%;">
    <div class="accordion container" id="accordionPanelsStayOpenExample2">
      @foreach($taches as $tache)

        <div class="accordion-item" style="margin-top:10px;" id="tachediv{{$tache['id']}}">
        <h2 class="accordion-header" id="panelsStayOpen-heading2{{$tache['id']}}">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2{{$tache['id']}}" aria-expanded="false" aria-controls="panelsStayOpen-collapse2{{$tache['id']}}">
            {{$tache['titre']}}
          </button>
        </h2>
        <div id="panelsStayOpen-collapse2{{$tache['id']}}" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading2{{$tache['id']}}">
          <div class="accordion-body">
            <strong>Notes:</strong> {{$tache['desc']}}
          <br>{{$tache['description']}}<br>
          @include("TacheFiles.Modification")
          @include("TacheFiles.Supprimer")
          </div>
          <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
      <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{$tache["eval"]}}%;"></div>
    </div>
        </div>

      </div>

        @endforeach


    </div>
    </div>
