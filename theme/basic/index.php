<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_THEME_PATH.'/head.php');

$page = (isset($_GET["p"])) ? $_GET["p"] : "main";

include_once(G5_THEME_PATH . '/page/' . $page . ".php");

include_once(G5_THEME_PATH.'/tail.php');
?>
