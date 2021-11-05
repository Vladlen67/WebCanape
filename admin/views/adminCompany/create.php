<?php

/* @var $errors AdminCompanyController */

include ROOT . '/views/layouts/header.php';
?>

    <section>
        <div class="container">
            <div class="row">
                <br/>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/company">Управление компаниями</a></li>
                        <li class="active">Редактировать компанию</li>
                    </ol>
                </div>
                <h4>Добавить новую компанию</h4>

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
                            <p>Название компании</p>
                            <input type="text" name="title" placeholder="" value="">
                            <p>Изображение</p>
                            <input type="file" name="img" placeholder="" accept="image/png,image/jpeg" value="">
                            <p>Детальное описание</p>
                            <textarea name="description" rows="6"></textarea>
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