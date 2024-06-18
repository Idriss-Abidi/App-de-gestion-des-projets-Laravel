<div class="container  text-center" style="padding-bottom: 3%;">
    <div class="accordion container" id="accordionPanelsStayOpenExample">
      @foreach($list as $action)

        <div class="accordion-item" style="margin-top:10px;" id="Actiondiv{{$action['id']}}">
        <h2 class="accordion-header" id="panelsStayOpen-heading{{$action['id']}}">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$action['id']}}" aria-expanded="false" aria-controls="panelsStayOpen-collapse{{$action['id']}}">
            {{$action['titre']}}
          </button>
        </h2>
        <div id="panelsStayOpen-collapse{{$action['id']}}" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading{{$action['id']}}">
          <div class="accordion-body">
           <p>Description: {{$action['desc']}}</p>
            <br>{{$action['description']}}<br>
          @include("ActionFiles.Modification")
          @include("ActionFiles.Supprimer")
          </div>
          <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
      <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{$action["eval"]}}%;"></div>
    </div>
        </div>

      </div>

        @endforeach


    </div>
    </div>
