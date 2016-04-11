<!DOCTYPE html>
<!--[if IE 7 ]>
<html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>
<html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
<head>
    <title>Maestro</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- ######### CSS STYLES ######### -->
    <link rel="stylesheet" href="css/reset-restaurant.css" type="text/css"/>
    <link rel="stylesheet" href="css/style-restaurant.css" type="text/css"/>

    <!-- font awesome icons -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!-- simple line icons -->
    <link rel="stylesheet" type="text/css" href="css/simpleline-icons/simple-line-icons.css" media="screen"/>

    <!-- animations -->
    <link href="js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all"/>

    <!-- responsive devices styles -->
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts-restaurant.css" type="text/css"/>

    <!-- shortcodes -->
    <link rel="stylesheet" media="screen" href="css/shortcodes-restaurant.css" type="text/css"/>

    <!-- style switcher -->
    <link rel="stylesheet" media="screen" href="js/style-switcher/color-switcher.css"/>

    <!-- mega menu -->
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu-restaurant.css" rel="stylesheet">

    <!-- MasterSlider -->
    <link rel="stylesheet" href="js/masterslider/style/masterslider.css"/>
    <link rel="stylesheet" href="js/masterslider/skins/default/style-res.css"/>

    <!-- cubeportfolio -->
    <link href="js/cubeportfolio/cubeportfolio.min.css" rel="stylesheet" type="text/css">
    <!-- carouselowl -->
    <link href="js/carouselowl/owl.transitions.css" rel="stylesheet">
    <link href="js/carouselowl/owl.carousel.css" rel="stylesheet">
    <link href="js/carouselowl/owl.theme.css" rel="stylesheet">
    <!-- tabs -->
    <link href='js/tabs3/tabulous.css' rel='stylesheet' type='text/css'>
