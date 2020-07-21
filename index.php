<?php
include 'php/messages.php';
function check_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
//require 'php/config.php';
$status = "";
if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit'])) {
  $firstname = check_data($_POST['fname']);
  $lastname = check_data($_POST['lname']);
  $email = check_data($_POST['email']);
  $message = check_data($_POST['message']);

  if(empty($firstname) || empty($lastname) || empty($email) || empty($message)) {
    $status = "All fields are compulsory.";
  } else {
    if(strlen($firstname) >= 40 || !preg_match("/^[a-zA-Z\s]+$/", $firstname) || strlen($lastname) >= 100 || !preg_match("/^[a-zA-Z\s]+$/", $lastname)) {
      $status = "Please enter a valid name";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $status = "Please enter a valid email";
    } else if(strlen($message) >= 500) {
        $status = "Maximum characters is 500";
    } else {
      Messages::insertMessages($firstname, $lastname, $email, $message);
    }
  }
}
?>


<!DOCTYPE html>
<html>

<head>
        <title>Daniel Connolly - Online CV</title>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <!--Bootstrap Version 4.5-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<!-- Popper JS -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!--Custom JavaScript -->
        <script src="js/script.js"></script>
		<meta name="author" content="Daniel Connolly">
		<meta name="description" content="An online CV for a Web Developer that provides information on Daniel Connolly">
        <!-- Link for custom CSS -->
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <!-- meta value -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Font-Awesome-->
        <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
		
</head>
<body>
<div class="container-fluid">
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
        <ul class="navbar-nav nav-list">
            <li class="nav-item active">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#experience">Experience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#skills">Skills</a>
            </li>
        </ul>
    </div>
</nav>
<section id="home">
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
	
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 carousel-image" src="images/fountain.jpg" alt="Fountain Town Centre Barnsley">
            <div class="black-overlay text-overlay">
                <h1 class="text-center">Daniel Connolly</h1>
            </div>
            <div class="carousel-caption d-block">
                <h4>Fountains in Barnsley Town Centre</h4>
             </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 carousel-image" src="images/george-yard.jpg" alt="George Yard Barnsley">
            <div class="black-overlay text-overlay"><h1 class="text-center">Daniel Connolly</h1><br>
            </div>
            <div class="carousel-caption d-block">
                <h4>George Yard Barnsley</h4>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 carousel-image" src="images/town-hall.jpg" alt="Barnsley Town Hall">
            <div class="black-overlay text-overlay"><h1 class="text-center">Daniel Connolly</h1><br>
            </div>
            <div class="carousel-caption d-block">
                <h4>Barnsley Town Hall</h4>
            </div>
        </div>
    </div>
</div>
 <div class="button-wrapper">
	<a href="#" data-toggle="modal" data-target="#footerFormModal"
		class="btn btn-dark button-colour">
		<i class="d-none d-sm-inline fa fa-envelope-o" aria-hidden="true"></i>
	Contact</a>
</div>
</section>
    <section id="profile">
   <div class="container-border py-3">
     <div class="container">
         <div class="row justify-content-center education-title">
             <div class="category-title">
             <h2>Profile</h2>
             </div>
         </div>
         <hr class="hr-length">
         <div class="row justify-content-center">
             <div class="col-md-8">
                <h5 class="text-center">A Web Developer who works with a range of technologies and programming languages.</h5>
             </div>
         </div>
     </div>
    <div class="container">
         <div class="row">
             <div class="col-md-4">
                <h3>About me</h3>
                 <p>I am a Junior Web Developer who is currently working for a role new within the Computing IT industry.
                    I enjoy the work I do but I also have a number of hobbies and interests. These
                    include watching football the teams I follow are Barnsley Football Club and Manchester United. I follow these
                    two teams by attending football matches and watching on television or media device. Other interests include watching
                    England Rugby Union and Football teams. I also go to the local gym twice a week if possible with the aim on increasing my health and fitness.
                 </p>
             </div>
             <div class="col-md-4 text-center pt-5">
                <img class="profile-image" src="images/no-image.jpg">
             </div>
             <div class="col-md-4">
                 <h3>Details</h3>
                 <strong>Name:</strong>
                 <p>Daniel Connolly</p>
                 <strong>Location:</strong>
                 <p>Barnsley, South Yorkshire</p>
             </div>
         </div>
        <hr class="hr-length">
     </div>
   </div><!--End of container-border-->
