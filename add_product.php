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


if($_POST)
{

$name = $_POST["name"];
$price = $_POST["price"];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$cat_id=$_POST["cat_id"];
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO products (name, price, image,cat_id)
    VALUES ('$name', $price,'$target_file',$cat_id)";
    if ($conn->query($sql) === TRUE) {
          header("Location:products1.php");
    } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
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

</head>
<body>

   	 <?php include("include1/header.php");?>
   	<div class="container-fluid">
	<?php include("include1/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
  	<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#c4e17f">
	<h1><span class="glyphicon glyphicon-tag"></span>Add new Product  </h1></div><br>
	<div class="panel-body" style="background-color:#E6EEEE;">
		<div class="col-lg-7">
        <div class="well">
        <form action="add_product.php" method="post" name="form" enctype="multipart/form-data">
        <p>Title</p>
        <input class="input-lg thumbnail form-control" type="text" name="name" id="name" autofocus style="width:100%" placeholder="Product Name" required>
<p>Add Image</p>
<div style="background-color:#CCC">
<?php
//<input type="file" style="width:100%" name="" class="btn thumbnail" id="" >
?>
<input type="file" name="fileToUpload" id="fileToUpload" style="width:100%"  class="btn thumbnail">
</div>
</div>
<div class="well">
<h3>Pricing</h3>
<p>Price</p>
<div class="input-group">
      <div class="input-group-addon">Rs</div>
      <input type="price" class="form-control" name="price" id="price"  placeholder="0.00" required>
    </div><br>


    </div>
        </div>
        <div class="col-lg-5">
        <div class="well">
<h3>Category</h3>
<p>Product type</p>
<p>1-Portrait</p>
<p>2-Munjae lee</p>
<p>3-Sketch</p>
<p>4-Oil Paintings</p>
<p>5-Scenary</p>
<input type="price" name="cat_id" id="cat_id" class="form-control" placeholder=" " required>
<br>
</div>
</div>

<div align="center">
    <button type="reset" name="submit" id="submit" class="btn btn-danger" style="width:100px; height:60px"> Cancel</button>
    <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px" onClick="location.href='products1.php'"> Add Product</button>
    </div>
        </form>

	</div>
</div></div></div>
<?php include("include1/js.php"); ?>
</body>
</html>
