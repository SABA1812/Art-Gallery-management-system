<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
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
<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
</head>
<body>
  <?php include("include1/header.php");?>
   	<div class="container-fluid main-container">
	<?php include("include1/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
    <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Delete Product/Modify Product </h1></div><br>
<div class='table-responsive'>
<div style="overflow-x:scroll;">
<table class="table  table-hover table-striped" style="font-size:18px">
<tr><th>Instrument Id</th><th>Image</th><th>Name</th><th>Price</th><th>

  <?php  $sql = "SELECT *FROM products";
  $result = $conn->query($sql);
  $count = 0;
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
  	$name = $row["name"];
  	$id = $row["id"];
  	$price = $row["price"];
  	$img = $row["image"];





  ?>
  <tr>
  	<td>
  		<?php echo $id?>
  	</td>
  	<td>
  		<?php echo $name; ?>
  	</td>
  <td>
  		<img src="<?php echo $img; ?>"width="100">
  	</td>
  	<td>

  		<?php echo $price; ?>
  	</td>
  	<td>
  		<a href="delete.php?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-remove" style="font-size:20px;color:red;"></span></a> &nbsp;&nbsp;&nbsp;
  	</td>

  	<td>
  		<a href="modify.php?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
  	</td>
  </tr>




  <?php	$count++;
      }
  } else {
       $count = 0;
   } ?>


</table>
</div>

</div>

<nav align="center">


</nav>
</div></div>

<?php include("include1/js.php");?>
</body>
</html>
