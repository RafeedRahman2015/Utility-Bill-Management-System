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
        <li><a href="index.php">Electricity</a></li>    
        <li><a href="index.php">Water</a></li>
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

<!--COPY FROM THIS SEcTION-->

	<h1 style="text-align: center; margin-top: 150px;">Electricity Bill Calculator</h1>
    <p ><h2 style="text-align: center;"><strong>To calculate electricity bill you need to enter meter readings of both previous and current month</strong></h2>
    </p>
    <br>
    <br>
    <br>
    <div class="input" style="text-align: center;">
    	<h3>Enter PREVIOUS readings</h3>
   <br>
    	<input type="number" name="prevread" id="prevread" placeholder="previous reading" required="*"><br>
    	<br>
    	<h3>Enter NEW reading</h3>
<br>
    	<input type="number" name="newread" id="newread" placeholder="new reading" required="*"><br>
    	<br>
    	<button onclick="getre()">Get Bill</button>
    </div>
    <br>
    <br>
    <br>
    <br>
<p id="ar">
	<div class="table">
	<table  id="t">
		<th>Range</th>
		<th>Unit</th>
		<th>Price per unit</th>
		<th>Price</th>
	 <tr>
		<td id="r1c1" style="text-align: center;">0-75</td>
		<td id="r1c2" style="text-align: center;"></td>
		<td id="r1c3" style="text-align: center;"></td>
		<td id="r1c4" style="text-align: center;" ></td>
	</tr>
	<tr>
	    <td id="r2c1" style="text-align: center;">76-200</td>
		<td id="r2c2" style="text-align: center;" ></td>
		<td id="r2c3" style="text-align: center;" ></td>
		<td id="r2c4" style="text-align: center;" ></td>
	</tr>
	<tr>
		<td id="r3c1" style="text-align: center;">201-300</td>
		<td id="r3c2" style="text-align: center;" ></td>
		<td id="r3c3" style="text-align: center;" ></td>		
		<td id="r3c4" style="text-align: center;" ></td>
		</tr>
		<tr>
	   	<td id="r4c1" style="text-align: center;">301-400</td>
		<td id="r4c2" style="text-align: center;" ></td>
		<td id="r4c3" style="text-align: center;" ></td>
		<td id="r4c4" style="text-align: center;" ></td>
	</tr>
	<tr>
		<td style="text-align: center;">401-600</td>
		<td id="r5c2" style="text-align: center;"></td>
		<td id="r5c3" style="text-align: center;"></td>
		<td id="r5c4" style="text-align: center;"></td>

	</tr>

	<tr>
		<td style="text-align: center;">>600</td>
		<td id="r6c2" style="text-align: center;"></td>
		<td id="r6c3" style="text-align: center;"></td>
		<td id="r6c4" style="text-align: center;"></td>

	</tr>

</table>

</div>
</p>
<div class="output">
	<p id="output1"></p>
	<p id="output3"></p>
    <p id="output2"></p>

</div>
     <script type="text/javascript">
    	function getre() {
    		// body...
    		var c=document.getElementById('prevread').value;
    		var d=document.getElementById('newread').value;
    		var unit=d-c;
    		var sum=0;
    		if(unit>=0&&unit<=50){
                sum=unit*3.5;
                document.getElementById('r1c2').innerHTML="0-50";
                document.getElementById('r1c3').innerHTML=3.5;
                document.getElementById('r1c4').innerHTML=unit*3.5;


    		}
       		else if(unit>75){
                sum=75*4.0;
                document.getElementById('r1c2').innerHTML=75;
                document.getElementById('r1c3').innerHTML=4.0;
                document.getElementById('r1c4').innerHTML=75*4;



              }
    		if(unit>75&&unit<=200){
                sum=sum+((unit-75+1)*5.45);
                document.getElementById('r2c2').innerHTML=unit-75+1;
                document.getElementById('r2c3').innerHTML=5.45;
                document.getElementById('r2c4').innerHTML=(unit-75+1)*5.45;



    		}
    		else if(unit>200){
    			sum=sum+(200-76+1)*5.45;
                document.getElementById('r2c2').innerHTML=200-76+1;
                document.getElementById('r2c3').innerHTML=5.45;
                document.getElementById('r2c4').innerHTML=(200-76+1)*5.45;



    		}
    		if(unit>200&&unit<=300){
    			sum=sum+(unit-201+1)*5.7;
                document.getElementById('r3c2').innerHTML=unit-201+1;
                document.getElementById('r3c3').innerHTML=5.7;
                document.getElementById('r3c4').innerHTML=(unit-201+1)*5.7;



    		}
    		else if(unit>300){
    			sum=sum+(300-201+1)*5.7;
                document.getElementById('r3c2').innerHTML=300-201+1;
                document.getElementById('r3c3').innerHTML=5.7;
                document.getElementById('r3c4').innerHTML=(300-201+1)*5.7;
    		}
    		if(unit>300&&unit<=400){
               sum=sum+(unit-301+1)*6.02;
                document.getElementById('r4c2').innerHTML=unit-301+1;
                document.getElementById('r4c3').innerHTML=6.02;
                document.getElementById('r4c4').innerHTML=(unit-301+1)*6.02;



              }
            else if(unit>400){
    			sum=sum+(400-301+1)*6.02;
                document.getElementById('r4c2').innerHTML=400-301+1;
                document.getElementById('r4c3').innerHTML=6.02;
                document.getElementById('r4c4').innerHTML=(400-301+1)*6.02;




             }
             if(unit>400&&unit<=600){
               sum=sum+(unit-401+1)*9.30;
                document.getElementById('r5c2').innerHTML=unit-401+1;
                document.getElementById('r5c3').innerHTML=9.30;
                document.getElementById('r5c4').innerHTML=(unit-401+1)*9.30;



             }
            else if(unit>600){
    			sum=sum+(600-401)*9.30;
                document.getElementById('r5c2').innerHTML=600-401+1;
                document.getElementById('r5c3').innerHTML=9.30;
                document.getElementById('r5c4').innerHTML=(600-401+1)*9.30;



}
             
             if(unit>600){
             	sum=sum+(unit-601+1)*10.7;
                document.getElementById('r6c2').innerHTML=600-401+1;
                document.getElementById('r6c3').innerHTML=10.7;
                document.getElementById('r6c4').innerHTML=(unit-601+1)*10.7;



             }
             var vat=sum*0.05;
             var meter=125;
             document.getElementById("output1").innerHTML="Units = "+unit;

             document.getElementById("output3").innerHTML="Vat @5%+Meter Cost "+vat;
             
             document.getElementById("output2").innerHTML="Net Total= "+sum;
             sum=sum+vat+125;      
document.getElementById("output2").innerHTML="Total Bill= "+sum;


    	}
    </script>
    <br>
    <br>
    <br>
    <br>

</body>
</html>
<br>
<br>
<br>
<br>
