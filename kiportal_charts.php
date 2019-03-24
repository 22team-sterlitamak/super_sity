<?php
/**
 * Created by PhpStorm.
 * User: Aleksandrs
 * Date: 24.03.2019
 * Time: 5:34
 */

$active_nav = 4;
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
                <a class="navbar-brand" href="#">KIPORTAL.RU</a>
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
                            <li><a href="kiportal_charts.php">Где графики?</a></li>
                            <li><a href="kiportal.php">Таблица данных</a></li>
                        </ul>
                    </li>

                    <li class="separator hidden-lg"></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
            <div class="container-fluid">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" onclick="show_selected(-1, 1000)" role="tab" aria-controls="pills-home" aria-selected="true">Показать всё</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" onclick="show_selected(0, 1000)" role="tab" aria-controls="pills-home" aria-selected="true">Количество членов СРО</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" onclick="show_selected(1, 1000)" role="tab" aria-controls="pills-profile" aria-selected="false">Протоколы о приеме</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" onclick="show_selected(2, 1000)" role="tab" aria-controls="pills-contact" aria-selected="false">Дата выдачи аттестата</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" onclick="show_selected(3, 1000)" role="tab" aria-controls="pills-contact" aria-selected="false">Дата приема в СРО</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" onclick="show_selected(4, 1000)" role="tab" aria-controls="pills-contact" aria-selected="false">Стоимость страхования</a>
                    </li>
                </ul>
            </div>
            <div class="row" id="tabsnav">
                <div class="card ">
                    <div class="header">
                    </div>
                    <div class="content">
                    <iframe style="width: 100%; overflow: hidden; height: 400px; border: none;"
                        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSp-ui4tzGc-BfNzfB6U9qC3MzoHqCLj2QCnGhSTwnKTHZn7wVWdL5thwnMhxXdCs4dNKPdFNSEb8A4/pubchart?oid=611958800&format=interactive">

                    </iframe>
                    </div>
                </div>

                <div class="">
                    <?php
                    $kiportal_protocol = getKiportalProtocol();
                    echo getJS(getKiportalProtocol(), 'varKiportalProtocol', true, true);
                    ?>
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Протоколы о приеме</h4>
                            <p class="category">Гистограмма статистики принятых инженеров по протоколам</p>
                        </div>
                        <div class="content">
                            <div id="KiportalProtocol" class="ct-chart"></div>

                            <div class="footer">
                                <div class="stats">
                                    <i class="fa fa-check"></i> Данные обновлены <?php echo rquery('SELECT NOW() as date')[0]['date']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <?php
                    $kiportal_protocol_date = getKiportalProtocolDate();
                    echo getJS(getKiportalProtocolDate(), 'varKiportalProtocolDate', true, true);
                    ?>
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Дата выдачи аттестата</h4>
                            <p class="category">Гистограмма статистики выданных аттестатов по годам</p>
                        </div>
                        <div class="content">
                            <div id="KiportalProtocolDate" class="ct-chart"></div>

                            <div class="footer">
                                <div class="stats">
                                    <i class="fa fa-check"></i> Данные обновлены <?php echo rquery('SELECT NOW() as date')[0]['date']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <?php
                    $kiportal_protocol_date = getKiportalDate();
                    echo getJS(getKiportalDate(), 'varKiportalDate', true, true);
                    ?>
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Дата приема в СРО</h4>
                            <p class="category">Гистограмма статистики приема в СРО по годам</p>
                        </div>
                        <div class="content">
                            <div id="KiportalDate" class="ct-chart"></div>
                            <div class="footer">
                                <div class="stats">
                                    <i class="fa fa-check"></i> Данные обновлены <?php echo rquery('SELECT NOW() as date')[0]['date']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <?php
                    echo getJS(getsumma_savekiporter(), 'varKiportalSummaSave', true, true);
                    ?>
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Стоимость страхования</h4>
                            <p class="category">Гистограмма распределения стоимости страхования</p>
                        </div>
                        <div class="content">
                            <div id="KiportalSummaSave" class="ct-chart"></div>

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

            </div>
        </div>
    </div>
<?php
include_once 'modules/footer.php';

