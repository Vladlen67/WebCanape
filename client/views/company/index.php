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
                <?php foreach ($companies as $company): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <div class="blog-image"><img src="<?php echo Company::getImageCompany($company['id']) ; ?>" alt="Company Image"></div>
                                <div class="blog-info">
                                    <h4 class="title"><a href="/<?php echo $company['id']; ?>"><b><?php echo $company['title']; ?></b></a></h4>
                                    <ul class="post-footer">
                                        <li><a href="/<?php echo $company['id']; ?>"><i class="ion-chatbubble"></i><?php echo $company['reviews']; ?></a></li>
                                    </ul>
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                <?php endforeach; ?>
			</div><!-- row -->
            <?php if (($total / $limit) > 1): ?>
                <div class="pagination">
                    <?php if ($page > 1): ?><a href="/page-1">«</a><?php endif; ?>
                    <?php if ($page - 3 >= 1 && $page == $countPage): ?><a href="/page-<?php echo $page - 3; ?>"><?php echo $page - 3; ?></a><?php endif; ?>
                    <?php if ($page - 2 >= 1): ?><a href="/page-<?php echo $page - 2; ?>"><?php echo $page - 2; ?></a><?php endif; ?>
                    <?php if ($page - 1 >= 1): ?><a href="/page-<?php echo $page - 1; ?>"><?php echo $page - 1; ?></a><?php endif; ?>
                    <a href="/page-<?php echo $page; ?>" class="active"><?php echo $page; ?></a>
                    <?php if ($page + 1 <= $countPage): ?><a href="/page-<?php echo $page + 1; ?>"><?php echo $page + 1; ?></a><?php endif; ?>
                    <?php if ($page + 2 <= $countPage): ?><a href="/page-<?php echo $page + 2; ?>"><?php echo $page + 2; ?></a><?php endif; ?>
                    <?php if ($page + 3 <= $countPage && $page == 1): ?><a href="/page-<?php echo $page + 3; ?>"><?php echo $page + 3; ?></a><?php endif; ?>
                    <?php if ($page < $countPage): ?><a href="/page-<?php echo $countPage; ?>">»</a><?php endif; ?>
                </div>
            <?php endif; ?>
		</div><!-- container -->
	</section><!-- section -->

<?php require_once (ROOT . '/views/layouts/footer.php'); ?>