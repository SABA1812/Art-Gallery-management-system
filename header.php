<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                          
                       </button>
                       <a href="index.php" class="navbar-brand">Art Gallery Management System </a>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['email'])){
                           ?>
                            <li><a href="index.php"> Home</a></li>
                             <li><a href="about.php"> About</a></li>
                           <li><a href="cart.php"> Cart</a></li>
                           <li><a href="settings.php"> Settings</a></li>
                           <li><a href="logout.php"> Logout</a></li>
                           <?php
                           }else{
                            ?>
                            <li><a href="index.php"> Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="admin.php">Admin</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                           <li><a href="login.php">Login</a></li>
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>