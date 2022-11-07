<?php if (!is_null($username)):?>
    <a href="/">Главная</a>
    <a href="/?controller=second">Вторая</a>
    <a href="/?controller=tasks">Задачи</a>
    <a href="/?controller=guest">Гостевая</a><br>

    <p>Рады вас приветствовать, <?= $username ?>.</p>
    <br>
    <a href="/?controller=security&action=logout">[ВЫХОД]</a>
<?php else : ?>
    <br>
    <a href="/?controller=security">ВОЙТИ</a>
    <br><br>
    <a href="/?controller=registration">РЕГИСТРАЦИЯ</a>
<?php endif ?><br>