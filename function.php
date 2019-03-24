<?php
/**
 * Created by PhpStorm.
 * User: Aleksandr
 * Date: 23.03.2019
 * Time: 18:36
 */

function getParam($param_name) {
    $con = $GLOBALS['con'];
    return mysqli_real_escape_string($con, $_GET[$param_name]).trim(' ');
}

function isParam($param_name) {
    return isset($_GET[$param_name]);
}

function query($query) {
    $con = $GLOBALS['con'];
    $res = mysqli_query($con, $query);
}

function rquery($query) {
    $con = $GLOBALS['con'];
    $res = mysqli_query($con, $query);
    if($res) {
        $answer = array();
        while ($result = mysqli_fetch_assoc($res)) {
            $answer[] = $result;
        }
        return $answer;
    }else{
        return false;
    }
}

function getStatusGosuslugi() {
    return rquery('SELECT stage_name as name, cnt FROM `stage`, (SELECT status, COUNT(*) as cnt FROM gosuslugi GROUP BY status) as `counter` WHERE counter.status = stage.stage_id');
}

function getLawGosuslugi() {
    $answ = array();
    $f44 = array('name' => '44-ФЗ', 'cnt' => 0);
    $arr = rquery('SELECT law_name AS name, cnt FROM `law`, (SELECT law, COUNT(*) as cnt FROM gosuslugi GROUP BY status) as `counter` WHERE counter.law = law.law_id ');
    foreach ($arr as $row) {
        if ($row['name'][0] == '4') {
            $f44['cnt'] += $row['cnt'];
        } else {
            $answ[] = $row;
        }
    }
    $answ[] = $f44;
    return $answ;
}