</section>
<section class="body-colour" id="experience">
  <div class="container">
      <div class="row justify-content-center pt-3">
          <div class="category-title">
          <h2>Experience</h2>
          </div>
      </div>
      <hr class="hr-length">
      <div class="row">
          <div class="col-md-2 pb-3">
              <h3>Education</h3>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
              <h4>University of Huddersfield</h4>
              <p>Sept 2014 - June 2019</p>
          </div>
          <div class="col-md-8">
              <strong>BSc (Hons) Combined Studies (Computing)</strong><br>
              <strong>Grade: First</strong>
              <p>A big part of this degree coures involved Java programming and this was to learn the princples of OOP programming.
                 In addition to programming how to design software with UML constituted to part of this study. Implementing algorithms
                 with Java was further programming that was carried out during this study period. Other aspects include Computational Mathematics,
                 OOP programming with C++, Creating a Computer network, web programming with Laravel and Spring, Database design and querying with SQL,
                 Systems design, designing information for the web and the structure and the implemnetion of computer lamguages.
              </p>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
              <h4>Northern College</h4>
              <p>Sept 2013 - May 2014</p>
          </div>
          <div class="col-md-8">
              <strong>HE Diploma in Computing</strong><br>
              <strong>Grade: Merit</strong>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                  remaining essentially unchanged.
              </p>
          </div>
      </div>
      <hr class="hr-length">
      <div class="row">
          <div class="col-md-2 pb-3">
              <h3>Careers</h3>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
              <h4>SteadyGo</h4>
              <p>June 2019 - Present Day</p>
          </div>
          <div class="col-md-8">
            <strong>Full-time Web developer</strong>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged.
            </p>
              <span>
              <i class="fa fa-map-pin" aria-hidden="true"></i>
                   Pudsey, Leeds, West Yorkshire |
              <i class="fa fa-link" aria-hidden="true"></i>
                   <a class="text-link" href="https://www.steadygo.digital/" target="_blank">https://www.steadygo.digital</a>
              </span>
          </div>
          <div class="col-md-4">
              <h4>European University Institute (EUI)</h4>
              <p>June 2017 - June 2018</p>
          </div>
          <div class="col-md-8">
              <strong>ICT User Support Technician</strong>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                  remaining essentially unchanged.
              </p>
              <span>
              <i class="fa fa-map-pin" aria-hidden="true"></i>
                   Florence, Italy |
              <i class="fa fa-link" aria-hidden="true"></i>
                   <a class="text-link" href="https://www.eui.eu/" target="_blank">https://www.eui.eu/</a>
              </span>
          </div>
      </div>
  <div class="pb-3">
      <hr class="hr-length">
  </div>
  </div><!--End of container-->
