<pre>
<?php

// проверка нажимали ли на кнопку отправки формы
if (isset($_POST['upload'])) {
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/homework/block_5/upload/';
    $totalFiels = count($_FILES['myfile']['name']);

    for ($i = 0; $i < 5 && $i < $totalFiels; $i++) {
        // проверка файлов
        if (!empty($_FILES['myfile']['error'][$i]) || substr($_FILES['myfile']['type'][$i], 0, 5) !== 'image' || $_FILES['myfile']['size'][$i] > (5 * 1024 * 1024)) {
            echo 'Произошла ошибка!';
        } else {
            move_uploaded_file($_FILES['myfile']['tmp_name'][$i], $uploadPath . $_FILES['myfile']['name'][$i]);
        }
    }
}

?>
</pre>

<form enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <span>Загрузите файл: </span>
    <input type="file" name="myfile[]" multiple>
    <br>
    <br>
    <input type="submit" name="upload" value="Загрузить">
</form>