<?php

session_start();

if(isset($_SESSION['username'])){

header('location: welcome.php');

}

require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty(trim($_POST['username']))){

        $username_err = "Please enter the username";
    
    } else {

        $username = trim($_POST['username']);

    }

    if(empty(trim($_POST['password']))){

        $password_err = "Please enter password";

    } else {

        $password = trim($_POST['password']);

    }

    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id,username,password FROM users WHERE username = ?";

        if($stmt = $conn->prepare($sql)){

            $stmt->bind_param('s',$username);

            if($stmt->execute()){

                $stmt->store_result();

                if($stmt->num_rows == 1){

                    $stmt->bind_result($id,$username,$hash_password);

                    if($stmt->fetch()){
                    
                        if(password_verify($password,$hash_password)){

                            session_start();

                            $_SESSION['username'] = $username;

                            header('location: welcome.php');

                        } else {

                        $password_err = "Password incorrect";

                        }

                    }

                } else {

                    $username_err = "Invalid username";

                }
            } else {

                echo "Something went wrong, please try again later";

            }

            $stmt->close();    

        }

    }

    $conn->close();

}

?>


<!DOCTYPE html>
<html>
<head>
</head>

<body>
<h2> Login </h2>
<p> Fill in th details to login <p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="POST">
<label> Username: </label> <br>
<input type="text" name="username"> <br>
<span> <?php echo $username_err ?> </span><br>
<label> Password: </label> <br>
<input type="password" name="password"> <br>
<span> <?php echo $password_err ?> </span><br>
<input type="submit" value="Login"><br>
<p> Not a member? <a href="register.php"> Sign Up </a> </p>
</form>
</body>
</html>