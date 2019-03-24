<?php
/**
 * Created by PhpStorm.
 * User: Aleksandr
 * Date: 23.03.2019
 * Time: 18:41
 */
    $from = $limit_kiportal * ($page - 1);
    $table = rquery("SELECT * FROM kiportal ORDER BY `id` LIMIT ${from}, ${limit_kiportal} ");
    $table_count = count($table);
?>
<div class="col-md-12">
    <div class="card card-plain">
        <div class="header">
            <h4 class="title">Реестр Союза "Кадастровые инженеры"</h4>
            <p class="category">Справочная информация</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                    <th></th>
                    <th>№</th>
                    <th>ФИО</th>
                    <th>СНИЛС</th>
                    <th>№ аттестата КИ</th>
                    <th>Дата выдачи аттестата</th>
                    <th>Сумма страхования</th>
                    <th>Протокол о приеме</th>
                    <th>Дата приема в СРО</th>
                    <th>№ в ГРКИ</th>
                </thead>
                <tbody>
                <?php for($i = 0; $i < $table_count; $i++) {?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo $table[$i]['number'] ?></td>
                        <td><?php echo $table[$i]['fio'] ?></td>
                        <td><?php echo $table[$i]['snils'] ?></td>
                        <td><?php echo $table[$i]['attestat'] ?></td>
                        <td><?php echo $table[$i]['attestat_date'] ?></td>
                        <td><?php echo sprintf('%01.2f', (int)$table[$i]['summa_save'] / 100); ?></td>
                        <td><?php echo $table[$i]['protocol'] ?></td>
                        <td><?php echo $table[$i]['date'] ?></td>
                        <td><?php echo $table[$i]['grki'] ?></td>
                    </tr>
                <?php }; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
$count_rows = (int)(rquery("SELECT COUNT(*) as cnt FROM kiportal")[0]['cnt']);
$count_pages = intdiv($count_rows, $limit_kiportal);
if ($count_pages * $limit_kiportal != $count_rows) {
    $count_pages++;
}
?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="kiportal.php?page=1">В начало</a></li>
        <?php
        if ($page > 2) {
            ?>
            <li class="page-item"><a class="page-link" href="kiportal.php?page=<?php echo $page - 2;?>"><?php echo $page - 2;?></a></li>
            <?php
        }
        if ($page > 1) {
            ?>
            <li class="page-item"><a class="page-link" href="kiportal.php?page=<?php echo $page - 1;?>"><?php echo $page - 1;?></a></li>
            <?php
        }
        ?>
        <li class="page-item"><a class="page-link" style="opacity: 0.5;"><?php echo $page;?></a></li>
        <?php
        if ($page < $count_pages) {
            ?>
            <li class="page-item"><a class="page-link" href="kiportal.php?page=<?php echo $page + 1;?>"><?php echo $page + 1;?></a></li>
            <?php
        }
        if ($page < ($count_pages - 1)) {
            ?>
            <li class="page-item"><a class="page-link" href="kiportal.php?page=<?php echo $page + 2;?>"><?php echo $page + 2;?></a></li>
            <?php
        }
        ?>
        <li class="page-item"><a class="page-link" href="kiportal.php?page=<?php echo $count_pages;?>">В конец (всего <?php echo $count_pages;?>)</a></li>
    </ul>
</nav>