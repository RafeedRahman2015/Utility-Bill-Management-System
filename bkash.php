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
   if (isset($_POST['Verify'])) {
   	$number=$_POST['number'];
   	$trx=$_POST['trx'];

   	  $sql="insert into electricitypay(id,pay_number,transaction_id) values('$uid','$number','$trx');";
   	  if(mysqli_query($conn,$sql)){
   	  	echo "<script>alert('Thanks For Payment!!!You will be notified soon')</script>";
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



          <div class="transaction">
          	<form action="" method="POST">
          	<h2>Pay the money to Bkash Number = 01712812831</h2>
          	<br/>
          	<br/>

          	<h2>After Payment Please Verify</h2>
          	<br/>
          	<br/>

          	<input type="text" name="number" placeholder="your number of Bkash">
           	<br/>
          	<br/>
          	<input type="text" name="trx" placeholder="transaction id">
          	<br/>
          	<br/>


	 <button name="Verify">Verify</button>
           </form>

           </div>
       </body>
       </html>