<?php
/**
 * Created by PhpStorm.
 * User: Aleksandr
 * Date: 23.03.2019
 * Time: 16:56
 */

include_once 'loader.php';

if (isParam('add')) {
    /*******************************************************************************************************************
     * ГОСУСЛУГИ
     */
    if (getParam('add') == 'gosuslugi') {
        $number = 0;
        if(isParam('num')) {
            $number = (int)getParam('num');
        }
        $customer = '';
        if(isParam('customer')) {
            $customer = getParam('customer');
        }
        $desc = '';
        if(isParam('desc')) {
            $desc = getParam('desc');
        }
        $ikz = '';
        if(isParam('ikz')) {
            $ikz = getParam('ikz');
        }
        $price = 0;
        if(isParam('price')) {
            $price = (int)round((float)getParam('price') * 100);
        }
        $cur = '';
        if(isParam('cur')) {
            $cur = getParam('cur');
        }
        $add_date = '';
        if(isParam('add_date')) {
            $add_date = getParam('add_date');
            $add_date = date("Y-m-d", strtotime($add_date));
        }
        $upd_date = '';
        if(isParam('upd_date')) {
            $upd_date = getParam('upd_date');
            $upd_date = date("Y-m-d", strtotime($upd_date));
        }
        $status = 4;
        if(isParam('status')) {
            $s = getParam('status');
            $arr = rquery("SELECT * FROM `stage` WHERE stage_name = '$s'");
            if($arr) {
                $status = (int)$arr[0]['stage_id'];
            }
        }
        $law = 5;
        if(isParam('law')) {
            $s = getParam('law');
            $arr = rquery("SELECT * FROM `law` WHERE law_name = '$s'");
            if($arr) {
                $law = (int)$arr[0]['law_id'];
            }
        }
        $q = "INSERT INTO `gosuslugi`
(`number`, `IKZ`, `customer`, `desc`, `add_date`, `upd_date`, `status`, `price`, `cur`, `law`) VALUES 
($number, '$ikz', '$customer', '$desc', '$add_date', '$upd_date', $status, $price, '$cur', $law)";
        query($q);
        echo $q;
        //echo 'OK';
    }
    /*******************************************************************************************************************
     * KIPORTAL
     */
    if(getParam('add') == 'kiportal') {
        $number = 0;
        if(isParam('num')) {
            $number = (int)getParam('num');
        }
        $fio = '';
        if(isParam('fio')) {
            $fio = getParam('fio');
        }
        $snils = '';
        if(isParam('snils')) {
            $snils = getParam('snils');
        }
        $attestat = '';
        if(isParam('attestat')) {
            $attestat = getParam('attestat');
        }
        $attestat_date = '';
        if(isParam('attestat_date')) {
            $attestat_date = getParam('attestat_date');
        }
        $protocol = 0;
        if(isParam('protocol')) {
            $protocol = (int)getParam('protocol');
        }
        $date = '';
        if(isParam('date')) {
            $date = getParam('date');
            $date = date("Y-m-d", strtotime($date));
        }
        $grki = 0;
        if(isParam('grki')) {
            $grki = (int)getParam('grki');
        }
        $summa_save = 0;
        if(isParam('summa_save')) {
            $summa_save = (int)round((float)getParam('summa_save') * 100);
        }
        $q = "INSERT INTO `kiportal`
(`number`, `fio`, `snils`, `attestat`, `attestat_date`, `protocol`, `date`, `grki`, `summa_save`) VALUES 
($number, '$fio', '$snils', '$attestat', '$attestat_date', $protocol, '$date', $grki, $summa_save)";
        query($q);
        echo $q;
        //echo 'OK';
    }
}

if (isParam('clear')) {
    $table = getParam('clear');
    query("TRUNCATE TABLE `$table`");
}
