<?php

// проверка нажимали ли на кнопку отправки формы
if (isset($_POST['upload'])) {
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/homework/block_5/upload/';
    $totalFiels = count($_FILES['myFile']['name']);
    $myFile = $_FILES['myFile'];
    
    /**
     * @param int $error код ошибки
     */
    function errorCheck(int $error)
    {
        if (!empty($error)) {
            echo 'Произошла ошибка';
        } else {
            return true;
        }
    }

    /**
     * @param string $fileType тип файла
     */
    function fileTypeCheck(string $fileType)
    {
        if (substr($fileType, 0, 5) !== 'image') {
            echo 'О Ш И Б К А!!! Файл не изображение';
        } else {
            return true;
        }
    }

    /**
     * @param int $fileSize размер файла
     */
    function fileSizeCheck(int $fileSize)
    {
        if ($fileSize > 5 * 1024 * 1024) {
            echo 'О Ш И Б К А!!! Размер файла больше 5Мб';
        } else {
            return true;
        }
    }

    for ($i = 0; $i < $totalFiels; $i++) {
        if (errorCheck($myFile['error'][$i])
        && fileTypeCheck($myFile['type'][$i])
        && fileSizeCheck($myFile['size'][$i])) {
            move_uploaded_file($myFile['tmp_name'][$i], $uploadPath . $myFile['name'][$i]);
        }
    }


}

?>

<form enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <span>Загрузите файл: </span>
    <input type="file" name="myFile[]" multiple>
    <br>
    <br>
    <input type="submit" name="upload" value="Загрузить">
</form>