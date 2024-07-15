<?php 
session_start();
$_SESSION['firstName']; //= 'John'; // Example assignment
$_SESSION['lastName']; //= 'Doe';   // Example assignment
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Communications</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="comm.css">
    <style>
       
    </style>
</head>

<body>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">V4NZ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
    
    
    <div class="banner">
        <div class="profile-info">
            <img src="" alt="Profile Picture">
            <h1><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></h1>

        </div>
        <div class="navbar-custom">
            <a href="#">BUYING</a>
            <a href="Selling.html">SELLING</a>
            <a href="profile.html">SETTINGS</a>
        </div>
    </div>
    <div class="column">
        <div class="topnav" id="myTopnav">
         <a href="setting.html" class="active">Details</a>
         <a href="Communication.html">Communications</a>
       
         <a href="javascript:void(0);" class="icon" onclick="myFunction()">
           <i class="fa fa-bars"></i>
         </a>
       </div> </div>
       <div class="container">
        <form id="preferencesForm" action="process_preferences.php" method="POST">
            <!-- Emails Section -->
            <div class="preferences-section col">
                <div class="container-fluid col">
                    <p>Emails</p>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="emailPreferences" id="emailYes" value="yes" checked>
                    <label class="form-check-label" for="emailYes">
                        <p> Send me emails for the following:</p>
                    </label>
                </div>
                <div id="emailOptions">
                    <div class="form-check">
                        <input class="form-check-input email-checkbox" type="checkbox" id="auctionUpdates" name="auctionUpdates" value="1" checked>
                        <label class="form-check-label" for="auctionUpdates">
                            <p>Auction and Private Sale Updates</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input email-checkbox" type="checkbox" id="eventInvitations" name="eventInvitations" value="1" checked>
                        <label class="form-check-label" for="eventInvitations">
                            <p>Event Invitations</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input email-checkbox" type="checkbox" id="artNews" name="artNews" value="1" checked>
                        <label class="form-check-label" for="artNews">
                            <p>Art News</p>
                        </label>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="emailPreferences" id="emailNo" value="no">
                    <label class="form-check-label" for="emailNo">
                        <p>Do not send me emails</p>
                    </label>
                    <br>
                    <div class="inform">
                        <p>We will never pass your personal information to anyone outside of Christie’s for use for their own marketing purposes without your consent. You can unsubscribe at any time.</p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="preferences-section">
                <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                <button type="submit" class="btn btn-primary" id="saveButton">Save Preferences</button>
            </div>
        </form>
    
    </div>

 


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to enable/disable email checkboxes
        function toggleEmailCheckboxes(enable) {
            $('#emailOptions .email-checkbox').prop('disabled', !enable);
            if (!enable) {
                $('#emailOptions .email-checkbox').prop('checked', false);
            }
        }

        // Initial state
        toggleEmailCheckboxes($('#emailYes').is(':checked'));

        // Handle email radio button change
        $('input[name="emailPreferences"]').change(function() {
            toggleEmailCheckboxes($('#emailYes').is(':checked'));
        });

        $('#preferencesForm').on('submit', function(e) {
            e.preventDefault();
            // Handle form submission
            alert('Preferences saved!');
        });

        $('#cancelButton').on('click', function() {
            // Handle form cancellation
            alert('Changes canceled.');
        });
    });
</script>

<footer>
    <div class="Footer">
        <div class="Footer">
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
              </div>
        </div>
    </div>
                         
              </div>
              <p style="text-align: center;">&copy; 2024 Vanz. All rights reserved.</p>
              </div>
        
       
    </footer>
    </div>
</body>

</html>