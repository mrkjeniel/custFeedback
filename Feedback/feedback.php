<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/feedback-style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1b481903cd.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="navigation">
                <div class="left-nav">
                    <nav>
                        <ul class='nav-bar'>
                            <input type='checkbox' id='check' />
                            <span class="menu">
                                <li><a href="../index.html">Home</a></li>
                                <li><a href="../products.html">Products</a></li>
                                <li><a href="#">Promos</a></li>
                                <li><a href="../news-and-reviews.html">News and Reviews</a></li>
                                <li><a href="../contact-us.html">Contact Us</a></li>
                                <label for="../check" class="close-menu"><i class="fas fa-times"></i></label>
                            </span>
                            <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
                        </ul>
                    </nav>
                </div>

                <div class="right-nav">
                    <p> MITSUBISHI </p>
                    <div class="images/logo-img">
                        <img src="images/logo.svg">
                    </div>
                </div>
            </div>

            <div class="fb-container">
                <form action="">
                    <div class="fb-1st">
                        <div class="fb-text">
                            <h1>Feedback</h1>
                            <p>Thank you for choosing Mitsubishi Dealership for your vehicle purchase. Please take a moment to fill out this form which would help us improve our services and let us know about your experience processing your purchase through our website. Your feedback is greatly appreciated.</p>
                        </div>
                        <div class="fb-name">
                            <img class="name-icon" src="images/user.svg">
                            <input type="text" name="firstname" placeholder="First Name" required>
                            <input type="text" name="lastname" placeholder="Last Name" required>
                        </div>
                        <div class="fb-contact">
                            <img class="phone" src="images/phone.svg">
                            <input type="text" name="phonenum" placeholder="Phone Number" required>
                            <img class="email" src="images/email.svg">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                    </div> 
                    <div class="fb-2nd">
                        <fieldset>
                            <legend>Rate your experience</legend>
                            <div class="stars">
                                <i class="fa fa-star fa-6x" data-index="1"></i>
                                <i class="fa fa-star fa-6x" data-index="2"></i>
                                <i class="fa fa-star fa-6x" data-index="3"></i>
                                <i class="fa fa-star fa-6x" data-index="4"></i>
                                <i class="fa fa-star fa-6x" data-index="5"></i>
                            </div>
                        </fieldset>
                    </div>
                    <div class="fb-3rd">
                        <div class="photos">
                            <img src="images/photo.svg">
                            <button>Add Photo</button>
                        </div>
                        <div class="video">
                            <img src="images/video.svg">
                            <button>Add Video</button>
                        </div>
                    </div>
                    <div class="fb-4th">
                        <fieldset>
                            <legend>Comments</legend>
                            <p>Please provide any comments or suggestions regarding your purchasing experience at Mitsubishi Dealership:</p>
                            <div class="textarea-wrapper">
                                <textarea placeholder="Tell us your experience..." name="comments" cols="100" rows="10"></textarea>
                            </div>
                            <button type="submit">SUBMIT FEEDBACK</button>
                        </fieldset>
                    </div>
                </form>
            </div>
            
            <div class="footer">
                <div class="section">
                    <div class="section1">
                        <img class="footer-logo" src="images/logo-footer.svg">
                        <p>DRIVE YOUR AMBITION</p>
                        <br>
                        <hr>
                        <div class="social-links">
                            <a href = "https://www.instagram.com/mitsubishi.ryanbarreto?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                            <img src="images/ig-logo.svg"> </a>
                            <a href = "https://x.com/JhonRyanBarret1?s=20">
                            <img src="images/twitter-logo.svg"></a>
                            <a href = "https://www.facebook.com/mitsubishimanilaph">
                            <img src="images/fb-logo.svg"></a>
                            <a href = "https://www.google.com/search?q=Mitsubishi+Otis+Paco+Manila">
                            <img src="images/google-logo.svg"></a>	
                        </div>
                    </div>
                
                    <div class="section2">
                        <div class="quick-li">
                            <p class="footer-title">Quick Links</p>
                            <hr class="red-line">
                            <ul>
                                <li><a href="../index.html">Home</a></li>
                                <li><a href="../news-and-reviews.html">News & Reviews</a></li>
                                <li><a href="../products.html">Product</a></li>
                                <li><a href="../contact-us.html">Contact Us</a></li>
                                <li><a href="#">Promos</a></li>
                            </ul>
                        </div>
                
                        <div class="contact-info">
                            <p class="footer-title">Contact</p>
                            <hr class="red-line">
                            <div class="infos">
                                <img src="images/loc-logo.svg">
                                <p class="location-details">Mitsubishi Paco Manila</p>
                            </div>
                            <div class="infos">
                                <img src="images/email-logo.svg">
                                <p class="info-p">ryan.mitsubishi@gmail.com</p>
                            </div>
                            <div class="infos">
                                <img src="images/landline-logo.svg">
                                <p class="info-p">63-977 707 3312</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="section3">
                        <p>Contact us by:</p>
                        <img class="call-box" src="images/contact-no.svg">
                        <div class="credit-cards">
                            <img src="images/card1.svg">
                            <img src="images/card2.svg">
                            <img src="images/card3.svg">
                            <img src="images/card4.svg">
                            <img src="images/card5.svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            var ratedIndex = -1;

            $(document).ready(function (){
                resetStarColors();
                
                if (localStorage.getItem('ratedIndex') != null){
                    setStars(parseInt(localStorage.getItem('ratedIndex')));
                }

                $('.fa-star').on('click', function (){
                    ratedIndex = parseInt($(this).data('index'));
                    localStorage.setItem('ratedIndex', ratedIndex);
                });

                $('.fa-star').mouseover(function (){
                    resetStarColors();

                    var currentIndex = parseInt($(this).data('index'));

                    setStars(currentIndex);
                });

                $('.fa-star').mouseleave(function (){
                    resetStarColors();

                    if (ratedIndex != -1) {
                        setStars(ratedIndex);
                    }
                });
            });

            function setStars(max) {
                for (var i = 1; i <= max; i++) { 
                    $('.fa-star:eq(' + (i - 1) + ')').css('color', '#AC0000');
                }
            }

            function resetStarColors() {
                $('.fa-star').css('color', '#D9D9D9');
            }
        </script>

    </body>
</html>