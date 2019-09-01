<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Coming Trailer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Page Description" />
        <meta name="robots" content="index, follow">
        <link rel="icon" type="image/ico" href="favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <link href="<?php echo base_url() ?>resources/css/style_front.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>resources/css/responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>resources/fonts/fonts.css" rel="stylesheet" />

        <script type="text/javascript" src="<?php echo base_url() ?>resources/js/jquery-3.2.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>resources/js/script.js"></script>

        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="358367496498-l0fne9pnbl4r2fcd37n0gl1nsk7nq5d2.apps.googleusercontent.com">

    </head>


    <body>

        <div id="header" class="cf">
            <a href="home.html" class="logo"><img src="images/logo.svg" height="35" width="180" alt="Coming Trailer" /></a>
            <a href="#nav" class="icon-m-menu"></a>
            <div id="nav">
                <div class="search-block cf">
                    <input type="text" placeholder="Search for Trailer, Video Song, Poster and more" class="input icon-menu" >
                    <input type="submit" class="button" value="GO">
                </div>
                <div class="menu">
                    <span class="icon-menu"></span>
                    <ul class="drop">
                        <li><a href="">Movie Trailer</a></li>
                        <li><a href="">Video Song</a></li>
                        <li><a href="">Movie Poster</a></li>
                        <li class="divider"><a href="">Movies</a></li>
                        <li><a href="">Actors</a></li>
                        <li><a href="">Singers</a></li>
                        <li><a href="">Directors</a></li>
                        <li><a href="">Music Directors</a></li>
                        <li><a href="">Companies</a></li>
                    </ul>
                </div>
            </div>
            <div class="right-side">
                <a href="#" class="signin"><span>Sign in</span></a>
                <a href="#" class="googleplay"></a>
            </div>
            <div class="m-googleplay"><a href="#">Download The App</a></div>
        </div>

        <div id="popup">
            <a href="" class="icon-close"></a>
            <div class="popup-content">
                <a href="#" class="icon-l-whatsapp">Sign in WhatsApp</a>
                <fb:login-button scope="public_profile,email" style="display: none;"  onlogin="checkLoginState();">
                </fb:login-button>
                <div id="status" style="display: none;">
                </div>

                <a href="javascript:void(0);" class="icon-l-facebook" onclick="myFacebookLogin();">Sign in Facebook</a>
                <div class="g-signin2 icon-l-google" data-onsuccess="onSignIn" style="display: none;"></div>
               <!--  <a href="javascript:void(0);" id ="gsign" class="icon-l-google" onclick="onSignIn()">Sign in Google</a>
                <a href="<?php echo base_url(); ?>MyLogin/settwit" class="icon-l-twitter">Sign in Twitter</a> -->
            </div>
        </div>

        <div class="overlay"></div>   

        <div class="container cf">
            <div class="wrapper-content">
                <div class="wrap-inside">
                    <div class="top-jaherat"><div class="block"><img src="images/top-jaherat.jpg" /></div></div>
                    <div class="title_box">
                        <div class="cf"><h2>Movie Trailer</h2><a href="movie-trailer.html" class="show-more">Show more</a></div>
                    </div>
                    <ul class="grid-item cf">
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="video-details.html" class="play"></a> <a href="video-details.html"><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
						<div class="ct-content"><h3><a href="video-details.html">Humsafar Video ? Badrinath Ki Dulhania ? Varun, A12</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li><li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                    </ul>

                    <div class="title_box">
                        <div class="cf"><h2>Video Song</h2><a href="#" class="show-more">Show more</a></div>
                    </div>
                    <ul class="grid-item cf">
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li><li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                    </ul>

                    <div class="title_box">
                        <div class="cf"><h2>Movie Poster</h2><a href="#" class="show-more">Show more</a></div>
                    </div>
                    <ul class="grid-item cf">
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="poster-details.html" class="zoom"></a> <a href="poster-details.html"><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="poster-details.html">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li><li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="wrapper-sidebar">
                <div class="sidebar-jaherat"><div class="jaherat300"><img src="images/sidebar-jaherat.jpg" /></div></div>
                <div class="grid-item">
                    <h2>Trending this Week</h2>
                    <ul>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail"><a href="" class="zoom"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" width="100" height="56" /></a></div>
						<div class="ct-content"><h3><a href="#">MSG ? The Lionheart 2 ? Hind ka NaPak Ko Jawab</a></h3> <p class="meta-info"> <span>806 playing</span><span>222 likes</span> </p></div>
                            </div>
                        </li>
                    </ul>

                </div>

            </div>
        </div>

        <div id="footer" class="cf">
            <div class="column m-column">
                <h4>coming trailer</h4>
                <ul class="footer-list">
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Advertise</a></li>
                    <li><a href="">FAQ</a></li>
                    <li><a href="">Terms & Privacy</a></li>
                </ul>
                <p>&copy; 2017 Coming Trailer.com</p>
            </div>
            <div class="column m-column">
                <h4>Connect with us</h4>
                <ul class="footer-list">
                    <li><a href="" class="icon-upload"><span>Upload</span></a></li>
                    <li><a href="" class="icon-youtube"><span>YouTube</span></a></li>
                    <li><a href="" class="icon-facebook"><span>Facebook</span></a></li>
                    <li><a href="" class="icon-twitter"><span>Twitter</span></a></li>
                    <li><a href="" class="icon-instagram"><span>Instagram</span></a></li>
                    <li><a href="" class="icon-google-plus"><span>Google+</span></a></li>
                    <li><a href="" class="icon-pinterest"><span>Pinterest+</span></a></li>
                </ul>

            </div>
            <div class="column">
                <h4>trailer</h4>
                <ul class="footer-list">
                    <li><a href="">Hindi</a></li>
                    <li><a href="">Tamil</a></li>
                    <li><a href="">Telugu</a></li>
                    <li><a href="">Punjabi</a></li>
                    <li><a href="">Marathi</a></li>
                    <li><a href="">Gujarati</a></li>
                    <li><a href="">Kannada</a></li>
                    <li><a href="">Malayalam</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>Video Song</h4>
                <ul class="footer-list">
                    <li><a href="">Hindi</a></li>
                    <li><a href="">Tamil</a></li>
                    <li><a href="">Telugu</a></li>
                    <li><a href="">Punjabi</a></li>
                    <li><a href="">Marathi</a></li>
                    <li><a href="">Gujarati</a></li>
                    <li><a href="">Kannada</a></li>
                    <li><a href="">Malayalam</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>Top Actors</h4>
                <ul class="footer-list">
                    <li><a href="">Shah Rukh Khan</a></li>
                    <li><a href="">Deepika Padukone</a></li>
                    <li><a href="">Salman Khan</a></li>
                    <li><a href="">Varun Dhawan</a></li>
                    <li><a href="">Alia Bhatt</a></li>
                    <li><a href="">Ranbir Kapoor</a></li>
                    <li><a href="">Anushka Sharma</a></li>
                    <li><a href="">Shahid Kapoor</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>Top Singers</h4>
                <ul class="footer-list">
                    <li><a href="">Shreya Ghoshal</a></li>
                    <li><a href="">A. R. Rahman</a></li>
                    <li><a href="">Kishore Kumar</a></li>
                    <li><a href="">Kumar Sanu</a></li>
                    <li><a href="">Atif Aslam</a></li>
                    <li><a href="">Arijit Singh</a></li>
                    <li><a href="">Rahat Fateh Ali Khan</a></li>
                    <li><a href="">Anirudh Ravichander</a></li>
                </ul>
            </div>

            <span class="icon-top-arrow"></span>



            <div
                class="fb-like"
                data-share="true"
                data-width="450"
                data-show-faces="true">
            </div>

        </div>    
    </body>

    <script>

        $(document).ready(function(){
            $.ajaxSetup({cache: true});
            $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
                FB.init({
                    appId: '1663173853989479',
                    version: 'v2.8' // or v2.1, v2.2, v2.3, ...
                });
                $('#loginbutton,#feedbutton').removeAttr('disabled');
                FB.getLoginStatus(statusChangeCallback);
            });
        });



        function checkLoginState(){
            FB.getLoginStatus(function(response){
                statusChangeCallback(response);
            });
        }
        //    $(document).ready(function(){
        //  // This is called with the results from from FB.getLoginStatus().
        function statusChangeCallback(response){
            console.log('statusChangeCallback');
            console.log(response);
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().
            if(response.status === 'connected'){
                // Logged into your app and Facebook.
//                alert('FB connected');
                // FB.logout();
            }else{
                // The person is not logged into your app or we are unable to tell.
                document.getElementById('status').innerHTML = 'Please log into this app.';
                //FB.logout();
                FB.login();
            }
        }
        function myFacebookLogin(){
            FB.login(function(response){
            	var uesrData = {};
                if(response.authResponse){
                    console.log('Welcome!  Fetching your information.... ' + response.authResponse);
                    FB.api('/me?fields=id,name,email,gender,picture', function(response){
                        //alert('Good to see you, ' + response.gender + '.' + response.email + '.' + response.picture);
                        console.log(response);
                        uesrData['name'] = response.name;
                        uesrData['email'] = response.email;
                        uesrData['gender'] = response.gender;
                        uesrData['social_media_id'] = response.id;
                        uesrData['img'] = response.picture.data.url;
                        uesrData['social_media'] = 'FB';
                        $.ajax({
                            url : "<?php echo base_url('MyLogin/loginSocialMedia'); ?>",
                            type: "POST",
                            data : uesrData,
                            async:false,
                            success:function(data, textStatus, jqXHR){
                                if (data) {
                                    window.location.href = '<?php echo base_url('home'); ?>';
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                //if fails      
                            }
                        });
                        /*
                        FB.api('/me/picture', function(response){
	                    	console.log(response);
	                        var my_picture_url = response.data.url;
	                    });
						*/
                    });

                }else{
                    console.log('User cancelled login or did not fully authorize.');
                }
            }, {scope: 'public_profile,email'});
        }

        function onSignIn(){
            // console.log(element.id);
            var element = document.getElementById('gsign');
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.attachClickHandler(element, {},
                function(googleUser){
                    //document.getElementById('name').innerText = "Signed in: " +
                    //googleUser.getBasicProfile().getName();
                    var uesrData = {};
                    var profile = googleUser.getBasicProfile();
                    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                    console.log('Name: ' + profile.getName());
                    console.log('Image URL: ' + profile.getImageUrl());
                    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                    uesrData['name'] = profile.getName();
                    uesrData['email'] = profile.getEmail();
                    uesrData['social_media_id'] = profile.getId();
                    uesrData['img'] = profile.getImageUrl();
                    uesrData['social_media'] = 'GP';
                    $.ajax({
                        url : "<?php echo base_url('MyLogin/loginSocialMedia'); ?>",
                        type: "POST",
                        data : uesrData,
                        async:false,
                        success:function(data, textStatus, jqXHR){
                            if (data) {
                                //alert('User Session Started')
                                window.location.href = '<?php echo base_url('home'); ?>';
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            //if fails      
                        }
                    });
                    
                }, function(error){
                    alert(JSON.stringify(error, undefined, 2));
                }
            );
        }

        function signOut(){
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function(){
                console.log('User signed out.');
            });
        }

        //--> For Twitter login    
        window.twttr = (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0],
                    t = window.twttr || {};
            if(d.getElementById(id))
                return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f){
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));
    </script>
</html>