</head>
<div class="site_wrapper">

    <header class="header">

        <div class="container">

            <!-- Logo -->
            <div class="logo"><a href="{{asset('/')}}" id="logo"></a></div>

            <!-- Navigation Menu -->
            <div class="menu_main">

                <div class="navbar yamm navbar-default">

                    <div class="navbar-header">
                        <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse"
                             data-target="#navbar-collapse-1"><span></span>
                            <button type="button"><i class="fa fa-bars"></i></button>
                        </div>
                    </div>

                    <div id="navbar-collapse-1" class="navbar-collapse collapse pull-right">

                        <nav>

                            <ul class="nav navbar-nav">

                                <li class="dropdown yamm-fw"><a href="{{ asset('/') }}" class="dropdown-toggle active">Home</a>
                                </li>
                                <li class="dropdown"><a href="{{ asset('/about') }}" class="dropdown-toggle">About Us</a>
                                </li>
                                <li class="dropdown"><a href="{{ asset('/gallery') }}" class="dropdown-toggle">GALLERY</a>
                                </li>
                                <li class="dropdown"><a href="{{ asset('/contact') }}" class="dropdown-toggle">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <div class="clearfix"></div>
    <!-- Slider ======================================= -->

    <div class="slidermar_res">

        <div class="master-slider ms-skin-default" id="masterslider">

            <div class="ms-slide slide-1" data-delay="5">
                <div class="slide-pattern"></div>
                <img src="images/sliders/21-1.jpg" alt=""/>
                <h1 class="ms-layer text1 caps"
                    style="left: 0px; top: 330px;"
                    data-type="text"
                    data-effect="top(45)"
                    data-duration="1800"
                    data-delay="0"
                    data-ease="easeOutExpo">We always serve <br/>quality &amp; delicious FOOD
                </h1>

            </div>
            <!-- end slide 1 -->

            <div class="ms-slide slide-2" data-delay="5">
                <div class="slide-pattern"></div>
                <img src="images/sliders/21-2.jpg" alt=""/>
                <h1 class="ms-layer text1 caps"
                    style="left: 0px; top: 350px;"
                    data-type="text"
                    data-effect="top(45)"
                    data-duration="1800"
                    data-delay="0"
                    data-ease="easeOutExpo">We always serve <br/>quality &amp; delicious FOOD
                </h1>

            </div>
            <!-- end slide 2 -->

            <div class="ms-slide slide-3" data-delay="5">
                <div class="slide-pattern"></div>
                <img src="images/sliders/21-3.jpg" alt=""/>
                <h1 class="ms-layer text1 caps"
                    style="left: 0px; top: 330px;"
                    data-type="text"
                    data-effect="top(45)"
                    data-duration="1800"
                    data-delay="0"
                    data-ease="easeOutExpo">We always serve <br/>quality &amp; delicious FOOD
                </h1>

                <a href="#" class="ms-layer sbut1"
                   style="left: 599px; top: 542px;"
                   data-type="text"
                   data-delay="700"
                   data-ease="easeOutExpo"
                   data-duration="1800"
                   data-effect="scale(1.5,1.6)">Get Started Now</a>
            </div>
            <!-- end slide 3 -->
        </div>
    </div>
    <!-- end of masterslider -->


    <div class="clearfix"></div>


    <div class="feature_section1">
        <div class="container">

            <div class="arrow_box">
                <h1>Get fine DINING experience unlike any other</h1>
                <p class="bigtfont dark less7">Enjoy an authentic breakfast or enjoy delicious prepared lunch. Our
                    selection can be also prepared to take away. your favorite foods like including deep dish pizzas,
                    salads, sandwiches, pastas, steaks, and so much. please check our delicious menu below.</p>
            </div>
        </div>
    </div>
    <!-- end feature_section 1 -->
    <div class="clearfix"></div>
    <!-- end feature_section3 -->
    <div class="clearfix"></div>
    <div class="feature_section4">
        <div class="left">
            <div class="cont">
                <h1 class="light">fresh <b>Drinks</b></h1>
                <p class="bigtfont less3">College in Virginia, looked up one of the more obscure Latin words,
                    consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical
                    literature, discov ered the undoubtable source.</p>
                <div class="clearfix"></div>
                <div class="margin_top4"></div>
            </div>
        </div><!-- end left section -->

        <div class="right"></div><!-- end right section -->

    </div>
    <!-- end feature section 4 -->


    <div class="clearfix"></div>


    <div class="feature_section5">
        <div class="container">

            <div class="stcode_title11">
                <h2 class="caps"> Features <span class="line"></span></h2>
            </div>
            <div class="one_third">
                <img src="images/site-img109.jpg" alt=""/>
                <div class="clearfix margin_top1"></div>
                <h4 class="caps medium ">i love pasta</h4>
                <div class="clearfix margin_top2"></div>
                <p> Lorem Ipsum as their default model text, and search for 'lorem ipsum' will uncover many web sites
                    still in their infancy versions have evolved over the years, sometimes by on purpose.</p>
            </div>

            <div class="one_third">
                <img src="images/site-img110.jpg" alt=""/>
                <div class="clearfix margin_top1"></div>
                <h4 class="caps medium ">Awesome pizza</h4>
                <div class="clearfix margin_top2"></div>
                <p> Lorem Ipsum as their default model text, and search for 'lorem ipsum' will uncover many web sites
                    still in their infancy versions have evolved over the years, sometimes by on purpose.</p>
            </div>

            <div class="one_third last">
                <img src="images/site-img111.jpg" alt=""/>
                <div class="clearfix margin_top1"></div>
                <h4 class="caps medium ">non-veg Lovers</h4>
                <div class="clearfix margin_top2"></div>
                <p> Lorem Ipsum as their default model text, and search for 'lorem ipsum' will uncover many web sites
                    still in their infancy versions have evolved over the years, sometimes by on purpose.</p>
            </div>

        </div>
    </div>
    <!-- end feature section 5 -->
    <div class="clearfix"></div>
    <div class="feature_section9">
        <div class="container">
            <div class="stcode_title11 .line">
                <h2 class="caps"> CONTACT <span class="line"></span></h2>
            </div>
            <div class="bookatable-form">
                <form action="" method="post" id="thisid">
                    <div class="one_third">
                        <label>
                            <input type="text" name="samplees" id="name" value="Name"
                                   onFocus="if(this.value == 'Name') {this.value = '';}"
                                   onBlur="if (this.value == '') {this.value = 'Name';}" class="input">
                        </label>
                    </div>
                    <div class="one_third">
                        <label>
                            <input type="text" name="name" id="email" value="Email"
                                   onFocus="if(this.value == 'Email') {this.value = '';}"
                                   onBlur="if (this.value == '') {this.value = 'Email';}" class="input">
                        </label>
                    </div>
                    <div class="one_third last">
                        <label>
                            <input type="text" name="name" id="phone" value="Phone" onFocus="if(this.value == 'Phone') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Phone';}" class="input">
                        </label>
                    </div>
                    <label class="textarea">
                        <textarea name="message" onFocus="if(this.value == 'Message') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Message';}" class="message"></textarea>
                    </label>
                </form>
                <div class="clearfix margin_top2"></div>
            </div>
            <div class="clearfix"></div>
            <div class="clearfix margin_top3"></div>
            <a href="#" class="button four">Send message</a>
        </div>
    </div>
    <!-- end feature section 9 -->


    <div class="clearfix"></div>
    <div class="feature_section12">
        <div class="container">

            <div class="left">
                <ul>
                    <li><h5 class="white">Company Name</h5>
                        325 N Verdugo Rd,Glendale ,CA 91206 <br/>
                        Telephone: +17476665552<br/>
                        E-mail: <a href="mailto:mail@companyname.com">mail@companyname.com</a><br/>
                        Website: <a href="index.html">www.yoursitename.com</a></li>
                </ul>
            </div>
            <!-- end section -->

            <div class="right">
                <div class="one_full">
                    <iframe class="google-map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3301.82959074955!2d-118.23846878535889!3d34.15070161998362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c109eb92282d%3A0xe6f51fb7222915f7!2zMzI1IE4gVmVyZHVnbyBSZCwgR2xlbmRhbGUsIENBIDkxMjA2LCDQodCo0JA!5e0!3m2!1sru!2sru!4v1460201996119"></iframe>
                    <br/>
                </div>
            </div>
            <!-- end section -->

        </div>
    </div>
    <!-- end feature_section12 -->
    <div class="clearfix"></div>
    <div class="copyright_info">
        <div class="container">
            <div class="one_half">Copyright © 2016  All rights reserved.</div>
            <div class="one_half last">
                <ul class="footer_social_links">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                    <li><a href="#"><i class="fa fa-html5"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- end copyrights -->


    <a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->

