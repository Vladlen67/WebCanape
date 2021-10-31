<?php
    $segments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $uri = array_shift($segments);

    if ($uri === 'review') {
        $styles = '../template/css/review/styles.css';
        $responsive = '../template/css/review/responsive.css';
        } elseif ($uri === 'company') {
            $styles = '../template/css/companies/styles.css';
            $responsive = '../template/css/companies/responsive.css';
            $uri = array_shift($segments);
            }
    if (intval($uri)) {
        $styles = '../template/css/companyById/styles.css';
        $responsive = '../template/css/companyById/responsive.css';
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
    <link href="../template/css/bootstrap.css" rel="stylesheet">
    <link href="../template/css/ionicons.css" rel="stylesheet">
    <link href="<?php echo $styles;?>" rel="stylesheet">
    <link href="<?php echo $responsive;?>" rel="stylesheet">
</head>
<body >
<header>
    <div class="container-fluid position-relative no-side-padding">
        <a href="#" class="logo"><img src="../template/images/logo.png" alt="Logo Image"></a>
        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="/company">Home</a></li>
        </ul><!-- main-menu -->
        <div class="src-area">
            <form>
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" type="text" placeholder="Type of search">
            </form>
        </div>
    </div><!-- conatiner -->
</header>
