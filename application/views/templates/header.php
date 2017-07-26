<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dan's Guitars</title>

	<link rel="shortcut icon" href="<?php echo base_url(); ?>static/img/icon.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/blueberry.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    <script src="https://use.fontawesome.com/b8dfacea8a.js"></script>

    <!-- jQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>

    <style>
        body{
           background-color: #F0F0F0;
           color:black;
        }

        #navigation-top{
            background-color: #29120b;
            border-color: #29120b;
        }

        #top-navbar li:hover{
            background-color: rgba(255,255,255,0.4);
        }

        #top-navbar li a{
            color: #E6B763;
        }

        #right-navbar li:hover{
            background-color: rgba(255,255,255,0.4);
        }

        #right-navbar li a{
            color: #E6B763;
        }

        .welcome{
            padding: 15px;
            color: #E6B763;
        }

        .navbar-brand{
            padding-bottom: 0;
            padding-top: 0;
            color: #E6B763;
        }

        .page-header{
            /*color: #E6B763;*/
            border-bottom: 1px solid black;
        }

        #panel-grid{
            /*background-color: #ccc;*/
        }

        .panel-footer{
            background-color: #fff;
        }

        .panel{
            background-color: #eee;
            /*border: 3px solid #E6B763;*/
        }

        .thumbnail{
            background-color: #fff;
            border: 2px solid #ddd;
        }

        .thumbnail a{
            border-color: #E6B763;
        }

        .errorlist li{
            color: red;
        }

        .btn-primary{
            background-color: #E6B763;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            border-color: #E6B763; 
        }

        .btn-primary:hover, .btn-primary:focus {
            color: #fff;
            background-color: #AD9A78;
            border-color: #AD9A78;
        }

        .carousel-inner>.item>img{
            margin: 0 auto;
        }

        @media only screen and (max-width: 1199px) {
            #page-content-wrapper{
                display: table;
            }
        }
    </style>

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse" id="navigation-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>static/img/logo.png" alt="logo"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" id="top-navbar">
                <li>
                    <a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>about">About</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>guitars">Guitars</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>categories">Categories</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="right-navbar">
                <?php if(!$this->session->userdata('logged_in')) : ?>
                    <li><a href="<?php echo base_url();?>users/login">Login</a></li>
                    <li><a href="<?php echo base_url();?>users/register">Register</a></li>
                <?php else: ?>
                    <li><a href="<?php echo base_url();?>guitars/create">Add Guitar</a></li>
                    <li><a href="<?php echo base_url();?>categories/create">Create Category</a></li>
                    <li>
                        <div class="welcome">Welcome, <?php echo $this->session->userdata('username'); ?> <a href="<?php echo base_url();?>users/logout">(Logout)</a></div>
                    </li>                    
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div id="page-content-wrapper">
	<div class="container">
        <!-- Flash messages -->
        <?php $flash_messages_success = array('user_registered', 'guitar_created', 'guitar_updated', 'guitar_deleted', 'post_created', 'post_updated', 'post_deleted', 'category_created', 'category_deleted', 'comment_created', 'bid_created', 'login_success', 'logout');
        $flash_messages_failed = array('comment_error', 'bid_error', 'login_failed', 'guitar_taken'); ?>
        <?php foreach ($flash_messages_success as $message) : ?>
            <?php if($this->session->flashdata($message)): ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata($message).'</p>'; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php foreach ($flash_messages_failed as $message) : ?>
            <?php if($this->session->flashdata($message)): ?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata($message).'</p>'; ?>
            <?php endif; ?>
        <?php endforeach; ?>    
        <!-- Search bar -->
        <?php echo form_open('searches/index'); ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name = "keyword" placeholder="Search Guitars" />
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>        