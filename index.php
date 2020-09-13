<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>BujoBud</title>
</head>

<body>
<?php include 'navbar.php'; ?>
<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="banner_title">
                    Organize your schedule now!
                </h1>
                <p class="paragraph">
                    Do you need to free your mental stress?
                    You should join with us and have a look how we can make your life easier. Plan your your whole week/month/year, let us handle the matter of reminding you about your schedule through Push Notifications.
                </p>
                <a class="btn btn-outline-primary mt-3" href="#" role="button">Get started</a>
            </div>
        </div>
    </div>
</section>

<section id="bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-10 offset-1 mt-5">
                <h2 class="text-center mt-5 mb-5 pb-2 text-uppercase text-light"><strong>What User Thinks</strong>
                </h2>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner mt-4">
                        <div class="carousel-item text-center active">
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle"
                                     src="http://nicesnippets.com/demo/profile-1.jpg" alt="First slide">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong>
                            </h5>
                            <h6 class="text-dark m-0">Student</h6>
                            <p class="m-0 pt-3 text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec
                                turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus.
                                Suspendisse varius nibh non aliquet.</p>
                        </div>
                        <div class="carousel-item text-center">
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle"
                                     src="http://nicesnippets.com/demo/profile-3.jpg" alt="First slide">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong>
                            </h5>
                            <h6 class="text-dark m-0">Teacher</h6>
                            <p class="m-0 pt-3 text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec
                                turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus.
                                Suspendisse varius nibh non aliquet.</p>
                        </div>
                        <div class="carousel-item text-center">
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle"
                                     src="http://nicesnippets.com/demo/profile-7.jpg" alt="First slide">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong>
                            </h5>
                            <h6 class="text-dark m-0">Researcher</h6>
                            <p class="m-0 pt-3 text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec
                                turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus.
                                Suspendisse varius nibh non aliquet.</p>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>
<section id="about">
    <div class="container">
        <h1 class="heading">
            About Us
        </h1>
        <p>Welcome to our website. This is the perfect platform if you are exhausted to handle your lots of works. Here, this platformallows you to make your own profile by SIGNING UP with required informations. Then, you can select the habit you are going to track from a list. An example of this list could be work out, drink water, take a walk, read a chapter, etc. After that, you can choose if you would like your reminder to be recurring or one time only. If you choose recurring, you can choose days of the week and times of the day. If you choose one-time-only, you would select a date from a calendar and a time. Once you have created your reminder(s), you would receive a push notification at that date and time. It would ask if you have completed the habit and you can select yes or no. This response would be stored in the database for you.
            This is the ultimate way to organize your all tasks those are difficult to handle all by your own. STAY with us and live an organized life. Thank you! </p>
        <img src="img/about.jpg" alt="about image1" class="about_image">
    </div>
</section>
<section id="footer">
    <?php include "footer.php"; ?>
</section>








<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>