</section>
<section id="skills">
     <div class="container-border">
      <div class="container">
          <div class="row justify-content-center">
              <div class="category-title">
                  <h2>Skills</h2>
              </div>
          </div>
      </div>
     <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <h5 class="text-center">My skills are still my skills. Floyd Mayweather, Jr</h5>
          </div>
      </div>
         <hr class="hr-length">
      <div class="row">
      <div class="col-md-6">
          <ul class="skills-list">
              <li>
                  <span>PHP</span>
                  <span class="float-skills-list">
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  </span>
              </li>
              <li>
                  <span>MySQL</span>
                  <span class="float-skills-list">
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  </span>
              </li>
             <li>
                 <span>HTML(5)</span>
                 <span class="float-skills-list">
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 </span>
             </li>
              <li>
                  <span>MVC</span>
                  <span class="float-skills-list">
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  </span>
              </li>
              <li>
                  <span>XML</span>
                  <span class="float-skills-list">
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                 </span>
              </li>
              <li>
                  <span>OOP</span>
                  <span class="float-skills-list">
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                 </span>
              </li>
              <li>
                  <span>MySQL</span>
                  <span class="float-skills-list">
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                 </span>
              </li>
          </ul>
      </div>
      <div class="col-md-6">
        <ul class="skills-list">
            <li>
                 <span>CSS(3)</span>
                 <span class="float-skills-list">
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 </span>
            </li>
            <li>
                 <span>Java</span>
                 <span class="float-skills-list">
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 </span>
            </li>
            <li>
                 <span>WordPress</span>
                 <span class="float-skills-list">
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 </span>
            </li>
            <li>
                 <span>SCSS</span>
                 <span class="float-skills-list">
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 </span>
            </li>
            <li>
                <span>C#</span>
                <span class="float-skills-list">
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                </span>
            </li>
            <li>
                  <span>Android</span>
                  <span class="float-skills-list">
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  </span>
            </li>
            <li>
                <span>Javascript</span>
                <span class="float-skills-list">
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                </span>
            </li>
         </ul>
        </div>
      </div><!--End of row-->
         <hr class="hr-length">
    </div><!--End of container-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="category-title">
                <h2>Tools</h2>
            </div>
        </div>
        <hr class="hr-length">
        <div class="row">
            <div class="col-md-6">
                <ul class="skills-list">
                    <li>
                        <span>PHPStorm</span>
                        <span class="float-skills-list">
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        </span>
                    </li>
                    <li>
                        <span>MS Office</span>
                        <span class="float-skills-list">
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        </span>
                    </li>
                    <li>
                        <span>Visual Studio</span>
                        <span class="float-skills-list">
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        </span>
                    </li>
                </ul>
            </div><!--col-md-6-->
            <div class="col-md-6">
                <ul class="skills-list">
                    <li>
                        <span>PHPStorm</span>
                        <span class="float-skills-list">
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        </span>
                    </li>
                    <li>
                        <span>Git / Git Work Flow </span>
                        <span class="float-skills-list">
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        </span>
                    </li>
                    <li>
                        <span>Mac</span>
                        <span class="float-skills-list">
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        </span>
                    </li>
                </ul>
            </div>
        </div><!--End of row-->
        <hr class="hr-length">
    </div><!--End of container-->
  </div><!--End of container-border-->
</section>
<section class="footer-background" id="contact">
<div class="container">
    <div class="row justify-content-center">
        <div class="footer-title">
            <h2>Contact</h2>
        </div>
        <div class="col-md-12 footer-text">
           <p class="text-center">"Once you bid farewell to discipline you say goodbye to success"</p>
           <p class="text-center">-Sir Alex Ferguson</p>
        </div>
        <hr class="footer-hr">
    </div>
    <div class="row">
        <div class="col-md-6">
            <span class="email-details">
                <i class="fa fa-at" aria-hidden="true"></i> danconnolly76@gmail.com
            </span>
        </div>
        <div class="col-md-6">
            <span class="email-details">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
                  <a class="text-link" href="https://www.linkedin.com/in/daniel-connolly-31ab05b0/" target="_blank"> https://www.linkedin.com/in/daniel-connolly-31ab05b0/</a>
            </span>
        </div>
        <hr class="footer-hr">
    </div>
</div>
    <br>
    <br>
    <br>
    <br>
</section>
</div>
<footer>
      <!-- Modal -->
<div class="modal fade" id="footerFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter your contact details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" name="registration" id="newModalForm">
                <div class="form-group">
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required/>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required/>
                </div>
                
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required/>
                </div>

                <div class="form-group">
                    <textarea class="form-control" rows="5" name="message" id="message" placeholder="Message..." required></textarea>
                </div>

                <button type="submit" class="btn btn-secondary">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>
</footer>
</body>	
</html>




