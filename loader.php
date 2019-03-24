<?php
/**
 * Created by PhpStorm.
 * User: Aleksandr
 * Date: 23.03.2019
 * Time: 16:54
 */

include_once 'config.php';
include_once 'function.php';


setlocale(LC_MONETARY, 'en_US');
$con = mysqli_connect($db, $db_user, $db_pass, $db_name);

$limit_gosuslugi = 10;
$limit_kiportal = 20;
$limit_sberbank = 100;
$page = 1;
if(isset($_GET['page'])) {
    $page = (int)$_GET['page'];
}


