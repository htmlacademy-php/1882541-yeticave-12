<?php
require_once ('helpers.php');

$is_auth = rand(0, 1);

function convert_price($price) {
    $price = ceil($price);
    if ($price < 1000) {
        return $price . "₽";
    } else if ($price > 1000){
        $price = number_format($price, 0, ".", " ");
        return $price . "₽";
    } else {
        return 0 . "₽";
    }
}

function get_time_range($end_date) {
    date_default_timezone_set("Europe/Moscow");
    $cur_date = date_create("now");
    $end_date = date_create($end_date);
    $stamp_small = $cur_date->getTimestamp();
    $stamp_big = $end_date->getTimestamp();
    $diff = $stamp_big - $stamp_small;
    $hours_left = $diff/3600;
    $minutes_left = floor(($hours_left - floor($hours_left))*60);
    $time_left = [floor($hours_left), $minutes_left];
    return $time_left;
}

$user_name = 'Gregory'; // укажите здесь ваше имя

$categories_arr = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$announcements_arr = [
['name' => '2014 Rossignol District Snowboard', 'category' => 'Доски и лыжи', 'price' => '10999', 'image' => 'img/lot-1.jpg', 'date' => '2021-10-10'],
['name' => 'DC Ply Mens 2016/2017 Snowboard', 'category' => 'Доски и лыжи', 'price' => '159999', 'image' => 'img/lot-2.jpg', 'date' => '2021-10-03 20:30'],
['name' => 'Крепления Union Contact Pro 2015 года размер L/XL', 'category' => 'Крепления', 'price' => '8000', 'image' => 'img/lot-3.jpg', 'date' => '2021-12-2'],
['name' => 'Ботинки для сноуборда DC Mutiny Charocal', 'category' => 'Ботинки', 'price' => '10999', 'image' => 'img/lot-4.jpg', 'date' => '2021-12-10'],
['name' => 'Куртка для сноуборда DC Mutiny Charocal', 'category' => 'Одежда', 'price' => '7500', 'image' => 'img/lot-5.jpg', 'date' => '2021-12-12'],
['name' => 'Маска Oakley Canopy', 'category' => 'Разное', 'price' => '5400', 'image' => 'img/lot-6.jpg', 'date' => '2021-12-16']
];

    function check_arr(&$arr) {
        foreach ($arr as &$val) {
        if (!is_array($val)) {
            $val = strip_tags($val);
            }
            else {
            check_arr($val);
            }
        }
    }

   check_arr($categories_arr);
   check_arr($announcements_arr);

    $page_content = include_template('main.php', ['announcements_arr' => $announcements_arr, 'categories_arr' => $categories_arr]);
    $layout_content = include_template('layout.php', ['page_content' => $page_content, 'title' => 'Главная', 'user_name' => $user_name, 'categories_arr' => $categories_arr]);
    print($layout_content);

?>
