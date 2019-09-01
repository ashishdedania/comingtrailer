<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php
        echo @$seo_data;
//        if(isset($seo)){
//            echo '<title>'.$seo['title'].'</title>';
//            echo '<meta name="description" content="'.$seo['description'].'" />';
//            echo '<meta name="keywords" content="'.$seo['keywords'].'" />';
//        }else{
//            echo '<title>Coming Trailer</title>';
//            echo '<meta name="description" content="Page Description" />';
//        }
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">






        <link rel="icon" type="image/ico" href="<?php echo base_url() ?>/resources/images/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <link href="<?php echo base_url() ?>resources/css/style_front.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>resources/css/responsives.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>resources/fonts/front_fonts.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/waterfall.css">
        <script type="text/javascript" src="<?php echo base_url() ?>resources/js/jquery-3.2.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>resources/js/script.js"></script>
        <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>        
        <meta name="google-signin-client_id" content="413518385088-kod1aqfo61lu7men2liodst4oofehegk.apps.googleusercontent.com">
    </head>
    <body>
        <div id="header" class="cf">
            <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url() ?>resources/images/logo.svg" height="35" width="180" alt="Coming Trailer" /></a>
            <a href="javascript:void(0)" class="icon-m-menu"></a>
            <div id="nav">
                <div class="search-block cf">
                    <?php echo form_open(base_url('search'), array('method' => 'POST')); ?>    
                    <input name="global_search_keyword" type="text" 
                           value="<?php echo $this->session->userdata('global_search_keyword'); ?>" 
                           placeholder="Search for Trailer, Video Song, Poster and more" 
                           class="input icon-menu" >
                    <input type="submit" class="button" value="GO">
                    <?php echo form_close(); ?>
                </div>
                <div class="menu">
                    <span class="icon-menu"></span>
                    <ul class="drop">
                        <li><a href="<?php echo base_url('movietrailer'); ?>">Movie Trailer</a></li>
                        <li><a href="<?php echo base_url('videosong'); ?>">Video Song</a></li>
                        <li><a href="<?php echo base_url('movieposter'); ?>">Movie Poster</a></li>
                        <li class="divider">
                            <a href="<?php echo base_url('movie'); ?>">Movies</a>
                        </li>
                        <li><a href="<?php echo base_url('actor'); ?>">Actors</a></li>
                        <li><a href="<?php echo base_url('singer'); ?>">Singers</a></li>
                        <li><a href="<?php echo base_url('director'); ?>">Directors</a></li>
                        <li><a href="<?php echo base_url('musicdirector'); ?>">Music Directors</a></li>
                        <li><a href="<?php echo base_url('company'); ?>">Companies</a></li>
                    </ul>
                </div>
            </div>



            <div class="right-side">
                <?php
                if ($this->session->userdata('front_userdata')) {
                    // print_r($this->session->userdata('front_userdata')->name);exit;
                    ?>

        <!--                    <a href="<?php echo base_url('logout'); ?>" id="sign_btn" class="signin">
            <span>Sign out</span>
        </a>-->
                    <div class="profile">
                        <?php if ($this->session->userdata('front_userdata')->img == '') {
                            ?>
                            <img src="<?php echo base_url('resources/images/no-user.svg'); ?>" height="40" width="40">

                            <?php
                        } else {
                            if ($this->session->userdata('front_userdata')->social_media == 'FB') {
                                $str = '' . $this->session->userdata('front_userdata')->img;

                                if (strpos($str, 'https://www.comingtrailer.com') != FALSE) {
                                    $myimg = '//graph.facebook.com/' . $this->session->userdata('front_userdata')->social_media_id . '/picture?width=9999';
                                } else {
                                    $myimg = '' . $this->session->userdata('front_userdata')->img;
                                }
                            } else {
                                $myimg = '' . $this->session->userdata('front_userdata')->img;
                            }
                            ?>

                            <img src="<?php echo $myimg; ?>" height="40" width="40">
                            <?php
                        }
                        ?>


                        <ul class="drop">
                            <li><a href="<?php echo base_url('Me'); ?>">My Profile</a></li>
                            <li><a href="<?php echo base_url('logout'); ?>">Log Out</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <a href="javascript:void(0)" id="sign_btn" onclick="showPopup()" class="signin"><span>Sign in</span></a>
                <?php } ?>
                <a href="https://goo.gl/yW7YvS" target="_blank" class="googleplay"></a>
            </div>
            <div class="m-googleplay"><a href="https://goo.gl/yW7YvS" target="_blank">Download The App</a></div>
        </div>
        <div id="whats_app_login" class="register-popup" style="display: none;">
            <!--        <a href="javascript:void(0)" onclick="hideWhatsAppLogin()" class="icon-close"></a>-->
            <div class="popup-content">
                <form method="post" id="wp_log" name="wp_log" onSubmit="" action="<?php echo base_url('myLogin/loginByMobile'); ?>" >
                    <input type="hidden" name="mobile" id="user_mobile">
                    <input type="hidden" name="social_media" value="WA">
                    <label>Mobile Number: <span id="entered_mobile_number"></span></label>
                    <div class="input-field"><input type="text"  required="true" id="user_email" name="email" title="email" placeholder="Email"></div>
                    <div class="input-field"><input type="text" required="true" id="user_name" name="name" title="User Name" placeholder="User Name"></div>
                    <input type="button" class="register-btn" onclick="if (validateForm())
                                document.forms['wp_log'].submit();" value="Register">
                </form>
            </div>
        </div>
        <div class="overlay" id="whats_app_login_overlay"  style="display: none;"></div>

        <?php
