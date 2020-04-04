<script>
    // body...
  var month=<?php echo json_encode($month)?>;
    var amount=<?php echo json_encode($amount)?>;
 
    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 15;
    Chart.defaults.global.defaultFontColor = 'black';

    let massPopChart = new Chart(myChart, {
      type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea,line 
      data:{
        labels:["Jan","Feb","March"],
        datasets:[{
          label:'TAKA',
          fill:false,
          lineTension:0.1,
          borderColor:"rgba(75,192,192,1)",
          backgroundColor:"rgba(75,192,192,0.4)",
         borderCapStyle:'butt',
         borderDash:[],
         borderDashOffset:0.0,
         borderJoinStyle:'miter',
        pointBorderColor:"rgba(75,192,192,1)",
        pointHoverBackgroundColor:"#fff",
          pointBorderWidth:1,
          pointHoverRadius:5,
          pointHoverBackgroundColor:"rgba(75,192,192,1)",
          pointHoverBorderColor:"rgba(220,220,220,1)",
          pointHoverBorderWidth:2,
          pointRadius:1,
          pointHitRadius:10,
          data:[10,20,30],

        }]
      },
    });
</script>