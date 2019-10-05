<!DOCTYPE html>
<html>
<body>

<?php
$name = $email = $website = $comments = $gender = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name=test_fn($_POST["name"]);
    $email=test_fn($_POST["email"]);
    $website=test_fn($_POST["website"]);
    $comments=test_fn($_POST["comments"]);
    $gender=test_fn($_POST["gender"]);
}

function test_fn($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
Name: <input type="text" name="name"><br><br>
Email: <input type="text" name="email"><br><br>
Website: <input type="text" name="website"><br><br>
Comments: <textarea name="comments" row="5" cols="40"></textarea><br><br>
Gender: <input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="others">Others <br><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php

echo "<h2> User Input </h2>";
echo "<br>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $website;
echo "<br>";
echo $comments;
echo "<br>";

?>

</body>
</html>