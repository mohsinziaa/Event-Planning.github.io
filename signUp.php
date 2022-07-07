<?php

$isCreated = false;

if(isset($_POST['userPassword'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to the data base failed!" . mysqli_connect_error());
    }

    $userID = $_POST['userID'];
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];

    $sql=" INSERT INTO `projectdb`.`logintable` (`userID`, `userName`, `userPassword`, `timeStamp`) 
    VALUES ('$userID', '$userName', '$userPassword', current_timestamp());";

    if($con->query($sql) == true){
        // echo "Successfully Inserted!";
        $isCreated=true;
    }

    else{
        echo "ERROR : $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&display=swap" rel="stylesheet">    
    
    <style>
        body,
        .signin {
            background-color: #d3d3d3;
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .login {
            position: relative;
            height: 570px;
            width: 405px;
            margin: auto;
            padding: 65px 60px;
            background: url(https://i.picsum.photos/id/249/3000/2000.jpg?hmac=U2oOCXdXUwt6ftKMC4icF6eS8dGDUZJM_0-qi0JEqjk) no-repeat center center;
            background-size: cover;
            box-shadow: 0px 30px 60px -5px #000;
        }

        form {
            padding-top: 30px;
        }

        .active {
            border-bottom: 2px solid #1161ed;
            cursor: pointer;
        }

        .nonactive {
            color: rgba(255, 255, 255, 0.2);
        }

        h2 {
            padding-left: 12px;
            font-size: 22px;
            text-transform: uppercase;
            padding-bottom: 5px;
            letter-spacing: 2px;
            display: inline-block;
            font-weight: 100;
        }

        h2:first-child {
            padding-left: 0px;
        }

        span {
            text-transform: uppercase;
            font-size: 13px;
            /* opacity: 0.4; */
            display: inline-block;
            position: relative;
            top: -58px;
            transition: all 0.5s ease-in-out;
        }

        .text {
            border: none;
            width: 89%;
            padding: 10px 20px;
            display: block;
            height: 13px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.5);
            border: 2px solid rgba(255, 255, 255, 0);
            overflow: hidden;
            margin-top: 15px;
            transition: all 0.5s ease-in-out;
        }

        .text:focus {
            outline: 0;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            background: rgba(0, 0, 0, 0);
        }

        .text:focus+span {
            opacity: 0.6;
        }

        input[type="text"],
        input[type="password"] {
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            font-weight: bold;
        }



        input {
            display: inline-block;
            padding-top: 20px;
            font-size: 14px;

        }

        h2,
        span,
        .custom-checkbox {
            margin-left: 15px;
        }

        .custom-checkbox {
            -webkit-appearance: none;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 8px;
            border-radius: 2px;
            display: inline-block;
            position: relative;
            top: 6px;
        }

        .custom-checkbox:checked {
            background-color: rgba(17, 97, 237, 1);
        }

        .custom-checkbox:checked:after {
            content: '\2714';
            font-size: 10px;
            position: absolute;
            top: 1px;
            left: 4px;
            color: #fff;
        }

        .custom-checkbox:focus {
            outline: none;
        }

        label {
            display: inline-block;
            padding-top: 10px;
            padding-left: 5px;
        }

        .signin {
            background-color: #1161ed;
            color: #FFF;
            width: 99%;
            padding: 10px 20px;
            display: block;
            height: 39px;
            border-radius: 20px;
            margin-top: 26px;
            transition: all 0.5s ease-in-out;
            border: none;
            text-transform: uppercase;
        }

        .signin:hover {
            background: #4082f5;
            box-shadow: 0px 4px 35px -5px #4082f5;
            cursor: pointer;
        }

        .signin:focus {
            outline: none;
        }

        hr {
            border: 1px solid rgb(150, 150, 150);
            top: 70px;
            position: relative;
        }

        a {
            text-align: center;
            display: block;
            top: 90px;
            position: relative;
            text-decoration: none;
            /* color: rgba(255, 255, 255, 0.2); */
            color: white;
        }

        #after-submit{
            color: black;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            font-size: 1.9rem;
            font-family:'Lobster Two', sans-serif;
        }
    </style>
</head>

<body>

    <div class="login">
        <h2 class="nonactive"> sign in </h2>

        <h2 class="active"> sign up </h2>
        <form action="signUp.php" method="post">


            <input type="text" class="text" name="userName" required> 
            <span>username</span>

            <br>

            <br>

            <input type="text" class="text" name="userID" required>
            <span>user ID</span>

            <br>

            <br>

            <input type="password" class="text" name="userPassword" id="password" required>
            <span>password</span>
            <br>
            <br>
            <input type="password" class="text" id="confirm_password" required>
            <span>confirm password</span>

            <script>
                var password = document.getElementById("password")
                    , confirm_password = document.getElementById("confirm_password");

                function validatePassword() {
                    if (password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Passwords Don't Match");
                    } else {
                        confirm_password.setCustomValidity('');
                    }
                }
                password.onchange = validatePassword;
                confirm_password.onkeyup = validatePassword;
            </script>

            <button class="signin">
                Sign Up
            </button>


            <hr>

            <a href="logIn.php">Sign In?</a>
        </form>

    </div>
    
    <?php
        if($isCreated == true){
            echo  "<p id='after-submit'>Thankyou for Creating An Account. Click on Sign In to continue!</p>";
        }
    ?>

</body>

</html>