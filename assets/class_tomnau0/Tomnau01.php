<?php
namespace Tomnau0;

// ПОДКЛЮЧЕНИЕ КЛАССА В INDEX.PHP
//require_once "assets/class/Tomnau01.php";
//$tt = new Tomnau01();
//print_r($tt->getTest());

class Tomnau01
{
    // ТЕСТ КЛАСС
    public function getTest()
    {
       echo 'TEST OK!';
    }
    //$a = new Tomnau01();
    //echo $a->getTest();

//$dbc->query("UPDATE `user` SET `name` = 'user' WHERE `user`.`id` = 2;");
//$dbc->query("INSERT INTO `user` (`id`, `name`, `ip`, `dostup`) VALUES (NULL, 'dima3', '125.345.0.0.1', 'Y');");
//$dbc->query("DELETE FROM `user` WHERE `user`.`id` = 5;");
//$dbc->query("UPDATE `users` SET `tmp` = 'Осипов' WHERE `users`.`id` = 18;");
//$dbc->query("INSERT INTO `data_user` (`id`, `user_id`, `norm`, `zima`, `probeg`, `data`) VALUES (NULL, '48', '13.86', '1', '150', CURRENT_TIMESTAMP);");
//$dbc->query("INSERT INTO `data_user` (`user_id`, `norm`, `zima`, `probeg`, `data`) VALUES ('50', '13.86', '', '', CURRENT_TIMESTAMP);");


    // ПОДКЛЮЧИТЬ БД
    public function db()
    {
        $host = "localhost";
        $username = "tomnau0_degurka";
        $passwd = "Baza@3003@";
        $dbname = "tomnau0_degurka";

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
       // $mysqli  = new mysqli($host, $username, $passwd, $dbname);
        $mysqli  = mysqli_connect($host, $username, $passwd, $dbname);
        return $mysqli ;
    }

