<?
// require_once "assets/ajax/admin.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Rashod</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
<?php
// ПОДКЛЮЧЕНИЕ КЛАССА В INDEX.PHP
require_once "assets/class_tomnau0/Tomnau01.php";
$tt = new Tomnau0\Tomnau01();
//$a=$tt->getTest();
$GLOBALS['MOBINET'] = $tt->ismobile();

//$b=$tt->getTable('users');
//?><!--<pre>--><?php //print_r($b);  ?><!--</pre>--><? //
?>

<div class="global_wrap_tt">

    <div class="header_tt">
        <img class="logo" src="assets/img/logo.png" alt="logo">
        <?php
        if ($GLOBALS['MOBINET']) {

        } else {
            ?>
            <nav>
                <ul class="top_menu flex_row_evenly">
                    <li><a href="javascript:void(0)">Главная</a></li>
                    <li><a href="javascript:void(0)">Каталог</a></li>
                    <li><a href="javascript:void(0)">Доставка</a></li>
                    <li><a href="javascript:void(0)">О нас</a></li>
                    <li><a href="javascript:void(0)">Контакты</a></li>
                </ul>
            </nav>
        <?
        }
        ?>

    </div>


    <div class="content_tt">
        <div class="row_tt center_tt">
            <h1>Karina live</h1>
        </div>
        <div class="row_tt">
            <div class="col_tt order1">1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, neque nihil odio placeat recusandae suscipit voluptate! Laudantium magnam nostrum rerum sequi ut! Assumenda ducimus eius nostrum quas sed unde voluptate.</div>
            <div class="col_tt order2">2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque debitis dignissimos dolores eligendi, fuga harum ipsam necessitatibus officiis omnis porro possimus, praesentium quam quo reprehenderit repudiandae similique sit tempora!</div>
        </div>

        <div class="row_tt center_tt">
            <img class="img_karina1" src="assets/img/karina1.jpg" alt="">
        </div>

    </div>


    <div class="footer_tt">
        Footer
    </div>

</div>


<script src="assets/js/my.js"></script>
</body>
</html>