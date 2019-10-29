<?php

require_once 'config.php';

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty(trim($_POST['username']))){

        $username_err = "Username cannot be empty";

    } else {

        $sql = 'SELECT username from users WHERE username = ?';

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('s',$param_username);

        $param_username = trim($_POST['username']);

        if($stmt->execute()){
            
            $stmt->store_result();

            if($stmt->num_rows == 1){

                $username_err = "Username already exists";

            } else {

                $username = trim($_POST['username']);

            }
        } else {

            echo "Something went wrong, please try again later";

        }
        
        $stmt->close();

    }

    if(empty(trim($_POST['password']))){

        $password_err = "Password field cannot be empty";

    } elseif(strlen(trim($_POST['password'])) < 8) {

        $password_err = "Password must be atleast 8 characters long";

    } else {

        $password = trim($_POST['password']);

    }

    if(empty(trim($_POST['confirm_password']))){

        $confirm_password_err = "Confirm password field cannot be empty";

    } elseif(strlen(trim($_POST['confirm_password'])) < 8) {

        $confirm_password_err = "Password must be atleast 8 characters long";
    } else {

        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){

            $confirm_password_err = "Password mismatch";      
        }

    }

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        $sql = 'INSERT INTO users (username,password) VALUES (?,?)';

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ss',$username,$param_password);

        $param_password = password_hash($password,PASSWORD_DEFAULT);

        if($stmt->execute()){

            header("location: login.php");

        } else {

            Echo "Something went wrong, Please try again later";

        }

        $stmt->close();

    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2> Sign Up </h2>
<p> Fill in the details to sign up </p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="POST" >
<label> Username: </label> <br>
<input type = "text" name="username"> <br>
<span> <?php echo $username_err; ?> </span> <br>
<label> Password: </label> <br>
<input type = "password" name="password"> <br>
<span> <?php echo $password_err; ?> </span> <br>
<label> Confirm password: </label> <br>
<input type = "password" name="confirm_password"> <br>
<span> <?php echo $confirm_password_err; ?> </span> <br><br>
<input type="submit" value="Submit">
<input type="reset" value="Reset"> 
<p> Already a member? <a href='login.php'> Login </a> </p>

</body>
</html>