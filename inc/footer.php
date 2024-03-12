    <div class="services py-5" id="service">
        <div class="container">
            <h2 class="text-center mb-5">OUR SERVICES</h2>
            <div class="row">
                <?php
                $qry = "select * from services where isActive='1'";
                $result = mysqli_query($conn, $qry);
                while ($r = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="./img/<?php echo $r['image']?>" class="card-img-top" alt="Service 1">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $r['sname']?></h5>
                            <p class="card-text"><?php echo $r['serviceDesc']?></p>
                           
                            <a href="send_req.php?sendReq=<?php echo $r['sname'];?>" class="btn btn-dark">Send Request</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    
    <!-- why car servies -->
    <div class="container">
        <div>
            <h2 class="text-center text-uppercase">Why Car Service</h2>
        </div>
        <div class="d-flex py-5 row gx-5">
            <div class="col-6">   
                <img src="./img/car_garage.jpg" alt="" class="w-100 shadow-lg  bg-body rounded">   
            </div>
            <div class="col-6"> 
                <div class="text-center my-5">
                    <h1 class="text-primary font-weight-bold">500+</h1>
                    <p>Satisfied Customer in india</p>
                </div>
                <div class="text-center my-5">
                    <h1 class="text-primary font-weight-bold txt-size">20+</h1>
                    <p>Years of Experiwnce</p>
                </div>
                <div  class="text-center my-5">
                    <h1 class="text-primary font-weight-bold txt-size">10K</h1>
                    <p>Cars Services</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- About Us div -->
    <div class="about py-5" id="aboutus">
        <div class="container">
            <h2 class="text-center mb-5">ABOUT US</h2>
            <div class="row row-gap-5">
                <div class="col-md-6">
                    <div class="card p-4 shadow">
                        <h3>Our Mission</h3>
                        <p>Car Service’s mission is to enable premium quality care for your luxury car service at affordable pricing . We ensure real-time updates for complete car care needs with a fair and transparent pricing mechanism.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4 shadow">
                        <p>Unit no.4, Katargam Warehousing Pvt. Ltd., Behind Reliance Smart Mall, Katargam , Surat , Gujarat 394005</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact div -->
    <div class="contact py-5 text-center" id="contect">
        <div class="container card border-dark">
            <h2 class="text-center mb-5 pt-4">CONTACT US</h2>
            <div>
                <h4>Contact Information</h4>
                <p>Email: hello@carservice.com</p>
                <p>Phone: +1 (123) 456-7890</p>
                <p>Address: 123 Vivekanand Complex,Surat,Gujrat</p>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; Car Service by three partners</p>
                </div>
            </div>
        </div>
    </footer>