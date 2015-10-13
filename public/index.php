<?php
define ( "DS", '/' );
define ( "APP_PATH", realpath ( dirname ( __FILE__ ) . DS . '..' . DS . 'app' . DS ) ); /* 指向public的上一级 */
define ( "BASE_PATH", realpath ( dirname ( __FILE__ ) . DS . '..' . DS ) ); /* 指向public的上一级 */
define ( "HTTPS", 'https://' );
define ( "HTTP", 'http://' );
define ( "DOMAIN", $_SERVER ['SERVER_NAME'] );
define ( "BASEURL", HTTP . DOMAIN );

//默认模版
define ( "THEME_PATH", APP_PATH . DS . 'theme/default' );
/*
define ( 'MODELS_PATH', APP_PATH . '/Models/' ); //models所在目录
define ( 'WIDGET_PATH', APP_PATH . '/widgets/' ); //widgets 所在目录
define ( 'WIDGET_VIEW_PATH', APP_PATH . '/widgets/views/' ); //widgets views所在目录
*/

date_default_timezone_set("Asia/Shanghai");

require_once BASE_PATH . '/vendor/autoload.php';
require_once APP_PATH . "/conf/standard.php";
$app = new \Yaf\Application ( APP_PATH . "/conf/app.ini" );
$app->bootstrap ()->run ();
