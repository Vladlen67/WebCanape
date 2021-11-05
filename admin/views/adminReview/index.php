<?php

/* @var $reviews AdminCompanyController */

include ROOT . '/views/layouts/header.php';
?>

    <section>
        <div class="container">
            <div class="row">
                <br/>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление отзывами</li>
                    </ol>
                </div>

                <a href="/admin/review/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить отзыв</a>

                <h4>Список отзывов</h4>
                <br/>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID отзыва</th>
                        <th>Имя автора</th>
                        <th>Лого</th>
                        <th>Отзыв</th>
                        <th>К какой компании</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($reviews as $review): ?>
                        <tr>
                            <td><?php echo $review['id']; ?></td>
                            <td><?php echo $review['author']; ?></td>
                            <td><img src="<?php echo AdminReview::getImageReview($review['id']); ?>" alt="Review Image" height="50"></td>
                            <td><?php echo strlen($review['review']) > 250 ? substr($review['review'], 0, 250) . '...' : $review['review']; ?></td>
                            <td><?php echo AdminCompany::getCompanyItemById($review['company_id'])['title']; ?></td>
                            <td><a href="/admin/review/update/<?php echo $review['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/review/delete/<?php echo $review['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>