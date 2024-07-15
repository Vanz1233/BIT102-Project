<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V4NZ Watches</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts Links For Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <link rel="stylesheet" href="styleP.css">
    <link rel="stylesheet" href="login.css"> <!-- Link to login.css -->
    <link rel="stylesheet" href="signup.css">

</head>
<body>
    <!-- Sign-Up Bar -->
    <div class="fixed-top">
    <div class="signup-bar">
        <?php
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo '<a href="#" class="signup-link">Account</a>&nbsp;&nbsp;';
                echo '<a href="logout.php" class="signup-link">Logout</a>';
            } else {
                echo '<a href="#" class="signup-link" onclick="document.getElementById(\'loginModal\').style.display=\'block\'">Sign In</a>';
            }
        ?>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content animate">
            <span class="close" onclick="document.getElementById('loginModal').style.display='none'">&times;</span>
            <form class="login-form" action="process_login.php" method="POST">
    <h2>Login</h2>

    <div class="information">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required
               value="<?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : ''; ?>">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
    </div>

    <button type="submit">Login</button>
    <div class="remember">
        <label><input type="checkbox" name="remember" <?php if (isset($_COOKIE['username'])) echo 'checked'; ?>> Remember Me</label>
        <a href="forgot.php"> Forgot Password?</a>
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
                        <a class="nav-link" href="#">Auction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Private Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
        </nav>
    </div>
    </header>

    <section class="hero-section">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 d-flex align-items-center">
                                <div class="carousel-caption text-left">
                                    <h5>Limited Edition is coming soon</h5>
                                    <p>Purchase your best Limited Edition watch buy auctioning.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <img src="patekphilip1.jpg" class="d-block w-100" alt="First slide">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 d-flex align-items-center">
                                <div class="carousel-caption text-left">
                                    <h5>Second slide label</h5>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <img src="patekphilip2.jpg" class="d-block w-100" alt="Second slide">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 d-flex align-items-center">
                                <div class="carousel-caption text-left">
                                    <h5>Third slide label</h5>
                                    <p>Some representative placeholder content for the third slide.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <img src="patekphilip3.jpg" class="d-block w-100" alt="Third slide">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="btn-group btn-group-lg d-flex justify-content-center mt-4" role="group" aria-label="Large button group">
            <a href="#" class="btn btn-primary mx-2">Browse</a>
            <a href="#" class="btn btn-primary mx-2">Sell</a>
        </div>
    </section>
    <hr>
    <section class="event-section">
        <div class="section-name">Latest Event</div>
        <div class="scroll-container">
            <div class="card">
                <a href="link1.html">
                    <img src="https://static01.nyt.com/images/2020/05/02/style/02sp-watchauctions-inyt-online/merlin_130053107_f07713e8-2205-431f-aac8-908f9685c780-articleLarge.jpg?quality=75&auto=webp&disable=upscale" alt="Avatar">
                    <div class="text-container">
                        <h4><b>Auction Series| 28 July</b></h4>
                        <h5>Luxury Watches at Van'z</h5>
                        <p>Kuala Lumpur</p>
                    </div>
                </a>
                <button class="btn btn-sm btn-primary follow-btn">Follow</button>
            </div>
            <div class="card">
                <a href="link2.html">
                    <img src="https://www.residencewatches.swiss/cdn/shop/files/AS_9122_mit_Model_im_Sitzen_ober_Koerper_a17f6dd1-46f6-4d8a-b2e6-97ae1973ac5d.jpg?v=1624611393" alt="Avatar">
                    <div class="text-container">
                        <h4><b>Auction Series| 25 August</b></h4>
                        <h5>Vintage Watches: Women's edition</h5>
                        <p>Kuala Lumpur</p>
                    </div>
                </a>
                <button class="btn btn-sm btn-primary follow-btn">Follow</button>
            </div>
            <div class="card">
                <a href="link3.html">
                    <img src="https://twobrokewatchsnobs.com/wp-content/uploads/2023/05/Tissot-PRX-01.jpg" alt="Avatar">
                    <div class="text-container">
                        <h4><b>Auction Series| 22 September</b></h4>
                        <h5>Tissot: Back in time</h5>
                        <p>Kuala Lumpur</p>
                    </div>
                </a>
                <button class="btn btn-sm btn-primary follow-btn">Follow</button>
            </div>
            <div class="card">
                <a href="link4.html">
                    <img src="https://www.shutterstock.com/shutterstock/videos/1071568057/thumb/1.jpg?ip=x480" alt="Avatar">
                    <div class="text-container">
                        <h4><b>Auction Series| 27 October</b></h4>
                        <h5>Rolex: Classic Series</h5>
                        <p>Kuala Lumpur</p>
                    </div>
                </a>
                <button class="btn btn-sm btn-primary follow-btn">Follow</button>
            </div>
        </div>
    </section>
    <section class="item-section">
        <div class="section-name">Latest Items</div>
        <div class="scroll-container">
            <div class="card">
                <a href="link1.html">
                    <img src="frank.jpg">
                    <div class="text-container">
                        <h4><b>Frank Muller| 27 March</b></h4>
                        <h5>Pink Gold Chronograph</h5>
                        <p>Kuala Lumpur</p>
                    </div>
                </a>
                <button class="btn btn-sm btn-primary follow-btn">Follow</button>
            </div>
            <div class="card">
                <a href="link2.html">
                    <img src="frankmuller.jpg" alt="Avatar">
                    <div class="text-container">
                        <h4><b>F.P.Journe| 27 September</b></h4>
                        <h5>Platinum Automatic Wristwatch</h5>
                        <p>Kuala Lumpur</p>
                    </div>
                </a>
                <button class="btn btn-sm btn-primary follow-btn">Follow</button>
            </div>
            <div class="card">
                <a href="link3.html">
                    <img src="patekphilip4.jpg" alt="Avatar">
                    <div class="text-container">
                        <h4><b>Patek Philip| 22 November</b></h4>
                        <h5>Single Button Chronograph</h5>
                        <p>Kuala Lumpur</p>
                    </div>
                </a>
                <button class="btn btn-sm btn-primary follow-btn">Follow</button>
            </div>
            <div class="card">
                <a href="link4.html">
                    <img src="vacheron.jpg" alt="Avatar">
                    <div class="text-container">
                        <h4><b>Vacheron Constantin| 27 December</b></h4>
                        <h5>Automatic Skeletonized Wristwatch</h5>
                        <p>Kuala Lumpur</p>
                    </div>
                </a>
                <button class="btn btn-sm btn-primary follow-btn">Follow</button>
            </div>
        </div>
    </section>
    <section class="buy-now-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="buy-now-content">
                        <a href="https://example.com" class="buy-now-link">
                            <h2 class="buy-now-heading">Buy Now</h2>
                        </a>
                        <p class="buy-now-description">Buy or sell fine art, decorative objects, jewellery, and watches on your schedule</p>
                        <div class="buy-now-action">
                            <a href="https://example.com" class="buy-now-button">BROWSE PRIVATE SALES</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="buy-now-image">
                        <img src="tissot.jpg" alt="Buy Now Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="heading-row">
        <div class="heading-item">
            <h2>Help</h2>
            <p><a href="link1.html">FAQ</a></p>
        </div>
        <div class="heading-item">
            <h2>About us</h2>
            <p><a href="link2.html">about Van'z</a></p>
            <p><a href="link3.html">location</a></p>
            <p><a href="link4.html">Gallery</a></p>
        </div>
        <div class="heading-item">
            <h2>Services</h2>
            <p><a href="link5.html">watch valuation</a></p>
            <p><a href="link6.html">watch maintenances and reparation</a></p>
            <p><a href="link7.html">client advisory</a></p>
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
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        window.onclick = function(event) {
            const modal = document.getElementById('loginModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    </script>
        <script>
        // Function to get URL parameters
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        // Check the login parameter and display the appropriate alert
        var loginStatus = getUrlParameter('login');
        if (loginStatus === 'failed') {
            alert('Login failed. Please try again.');
        } else if (loginStatus === 'wrongpassword') {
            alert('Incorrect password. Please try again.');
        } else if (loginStatus === 'nouser') {
            alert('No user found with that username.');
        } else if (loginStatus === 'empty') {
            alert('Username and password are required.');
        }
    </script>
</body>
</html>