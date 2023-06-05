<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>error</title>
</head>
<body>
    <?php
        // set utf8
        header("content-type:text/html;charset=utf-8");
        // post form
        $username = $_POST['username'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        // email checker
        $regex="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
        // mobile checker
        $mobile_checker = $mobile;

        // errors check 
        if(empty($username) || empty($mobile) || empty($email) || empty($password) || empty($password2)){
            echo "<script>alert('There were errors with your form');</script>";
            
            $miss = "Please check your: ";

            if(empty($username)){
                $miss = $miss . "username ";
            };
            if(empty($mobile)){
                $miss = $miss . "mobile number ";
            };
            if(empty($email)){
                $miss = $miss . "email ";
            };
            if(empty($password)){
                $miss = $miss . "password ";
            };
            if(empty($password2)){
                echo "<script>alert('".$password2."');</script>";
                $miss = $miss . "confirm password ";
            };

            echo "<script>alert('".$miss."');</script>";
            echo "<script>window.location='register.html';</script>";
    
        }
        // check if password and confirm password is same
        else if ($password != $password2){
            echo "<script>alert('The confirm password do not match');</script>";
            echo "<script>window.location='register.html';</script>";
        }
        // check the legality of phone numbers
        else if (!$mobile_checker="/^1[0-9]{10}$/"){
            echo "<script>alert('Your type a invalid number, please check again');</script>";
            echo "<script>window.location='register.html';</script>";
        }
        // check the legality of email 
        else if (!preg_match($regex,$email)){
            echo "<script>alert('Your type a invalid email, please check again');</script>";
            echo "<script>window.location='register.html';</script>";
        }

        // link to database
        $conn = new mysqli("localhost","nhwwnhww","123Wjnhwwnhww","website");

        // check is the name repected
        $sql1 = "SELECT * FROM user_table WHERE username='{$username}'";
        $result = mysqli_query($conn,$sql1);
        $rows = mysqli_num_rows($result); 
        if($rows>0) {
            echo "<script>alert('The username has already been registered, please change a username and register again')</script>";
            echo "<script>window.location='register.html'</script>";
        }
        else {
            echo "Username is available\n";
            // set utf8
            mysqli_query($conn,"set names utf8");

            // insert user information
            $sqlinsert = "INSERT INTO `user_table`(`username`, `mobile`, `email`, `password`) VALUES ('{$username}','{$mobile}','{$email}','{$password}')";
            $result = mysqli_query($conn,$sqlinsert);
            if(! $result )
                {
                die('Could not enter data: ' . mysqli_error($conn));
                }
            echo "Congratulations on your successful registration\n";
            echo "<script>alert('Congratulations on your successful registration')</script>";
            echo "<script>window.location='login.html'</script>";
            // close mysqli
            mysqli_close($conn);

        }
    ?>


</body>
</html>