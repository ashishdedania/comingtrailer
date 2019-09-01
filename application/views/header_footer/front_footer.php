<div id="footer" class="cf">
    <div class="column m-column">
        <h4>coming trailer</h4>
        <ul class="footer-list">
            <li><a href="<?php echo base_url('aboutus'); ?>">About Us</a></li>
            <li><a href="<?php echo base_url('contactus'); ?>">Contact Us</a></li>
            <li><a href="<?php echo base_url('advertise'); ?>">Advertise</a></li>
            <li><a href="<?php echo base_url('faq'); ?>">FAQ</a></li>
            <li><a href="<?php echo base_url('partnership'); ?>">Partnership</a></li>
            <li><a href="<?php echo base_url('terms-privacy'); ?>">Terms & Privacy</a></li>
        </ul>
        <p>&copy; 2019 Coming Trailer.com</p>
    </div>
    <div class="column m-column">
        <h4>Connect with us</h4>
        <ul class="footer-list">
            <li>
                <a href="https://www.youtube.com/channel/UCyD-gODYB0Qyu2tAbEPmeAQ?sub_confirmation=1" target="_blank" class="icon-youtube"><span>YouTube</span>
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/ComingTrailerOfficial/" target="_blank" class="icon-facebook">
                    <span>Facebook</span>
                </a>
            </li>
            <li><a href="https://twitter.com/ComingTrailerIn" target="_blank" class="icon-twitter"><span>Twitter</span></a></li>
            <li><a href="https://www.instagram.com/comingtrailer/" target="_blank" class="icon-instagram"><span>Instagram</span></a></li>
            <li><a href="https://plus.google.com/+Comingtrailer" target="_blank" class="icon-google-plus"><span>Google+</span></a></li>
            <li><a href="https://www.pinterest.com/comingtrailer" class="icon-pinterest"><span>Pinterest</span></a></li>
        </ul>

    </div>
    <div class="column">
        <h4>trailer</h4>
        <ul class="footer-list">
            <?php
            $no = 1;
            foreach ($trailer_cat as $cat) {
                ?>
                <li><a href="<?php echo base_url('movietrailer/' . strtolower($cat['sub_name'])) ?>"><?php echo $cat['sub_name']; ?></a></li>
                <?php
                if ($no == 8) {
                    break;
                }
                $no++;
            }
            ?>

        </ul>
    </div>
    <div class="column">
        <h4>Video Song</h4>
        <ul class="footer-list">
            <?php
            $no = 1;
            foreach ($video_cat as $cat) {
                ?>
                <li><a href="<?php echo base_url('videosong/' . strtolower($cat['sub_name'])) ?>"><?php echo $cat['sub_name']; ?></a></li>
                <?php
                if ($no == 8) {
                    break;
                }
                $no++;
            }
            ?>
        </ul>
    </div>
    <div class="column">
        <h4>Top Actors</h4>
        <ul class="footer-list">

            <?php
            foreach ($top_actors as $actor) {
//                                    $seo_urls = $controller->getSeoUrl($actor['seo_url_id']);
                ?>
                <li><a href="<?php echo base_url() . 'personality/' . str_replace(" ", "-", str_replace(["(", ")"], "", $actor['cast_name'])); ?>"><?php echo $actor['cast_name']; ?></a></li>
            <?php } ?>                           
        </ul>
    </div>
    <div class="column">
        <h4>Top Singers</h4>
        <ul class="footer-list">

            <?php
            foreach ($top_singers as $actor) {
//                                    $seo_urls = $controller->getSeoUrl($actor['seo_url_id']);
                ?>
                <li><a href="<?php echo base_url() . 'personality/' . str_replace(" ", "-", str_replace(["(", ")"], "", $actor['singer_name'])); ?>"><?php echo $actor['singer_name']; ?></a></li>
                <?php
            }
            ?>

            <!--				<li><a href="">Shreya Ghoshal</a></li>
                                            <li><a href="">A. R. Rahman</a></li>
                                            <li><a href="">Kishore Kumar</a></li>
                                            <li><a href="">Kumar Sanu</a></li>
                                            <li><a href="">Atif Aslam</a></li>
                                            <li><a href="">Arijit Singh</a></li>
                                            <li><a href="">Rahat Fateh Ali Khan</a></li>
                                            <li><a href="">Anirudh Ravichander</a></li>-->
        </ul>
    </div>

    <span class="icon-top-arrow"></span>
