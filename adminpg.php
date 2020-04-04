<?php
 session_start();
  $username="";
    $uid=0;

  if(isset($_GET['username'])){
    include 'connector.php';
  	$username=$_GET['username'];
   $_SESSION['username']=$username;

   $sql="select id from utility.admin where email='$username';";
   
   $result=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($result)){
   	$uid=$row['id'];
   }
  }

   if(isset($_SESSION['username'])){
    include 'connector.php';
    $username=$_SESSION['username'];
   $sql="select id from utility.admin where email='$username';";
   
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
		<li><a href="adminpg.php">Electricity</a></li>	
		  <li style="float: right;font-size: 15px;"><a  href="logout.php">LOG OUT</a></li>
    </ul>
  
	</nav>
<div class="profile">
	 
     <?php
      include 'connector.php';
   $sql="select * from adminprofile where id=$uid";
   $result=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_array($result)){
    echo '<img src="data:image;base64,'.$row['image'].' ">';   	
   }

     ?>
</div>
<!--COPY FROM THIS SEcTION-->
<br/>
<br/>
  <h1 style="text-align: center;">Electricity Section</h1>
     
<br/>
<br/>
<br/>
<br/>
<div class="electricitycontent1">
     <h1 style="text-align: center;">TO DO!!</h1>
    <ul style="list-style:disc;">
      <br/>
      <br/>
      <br/>
<i>
      <li><h2>Get Reading At the End of Every Month</h2></li>
      <br/>
      <br/>

      <li><h2>Send Reading to DESCO</h2></li>
            <br/>
      <br/>
      <li><h2>Get Bill</h2></li>
            <br/>
      <br/>


      <li><h2>Send Bill To Our Clients</h2></li>
                  <br/>
      <br/>

      <br/>
</i>
    </ul>

</div>
       <div class="electricitycontent2">
        <h2>Functions</h2>
         <button ><a href="recordReading.php">Record And Send Reading to Power supply</a></button>

         
         <button ><a href="getcbill.php">Get Client's Bill</a></button>
         

       </div>
       
     <div class="foot" style="color: black; font-size: 20px;">
      <h1>Stay Connected with us Through-</h1>
      <br/>
      <br/>

      <a href="www.facebook.com"><img src="fblogo.jpg" style="width: 100px; margin-left: 15px; border: 1px green solid;"></a>
      <a href="www.tweeter.com"><img src="tweeter.jpg" style="width: 100px; margin-left: 20px; border: 1px green solid;"></a>
    
     </div>    

     </body>
     </html>