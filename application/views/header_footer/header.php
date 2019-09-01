<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Coming Trailer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Page Description" />
        <meta name="robots" content="index, follow">
        <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>resources/images/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <link href="<?php echo base_url(); ?>resources/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resources/fonts/fonts.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resources/css/responsive_admin.css" rel="stylesheet" />

        <!--Links for subcategory tabs-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!--Links for data tables-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">


        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>


        <!--Links for Input tags-->
        <link href="<?php echo base_url(); ?>resources/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
        <link href="<?php echo base_url(); ?>resources/css/app.css" rel="stylesheet" />

        <script src="<?php echo base_url(); ?>resources/js/typeahead.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/bootstrap-tagsinput.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/app.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/app_bs3.js"></script>

        <!--Links for Date picker-->
        <link href="<?php echo base_url(); ?>resources/css/datepicker.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>resources/js/bootstrap-datepicker.js"></script>

        <!--Links for list pagination-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
        
        <script src="<?php echo base_url(); ?>resources/js/jquery.table2excel.js"></script>

        <!--Links for drag img-->
        <link href="<?php echo base_url(); ?>resources/css/dragimg.css" rel="stylesheet" />
        
    </head>

    <body>

        <div id="header" class="cf">
            <a href="<?php echo base_url('adminHome'); ?>" class="logo">
                <img src="<?php echo base_url(); ?>resources/images/logo.svg" height="35" width="180" alt="Coming Trailer" />

            </a>
            <div class="right-side">
                <a href="<?php echo base_url('logout/adminLogout'); ?>" class="log-out">Log Out</a>
                <div class="profile">
                    <a href="<?php echo base_url('editProfile'); ?>">
                        <img src="<?php echo base_url('images/admin/'.$this->session->userdata('profile_img')); ?>" height="35" width="35" />
                    </a>
                </div>
                <a href="<?php echo base_url();?>HomeSeo" class="home-seo"><span>Home</span></a>
                <a href="<?php echo base_url();?>AddPoster" class="icon-add"><span>Add Poster</span></a>
                <a href="<?php echo base_url();?>AddVideo" class="icon-add"><span>Add Video</span></a>
            </div>

        </div>