</div>    
</body>
</html>
<script src="https://apis.google.com/js/api:client.js"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({cache: true});
        $.getScript('//connect.facebook.net/en_US/sdk.js', function () {
            FB.init({
                appId: '157848711413331',
                version: 'v2.8' // or v2.1, v2.2, v2.3, ...
            });
            $('#loginbutton,#feedbutton').removeAttr('disabled');
            FB.getLoginStatus(statusChangeCallback);
        });




    });



    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }
    //    $(document).ready(function(){
    //  // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            //alert('FB connected');
            // FB.logout();
        } else {
            // The person is not logged into your app or we are unable to tell.
            document.getElementById('status').innerHTML = 'Please log into this app.';
            //FB.logout();
            FB.login();
        }
    }
    function myFacebookLogin() {
        FB.login(function (response) {
            var uesrData = {};
            if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ' + response.authResponse);
                FB.api('/me?fields=id,name,email,gender,picture', function (response) {
                    //alert('Good to see you, ' + response.gender + '.' + response.email + '.' + response.picture);
                    console.log(response);
                    uesrData['name'] = response.name;
                    uesrData['email'] = response.email;
                    uesrData['gender'] = response.gender;
                    uesrData['social_media_id'] = response.id;
                    uesrData['img'] = response.picture.data.url;
                    uesrData['social_media'] = 'FB';
                    $.ajax({
                        url: "<?php echo base_url('MyLogin/loginSocialMedia'); ?>",
                        type: "POST",
                        data: uesrData,
                        async: false,
                        success: function (data, textStatus, jqXHR) {
                            if (data) {
                                //window.location.href = '<?php echo base_url('home'); ?>';
                                location.reload();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
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

            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        }, {scope: 'public_profile,email'});
    }
    var googleUser = {};
    var auth2;
    var startApp = function () {
        gapi.load('auth2', function () {
            auth2 = gapi.auth2.init({
                client_id: "413518385088-kod1aqfo61lu7men2liodst4oofehegk.apps.googleusercontent.com"
            });
            attachSignin(document.getElementById('gsign'));
        });

    };
//    function onSignIn(){
//        // console.log(element.id);
//        
//       
//        
//    }

    function attachSignin(element) {

//        var element = document.getElementById('gsign');
//        var auth2 = gapi.auth2.getAuthInstance();
        //alert("ok1");
        auth2.attachClickHandler(element, {},
                function (googleUser) { console.log('ard');
                    //alert("ok");
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
                        url: "<?php echo base_url('MyLogin/loginSocialMedia'); ?>",
                        type: "POST",
                        data: uesrData,
                        async: false,
                        success: function (data, textStatus, jqXHR) {
                            if (data) {
                                //alert('User Session Started')
                                //window.location.href = '<?php echo base_url('home'); ?>';
                                location.reload();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //if fails      
                        }
                    });

                }, function (error) {
//                alert(JSON.stringify(error, undefined, 2));
        }
        );
    }

    startApp();

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }

    //--> For Twitter login    
    window.twttr = (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
        if (d.getElementById(id))
            return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function (f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));

    // login callback
    function loginCallback(response) {
        console.log(response);
        if (response.status === "PARTIALLY_AUTHENTICATED") {
            var code = response.code;
            var csrf = response.state;
            // Send code to server to exchange for access token
            //location.href = '<?php echo base_url('MyLogin/whatsupLogin/'); ?>' + code + '/' + csrf;
            //set phone number value as label in popup document.getElementById("phone_number").value.trim();
//            var phoneNumber = document.getElementById("phone_number").value.trim();
            $.ajax({
                url: "<?php echo base_url('MyLogin/whatsupLogin/'); ?>" + code + '/' + csrf,
                type: "POST",
                async: false,
                success: function (data, textStatus, jqXHR) {
                    console.log(data.trim());
//                    alert(data.trim());
                    callForWhatsapp(data.trim());
//                    if(data.trim() != 0){
////                        alert("The mobile number has been already registered!!!");
//                        location.reload();
//                    }else{
//                        $('#whats_app_login, #whats_app_login_overlay').show();
//                        $('#entered_mobile_number').html(phoneNumber);
//                        $('#user_mobile').val(phoneNumber);
//                        $('#popup,#sign_overlay').hide();
//                        
//                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //if fails      
                }
            });

        } else if (response.status === "NOT_AUTHENTICATED") {
//            alert('handle authentication failure');
        } else if (response.status === "BAD_PARAMS") {
//            alert('handle bad parameters');
        }
    }

    function callForWhatsapp(phoneNumber) {
//    alert('called.....');
        var uesrData = {};
        uesrData['phone'] = phoneNumber;
        uesrData['media'] = 'WA';


        $.ajax({
            url: "<?php echo base_url('MyLogin/chkMobileNumber/'); ?>",
            type: "POST",
            data: uesrData,
            async: false,
            success: function (data, textStatus, jqXHR) {
//                        console.log(data.trim());
//                        alert('new-'+data.trim());
                if (data.trim() == '') {
                    //                        alert("The mobile number has been already registered!!!");
                    location.reload();
                } else {
                    $('#whats_app_login, #whats_app_login_overlay').show();
                    $('#entered_mobile_number').html(phoneNumber);
                    $('#user_mobile').val(phoneNumber);
                    $('#popup,#sign_overlay').hide();

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //if fails      
            }
        });
    }

    // phone form submission handler
    function smsLogin() {
        var countryCode = document.getElementById("country_code").value;
        var phoneNumber = document.getElementById("phone_number").value.trim();
//        if(phoneNumber){
        AccountKit.login(
                'PHONE',
                {countryCode: countryCode, phoneNumber: phoneNumber}, // will use default values if not specified
        loginCallback
                );
//        }else alert('Please, Enter Mobile Number');
    }

    function validateForm() {

        var user_email = $('#user_email').val().trim();
        var user_name = $('#user_name').val().trim();
        if (!user_email) {
            alert('Please, Enter Email Address');
            return false;
        } else if (!user_name) {
            alert('Please, Enter User Name');
            return false;
        } else {
            if (ValidateEmail(user_email)) {
                var response;
                $.ajax({
                    url: "<?php echo base_url('MyLogin/chkUserEmail'); ?>",
                    type: "POST",
                    data: "user_email=" + user_email,
                    async: false,
                    success: function (data, textStatus, jqXHR) {
                        //alert(data.trim());
                        if (data.trim() == 'not_exist') {
                            response = true
                        } else if (data.trim() == 'exist') {
                            alert('Email is already registered');
                            response = false;
                        } else {
                            alert('Please, Enter Email');
                            response = false;
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //if fails      
                    }
                });
                return response;
            } else {
                return false;
            }
        }
    }

    function ValidateEmail(mail)
    {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
        {
            return (true);
        }
        alert("You have entered an invalid email address!");
        return (false);
    }

    function hideWhatsAppLogin() {
        $('#whats_app_login, #whats_app_login_overlay').hide();
    }

    function hideWhatsAppVerify() {
        $('#whats_app_verify, #whats_app_verify_overlay').hide();
    }

    function showWhatsNumberPopup() {
        var x = document.getElementById('whatsup-number-popup');
        var y = document.getElementById('whatsup_number_overlay');
        if (x.style.display === 'none') {
            x.style.display = 'block';
            y.style.display = 'block';
        } else {
            x.style.display = 'none';
            y.style.display = 'none';
        }
        hidePopup();
    }
    function hideWhatsNumberPopup() {
        var x = document.getElementById('whatsup-number-popup');
        var y = document.getElementById('whatsup_number_overlay');
        if (x.style.display === 'none') {
            x.style.display = 'block';
            y.style.display = 'block';
        } else {
            x.style.display = 'none';
            y.style.display = 'none';
        }
    }



</script>