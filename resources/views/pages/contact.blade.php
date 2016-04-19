<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
<head>
    <title>HighStand - Responsive MultiPurpose HTML5 Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />

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

    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!-- simple line icons -->
    <link rel="stylesheet" type="text/css" href="css/simpleline-icons/simple-line-icons.css" media="screen" />

    <!-- animations -->
    <link href="js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />

    <!-- responsive devices styles -->
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />

    <!-- shortcodes -->
    <link rel="stylesheet" media="screen" href="css/shortcodes.css" type="text/css" />

    <!-- style switcher -->
    <link rel = "stylesheet" media = "screen" href = "js/style-switcher/color-switcher.css" />

    <!-- mega menu -->
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">

    <link rel="stylesheet" href="js/searchbox/overlay.css">

    <!-- tabs -->
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs3.css">

</head>

<body>
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

                                <li class="dropdown yamm-fw"><a href="{{ asset('/') }}" class="dropdown-toggle">Home</a>
                                </li>
                                <li class="dropdown"><a href="{{ asset('/about') }}" class="dropdown-toggle">About Us</a>
                                </li>
                                <li class="dropdown"><a href="{{ asset('/gallery') }}" class="dropdown-toggle">GALLERY</a>
                                </li>
                                <li class="dropdown"><a href="{{ asset('/contact') }}" class="dropdown-toggle active">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="clearfix"></div>

    <div class="page_title2 sty2">
        <div class="container">

            <h1>Contact Us</h1>
            <div class="pagenation">&nbsp;<a href="index.html">Home</a> <i>/</i><i></i> Contact</div>

        </div>
    </div><!-- end page title -->
    <div class="clearfix"></div>
    <div class="content_fullwidth less2">
        <div class="container">
            <div class="one_half">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <br />
                <div class="cforms_sty3">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <strong> Whoops!!</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div id="form_status"></div>
                        <form action="{{asset('/sendEmail')}}" method="POST" id="thisid">
                        <label class="label">Name <em>*</em></label>
                        <label class="input">
                            <input type="text" name="name" id="name">
                        </label>
                        <div class="clearfix"></div>
                        <label class="label">E-mail <em>*</em></label>
                        <label class="input">
                            <input type="email" name="email" id="email">
                        </label>
                        <div class="clearfix"></div>
                        <label class="label">Subject <em>*</em></label>
                        <label class="input">
                            <input type="text" name="subject" id="subject">
                        </label>

                        <div class="clearfix"></div>

                        <label class="label">Message <em>*</em></label>
                        <label class="textarea">
                            <textarea rows="5" name="message" id="message"></textarea>
                        </label>
                        <div class="clearfix"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="submit" class="button">Send Message</button>

                    </form>


                </div>

            </div>

            <div class="one_half last">

                <div class="address_info">

                    <h4>Company <strong>Address</strong></h4>
                    <ul>
                        <li> <strong>Maestro Banquet Hall & Restaurant</strong><br />
                            {{$setting->address}}<br />
                            Telephone: {{$setting->tel}} <br />
                            E-mail: <a href="{{$setting->mail}}">{{$setting->mail}}</a><br />
                            Website: <a href="index.html">{{$setting->site}}</a> </li>
                    </ul>
                </div>

                <div class="clearfix"></div>

                <h4>Find the Address</h4>

                <iframe class="google-map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3301.82959074955!2d-118.23846878535889!3d34.15070161998362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c109eb92282d%3A0xe6f51fb7222915f7!2zMzI1IE4gVmVyZHVnbyBSZCwgR2xlbmRhbGUsIENBIDkxMjA2LCDQodCo0JA!5e0!3m2!1sru!2sru!4v1460201996119"></iframe>
                <br />
                <small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=WA,+United+States&amp;aq=0&amp;oq=WA&amp;sll=47.605288,-122.329296&amp;sspn=0.008999,0.016544&amp;ie=UTF8&amp;hq=&amp;hnear=Washington,+District+of+Columbia&amp;t=m&amp;z=7&amp;iwloc=A">View Larger Map</a></small> </div>

        </div>
    </div><!-- end content area -->



    <div class="clearfix"></div>


    <footer class="footer">

        <div class="clearfix"></div>

        <div class="copyright_info inner">
            <div class="container">

                <div class="clearfix"></div>

                <div class="one_half">

                    Copyright © 2016 HighStand.com. All rights reserved.  <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a>

                </div>

                <div class="one_half last">

                    <ul class="footer_social_links">
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-skype"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-html5"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>

                </div>

            </div>
        </div><!-- end copyright info -->


    </footer>


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
<script type="text/javascript" src="js/cform/form-validate.js"></script>
</body>
</html>
