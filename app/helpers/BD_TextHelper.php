<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

if (!function_exists('cyrToLat')) {

    function cyrToLat($string) {
        $string = mb_convert_case($string, MB_CASE_LOWER, "UTF-8");
        $cyr = array('а', 'б', 'в', 'г', 'д', 'е', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ь', 'ю', 'я');
        $lat = array('a', 'b', 'v', 'g', 'd', 'e', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'sht', 'a', 'y', 'yu', 'ya');

        return str_replace($cyr, $lat, $string);
    }

}

if (!function_exists('characterLimiter')) {

    function characterLimiter($str, $n = 500, $endChar = ' &#8230;') {
        $str = strip_tags($str);
        if (strlen($str) < $n) {
            return $str;
        }

        if (strlen($str) <= $n) {
            return $str;
        }

        $out = "";
        foreach (explode(' ', trim($str)) as $val) {
            $out .= $val . ' ';

            if (strlen($out) >= $n) {
                $out = trim($out);
                return (strlen($out) == strlen($str)) ? $out : $out . $endChar;
            }
        }
    }

}
