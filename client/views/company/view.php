<?php

/* @var $company CompanyController */
/* @var $name CompanyController */
/* @var $errors CompanyController */
/* @var $message CompanyController */
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
                                    <img src="/template/uploads/<?php echo $review['img']; ?>" alt="Profile Image">
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

                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" aria-required="true" name="form-name" class="form-control"
                                       placeholder="Enter your name" aria-invalid="true" required value="<?php echo $name; ?>" >
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6 input__wrapper" style="
                                width: 100%;
                                position: relative;
                                margin: 15px 0;
                                text-align: center;">
                                <input  type="file" name="form-img" id="input__file" class="input input__file" accept="image/png,image/jpeg" style="
                                    opacity: 0;
                                    visibility: hidden;
                                    position: absolute;">
                                <label for="input__file" class="input__file-button" style="
                                    width: 100%;
                                    max-width: 290px;
                                    height: 60px;
                                    background: #76d9ee;
                                    color: #fff;
                                    font-size: 1.125rem;
                                    font-weight: 700;
                                    display: -webkit-box;
                                    display: -ms-flexbox;
                                    display: flex;
                                    -webkit-box-align: center;
                                    -ms-flex-align: center;
                                    align-items: center;
                                    -webkit-box-pack: start;
                                    -ms-flex-pack: start;
                                    justify-content: flex-start;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    margin: 0 auto;">
                                    <span class="input__file-icon-wrapper"><img class="input__file-icon" src="../template/images/add.svg" alt="Your logo" width="25" style="
                                    height: 60px;
                                    width: 60px;
                                    margin-right: 15px;
                                    display: -webkit-box;
                                    display: -ms-flexbox;
                                    display: flex;
                                    -webkit-box-align: center;
                                    -ms-flex-align: center;
                                    align-items: center;
                                    -webkit-box-pack: center;
                                    -ms-flex-pack: center;
                                    justify-content: center;
                                    border-right: 1px solid #fff;"></span>
                                    <span class="input__file-button-text" style="
                                    line-height: 1;
                                    margin-top: 1px;">Your logo</span>
                                </label>
                            </div>
                            <div class="col-sm-12">
                                <textarea name="form-message" rows="2" class="text-area-message form-control" placeholder="Enter your comment"
                                    aria-required="true" aria-invalid="false" value="<?php echo $message; ?>"></textarea >
                            </div><!-- col-sm-12 -->
                            <div class="col-sm-12">
                                <button class="submit-btn" type="submit" name="form-submit"><b>POST COMMENT</b></button>
                            </div><!-- col-sm-12 -->
                            <?php if ($errors): ?><div style="color: red"><ul>
                                <?php foreach ($errors AS $error): ?>
                                <li><?php echo $error; ?></li><br>
                                <?php endforeach; ?></ul></div>
                            <?php endif; ?>
                        </div><!-- row -->
                    </form>
                </div><!-- comment-form -->

            </div><!-- col-lg-8 col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->
</section>

<?php require_once (ROOT . '/views/layouts/footer.php'); ?>