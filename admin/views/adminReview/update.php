<?php

/* @var $errors AdminReviewController */
/* @var $companies AdminReviewController */
/* @var $id AdminReviewController */
/* @var $review AdminReviewController */

include ROOT . '/views/layouts/header.php';
?>

    <section>
        <div class="container">
            <div class="row">
                <br/>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/review">Управление отзывами</a></li>
                        <li class="active">Редактировать отзыв</li>
                    </ol>
                </div>
                <h4>Редактировать #<?php echo $id; ?></h4>
                <br/>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <p>Имя автора</p>
                            <input type="text" name="author" placeholder="" value="<?php echo $review['author']; ?>">
                            <p>Изображение</p>
                            <img src="<?php echo AdminReview::getImageReview($review['id']); ?>" width="100" alt="" />
                            <input type="file" name="img" placeholder="" accept="image/png,image/jpeg" value="">
                            <p>Детальное описание</p>
                            <textarea name="review" rows="4"><?php echo $review['review']; ?></textarea>
                            <br/><br/>
                            <p>К какой компании относится</p>
                            <select name="company_id">
                                <?php if (is_array($companies)): ?>
                                    <?php foreach ($companies as $company): ?>
                                        <option value="<?php echo $company['id']; ?>"<?php if ($company['id'] == $review['company_id']) echo ' selected="selected"'; ?>>
                                            <?php echo $company['title']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                            <br/><br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                            <br/><br/>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>