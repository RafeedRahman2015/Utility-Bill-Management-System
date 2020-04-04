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

   if (isset($_POST["bkash"])) {
     # code...
     header("Location:bkash.php");
   }

   if (isset($_POST["rocket"])) {
     # code...
     header("Location:rocket.php");
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
<br/>
<br/>
	<h1 style="text-align: center;">Electricity Section</h1>
     
<br/>
<br/>
<br/>
<br/>

     <div class="paymentMethods" >
      <h1>Choose your payment methods</h1>
      <br/>
      <br/>
<form action="" method="POST">
        <div class="bkash">
        <h3>BKash</h3>
      <a href="rocket.html"><img src="bkash.png"  style="width: 90px;border: 1px white solid;">
        <button name="bkash">Choose</button>
       </a>
     </div>
        <div class="rocket">
        <h3>Rocket</h3>
       <a href="rocket.html"><img src="rocket.jpg"  style=" width: 90px;border: 1px white solid;"></a>
        <button name="rocket">Choose</button>
       
      </div>

      <div class="bkash">
        <h3>Upay</h3>
       <img src="upay.png"  style=" width: 90px;border: 1px white solid;">
        <button name="upay">Choose</button>

      </div>

      <div class="rocket">
        <h3>Ipay</h3>
       <img src="ipay.jpg"  style=" width: 90px;border: 1px white solid;">
        <button name="bkash">Choose</button>

      </div>

</div>
</form>
</body>
</html>