function getPriceGosuslugi() {
    $arr = array();
    $arr[] = array('name' => '0 - 10', 'cnt' => rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 0 AND 10000')[0]['cnt']);
    $arr[] = array('name' => '10 - 100', 'cnt' => rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 10000 AND 100000')[0]['cnt']);
    $arr[] = array('name' => '100 - 1000', 'cnt' => rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 100000 AND 1000000')[0]['cnt']);
    $arr[] = array('name' => '1000 - 10000', 'cnt' => rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 1000000 AND 10000000')[0]['cnt']);
    $arr[] = array('name' => '10000 - 100000', 'cnt' => rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 10000000 AND 100000000')[0]['cnt']);
    $arr[] = array('name' => '100000 - 1000000', 'cnt' => rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 100000000 AND 1000000000')[0]['cnt']);
    $arr[] = array('name' => '1000000 - 10000000', 'cnt' => rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 1000000000 AND 10000000000')[0]['cnt']);
    $arr[] = array('name' => '10000000 - 100000000', 'cnt' => rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 10000000000 AND 100000000000')[0]['cnt']);
    $arr[] = array('name' => '100000000 - 1000000000', 'cnt' => rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 100000000000 AND 1000000000000')[0]['cnt']);
    return $arr;
}

function getPriceStatusGosuslugi() {
    $count_all = (int)(rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi`')[0]['cnt']);
    $count_1 = (int)(rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE status=1')[0]['cnt']);
    $count_2 = (int)(rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE status=2')[0]['cnt']);
    $count_3 = (int)(rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE status=3')[0]['cnt']);
    $arr = array();
    $arr[] = array('name' => '0 - 10',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 0 AND 10000')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 0 AND 10000) AND status = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 0 AND 10000) AND status = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 0 AND 10000) AND status = 3')[0]['cnt'] / $count_3: 0,
    );
    $arr[] = array('name' => '10 - 100',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000 AND 100000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000 AND 100000) AND status = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000 AND 100000) AND status = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000 AND 100000) AND status = 3')[0]['cnt'] / $count_3: 0,
    );
    $arr[] = array('name' => '100 - 1000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000 AND 1000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000 AND 1000000) AND status = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000 AND 1000000) AND status = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000 AND 1000000) AND status = 3')[0]['cnt'] / $count_3: 0,
    );
    $arr[] = array('name' => '1000 - 10000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000 AND 10000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000 AND 10000000) AND status = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000 AND 10000000) AND status = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000 AND 10000000) AND status = 3')[0]['cnt'] / $count_3: 0,
    );
    $arr[] = array('name' => '10000 - 100000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000 AND 100000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000 AND 100000000) AND status = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000 AND 100000000) AND status = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000 AND 100000000) AND status = 3')[0]['cnt'] / $count_3: 0,
    );
    $arr[] = array('name' => '100000 - 1000000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000 AND 1000000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000 AND 1000000000) AND status = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000 AND 1000000000) AND status = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000 AND 1000000000) AND status = 3')[0]['cnt'] / $count_3: 0,
    );
    $arr[] = array('name' => '1000000 - 10000000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000000 AND 10000000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000000 AND 10000000000) AND status = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000000 AND 10000000000) AND status = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000000 AND 10000000000) AND status = 3')[0]['cnt'] / $count_3: 0,
    );
    $arr[] = array('name' => '10000000 - 100000000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000000 AND 100000000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000000 AND 100000000000) AND status = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000000 AND 100000000000) AND status = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000000 AND 100000000000) AND status = 3')[0]['cnt'] / $count_3: 0,
    );
    $arr[] = array('name' => '100000000 - 1000000000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000000 AND 1000000000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000000 AND 1000000000000) AND status = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000000 AND 1000000000000) AND status = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000000 AND 1000000000000) AND status = 3')[0]['cnt'] / $count_3: 0,
    );
    return $arr;
}

function getPriceLawGosuslugi() {
    $count_all = (int)(rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi`')[0]['cnt']);
    $count_1 = (int)(rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE law=1')[0]['cnt']);
    $count_2 = (int)(rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE law=2')[0]['cnt']);
    $count_3 = (int)(rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE law=3')[0]['cnt']);
    $count_4 = (int)(rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE law=4')[0]['cnt']);
    $arr = array();
    $arr[] = array('name' => '0 - 10',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE price BETWEEN 0 AND 10000')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 0 AND 10000) AND law = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 0 AND 10000) AND law = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 0 AND 10000) AND law = 3')[0]['cnt'] / $count_3: 0,
        'cnt4' => $count_4 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 0 AND 10000) AND law = 4')[0]['cnt'] / $count_4: 0,
    );
    $arr[] = array('name' => '10 - 100',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000 AND 100000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000 AND 100000) AND law = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000 AND 100000) AND law = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000 AND 100000) AND law = 3')[0]['cnt'] / $count_3: 0,
        'cnt4' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000 AND 100000) AND law = 4')[0]['cnt'] / $count_4: 0,
    );
    $arr[] = array('name' => '100 - 1000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000 AND 1000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000 AND 1000000) AND law = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000 AND 1000000) AND law = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000 AND 1000000) AND law = 3')[0]['cnt'] / $count_3: 0,
        'cnt4' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000 AND 1000000) AND law = 4')[0]['cnt'] / $count_4: 0,
    );
    $arr[] = array('name' => '1000 - 10000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000 AND 10000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000 AND 10000000) AND law = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000 AND 10000000) AND law = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000 AND 10000000) AND law = 3')[0]['cnt'] / $count_3: 0,
        'cnt4' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000 AND 10000000) AND law = 4')[0]['cnt'] / $count_4: 0,
    );
    $arr[] = array('name' => '10000 - 100000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000 AND 100000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000 AND 100000000) AND law = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000 AND 100000000) AND law = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000 AND 100000000) AND law = 3')[0]['cnt'] / $count_3: 0,
        'cnt4' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000 AND 100000000) AND law = 4')[0]['cnt'] / $count_4: 0,
    );
    $arr[] = array('name' => '100000 - 1000000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000 AND 1000000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000 AND 1000000000) AND law = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000 AND 1000000000) AND law = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000 AND 1000000000) AND law = 3')[0]['cnt'] / $count_3: 0,
        'cnt4' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000 AND 1000000000) AND law = 4')[0]['cnt'] / $count_4: 0,
    );
    $arr[] = array('name' => '1000000 - 10000000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000000 AND 10000000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000000 AND 10000000000) AND law = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000000 AND 10000000000) AND law = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000000 AND 10000000000) AND law = 3')[0]['cnt'] / $count_3: 0,
        'cnt4' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 1000000000 AND 10000000000) AND law = 4')[0]['cnt'] / $count_4: 0,
    );
    $arr[] = array('name' => '10000000 - 100000000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000000 AND 100000000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000000 AND 100000000000) AND law = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000000 AND 100000000000) AND law = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000000 AND 100000000000) AND law = 3')[0]['cnt'] / $count_3: 0,
        'cnt4' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 10000000000 AND 100000000000) AND law = 4')[0]['cnt'] / $count_4: 0,
    );
    $arr[] = array('name' => '100000000 - 1000000000',
        'cnt0' => $count_all ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000000 AND 1000000000000)')[0]['cnt'] / $count_all: 0,
        'cnt1' => $count_1 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000000 AND 1000000000000) AND law = 1')[0]['cnt'] / $count_1: 0,
        'cnt2' => $count_2 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000000 AND 1000000000000) AND law = 2')[0]['cnt'] / $count_2: 0,
        'cnt3' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000000 AND 1000000000000) AND law = 3')[0]['cnt'] / $count_3: 0,
        'cnt4' => $count_3 ? (int)rquery('SELECT COUNT(*) AS cnt FROM `gosuslugi` WHERE (price BETWEEN 100000000000 AND 1000000000000) AND law = 4')[0]['cnt'] / $count_4: 0,
    );
    return $arr;
}

function getKiportalProtocol() {
    return rquery('SELECT protocol as name, COUNT(*) AS cnt FROM kiportal GROUP BY protocol ORDER BY protocol');
}

