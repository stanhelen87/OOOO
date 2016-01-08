<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 02.12.2014
 * Time: 10:10
 */
include __DIR__ . '/header.php';
include __DIR__ . '/menu.php';
?>
    <div id="content">
        <hr/>
        <p><a href="<?php echo $router->routeAdd();?>">Создать нового пользователя форума</a>
        <hr/>
        <?php
        foreach ($data['user'] as $record) {
            ?>
            <p><?php echo $record['login'];?> (<?php echo $record['status'];?>)</p>
            <p><a href="<?php echo $router->routeEdit() . '/id_user/' . $record['id_user'];?>">Редактировать</a>
                <a href="<?php echo $router->routeDelete() . '/id_user/' . $record['id_user'];?>">Удалить</a></p>
            <hr/>
        <?php
        }
        ?>
    </div>
<?php
include __DIR__ . '/footer.php';
?>