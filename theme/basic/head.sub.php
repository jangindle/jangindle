<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    $g5_head_title = $g5['title']; // 상태바에 표시될 제목
    $g5_head_title .= " | ".$config['cf_title'];
}

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=yes, initial-scale=0.8, maximum-scale=2.5, minimum-scale=0.8, width=device-width"/>

<meta name="description" content="온라인 인테리어 시공의 기준 - 도배, 장판, 마루(대전/세종 시공)">
<meta property="og:type" content="website">
<meta property="og:title" content="장인들">
<meta property="og:description" content="온라인 인테리어 시공의 기준 - 도배, 장판, 마루(대전/세종 시공)">
<meta property="og:image" content="http://www.jangindle.com/assets/images/common/main-logo.jpeg">
<meta property="og:url" content="http://www.jangindle.com">

<?php


if($config['cf_add_meta'])
    echo $config['cf_add_meta'].PHP_EOL;
?>

<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/nanummyeongjo.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/nanumgothic.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosanskr.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/jejumyeongjo.css">

<link rel="stylesheet" href="/assets/fontawesome-5.0.0/css/fontawesome-pro-brands.css">
<link rel="stylesheet" href="/assets/fontawesome-5.0.0/css/fontawesome-pro-light.css">
<link rel="stylesheet" href="/assets/fontawesome-5.0.0/css/fontawesome-pro-regular.css">
<link rel="stylesheet" href="/assets/fontawesome-5.0.0/css/fontawesome-pro-core.css">

<!--
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/<?php echo G5_IS_MOBILE ? 'mobile' : 'default'; ?>.css?ver=<?php echo G5_CSS_VER; ?>">
<link rel="stylesheet" href="/skin/member/basic/style.css">
-->
<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">

<link rel="stylesheet" href="/assets/css/default.css">
<link rel="stylesheet" href="/assets/css/wallpaper.css?<?php echo time();?>">
<link rel="stylesheet" href="/assets/css/slider.css">
<link rel="stylesheet" href="/assets/css/shadowbox.css">
<link rel="stylesheet" href="/assets/css/slick.css">
<!-- <link rel="stylesheet" href="/assets/css/slick-theme.css"> -->

<script type="text/javascript" src="http://use.fontawesome.com/8ce265c3a8.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript" src="/assets/js/default.js?<?php echo time();?>"></script>
<script type="text/javascript" src="/assets/js/slider.js"></script>
<script type="text/javascript" src="/assets/js/shadowbox.js"></script>
<script type="text/javascript" src="/assets/js/slick.min.js"></script>

<link  href="/assets/js/datepicker-0.6.4/dist/datepicker.css" rel="stylesheet">
<script src="/assets/js/datepicker-0.6.4/dist/datepicker.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.counterup.min.js"></script>

<title><?php echo $g5_head_title; ?></title>
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
</script>

<script src="<?php echo G5_JS_URL ?>/jquery.menu.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_JS_URL ?>/common.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_JS_URL ?>/wrest.js?ver=<?php echo G5_JS_VER; ?>"></script>
<?php
if(G5_IS_MOBILE) {
    echo '<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>'.PHP_EOL; // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN'))
    echo $config['cf_add_script'];
?>
</head>
<body>
