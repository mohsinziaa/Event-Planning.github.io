<?php
    $isAuthorized=false;
    if(isset($_POST['buttonLogin'])){

        $server = "localhost";
        $username = "root";
        $password = "";
    
        $con = mysqli_connect($server, $username, $password);
    
        if(!$con){
            die("Connection to the data base failed!" . mysqli_connect_error());
        }
    
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];
        
        // echo "User Name = ".$userName;
        // echo "User Password = ".$userPassword;
        // $query = "SELECT * from `projectdb`.`logintable` where userName like '$userName' and userPassword = '$userPassword'"; 
    
    $query = "SELECT * from `projectdb`.`logintable` where userName = '$userName' and userPassword = '$userPassword'"; 
    $fire = mysqli_query($con,$query);
        
        if($fire){
            if(mysqli_num_rows($fire)){
            $isAuthorized=true;
           }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShaadiWaadi</title>

    <style>
        * {
            padding: 0px;
            margin: 0px;
        }

        .outerContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-box h1 {
            text-align: center;
            font-size: 1.8rem;
            line-height: 100px;
        }

        .form-box {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 20px 40px;
            height: 450px;
            border: 4px solid black;
            width: 27%;
            border-radius: 20px;
        }

        .form-box input {

            border: 3px solid black;
            border-radius: 10px;
            width: 96%;
            padding: 7px 5px;
            margin: 10px 0px;
        }

        .buttonStyle {
            width: 31%;
            margin: 15px 0px;
            padding: 1px 0px;
            border: 2px solid black;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: white;
            background-color: lightgray;
        }
        
        .buttonStyle:hover{
            color : blue;            
        }

        .buttons {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }


        #after-submit {
            color: black;
            font-weight: bold;
            font-size: 20px;
            text-decoration: underline;
            text-align: center;
        }

    </style>

</head>

<body>

    <div class="outerContainer">
        <nav class="form-box">

            <form action="loginPage.php" method="post">
                <h1>Enter Your Details</h1>

                <input type="text" name="userName" id="userName" placeholder="Enter Your User Name" required>

                <input type="password" name="userPassword" placeholder="Enter Your Password" required>

                <div class="buttons">
                    <button class="buttonStyle" name="buttonLogin">Login</button>
                    <a class="buttonStyle" href="#">Forget Password</a>
                    <a class="buttonStyle" href="projectDB.php">Create Account</a>
                </div>
            </form>
        </nav>
    </div>

        <?php
            if($isAuthorized == true){
                echo  "<p id='after-submit'>Welcome to the our Website!</p>";
                header("Location: index.html");
                exit();
            }
            else{
                echo  "<p id='after-submit'>Invalid ID or Password!</p>";
            }
        ?>

</body>

</html>