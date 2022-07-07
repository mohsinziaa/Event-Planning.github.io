<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hirePhotographer</title>
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

        .dropdown-menu li a:hover{
            background-color: transparent;
        }

        #availablity {
            text-align: center;
            color: black;
            font-weight: bold;
            font-style: italic;
        }

        #serviceBoxImg {
            width: 100%;
            position: absolute;
            z-index: -1;
            opacity: 0.7;
        }

        .detailsBox {
            display: flex;
            flex-direction: column;
            background-color: black;
            color: white;
        }

        .textBox {
            margin-top: 25px;
            margin-left: 430px;
            width: 45%;
            font-weight: bold;
            font-style: italic;
        }
        .textBox h3{
            padding: 5px 0px;
        }

        .textBox button{
            background-color: white;
            color: black;
            border-radius: 15px;
            border: 5px solid white;
            width: 20%;
            font-weight: bold;
            margin-left: 250px;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .textBox button:hover{
            color: goldenrod;
        }

        .detailsBox img {
            height: 500px;
            width: 100%;
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

    <h1 id="availablity">
        Available Photographers
    </h1>


    <?php                  

    $conn = mysqli_connect("localhost","root","","projectdb");

    if(!$conn){
        // echo "Successfully Inserted!";
        die("Sorry failed to connect to your data base : ".mysqli_connect_error());
    }

    else{
        // echo "Connection was successful <br>";
    }

    $sql = "SELECT * FROM `projectdb`.`serviceTable` where cateogary like 'Photographers%'";
    $result = mysqli_query($conn,$sql);

    echo "<div class='detailsBox'>";

            while($row = mysqli_fetch_array($result)) {
                foreach($result as $row){ 
                    echo "<img src='studio_images/".$row['image']."' download >";
                    echo "<div class='textBox'>";
                    echo "<h3>-Studio Name: ".$row['productName']."</h3>";
                    echo "<h3>-Photographer's ID: ".$row['productID']."</h3>";
                    echo "<h3>-Photographer's rent: ".$row['price']."</h3>";
                    echo "<h3>-Service available in: ".$row['productAddress']."</h3>";
                    echo "<a href='photographerBooking.php'><button>Book Now</button></a>";
                    echo "</div>"; 
                }
            }        
    ?>


</body>

</html>