</div>

<!-- ######### JS FILES ######### -->
<!-- get jQuery used for the theme -->
<script type="text/javascript" src="js/universal/jquery.js"></script>
<script src="js/style-switcher/styleselector.js"></script>
<script src="js/animations/js/animations.min.js" type="text/javascript"></script>
<script src="js/mainmenu/bootstrap.min.js"></script>
<script src="js/mainmenu/customeUI.js"></script>
<script type="text/javascript" src="js/mainmenu/sticky.js"></script>
<script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script>

<script src="js/masterslider/jquery.easing.min.js"></script>
<script src="js/masterslider/masterslider.min.js"></script>
<script type="text/javascript">
    (function ($) {
        "use strict";
        var slider = new MasterSlider();
        // adds Arrows navigation control to the slider.
        slider.control('arrows');

        slider.setup('masterslider', {
            width: 1400,    // slider standard width
            height: 770,   // slider standard height
            space: 0,
            speed: 27,
            layout: 'fullwidth',
            loop: true,
            preload: 0,
            autoplay: true,
            view: "basic",
        });
    })(jQuery);
</script>

<script type="text/javascript">
    var slider = new MasterSlider();
    slider.setup('masterslider2', {
        width: 1400,    // slider standard width
        height: 580,   // slider standard height
        space: 1,
        layout: 'fullwidth',
        loop: true,
        preload: 0,
        autoplay: true
    });
</script>

<!-- tabs2 -->
<script src="js/tabs2/index.js"></script>
<script>
    $('.accordion, .tabs').TabsAccordion({
        hashWatch: true,
        pauseMedia: true,
        responsiveSwitch: 'tablist',
        saveState: sessionStorage,
    });
</script>

<script src="js/scrolltotop/totop.js" type="text/javascript"></script>

<!-- carousel -->
<script src="js/carouselowl/owl.carousel.js"></script>
<script type="text/javascript" src="js/universal/custom.js"></script>
</body>
</html>
