<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Coming Trailer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Page Description" />
    <meta name="robots" content="index, follow">
    <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>assets/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/fonts/fonts.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assets/css/responsive_admin.css" rel="stylesheet" />

    <!--Links for subcategory tabs-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.0.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!--Links for data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">


    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>


    <!--Links for Input tags-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
    <link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet" />

    <script src="<?php echo base_url(); ?>assets/js/typeahead.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app_bs3.js"></script>

    <!--Links for Date picker-->
    <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

    <!--Links for list pagination-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js"></script>

    <!--Links for drag img-->
    <link href="<?php echo base_url(); ?>assets/css/dragimg.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>

<body>
<?php $admin_data=$this->session->userdata("admin_data"); ?>
<?php include_once("common/header.php"); ?>
<?php include_once("common/sidebar.php"); ?>

<div id="ctwpcontent">

<?php include_once($view_name); ?>


</div>
</body>
</html>