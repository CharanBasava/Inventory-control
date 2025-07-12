<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="css/table.css">
 <link rel="stylesheet" href="css/watchesdisplay.css">
    <title>
        Home page-inventory management
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
            <li><a href="adminwatchesadd.php">Add     
            </a></li>
            <li><a href="all admin.html">Back      
            </a></li>
            <li><a href="adminwatchesdelete.php">Delete</a></li>   
        </ul>
 </nav>
    <section class="firstsection">
        <div class="box-main" style="width:70%;height:100%;">
            <div class="firstHalf">  
           <h1 align="center">Watches details</h1> 
           <br>
           <?php 
           $con=mysqli_connect("localhost","root",""); 
           $db=mysqli_select_db($con,"inventory_control_system"); 
           $query="select * from watch"; 
           $result=mysqli_query($con,$query); 
           echo "<table border='0' class='tab'>"; 
           echo "<tr>"; 
           echo "<th> ID </th> <th> Name</th><th> BRAND </th><th> TYPE</th><th> PRICE</th><th>  COLOR</th><th> MATERIAL </th><th> STOCK_QUANTITY </th><th> WARRANTY </th>"; 
           echo "</tr>"; 
           while($row=mysqli_fetch_array($result)) 
           { 
            echo "<tbody>
           <tr class='tr'>
           <td>".$row['id']."</td>
           <td>".$row['name']."</td> 
           <td>".$row['brand']."</td>
           <td>".$row['type']."</td>
           <td>".$row['price']."</td>
           <td>".$row['color']."</td> 
           <td>".$row['material']."</td>
           <td>".$row['stock_quantity']."</td>
           <td>".$row['warranty']."</td> 
           </tr> 
           </tbody>";
           } 
           ?>    
  </div>
        </div>
  </section>
</body>
</html>
     
            