//    echo $this->session->flashdata('verifier');exit;
        if ($this->input->get('WA')) {
            ?>
            <!--  Whats up verifier Dialog -->
            <div id="whats_app_verify" class="register-popup" style="display: block;">
                <!--        <a href="javascript:void(0)" onclick="hideWhatsAppLogin()" class="icon-close"></a>-->
                <div class="popup-content">

                    <label>Please check your mail and verify link. Thank You!</label>
                    <input type="button" class="register-btn" onclick="hideWhatsAppVerify();" value="Ok">
                </div>
            </div>
            <div class="overlay" id="whats_app_verify_overlay"  style="display: block;"></div>
            <!--  Whats up verifier Dialog -->   
        <?php } ?>
        <div id="popup" style="display: none;">
            <a href="javascript:void(0)" onclick="hidePopup()" class="icon-close"></a>
            <div class="popup-content">
                <!--            <form method="get" action="https://www.accountkit.com/v1.0/basic/dialog/sms_login/">
                                <input type="hidden" name="app_id" value="157848711413331">
                                <input type="hidden" name="redirect" value="http://www.comingtrailer.com/MyLogin/whatsupLogin">
                                <input type="hidden" name="state" value="d662e6f0fecb244fdd708db4744c79ef">
                                <input type="hidden" name="fbAppEventsEnabled" value=true>
                                <button type="submit" class="icon-l-whatsapp">Login</button>
                            </form>-->
                <input type="hidden" value="+91" id="country_code" />
                                <!--<input placeholder="phone number" id="phone_number"/>-->
                <a href="javascript:void(0);" onclick="smsLogin()" class="icon-l-whatsapp">Sign in WhatsApp</a>
                <!--<a href="javascript:void(0);" onclick="showWhatsNumberPopup()" class="icon-l-whatsapp">Sign in WhatsApp</a>-->
                <!--                <fb:login-button scope="public_profile,email" style="display: none;"  onlogin="checkLoginState();"></fb:login-button>
                                <div id="status" style="display: none;"></div>-->
                <!-- <a href="javascript:void(0);" class="icon-l-facebook" onclick="myFacebookLogin();">Sign in Facebook</a> -->
                <div class="g-signin2 icon-l-google" style="display: none;"></div>
                <a href="javascript:void(0);" id ="gsign" class="icon-l-google" >Sign in Google</a>
                <!-- <a href="<?php echo base_url(); ?>MyLogin/settwit" class="icon-l-twitter">Sign in Twitter</a> -->
            </div>
        </div>
        <div class="overlay" id="sign_overlay" onclick="hidePopup()" style="display: none;"></div>

        <!--................................whats up number popup.................................................-->

        <div id="whatsup-number-popup" style="display: none;">
            <a href="javascript:void(0)" onclick="hideWhatsNumberPopup()" class="icon-close"></a>
            <div class="popup-content">

                <input type="hidden" value="+91" id="country_code" />
                <input placeholder="phone number" id="phone_number"/>
                <a href="javascript:void(0);" onclick="smsLogin()" class="icon-l-whatsapp">Countinue</a>


            </div>
        </div>
        <div class="overlay" id="whatsup_number_overlay" onclick="hideWhatsNumberPopup()" style="display: none;"></div>





        <!--....................................over whats up popups...................................................-->



        <script>

            //--> Login with whatsapp -- Start
            // initialize Account Kit with CSRF protection
            AccountKit_OnInteractive = function () {
                AccountKit.init(
                        {
                            appId: "157848711413331",
                            state: "alksdjfklasjfdkkwQWE3",
                            version: "v1.0",
                            fbAppEventsEnabled: true,
                            debug: true
                        }
                );
            };


            function showPopup() {
                var x = document.getElementById('popup');
                var y = document.getElementById('sign_overlay');
                if (x.style.display === 'none') {
                    x.style.display = 'block';
                    y.style.display = 'block';
                } else {
                    x.style.display = 'none';
                    y.style.display = 'none';
                }
            }
            function hidePopup() {
                var x = document.getElementById('popup');
                var y = document.getElementById('sign_overlay');
                if (x.style.display === 'none') {
                    x.style.display = 'block';
                    y.style.display = 'block';
                } else {
                    x.style.display = 'none';
                    y.style.display = 'none';
                }
            }

            $(document).keyup(function (e) {
                if (e.keyCode == 27) { // escape key maps to keycode `27`
                    // <DO YOUR WORK HERE>
                    onlyhidePopup();
                }
            });

            function onlyhidePopup() {
                var x = document.getElementById('popup');
                var y = document.getElementById('sign_overlay');
                if (x.style.display === 'none') {
                    //        x.style.display = 'block';
                    //        y.style.display = 'block';
                } else {
                    x.style.display = 'none';
                    y.style.display = 'none';
                }
            }

            //Mobile Menu


            function showMobile() {
                //        var x = document.getElementById('nav');
                ////        var y = document.getElementById('sign_overlay');
                ////alert(x.style.display);
                //                if(x.style.display === 'none'){
                //        x.style.display = 'block';
                ////        y.style.display = 'block';
                //                }else if(x.style.display === 'nones'){
                //                    x.style.display = 'block';
                //        }else{
                //        x.style.display = 'none';
                ////        y.style.display = 'none';
                //    }
            }



            function hideMobile() {
                var x = document.getElementById('popup');
                var y = document.getElementById('sign_overlay');
                if (x.style.display === 'none') {
                    x.style.display = 'block';
                    y.style.display = 'block';
                } else {
                    x.style.display = 'none';
                    y.style.display = 'none';
                }
            }


            $(document).ready(function () {
                $(".icon-m-menu").click(function () {
                    $("#nav").slideToggle();
                });
            })
        </script>