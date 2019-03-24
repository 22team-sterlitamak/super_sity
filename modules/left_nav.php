<?php
/**
 * Created by PhpStorm.
 * User: Aleksandr
 * Date: 24.03.2019
 * Time: 4:14
 */
if(!isset($active_nav)) {
    $active_nav = 0;
}
?>
<label for="nav-toggle" class="nav-toggle" onclick></label>
<div class="sidebar" data-color="purple"  style="z-index: 10;"  data-image="assets/img/sidebar-5.jpg">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a class="simple-text" href="http://xumukutyt.myjino.ru/user.php">
                Stata.
            </a>
        </div>

        <ul class="nav">
            <li <?php if ($active_nav == 1) echo 'class="active"'; ?>>
                <a href="gosuslugi.php">
                    <i class="pe-7s-note2"></i>
                    <p>Госуслуги</p>
                </a>
            </li>
            <li <?php if ($active_nav == 2) echo 'class="active"'; ?>>
                <a href="../gosuslugi_charts.php">
                    <i class="pe-7s-graph"></i>
                    <p>Госуслуги (графики)</p>
                </a>
            </li>
            <li <?php if ($active_nav == 3) echo 'class="active"'; ?>>
                <a href="kiportal.php">
                    <i class="pe-7s-note2"></i>
                    <p>kiportal</p>
                </a>
            </li>
            <li <?php if ($active_nav == 4) echo 'class="active"'; ?>>
                <a href="kiportal_charts.php">
                    <i class="pe-7s-graph"></i>
                    <p>kiportal (графики)</p>
                </a>
            </li>
            <li class="active-pro">
                    <a href="../user.php">
                        <i class="pe-7s-user"></i>
                        <p>О нас</p>
                    </a>
                </li>
            
        </ul>
        
    </div>
    <div  class="sidebar-wrapper">
        <ul class="nav">
            <li <?php if ($active_nav == 5) echo 'class="active"'; ?>>
                    <a href="../user.php">
                        <i class="pe-7s-user"></i>
                        <p>О нас</p>
                    </a>
                </li>
        </ul>
    </div>
</div>
