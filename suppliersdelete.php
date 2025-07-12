<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="css/watchesdelete.css">

    <title>

        Delete a register coloumn

    </title>

</head>
 

<body>

    <nav class="navbar background">
        <div class="logo">
                
            <h2>spCvl_inventory</h2>
         </div>

        <ul class="nav-list">
            

          <!--<div class="logo">
                
                <li>spCvl inventory</li>
             </div>
            -->
           
            <li><a href="all admin.html">Back</a></li>
            
            

           

        </ul>

 </nav>

    <section class="firstsection">

        <div class="box-main" style="width:70%;height:100%;">

            <div class="firstHalf">

          
            <h3 style="text-align:center;color:red;font-size:30px;">Enter Username</h3>
           <br>
           <br>
           <form method="post">
           <input type="text" name="username" placeholder="username">
           <button name="submit" style="border-radius:10px;font-size:20px;">Delete</button>
  </div>

        </div>
  </section>
  <?php 
    if(isset($_POST['submit']))
    {
   $con=mysqli_connect("localhost","root","","inventory_control_system");
   $db=mysqli_select_db($con,"inventory_control_system");
           $id = $_POST['username'];
           if($id)
           {
         $my =  mysqli_query($con,"DELETE FROM reg WHERE username='$id'");
            echo "<script>alert('Delete done');</script>";
            }}
           ?>
</body>
</html>
     
            