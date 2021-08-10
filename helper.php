<?php
require "siteSettings.php";

define("PATH", realpath('.'));

function getLastPath($number = 0) {
    $lastPath = explode("/", $_SERVER['REQUEST_URI']);
    $index = count($lastPath) - $number;
    return $lastPath[$index];
}

function settings($name) {
    global $setting;
    return (isset($setting[$name]) ? $setting[$name] : false);
}

function session($name) {
    if (isset($_SESSION[$name])) {
        return $_SESSION[$name];
    }
}

function sPost($name) {
    if (isset($_POST[$name])) {
        if (is_array($_POST[$name])) {
            return array_map(function ($item) {
                return htmlspecialchars(trim($item));
            }, $_POST[$name]);

            return htmlspecialchars(trim($_POST[$name]));
        }
    }
}

function post($name) {
    if (isset($_POST[$name])) {
        return htmlspecialchars(trim($_POST[$name]));
    }
}

function slugit($str, $replace = array(), $delimiter = '-') {
    if (!empty($replace)) {
        $str = str_replace((array)$replace, ' ', $str);
    }
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str); //Ascii karakterlere çeviri yapar.
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '-', "$clean"); //Belirtilen karakterler harici(A-Z a-z 0-9 / _ | + (space) -) çeşitli noktalama işaretlerini "-" ile değiştirir.
    $clean = strtolower(trim($clean, '-')); //Değerin başında ve sonunda "-" işareti varsa trimler.
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, "$clean");//Eğer belirtilen karakterlerin de istenilen bir karakter ile değiştirilmesini istiyorsak bunu kullanırız, şuan default olarak "-" ile değişiyor.
    return $clean;
}

function UpdateQueryGenerator($table, $model, $id) {
    $keys = array();
    $values = array();

    foreach (json_decode($model) as $key => $value) {
        array_push($keys, $key);
        array_push($values, $value);
    }

    $query = 'UPDATE ' . $table . ' SET ';
    for ($i = 0; $i < count($keys); $i++) {
        if ($i < count($keys) - 1) {
            $query .= $keys[$i] . " = '$values[$i]',";
        } else {
            $query .= $keys[$i] . " = '$values[$i]'";;
        }
    }
    $query .= ' WHERE id=' . $id;
    return $query;
}

function InsertQueryGenerator($table, $model) {
    $keys = array();
    $values = array();

    foreach (json_decode($model) as $key => $value) {
        array_push($keys, $key);
        array_push($values, $value);
    }

    $query = 'INSERT INTO ' . $table . ' (';
    for ($i = 0; $i < count($keys); $i++) {
        if ($i < count($keys) - 1) {
            $query .= $keys[$i] . ",";
        } else {
            $query .= $keys[$i];
        }
    }
    $query .= ') VALUES (';
    for ($i = 0; $i < count($values); $i++) {
        if ($i < count($values) - 1) {
            $query .= "'$values[$i]'" . ",";
        } else {
            $query .= "'$values[$i]'";
        }
    }

    $query .= ');';
    return $query;
}

function GenerateRandomCode($n = 11) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}
