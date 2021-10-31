<?php

/* @var $review ReviewController */

require_once(ROOT . '/views/layouts/header.php');
?>

<div class="slider display-table center-text">
    <h1 class="title display-table-cell"><b>REVIEW</b></h1>
</div><!-- slider -->
<section class="blog-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-0"></div>
            <div class="col-lg-8 col-md-12">
                <div class="post-wrapper">
                    <h3 class="title"><b><?php echo $review['author']; ?></b></h3>
                    <p class="para"><?php echo $review['review']; ?></p>
                </div><!-- post-wrapper -->
            </div><!-- col-sm-8 col-sm-offset-2 -->
        </div><!-- row -->
        <a class="btn" href="<?php echo $_SERVER['HTTP_REFERER'];?>"><b>BACK</b></a>
    </div><!-- container -->
</section><!-- section -->

<?php require_once (ROOT . '/views/layouts/footer.php'); ?>