<?php

if (!empty($_POST['filesToDelete'])) {
    checkingСheckboxes();
}

require_once './include/cards.php';

/**
 * @param array $cards массив с карточками
 */
function checkingСheckboxes()
{
    foreach ($_POST['filesToDelete'] as $file) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $file);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <ul class="gallery__list">
            <?php foreach ($cards as $card) : ?>
                <li class="gallery__item" id="" style="margin-bottom: 50px;">
                    <img src="<?= $card['path'] ?>" alt="" class="gallery__img">
                    <h3 class="gallery__title"><?= $card['name'] ?></h3>
                    <label>
                        <input type="checkbox" name="filesToDelete[]" value="<?= $card['path'] ?>">Удалить
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <input type="submit" value="Удалить отмеченные изображения">
    </form>
</body>

</html>