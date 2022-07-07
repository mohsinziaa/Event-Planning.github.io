<?php

$insert = false;


if(isset($_POST['productID'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to the data base failed!" . mysqli_connect_error());
    }
    
    // echo "Successfully connected to data base!";

    $userID=$_POST['buyerID'];
    $productID=$_POST['productID'];
    $buyerContact=$_POST['buyerContact'];
    $bookingDate=$_POST['date'];
    $cateogary = "Shadi Halls";   
    

    $sql=" INSERT INTO `projectdb`.`buyerTable` (`userID`, `productID`, `buyerContact`, `date`, `cateogary`) 
    VALUES ('$userID','$productID','$buyerContact', '$bookingDate', '$cateogary');";


    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully Inserted!";
        $insert=true;
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
    <title>ProvideHall</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <style>
        #navbarScroll li a {
            font-size: 1.3rem;
            margin: 0px 30px;
        }

        #navbarScroll li a:hover {
            color: black;
            font-weight: bold;
        }

        .heading h1 {
            text-align: center;
            color: white;
            /* position: relative; */
            /* margin-top: 20px; */
        }

        #serviceBoxImg {
            width: 100%;
            position: absolute;
            z-index: -1;
            opacity: 0.7;
        }

        .outerContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .form-box h1 {
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
            /* line-height: 100px; */
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

        .form-box input,textarea {

            border: 3px solid black;
            border-radius: 10px;
            width: 100%;
            padding: 3px 5px;
            margin: 4px 0px;
        }

        .buttonStyle {
            width: 40%;
            margin: 15px 0px;
            padding: 1px 0px;
            border: 2px solid black;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: white;
            background-color: black;
        }

        .buttonStyle:hover {
            color: blue;
        }

        .buttons {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        #after-submit{
            text-align: center;
            font-weight: bold;
            font-size: 1.8rem;
        }
        
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactUs.html">Contact Us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">Book Hall</a></li>
                            <li><a class="dropdown-item" href="#">Rent A Car</a></li>
                            <li><a class="dropdown-item" href="#">Book A Hotel</a></li>
                            <li><a class="dropdown-item" href="#">Hire A Photographer</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <img src="hallimage.jpg" alt="shadiHall.com" id="serviceBoxImg">

    <div class="outerContainer">
        <nav class="form-box">

            <form action="hallBooking.php" method="post">
                <h1>Enter Booking Details</h1>

                <input type="text" name="buyerID" id="buyerID" placeholder="Enter Your user ID " required>
                <input type="text" name="productID" id="productID" placeholder="Enter the ID of product" required>
                <input type="text" name="buyerContact" id="buyerContact" placeholder="Enter Your Contact Number" required>
                <input type="date" name="date" id="date" placeholder="Enter Date" required>

                <div class="buttons">
                <button class = "buttonStyle">Book Now</button>
                </div>
            </form>
        </nav>
    </div>

    <?php   
    if($insert == true){
        echo  "<h1 id='after-submit'>Your booking was recieved, We'll contact you shortly</h1>";
    }
    ?>

</body>
</html>    