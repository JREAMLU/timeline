<?php
if (empty ( $lang ) || ! is_array ( $lang )) {
    $lang = array ();
}

/*
$lang = array_merge ( $lang, array (
    "COLON" => ":", 
    "HOUSE_NAME" => "", 
    "TITLE" => 'jream.lu', 
    "MAIN_TITLE" => '', 
    "KEYWORDS" => 'jream jrea.lu jream.cn jream.com.cn', 
    "DESCRIPTION" => 'jream jrea.lu jream.cn jream.com.cn', 
    "API_ERROR" => "接口路径错误或没有该接口", 
    "WELCOME" => "", 
) );
*/

$lang = array_merge ( $lang, 
    [
        "COLON" => ":", 
        "HOUSE_NAME" => "", 
        "TITLE" => 'jream.lu', 
        "MAIN_TITLE" => '', 
        "KEYWORDS" => 'jream jrea.lu jream.cn jream.com.cn', 
        "DESCRIPTION" => 'jream jrea.lu jream.cn jream.com.cn', 
        "API_ERROR" => "接口路径错误或没有该接口", 
        "WELCOME" => ""
    ]
);