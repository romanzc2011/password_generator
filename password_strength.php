<?php
function detect_lowercase($string){
    return strtolower($string) != $string;
}

function detect_uppercase($string){
    return strtoupper($string) != $string;
}

function count_numbers($string){
    return preg_match_all('/[0-9]/', $string);
}

function count_symbols($string){
    return preg_match_all('/[!@#$%^&*]/', $string);
}

function password_strength($password){
    $strength = 0;
    $possible_points = 12;
    $length = strlen($password);

    if(detect_lowercase($password)){ $strength += 1; }
    if(detect_uppercase($password)){ $strength += 1; }

    $strength += min(count_numbers($password), 2);
    $strength += min(count_symbols($password), 2);

    if(strlen($password) >= 8){
        $strength += 2;
        $strength += min(($length - 8) * 0.5, 4);
    }

    $strength_precent = $strength / (float)$possible_points;
    $rating = floor($strength_precent * 10);
    return $rating;
}

if(isset($_POST['rate'])){
    $password = $_POST['rate'];
    echo password_strength($password);
}

?>
