<?php
    $conn = new mysqli('localhost',"Mugesh",'12345$','restaurant');
    if($conn->connect_error){
        die("connection failed " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO booking (`NAME`, `EMAILID`, `DATE`, `TIME`, `PERSONS`, `NOTES`) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param( "sssiss",$name, $email, $date, $time, $persons, $notes);
    $stmt1="SELECT SUM(PERSONS) FROM booking WHERE DATE=";
    if(isset($_POST["submit"])){
      $date1=$_POST['DATE'];
      $name=$_POST['NAME'];
      $email=$_POST['EMAIL'];
      $notes=$_POST['MESSAGE'];
      $date=$_POST['DATE'];
      $time=$_POST['TIME'];
      $persons=$_POST['PERSONS'];
      $stmt1 .= "\"" . $date . "\"";
      $result = $conn->query($stmt1);
      if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $p=$row["SUM(PERSONS)"]+ $persons;
      } else {
        echo("thank you for booking");
        //$sql= "INSERT INTO `message`(`NAME`, `EmailID`, `SUBJECT`, `MESSAGE`) VALUES ($name,$email,$subject,$messages);";  
        $stmt->execute();
        /*if ($stmt->execute() === TRUE) {
            echo "Message sent";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }*/
        echo "done";
      }
      if($p<=8){
        echo("thank you for booking");
        //$sql= "INSERT INTO `message`(`NAME`, `EmailID`, `SUBJECT`, `MESSAGE`) VALUES ($name,$email,$subject,$messages);";  
        $stmt->execute();
        /*if ($stmt->execute() === TRUE) {
            echo "Message sent";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }*/
        echo "done";
    }
    else{
      echo "Sorry the booking for that day has reached capacity";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Villa77</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Villa<em>77</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="book-table.php">Book A Table</a></li>

                <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.html">About Us</a>
                      <a class="dropdown-item" href="blog.html">Blog</a>
                      <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Enjoy your meal without waiting</h4>
              <h2>Book a table</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Enter the below information to reserve a table</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" name="book" action="book-table.php" method="post">
                <div class="row">
                  <div class="col-sm-6">
                    <fieldset>
                      <input name="DATE" type="date" class="form-control" id="date" placeholder="16.06.2020" required>
                    </fieldset>
                  </div>

                  <div class="col-sm-6">
                    <fieldset>
                      <input name="TIME" type="time" class="form-control" id="date" placeholder="09:00" required>
                    </fieldset>
                  </div>

                  <div class="col-sm-6">
                    <fieldset>
                      <select class="form-control" name="PERSONS" required>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                      </select>
                    </fieldset>
                  </div>

                  <div class="col-sm-6">
                    <fieldset>
                      <input name="NAME" type="text" class="form-control" id="name" placeholder="Full Name" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="EMAIL" type="text" class="form-control" id="email" placeholder="E-Mail Address" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="MESSAGE" rows="6" class="form-control" id="message" placeholder="Notes" ></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button name="submit" type="submit" id="form-submit" class="filled-button">Book</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <img src="assets/images/vinay.jpg" class="img-fluid" alt="">

            <h5 class="text-center" style="margin-top: 15px;">Vinay</h5>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
