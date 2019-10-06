<!DOCTYPE html>
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body>

<?php
$nameErr = $emailErr = $genderErr = "";
$name = $email = $website = $comments = $gender = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["name"]))
    {
        $nameErr="Name Field Required";
    }
    else
    {
        $name=test_fn($_POST["name"]);
    }
    if(empty($_POST["email"]))
    {
        $emailErr="Email Field Required";
    }
    else
    {
        $email=test_fn($_POST["email"]);
    }
    if(empty($_POST["gender"]))
    {
        $genderErr="Gender Field Required";
    }
    else
    {
        $gender=test_fn($_POST["gender"]);
    }
    $website=test_fn($_POST["website"]);
    $comments=test_fn($_POST["comments"]);
    
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
<p><span class="error">* Required Fields </span></p>
Name: <input type="text" name="name">
<span class="error">* <?php echo $nameErr ?> </span>
<br><br>
Email: <input type="text" name="email">
<span class="error">* <?php echo $emailErr ?> </span>
<br><br>
Website: <input type="text" name="website"><br><br>
Comments: <textarea name="comments" row="5" cols="40"></textarea><br><br>
Gender: <input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="others">Others 
<span class="error">* <?php echo $genderErr ?> </span>
<br><br>
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