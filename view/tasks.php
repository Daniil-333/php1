<a href="/">НАЗАД</a>
<br>

<h1>Доска задач</h1>

<form method="post">
    <fieldset>
        <legend>Форма добавления задач</legend>
        <label>
            <span>Название задачи</span>
            <textarea name="task"></textarea>
        </label>
        <button type="submit">Добавить задачу</button>
    </fieldset>
</form>

<?php if (isset($tasks)):?>
    <?php foreach ($tasks as $key => $task):?>
    <div>
        <h3><?=$task['description']?></h3>
        <a href="?controller=tasks&action=done&key=<?=$task['id']?>">Отметить выполненной</a>
    </div>
        <hr>
    <?php endforeach;?>
<?php endif;?>