<?php
/**
 * Created by PhpStorm.
 * User: Aleksandr
 * Date: 23.03.2019
 * Time: 18:38
 */

$active_nav = 1;
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
                <?php
                    include 'table_gosuslugi.php';
                ?>
            </div>
        </div>
    </div>











<?php
include_once 'modules/footer.php';

