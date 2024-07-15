<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auctionwebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['username']) || !isset($_SESSION['title'])) {
    header('Location: profile.html'); // Redirect to login page if not logged in
    exit();
}
// Assuming you have a user session variable
$user_id = $_SESSION['username'];


$sql = "SELECT name, email, title FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$name = $user['firstName'].' '.$user['lastName'];


$email = $user['email'];
$title = $user['title'];
?>
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <!-- Bootstrap CSS -->
    <title>Profile</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">



    <!-- Bootstrap JS and other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>>



    <link rel="stylesheet" href="setting.css">
    <script src="setting.js"></script>
</head>

<body>
    <header>
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
    
    </div>
    </header>




    </div>


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Banner</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="profile.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
        <div class="banner">
            <div class="profile-info">
                <img src=""
                    alt="Profile Picture">
                <h1> <?php echo $name ?></h1>
            </div>
            <div class="navi navbar-custom">
                <a href="">BUYING</a>
                <a href="Selling.html">SELLING</a>
                <a href="profile.html">SETTINGS</a>
            </div>
        </div>

     ?>   

        <div class="column">
        <div class="topnav" id="myTopnav">
         <a href="setting.html" class="active">Details</a>
         <a href="Communication.html">Communications</a>
       
         <a href="javascript:void(0);" class="icon" onclick="myFunction()">
           <i class="fa fa-bars"></i>
         </a>
       </div> </div>
          
            <!-- Additional content here -->
        </div>

    
        <div class="container text-center">
            <div class="row">
                <div class="container profile-section">
                    <h3>User Profile</h3>
                    <br> <br>
                    <div class="row">
                        <div class="col-sm-2"> <?php echo $title .' '. $name; ?> </div>
                        <div class="col-sm-8"> <?php echo $name; ?>  </div>
                        <div class="col-sm-2 text-end"><button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit</button></div>
                    </div>
                    <br>  
                    <div class="row">
                        <div class="col-sm-2">Email</div>
                        <div class="col-sm-8"> <?php echo $email; ?> </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2">Password</div>
                        <div class="col-sm-8">*******</div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2">Authorized Users</div>
                        <div class="col-sm-8">None</div>
                    </div>
?> 
                    <br> <br>
                    <h3>Address Book</h3>
                    <div class="row">
                        <div class="col-sm-12">There are no Addresses stored for this Account</div>
                        <div class="col-sm-12 text-end"><button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAddressModal">Edit Address</button></div>
                    </div>
                    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editProfileForm"  action="update_profile.php" method="post">
                                        <div class="mb-3">
                                            
                                            <label for="editName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="editName" value="<?php echo $name; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            
                                            <label for="editEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="editEmail" name="editEmail" value="?php echo $email; ?>" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="editPassword" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="editPassword" name=editPassword required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editConfirmPassword" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="editConfirmPassword" name=editConfirmPassword required>
                                            <div class="invalid-feedback" id="passwordMismatchFeedback" style="display: none;">
                                                Passwords do not match.
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Address Modal -->
                    <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAddressModalLabel">Edit Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAddressForm" action="update_address.php" method="post">
                        <div class="mb-3">
                            <label for="editCountry" class="form-label">Country or Territory</label>
                            <select class="form-control" id="editCountry" name="editCountry" required>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Singapore">Singapore</option>
                                <option value="United State">United State</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Canada">Canada</option>
                                <option value="South Korea">South Korea</option>
                                <option value="China">China</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Japan">Japan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editBuildingName" class="form-label">Building Name or Number</label>
                            <input type="text" class="form-control" id="editBuildingName" name="editBuildingName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="editCity" name="editCity" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPostCode" class="form-label">Post Code</label>
                            <input type="text" class="form-control" id="editPostCode" name="editPostCode" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
    <div class="Footer">
            <div class="Footer">
                <div class="heading-row">
                  <div class="heading-item" style="text-align: center; ">
                      <h2>Help</h2>
                      <p><a href="FAQ.html">FAQ</a></p>
                  </div>
                  <div class="heading-item" style="text-align: center; text-decoration: none;">
                      <h2>About us</h2>
                      <p><a href="bootstrap AboutUs.html">about Van'z</a></p>
                      <p><a href="Location.html">location</a></p>
                      <p><a href="Gallery.html">Gallery</a></p>
                  </div>
                  <div class="heading-item"style="text-align: center; text-decoration: none;">
                      <h2>Services</h2>
                      <p><a href="Valuation.html">watch valuation</a></p>
                      <p><a href="reparation.html">watch maintenances and reparation</a></p>
                      <p><a href="clientadvisory.html">client advisory</a></p>
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
                  </div>
            </div>
        </div>
                             
                  </div>
                  <p style="text-align: center;">&copy;2024 Vanz. All rights reserved.</p>
                  </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('editProfileForm').addEventListener('submit', function (event) {
            var password = document.getElementById('editPassword').value;
            var confirmPassword = document.getElementById('editConfirmPassword').value;
            if (password !== confirmPassword) {
                event.preventDefault();
                document.getElementById('passwordMismatchFeedback').style.display = 'block';
            }
        });
    </script>
</body>

</html>