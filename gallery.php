<pre>
<?php
require_once './include/cards.php';

if (!empty($_POST)) {
    checkingСheckboxes($cards);
}

/**
 * @param array $cards массив с карточками
 */
function checkingСheckboxes(array $cards)
{
    foreach ($cards as $card) {
        if (in_array($card['name'], $_POST['uploadedFiles'])) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $card['path']);
        }
    }
}

?>
</pre>

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
                        <input type="checkbox" name="uploadedFiles[]" value="<?= $card['name']?>">Удалить
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <input type="submit" value="Удалить отмеченные изображения">
    </form>
</body>

</html>