<?php

/* @var $id AdminReviewController */

include ROOT . '/views/layouts/header.php';
?>

    <section>
        <div class="container">
            <div class="row">
                <br/>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/review">Управление компаниями</a></li>
                        <li class="active">Удалить отзыв</li>
                    </ol>
                </div>
                <h4>Удалить отзыв #<?php echo $id; ?></h4>
                <p>Вы действительно хотите удалить этот отзыв?</p>
                <form method="post">
                    <input type="submit" name="submit" value="Удалить" />
                </form>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>