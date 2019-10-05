<!DOCTYPE html>
<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Name: <input type="text" name="name"><br>
House Name: <input type="text" name="hName"><br>
<input type="submit">
</form>
  
  <?php
  if($_SERVER["REQUEST_METHOD"]=="POST"]
     {
       $name=$_POST["name"];
       $hName=$_POST["hName"];
       if(empty($name))
          {
            echo "No Input";
       }
       else
       { echo "Name: ".$name; }
       
       if(empty($hName))
          {
            echo "No Input";
       }
       else
       { echo "House Name: ".$hName; }
  
</body>
</html>
