<?php
if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = 'assets/img/' . time() . $_FILES['img']['name'];
    $cat_id = $_POST['category'];

    $flag = 'true';

    $errors = [
        '<p class="error">Заполните поле ввода</p>'
    ];
}
?>

<div class="block-add">

    <form method="POST" class="addform" name="add" enctype="multipart/form-data">
        <h3 class="h3-text">Добавление товара</h3>
        <input type="text" name="name" class="add-input" placeholder="Название товара">
        <?php
        if (isset($_POST['add'])) {
            if (empty($name)) {
                $flag = 'false';
                echo $errors[0];
            }
        } ?>
        <input type="text" name="price" class="add-input" placeholder="Цена">
        <?php
        if (isset($_POST['add'])) {
            if (empty($price)) {
                $flag = 'false';
                echo $errors[0];
            }
        } ?>
        <input type="file" name="img" class="add-input">

        <? if (isset($_POST['add'])) {
            if ($_FILES['img']['name'] == null) {
                $flag = 'false';
                echo $errors[0];
            }
        } ?>


        <div class="category-select">
            <h3>Категория:</h3>
            <select name="category">

                <?php

                $sql = "SELECT * FROM `category`";
                $res = $connect->query($sql);

                foreach ($res as $cat) { ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <? }
                ?>
            </select>
        </div>

        <input type="submit" value="Добавить" name="add" class="add-tovar">
    </form>

</div>

<? if (isset($_POST['add'])) {
    if ($flag != 'false') {
        move_uploaded_file($_FILES['img']['tmp_name'], $img);
        $sql = "INSERT INTO `tovars`(`name`, `price`, `img`, `id_category`) VALUES ('$name','$price','$img','$cat_id')";
        $res = $connect->query($sql);

        echo '<script> document.location.href="?page=home"</script>';
    }
} ?>