function getKiportalProtocolDate() {
    return rquery('SELECT TRIM(YEAR(attestat_date)) as name, COUNT(*) AS cnt FROM kiportal GROUP BY YEAR(attestat_date) ORDER BY attestat_date');
}

function getKiportalDate() {
    return rquery('SELECT TRIM(YEAR(`date`)) as name, COUNT(*) AS cnt FROM kiportal GROUP BY YEAR(`date`) ORDER BY `date`');
}

function getsumma_savekiporter() {
    $arr = array();
    $arr[] = array('name' => '0 - 10', 'cnt' => (int)rquery('SELECT COUNT(*) AS cnt FROM `kiportal` WHERE summa_save BETWEEN 0 AND 10000')[0]['cnt']);
    $arr[] = array('name' => '10 - 100', 'cnt' => (int)rquery('SELECT COUNT(*) AS cnt FROM `kiportal` WHERE summa_save BETWEEN 10000 AND 100000')[0]['cnt']);
    $arr[] = array('name' => '100 - 1000', 'cnt' => (int)rquery('SELECT COUNT(*) AS cnt FROM `kiportal` WHERE summa_save BETWEEN 100000 AND 1000000')[0]['cnt']);
    $arr[] = array('name' => '1000 - 10000', 'cnt' => (int)rquery('SELECT COUNT(*) AS cnt FROM `kiportal` WHERE summa_save BETWEEN 1000000 AND 10000000')[0]['cnt']);
    $arr[] = array('name' => '10000 - 100000', 'cnt' => (int)rquery('SELECT COUNT(*) AS cnt FROM `kiportal` WHERE summa_save BETWEEN 10000000 AND 100000000')[0]['cnt']);
    $arr[] = array('name' => '100000 - 1000000', 'cnt' => (int)rquery('SELECT COUNT(*) AS cnt FROM `kiportal` WHERE summa_save BETWEEN 100000000 AND 1000000000')[0]['cnt']);
    $arr[] = array('name' => '1000000 - 10000000', 'cnt' => (int)rquery('SELECT COUNT(*) AS cnt FROM `kiportal` WHERE summa_save BETWEEN 1000000000 AND 10000000000')[0]['cnt']);
    $arr[] = array('name' => '10000000 - 100000000', 'cnt' => (int)rquery('SELECT COUNT(*) AS cnt FROM `kiportal` WHERE summa_save BETWEEN 10000000000 AND 100000000000')[0]['cnt']);
    $arr[] = array('name' => '100000000 - 1000000000', 'cnt' => (int)rquery('SELECT COUNT(*) AS cnt FROM `kiportal` WHERE summa_save BETWEEN 100000000000 AND 1000000000000')[0]['cnt']);
    return $arr;
}


function getJS($arr, $var, $isint = false, $isdbl = false) {
    $n = count($arr);
    $names = "[";
    $val = "[";
    if($isdbl) {
        $val = $val."[";
    }
    for ($i = 0; $i < $n; $i++) {
        if ($i > 0) {
            $names = $names.", ";
            $val = $val.", ";
        }
        $names = $names."'".$arr[$i]['name']."'";
        if($isint) {
            $val = $val.$arr[$i]['cnt'];
        } else {
            $val = $val."'".$arr[$i]['cnt']."'";
        }
    }
    $names = $names."]";
    $val = $val."]";
    if($isdbl) {
        $val = $val."]";
    }
    return '<script>'.$var.' = {labels: '.$names.',
series: '.$val.'}</script>';
}

function getJS2($arr, $var, $params, $isint = false) {
    $n = count($arr);
    $names = "[";
    $val = "[";
    $vals = array();
    for($i = 0; $i < $params; $i++) {
        $vals[] = '[';
    }
    for ($i = 0; $i < $n; $i++) {
        if ($i > 0) {
            $names = $names.", ";
            for ($j = 0; $j < $params; $j++) {
                $vals[$j] = $vals[$j].", ";
            }
        }
        for ($j = 0; $j < $params; $j++) {
            if($isint) {
                $vals[$j] = $vals[$j].$arr[$i]["cnt$j"];
            } else {
                $vals[$j] = $vals[$j]."'".$arr[$i]["cnt$j"]."'";
            }
        }
        $names = $names."'".$arr[$i]['name']."'";
    }
    $names = $names."]";
    for($i = 0; $i < $params; $i++) {
        $vals[$i] = $vals[$i].']';
        $val = $val.$vals[$i];
        if ($i != ($params - 1)) {
            $val = $val.', ';
        }
    }
    $val = $val."]";
    return '<script>'.$var.' = {labels: '.$names.',
series: '.$val.'}</script>';
}

function getColor($n) {
    $type_color = ['#1DC7EA', '#FB404B', '#FFA534', '#9368E9'];
    if ($n >= 4) {
        return '';
    } else {
        return $type_color[$n];
    }
}