<?php
/**
 * Created by PhpStorm.
 * User: Aleksandr
 * Date: 23.03.2019
 * Time: 18:38
 */

$active_nav = 5;
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
                <a class="navbar-brand" href="#">О нас</a>
            </div>
            <div class="collapse navbar-collapse">
                


            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-primary text-center py-5 mb-4">
        <div class="container">
            <h1 class="font-weight-light text-white">Cостав команды</h1>
        </div>
    </header>
    <p></p>



    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Team Member 1 -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <img src="https://pp.userapi.com/c846420/v846420949/1cdeb3/eQUmbM-E4Nc.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0" style="font-size: 22px;"><b>Альбина Коцур</b></h5>
                        <div class="card-text text-black-50"><b>Project manager, frontend developer</b></div>
                    </div>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <img src="https://pp.userapi.com/c855328/v855328024/c4f4/hcGUD02StCw.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0" style="font-size: 22px;"><b>Александр Иванов</b></h5>
                        <div class="card-text text-black-50"><b>Backend Developer</b></div>
                    </div>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <img src="https://pp.userapi.com/c855328/v855328024/c4fb/85lTvEyhRw4.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0" style="font-size: 22px;"><b>Владимир Китанин</b></h5>
                        <div class="card-text text-black-50"><b>Frontend Developer</b></div>
                    </div>
                </div>
            </div>
            <!-- Team Member 4 -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <img src="https://pp.userapi.com/c855328/v855328024/c502/xkFLnSw5b1I.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0" style="font-size: 22px;"><b>Талгат Вахитов</b></h5>
                        <div class="card-text text-black-50"><b>Backend Developer</b></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>

            </div>
        </div>
    </div>


<?php
include_once 'modules/footer.php';

