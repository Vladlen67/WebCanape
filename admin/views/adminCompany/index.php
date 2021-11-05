<?php

/* @var $companies AdminCompanyController */

include ROOT . '/views/layouts/header.php';
?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление компаниями</li>
                </ol>
            </div>

            <a href="/admin/company/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить компанию</a>

            <h4>Список компаний</h4>
            <br/>
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID компании</th>
                    <th>Название</th>
                    <th>Фото</th>
                    <th>Описание</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($companies as $company): ?>
                    <tr>
                        <td><?php echo $company['id']; ?></td>
                        <td><?php echo $company['title']; ?></td>
                        <td><img src="<?php echo AdminCompany::getImageCompany($company['id']); ?>" alt="Company Image" height="80"></td>
                        <td><?php echo strlen($company['description']) > 300 ? substr($company['description'], 0, 300) . '...' : $company['description']; ?></td>
                        <td><a href="/admin/company/update/<?php echo $company['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/company/delete/<?php echo $company['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>