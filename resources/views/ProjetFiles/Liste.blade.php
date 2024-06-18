<div class="row row-cols-1 row-cols-md-4 g-4  m-0 pt-2 pb-2">
    <?php
    $j=1;?>
    @foreach($list as $projet)
    <div class="col pt-2">
      <div class="card h-100">
        <img src="./covers/cover<?php echo $j?>.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" style="height: 40px; max-height:auto; ">Titre : {{$projet['titre']}} </h5><br>
          <p class="card-text" style=" overflow: hidden;
          text-overflow: ellipsis;
          display: -webkit-box;
          -webkit-line-clamp: 7; /* or any other value you want */
          -webkit-box-orient: vertical;">{{$projet['description']}}<br/></p>
        </div>
      <div class="card-footer">
          <form  action="{{route('Projet.Actions',  ['projet' => encrypt($projet['id'])])}}" method="GET">
            @csrf
          <input type="hidden" name="projet" value="{{$projet['id']}}" />
          <button type="submit" name="view" class="btn stretched-link">Voir Projet</button>
          </form>


        </div>
      </div>
    </div>
    <?php $j++; if($j==7) $j=1;?>
        @endforeach

</div>
<br>

