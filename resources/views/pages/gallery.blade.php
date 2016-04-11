<!doctype html>
<!--[if IE 7 ]>
<html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>
<html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->

<!-- Mirrored from gsrthemes.com/highstand/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Apr 2016 16:24:46 GMT -->
<head>
    <title>HighStand - Responsive MultiPurpose HTML5 Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">

    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet'
          type='text/css'>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- ######### CSS STYLES ######### -->

    <link rel="stylesheet" href="css/reset.css" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>

    <!-- font awesome icons -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!-- simple line icons -->
    <link rel="stylesheet" type="text/css" href="css/simpleline-icons/simple-line-icons.css" media="screen"/>

    <!-- animations -->
    <link href="js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all"/>

    <!-- responsive devices styles -->
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css"/>

    <!-- shortcodes -->
    <link rel="stylesheet" media="screen" href="css/shortcodes.css" type="text/css"/>

    <!-- style switcher -->
    <link rel="stylesheet" media="screen" href="js/style-switcher/color-switcher.css"/>

    <!-- mega menu -->
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">

    <!-- cubeportfolio -->
    <link href="js/cubeportfolio/cubeportfolio.min.css" rel="stylesheet" type="text/css">

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
                                <li class="dropdown"><a href="{{ asset('/gallery') }}" class="dropdown-toggle active">Gallery</a>
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
    <div class="clearfix"></div>
    <div class="page_title2 sty2">
        <div class="container">
            <h1>GALLERY</h1>
            <div class="pagenation">&nbsp;<a href="index.html">Home</a><i> /</i>
                Gallery
            </div>
        </div>
    </div><!-- end page title -->

    <div class="clearfix"></div>
    <div class="content_fullwidth less4 alicent">
        <div id="js-grid-full-width" class="cbp">

@if(!empty($gallery))
        @foreach($gallery as $gallery)
            <div class="cbp-item">
                <a href="images/gallery/{{$gallery->img_name}}" class="cbp-caption cbp-lightbox"
                   data-title="publishing<br>by gsrthemes9">
                    <div class="cbp-caption-defaultWrap">
                        <img src="images/gallery/tmb/{{$gallery->img_name}}" alt=""/>
                    </div>
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignLeft">
                            <div class="cbp-l-caption-body">
                                <div class="cbp-l-caption-title">{{$gallery->title}}</div>
                                <div class="cbp-l-caption-desc">{{$gallery->description}}</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

@endforeach
    @endif
    </div><!-- end content area -->


    <div class="clearfix"></div>


    <footer class="footer">
        <div class="copyright_info inner">
            <div class="container">
                <div class="clearfix"></div>
                <div class="one_half">
                    Copyright © 2016 HighStand.com. All rights reserved.
                </div>
                <div class="one_half last">
                    <ul class="footer_social_links">
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
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
<script src="js/masterslider/jquery.easing.min.js"></script>

<!-- cubeportfolio -->
<script type="text/javascript" src="js/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="js/cubeportfolio/main.js"></script>

<!-- search box -->
<script src="js/searchbox/overlay.js"></script>
<script>
    $(document).ready(function () {
        $('.overlay').overlay();
    });
</script>

<script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/universal/custom.js"></script>

</body>

<!-- Mirrored from gsrthemes.com/highstand/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Apr 2016 16:24:46 GMT -->
</html>
