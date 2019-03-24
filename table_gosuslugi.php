<?php
/**
 * Created by PhpStorm.
 * User: Aleksandr
 * Date: 23.03.2019
 * Time: 18:41
 */
    $from = $limit_gosuslugi * ($page - 1);
    $table = rquery("SELECT * FROM gosuslugi, law, stage WHERE gosuslugi.status = stage.stage_id AND gosuslugi.law = law.law_id ORDER BY `id` LIMIT ${from}, ${limit_gosuslugi}");
    $table_count = count($table);
?>
<div class="col-md-12">
    <div class="card card-plain">
        <div class="header">
            <h4 class="title">Таблица закупок</h4>
            <p class="category">Справочная информация</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                    <th></th>
                    <th>№</th>
                    <th>Заказчик</th>
                    <th>Описание</th>
                    <th>ИКЗ</th>
                    <th>Статус</th>
                    <th>Цена</th>
                    <th>Валюта</th>
                    <th>Вид закона</th>
                    <th>Размещено</th>
                    <th>Обновлено</th>
                </thead>
                <tbody>
                <?php for($i = 0; $i < $table_count; $i++) {?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo $table[$i]['number'] ?></td>
                        <td><?php echo $table[$i]['customer'] ?></td>
                        <td><?php echo $table[$i]['desc'] ?></td>
                        <td><?php echo $table[$i]['IKZ'] ?></td>
                        <td><?php echo $table[$i]['stage_name'] ?></td>
                        <td><?php echo sprintf('%01.2f', (int)$table[$i]['price'] / 100); ?></td>
                        <td><?php echo $table[$i]['cur'] ?></td>
                        <td><?php echo $table[$i]['law_name'] ?></td>
                        <td><?php echo $table[$i]['add_date'] ?></td>
                        <td><?php echo $table[$i]['upd_date'] ?></td>
                    </tr>
                <?php }; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
$count_rows = (int)(rquery("SELECT COUNT(*) as cnt FROM gosuslugi")[0]['cnt']);
$count_pages = intdiv($count_rows, $limit_gosuslugi);
if ($count_pages * $limit_gosuslugi != $count_rows) {
    $count_pages++;
}
?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="gosuslugi.php?page=1">В начало</a></li>
        <?php
        if ($page > 2) {
            ?>
            <li class="page-item"><a class="page-link" href="gosuslugi.php?page=<?php echo $page - 2;?>"><?php echo $page - 2;?></a></li>
            <?php
        }
        if ($page > 1) {
            ?>
            <li class="page-item"><a class="page-link" href="gosuslugi.php?page=<?php echo $page - 1;?>"><?php echo $page - 1;?></a></li>
            <?php
        }
        ?>
        <li class="page-item"><a class="page-link" style="opacity: 0.5;"><?php echo $page;?></a></li>
        <?php
        if ($page < $count_pages) {
            ?>
            <li class="page-item"><a class="page-link" href="gosuslugi.php?page=<?php echo $page + 1;?>"><?php echo $page + 1;?></a></li>
            <?php
        }
        if ($page < ($count_pages - 1)) {
            ?>
            <li class="page-item"><a class="page-link" href="gosuslugi.php?page=<?php echo $page + 2;?>"><?php echo $page + 2;?></a></li>
            <?php
        }
        ?>
        <li class="page-item"><a class="page-link" href="gosuslugi.php?page=<?php echo $count_pages;?>">В конец (всего <?php echo $count_pages;?>)</a></li>
    </ul>
</nav>