    // ПОЛУЧИТЬ ДАННЫЕ ИЗ ТАБЛИЦЫ
    public function getTable($tableName)
    {
        $dbc = Tomnau01::db();
        $result = $dbc->query("select  * from $tableName");
        $result = $result->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    // ПОЛУЧИТЬ ДАННЫЕ ПОЛЬЗОВАТЕЛЯ
    public function getUser($pass)
    {
        $dbc = Tomnau01::db();
        $result = $dbc->query("SELECT * FROM `users` WHERE `pass` LIKE '$pass'");
        return $result->fetch_array(MYSQLI_ASSOC);//MYSQLI_ASSOC MYSQLI_NUM  MYSQLI_BOTH
    }


    // ОБНОВИТЬ В ТАБЛИЦЕ (таблица,  в какой колонке ищем, кого ищем,    в какой колонке меняем, значение)
    public function dbUpdate($tableName, $column, $pattern, $changColumn, $chanVal)
    {
        $dbc = Tomnau01::db();
        $dbc->query("UPDATE `$tableName` SET `$changColumn` = '$chanVal' WHERE `$tableName`.`$column` = '$pattern'");
    }

    // УДАЛИТЬ ИЗ ТАБЛИЦЫ $tableName,  строку с id = $id
    public function dbDelete($tableName, $id)
    {
        $dbc = Tomnau01::db();
        $dbc->query("DELETE FROM $tableName WHERE $tableName .`id` = $id");
    }


    // ДОБАВИТЬ АДМИНА
    public function dbCreateAdmin($userName, $dostup, $admin)
    {
        $ip = Tomnau01::getIp();
        $pass = uniqid(); // СГЕНЕРИРОВАТЬ КОД
        Tomnau01::createCookie('pass', $pass);
        Tomnau01::createCookie('dostup', 'Y');
        $dbc = Tomnau01::db();
        $dbc->query("INSERT INTO `users` (`id`, `name`, `ip`, `dostup`, `pass`, `admin`) VALUES (NULL, '$userName', '$ip', '$dostup', '$pass', '$admin');");
    }

    // ДОБАВИТЬ НОВОГО ПОЛЬЗОВАТЕЛЯ
    public function dbCreateUser($userName, $dostup)
    {
        $ip = Tomnau01::getIp();
        $pass = uniqid(); // СГЕНЕРИРОВАТЬ КОД
        Tomnau01::createCookie('pass', $pass);
        Tomnau01::createCookie('dostup', 'Y');
        $dbc = Tomnau01::db();
        $dbc->query("INSERT INTO `users` (`id`, `name`, `ip`, `dostup`, `pass`) VALUES (NULL, '$userName', '$ip', '$dostup', '$pass');");
    }

    // ДОБАВИТЬ ДАННЫЕ ПОЛЬЗОВАТЕЛЯ
    public function dbCreateDataUser($tableName, $name, $user_id, $norm, $procent, $kmPre, $kmPost, $fuellPre, $zapravka, $probeg)
    {
        $dbc = Tomnau01::db();
        $dbc->query("INSERT INTO `$tableName` (`id`, `name`, `user_id`, `norm`, `zima`, `data`, `kmPre`, `kmPost`, `fuellPre`, `zapravka`, `probeg`) VALUES (NULL, '$name', '$user_id', '$norm', '$procent', CURRENT_TIMESTAMP, '$kmPre', '$kmPost', '$fuellPre', '$zapravka', '$probeg');");
    }

    // ДОБАВИТЬ ДАННЫЕ ПОЛЬЗОВАТЕЛЯ
    public function dbUpdateUser($tableName, $name, $user_id, $norm, $procent, $kmPre, $kmPost, $fuellPre, $zapravka, $probeg)
    {
        $dbc = Tomnau01::db();
        $dbc->query("INSERT INTO `$tableName` (`id`, `name`, `user_id`, `norm`, `zima`, `data`, `kmPre`, `kmPost`, `fuellPre`, `zapravka`, `probeg`) VALUES (NULL, '$name', '$user_id', '$norm', '$procent', CURRENT_TIMESTAMP, '$kmPre', '$kmPost', '$fuellPre', '$zapravka', '$probeg');");
    }


    // ПОЛУЧИТЬ IP
    public function getIp()
    {
        return $_SERVER['REMOTE_ADDR'];

    }

    // УСТАНОВИТЬ КУКИ COOKIE
    public function createCookie($key, $val)
    {
        setcookie($key, $val, time() + 31556926, '/');
    }

    // ПОЛУЧИТЬ ДАННЫЕ ИЗ ФАЙЛА
    public function getContentFile($filePath)
    {
        $homepage = file_get_contents($filePath);
        return $homepage;
    }

    // ПРЕОБРОЗОВАТЬ СТРОКУ В МАССИВ
    public function arrToString($pattern, $str)
    {
        $result = explode($pattern, $str);
        return $result;
    }

    // ПРОВЕРИТЬ СОВПАДЕНИЕ В МАССИВЕ
    public function inArr($pattern, $ar)
    {
        $result = in_array($pattern, $ar);
        return $result;
    }


    // ПОЛУЧИТЬ ДАННЫЕ ПОЛЬЗОВАТЕЛЯ
    public function getCountIp($ip)
    {
        $dbc = Tomnau01::db();
        $result = $dbc->query("SELECT * FROM `ip` WHERE `ip` LIKE '$ip'");
        return $result->fetch_array(MYSQLI_ASSOC);//MYSQLI_ASSOC MYSQLI_NUM  MYSQLI_BOTH
    }


    // ЗАПИСАТЬ IP В БД
    public function dbRecIp($ip, $count)
    {
        $dbc = Tomnau01::db();
        $dbc->query("INSERT INTO `ip` (`id`, `ip`, `count`, `data`) VALUES (NULL, '$ip', '$count', CURRENT_TIMESTAMP);");
    }

    // ЗАПИСАТЬ IP В ФАЙЛ(ЕСЛИ НЕ ОТРАБАТЫВАЕТ, ТО НАДО ОЧИСТИТЬ ФАЙЛ ip_log.php)
    public function recIp()
    {
        // ЗАПИСЬ IP В ФАЙЛ ip_log.php
        $filePath = 'ip_log.php';
        $ip = Tomnau01::getIp();                                // ПОЛУЧИТЬ IP
        $homepage = Tomnau01::getContentFile($filePath);        // ПОЛУЧИТЬ ДАННЫЕ ИЗ ФАЙЛА
        $ip_reg = Tomnau01::arrToString(';', $homepage); // ПРЕОБРОЗОВАТЬ СТРОКУ В МАССИВ допустимых IP
        $result = Tomnau01::inArr($ip, $ip_reg);                // ПРОВЕРИТЬ СОВПАДЕНИЕ В МАССИВЕ


        if ($result) {
            $a = Tomnau01::getCountIp($ip);                       // ПОЛУЧИТЬ ДАННЫЕ ИЗ ТАБЛИЦЫ IP
            $count = $a['count'] + 1;                               // ПОЛУЧИТЬ ЗНАЧЕНИЕ count
            Tomnau01::dbUpdate('ip', 'ip', $ip, 'count', $count); // ОБНОВИТЬ ЗНАЧЕНИЕ count
        } else {
            Tomnau01::dbRecIp($ip, 1);                     // ЗАПИСАТЬ IP В БД
            $message = $ip . ";";
            file_put_contents($filePath, $message, FILE_APPEND | LOCK_EX); // ЗАПИСАТЬ в файл
//    die();
        }


    }

    // ПОЛУЧИТЬ ДАТУ
    public function getDate()
    {
        date_default_timezone_set("Europe/Moscow");
        return date('d/m/Y H:i:s ', time());
    }


// ДОСТУП по Cookie
    function dostupCookie()
    {
        if ($_COOKIE['dostup'] == 'Y') {

        } else {
            die('<h1 style="color: red;text-align: center">Доступ закрыт</h1>');
        }
    }

// ДОСТУП по БД
    function dostupBd()
    {
        $pass = $_COOKIE['pass'];
        $arId = Tomnau01::getTable('users');
        $dostup = Tomnau01::getUser($pass);
        $dostup = $dostup['dostup'];

        $result = [];
        foreach ($arId as $item) {
            if ($item['pass'] == $pass) {
                $result[] = 1;
            }
        }
        if ($result and $dostup == 'Y') {

        } else {
            $ip = Tomnau01::getIp();
            die('<div style="color: red;text-align: center"><h2>' . $ip . '</h2><br><h1>В доступе отказано</h1></div>');
        }
    }


    // идентификации мобильных браузеров в своих проектах, которая может обнаруживать почти все основные мобильные операционные системы и браузеры.
    function ismobile() {
        $is_mobile = '0';

        if(preg_match('/(android|up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $is_mobile=1;
        }

        if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $is_mobile=1;
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
        $mobile_agents = array('w3c ','acs-','alav','alca','amoi','andr','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');

        if(in_array($mobile_ua,$mobile_agents)) {
            $is_mobile=1;
        }

        if (isset($_SERVER['ALL_HTTP'])) {
            if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) {
                $is_mobile=1;
            }
        }

        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
            $is_mobile=0;
        }

        return $is_mobile;
    }


}