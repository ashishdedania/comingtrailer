<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Coming Trailer | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Page Description" />
        <meta name="robots" content="index, follow">
        <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>resources/images/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <link href="<?php echo base_url(); ?>resources/css/style.css" rel="stylesheet" />
        <style type="text/css">
            .err{
                text-transform: capitalize;
                color: red
            }
        </style>

    </head>

    <body>
        <div id="login">
            <form method="post" action="<?php echo base_url(); ?>login/doLogin/">
                <img src="<?php echo base_url(); ?>resources/images/logo.svg" height="35" width="180" alt="Coming Trailer" />
                <div class="err"><?php echo isset($login_err) ? $login_err : '';?></div>
                <label>Username / Email Address</label>
                <input type="password" name="newpass" class="input" value="" size="20">
                <label>Password</label>
                <input type="password" name="confpass" id="user_login" required class="input" value="" size="20">
                
                <input type="submit" class="button-login" value="Log In">

            </form>
            <a href="#" class="back-to">Back to Website</a>
        </div>
    </body>
</html>
