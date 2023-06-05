<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // set utf8
        header("content-type:text/html;charset=utf-8");
        // post form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // check if empty
        if (empty($username) || empty($password)){
            // both
            if (empty($username) && empty($password)){
                echo "<script>alert('You have enter anything ,please enter something');</script>";
            }
            // username
            elseif (empty($username)){
                echo "<script>alert('Please enter your username');</script>";
            }
            // password
            else {
                echo "<script>alert('Please enter your password');</script>";
            }
            echo "<script>window.location='login.html';</script>";
        }

        // link to database
        $conn = new mysqli("localhost","nhwwnhww","123Wjnhwwnhww","website");

        $sql = "SELECT `username`, `mobile`, `email`, `password` FROM `user_table` WHERE `username` = '{$username}' AND `password` = '{$password}'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        if (!$row>0){
            echo "<script>alert('Wrong user name or password, please try again')</script>";
            echo "<script>window.location='login.html'</script>";
        }
        else{
            if(! $result )
            {
            die('Could not enter data: ' . mysqli_error($conn));
            }
            echo "Congratulations on your successful login\n";
            echo "<script>alert('Congratulations on your successful login')</script>";
            echo "<script>window.location='../home_page/home.php'</script>";
            // close mysqli
            mysqli_close($conn);
        }
        

    ?>
</body>
</html>