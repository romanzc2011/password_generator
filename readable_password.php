<?php
$root = dirname(__FILE__);
define("DICTIONARY_DIR", $root . '/dictionaries' .DIRECTORY_SEPARATOR);

function read_dictionary($fileName){
    $handler = fopen($fileName, 'r');
    while(!feof($handler)){ $arr[] = fgets($handler); }
    fclose($handler);
    return $arr;
}

function get_random_word($array){
    $index = random_int(0, count($array) - 1);
    return $random_word = trim($array[$index]);
}

function get_random_symbol(){
    $symbols = "!@#$%^&*-+";
    $i = random_int(0, strlen($symbols)-1);
    return $symbols[$i];
}

function get_random_number($digits=1){
    $min = pow(10, ($digits-1));
    $max = pow(10, $digits)-1;
    return strval(mt_rand($min, $max));
}

$words = DICTIONARY_DIR . '/friendly_words.txt';
$brands = DICTIONARY_DIR . '/brand_words.txt';

$wordArr = read_dictionary($words);
$brandArr = read_dictionary($brands);

$mergedWords = array_merge($brandArr, $wordArr);

$password = '';
$password .= get_random_word($mergedWords);
$password .= get_random_symbol();
$password .= get_random_number(4);
$password .= get_random_word($mergedWords);

echo $password;
?>