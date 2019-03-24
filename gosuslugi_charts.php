<?php
/**
 * Created by PhpStorm.
 * User: Aleksandrs
 * Date: 24.03.2019
 * Time: 5:34
 */

$active_nav = 2;
include_once 'modules/head.php';
?>
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Переключение навигации</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ГОСУСЛУГИ</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="">
                            <i class="fa fa-search"></i>
                            <p class="hidden-lg hidden-md">Поиск</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                FAQ
                                <b class="caret"></b>
                            </p>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="gosuslugi_charts.php">Где графики?</a></li>
                            <li><a href="gosuslugi.php">Таблица данных</a></li>
                        </ul>
                    </li>

                    <li class="separator hidden-lg"></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" onclick="show_selected(-1, 1000)" role="tab" aria-controls="pills-home" aria-selected="true">Показать всё</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" onclick="show_selected(0, 1000)" role="tab" aria-controls="pills-home" aria-selected="true">Статусы закупок</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" onclick="show_selected(1, 1000)" role="tab" aria-controls="pills-profile" aria-selected="false">Федеральные законы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" onclick="show_selected(2, 1000)" role="tab" aria-controls="pills-contact" aria-selected="false">Стоимость закупок</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" onclick="show_selected(3, 1000)" role="tab" aria-controls="pills-contact" aria-selected="false">Стоимость закупок по статусам</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" onclick="show_selected(4, 1000)" role="tab" aria-controls="pills-contact" aria-selected="false">Стоимость закупок по законам</a>
                </li>
            </ul>
            </div>
            <div class="row" id="tabsnav">
                <div class="">
                    <?php
                    $status_uslugi = getStatusGosuslugi();
                    echo getJS(getStatusGosuslugi(), 'varStatusGosuslugiJS', true);
                    ?>
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Статусы закупок</h4>
                            <p class="category">Диаграмма распределения состояний закупок</p>
                        </div>
                        <div class="content">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="footer">

                                <div class="legend">
                                    <?php
                                    $n = count($status_uslugi);
                                    for($i = 0; $i < $n; $i++) {
                                        $row = $status_uslugi[$i];
                                        echo "<i class='fa fa-circle' style='color: ".getColor($i)." !important;'></i>".$row['name'];
                                    }
                                    ?>

                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-clock-o"></i> Данные обновлены <?php echo rquery('SELECT NOW() as date')[0]['date']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <?php
                    $law_uslugi = getLawGosuslugi();
                    echo getJS(getLawGosuslugi(), 'varLawGosuslugiJS', true);
                    ?>
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Федеральные законы</h4>
                            <p class="category">Диаграмма распределения закупок по федеральным законам</p>
                        </div>
                        <div class="content">
                            <div id="chartPreferencesLaw" class="ct-chart ct-perfect-fourth"></div>
                            <div class="footer">

                                <div class="legend">
                                    <?php
                                    $n = count($law_uslugi);
                                    for($i = 0; $i < $n; $i++) {
                                        $row = $law_uslugi[$i];
                                        echo "<i class='fa fa-circle' style='color: ".getColor($i)." !important;'></i>".$row['name'];
                                    }
                                    ?>

                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-clock-o"></i> Данные обновлены <?php echo rquery('SELECT NOW() as date')[0]['date']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <?php
                    $price_uslugi = getPriceGosuslugi();
                    echo getJS(getPriceGosuslugi(), 'varPriceGosuslugiJS', true, true);
                    ?>
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Стоимость закупок</h4>
                            <p class="category">Гистограмма распределения стоимости закупок</p>
                        </div>
                        <div class="content">
                            <div id="chartPriceGosuslugi" class="ct-chart"></div>

                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> Закупки
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-check"></i> Данные обновлены <?php echo rquery('SELECT NOW() as date')[0]['date']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <?php
                    $price_uslugi = getPriceStatusGosuslugi();
                    echo getJS2(getPriceStatusGosuslugi(), 'varPriceFullStatusGosuslugiJS', 4, true);
                    ?>
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Стоимость закупок по статусам</h4>
                            <p class="category">Гистограмма относительного распределения стоимости закупок по статусам</p>
                        </div>
                        <div class="content">
                            <div id="chartPriceFullStatusGosuslugi" class="ct-chart"></div>

                            <div class="footer">
                                <div class="legend">
                                    <i class='fa fa-circle' style='color: <?php echo getColor(0); ?> !important;'></i> Всего
                                    <i class='fa fa-circle' style='color: <?php echo getColor(1); ?> !important;'></i> Подача заявок
                                    <i class='fa fa-circle' style='color: <?php echo getColor(2); ?> !important;'></i> Работа комиссии
                                    <i class='fa fa-circle' style='color: <?php echo getColor(3); ?> !important;'></i> Процедура завершена
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-check"></i> Данные обновлены <?php echo rquery('SELECT NOW() as date')[0]['date']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <?php
                    $price_uslugi = getPriceLawGosuslugi();
                    echo getJS2(getPriceLawGosuslugi(), 'varPriceFullLawGosuslugiJS', 5, true);
                    ?>
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Стоимость закупок по законам</h4>
                            <p class="category">Гистограмма относительного распределения стоимости закупок по законам</p>
                        </div>
                        <div class="content">
                            <div id="chartPriceFullLawGosuslugi" class="ct-chart"></div>

                            <div class="footer">
                                <div class="legend">
                                    <i class='fa fa-circle' style='color: <?php echo getColor(0); ?> !important;'></i> Всего
                                    <i class='fa fa-circle' style='color: <?php echo getColor(1); ?> !important;'></i> 44-ФЗ
                                    <i class='fa fa-circle' style='color: <?php echo getColor(2); ?> !important;'></i> 223-ФЗ
                                    <i class='fa fa-circle' style='color: <?php echo getColor(3); ?> !important;'></i> ПП РФ 615 (Капитальный ремонт)
                                    <i class='fa fa-circle' style='color: <?php echo getColor(4); ?> !important;'></i> 94-Ф3
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-check"></i> Данные обновлены <?php echo rquery('SELECT NOW() as date')[0]['date']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




<?php
include_once 'modules/footer.php';

