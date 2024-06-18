<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <div  style="height: 400px;width: 78%;margin: auto;"><canvas id="pieChart" height="400"></canvas></div>
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <div style="height: 400px;width: 78%;margin: auto;"><canvas id="barChart" width="400" height="400"></canvas></div>

      </div>
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
  <script>
      $(document).ready(function() {
        var data1 = <?php echo json_encode($data); ?>;
  console.log(data1);

  // Pie Chart
  var ctxPie = $('#pieChart');
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
          text: 'Actions :'
        }
      }
    }
  });

  // Bar Chart
  var ctxBar = $('#barChart');
  var myBarChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
      labels: Object.keys(data1),
      datasets: [{
        label: 'Actions',
        data: Object.values(data1),
        backgroundColor: ['#dc3545', '#007bff', '#ffc107', '#28a745', '#6f42c1'],
        borderColor: '#fff'
      }
    ]
    },
    options: {

      responsive: true,
      maintainAspectRatio: false,
      scales: {
      },
      plugins: {
          title: {
    display: true,
    text: '',
      fontSize: 38,
      fontFamily: 'Arial'
  }
      }
    }

  });

  });

  </script>
