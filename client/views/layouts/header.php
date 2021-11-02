<?php
    $segments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $uri = array_shift($segments);

    if ($uri === 'review') {
        $styles = '../client/template/css/review/styles.css';
        $responsive = '../client/template/css/review/responsive.css';
    } elseif (intval($uri)) {
        $styles = '../client/template/css/companyById/styles.css';
        $responsive = '../client/template/css/companyById/responsive.css';
    } else {
        $styles = '../client/template/css/companies/styles.css';
        $responsive = '../client/template/css/companies/responsive.css';
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Companies</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- Stylesheets -->
    <link href="../client/template/css/bootstrap.css" rel="stylesheet">
    <link href="../client/template/css/ionicons.css" rel="stylesheet">
    <link href="<?php echo $styles;?>" rel="stylesheet">
    <link href="<?php echo $responsive;?>" rel="stylesheet">
</head>
<body >
<header>
    <div class="container-fluid position-relative no-side-padding">
        <a href="#" class="logo"><img src="../client/template/images/logo.png" alt="Logo Image"></a>
        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="/">Home</a></li>
        </ul><!-- main-menu -->
    </div><!-- conatiner -->
</header>
