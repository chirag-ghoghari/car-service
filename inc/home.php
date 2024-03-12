<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .person_img{
            width: 15%;
            border-radius: 50%;
            margin-left: 25%;
        }
    </style>
</head>
<body>
<nav class="navbar shadow-lg navbar-expand-lg navbar-dark bg-dark sticky-top d-flex justify-content-between" style="background-color: #e3f2fd;">
    <div class="container ps-5">
        <a class="navbar-brand" href="index.php">Car Service</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutus">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contect">Contact</a>
                </li>

            </ul>
            <div class="dropdown">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="./img/person.png" alt="" class="person_img">
                    <span class="text-white"><i class="fa-solid fa-caret-down"></i></span>
                </div>  
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="./view-profile.php">View Profile</a></li>
                    <li><a class="dropdown-item" href="./view_service.php">View Services</a></li>
                    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</body>
</html>

