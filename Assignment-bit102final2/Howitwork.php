<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HowItWork</title>
    <!-- Bootstrap CSS -->
    <title>How It Work</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



<!-- Bootstrap JS and other scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="Howitwork.css">
</head>

<body>
<div class="signup-bar">
        <div class="signup-bar">
            <a href="#" class="signup-link" onclick="document.getElementById('loginModal').style.display='block'">Sign In</a>
        </div>
    
        <!-- Login Modal -->
        <div id="loginModal" class="modal">
            <div class="modal-content animate">
                <span class="close" onclick="document.getElementById('loginModal').style.display='none'">&times;</span>
                <form class="login-form">
                    <h2>Login</h2>
    
                    <div class="information">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
    
                    
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    </div>
    
                    <button type="submit">Login</button>
                    <div class="remember">
                        <label><input type="checkbox"> Remember Me</label>
                        <a href="#"> Forgot Password?</a>
                    </div>
                    <hr>
    
                    <p>You don't have account? <a href="signUp.html">Sign-Up</a></p>
                </form>
            </div>
        </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">V4NZ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="assignmentP.php">Auction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="PrivateSales.html">Private Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Services.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Location.html">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bootstrap Aboutus.html">About Us</a>
                    </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
        </nav>
    </div>
    



    <div class="container-fluid"> 
        <div class="carousel container-fluid"> <div class="Private-carousel">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <a href="Magnificent watch "> <img src="watch for carousel.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 > <a href="A magnificent watch"></a>A magnificent watch</h5>
                          <p>Some representative placeholder content for the first slide.</p>
                        </div></a>
                    
                  </div>
                  <div class=" carousel-item">
                    <a href="Vacheron Constantine "><img src="Curatedition-Vacheron-Constantin-Traditionnelle-Perpetual-Calendar-Ultra-thin_Patrimony-Self-Winding-Feature.jpg" class="d-block w-100" alt="watch"></a>
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Minimalistic yet elegant Vacheron Constantine</h5>
                      <p>Some representative placeholder content for the second slide.</p> 
                    </div>
                  </div>
                  <div class=" carousel-item">
                    <img src="Rolex-Daytona-PaulNewman-2.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div> 
        </div>
    </div>
        
    
    
    <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="PrivateSales.html">Whats Available</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Howitwork.html">How does it work</a>
            </li>
         
        </ul>
        <div class="container-fluid">
            <div class="row col-12"> 
                <div class="info col-7">
                <br>
                <p>Vanz’s Private sales is a unique service for the collectors to buy and sell their precious watches outside of the auction room, this allows the users to purchase the items without going through the hassle of auctioning process. Astonish by the collection of exquisite watches available for you to take home now. You can browse by our selling exhibitions. <br><br>
                    We will ensure that the transaction of Private house is done in confidential, where no realised price will be display after somebody bought the piece of watch. If you are interested with our private sales, let’s get in touch to find out more, our specialist will assist you. 
                   <br><br>
                    Searching for something specific? Let us know what you’re looking for and we’ll use our global network of specialist to find it for you. 
                    <br><br>
                    <p> 
    
            </div>
            <div class=" pic1 col-5">
                <div class="pic1"> 
                    <img src="watch for carousel.jpg"  class="rounded"  class="img-fluid" style="width: 600px;" style="height: auto;"
                     alt=""> </div>
                </div>
       
        </div>
        <div class="column"> 
            <div class="Specialist container-fluid"> <h6> Contact Us </h6>
                <div class="col-12"> 
                    <div class="specialist-img"> 
                        <img src="" alt="image here">
                    </div>
    
            
                    
               
                <div class="col-12"> 
                    <header>  <h3>Ooi Qi Yuan</h3></header>
                    <p>Global director, Private Sales, Founder, Vintage and Limited edition watches </p>
                    <p1>Vintage and Limited edition watches</p1>
                    
               
            <div class="contact"> 
                <ul>
                     <li> <a href="tel:+60127939115"></a> +60127939115 </li>
                     <li><a href="qy050104@gmail.com"></a>qy050104@gmail.com</li>
                    
                </ul>
                
    
            </div>
    
    
            </div>
    
            </div>
    
            <div class="col-12"> 
                <div class="specialist-img"> 
                    <img src="" alt="image here">
                </div>
    
        
                
           
            <div class="col-12"> 
                <header>  <h3>Lee Sumin</h3></header>
                <p>Malaysia head, Private Sales, Co Founder, Limited edition Chronograph watches </p>
                <p1> Limited edition Chronograph watches</p1>
                
           
        <div class="contact"> 
            <ul>
                 <li> <a href="tel:+60127939115"></a> +60127939115 </li>
                 <li><a href="sumin@gmail.com"></a>sumin@gmail.com</li>
                
            </ul>
            
    
        </div>
    
    
        </div>
    
        </div>
    
        <div class="col-12"> 
            <div class="specialist-img"> 
                <img src="" alt="image here">
            </div>
    
    
            
       
        <div class="col-12"> 
            <header>  <h3>Vance</h3></header>
            <p>Malaysia head, Private Sales, Co Founder, Limited edition Chronograph watches </p> 
             <p1> Limited edition Chronograph watches</p1> 
             
            
       
    <div class="contact"> 
        <ul>
             <li> <a href="tel:+60127939115"></a> +60127939115 </li>
             <li><a href="vance@gmail.com"></a>vance@gmail.com</li>
            
        </ul>
        
    
    </div>
    
    
    </div>
    
    </div>
    </div>
    
    <div class="form container-fluid p">   <h2>Private Sales Enquiry</h2>
        <p>Thank you for your interest. Please fill out the below form, and our specialist will follow up with you shortly.</p> </div>
    
        <div class="form container mt-3">
    <form action="store_enquire.php" method="POST">
        <div class="mb-3">
            <label for="name">Name:</label>
            <input type="Name" class="form-control" id="name" placeholder="Enter name" name="name" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="contactnum">Contact number:</label>
            <input type="number" class="form-control" id="contactnum" placeholder="contact number" name="contactnum" required>
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="message" style="height: 100px" required></textarea>
            <label for="floatingTextarea2">Messages</label>
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> I am a human
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
        
        </div>     
    
    </div>

  
    <footer class="bg-light container-fluid">
        <div class="heading-row"style="text-align: center; color: black ";>
            <div class="heading-item" style="text-align: center; text-decoration: none;">
                <h2>Help</h2>
                <p><a href="aboutus/FAQ.html">FAQ</a></p>
            </div>
            <div class="heading-item" style="text-decoration:none; color: black";> 
                <h2>About us</h2>
                <p><a href="aboutus/bootstrap AboutUs.html">about Van'z</a></p>
                <p><a href="Location.html">location</a></p>
                <p><a href="aboutus/Gallery.html">Gallery</a></p>
            </div>
            <div class="heading-item">
                <h2>Services</h2>
                <p><a href="Services/Valuation.html">watch valuation</a></p>
                <p><a href="Services/reparation.html">watch maintenances and reparation</a></p>
                <p><a href="Services/clientadvisory.html">client advisory</a></p>
            </div>
        </div>
        <div class="footer">
            <div class="social-icons">
                <a href="#"><img src="https://i.pinimg.com/originals/84/68/5b/84685ba9637a951591040426a46da70f.jpg"
                        alt="Facebook" width="30"></a>
                <a href="#"><img
                        src="https://image.similarpng.com/very-thumbnail/2020/06/Black-icon-Instagram-logo-transparent-PNG.png"
                        alt="Instagram" width="30"></a>
                <a href="#"><img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7io1s90U_HD_3X4PLf_eY0loEO5PGGMlZSQ&s"
                        alt="Google" width="30"></a>
                <a href="#"><img src="https://cdn.icon-icons.com/icons2/2428/PNG/512/weibo_black_logo_icon_147051.png"
                        alt="Weibo" width="30"></a>
                <a href="#"><img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0KbwtKBVMBeaVklIsVLLP_9POocvzTbn-xA&s"
                        alt="X" width="30"></a>
              </div>
        <p>&copy; 2023 Vanz. All rights reserved.</p>
    </footer>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  
</body>
</html>