<?php
  $username="";
    $uid=0;
 session_start();
 $username=$_SESSION['username'];
  if(isset($_SESSION['username'])){
    include 'connector.php';
   $sql="select id from utility.user where email='$username';";
   $result=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($result)){
    $uid=$row['id'];
   }
  }
   
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        
    <link rel="stylesheet" type="text/css" href="styles.css">
    
    <title>Utility Bill Management</title>
</head>
<body>
    <div class="toplabel">
     <a href="index.php"><img src="logo.jpg" style="width: 180px;">
     </a>   
         
    </div>

    <!--Navigation Bar-->
    <nav id="navi">
        <ul class="u" style="list-style: none;">
               <li><a href="userpg.php">Electricity</a></li>    
        <li><a href="userpgwater.php">Water</a></li>

        <li><a href="index.php">Gas</a></li>
        <li><a href="index.php">ServiceCharge</a></li>
        </ul>
    </nav>
<div class="profile">
     
     <?php
      include 'connector.php';
   $sql="select * from userprofile where id=$uid";
   $result=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_array($result)){
    echo '<img src="data:image;base64,'.$row['image'].' ">';    
   }

     ?>
</div>

 <div class="container" >
  <h2>Choose analysing method</h2>
    <canvas id="myChart"></canvas>
<form action="" method="POST">
  <input type="text" name="year" placeholder="year">
  <button name="year1">Get Data</button>
</form>
  </div>
  <div class="container2">
  <button id="4" onclick="barchart()">BarChart</button>
<button id="5"  onclick="piechart()">PieChart</button>
  <button id="6"  onclick="horchart()">horizontal Chart</button>

  </div>
  <?php
   include 'connector.php';
   $year='';
if(isset($_POST['year1'])){
  $year=$_POST['year'];
  echo "<script>alert('Now Choose Method')</script>";
}
if($year!=''){
   $sql="select amount,month(date) from waterreading where id=$uid and year(date)='$year' order by date;";

  $result=mysqli_query($conn,$sql);
  $amount=Array();
  $month=Array();
$i=0;
   while($row=mysqli_fetch_array($result)){
    $amount[$i]=$row['amount'];
    $month[$i]=$row['month(date)'];
$i++;
   }
   if($i==0){
    echo "You donot have any previous records";
   }
 }


  ?>
  <script>
  function barchart() {
    // body...
  var month=<?php echo json_encode($month)?>;
    var amount=<?php echo json_encode($amount)?>;
 
    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 15;
    Chart.defaults.global.defaultFontColor = 'black';

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea,line 
      data:{
        labels:month,
        datasets:[{
          label:'TAKA',
          data:amount,
          backgroundColor:["#7CFC00","#006400","#32CD32","##228B22","#228B22","#008000"],
          
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Bill Paid Per Month',
          fontSize:25
        },
        legend:{
          display:true,
          position:'center',
          labels:{
            fontColor:'black'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  }
  
  function piechart(){
      // body...
  var month=<?php echo json_encode($month)?>;
    var amount=<?php echo json_encode($amount)?>;
 
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 15;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:month,
        datasets:[
        {
          label:'TAKA',
          data:amount,
          backgroundColor:["#7CFC00","#7FFF00","#32CD32","#00FF00","#228B22","#008000"],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]},
        options:{
          animation:{
          animateScale:true
        }
      }

      
      
    } 
);
 } 

  function horchart(){
      // body...
  var month=<?php echo json_encode($month)?>;
    var amount=<?php echo json_encode($amount)?>;
 
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 15;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'horizontalBar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:month,
        datasets:[{
          label:'TAKA',
          data:amount,
          backgroundColor:["#7CFC00","#7FFF00","#32CD32","#00FF00","#228B22","#008000"],
         
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:false,
          text:'Bill Paid Per Month',
          fontSize:25
        },
        legend:{
          display:true,
          position:'center',
          labels:{
            fontColor:'black'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  
  }
</script>

</body>
</html>