<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>Приложение список дел</title>
</head>
<body>
<div class="container">
    <h1>Список дел</h1>
    <form action="/add.php" method="post">
        <input type="text" name="task" placeholder="Нужно сделать.." class="form-control">
        <button type="submit" name="sendTask" class="btn btn-success">Отправить</button>
    </form>

    <?php
    require 'configDB.php';
    echo '<ul>';
    $query = $pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');
    while($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo '<li><b>'.$row->task.'</b><a href="/delete.php?id='.$row->id.'">
        <button class="btn btn-danger">Удалить</button></a></li>';
    }
    echo '</ul>';
    ?>

</div>
</body>
</html>