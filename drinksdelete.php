<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bikesdelete.css">
  <title>Delete a Drinks Record</title>
</head>
<body>
  <nav class="navbar background">
    <div class="logo">      
      <h2>spCvl_inventory</h2>
    </div>
    <ul class="nav-list">
      <li><a href="admin.html">Back</a></li>
    </ul>
  </nav>
  
  <section class="firstsection">
    <div class="box-main" style="width:70%;height:70%;">
      <div class="firstHalf">  
        <h1 style="border-radius:10px;font-size:30px;text-align:center;">Enter Product ID</h1> 
        <br><br>
        <form method="post">
          <input type="text" name="id" placeholder="Product ID">
          <button name="submit" style="border-radius:10px;font-size:20px;text-align:center;">Delete</button>
        </form>

        <?php 
        if (isset($_POST['submit'])) {
          $con = mysqli_connect("localhost", "root", "", "inventory_control_system");
          $id = $_POST['id'];

          if ($id) {
            mysqli_query($con, "DELETE FROM drinks WHERE id='$id'");
            echo "<script>alert('Delete successful');</script>";
          }
        }
        ?>    
      </div>
    </div>
  </section>
</body>
</html>
