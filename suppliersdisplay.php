<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="css/table.css">
 <link rel="stylesheet" href="css/watchesdisplay.css">
 
    <title>

        suppliers details-inventory control

    </title>

</head>
 

<body>

    <nav class="navbar background">
        <div class="logo">
                
            <h2>spCvl_inventory</h2>
         </div>

        <ul class="nav-list">
            

            <li><a href="suppliersadd.php">Add
            
            </a></li>
            <li><a href="all admin.html">Back
            
            </a></li>

            <li><a href="suppliersdelete.php">Delete</a></li>

           

        </ul>

 </nav>

    <section class="firstsection">

        <div class="box-main" style="width:70%;height:100%;">

            <div class="firstHalf">

          
           <h1 align="center">suppliers details</h1> 
           <br>
           <?php 
           $con=mysqli_connect("localhost","root",""); 
           $db=mysqli_select_db($con,"inventory_control_system"); 
           $query="select * from reg"; 
           $result=mysqli_query($con,$query); 
           echo "<table border='0' class='tab'>"; 
           echo "<tr>"; 
           echo " <th> userName</th><th> email</th><th> phoneno</th><th> password</th>"; 
           echo "</tr>"; 
    
           while($row=mysqli_fetch_array($result)) 
           { 
            echo "<tbody>
           <tr class='tr'>
           <td>".$row['username']."</td>
           <td>".$row['email']."</td> 
           <td>".$row['phno']."</td> 
           <td>".$row['password']."</td>
           
           </tr> 
           </tbody>";
           } 
           ?> 
          
           
  </div>

        </div>
  </section>
</body>
</html>
     
            