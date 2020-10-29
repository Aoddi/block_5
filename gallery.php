<pre>
<?php
require_once './include/cards.php';

/**
 * @param array $array с карточками
 */
function checkingСheckboxes(array $array)
{
    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            foreach ($array as $cardKey => $cardValue) {
                if (strval($key) === $cardValue['name']) {
                    unset($array[$cardKey]);
                    unlink($_SERVER['DOCUMENT_ROOT'] . $cardValue['path']);
                }
            }
        }
    }

    return createCard($array);
}

/**
 * @param array $array с отсортированными карточками
 * @return string HTML code
 */
function createCard(array $array): string
{
    $cards = '';

    foreach ($array as $card) {
        $cards .= '<li class="gallery__item" id="" style="margin-bottom: 50px;"><img src="' . $card['path'] . '" alt="" class="gallery__img"><h3 class="gallery__title">' .  $card['name'] . '</h3><label><input type="checkbox" name="' . $card['name'] . '">Удалить</label></li>';
    }

    return $cards;
}

?>
</pre>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <ul class="gallery__list">
            <?= checkingСheckboxes($cards) ?>
        </ul>
        <input type="submit" value="Удалить отмеченные изображения">
    </form>
</body>

</html>