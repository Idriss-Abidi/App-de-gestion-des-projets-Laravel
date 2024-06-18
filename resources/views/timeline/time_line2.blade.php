<div id="carouselExampleDark" class="carousel carousel-dark slide" style="margin: 5px 62px;min-height: 200px;" data-bs-ride="carousel">

    <div class="carousel-inner">
        @php $i=1 @endphp
        @foreach($taches as $tache)
        @php $debut = date('Y-m-d', strtotime($tache['date_debut']));
        $fin = date('Y-m-d', strtotime($tache['date_fin']));@endphp
        @php $active = ($i == 1) ? 'active' : '' @endphp
        <div class="carousel-item {{$active}} text-center" data-bs-interval="3000">
            <div class="card" style="width: 45%;margin: 2px auto;border-radius:2rem; min-height: 220px;">
                <div class="card-body">
                    <h5 class="card-title"><a href="#tachediv{{$tache['id']}}" class="text-decoration-none text-black">{{$tache['titre']}}</a></h5>
                    <p class="card-text">{{$tache['description']}}</p>

                </div>
                <div class="card-footer"><small>{{$debut}} : {{$fin}}</small>
                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{$tache["eval"]}}%;"></div>
                    </div>
                </div>
            </div>
        </div>
        @php $i=0 @endphp
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
