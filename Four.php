<!DOCTYPE html>
<html>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Name: <input type="text" name="name"><br><br>
Email: <input type="text" name="email"><br><br>
Website: <input type="text" name="website"><br><br>
Comments: <textarea name="comment" rows="5" cols="40"></textarea><<br><br>
Gender: <input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other <br><br>
<input type="Submit">
</form>
</body>
</html>
