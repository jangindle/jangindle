<?php
// if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
if(!isset($_POST['type'])) exit;

// print_r($_GET);

// print_r($_POST);

// 도배
// 공식
// (((N * 2.5 * 0.8))) + (((N * 2.5) / 20) * 21)) * 1.0 * 1.1 * 1.1) + (N + a)
// $_price = 0;

$_wallpaper = array(
    'silk' => 0,
    'basic' => 0,
    'mix' => 0,
    'veranda' => $_POST['veranda'],
    'ceil' => $_POST['ceil'],
    'empty' => $_POST['empty']
);

// 삼항연산자
// (조건문) ? "값1" : "값2" ;

if ($_POST['type'] == "wallpaper") {
    // $_price = ((($_POST['py'] * 2.5 * 0.8) + ((($_POST['py'] * 2.5) / 20) * 21)) * 1.0 * 1.1 * 1.1);
    // $_wallpaper['silk'] = ((($_POST['py'] * 2.5 * 0.8) + ((($_POST['py'] * 2.5) / 20) * 21)) * 1.0 * 1.1 * 1.1);
    $_wallpaper['silk'] = round(((($_POST['py'] * (($_wallpaper['ceil'] == "false") ? 1.5 : 2.5) * 0.8) + ((($_POST['py'] * 2.5) / 20) * 21)) * (($_wallpaper['veranda'] == "true") ? 1.1 : 1.0) * 1.1 * 1.1)) + (($_wallpaper['empty'] == "true") ? $_POST['py'] : $_POST['py'] + ($_POST['py'] * 0.2));
    $_wallpaper['basic'] = round(((($_POST['py'] * 2.5 * 0.4) + ((($_POST['py'] * 2.5) / 30) * 21)) * 1.0 * 1.1 * 1.1));
    $_wallpaper['mix'] = round(((($_POST['py'] * 2.5 * 0.6) + ((($_POST['py'] * 2.5) / 20) * 21)) * 1.0 * 1.1 * 1.1));
}

// ceil() - 올림
// floor() - 내림
// round() - 반올림

// echo json_encode(array(
//     "name" => "1111",
//     "data" => $_wallpaper
// ));

// DB화
// DB조회 한번더
// 예외사항이 DB에 있으면 DB에 있는 값으로 return
if ($_POST['code'] == '1111') {
    $_wallpaper['silk'] = 1000;
    // $_wallpaper['basic'] = 2;
    // $_wallpaper['mix'] = 3;
}

// echo json_encode($_wallpaper);
echo json_encode(array($_wallpaper['silk'], $_wallpaper['basic'], $_wallpaper['mix']));

// echo '1111';
