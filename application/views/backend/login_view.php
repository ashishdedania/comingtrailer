<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Coming Trailer Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Page Description" />
<meta name="robots" content="index, follow">
<link rel="icon" type="image/ico" href="<?php echo base_url(); ?>assets/images/favicon.png" />
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />


</head>

<body>
<?php
if(!empty($message)){
	$msg=explode("_",$message);
	echo '<div class="alert alert-'.$msg[0].'">
	   '.$msg[1].'!
	</div>';
}
?>
<div id="login">

	<?php echo form_open(base_url( 'backend/login/do_login' ), array( 'method' => 'POST' ));?>
		<img src="<?php echo base_url(); ?>assets/images/logo.svg" height="35" width="180" alt="Coming Trailer" />
		<label>Username / Email Address</label>
		<input type="text" name="username" id="username" required class="input" value="" size="20">
		<label>Password</label>
		<input type="password" required name="password" id="password" class="input" value="" size="20">

		<div class="cf">
			<label for="rememberme" class="rememberme">
				<input name="rememberme" type="checkbox" id="rememberme" value="forever">
				<span>Remember me on this computer</span></label>
			<a href="#" class="forgot">Forgot password?</a>
		</div>
		<input type="submit" class="button-login" value="Log In">
	<?php echo form_close();?>
		<a href="<?php echo base_url(); ?>" class="back-to">Back to Website</a>
</div>

    
</body>
</html>
