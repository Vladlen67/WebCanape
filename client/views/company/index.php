<?php

/* @var $total CompanyController*/
/* @var $limit CompanyController*/
/* @var $pagination CompanyController*/
/* @var $companies CompanyController*/
/* @var $countPage CompanyController*/
/* @var $page CompanyController*/

require_once (ROOT . '/views/layouts/header.php');
?>

	<div class="slider display-table center-text">
		<h1 class="title display-table-cell"><b>COMPANY</b></h1>
	</div><!-- slider -->

	<section class="blog-area section">
		<div class="container">

			<div class="row">
                <?php foreach ($companies as $value): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <div class="blog-image"><img src="../template/images/alex-lambley-205711.jpg" alt="Company Image"></div>
                                <div class="blog-info">
                                    <h4 class="title"><a href="/company/<?php echo $value['id']; ?>"><b><?php echo $value['title']; ?></b></a></h4>
                                    <ul class="post-footer">
                                        <li><a href="#"><i class="ion-chatbubble"></i><?php echo $value['reviews']; ?></a></li>
                                    </ul>
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                <?php endforeach; ?>
			</div><!-- row -->
            <?php if (($total / $limit) > 1): ?>
                <div class="pagination">
                    <?php if ($page > 1): ?><a href="/company/page-1">«</a><?php endif; ?>
                    <?php if ($page - 3 >= 1 && $page == $countPage): ?><a href="/company/page-<?php echo $page - 3; ?>"><?php echo $page - 3; ?></a><?php endif; ?>
                    <?php if ($page - 2 >= 1): ?><a href="/company/page-<?php echo $page - 2; ?>"><?php echo $page - 2; ?></a><?php endif; ?>
                    <?php if ($page - 1 >= 1): ?><a href="/company/page-<?php echo $page - 1; ?>"><?php echo $page - 1; ?></a><?php endif; ?>
                    <a href="/company/page-<?php echo $page; ?>" class="active"><?php echo $page; ?></a>
                    <?php if ($page + 1 <= $countPage): ?><a href="/company/page-<?php echo $page + 1; ?>"><?php echo $page + 1; ?></a><?php endif; ?>
                    <?php if ($page + 2 <= $countPage): ?><a href="/company/page-<?php echo $page + 2; ?>"><?php echo $page + 2; ?></a><?php endif; ?>
                    <?php if ($page + 3 <= $countPage && $page == 1): ?><a href="/company/page-<?php echo $page + 3; ?>"><?php echo $page + 3; ?></a><?php endif; ?>
                    <?php if ($page < $countPage): ?><a href="/company/page-<?php echo $countPage; ?>">»</a><?php endif; ?>
                </div>
            <?php endif; ?>
		</div><!-- container -->
	</section><!-- section -->

<?php require_once (ROOT . '/views/layouts/footer.php'); ?>