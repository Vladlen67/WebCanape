<?php

/* @var $company CompanyController */
/* @var $reviews ReviewController*/

require_once(ROOT . '/views/layouts/header.php');
?>

<div class="slider">
</div><!-- slider -->
<section class="post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-0"></div>
            <div class="col-lg-10 col-md-12">
                <div class="main-post">
                    <div class="post-top-area">
                        <h5 class="pre-title">COMPANY</h5>
                        <h3 class="title"><a href="#"><b><?php echo $company['title'] ?></b></a></h3>
                        <p class="para"><?php echo $company['description']; ?></p>
                    </div><!-- post-top-area -->
                    <div class="post-image"><img src="../template/images/blog-1-1000x600.jpg" alt="Blog Image"></div>
                    <div class="post-bottom-area">
                    </div><!-- post-bottom-area -->
                </div><!-- main-post -->
            </div><!-- col-lg-8 col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- post-area -->

<section class="comment-section center-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-0"></div>
            <div class="col-lg-8 col-md-12">
                <?php if ($reviews): ?>
                <h4><b>COMMENTS(<?php echo count($reviews); ?>)</b></h4>
                <div class="commnets-area text-left">
                    <?php foreach ($reviews AS $review): ?>
                        <div class="comment">
                            <div class="post-info">
                                <div class="left-area">
                                    <img src="../template/images/averie-woodard-319832.jpg" alt="Profile Image">
                                </div>
                                <div class="middle-area">
                                    <b><?php echo $review['author']; ?></b>
                                </div>
                                <div class="right-area">
                                    <h5 class="reply-btn" ><a href="/review/<?php echo $review['id'];?>"><b>MORE</b></a></h5>
                                </div>
                            </div><!-- post-info -->
                            <p><?php echo substr($review['review'], 0, 100) . '...'; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div><!-- commnets-area -->
                <a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</a>
                <?php endif; ?>
                <h4><b>POST COMMENT</b></h4>
                <div class="comment-form">
                    <form method="post">
                        <div class="row">

                            <div class="col-sm-6">
                                <input type="text" aria-required="true" name="contact-form-name" class="form-control"
                                       placeholder="Enter your name" aria-invalid="true" required >
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-12">
									<textarea name="contact-form-message" rows="2" class="text-area-messge form-control"
                                              placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                            </div><!-- col-sm-12 -->
                            <div class="col-sm-12">
                                <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                            </div><!-- col-sm-12 -->

                        </div><!-- row -->
                    </form>
                </div><!-- comment-form -->

            </div><!-- col-lg-8 col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->
</section>

<?php require_once (ROOT . '/views/layouts/footer.php'); ?>