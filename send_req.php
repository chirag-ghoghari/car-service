<?php
session_start();
ob_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
$uname = $_SESSION['username'];
$sendReq = "";
require 'connection.php';
if (isset($_GET['sendReq'])) {
    $sendReq = $_GET["sendReq"];
}
$selectqry = "select * from  user where username='$uname'";
$result = mysqli_query($conn, $selectqry);
$row = mysqli_fetch_array($result);

$qry2 = "select * from services where isActive=1";
$result2 = mysqli_query($conn, $qry2) or die('Not come');
$ammount = 0;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('./phpmailer/PHPMailer.php');
require('./phpmailer/SMTP.php');
require('./phpmailer/Exception.php');
function sendMail($email)
{

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'developkk1012@gmail.com';                     //SMTP username
        $mail->Password = 'gkmf smjz khwa xsic';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        # $mail->setFrom('lrdhingadiya@gmail.com', 'Estate');
        $mail->From = "developkk1012@gmail.com";
        $mail->FromName = "Car Service";
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Request to get service';
        $mail->Body = "<h1>You are requested a service</h1>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Service</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="background-color: #e3f2fd;">
        <div class="container-fluid ps-5">
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
                <div class="d-flex pe-5">
                    <a href="./logout.php" class="btn btn-light">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="send-service-req py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h1>Send Service Request</h1>
                </div>
            </div>
            <form method="post" class="border p-5 rounded">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="oname" class="form-label">Owner Name</label>
                            <input type="text" class="form-control" id="oname" name="oname"
                                value="<?php echo $row['username'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="vname" class="form-label">Vehicle name</label>
                            <input type="text" class="form-control" id="vname" name="vname" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" cols="30" rows="5" value="" class="form-control"
                                required></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="number" class="form-control" id="contact" name="contact" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="vnumber" class="form-label">Vehicle Number</label>
                            <input type="text" class="form-control" id="vnumber" name="vnumber" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="vnumber" class="form-label">Select Services</label>
                            <hr>
                            <?php

                            while ($r = mysqli_fetch_assoc($result2)):

                                if ($r['sname'] == $sendReq) {
                                    $ammount = $ammount + $r['price'];
                                    ?>
                                    <input type="checkbox" class="form-check-input" id="<?php echo $r['sname'] ?>"
                                        name="services[]" value="<?php echo $r['sname'] ?>" checked >
                            <?php
                                } else { ?>
                                <input type=" checkbox" class="form-check-input" id="<?php echo $r['sname'] ?>"
                                        name="services[]" value="<?php echo $r['sname'] ?>" >
                           <?php } ?>
                               
                                <label for=" <?php echo $r['sname'] ?>">
                                <?php echo $r['sname'] . " ( " . $r['price'] . " )" ?></label>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <label>
                    <?php echo $ammount ?>
                </label></br>
                <button type="submit" class="btn btn-dark" name="submit" onclick="check();">Pay Now</button>
                <?php
                if (isset($_POST['submit'])) {
                    // // print_r($_POST);
                    $oname = $_POST['oname'];
                    $contact = $_POST['contact'];
                    $address = $_POST['address'];
                    $vnumber = $_POST['vnumber'];
                    $vname = $_POST['vname'];
                    $services = implode(',', $_POST['services']);
                    $qry = "INSERT INTO `service_request`(`oname`, `contact`, `address`, `vnumber`, `vname`, `services`) 
                        VALUES ('$oname','$contact','$address','$vnumber','$vname','$services')";
                    $result = mysqli_query($conn, $qry);
                    //alert("Successfully send request")
                    header('Location: view_service.php');
                    sendMail( $_SESSION['email']);
                    if ($result) {
                        //  alert("Request send successfully!");
                
                    } else {
                        //  alert('Not inserted! ');
                    }
                    // var name = jQuery('#name').val();
                    // var amt = jQuery('#amt').val();
                    // var ammount = $
                    // var options = {
                    //     "key": "rzp_test_YrkwoYBUUy52Ww", // Enter the Key ID generated from the Dashboard
                    //     "amount": amt * 100,
                    //     "currency": "INR",
                    //     "name": "Acme Corp",
                    //     "description": "Test Transaction",
                    //     "image": "https://example.com/your_logo",
                    //     "handler": function(response) {
                    //         jQuery.ajax({
                    //             type: 'post',
                    //             url: 'payment.php',
                    //             data: "payment_id=" + response.Razorpay_payment_id + "&amt=" + amt + "&name" + name,
                    //         });
                    //     },
                    //     "theme": {
                    //         "color": "#3399cc"
                    //     }
                    // };
                    // var rzp1 = new Razorpay(options);
                    // rzp1.on('payment.failed', function(response) {
                    //     alert(response.error.code);
                    //     alert(response.error.description);
                    //     alert(response.error.source);
                    //     alert(response.error.step);
                    //     alert(response.error.reason);
                    //     alert(response.error.metadata.order_id);
                    //     alert(response.error.metadata.payment_id);
                    // });
                    // rzp1.open();
                    // e.preventDefault();
                }
                ?>
                <!-- <button type="submit" class="btn btn-success" name="back">Back</button> -->
            </form>
        </div>

    </div>
    <script>
        function handleCheckboxChange(checkbox, value) {
            if (checkbox.checked) {
                $ammount = $ammount + value;
                console.log("Checkbox " + checkbox.value + " is checked");
                // You can perform any action you want here, such as sending an AJAX request to a server
            } else {
                console.log("Checkbox " + checkbox.value + " is unchecked");
                // You can perform any action you want here
            }
        }
    </script>
    <script type="text/javascript">
        function check() {
            var inputs = document.querySelectorAll("input[type='checkbox']");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].checked) {
                    return true;
                }
            }
            alert("You have to select at least one.");
            return false;
        }
    </script>
    <script type="text/javascript">

    </script>
    <!-- Services div -->
    <?php include './inc/footer.php' ?>

    <!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php
ob_end_flush();
?>