<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Админпанель</title>
    <link href="<?php echo PATH; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo PATH; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo PATH; ?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo PATH; ?>css/price-range.css" rel="stylesheet">
    <link href="<?php echo PATH; ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo PATH; ?>css/main.css" rel="stylesheet">
    <link href="<?php echo PATH; ?>css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo PATH; ?>images/basic_gear.svg">
</head><!--/head-->
<body>
<div class="page-wrapper">
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <h5>
                                <a href="/admin"><i class="fa fa-edit"></i> Админпанель</a>
                            </h5>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="/"><i class="fa fa-sign-out"></i>На сайт</a></li>
                                <?php if (!Admin::isGuest()): ?><li><a href="/admin/logout"><i class="fa fa-unlock"></i>Logout</a></li><?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->