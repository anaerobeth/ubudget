<?php
/*
 * Taken from post
 * http://www.rjansen.name/post/easiest-slugify-function-in-php
 */
function slugify($string) {
    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $string = strtolower($string);
    $string = preg_replace("/\W/", "-", $string);
    $string = preg_replace("/-+/", '-', $string);
    $string = trim($string, '-');
    return $string;
}

function _e($string,$method=null) {
    if (isset($method) && $method != 'input') {
        echo nl2br(htmlspecialchars(trim($string)));
    } else {
        echo htmlspecialchars(trim($string));
    }
}

function escape($raw) {
    if (is_array($raw)) {
        foreach ($raw as $k=>$v) {
            $data[$k] = strip_tags($v, '<strong><b><em><i><ol><ul><li>');
        }
    } else {
        $data = strip_tags($v, '<strong><b><em><i><ol><ul><li>');
    }
    return $data;
}

function niceDate($date) {
    echo date('M j', strtotime($date));
}

function token() {
    return md5(uniqid() . time());
}

?>