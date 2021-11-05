<?php

/* @var $id AdminCompanyController */
/* @var $company AdminCompanyController */
/* @var $data AdminCompanyController */

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
                        <li class="active">Редактировать информацию о компании</li>
                    </ol>
                </div>

                <h4>Редактировать #<?php echo $id; ?></h4>
                <br/>
                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">

                            <p>Название компании</p>
                            <input type="text" name="title" placeholder="" value="<?php echo $company['title']; ?>">

                            <p>Изображение товара</p>
                            <img src="<?php echo AdminCompany::getImageCompany($company['id']); ?>" width="200" alt="" />
                            <input type="file" name="img" placeholder="" value="<?php echo $company['img']; ?>" accept="image/png,image/jpeg">

                            <p>Детальное описание</p>
                            <textarea name="description" rows="6"><?php echo $company['description']; ?></textarea>
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