<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>    <body>
     <style>
      .test1{
        background-image:url(img/about.jpg); 
      }
    </style>
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage">
            <div class="test1">
               <div class="container">
                   <center>
                   <div id="bannerContent"><?php
        
            $pdo = new PDO("mysql:host=localhost;dbname=store", $username="root", $password="");
            // execute the stored procedure
            $sql = 'CALL adminview()';
            // call the stored procedure
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        
        ?>
        <p><a href="add_product.php" role="button" class="btn btn-primary btn-block">Back to admin panel</a></p><br><center><h1><u>User Purchase Information</u></h1></center><br>
         <center><table cellpadding="55" cellspacing="30" ;><table border="40">
                	<tr width="200px"><th> Id</th>
                		<th>User_id</th>
				<th>Item_id</th>
				<th>Booking status</th>
				

                	<br><br></tr>
            <?php while ($r = $q->fetch()): ?>
                
           
         <tr><td><?php echo ($r['id']);?>&nbsp;<br></td>
         	<td><?php echo ($r['user_id']);?>&nbsp;<br></td>
         	<td><?php echo ($r['item_id']);?>&nbsp;<br></td>
         	<td><?php echo ($r['status']);?>&nbsp;<br></td>
         	
            <?php endwhile; ?>
			</tr>
                	
                </table>
                <br><br>