
<x-master titre="Accueil" css="">
<div class="container-fluid">
  <div class="row justify-content-center">
    @if(!empty($data1))
    <div class="col-lg-3">
      <canvas id="pieChart1" style="width: 400px; height: 400px;"></canvas>
    </div>
    @endif
    @if(count($data2)!==0)
    <div class="col-lg-4 ">
      <canvas id="barChart" style="width: 400px; height: 400px;"></canvas>
    </div>
    @endif
    @if(!empty($data3))
    <div class="col-lg-3">
      <canvas id="pieChart2" style="width: 400px; height: 400px;"></canvas>
    </div>
    @endif
  </div>
</div>
<div class="container-fluid" style="margin-top:60px;padding-bottom:30px;">
  <div class="row justify-content-center">
    <div class="col-lg-6">
    <div class="card h-100">
      <img src="{{ asset('covers/test.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center">La section "Projets"</h5>

        <p class="card-text">
            La section "Projets" de notre application web de gestion offre une interface intuitive pour gérer les projets et leurs actions associées. Les utilisateurs peuvent créer, modifier et supprimer des projets, tout en bénéficiant d'une visualisation graphique du statut des projets. De plus, grâce à l'intégration de l'intelligence artificielle, les utilisateurs inexpérimentés sont assistés par des suggestions et des recommandations d'actions, ce qui facilite leur prise de décision et leur permet d'accomplir leurs tâches plus efficacement.
        </p>
      </div>
      <div class="card-footer">
      <a href="{{route('SectionA')}}" class="stretched-link text-decoration-none" ><small>Voir plus</small></a>
      </div>
    </div>
    </div>
    <div class="col-lg-6 ">
         <!--Section-->
         <div class="card h-100">
      <img src="{{ asset('covers/test2.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center">La section "Taches"</h5>
        <p class="card-text">

La section "Tâches" de notre application web de gestion met l'accent sur la gestion des tâches individuelles. Les utilisateurs peuvent créer, organiser et suivre leurs tâches personnelles. Pour faciliter la gestion du temps, notre application affiche des notitifcations aux utilisateurs pour les informer des dates de fin imminentes, les aidant ainsi à respecter leurs délais.
        </p>
      </div>
      <div class="card-footer">
      <a href="{{route('SectionB')}}" class="stretched-link text-decoration-none"><small>Voir plus</small></a>
      </div>
    </div>
    </div>

  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
// Pie Chart
var ctxPie = $('#pieChart1');
var data1 = <?php echo json_encode($data1); ?>;
var data2 = <?php echo json_encode($data2); ?>;
var data3 = <?php echo json_encode($data3); ?>;
console.log(data1);console.log(data3);
var myPieChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
    labels: Object.keys(data1),
    datasets: [{
    data: Object.values(data1),
    backgroundColor: ['#dc3545', '#007bff', '#ffc107', '#28a745', '#6f42c1'],
    borderColor: '#fff'
    }]
    },
    options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        title: {
        display: true,
        text: 'Projets :',
        fontSize: 38,
        fontFamily: 'Arial'
        }
    }
  },
});
// Pie Chart
var ctxPie = $('#pieChart2');
var myPieChart = new Chart(ctxPie, {
  type: 'pie',
  data: {
    labels: Object.keys(data3),
    datasets: [{
      data: Object.values(data3),
      backgroundColor: ['#dc3545', '#007bff', '#ffc107', '#28a745', '#6f42c1', '#fd7e14'],
      borderColor: '#fff'
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
          title: {
    display: true,
    text: 'Taches :',
      fontSize: 38,
      fontFamily: 'Arial'
  }
      }
  }
});
// Bar Chart
var ctxBar = $('#barChart');
var myBarChart = new Chart(ctxBar, {
  type: 'bar',
  data: {
    labels: Object.keys(data2),
    datasets: [{
      label:'Nombre de ',
      data: Object.values(data2),
      backgroundColor: ['#dc3545', '#007bff', '#ffc107'],
      borderColor: '#fff'
    }
  ]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
  yAxes: [{
    ticks: {
      beginAtZero: true
    }
  }]
},
    plugins: {
      title: {
        display: true,
        text: '',
      }
    },
    indexAxis: 'y'

  }
});


});

</script>
</x-master>
