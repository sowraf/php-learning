<!DOCTYPE html>
<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Name: <input type="text" name="name"><br>
House Name: <input type="text" name="hName"><br>
<input type="submit">
</form>
  
  <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
     {
       $name=$_POST["name"];
       $hName=$_POST["hName"];
       if(empty($name))
          {
            echo "No Input for Name field"."<br>";
       }
       else
       { echo "Name: ".$name."<br>"; }
       
       if(empty($hName))
          {
            echo "No Input for House Name field"."<br>";
       }
       else
       { echo "House Name: ".$hName."<br>"; }
      }

      ?>
  
</body>
</html>
