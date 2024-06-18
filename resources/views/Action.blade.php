<x-master titre="Action" css="">

     <div>@include("ActionFiles.ComponentAction")</div>
     <div>@include("ActionFiles.Charts")</div>
    <div class="text-center">Vos actions:</div>
    <div>@include("ActionFiles.Liste")</div>
    <div class="text-center">Autres:</div>
    <div>@include("ActionFiles.ListeAutre")</div>
  <script>
    $(document).ready(function() {

    // Pie Chart
    var ctxPie = $('#pieChartAction');
    var data = <?php echo json_encode($stats); ?>;
    console.log(data);
    var myPieChart = new Chart(ctxPie, {
      type: 'doughnut',//pie
      data: {
        labels: Object.keys(data),
        datasets: [{
          data: Object.values(data),
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
        text: 'Actions :',
          fontSize: 38,
          fontFamily: 'Arial'
      }
          }
      },

    });
});
    </script>



</x-master>
