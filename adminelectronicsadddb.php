 
<?php 
$con=mysqli_connect("localhost","root","","inventory_control_system"); 
$db=mysqli_select_db($con,"inventory_control_system"); 
 $id = $_POST['id']; 
 $name = $_POST['name']; 
 $brand = $_POST['brand']; 
 $type = $_POST['type']; 
 $price = $_POST['price']; 
 $color = $_POST['color']; 
 $material = $_POST['material']; 
 $stock_quantity = $_POST['stock_quantity']; 
 $warranty = $_POST['warranty']; 
$query="insert into electronics(id,name,brand,type,price,color,material,stock_quantity,warranty)values('$id','$name','$brand','$type','$price','$color','$material','$stock_quantity','$warranty')"; 
$result = mysqli_query($con,$query); 

 if ($result) 
 { 
 /*echo ("<script LANGUAGE='JavaScript'>window.alert('added succefully');</script>"); */
 header("location:all admin.html");
  
} 
else
{
    echo "not";
}
?> 
